<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Admin;
use App\Models\Blog;

class DBController extends Controller
{
    // Gets all the States and LGAs
    public function index() {
        $states = DB::select('select * from states');
        $lgas = DB::select('select * from local_governments');

        return response()->json(['states' => $states, 'lgas' => $lgas, 'status' => 'ok']);
    }

    public function show() {
        $resources = Product::get();
        $orders = Order::with('product.images', 'shippinginfo.user', 'product.colors', 'product.sizes')->latest()->get();
        $customers = User::where('user_type', 0)->get();
        $admins = Admin::get();
        return response()->json(['message' => 'Success Fetching Data', 'status' => 1, 'res' => $resources, 'orders' => $orders, 'customers' => $customers, 'admins' => $admins ]);
    }

    public function user() {
        $customers = User::where('user_type', 0)->with('shippinginfos.orders.product.images', 'shippinginfos.state', 'shippinginfos.lga', 'profile')->paginate();
        return response()->json(['message' => 'Success Fetching Data', 'status' => 1, 'users' => $customers ]);
    }

    public function search($q) {
        $products = Product::where('title', 'LIKE', "%{$q}%")->with('images', 'colors', 'sizes', 'promotionals')->get();
        $blogs = Blog::where('title', 'LIKE', "%{$q}%")->with('images')->get();
        $result = $products->toBase()->merge($blogs)->paginate(20);
        $result->sortBy('created_at');
        return response()->json(['message' => 'Success Fetching Data', 'status' => 1, 'results' => $result ]);
    }
}
