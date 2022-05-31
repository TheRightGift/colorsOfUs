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
        $product = Product::with('promotionals', 'colors', 'sizes', 'categories', 'images', 'wishlists')->paginate();
        $trashed = Product::with('promotionals', 'colors', 'sizes', 'categories', 'images', 'wishlists')->onlyTrashed()->get();
        return response()->json(['message' => 'Products fetched successfuly', 'products' => $product, 'trashed' => $trashed]);
    }
    // public function sortType ($sortBy) {
    //     // ZA, AZ, 0, 1, 01, 10, RM
    //     $type;
    //     $sort;
    //     switch ($sortBy) {
    //         case 'ZA':
    //             $type = 'title';
    //             break;
    //         case 'AZ':
    //             $type = 'title' ;
    //             break;
    //         case '0':
    //             $type = 'price';
    //             $sort = 'asc';
    //             break;
    //         case '1':
    //             $type = 'price';
    //             $sort = 'desc';
    //             break;
    //         case '01':
    //             $type = 'date';
    //             $sort = 'asc';
    //             break;
    //         case '10':
    //             $type = 'price';
    //             $sort = 'desc';
    //             break;
    //         case 'RM':
    //             $type = 'recommended';
    //             break;
                                                                                                
    //         default:
    //             break;
    //     }
    //     $data = new foo;
    //     $data->$type;
    //     $data->$sort;
    //     return $data;
    // }
    /**
     * Display a listing of the Product.
     *
     * @return \Illuminate\Http\Response
     */
    public function sort(Request $request, $sortBy)
    {
        // ZA, AZ, 0, 1, 01, 10, RM
        $category = $request->query('category');
        $data = new Product();
        $sort;
        $order = 'orderBy';
        switch ($sortBy) {
            case 'ZA':
                $type = 'title';
                $sort = 'desc';
                break;
            case 'AZ':
                $type = 'title';
                $sort = 'asc';
                break;
            case '0':
                $type = 'amount';
                $sort = 'asc';
                break;
            case '1':
                $type = 'amount';
                $sort = 'desc';
                break;
            case 'D01':
                $type = 'created_at';
                $sort = 'desc';
                break;
            case 'D10':
                $type = 'created_at';
                $sort = 'asc';
                break;
            case 'RM':
                $type = 'recommended';
                $order = 'where';
                $sort = '1';
                break;
                                                                                                
            default:
                break;
        }
        if ($category != 'null') {
            $product = $data->$order($type, $sort)->whereRelation('categories', 'categories.name', $category)->with('promotionals', 'colors', 'sizes', 'categories', 'images', 'wishlists')->paginate();
            $trashed = $data->$order($type, $sort)->with('promotionals', 'colors', 'sizes', 'categories', 'images', 'wishlists')->onlyTrashed()->paginate();
        }
        else if ($category == 'null') {
            $product = $data->$order($type, $sort)->with('promotionals', 'colors', 'sizes', 'categories', 'images', 'wishlists')->paginate();
            $trashed = $data->$order($type, $sort)->with('promotionals', 'colors', 'sizes', 'categories', 'images', 'wishlists')->onlyTrashed()->paginate();
        }
        return response()->json(['message' => 'Products fetched successfuly', 'products' => $product, 'trashed' => $trashed]);
    }

    /**
     * Filter items by class or category or subject.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        // dd($request);
        $data = new Product();

        $type;
        $sort;
        $order = 'orderBy';
        switch ($request->sortBy) {
            case 'ZA':
                $type = 'title';
                $sort = 'desc';
                break;
            case 'AZ':
                $type = 'title';
                $sort = 'asc';
                break;
            case '0':
                $type = 'amount';
                $sort = 'asc';
                break;
            case '1':
                $type = 'amount';
                $sort = 'desc';
                break;
            case 'D01':
                $type = 'created_at';
                $sort = 'desc';
                break;
            case 'D10':
                $type = 'created_at';
                $sort = 'asc';
                break;
            case 'RM':
                $type = 'recommended';
                $order = 'where';
                $sort = '1';
                break;
                                                                                                
            default:
                break;
        }
        $filterType = $request->type;
        $filter = $request->filter;

        if ($filterType != "" && $filter != "") {
            $result = $data->$order($type, $sort)->whereRelation($filterType, $filterType.'.id', $filter)
                        ->with('promotionals', 'colors', 'sizes', 'categories', 'images', 'wishlists')->paginate(2);
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
        $product = Product::with('promotionals', 'colors', 'sizes', 'categories', 'images', 'wishlists')->latest()->get();
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
        $colors = $request->colors != '' ? explode(',', $request->colors) : '';
        
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
        $products = Product::with('promotionals', 'colors', 'sizes', 'categories', 'images', 'wishlists')->paginate();
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
        $product = Product::where('title', $title)->with('promotionals', 'colors', 'sizes', 'categories', 'images', 'wishlists')->first();
        $category = $product->categories->first()->id;
        $related_product = $product->whereRelation('categories', 'categories.id', $category)->with('promotionals', 'categories', 'colors', 'sizes', 'images')->get();
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
                $imageToDelete = public_path($value);
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
        $sizes = $request->sizes != '' ? explode(',', $request->sizes) : '';
        $colors = $request->colors != '' ? explode(',', $request->colors) : '';
        // dd($sizes, $colors);
        $product->categories()->sync([$request->category_id]);
        !empty($colors) ? $product->colors()->sync($colors) : $product->colors()->detach();
        !empty($sizes) ? $product->sizes()->sync($sizes) : $product->sizes()->detach();

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
