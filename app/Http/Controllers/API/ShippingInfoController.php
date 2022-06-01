<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shippinginfo;
use App\Models\User;

class ShippinginfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::withTrashed()->where('user_type', 0)->with('shippinginfo.orders.products', 'shippinginfo.orders.admins')->paginate();
        return response()->json(['message' => 'Shippinginfos fetched successfuly', 'users' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'integer'],
            'lastname' => 'required',
            'firstname' => 'nullable',
            'othername' => 'nullable',
            'phone' => 'required',
            'phone2' => 'nullable',
            'city' => 'required',
            'state' => 'required',
            'address' => 'required',
            'address2' => 'nullable',
            'postal_code' => 'required',
            'lga' => 'required',
        ]);
        $data = $request->only([
            'lastname',
            'firstname',
            'othername',
            'phone',
            'phone2',
            'city',
            'state',
            'country',
            'address',
            'address2',
            'postal_code',
            'lga',
            'created_at' => now(),
            'user_id',
        ]);
        $shippinginfo = Shippinginfo::create($data);
        return response()->json(['message' => 'New Shippinginfo added.', 'shippinginfo' => $shippinginfo, 'status' => 'ok']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($userId)
    {
        $shippinginfo = Shippinginfo::whereRelation('user', 'users.id', $userId)->with('order.product.images', 'order.product.colors', 'order.product.sizes', 'order.admins')->withTrashed('order')->get();
        return response()->json(['shippinginfo' => $shippinginfo, 'message' => 'Shippinginfo retrieved successfuly'], 200);
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
            'lastname' => 'required',
            'firstname' => 'required',
            'othername' => 'nullable',
            'phone' => 'required',
            'phone2' => 'nullable',
            'state' => 'required',
            'country' => 'required',
            'address' => 'required',
            'address2' => 'nullable',
            'postal_code' => 'required',
            'lga' => 'required',
        ]);

        $shippinginfo = Shippinginfo::where('id', $id)->update($request->only([
            'lastname', 'firstname', 'othername', 'phone', 'phone2', 
            'state', 'country', 'address', 'address2', 'postal_code', 'lga', 'updated_at' => now()]));

        return response()->json(['message' => 'Shippinginfo updated successfully', 'shippinginfo' => $shippinginfo]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Shippinginfo::where('id', $id)->delete();
        return response()->json(['message' => 'Archived successfuly'], 204);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shippinginfo  $id
     * @return \Illuminate\Http\Response
     */
    public function refresh($id)
    {
        Shippinginfo::where('id', $id)->restore();
        return response()->json(['message' => 'Unarchived successfuly'], 201);
    }
}
