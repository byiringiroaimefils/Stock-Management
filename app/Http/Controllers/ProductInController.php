<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductIn;

class ProductInController extends Controller
{
    public function index()
    {
        $records = ProductIn::all();
        return view('productins.index', compact('records'))->with('type', 'In');
    }

    public function create()
    {
        $products = Product::all();
        return view('productins.form', compact('products'))->with('type', 'In');
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

        ProductIn::create([
            'ProductCode' => $request->ProductCode,
            'DateTime' => $request->DateTime,
            'Quantity' => $request->Quantity,
            'UnitPrice' => $request->UnitPrice,
            'TotalPrice' => $totalPrice,
        ]);

        return redirect()->route('productins.index')->with('success', 'Stock In recorded successfully.');
    }

    public function edit($id)
    {
        $productin = ProductIn::findOrFail($id);
        $products = Product::all();
        return view('productins.form', compact('productin', 'products'))->with('type', 'In');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ProductCode' => 'required',
            'DateTime' => 'required',
            'Quantity' => 'required|integer',
            'UnitPrice' => 'required|numeric',
        ]);

        $productin = ProductIn::findOrFail($id);
        $totalPrice = $request->Quantity * $request->UnitPrice;

        $productin->update([
            'ProductCode' => $request->ProductCode,
            'DateTime' => $request->DateTime,
            'Quantity' => $request->Quantity,
            'UnitPrice' => $request->UnitPrice,
            'TotalPrice' => $totalPrice,
        ]);

        return redirect()->route('productins.index')->with('success', 'Stock In updated successfully.');
    }

    public function destroy($id)
    {
        $productIn = ProductIn::findOrFail($id);
        $productIn->delete();
        return redirect()->route('productins.index')->with('success', 'Stock In record deleted successfully.');
    }
}
