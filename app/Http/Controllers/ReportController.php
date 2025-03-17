<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductIn;
use App\Models\ProductOut;

class ReportController extends Controller
{
    public function index()
    {
        $products = Product::all();

        $report = $products->map(function ($product) {
            $totalStockIn = ProductIn::where('ProductCode', $product->ProductCode)->sum('Quantity');
            $totalStockOut = ProductOut::where('ProductCode', $product->ProductCode)->sum('Quantity');
            $netStock = $totalStockIn - $totalStockOut;

            return [
                'ProductCode' => $product->ProductCode,
                'ProductName' => $product->ProductName,
                'TotalStockIn' => $totalStockIn,
                'TotalStockOut' => $totalStockOut,
                'NetStock' => $netStock,
            ];
        });

        return view('reports.index', compact('report'));
    }
}
