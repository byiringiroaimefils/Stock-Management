@extends('layouts.app')

@section('content')
<div class="space-y-6">
<div class="mx-auto max-w-[500px] space-y-6">
    <div class="flex items-center justify-center">
        <div>
            <h1 class="text-3xl font-bold tracking-tight text-foreground">
                {{ isset($product) ? 'Edit Product' : 'Add Product' }}
            </h1>
            <p class="text-sm text-muted-foreground mt-1">
                {{ isset($product) ? 'Update product details' : 'Add a new product to your inventory' }}
            </p>
        </div>
    </div>

    <div class="rounded-lg border bg-card text-card-foreground shadow-sm">
        <div class="p-6">
            <form action="{{ isset($product) ? route('products.update', $product->ProductCode) : route('products.store') }}" 
                  method="POST" 
                  class="space-y-6">
                @csrf
                @if (isset($product))
                    @method('PUT')
                @endif

                <div class="space-y-4">
                    <div class="grid gap-2">
                        <label for="ProductCode" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">
                            Product Code
                        </label>
                        <input 
                            type="text" 
                            id="ProductCode"
                            name="ProductCode" 
                            value="{{ $product->ProductCode ?? old('ProductCode') }}" 
                            {{ isset($product) ? 'readonly' : '' }}
                            class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                            placeholder="Enter product code"
                        >
                        @error('ProductCode')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid gap-2">
                        <label for="ProductName" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">
                            Product Name
                        </label>
                        <input 
                            type="text" 
                            id="ProductName"
                            name="ProductName" 
                            value="{{ $product->ProductName ?? old('ProductName') }}"
                            class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                            placeholder="Enter product name"
                        >
                        @error('ProductName')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-end space-x-4">
                    <a href="{{ route('products.index') }}" 
                       class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2">
                        Cancel
                    </a>
                    <button 
                        type="submit"
                        class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2">
                        {{ isset($product) ? 'Update Product' : 'Create Product' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection