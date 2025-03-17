@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
        <h1 class="text-2xl font-semibold tracking-tight">Stock {{ $type }}</h1>
        <a href="{{ route($type == 'In' ? 'productins.create' : 'productouts.create') }}" 
           class="w-full sm:w-auto inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none ring-offset-background bg-primary text-primary-foreground hover:bg-primary/90 h-10 py-2 px-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Add Stock {{ $type }}
        </a>
    </div>

    <div class="rounded-md border overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full caption-bottom text-sm">
                <thead class="[&_tr]:border-b">
                    <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                        <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground">Product Code</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground">Date</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground">Quantity</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground">Unit Price</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground">Total Price</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground">Actions</th>
                    </tr>
                </thead>
                <tbody class="[&_tr:last-child]:border-0">
                    @foreach ($records as $record)
                    <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                        <td class="p-4 align-middle">{{ $record->ProductCode }}</td>
                        <td class="p-4 align-middle">{{ $record->DateTime }}</td>
                        <td class="p-4 align-middle">{{ $record->Quantity }}</td>
                        <td class="p-4 align-middle">{{ number_format($record->UnitPrice, 2) }} rwf</td>
                        <td class="p-4 align-middle">{{ number_format($record->TotalPrice, 2) }} rwf</td>
                        <td class="p-4 align-middle">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('productouts.edit', $record->id) }}" 
                                   class="inline-flex items-center justify-center rounded-md bg-secondary px-3 py-2 text-sm font-medium text-secondary-foreground hover:bg-secondary/80">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"/>
                                    </svg>
                                    Edit
                                </a>
                                <form action="{{ route('productouts.destroy', $record->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center justify-center rounded-md bg-red-500 px-3 py-2 text-sm font-medium text-white hover:bg-red-600" onclick="return confirm('Are you sure you want to delete this record?')">
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