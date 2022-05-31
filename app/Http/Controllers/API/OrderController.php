<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Snowfire\Beautymail\Beautymail;
use App\Mail\OrderReceived;
use App\Models\Order;
use App\Models\User;
use App\Models\Admin;
use App\Models\Notification;
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
        // $orders = Order::where('shippinginfo_id', $id)->with('products.images');
        
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
        
        return response()->json(['message' => 'Orders retrieved successfully', 'orders' => $orders]);
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
        // dd($data);
        // $useradmins = User::where('user_type', 1)->with('admin')->get('id');
        // echo($useradmins);
        // $users = DB::table('users')->where('user_type', 1)
        //     ->join('admins', 'users.id', '=', 'admins.user_id')
        //     ->join('admin_order', 'admins.id', '=', 'admin_order.admin_id')
        //     ->join('orders', 'admin_order.order_id', 'orders.id')->where('status', '<=', 1)
        //     ->join('products', 'orders.product_id', 'products.id')
        //     ->select('users.email', 'admins.*', 'orders.quantity', 'orders.status', 'products.title')
        //     ->get();
        $admins = Admin::where('role_id', 1)->with(['orders' => function ($query) {
            $query->where('status', '<=', 1);
        }], 'user', 'orders.products')->get();
        $adminGrouped = $admins->groupBy('id');
        $admin = $admins->first(function ($value, $key) {
            return count($value->orders) <= 10;
        });
        
        // If theres an order assigned to admin and inprocesing or intransit <= 10;
        if ($admin != null) {
            $assignee = $admins->pluck('id')->unique();
            $assigneeId = $assignee[0];
            // dd($admin, $assignee, $assigneeId);
        }
        else if ($admin == null) {
            $useradmins = Admin::where('role_id', 1)->doesntHave('orders')->with('user')->first();
            // dd($useradmins);
            if ($useradmins != null) {
                // If on orders table the admins have 10 items at hand processing, pick other admins from or admin that doesn't have orders;
                $assigneeId = $useradmins->admin['id'];
            }
            else {
                // If all admins have orders == 10 or more, pick all admins at random and assign;
                $useradmins = User::where('user_type', 1)->with('admin.orders.products')->get();
                $assignee = $useradmins->pluck('admin.id');
                $assigneeId = $assignee->random();
            }
        }
        foreach ($request->cart as $value => $item) {
            // dd($item['customized'], $item);
            $order = Order::create([
                'shippinginfo_id' => $request->get('shippinginfo_id'),
                'product_id' => $item['id'],
                'orderID' => $request->get('orderID'),
                'unit_price' => $item['amount'],
                'unit_price' => $item['amount'],
                'quantity' => $item['quantity'],
                'size_id' => is_array($item['size']) ? $item['size']['id'] : $item['size'],
                'color_id' => $item['color']['id'],
                'created_at' => now(),
            ]);
            $order->admins()->sync(['admin_id' => $assigneeId]);
            if ($item['customized'] == '1') {
            // Notify product admin
                $dataNotify = [
                    'user_id' => auth()->user()->id,
                    'order_id' => $order->id,
                    'typeof' => '2',
                    'message' => 'A User has requested a custom size of '.$item['size'].',proceed to production.',
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
            'status' => ['required'],
        ]);
        
        $order = Order::findOrFail($id);
        unset($order->status);
        // $order->fill(['status' => $request->status]);
        $order->status = $request->status;
        $order->save();
        return response()->json(['message' => 'Order updated successfully', 'order' => $order]);
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
}
