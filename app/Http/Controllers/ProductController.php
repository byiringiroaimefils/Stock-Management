<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ProductCode' => 'required|unique:products',
            'ProductName' => 'required',
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.form', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ProductName' => 'required',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        
        // Delete related records first
        \App\Models\ProductIn::where('ProductCode', $product->ProductCode)->delete();
        \App\Models\ProductOut::where('ProductCode', $product->ProductCode)->delete();
        
        // Delete the product
        $product->delete();
        
        return redirect()->route('products.index')->with('success', 'Product and related records deleted successfully.');
    }
}
