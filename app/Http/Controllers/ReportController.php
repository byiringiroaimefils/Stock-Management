<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductIn;
use App\Models\ProductOut;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        // Using Query Builder for better performance with pagination
        $report = DB::table('products')
            ->select([
                'products.ProductCode',
                'products.ProductName',
                DB::raw('(SELECT COALESCE(SUM(Quantity), 0) FROM product_ins WHERE product_ins.ProductCode = products.ProductCode) as TotalStockIn'),
                DB::raw('(SELECT COALESCE(SUM(Quantity), 0) FROM product_outs WHERE product_outs.ProductCode = products.ProductCode) as TotalStockOut'),
                DB::raw('(SELECT COALESCE(SUM(Quantity), 0) FROM product_ins WHERE product_ins.ProductCode = products.ProductCode) - 
                        (SELECT COALESCE(SUM(Quantity), 0) FROM product_outs WHERE product_outs.ProductCode = products.ProductCode) as NetStock')
            ])
            ->orderBy('ProductCode')
            ->paginate(10);

        // Calculate totals for the summary row
        $totals = [
            'TotalStockIn' => $report->sum('TotalStockIn'),
            'TotalStockOut' => $report->sum('TotalStockOut'),
            'NetStock' => $report->sum('NetStock')
        ];

        return view('reports.index', compact('report', 'totals'));
    }
}
