<?php

namespace App\Http\Controllers;

use App\Models\cartItem;
use App\Http\Requests\StorecartItemRequest;
use App\Http\Requests\UpdatecartItemRequest;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $session_id = $request->query('session_id');
        return cartItem::where('session_id', $session_id)->with('product')->get();
        return response()->json(['cart' => $cartItems]);
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
        $valideData = $request->validate([
            'product_id' =>'required|exists:products,id',
            'quantity' =>'required|min:1',
            'session_id' => 'nullable|string',
        ]);
        $cart = cartItem::create($valideData);
        return $cart;
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
    public function update(UpdatecartItemRequest $request, cartItem $cartItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cartItem $cartItem)
    {
        //
    }
}
