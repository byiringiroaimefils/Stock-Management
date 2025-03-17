@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
        <h1 class="text-3xl font-bold tracking-tight text-foreground">Products</h1>
        <a href="{{ route('products.create') }}" 
           class="w-full sm:w-auto inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-primary-foreground hover:bg-primary/90">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Add Product
        </a>
    </div>

    <div class="rounded-md border bg-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full caption-bottom text-sm">
                <thead class="[&_tr]:border-b bg-muted/50">
                    <tr class="border-b transition-colors">
                        <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground">Product Code</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground">Product Name</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground">Actions</th>
                    </tr>
                </thead>
                <tbody class="[&_tr:last-child]:border-0">
                    @foreach ($products as $product)
                    <tr class="border-b transition-colors hover:bg-gray-50 dark:hover:bg-muted/50">
                        <td class="p-4 align-middle text-gray-900 dark:text-white">{{ $product->ProductCode }}</td>
                        <td class="p-4 align-middle text-gray-900 dark:text-white">{{ $product->ProductName }}</td>
                        <td class="p-4 align-middle">
                            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-2">
                                <a href="{{ route('products.edit', $product->ProductCode) }}" 
                                   class="w-full sm:w-auto inline-flex items-center justify-center rounded-md bg-secondary px-4 py-2 text-sm font-medium text-secondary-foreground hover:bg-secondary/80">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"/>
                                    </svg>
                                    Edit
                                </a>
                                <form action="{{ route('products.destroy', $product->ProductCode) }}" method="POST" class="w-full sm:w-auto">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full inline-flex items-center justify-center rounded-md bg-red-500 px-4 py-2 text-sm font-medium text-white hover:bg-red-600" onclick="return confirm('Warning: This will delete all related stock in and stock out records. Are you sure you want to proceed?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M3 6h18"></path>
                                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                        </svg>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
