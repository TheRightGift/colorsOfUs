<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function postImageUploader(Request $request)
    {
        // $accepted_origins = array("http://localhost", "http://earthandmankind.org");
        $validator = Validator::make($request->all(), ['image.*' => 'mimes:jpeg,png,jpg,gif,svg|max:1024']);
        if($validator->fails()){
            return ['error' => $validation->errors()->all() ];
        }
        else {
           if ($request->hasFile('image')) {
                $images = $request->image->getClientOriginalName();
                // $images = time().'_'.$images; // Add current time before image name
                $path = $request->image->move(public_path('/blogposts/images/'),$images);
                $pathe = ("/blogposts/images/").$images;
                return response()->json(['location' => $pathe]);

            }
        }
    }
}
