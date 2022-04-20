<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = new Category();
        $trashed = $categories->onlyTrashed()->get();
        $untrashed = $categories->get();
        return response()->json(['message' => 'Categories fetched successfuly', 'trashed' => $trashed, 'untrashed' => $untrashed]);
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
            'name' => ['required', 'string', 'max:256'],
            'desc' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048']
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $image->move(public_path('/images/resources/'), $name);
            $data = '/images/resources/'.$name;
        }    
        $category = Category::create([
            'name' => $request->get('name'),
            'desc' => $request->get('desc'),
            'image' => $data,
            'created_at' => now(),
        ]);
        $categories = Category::get();
        return response()->json(['message' => 'New Category added.', 'categories' => $categories, 'status' => 1]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $category = Category::where('id', $id)->first();
        return response()->json(['category' => $category, 'message' => 'Retrieved Success'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'max:256'],
            'desc' => ['nullable', 'max:1500'],
            // 'image' => ['nullable', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048']
        ]);
        $categories = new Category();
        $cate = $categories->whereId($id)->first();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $image->move(public_path('/images/resources/'), $name);
            $imageToDelete = public_path($cate->image);
            if (file_exists($imageToDelete) && $cate->image != '')
            {
                unlink($imageToDelete);
            }
            $data = '/images/resources/'.$name;
        }
        else {
            $data = $request->image;
        }
        $category = $cate->update(['name' => $request->name, 'desc' => $request->desc, 'image' => $data, 'updated_at' => now()]);
        return response()->json(['message' => 'Category updated successfuly', 'status' => $category, 'categories' => $categories->get()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id', $id)->delete();
        return response()->json(['message' => 'Archived successfuly'], 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $id
     * @return \Illuminate\Http\Response
     */
    public function refresh($id)
    {
        Category::where('id', $id)->restore();
        return response()->json(['message' => 'Unarchived successfuly'], 201);
    }
}
