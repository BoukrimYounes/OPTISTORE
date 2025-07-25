<?php

namespace App\Http\Controllers;

use App\Models\cartItem;
use App\Http\Requests\StorecartItemRequest;
use App\Http\Requests\UpdatecartItemRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    
}


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1|max:100'
        ]);
        $user = Auth::user();

        // Check if product already in cart
        $existingCartItem = cartItem::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($existingCartItem) {
            // Update quantity if already exists
            $existingCartItem->increment('quantity', $request->quantity);
        } else {
            // Create new cart item
            $invoice = $user->cartItems()->create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity
            ]);
        }

        return back()->with('success', 'Product added to cart');
    }

    /**
     * Display the specified resource.
     */
    public function show(cartItem $cartItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cartItem $cartItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cartItem $cartItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();

        return redirect()->back()->with('success', 'Item removed from cart');
    }
}
