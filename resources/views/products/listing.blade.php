@extends('layouts.frontend')

@section('content')
<div class="container">
    <h2>Products</h2>
    <div class="card">
        <div class="card-body table-responsive">
            

            <div class="product-tab1-slider" data-aos="fade-up" data-aos-duration="1300">
    @forelse($products as $product)
        <div class="slide-item">
            @include('partials-frontend.product-card', ['product' => $product])
        </div>
    @empty
        <div class="slide-item">
            <p class="text-center text-muted">No products yet.</p>
        </div>
    @endforelse
</div>

{{ $products->links() }}

        </div>
    </div>
</div>
@endsection
