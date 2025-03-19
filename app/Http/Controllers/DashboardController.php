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
            // 1. Get basic counts for the dashboard cards
            $products = Product::all();
            $totalStockIn = ProductIn::sum('Quantity');
            $totalStockOut = ProductOut::sum('Quantity');

            // 2. Generate the stock report with pagination
            $report = DB::table('products')
                ->select([
                    'products.ProductCode',
                    'products.ProductName',
                    // Calculate total stock in
                    DB::raw('(SELECT COALESCE(SUM(Quantity), 0) 
                            FROM product_ins 
                            WHERE product_ins.ProductCode = products.ProductCode) as TotalStockIn'),
                    // Calculate total stock out
                    DB::raw('(SELECT COALESCE(SUM(Quantity), 0) 
                            FROM product_outs 
                            WHERE product_outs.ProductCode = products.ProductCode) as TotalStockOut'),
                ])
                ->orderBy('ProductCode')
                ->paginate(10); // Show 10 items per page

            // 3. Calculate net stock for each product
            foreach ($report as $item) {
                $item->NetStock = $item->TotalStockIn - $item->TotalStockOut;
            }

            // 4. Display the dashboard with all data
            return view('dashboard', [
                'products' => $products,
                'totalStockIn' => $totalStockIn,
                'totalStockOut' => $totalStockOut,
                'report' => $report
            ]);

        } catch (\Exception $e) {
            // If anything goes wrong, log the error
            Log::error('Dashboard Error: ' . $e->getMessage());
            
            // Show dashboard with empty data and error message
            return view('dashboard', [
                'products' => collect([]),
                'totalStockIn' => 0,
                'totalStockOut' => 0,
                'report' => collect([]),
                'error' => 'Sorry, we could not load the dashboard data. Please try again.'
            ]);
        }
    }
}