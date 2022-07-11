<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\User;
use App\Models\Order;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::with('role', 'user', 'orders.product.images', 'orders.shippinginfo.user', 'orders.shippinginfo.state', 'orders.shippinginfo.lga', 'orders.product.colors', 'orders.product.sizes',)->withTrashed('user')->get();
        return response()->json(['message' => 'Admins fetched successfuly', 'admins' => $admin]);
    }

    /**
     *  Assign Role to the Admin
     *  @param  \Illuminate\Http\Request  $request
     *  @param  \App\Models\Role  $role
     */
    public function assign(Request $request) 
    {
        // Assign a role to the selected admin
        $request->validate([
            'admin_id' => ['required'],
            'role_id' => ['required'],
        ]);

        Admin::find($request->admin_id)->update(['role_id' => $request->role_id, 'updated_at' => now()]); 
        
        $adminRole = Admin::find($request->admin_id)->withTrashed('user')->with('role', 'user', 'orders.product.images', 'orders.shippinginfo')->get();
        return response()->json(['message' => 'New role added.', 'admins' => $adminRole, 'status' => 1]);
    }

    /**
     * Fetch all admins where usertype = 1 || 2
     */
    public function admin() {
        $admin = Admin::with('role', 'user', 'orders.product.images', 'orders.shippinginfo', 'orders.shippinginfo.state', 'orders.shippinginfo.lga', 'orders.product.colors', 'orders.product.sizes',)->withTrashed('user')->get();
        return response()->json(['message' => 'Admins fetched successfuly', 'admins' => $admin]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = new Order();
        $admin = Admin::where('user_id', $id)->with('role', 'user', 'orders.product.images', 'orders.shippinginfo.user', 'orders.product.colors', 'orders.product.sizes', 'orders.shippinginfo.state', 'orders.shippinginfo.lga')->first();
        $order = $orders->get();
        $ordersGrouped = $orders->with('admins')->get()->groupBy('orderID');
        
        return response()->json(['admin' => $admin, 'message' => 'Admin retrieved successfuly', 'orders' => $order, 'ordersGrouped' => $ordersGrouped], 200);
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
            'firstname' => 'required',
            'lastname' => 'required',
            'othername' => 'nullable',
            'username' => 'nullable',
            'phone' => 'required',
            'phone2' => 'nullable',
            'address' => 'required',
            'lga' => 'required',
            'state' => 'required',
            'gender' => 'nullable',
        ]);
        $admin = Admin::findOrFail($id);
        if($request->hasFile('profile_img')){
            $image = $request->file('profile_img');
            $name = $image->getClientOriginalName();
            
            $image->move(public_path('/img/profile/'), $name);
            $imageToDelete = public_path($admin->profile_img);
            if (file_exists($imageToDelete) && $admin->profile_img != '')
            {
                unlink($imageToDelete);
            }
            $image = '/img/profile/'.$name;
        }
        else {
           $image = $request->profile_img;
        }
        $data = $request->only(['lastname', 'firstname', 'othername', 'phone', 'phone2', 'state', 'address',  'gender', 'lga', 'updated_at']);
            
        $data['updated_at'] = now();
        $data['profile_img'] = $image;
        $admin->update($data);
        
        $userData = User::findOrFail($request->user_id);
        $userData->user_type = $request->user_type;

        $userData->save();
        return response()->json(['message' => 'Update added.', 'admin' => $admin, 'status' => 200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::where('id', $id)->first();
        User::where('id', $admin->user_id)->delete();
        $admin->delete();
        return response()->json(['message' => 'Archived successfuly'], 204);
    }
    
    /**
     * Restores the specified resource from storage.
     *
     * @param  \App\Models\Admin  $id
     * @return \Illuminate\Http\Response
     */
    public function refresh($id)
    {
        $admin = Admin::where('id', $id)->withTrashed()->first();
        User::where('id', $admin->user_id)->restore();
        $admin->restore();
        return response()->json(['message' => 'Unarchived successfuly'], 201);
    }
}
