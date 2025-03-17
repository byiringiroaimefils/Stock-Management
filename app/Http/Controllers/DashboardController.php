<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductIn;
use App\Models\ProductOut;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            // Get basic statistics
            $products = Product::all();
            $totalStockIn = ProductIn::sum('Quantity');
            $totalStockOut = ProductOut::sum('Quantity');

            // Get stock report
            $report = Product::select(
                'products.ProductCode',
                'products.ProductName',
                DB::raw("COALESCE(SUM(product_ins.Quantity), 0) as TotalStockIn"),
                DB::raw("COALESCE(SUM(product_outs.Quantity), 0) as TotalStockOut"),
                DB::raw("COALESCE(SUM(product_ins.Quantity), 0) - COALESCE(SUM(product_outs.Quantity), 0) as NetStock")
            )
            ->leftJoin('product_ins', 'products.ProductCode', '=', 'product_ins.ProductCode')
            ->leftJoin('product_outs', 'products.ProductCode', '=', 'product_outs.ProductCode')
            ->groupBy(['products.ProductCode', 'products.ProductName'])
            ->get()
            ->map(function ($item) {
                return [
                    'ProductCode' => $item->ProductCode,
                    'ProductName' => $item->ProductName, 
                    'TotalStockIn' => $item->TotalStockIn,
                    'TotalStockOut' => $item->TotalStockOut,
                    'NetStock' => $item->NetStock
                ];
            });

            return view('dashboard', compact('products', 'totalStockIn', 'totalStockOut', 'report'));
            
        } catch (\Exception $e) {
            // Log the error
            Log::error('Dashboard Error: ' . $e->getMessage());
            
            // Return with error message
            return view('dashboard', [
                'products' => collect([]),
                'totalStockIn' => 0,
                'totalStockOut' => 0,
                'report' => collect([]),
                'error' => 'Unable to load dashboard data. Please try again later.'
            ]);
        }
    }
}