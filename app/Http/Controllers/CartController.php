<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch the cart items from the database
        $userId = Auth::user()->id;
        $cartItems = Cart::where('user_id', $userId)->get();

        $products = [];
        $cartTotal = 0;

        foreach ($cartItems as $cartItem) {
            $product = Product::find($cartItem->product_id);
            if ($product) {
                $productArray = $product->toArray();
                $productArray['cart_quantity'] = $cartItem->quantity;
                $products[] = $productArray;

                // Calculate item total and add to cart total
                $cartTotal += $product->price * $cartItem->quantity;
            }
        }

        return view('pages.cart', compact('products', 'cartTotal'));
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

        $userId = Auth::user()->id;
        $cartItem = new Cart();
        $cartItem->user_id = $userId;
        $cartItem->product_id = $request->product_id;
        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $productId)
    {
        $userId = Auth::user()->id;
        \Log::info('Cart Update Request', [
            'user_id' => $userId,
            'product_id' => $productId,
            'quantity' => $request->quantity
        ]);

        $cartItem = Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        \Log::info('Cart Item Found', ['cart_item' => $cartItem]);

        if ($cartItem) {
            $cartItem->quantity = $request->quantity;
            $cartItem->save();

            \Log::info('Cart Item Updated', [
                'cart_item' => $cartItem->fresh(),
                'new_quantity' => $request->quantity
            ]);

            return redirect()->route('cart.index')->with('success', 'Cart updated successfully.');
        } else {
            \Log::error('Cart Item Not Found', [
                'user_id' => $userId,
                'product_id' => $productId
            ]);
            return redirect()->route('cart.index')->with('error', 'Cart not found.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cartItem = Cart::where('user_id', Auth::user()->id)
            ->where('product_id', $id)
            ->first();

        if ($cartItem) {
            $cartItem->delete();
            return redirect()->route('cart.index')->with('success', 'Product removed from cart successfully.');
        } else {
            return redirect()->route('cart.index')->with('error', 'Cart item not found.');
        }
    }
}
