@php
    $productImage = $product->thumb_image
        ? asset('storage/' . $product->thumb_image)
        : asset('assets/images/9.png');
    $displayPrice = $product->discount_price ?: $product->price;
@endphp
<div class="product-item">
  <div class="product-thumb">
    <a href="{{ route('shop.products.show', $product) }}">
      <img src="{{ $productImage }}" alt="{{ $product->name }}">
    </a>
    <div class="product-action">
      <a class="action-quick-view" href="{{ route('shop.products.show', $product) }}"><i class="ion-arrow-expand"></i></a>
    </div>
  </div>
  <div class="product-info">
    <div class="rating">
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
    </div>
    <h4 class="title"><b>Name:</b> <a href="{{ route('shop.products.show', $product) }}">{{ $product->name }}</a></h4>
    <div class="prices">
      @if($product->discount_price)
        <span class="price-old"><b>Price:</b> ${{ number_format($product->price, 2) }}</span><br />
        <span class="price"><b>Discount:</b> ${{ number_format($displayPrice, 2) }}</span>
        
      @else
        <span class="price">${{ number_format($product->price, 2) }}</span>
      @endif
    </div>
  </div>
</div>
