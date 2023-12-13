<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('products.create', compact('products', 'categories'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image_path'] = "$profileImage";
        }

        Product::create($input);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validation for image
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image
            if ($product->image_path) {
                Storage::delete($product->image_path);
            }

            $imagePath = $request->file('image')->store('product_images');
            $data['image_path'] = $imagePath;
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        // Delete the image file
        if ($product->image_path) {
            Storage::delete($product->image_path);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
