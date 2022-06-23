<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Snowfire\Beautymail\Beautymail;
use App\Mail\OrderReceived;
use App\Models\Order;
use App\Models\User;
use App\Models\Admin;
use App\Models\Notification;
use App\Models\Shippinginfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $orders = Auth::user()->with('orders', 'orders.products.images', 'order.shippinginfo');
        
        return response()->json(['message' => 'Orders retrieved successfully', 'orders' => $orders->paginate(), 'orderNotPaginated' => $orders->get()]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $orders = Order::with('product.images', 'shippinginfo')->paginate();
        $isCustomizedOrders = Order::where('is_customized', '1')->with('product.images', 'product.sizes', 'product.colors', 'shippinginfo')->paginate();
        
        return response()->json(['message' => 'Orders retrieved successfully', 'orders' => $orders, 'orderCustomized' => $isCustomizedOrders]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'shippinginfo_id' => ['required','integer'],
            'cart' => ['required'],
        ]);

        $data = $request->cart;

        $admins = Admin::where('role_id', 1)->with(['orders' => function ($query) {
            $query->where('status', '<=', 1);
        }], 'user', 'orders.products')->get();

        $adminGrouped = $admins->groupBy('id');

        $admin = $admins->first(function ($value, $key) {
            return count($value->orders) <= 10;
            // If theres an order assigned to admin and inprocesing or intransit <= 10;
        });

        if ($admin != null) {
            $assigneeId = $admin['id'];
            $assigneeName = $admin;
        }
        else if ($admin == null) {
            // If all admins have orders == 10 or more, pick all admins at random and assign;
            $useradmins = Admin::where('role_id', 1)->get();
            $assignee = $useradmins->random();
            $assigneeId = $assignee['id'];
            $assigneeName = $assignee;
            
        }
        foreach ($request->cart as $value => $item) {
            $order = Order::create([
                'shippinginfo_id' => $request->get('shippinginfo_id'),
                'product_id' => $item['id'],
                'orderID' => $request->get('orderID'),
                'unit_price' => $item['amount'],
                'quantity' => $item['quantity'],
                'size_id' => isset($item['size']) ? is_array($item['size']) ? $item['size']['id'] : $item['size'] : null,
                'color_id' => isset($item['color']) ? $item['color']['id'] : null,
                'discount' => $item['discount'],
                'is_customized' => isset($item['customized']) ? $item['customized'] : '0',
                'is_finished' => isset($item['customized']) ? $item['customized'] == '1' ? 1 : null : null,
                'created_at' => now(),
            ]);
            $order->admins()->sync(['admin_id' => $assigneeId]);
            // Notify product admin
            if (isset($item['customized']) && $item['customized'] == '1') {
                $colorMsg = isset($item['color']) ?  ' and the preferred color is '.$item['color']['name'].'.' : '.';
                $dataNotify = [
                    'user_id' => auth()->user()->id,
                    'order_id' => $order->id,
                    'typeof' => '2',
                    'title' => 'Pre-Order Request',
                    'message' => 
                        'A user has requested '.$item['title'].' product, with her custom size of '.$item['size'].''.$colorMsg.' Please proceed to production with above details. And return finished product to the admin that will handle the shipping process/store pickup. Thanks
                        <p>Please refer to Admin '.$assigneeName['firstname'].' '.$assigneeName['lastname'].' with orderID '.$request->get('orderID').'</p>',
                    'admin_id' => $assigneeId,
                ];
        
                $notify = Notification::create($dataNotify);
            }
        }
        
        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        $beautymail->send('emails.orderpaid', ['data' => $data], function($message)
        {
            $message
                ->from('donotreply@coloursofus.com')
                ->to(auth()->user()->email, 'Customer')
                ->subject('Order Received!');
        });

        return response()->json(['message' => 'New order added.', 'order' => $order, 'status' => 201]);
    }

    /**
     * Display the specified resource based on assigned admin.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $useradmins = User::where('user_type', 1)->with('admin.orders.products.images', 'admin.orders.customer', 'admin.orders')->get();
        $orders = Order::whereRelation('admins', 'admins.id', $id)->with('products.images', 'customer')->get();
        $ordersGrouped = $orders->groupBy('orderID');
        // $adminOrders = $useradmins->where('admin.id', $id)->first();
        // dd($orders->groupBy('orderID'));
        return response()->json(['orders' => $orders, 'ordersGrouped' => $ordersGrouped, 'message' => 'Retrieved successfuly'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => ['nullable'],
            'time_to_finish_customized' => ['nullable'],
            'user' => ['required']
        ]);
        $orders = new Order();
        
        $order = $orders->findOrFail($id);
        $user = User::where('id', $request->user)->value('email');
        isset($request->status) ? $order->status = $request->status : $order->time_to_finish_customized = $request->time_to_finish_customized;
        $order->save();
        $data = $order->where('id', $id)->with('product.images', 'color', 'size')->get();
        $orders = Order::get();
        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        if (isset($request->status) && $request->status == 1) {
            $beautymail->send('emails.orderShipped', ['data' => $data], function($message) use($user)
            {
                $message
                    ->from('donotreply@coloursofus.com')
                    ->to($user, 'Customer')
                    ->subject('Order Has Been Shipped!');
            });
        }
        elseif (isset($request->time_to_finish_customized)) {
            $beautymail->send('emails.orderCustomized', ['data' => $data], function($message) use($user)
            {
                $message
                    ->from('donotreply@coloursofus.com')
                    ->to($user, 'Customer')
                    ->subject('Customized Order Prod. Period!');
            });
        }
        return response()->json(['message' => 'Order updated successfully', 'order' => $order, 'orders' => $orders]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::where('id', $id)->delete();
        return response()->json(['message' => 'Archived successfuly'], 204);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $id
     * @return \Illuminate\Http\Response
     */
    public function refresh($id)
    {
        Order::where('id', $id)->restore();
        return response()->json(['message' => 'Unarchived successfuly'], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function markFinished(Request $request, $id)
    {
        $request->validate([
            'is_finished' => ['required'],
        ]);
        
        $order = Order::findOrFail($id);
        unset($order->is_finished);
        // $order->fill(['status' => $request->status]);
        $order->is_finished = $request->is_finished;
        $order->save();
        return response()->json(['message' => 'Order updated successfully', 'order' => $order, 'status' => 200]);
    }

    // Get Products Ordered by a user 
    public function myOrders($userId) {
        $shippinginfo = Shippinginfo::whereRelation('user', 'users.id', $userId)->pluck('id');
        $orders = Order::whereIn('shippinginfo_id', $shippinginfo)->with('product.images', 'product.colors', 'product.sizes', 'admins', 'shippinginfo.state', 'shippinginfo.lga')->withTrashed('order')->get();
        return response()->json(['orders' => $orders, 'message' => 'Orders retrieved successfuly'], 200);
    }
}
