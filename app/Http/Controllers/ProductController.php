<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of Men's products.
     */
    public function indexMen()
    {
        $menParent = Category::where('category_name', 'Men')->first();
        $categories = Category::where('parent_category_id', $menParent->id)->pluck('category_name');

        $subCategoryIds = Category::where('parent_category_id', $menParent->id)->pluck('id')->toArray();
        $products = Product::whereIn('category_id', $subCategoryIds)->get();

        return view('pages.men', compact('products', 'categories'));
    }

    /**
     * Display a listing of Women's products.
     */
    public function indexWomen()
    {
        $womenParent = Category::where('category_name', 'Women')->first();
        $categories = Category::where('parent_category_id', $womenParent->id)->pluck('category_name');

        $subCategoryIds = Category::where('parent_category_id', $womenParent->id)->pluck('id')->toArray();
        $products = Product::whereIn('category_id', $subCategoryIds)->get();

        return view('pages.women', compact('products', 'categories'));
    }

    /**
     * Display a listing of Kids' products.
     */
    public function indexKid()
    {
        $kidParent = Category::where('category_name', 'Kids')->first();
        $subCategoryIds = Category::where('parent_category_id', $kidParent->id)->pluck('id')->toArray();

        $products = Product::whereIn('category_id', $subCategoryIds)->get();

        return view('pages.kids', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified product.
     */
    public function show(Product $id)
    {
        $product = Product::findOrFail($id->id);
        return view('pages.product-details', compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
