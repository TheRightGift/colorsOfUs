<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Promotional;
use Illuminate\Http\Request;

class PromotionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotionals = new Promotional();
        $promotionalTrashed = $promotionals->onlyTrashed()->with('products.images')->paginate();
        $promotionals = $promotionals->withTrashed()->with('products.images')->paginate();
        return response()->json(['message' => 'promotionals retrieved successfully', 'promotionals' => $promotionals, 'promotionalTrashed' => $promotionalTrashed]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $promotionals = new Promotional();
        $request->validate([
            'type' => ['required'],
            'desc' => ['nullable'],
            'cover' => ['nullable'],
            'discount' => ['nullable'],
            'price' => ['nullable'],
        ]);
        
        $promotional = $promotionals->create([
            'type' => $request->get('type'),
            'desc' => $request->get('desc'),
            'cover' => $request->get('cover'),
            'discount' => $request->get('discount'),
            'price' => $request->get('price'),
            'created_at' => now(),
        ]);
        if (count($request->product_id)) {
            $promotional->products()->sync($request->product_id);
        }
        $promotionals = Promotional::withTrashed()->with('products.images')->paginate();
        return response()->json(['message' => 'New promotional added.', 'promotionals' => $promotionals, 'status' => 1]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promotional  $promotional
     * @return \Illuminate\Http\Response
     */
    public function show(Promotional $promotional)
    {
        $promotional = Promotional::where('id', $id)->first();
        return response()->json(['promotional' => $promotional, 'message' => 'promotional retrieved successfuly'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promotional  $promotional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $promotional)
    {
        // $promotionals = new Promotional();
        $request->validate([
            'type' => ['required'],
            'desc' => ['nullable'],
            'cover' => ['nullable'],
            'discount' => ['nullable'],
            'price' => ['nullable'],
        ]);

        $promotional = Promotional::where('id', $promotional)->first();
        $promotional->update($request->only(['type', 'desc', 'cover', 'discount', 'price', 'updated_at' => now()]));
        if (count($request->product_id)) {
            $promotional->products()->sync($request->product_id);
        }
        $promotionals  = Promotional::withTrashed()->with('products.images')->paginate();
        return response()->json(['message' => 'promotional updated successfully', 'promotionals' => $promotionals, 'status' => 1]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotional  $promotional
     * @return \Illuminate\Http\Response
     */
    public function destroy($promotional)
    {
        Promotional::where('id', $promotional)->delete();
        return response()->json(['message' => 'Archived successfuly'], 204);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotional  $promotional
     * @return \Illuminate\Http\Response
     */
    public function refresh($promotional)
    {
        Promotional::where('id', $promotional)->restore();
        return response()->json(['message' => 'Unarchived successfuly'], 201);
    }

    public function remove(Request $request)
    {
        $request->validate([
            'promo_id' => ['required'],
            'product_id' => ['required'],
        ]);
        $promotionals = Promotional::findOrFail($request->promo_id);

        $promotionals->products()->detach($request->product_id);
        
        return response()->json(['message' => 'promotional updated successfully', 'promotionals' => $promotionals, 'status' => 1]);
    }
    
}
