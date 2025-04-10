<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('pages.admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parentCategories = Category::where('parent_category_id', null)->get();
        $childCategories = Category::where('parent_category_id', '!=', null)->get();

        return view('pages.admin.products.create', compact('parentCategories', 'childCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $parentCategoryId = $request->parent_category_id;
        $childCategoryId = $request->child_category_id;

        $categoryId = Category::where('parent_category_id', $parentCategoryId)
            ->where('id', $childCategoryId)
            ->value('id');


        $product = new Product();
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $categoryId;


        if ($request->hasFile('main_image')) {
            $image = $request->file('main_image');
            $fileName = $image->store('', 'public');
            $filePath = 'uploads/' . $fileName;

            $product->image = $filePath;
        }


        $product->save();

        if ($request->hasFile('other_images')) {
            $subImages = $request->file('other_images');

            foreach ($subImages as $image) {
                $fileName = $image->store('', 'public');
                $filePath = 'uploads/' . $fileName;

                $productImage = new ProductImage();
                $productImage->product_id = $product->id;
                $productImage->image_path = $filePath;
                $productImage->image_name = $fileName;
                $productImage->image_type = 'gallery';
                $productImage->save();
            }
        }





        return redirect()->route('admin.products')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
