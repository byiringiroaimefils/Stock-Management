@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold tracking-tight">Stock Reports</h1>
        <button onclick="window.print()" class="print:hidden inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none ring-offset-background bg-primary text-primary-foreground hover:bg-primary/90 h-10 py-2 px-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                <polyline points="6 9 6 2 18 2 18 9"></polyline>
                <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                <rect x="6" y="14" width="12" height="8"></rect>
            </svg>
            <p class="hidden md:block">Print Report</p> 
        </button>
    </div>

    <div class="rounded-md border print:border-none p-2">
        <div class="relative w-full overflow-auto">
            <table class="w-full caption-bottom text-sm">
                <thead class="[&_tr]:border-b">
                    <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted print:hover:bg-transparent">
                        <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground print:text-black">#</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground print:text-black">Product Code</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground print:text-black">Product Name</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground print:text-black">Total Stock In</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground print:text-black">Total Stock Out</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground print:text-black">Available Stock</th>
                    </tr>
                </thead>
                <tbody class="[&_tr:last-child]:border-0">
                    @forelse($report as $index => $row)
                        <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted print:hover:bg-transparent">
                            <td class="p-4 align-middle print:text-black">{{ $report->firstItem() + $index }}</td>
                            <td class="p-4 align-middle print:text-black">{{ $row->ProductCode }}</td>
                            <td class="p-4 align-middle print:text-black">{{ $row->ProductName }}</td>
                            <td class="p-4 align-middle print:text-black">{{ $row->TotalStockIn }}</td>
                            <td class="p-4 align-middle print:text-black">{{ $row->TotalStockOut }}</td>
                            <td class="p-4 align-middle print:text-black">{{ $row->NetStock }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-4 text-center">No reports available.</td>
                        </tr>
                    @endforelse
                    
                    <tr class="border-b bg-gray-50 dark:bg-gray-800 font-medium print:bg-gray-100">
                        <td class="p-4 align-middle dark:text-white print:text-black" colspan="3">Total</td>
                        <td class="p-4 align-middle dark:text-white print:text-black">{{ $totals['TotalStockIn'] }}</td>
                        <td class="p-4 align-middle dark:text-white print:text-black">{{ $totals['TotalStockOut'] }}</td>
                        <td class="p-4 align-middle dark:text-white print:text-black">{{ $totals['NetStock'] }}</td>
                    </tr>
                </tbody>
            </table>

            {{-- Pagination Links (hidden when printing) --}}
            <div class="mt-4 print:hidden">
                {{ $report->links() }}
            </div>
        </div>
    </div>
</div>

<div class="hidden print:block fixed bottom-0 w-full text-center p-4">
    <p class="text-sm text-gray-600">Printed by ISHIMWE Emmanuel</p>
</div>

<style>
    @media print {
        nav, footer, .print\:hidden {
            display: none !important;
        }
        body {
            padding: 0;
            margin: 0;
            padding-bottom: 30px !important;
            font-size: 11px !important;
        }
        .container {
            padding: 0 !important;
            margin: 0 !important;
            max-width: none !important;
        }
        table {
            width: 100% !important;
            border-collapse: collapse !important;
            font-size: 10px !important;
        }
        th, td {
            border: none !important;
            padding: 4px 8px !important;
        }
        tr {
            border: none !important;
        }
        .border-b {
            border: none !important;
        }
        .rounded-md {
            border-radius: 0 !important;
        }
        .fixed {
            position: fixed !important;
            bottom: 0 !important;
        }
        h1 {
            font-size: 16px !important;
            margin-bottom: 8px !important;
        }
        .mb-6 {
            margin-bottom: 8px !important;
        }
        .p-4 {
            padding: 4px 8px !important;
        }
        .text-sm {
            font-size: 10px !important;
        }
    }
</style>
@endsection
