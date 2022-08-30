<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Product;
use Illuminate\Http\Request;
use Validator;

class BlogController extends Controller
{

    protected function dataToValidate(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'body' => 'required',
            'title' => 'required|max:300|unique:blogs', 
            'category_id' => 'required',
            'status' => 'required|string',
            'imageUrl' => 'nullable',
            'postedBy' => 'nullable',        
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
        $blogs = Blog::with('category', 'images')->paginate();
        $blogsTrashed = Blog::onlyTrashed()->with('category', 'images')->paginate();
        return response()->json(['message' => 'Blogposts fetched successfuly', 'blogposts' => $blogs, 'trashed' => $blogsTrashed]);
    }

    /**
     * Display a listing of the resource published stataus.
     *
     * @return \Illuminate\Http\Response
     */
    public function published()
    {
        $blogs = Blog::where('status', 'published')->with('images', 'category')->paginate();
        $blogsTrashed = Blog::onlyTrashed()->where('status', 'published')->with('images', 'category')->paginate();
        return response()->json(['message' => 'Blogposts fetched successfuly', 'blogposts' => $blogs, 'trashed' => $blogsTrashed]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->dataToValidate($request);
        if ($data->fails()){
            return response()->json(['errors' => $data->errors()->all()]);
        }
        else {
            $input = $data->validated();
            $blog = Blog::create([
                'body' => $input['body'],
                'title' => $input['title'],
                'category_id' => $input['category_id'],
                'status' => $input['status'],
                'postedBy' => $input['postedBy'],
            ]);

            $blog->images()->create([
                'url' => $input['imageUrl'],
                'imageable_id' => $blog['id'],
                'imageable_type' => Blog::class,
            ]);


            return response()->json(['blogpost' => $blog, 'message' => 'Insert is successful', 'status' => 1], 200);
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
        $data = new Blog();
        $blog = $data->where('title', $blog)->with('images')->firstOrFail();
        $blogs = $data->with('images')->where('status', 'published')->latest()->take(6)->get();
        $archives = $data->where('status', 'published')->oldest()->take(10)->get();
        $product = Product::whereRelation('categories', 'categories.id', $blog['category_id'])->with('images')->get(); //Get related products by categories ie products that are in same category with blog viwing;
        return response()->json(['blogpost' => $blog, 'product' => $product, 'recent' => $blogs, 'archives' => $archives, 'message' => 'Blogpost retrieved successfuly'], 200);
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
        $blog = Blog::find($id)->update($request->only([
            'body',
            'title',
            'category_id',
            'status',
        ]));
        return response()->json(['blogpost' => $blog, 'message' => 'Update is successful', 'status' => 1], 200);
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
