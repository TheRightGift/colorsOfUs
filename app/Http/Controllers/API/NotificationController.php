<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Admin;
use App\Models\Order;

class NotificationController extends Controller
{
    //
    /**
     * When Admin Requests to delete an order;
     * Send Notification to all techAdmin to delete it;
     */
    public function notifyCancel(Request $request) {
        $request->validate([
            'user_id' => 'required',
            'order_id' => 'required|integer',
            'typeof' => 'required',
            'message' => 'nullable',
            'admin_id' => 'nullable', //Admin_id handling the order.
        ]);
        
        $data = $request->only([
            'user_id',
            'order_id',
            'typeof',
            'message',
            'admin_id',
        ]);

        $notify = Notification::create($data);
        $orderToCancel = Order::findOrFail($request->order_id)->delete();
        return response()->json(['message' => 'Order Cancelled', 'status' => 200, 'notify' => $notify]);
    }

    public function markRead($id) {
        $notifyMark = Notification::findOrFail($id)->update(['track' => '1', 'updated_at' => now()]);

        return response()->json(['messge' => 'Updated', 'status' => 200]);
    }

    public function index() {
        $notify = Notification::with('order', 'admin')->latest()->paginate();

        return response()->json(['messge' => 'Success Fetching', 'status' => 200, 'notify' => $notify]);
    }

    public function prdMin() {
        $notifiers = Notification::where('typeof', '2');
        $notify = $notifiers->with('order', 'admin', 'user')->get();

        return response()->json(['messge' => 'Success Fetching', 'status' => 200, 'notify' => $notify]);
    }
}
