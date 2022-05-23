<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Validator;

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
                $path = $request->image->move(public_path('/img/uploads/'),$images);
                $pathe = ("/img/uploads/").$images;
                // $hostname = $_SERVER['SERVER_NAME'];
                // dd($hostname.$pathe);
                return response()->json(['location' => $pathe]);

            }
        }
    }
}
