@extends('layouts.app')

@section('content')
<style>
    .stat-card {
        transition: all 0.3s ease;
        position: relative;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .stat-icon {
        transition: all 0.3s ease;
    }

    .stat-card:hover .stat-icon {
        transform: scale(1.1) rotate(5deg);
    }

    .stat-number {
        animation: countUp 1s ease-out forwards;
        opacity: 0;
    }

    @keyframes countUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .stat-card:nth-child(1) {
        animation: fadeInUp 0.5s ease-out forwards;
    }

    .stat-card:nth-child(2) {
        animation: fadeInUp 0.5s ease-out 0.2s forwards;
    }

    .stat-card:nth-child(3) {
        animation: fadeInUp 0.5s ease-out 0.4s forwards;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<div class="space-y-6">
    @if(isset($error))
        <div class="mb-4 rounded-lg bg-red-50 p-4 text-sm text-red-800 dark:bg-red-900/50 dark:text-red-300" role="alert">
            <span class="block sm:inline">{{ $error }}</span>
        </div>
    @endif

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold tracking-tight text-foreground">Dashboard</h1>
            <p class="mt-2 text-muted-foreground">Welcome to Bobo Store Management System</p>
        </div>
    </div>

    {{-- Statistics Cards --}}
    <div class="grid gap-6 md:grid-cols-3">
        <div class="stat-card rounded-lg border bg-card p-6 shadow-sm">
            <div class="flex items-center gap-4">
                <div class="stat-icon rounded-full bg-primary/10 p-3">
                    <svg class="h-6 w-6 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-card-foreground">Total Products</h2>
                    <p class="stat-number mt-2 text-3xl font-bold text-primary">{{ $products->count() }}</p>
                </div>
            </div>
        </div>

        <div class="stat-card rounded-lg border bg-card p-6 shadow-sm">
            <div class="flex items-center gap-4">
                <div class="stat-icon rounded-full bg-green-100 p-3 dark:bg-green-500/10">
                    <svg class="h-6 w-6 text-green-600 dark:text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-card-foreground">Total Stock In</h2>
                    <p class="stat-number mt-2 text-3xl font-bold text-green-600 dark:text-green-400">{{ $totalStockIn }}</p>
                </div>
            </div>
        </div>

        <div class="stat-card rounded-lg border bg-card p-6 shadow-sm">
            <div class="flex items-center gap-4">
                <div class="stat-icon rounded-full bg-red-100 p-3 dark:bg-red-500/10">
                    <svg class="h-6 w-6 text-red-600 dark:text-red-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-card-foreground">Total Stock Out</h2>
                    <p class="stat-number mt-2 text-3xl font-bold text-red-600 dark:text-red-400">{{ $totalStockOut }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Stock Report Table --}}
    <div class="rounded-md border bg-white dark:bg-card">
        <div class="p-6">
            <h2 class="text-xl font-semibold text-foreground mb-4">Stock Report</h2>
            <div class="relative w-full overflow-auto">
                <table class="w-full caption-bottom text-sm">
                    <thead class="[&_tr]:border-b bg-gray-50 dark:bg-muted/50">
                        <tr class="border-b transition-colors">
                            <th class="h-12 px-4 text-left align-middle font-medium text-gray-600 dark:text-muted-foreground">#</th>
                            <th class="h-12 px-4 text-left align-middle font-medium text-gray-600 dark:text-muted-foreground">Product Code</th>
                            <th class="h-12 px-4 text-left align-middle font-medium text-gray-600 dark:text-muted-foreground">Product Name</th>
                            <th class="h-12 px-4 text-left align-middle font-medium text-gray-600 dark:text-muted-foreground">Total Stock In</th>
                            <th class="h-12 px-4 text-left align-middle font-medium text-gray-600 dark:text-muted-foreground">Total Stock Out</th>
                            <th class="h-12 px-4 text-left align-middle font-medium text-gray-600 dark:text-muted-foreground">Net Stock</th>
                        </tr>
                    </thead>
                    <tbody class="[&_tr:last-child]:border-0">
                        @forelse($report as $key => $item)
                            <tr class="border-b transition-colors hover:bg-gray-50 dark:hover:bg-muted/50">
                                <td class="p-4 align-middle text-gray-900 dark:text-white">{{ $key + 1 }}</td>
                                <td class="p-4 align-middle text-gray-900 dark:text-white">{{ $item['ProductCode'] }}</td>
                                <td class="p-4 align-middle text-gray-900 dark:text-white">{{ $item['ProductName'] }}</td>
                                <td class="p-4 align-middle text-gray-900 dark:text-white">{{ $item['TotalStockIn'] }}</td>
                                <td class="p-4 align-middle text-gray-900 dark:text-white">{{ $item['TotalStockOut'] }}</td>
                                <td class="p-4 align-middle text-gray-900 dark:text-white">{{ $item['NetStock'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-4 text-center text-gray-900 dark:text-white">No report data available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
