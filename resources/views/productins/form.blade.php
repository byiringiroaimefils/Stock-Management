@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="mb-8 flex justify-between items-center">
            <h1 class="text-2xl font-semibold tracking-tight">{{ isset($productin) ? 'Edit' : 'Add' }} Stock {{ $type }}</h1>
            <p class="text-sm text-muted-foreground">Enter the details for your stock {{ strtolower($type) }}</p>
        </div>

        <form action="{{ isset($productin) ? route('productins.update', $productin->id) : route('productins.store') }}" method="POST">
            @csrf
            @if(isset($productin))
                @method('PUT')
            @endif
            <div class="space-y-6">
                <!-- Product Code Select -->
                <div class="space-y-2">
                    <label for="ProductCode" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">
                        Product Code
                    </label>
                    <select 
                        name="ProductCode" 
                        id="ProductCode" 
                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2"
                        required
                    >
                        <option value="">Select a product</option>
                        @foreach($products as $product)
                            <option value="{{ $product->ProductCode }}" {{ (isset($productin) && $productin->ProductCode == $product->ProductCode) ? 'selected' : '' }}>
                                {{ $product->ProductCode }} - {{ $product->ProductName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- DateTime -->
                <div class="space-y-2">
                    <label for="DateTime" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">
                        Date & Time
                    </label>
                    <input 
                        type="datetime-local" 
                        name="DateTime" 
                        id="DateTime" 
                        value="{{ isset($productin) ? date('Y-m-d\TH:i', strtotime($productin->DateTime)) : '' }}"
                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2"
                        required
                    >
                </div>

                <!-- Quantity -->
                <div class="space-y-2">
                    <label for="Quantity" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">
                        Quantity
                    </label>
                    <input 
                        type="number" 
                        name="Quantity" 
                        id="Quantity" 
                        value="{{ isset($productin) ? $productin->Quantity : '' }}"
                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2"
                        required
                    >
                </div>

                <!-- Unit Price -->
                <div class="space-y-2">
                    <label for="UnitPrice" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">
                        Unit Price
                    </label>
                    <input 
                        type="number" 
                        name="UnitPrice" 
                        id="UnitPrice" 
                        value="{{ isset($productin) ? $productin->UnitPrice : '' }}"
                        step="0.01" 
                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2"
                        required
                    >
                </div>

                <div class="flex justify-end gap-4">
                    <a href="{{ route('productins.index') }}" 
                       class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none ring-offset-background border border-input hover:bg-accent hover:text-accent-foreground h-10 py-2 px-4">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none ring-offset-background bg-primary text-primary-foreground hover:bg-primary/90 h-10 py-2 px-4">
                        {{ isset($productin) ? 'Update' : 'Add' }} Stock {{ $type }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
