<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all(); // Retrieve all categories

        $query = Product::with('categories');

        // Apply price filtering if values are provided in the request
        if ($request->has('minPrice')) {
            $minPrice = (float)$request->input('minPrice');
            $query->where('price', '>=', $minPrice);
        }

        if ($request->has('maxPrice')) {
            $maxPrice = (float)$request->input('maxPrice');
            $query->where('price', '<=', $maxPrice);
        }

        $products = $query->get();

        return view('products.index', compact('categories', 'products'));
    }


    public function create()
    {
        $categories = Category::all(); // Fetch all categories from your database
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id', // Validate that the selected category exists
        ]);

        $product = new Product([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);

        // Associate the selected category with the product
        $product->category_id = $request->input('category_id');

        $product->save();

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully!');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all(); // Fetch all categories
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = Product::findOrFail($id);

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        // $product->category_id = $request->input('category_id');

        $product->save();

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        // Delete the product
    }
}
