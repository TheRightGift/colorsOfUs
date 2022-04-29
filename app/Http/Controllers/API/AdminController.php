<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::withTrashed()->with('role', 'user')->paginate();
        return response()->json(['message' => 'Admins fetched successfuly', 'admins' => $admin]);
    }

    /**
     * Fetch all admins where usertype = 1 || 2
     */
    public function admin() {
        $admin = Admin::with('role', 'user', 'orders.products.images', 'orders.shippinginfo')->withTrashed('user')->get();
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
        $admin = Admin::where('user_id', $id)->first();
        return response()->json(['admin' => $admin, 'message' => 'Admin retrieved successfuly'], 200);
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
        ]);
        $admin = Admin::findOrFail($id);
        if($request->hasFile('profile_img')){
            $image = $request->file('profile_img');
            $name = $image->getClientOriginalName();
            
            $image->move(public_path('/images/profile/'), $name);
            $imageToDelete = public_path($admin->profile_img);
            if (file_exists($imageToDelete) && $admin->profile_img != '')
            {
                unlink($imageToDelete);
            }
            $image = '/images/profile/'.$name;
        }
        else {
            $image = $request->profile_img;
        }
        $admin->update([
            'lastname', 'firstname', 'othername', 'phone', 'phone2', 
            'state', 'address', 'profile_img' => $image, 'lga', 'gender', 'updated_at' => now()]);
        
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
