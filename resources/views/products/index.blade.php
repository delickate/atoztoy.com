@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Products</h2>
    <div class="card">
        <div class="card-body table-responsive">
            <a href="{{ route('products.create') }}" class="btn btn-primary">Add product</a>

            @if(session('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-striped mt-3">
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>

                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->category?->name ?? '-' }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price, 2) }}</td>
                    <td>
                        @if($product->thumb_image)
                            <img src="{{ asset('storage/' . $product->thumb_image) }}" alt="{{ $product->name }}" style="width: 50px; height: 50px; object-fit: cover;">
                        @else
                            <span class="text-muted">No image</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this product?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>

            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection
