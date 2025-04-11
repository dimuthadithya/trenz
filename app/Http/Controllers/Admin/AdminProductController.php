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

        // Get parent category name safely
        $parentCategory = Category::findOrFail($parentCategoryId)->category_name;

        // Ensure valid category assignment
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

        // Upload main image
        if ($request->hasFile('main_image')) {
            $image = $request->file('main_image');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $uploadPath = "uploads/products/{$parentCategory}";

            $image->move(public_path($uploadPath), $fileName);
            $product->image = $uploadPath . '/' . $fileName;
        }

        $product->save();

        // Upload gallery images
        if ($request->hasFile('other_images')) {
            foreach ($request->file('other_images') as $image) {
                $fileName = time() . '_' . $image->getClientOriginalName();
                $uploadPath = "uploads/products/{$parentCategory}";

                $image->move(public_path($uploadPath), $fileName);

                $productImage = new ProductImage();
                $productImage->product_id = $product->id;
                $productImage->image_path = $uploadPath . '/' . $fileName;
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
