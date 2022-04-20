<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $color = Color::where('deleted_at', null)->paginate();
        $size = new Size();
        $trashed = $size->onlyTrashed()->get();
        $untrashed = $size->get();
        return response()->json(['message' => 'Size fetched successfuly', 'trashed' => $trashed, 'untrashed' => $untrashed]);
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
        
        $size = Size::create([
            'name' => $request->get('name'),
            'desc' => $request->get('desc'),
            'created_at' => now(),
        ]);

        return response()->json(['message' => 'New size added.', 'size' => $size, 'status' => 1]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $size = Size::where('id', $id)->first();
        return response()->json(['size' => $size, 'message' => 'Size retrieved successfuly'], 200);
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
            'name' => ['required', 'max:75'],
            'desc' => ['nullable', 'max:75'],
        ]);

        $size = Size::where('id', $id)->update($request->only(['name', 'desc', 'updated_at' => now()]));
        return response()->json(['message' => 'Size updated successfully', 'status' => $size]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Size::where('id', $id)->delete();
        return response()->json(['message' => 'Archived successfuly'], 204);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $id
     * @return \Illuminate\Http\Response
     */
    public function refresh($id)
    {
        Size::where('id', $id)->restore();
        return response()->json(['message' => 'Unarchived successfuly'], 201);
    }
}
