<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categoryId = $request->input('category_id');

        if ($categoryId) {
            $products = Product::where('category_id', $categoryId)
            ->with(['brand','category']) // ✅ Correct way to apply `with()`
            ->get();
        } else {
            $products = Product::with(['brand','category'])->get(); // or any other logic to return all products
        }
    
        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $feilds = $request->validate([
            'title' =>['required'],
            'slug' =>['nullable'],
            'quantity' =>['required'],
            'description' =>['required'],
            'published' =>['required'],
            'inStock' =>['required'],
            'sold' =>['required'],
            'price' =>['required'],
            'color' =>['required'],
            'category_id' =>['required'],
            'brand_id' =>['required'],
        ]);
        $product = Product::create($feilds);

        $request->validate([
           'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public'); // Store image in storage/app/public/products
                $product->images()->create(['image_url' => $path]);
            }
        }
    
        return $product;
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Product $product)
    {
        $feilds = $request->validate([

        ]);
        $product->update($feilds);
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return ['message' =>'the post was deleted'];
    }
}
