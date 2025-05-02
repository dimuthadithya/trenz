<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexMen()
    {
        $menCategoryIds = Category::where('parent_category_id', 17)->pluck('id');
        $categories = Category::where('parent_category_id', 17)->pluck('category_name');

        // Get products that belong to these categories
        $products = Product::whereIn('category_id', $menCategoryIds)->get();

        return view('pages.men', compact('products', 'categories'));
    }

    public function indexWomen()
    {
        $menCategoryIds = Category::where('parent_category_id', 16)->pluck('id');
        $categories = Category::where('parent_category_id', 16)->pluck('category_name');


        // Get products that belong to these categories
        $products = Product::whereIn('category_id', $menCategoryIds)->get();

        return view('pages.women', compact('products', 'categories'));
    }

    public function indexKid()
    {
        $menCategoryIds = Category::where('parent_category_id', 3)->pluck('id');

        // Get products that belong to these categories
        $products = Product::whereIn('category_id', $menCategoryIds)->get();

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
    public function show(Product $id)
    {
        $product = Product::findOrFail($id->id);


        // Pass the product to the view
        return view('pages.product-details', compact('product'));
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
