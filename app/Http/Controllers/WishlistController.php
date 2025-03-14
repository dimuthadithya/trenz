<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $wishlistItems = Wishlist::where('user_id', $user->id)
            ->join('products', 'wishlists.product_id', '=', 'products.id')
            ->select('products.*')
            ->get();


        return view('pages.wishlist', compact('wishlistItems'));
    }

    /**
     * Show the form for creating a new resource.s
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
        $user = Auth::user();

        if (Wishlist::where('user_id', $user->id)->where('product_id', $request->product_id)->exists()) {
            Wishlist::where('user_id', $user->id)->where('product_id', $request->product_id)->delete();
            return redirect()->back();
        } else {
            $wishlist = new Wishlist();
            $wishlist->user_id = $user->id;
            $wishlist->product_id = $request->product_id;
            $wishlist->save();
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wishlist $wishlistId) {}
}
