<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::withTrashed()->where('user_type', 0)->with('profile', 'shippinginfos')->paginate();
        return response()->json(['message' => 'Profiles fetched successfuly', 'users' => $user]);
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
            'firstname' => 'required',
            'othername' => 'nullable',
            'username' => 'nullable',
            'gender' => 'nullable'
        ]);
        $data = $request->only([
            'lastname',
            'firstname',
            'othername',
            'gender',
            'username',
            'user_id',
            'created_at' => now(),
        ]);
        $profile = Profile::create($data);

        return response()->json(['message' => 'New Profile added.', 'Profile' => $profile, 'status' => 'ok']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($userId)
    {
        $profile = Profile::where('user_id', $userId)->first();
        return response()->json(['Profile' => $profile, 'message' => 'Profile retrieved successfuly'], 200);
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
            'user_id' => ['required', 'integer'],
            'lastname' => 'required',
            'firstname' => 'required',
            'othername' => 'nullable',
            'username' => 'nullable',
            'gender' => 'nullable'
        ]);

        $profile = Profile::where('id', $id)->update($request->only([
            'lastname',
            'firstname',
            'othername',
            'gender',
            'username',
            'updated_at' => now()]));

        return response()->json(['message' => 'Profile updated successfully', 'Profile' => $profile]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Profile::where('id', $id)->delete();
        return response()->json(['message' => 'Archived successfuly'], 204);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $id
     * @return \Illuminate\Http\Response
     */
    public function refresh($id)
    {
        Profile::where('id', $id)->restore();
        return response()->json(['message' => 'Unarchived successfuly'], 201);
    }
}
