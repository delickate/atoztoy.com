@extends('layouts.frontend')

@section('content')
<main class="main-content">
  <section class="product-area product-style3-area">
    <div class="container py-5">

    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="section-title text-center">
                <h2 class="title">
                    {{ $category ? $category->name : 'All Products' }}
                </h2>

                <div class="desc">
                    <p>
                        {{ $category
                            ? 'Browse products in this category.'
                            : 'Browse all available products.'
                        }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        @forelse($products as $product)

            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                @include('partials-frontend.product-card', [
                    'product' => $product
                ])
            </div>

        @empty

            <div class="col-12 text-center py-5">
                <p class="text-muted">
                    {{ $category
                        ? 'No products in this category yet.'
                        : 'No products available yet.'
                    }}
                </p>
            </div>

        @endforelse

    </div>

    @if($products->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $products->links() }}
        </div>
    @endif

    <div class="text-center mt-4">
        <a href="{{ url('/') }}" class="btn-theme">
            Back to Home
        </a>
    </div>

</div>


  </section>
</main>
@endsection
