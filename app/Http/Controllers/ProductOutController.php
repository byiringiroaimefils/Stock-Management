<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductOut;

class ProductOutController extends Controller
{
    public function index()
    {
        $records = ProductOut::all();
        return view('productouts.index', compact('records'))->with('type', 'Out');
    }

    public function create()
    {
        $products = Product::all();
        return view('productouts.form', compact('products'))->with('type', 'Out');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ProductCode' => 'required',
            'DateTime' => 'required',
            'Quantity' => 'required|integer',
            'UnitPrice' => 'required|numeric',
        ]);

        $totalPrice = $request->Quantity * $request->UnitPrice;

        ProductOut::create([
            'ProductCode' => $request->ProductCode,
            'DateTime' => $request->DateTime,
            'Quantity' => $request->Quantity,
            'UnitPrice' => $request->UnitPrice,
            'TotalPrice' => $totalPrice,
        ]);

        return redirect()->route('productouts.index')->with('success', 'Stock Out recorded successfully.');
    }

    public function edit($id)
    {
        $productout = ProductOut::findOrFail($id);
        $products = Product::all();
        return view('productouts.form', compact('productout', 'products'))->with('type', 'Out');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ProductCode' => 'required',
            'DateTime' => 'required',
            'Quantity' => 'required|integer',
            'UnitPrice' => 'required|numeric',
        ]);

        $productout = ProductOut::findOrFail($id);
        $totalPrice = $request->Quantity * $request->UnitPrice;

        $productout->update([
            'ProductCode' => $request->ProductCode,
            'DateTime' => $request->DateTime,
            'Quantity' => $request->Quantity,
            'UnitPrice' => $request->UnitPrice,
            'TotalPrice' => $totalPrice,
        ]);

        return redirect()->route('productouts.index')->with('success', 'Stock Out updated successfully.');
    }

    public function destroy($id)
    {
        $productOut = ProductOut::findOrFail($id);
        $productOut->delete();
        return redirect()->route('productouts.index')->with('success', 'Stock Out record deleted successfully.');
    }
}
