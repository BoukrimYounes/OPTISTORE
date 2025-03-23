<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Product;
use App\Models\productImage;
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
                ->with(['brand', 'category', 'images']) // ✅ Correct way to apply `with()`
                ->get();
        } else {
            $products = Product::with(['brand', 'category', 'images'])->get(); // or any other logic to return all products
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

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug',
            'quantity' => 'required|integer|min:0',
            'description' => 'required|string',
            'published' => 'required|boolean',
            'inStock' => 'required|boolean',
            'sold' => 'required|boolean',
            'price' => 'required|numeric|min:0',
            'color' => 'required|string|max:50',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'images.*' => 'image|mimes:jpg,webp,jpeg,png|max:2048',
        ]);

        $product = Product::create($validatedData);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store("products", 'public');

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_url' => "storage/" . $imagePath,
                ]);
            }
        }
        return response()->json([
            'message' => 'Product created successfully!',
            'product' => $product,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with(['brand', 'category', 'images'])->find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'product' => $product
        ]);
    }



    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
{
    $validatedData = $request->validate([
        'title' => 'sometimes|string|max:255',
        'slug' => 'sometimes|string|max:255|unique:products,slug,' . $product->id,
        'quantity' => 'sometimes|integer|min:0',
        'description' => 'sometimes|string',
        'published' => 'sometimes|boolean',
        'inStock' => 'sometimes|boolean',
        'sold' => 'sometimes|boolean',
        'price' => 'sometimes|numeric|min:0',
        'color' => 'sometimes|string|max:50',
        'category_id' => 'sometimes|exists:categories,id',
        'brand_id' => 'sometimes|exists:brands,id',
    ]);

    $product->update($validatedData);

    return response()->json([
        'message' => 'Product updated successfully!',
        'product' => $product
    ]);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return ['message' => 'the post was deleted'];
    }
}
