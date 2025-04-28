<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $cartItems = Cart::where('user_id', Auth::user()->id)->get();
        $products = [];


        foreach ($cartItems as $cartItem) {
            $product = Product::find($cartItem->product_id);
            if ($product) {
                $products[] = $product->toArray();
            }
        }


        return view('pages.checkout', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId = Auth::user()->id;
        $cartItems = Cart::where('user_id', $userId)->get();

        foreach ($cartItems as $cartItem) {
            $order = new Order();
            $order->user_id = $userId;
            $order->product_id = $cartItem->product_id;
            $order->quantity = $cartItem->quantity;
            $order->save();
        }

        // Clear the cart after creating the order
        Cart::where('user_id', $userId)->delete();

        return redirect()->route('home')->with('success', 'Order created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
