<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the Product.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::with('categories', 'images', 'wishlists')->paginate();
        $trashed = Product::with('categories', 'images', 'wishlists')->onlyTrashed()->get();
        return response()->json(['message' => 'Products fetched successfuly', 'products' => $product, 'trashed' => $trashed]);
    }

    /**
     * Display a listing of the Product.
     *
     * @return \Illuminate\Http\Response
     */
    public function sort($sortBy, $category)
    {
        if (($sortBy == 'asc' || $sortBy == 'desc') && $category != 'null') {
            $product = Product::orderBy('amount', $sortBy)->whereRelations('categories', 'categories.id', $id)->with('categories', 'images', 'wishlists')->paginate();
            // $product = Product::orderBy('amount', $sortBy)->where('category_id', $category)->with('categories', 'images', 'wishlists')->paginate();
            $trashed = Product::orderBy('amount', $sortBy)->with('categories', 'images', 'wishlists')->onlyTrashed()->paginate();
            return response()->json(['message' => 'Products fetched successfuly', 'products' => $product, 'trashed' => $trashed]);
        }
        else if ($sortBy == 'asc' || $sortBy == 'desc') {
            $product = Product::orderBy('amount', $sortBy)->with('categories', 'images', 'wishlists')->paginate();
            $trashed = Product::orderBy('amount', $sortBy)->with('categories', 'images', 'wishlists')->onlyTrashed()->paginate();
            return response()->json(['message' => 'Products fetched successfuly', 'products' => $product, 'trashed' => $trashed]);
        }
        else if ($sortBy == 'latest' && $category != 'null') {
            // $product = Product::where('category_id', $category)->with('categories', 'images', 'wishlists')->paginate();
            // $trashed = Product::where('category_id', $category)->with('categories', 'images', 'wishlists')->onlyTrashed()->get();
            $product = Product::whereRelations('categories', 'categories.id', $id)->with('categories', 'images', 'wishlists')->paginate();
            $trashed = Product::whereRelations('categories', 'categories.id', $id)->with('categories', 'images', 'wishlists')->onlyTrashed()->get();
            return response()->json(['message' => 'Products fetched successfuly', 'products' => $product, 'trashed' => $trashed]);
        }
        else if ($sortBy == 'latest') {
            $product = Product::with('categories', 'images', 'wishlists')->paginate();
            $trashed = Product::with('categories', 'images', 'wishlists')->onlyTrashed()->get();
            return response()->json(['message' => 'Products fetched successfuly', 'products' => $product, 'trashed' => $trashed]);
        }
    }

    /**
     * Filter items by class or category or subject.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        // Cos the JS returns only the index, and index that are truthy is valid
        $color = array_keys($request->color, true);
        $price = $request->price;
        $category = array_keys($request->category, true);
        if (count($color) && count($category) && !empty($price)) {
            $result = Product::whereRelations('category_color', 'category_color.id', $color)->whereRelations('categories', 'categories.id', $category)->whereBetween('amount', $price)->with('categories', 'images', 'wishlists')->paginate();
        }
        else if (count($color) && count($category)) {
            $result = Product::whereRelations('category_color', 'category_color.id', $color)->whereRelations('categories', 'categories.id', $category)->with('categories', 'images', 'wishlists')->paginate();
        }
        else if (count($category) && !empty($price)) {
            $result = Product::whereRelations('categories', 'categories.id', $category)->whereBetween('amount', $price)->with('categories', 'images', 'wishlists')->paginate();
        }
        else if (count($color) && !empty($price)) {
            $result = Product::whereRelations('category_color', 'category_color.id', $color)->whereBetween('amount', $price)->with('categories', 'images', 'wishlists')->paginate();
        }
        else if (count($color)) {
            $result = Product::whereRelations('category_color', 'category_color.id', $color)->with('categories', 'images', 'wishlists')->paginate();
        }
        else if (count($category)) {
            $result = Product::whereRelations('categories', 'categories.id', $category)->with('categories', 'images', 'wishlists')->paginate();
        }
        else if (!empty($price)) {
            $result = Product::whereBetween('amount', $price)->with('categories', 'images', 'wishlists')->paginate();
        }
        return response()->json(['message' => 'Products fetched successfuly', 'products' => $result]);
    }

    /**
     * Display a listing of the Product for home.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $product = Product::with('categories', 'images', 'wishlists')->latest()->get();
        return response()->json(['message' => 'Products fetched successfuly', 'products' => $product]);
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:75'],
            'category_id' => ['required'],
            'desc' => ['nullable', 'string'],
            'amount' => ['required', 'integer'],
            'stock' => ['nullable', 'integer'],
            'imgOne' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:500',
            'imgTwo' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:500',
            'imgThree' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:500',
            'imgFour' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:500',
            'imgFive' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:500',
            'imgSix' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:500',
            'recommended' => 'nullable',
        ]);
        // TODO: Include Category for each Product
        $product = Product::create([
            'title' => $request->title,
            'recommended' => $request->recommended,
            'desc' => $request->desc,
            'amount' => $request->amount,
            'stock' => $request->stock,
            'created_at' => now(),
        ]);

        $product->categories()->sync(['category_id' => $request->category_id]);

        if($request->hasFile('imgOne')){
            $image = $request->file('imgOne');
            $name = $image->getClientOriginalName();
            // dd($name);
            // $imgOneThumb = \Image::make($image->getRealPath());
            // $imgOneThumb->resize(540, 600);
            // $imgOneThumb->save(public_path('/images/Products/').$name);
            $image->move(public_path('/images/Products/'), $name);
            $product->images()->create([
                'url' => $name,
                'imageable_id' => $product['id'],
                'imageable_type' => Product::class,
            ]);
        }       
        if($request->hasFile('imgTwo')){
            $image = $request->file('imgTwo');
            $name = $request->file('imgTwo')->getClientOriginalName();
            // \Image::make($image->getRealPath())->resize(540, 600)->save(public_path('/images/Products/').$name);
            $image->move(public_path('/images/Products/'), $name);
            $product->images()->create([
                'url' => $name,
                'imageable_id' => $product['id'],
                'imageable_type' => Product::class,
            ]);
        }
        if($request->hasFile('imgThree')){
            $image = $request->file('imgThree');
            $name = $request->file('imgThree')->getClientOriginalName();
            $image->move(public_path('/images/Products/'), $name);
            // \Image::make($image->getRealPath())->resize(540, 600)->save(public_path('/images/Products/').$name);
            $product->images()->create([
                'url' => $name,
                'imageable_id' => $product['id'],
                'imageable_type' => Product::class,
            ]);
        }
        if($request->hasFile('imgFour')){
            $image = $request->file('imgFour');
            $name = $request->file('imgFour')->getClientOriginalName();
            $image->move(public_path('/images/Products/'), $name);
            // \Image::make($image->getRealPath())->resize(540, 600)->save(public_path('/images/Products/').$name);
            $product->images()->create([
                'url' => $name,
                'imageable_id' => $product['id'],
                'imageable_type' => Product::class,
            ]);
        }
        if($request->hasFile('imgFive')){
            $image = $request->file('imgFive');
            $name = $request->file('imgFive')->getClientOriginalName();
            $image->move(public_path('/images/Products/'), $name);
            // \Image::make($image->getRealPath())->resize(540, 600)->save(public_path('/images/Products/').$name);
            $product->images()->create([
                'url' => $name,
                'imageable_id' => $product['id'],
                'imageable_type' => Product::class,
            ]);
        }
        if($request->hasFile('imgSix')){
            $image = $request->file('imgSix');
            $name = $request->file('imgSix')->getClientOriginalName();
            $image->move(public_path('/images/Products/'), $name);
            // \Image::make($image->getRealPath())->resize(540, 600)->save(public_path('/images/Products/').$name);
            $product->images()->create([
                'url' => $name,
                'imageable_id' => $product['id'],
                'imageable_type' => Product::class,
            ]);
        }
        $products = Product::with('categories', 'images', 'wishlists')->paginate();
        return response()->json(['message' => 'New Product added.', 'products' => $products, 'status' => 1]);
    }

    /**
     * Display the specified Product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {
        $product = Product::where('title', $title)->with('categories', 'images', 'wishlists')->first();
        $related_product = Product::whereRelations('categories', 'categories.id', $product['category_id'])->with('images')->get();
        return response()->json(['product' => $product, 'related' => $related_product, 'message' => 'Product retrieved successfuly', 'status' => 1], 200);
    }

    /**
     * Update the specified Product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:75'],
            'category_id' => ['nullable', 'integer'],
            'recommended' => ['nullable', 'integer'],
            'desc' => ['required', 'string'],
            'amount' => ['required', 'string'],
            'stock' => ['required', 'string'],
            'deletedImgs' => 'nullable',
            'deletedImgIds' => 'nullable',
        ]);
        
        $product = Product::where('id', $id)->firstOrFail();
        if ($request->deletedImgs) {
            $imgDeleted = explode(',', $request->deletedImgs);
            $imgDeletedIds = explode(',', $request->deletedImgIds);
            $res = Image::whereIn('id', $imgDeletedIds)->forceDelete();
            foreach ($imgDeleted as $key => $value) {
                $imageToDelete = public_path('/images/Products/'.$value);
                if (file_exists($imageToDelete))
                {
                    unlink($imageToDelete);
                }
            }
        }
       
        if($request->hasFile('imgOne')){
            $image = $request->file('imgOne');
            $name = $image->getClientOriginalName();
            // dd($name);
            // $imgOneThumb = \Image::make($image->getRealPath());
            // $imgOneThumb->resize(540, 600);
            // $imgOneThumb->save(public_path('/images/Products/').$name);
            $image->move(public_path('/images/Products/'), $name);
            $product->images()->create([
                'url' => $name,
                'imageable_id' => $product['id'],
                'imageable_type' => Product::class,
            ]);
        }       
        if($request->hasFile('imgTwo')){
            $image = $request->file('imgTwo');
            $name = $request->file('imgTwo')->getClientOriginalName();
            // \Image::make($image->getRealPath())->resize(540, 600)->save(public_path('/images/Products/').$name);
            $image->move(public_path('/images/Products/'), $name);
            $product->images()->create([
                'url' => $name,
                'imageable_id' => $product['id'],
                'imageable_type' => Product::class,
            ]);
        }
        if($request->hasFile('imgThree')){
            $image = $request->file('imgThree');
            $name = $request->file('imgThree')->getClientOriginalName();
            $image->move(public_path('/images/Products/'), $name);
            // \Image::make($image->getRealPath())->resize(540, 600)->save(public_path('/images/Products/').$name);
            $product->images()->create([
                'url' => $name,
                'imageable_id' => $product['id'],
                'imageable_type' => Product::class,
            ]);
        }
        if($request->hasFile('imgFour')){
            $image = $request->file('imgFour');
            $name = $request->file('imgFour')->getClientOriginalName();
            $image->move(public_path('/images/Products/'), $name);
            // \Image::make($image->getRealPath())->resize(540, 600)->save(public_path('/images/Products/').$name);
            $product->images()->create([
                'url' => $name,
                'imageable_id' => $product['id'],
                'imageable_type' => Product::class,
            ]);
        }
        if($request->hasFile('imgFive')){
            $image = $request->file('imgFive');
            $name = $request->file('imgFive')->getClientOriginalName();
            $image->move(public_path('/images/Products/'), $name);
            // \Image::make($image->getRealPath())->resize(540, 600)->save(public_path('/images/Products/').$name);
            $product->images()->create([
                'url' => $name,
                'imageable_id' => $product['id'],
                'imageable_type' => Product::class,
            ]);
        }
        if($request->hasFile('imgSix')){
            $image = $request->file('imgSix');
            $name = $request->file('imgSix')->getClientOriginalName();
            $image->move(public_path('/images/Products/'), $name);
            // \Image::make($image->getRealPath())->resize(540, 600)->save(public_path('/images/Products/').$name);
            $product->images()->create([
                'url' => $name,
                'imageable_id' => $product['id'],
                'imageable_type' => Product::class,
            ]);
        }
        $update = $product->update($request->only(['title', 'recommended', 'desc', 'amount', 'stock', 'updated_at' => now()]));
        $product->authors()->sync(['category_id' => $request->category_id]);

        return response()->json(['message' => 'Product updated successfully', 'status' => $update, 'products' => $product->get()]);
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id', $id)->delete();
        return response()->json(['message' => 'Archived successfuly'], 204);
    }

     /**
     * Remove the specified Product from storage.
     *
     * @param  \App\Models\Product  $id
     * @return \Illuminate\Http\Response
     */
    public function refresh($id)
    {
        Product::where('id', $id)->restore();
        return response()->json(['message' => 'Unarchived successfuly'], 201);
    }
}
