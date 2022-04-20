<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::withTrashed()->get();
        return response()->json(['message' => 'Roles retrieved successfully', 'roles' => $roles]);
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
            'name' => ['required','string', 'max:75'],
            'desc' => ['nullable','string', 'max:75'],
        ]);
        
        $role = Role::create([
            'name' => $request->get('name'),
            'desc' => $request->get('desc'),
            'created_at' => now(),
        ]);
        $roles = Role::get();
        return response()->json(['message' => 'New role added.', 'roles' => $roles, 'status' => 1]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $role = Role::where('id', $id)->first();
        return response()->json(['role' => $role, 'message' => 'Role retrieved successfuly'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $role)
    {
        $request->validate([
            'name' => ['required', 'max:75'],
            'desc' => ['nullable', 'max:75'],
        ]);

        $role = Role::where('id', $role)->update($request->only(['name', 'desc', 'updated_at' => now()]));
        $roles = Role::get();
        return response()->json(['message' => 'Role updated successfully', 'roles' => $roles, 'status' => 1]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($role)
    {
        Role::where('id', $role)->delete();
        return response()->json(['message' => 'Archived successfuly'], 204);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function refresh($role)
    {
        Role::where('id', $role)->restore();
        return response()->json(['message' => 'Unarchived successfuly'], 201);
    }
    
}
