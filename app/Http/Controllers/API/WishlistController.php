<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the product.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $wishlist = Wishlist::where('user_id', $id)->with('product.images')->paginate(1);
        return response()->json(['message' => 'Wishlists retrieved successfully', 'wishlists' => $wishlist]);
    }

    /**
     * Display a listing of the product.
     *
     * @return \Illuminate\Http\Response
     */
    public function home($id)
    {
        $wishlist = Wishlist::where('user_id', $id)->get();
        return response()->json(['message' => 'Wishlists retrieved successfully', 'wishlists' => $wishlist]);
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()) {
            $request->validate([
                'product_id' => ['required','integer'],
                'user_id' => ['required','integer'],
            ]);
            $checkData = Wishlist::where([['product_id', $request->product_id], ['user_id', $request->user_id]])->first();
            if ($checkData) {
                // Delete the product
                $checkData->delete();
                return response()->json(['message' => 'Removed from Wishlist'], 204);
            }
            else {
                // Craete
                $wishlist = Wishlist::create([
                    'product_id' => $request->get('product_id'),
                    'user_id' => $request->get('user_id'),
                    'created_at' => now(),
                ]);
                return response()->json(['success' => 'New wishlist added.', 'wishlist' => $wishlist], 201);
            }
        }
        else return response()->json(['success' => false, 'msg' => 'Please login']);

    }

    /**
     * Display the specified product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wishlist = Wishlist::where('user_id', $id)->with('product.images', 'product.promotionals', 'product.sizes', 'product.colors')->paginate();
        return response()->json(['message' => 'Wishlists retrieved successfully', 'wishlists' => $wishlist]);
    }

}
