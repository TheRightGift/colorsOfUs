<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Admin;

class DBController extends Controller
{
    // Gets all the States and LGAs
    public function index() {
        $states = DB::select('select * from states');
        $lgas = DB::select('select * from local_governments');

        return response()->json(['states' => $states, 'lgas' => $lgas, 'status' => 'ok']);
    }

    public function show() {
        $resources = Product::get()->count();
        $orders = Order::get()->count();
        $customers = User::where('user_type', 0)->get()->count();
        $admins = Admin::get()->count();
        return response()->json(['message' => 'Success Fetching Data', 'status' => 1, 'res' => $resources, 'orders' => $orders, 'customers' => $customers, 'admins' => $admins ]);
    }

    public function user() {
        $customers = User::where('user_type', 0)->paginate();
        return response()->json(['message' => 'Success Fetching Data', 'status' => 1, 'users' => $customers ]);
    }
}
