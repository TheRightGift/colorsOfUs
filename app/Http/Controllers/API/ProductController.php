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
        $product = Product::with('colors', 'sizes', 'categories', 'images', 'wishlists')->paginate();
        $trashed = Product::with('colors', 'sizes', 'categories', 'images', 'wishlists')->onlyTrashed()->get();
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
            $product = Product::orderBy('amount', $sortBy)->whereRelations('categories', 'categories.id', $id)->with('colors', 'sizes', 'categories', 'images', 'wishlists')->paginate();
            // $product = Product::orderBy('amount', $sortBy)->where('category_id', $category)->with('colors', 'sizes', 'categories', 'images', 'wishlists')->paginate();
            $trashed = Product::orderBy('amount', $sortBy)->with('colors', 'sizes', 'categories', 'images', 'wishlists')->onlyTrashed()->paginate();
            return response()->json(['message' => 'Products fetched successfuly', 'products' => $product, 'trashed' => $trashed]);
        }
        else if ($sortBy == 'asc' || $sortBy == 'desc') {
            $product = Product::orderBy('amount', $sortBy)->with('colors', 'sizes', 'categories', 'images', 'wishlists')->paginate();
            $trashed = Product::orderBy('amount', $sortBy)->with('colors', 'sizes', 'categories', 'images', 'wishlists')->onlyTrashed()->paginate();
            return response()->json(['message' => 'Products fetched successfuly', 'products' => $product, 'trashed' => $trashed]);
        }
        else if ($sortBy == 'latest' && $category != 'null') {
            // $product = Product::where('category_id', $category)->with('colors', 'sizes', 'categories', 'images', 'wishlists')->paginate();
            // $trashed = Product::where('category_id', $category)->with('colors', 'sizes', 'categories', 'images', 'wishlists')->onlyTrashed()->get();
            $product = Product::whereRelations('categories', 'categories.id', $id)->with('colors', 'sizes', 'categories', 'images', 'wishlists')->paginate();
            $trashed = Product::whereRelations('categories', 'categories.id', $id)->with('colors', 'sizes', 'categories', 'images', 'wishlists')->onlyTrashed()->get();
            return response()->json(['message' => 'Products fetched successfuly', 'products' => $product, 'trashed' => $trashed]);
        }
        else if ($sortBy == 'latest') {
            $product = Product::with('colors', 'sizes', 'categories', 'images', 'wishlists')->paginate();
            $trashed = Product::with('colors', 'sizes', 'categories', 'images', 'wishlists')->onlyTrashed()->get();
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
            $result = Product::whereRelations('category_color', 'category_color.id', $color)->whereRelations('categories', 'categories.id', $category)->whereBetween('amount', $price)->with('colors', 'sizes', 'categories', 'images', 'wishlists')->paginate();
        }
        else if (count($color) && count($category)) {
            $result = Product::whereRelations('category_color', 'category_color.id', $color)->whereRelations('categories', 'categories.id', $category)->with('colors', 'sizes', 'categories', 'images', 'wishlists')->paginate();
        }
        else if (count($category) && !empty($price)) {
            $result = Product::whereRelations('categories', 'categories.id', $category)->whereBetween('amount', $price)->with('colors', 'sizes', 'categories', 'images', 'wishlists')->paginate();
        }
        else if (count($color) && !empty($price)) {
            $result = Product::whereRelations('category_color', 'category_color.id', $color)->whereBetween('amount', $price)->with('colors', 'sizes', 'categories', 'images', 'wishlists')->paginate();
        }
        else if (count($color)) {
            $result = Product::whereRelations('category_color', 'category_color.id', $color)->with('colors', 'sizes', 'categories', 'images', 'wishlists')->paginate();
        }
        else if (count($category)) {
            $result = Product::whereRelations('categories', 'categories.id', $category)->with('colors', 'sizes', 'categories', 'images', 'wishlists')->paginate();
        }
        else if (!empty($price)) {
            $result = Product::whereBetween('amount', $price)->with('colors', 'sizes', 'categories', 'images', 'wishlists')->paginate();
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
        $product = Product::with('colors', 'sizes', 'categories', 'images', 'wishlists')->latest()->get();
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
            'images.*' => 'image|mimes:jpg,jpeg,png|max:500',
            'images' => 'required',
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
        $sizes = $request->sizes != '' ? explode(',', $request->sizes) : '';
        $colors = $request->sizes != '' ? explode(',', $request->colors) : '';
        
        $product->categories()->sync([$request->category_id]);
        !empty($colors) ? $product->colors()->sync($colors) : null;
        !empty($sizes) ? $product->sizes()->sync($sizes) : null;

        $images = $request->file('images');
        // dump($images);
        foreach ($images as $key => $value) {
            $name = $value->getClientOriginalName();
            $value->move(public_path('/img/uploads/'), $name);
            $product->images()->create([
                'url' => '/img/uploads/'.$name,
                'imageable_id' => $product['id'],
                'imageable_type' => Product::class,
            ]);
        }   
        $products = Product::with('colors', 'sizes', 'categories', 'images', 'wishlists')->paginate();
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
        $product = Product::where('title', $title)->with('colors', 'sizes', 'categories', 'images', 'wishlists')->first();
        $related_product = Product::whereRelations('categories', 'categories.id', $product['category_id'])->with('colors', 'sizes', 'images')->get();
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
            'category_id' => ['required'],
            'desc' => ['nullable', 'string'],
            'amount' => ['required', 'integer'],
            'stock' => ['nullable', 'integer'],
            'images.*' => 'image|mimes:jpg,jpeg,png|max:500',
            'images' => 'nullable',
            'recommended' => 'nullable',
        ]);
        
        $product = Product::where('id', $id)->firstOrFail();
        if ($request->deletedImgs) {
            $imgDeleted = explode(',', $request->deletedImgs);
            $imgDeletedIds = explode(',', $request->deletedImgIds);
            $res = Image::whereIn('id', $imgDeletedIds)->forceDelete();
            foreach ($imgDeleted as $key => $value) {
                $imageToDelete = public_path('/img/uploads/'.$value);
                if (file_exists($imageToDelete))
                {
                    unlink($imageToDelete);
                }
            }
        }
       if ($request->hasFile('images')) {
           $images = $request->file('images');
           // dump($images);
           foreach ($images as $key => $value) {
               $name = $value->getClientOriginalName();
               $value->move(public_path('/img/uploads/'), $name);
               $product->images()->create([
                   'url' => '/img/uploads/'.$name,
                   'imageable_id' => $product['id'],
                   'imageable_type' => Product::class,
               ]);
           }  
       }
        $update = $product->update($request->only(['title', 'recommended', 'desc', 'amount', 'stock', 'updated_at' => now()]));
        $product->categories()->sync(['category_id' => $request->category_id]);

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
