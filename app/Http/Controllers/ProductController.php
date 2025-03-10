<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexMen()
    {
        $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
            ->where('categories.parent_category_id', 2)
            ->get();

        return view('pages.men', compact('products'));
    }

    public function indexWomen()
    {
        $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
            ->where('categories.parent_category_id', 1)
            ->get();

        return view('pages.women', compact('products'));
    }

    public function indexKid()
    {
        $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
            ->where('categories.parent_category_id', 3)
            ->get();

        return view('pages.kids', compact('products'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
