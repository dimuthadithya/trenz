<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Payment;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->get();
        $products = [];

        $cartItemsTotal = 0;
        foreach ($cartItems as $cartItem) {
            $product = Product::find($cartItem->product_id);
            if ($product) {
                $cartItemsTotal += $product->price * $cartItem->quantity;
            }
        }

        foreach ($cartItems as $cartItem) {
            $product = Product::find($cartItem->product_id);
            if ($product) {
                $products[] = $product->toArray();
            }
        }

        // Get the user's default address
        $defaultAddress = Address::where('user_id', $user->id)
            ->where('is_default', true)
            ->first();

        return view('pages.checkout', compact('products', 'cartItemsTotal', 'defaultAddress'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $validated = $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postcode' => 'required|string|max:10',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'payment_method' => 'required|in:card,paypal,cod',
        ]);

        $userId = Auth::user()->id;
        $cartItems = Cart::where('user_id', $userId)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('home')->with('error', 'Your cart is empty.');
        }

        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $country = $request->input('country');
        $addressText   = $request->input('address');
        $city = $request->input('city');
        $postcode = $request->input('postcode');
        $phone = $request->input('phone');
        $email = $request->input('email');

        $address = new Address();
        $address->user_id = $userId;
        $address->fname = $fname;
        $address->lname = $lname;
        $address->country = $country;
        $address->address = $addressText;
        $address->city = $city;
        $address->country = $country;
        $address->zip_code = $postcode;
        $address->phone_number = $phone;
        $address->email = $email;
        $address->save();


        $order = new Order();
        $order->user_id = $userId;
        $order->addresses_id = $address->id;
        $order->order_number = 'ORD' . time() . $userId;
        $order->total_price = 0;
        $order->status = 'processing';
        $order->payment_status = 'pending';
        $order->save();

        $totalPrice = 0;
        foreach ($cartItems as $cartItem) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $cartItem->product_id;
            $orderItem->quantity = $cartItem->quantity;
            $orderItem->price = $cartItem->product->price;
            $orderItem->save();

            $totalPrice += $cartItem->product->price * $cartItem->quantity;
        }

        $order->total_price = $totalPrice;
        $order->save();

        // Create payment record
        $payment = new Payment();
        $payment->user_id = $userId;
        $payment->order_id = $order->id;
        $payment->payment_method = $request->payment_method;
        $payment->amount = $totalPrice;
        $payment->status = 'pending';
        $payment->save();

        // Update order payment status based on payment method
        if ($request->payment_method === 'cod') {
            $order->payment_status = 'pending';
        } else {
            // For card and PayPal, we'd integrate with a payment gateway here
            // For now, let's set it as paid for demo purposes
            $order->payment_status = 'paid';
            $payment->status = 'completed';
            $payment->save();
        }
        $order->save();

        // Clear the cart
        Cart::where('user_id', $userId)->delete();

        // Load the order with its items and product details
        $order = Order::with(['orderItems.product'])->find($order->id);

        return view('pages.order-complete', compact('order'));
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
        // Ensure the user can only view their own orders
        if ($order->user_id !== Auth::user()->id) {
            abort(403);
        }

        $order->load(['orderItems.product', 'address']);
        return view('pages.order-details', compact('order'));
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
