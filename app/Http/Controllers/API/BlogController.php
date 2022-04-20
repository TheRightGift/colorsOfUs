<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Product;
use Illuminate\Http\Request;
use Validator;

class BlogController extends Controller
{

    protected function dataToValidate()
	{
		$validator = Validator::make($request->all(), [
			'body' => 'required',
            'title' => 'required|max:300|unique:blogs', 
            'category_id' => 'required',
            'status' => 'required|integer',            
		]);
        return $validator;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::withTrashed()->with('category')->paginate();
        return response()->json(['message' => 'Blogposts fetched successfuly', 'blogposts' => $blogs]);
    }

    /**
     * Display a listing of the resource published stataus.
     *
     * @return \Illuminate\Http\Response
     */
    public function published()
    {
        $blogs = Blog::where('status', 'published')->with('category')->paginate();
        return response()->json(['message' => 'Blogposts fetched successfuly', 'blogposts' => $blogs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->dataToValidate();
        if ($data->fails()){
            return response()->json(['errors' => $data->errors()->all()]);
        }
        else {
            $blog = Blog::create([
                'body' => $data->body,
                'title' => $data->title,
                'category_id' => $data->category_id,
                'status' => $data->status == 1 ? 'published' : 'saved',
            ]);
            return response()->json(['blogpost' => $blog, 'message' => 'Insert is successful'], 200);
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($blog)
    {
        $blog = Blog::where('title', $title)->firstOrFail();
        $product = Product::whereRelations('categories', 'categories.id', $blog['category_id'])->with('images')->get(); //Get related products by categories ie products that are in same category with blog viwing;
        return response()->json(['blogpost' => $blog, 'product' => $product, 'message' => 'Blogpost retrieved successfuly'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->dataToValidate();
        if ($data->fails()){
            return response()->json(['errors' => $data->errors()->all()]);
        }
        else {
            $blog = Blog::find($id)->update($request->only([
                'body' => $data->body,
                'title' => $data->title,
                'category_id' => $data->category_id,
                'status' => $data->status == 1 ? 'published' : 'saved',
            ]));
            return response()->json(['blogpost' => $blog, 'message' => 'Update is successful'], 200);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::where('id', $id)->first();
        $blog->delete();
        return response()->json(['message' => 'Archived successfuly'], 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $id
     * @return \Illuminate\Http\Response
     */
    public function refresh($id)
    {
        $blog = Blog::where('id', $id)->withTrashed()->first();
        $blog->restore();
        return response()->json(['message' => 'Unarchived successfuly'], 201);
    }
}
