@extends('layouts.frontend')

@section('content')
<main class="main-content">
<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            @php
                $detailImage = $product->large_image
                    ? asset('storage/' . $product->large_image)
                    : ($product->thumb_image ? asset('storage/' . $product->thumb_image) : asset('assets/images/9.png'));
            @endphp
            <img src="{{ $detailImage }}" alt="{{ $product->name }}" class="img-fluid rounded shadow" style="width:100%;max-height:500px;object-fit:cover;">
        </div>
        <div class="col-md-6">
            <h2>{{ $product->name }}</h2>
            <p class="text-muted">
                Category:
                @if($product->category)
                    <a href="{{ route('shop.categories.show', $product->category) }}">{{ $product->category->name }}</a>
                @else
                    Uncategorized
                @endif
            </p>
            <h4 class="text-primary">
                @if($product->discount_price)
                    ${{ number_format($product->price-$product->discount_price, 2) }}
                    <small class="text-muted text-decoration-line-through">${{ number_format($product->price, 2) }}</small>
                @else
                    ${{ number_format($product->price, 2) }}
                @endif
            </h4>
            <p>{{ $product->description ?: 'No description available.' }}</p>
            <p><strong>Stock:</strong> {{ $product->stock }}</p>
            <a href="{{ url('/') }}" class="btn btn-secondary">Back to Home</a>

            @if($product->stock > 0)

    <form action="{{ route('cart.add', $product) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="quantity" class="form-label">
                Quantity
            </label>

            <input
                type="number"
                name="quantity"
                id="quantity"
                value="1"
                min="1"
                max="{{ $product->stock }}"
                class="form-control"
                style="width: 120px;"
            >

            @error('quantity')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-lg">
            Add to Cart
        </button>
    </form>

@else

    <button class="btn btn-secondary btn-lg" disabled>
        Out of Stock
    </button>

@endif


        </div>
    </div>
</div>
</main>
@endsection
