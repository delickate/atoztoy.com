@extends('layouts.frontend')

@section('content')
 <main class="main-content">
    <!--== Start Hero Area Wrapper ==-->
    <section class="home-slider-area slider-default">
      <div class="home-slider-content">
        <div class="swiper-container home-slider-container swiper-container-fade swiper-container-initialized swiper-container-horizontal">
          <div class="swiper-wrapper" style="transition-duration: 0ms;"><div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active swiper-slide-prev" data-swiper-slide-index="0" style="width: 1351px; transition-duration: 0ms; opacity: 0; transform: translate3d(0px, 0px, 0px);">
              <!-- Start Slide Item -->
              <div class="home-slider-item item-two">
                <div class="bg-thumb bg-img" data-bg-img="{{ asset('storage/' . $companyProfile->banner_image) }}" style="background-image: url(&quot;{{ asset('assets/images/3.jpg') }}&quot;);"></div>
                <div class="slider-content-area">
                  <div class="container">
                    <div class="row">
                      <div class="col-sm-6 offset-sm-6">
                        <div class="content content2">
                          <div class="inner-content">
                            <h4 class="subtitle">New Arrivals</h4>
                            <h2>Best Kids Store &amp; Online Shop</h2>
                            <a href="{{ route('shop.categories.show') }}" class="btn-theme">Discover Now</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="shape-top bg-img" data-bg-img="{{ asset('assets/images/1.png') }}" style="background-image: url(&quot;{{ asset('assets/images/1.png') }}&quot;);"></div>
              </div>
              <!-- End Slide Item -->
            </div>
            <div class="swiper-slide swiper-slide-active swiper-slide-duplicate-next swiper-slide-duplicate-prev" data-swiper-slide-index="0" style="width: 1351px; transition-duration: 0ms; opacity: 1; transform: translate3d(-1351px, 0px, 0px);">
              <!-- Start Slide Item -->
              <div class="home-slider-item item-two">
                <div class="bg-thumb bg-img" data-bg-img="{{ asset('assets/images/3.jpg') }}" style="background-image: url(&quot;{{ asset('assets/images/3.jpg') }}&quot;);"></div>
                <div class="slider-content-area">
                  <div class="container">
                    <div class="row">
                      <div class="col-sm-6 offset-sm-6">
                        <div class="content content2">
                          <div class="inner-content">
                            <h4 class="subtitle">New Arrivals</h4>
                            <h2>Best Kids Store &amp; Online Shop</h2>
                            <a href="{{ route('shop.categories.show') }}" class="btn-theme">Discover Now</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="shape-top bg-img" data-bg-img="{{ asset('assets/images/1.png') }}" style="background-image: url(&quot;{{ asset('assets/images/1.png') }}&quot;);"></div>
              </div>
              <!-- End Slide Item -->
            </div>
          <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active swiper-slide-next" data-swiper-slide-index="0" style="width: 1351px; transition-duration: 0ms; opacity: 0; transform: translate3d(-2702px, 0px, 0px);">
              <!-- Start Slide Item -->
              <div class="home-slider-item item-two">
                <div class="bg-thumb bg-img" data-bg-img="{{ asset('assets/images/3.jpg') }}" style="background-image: url(&quot;{{ asset('assets/images/3.jpg') }}&quot;);"></div>
                <div class="slider-content-area">
                  <div class="container">
                    <div class="row">
                      <div class="col-sm-6 offset-sm-6">
                        <div class="content content2">
                          <div class="inner-content">
                            <h4 class="subtitle">New Arrivals</h4>
                            <h2>Best Kids Store &amp; Online Shop</h2>
                            <a href="{{ route('shop.categories.show') }}" class="btn-theme">Discover Now</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="shape-top bg-img" data-bg-img="{{ asset('assets/images/1.png') }}" style="background-image: url(&quot;{{ asset('assets/images/1.png') }}&quot;);"></div>
              </div>
              <!-- End Slide Item -->
            </div></div>
        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
      </div>
    </section>
    <!--== End Hero Area Wrapper ==-->

    <!--== Start Brand Logo Area ==-->
    <div class="brand-logo-area brand-logo-default-area">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-lg-12">
            <div class="swiper-container brand-logo-slider-container swiper-container-initialized swiper-container-horizontal">
              <div class="swiper-wrapper brand-logo-slider" style="transition-duration: 0ms;">
                
                @forelse($categories as $category)
                  <div class="swiper-slide brand-logo-item" data-swiper-slide-index="{{ $loop->index }}" style="width: 218.5px;">
                    <a href="{{ url('/products/category/' . $category->id) }}"><img src="{{ $category->images ? asset('storage/' . $category->images) : asset('assets/images/default-category.png') }}" alt="{{ $category->name }}"></a>
                  </div>
                @empty
                  @for($i = 1; $i <= 6; $i++)
                    <div class="swiper-slide brand-logo-item" style="width: 218.5px;">
                      <a href="{{ url('/') }}"><img src="{{ asset('assets/images/' . $i . '.png') }}" alt="Brand-Logo"></a>
                    </div>
                  @endfor
                @endforelse
              </div>
              <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Brand Logo Area ==-->

    <!--== Start Featured Area Wrapper ==-->
    <section class="featured-area featured-default-area aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-4">
            <div class="featured-item">
              <div class="icon">
                <img src="{{ asset('assets/images/f1.png') }}" alt="Image">
              </div>
              <div class="featured-info">
                <h4 class="title">Free Shipping</h4>
                <p>Lorem ipsum dolor sit amet consect adipiscing elit sed does</p>
              </div>
              <div class="shape-group">
                <div class="shape-style1">
                  <img src="{{ asset('assets/images/f4.png') }}" alt="Image">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <div class="featured-item mt-xs-30">
              <div class="icon">
                <img src="{{ asset('assets/images/f2.png') }}" alt="Image">
              </div>
              <div class="featured-info">
                <h4 class="title">Support 24/7</h4>
                <p>Lorem ipsum dolor sit amet consect adipiscing elit sed does</p>
              </div>
              <div class="shape-group">
                <div class="shape-style1">
                  <img src="{{ asset('assets/images/f5.png') }}" alt="Image">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <div class="featured-item mt-sm-30">
              <div class="icon">
                <img src="{{ asset('assets/images/f3.png') }}" alt="Image">
              </div>
              <div class="featured-info">
                <h4 class="title">Money Return</h4>
                <p>Lorem ipsum dolor sit amet consect adipiscing elit sed does</p>
              </div>
              <div class="shape-group">
                <div class="shape-style1">
                  <img src="{{ asset('assets/images/f6.png') }}" alt="Image">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Featured Area Wrapper ==-->

    <!--== Start Product Tab Area Wrapper ==-->
    <section class="product-area product-style4-area">
      <div class="container">
        <div class="row">
          <div class="col-md-6 m-auto">
            <div class="section-title text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
              <h2 class="title">Trending Product</h2>
              <div class="desc">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="product-tab1-slider" data-aos="fade-up" data-aos-duration="1300">
              @forelse($trendingProducts as $product)
                <div class="slide-item">
                  @include('partials-frontend.product-card', ['product' => $product])
                </div>
              @empty
                <div class="slide-item">
                  <p class="text-center text-muted">No products yet.</p>
                </div>
              @endforelse
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Product Tab Area Wrapper ==-->

    <!--== Start Category Area Wrapper ==-->
    <section class="category-area product-category2-area style-two aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
      <div class="container">
        <div class="row category-items2">
          <div class="col-md-6">
            <div class="category-item">
              <div class="thumb">
                <img class="w-100" src="{{ asset('assets/images/4(1).png') }}" alt="Image">
                <div class="content">
                  <div class="contact-info">
                    <h2 class="title text-white">Collection</h2>
                    <h4 class="price text-white">Flat <span>20%</span> Off</h4>
                  </div>
                  <a class="btn-theme" href="{{ route('shop.categories.show') }}">Shop Now</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="category-item mt-sm-50">
              <div class="thumb">
                <img class="w-100" src="{{ asset('assets/images/5(1).png') }}" alt="Image">
                <div class="content">
                  <div class="contact-info">
                    <h2 class="title">Collection</h2>
                    <h4 class="price">Flat <span>30%</span> Off</h4>
                  </div>
                  <a class="btn-theme" href="{{ route('shop.categories.show') }}">Shop Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Category Area Wrapper ==-->

    <!--== Start Divider Area Wrapper ==-->
    <section class="divider-area divider-style1-area bg-img aos-init aos-animate" data-bg-img="{{ asset('assets/images/bg1.png') }}" data-aos="fade-up" data-aos-duration="1000" style="background-image: url(&quot;{{ asset('assets/images/bg1.png') }}&quot;);">
      <div class="container position-relative">
        <div class="row">
          <div class="col-lg-6">
            <div class="divider-content">
              <h2 class="title">Deal Of The Day</h2>
              <p><span>UPTO 35%  OFF </span> On All Other Baby Products</p>
              <div class="countdown-content">
                <ul class="countdown-timer" style="display: none;">
                  <li><span class="days">00</span><p class="days_text">Days</p></li>
                  <li><span class="hours">00</span><p class="hours_text">Hours</p></li>
                  <li><span class="minutes">00</span><p class="minutes_text">MINUTES</p></li>
                  <li><span class="seconds">00</span><p class="seconds_text">SECONDS</p></li>
                </ul>
              </div>
              <a class="btn-theme" href="{{ route('shop.categories.show') }}">Shop Now</a>
            </div>
          </div>
        </div>
        <div class="shape-group">
          <div class="shape-style6">
            <img src="{{ asset('assets/images/3(1).png') }}" alt="Image">
          </div>
        </div>
      </div>
      <div class="shape-group">
        <div class="shape-style1" data-bg-img="{{ asset('assets/images/shape1.png') }}" style="background-image: url(&quot;{{ asset('assets/images/shape1.png') }}&quot;);"></div>
        <div class="shape-style2" data-bg-img="{{ asset('assets/images/shape2.png') }}" style="background-image: url(&quot;{{ asset('assets/images/shape2.png') }}&quot;);"></div>
      </div>
    </section>
    <!--== End Divider Area Wrapper ==-->

    <!--== Start Product Tab Area Wrapper ==-->
    <section class="product-area product-style3-area">
      <div class="container">
        <div class="row">
          <div class="col-md-6 m-auto">
            <div class="section-title text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
              <h2 class="title">New Products</h2>
              <div class="desc">
                <p>Fresh arrivals and brand-new favorites for every age and stage.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row aos-init aos-animate" data-aos="fade-up" data-aos-duration="1300">
          <div class="col-md-12">
            <div class="product-tab-content">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="our-features-tab" data-bs-toggle="tab" data-bs-target="#our-features" type="button" role="tab" aria-controls="our-features" aria-selected="true">All Items</button>
                </li>
                @foreach($categoryProductGroups as $group)
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="category-{{ $group->id }}-tab" data-bs-toggle="tab" data-bs-target="#category-{{ $group->id }}" type="button" role="tab" aria-controls="category-{{ $group->id }}" aria-selected="false">{{ $group->name }}</button>
                  </li>
                @endforeach
              </ul>

              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="our-features" role="tabpanel" aria-labelledby="our-features-tab">
                  <div class="row">
                    @forelse($newProducts as $product)
                      <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product-item">
                          <div class="product-thumb">
                            <a href="{{ route('products.show', $product) }}">
                              <img src="{{ $product->thumb_image ? asset('storage/' . $product->thumb_image) : asset('assets/images/default-product.png') }}" alt="{{ $product->name }}">
                            </a>
                            <div class="product-action">
                              <a class="action-quick-view" href="{{ route('products.show', $product) }}"><i class="ion-arrow-expand"></i></a>
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
                            <h4 class="title"><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></h4>
                            <div class="prices">
                              <span class="price-old"><b>Price:</b> ${{ number_format($product->price, 2) }}</span><br />
        <span class="price"><b>Discount:</b> ${{ number_format($product->discount_price, 2) }}</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    @empty
                      <div class="col-12 text-center text-muted">No new products available.</div>
                    @endforelse
                  </div>
                </div>

                @foreach($categoryProductGroups as $group)
                  <div class="tab-pane fade" id="category-{{ $group->id }}" role="tabpanel" aria-labelledby="category-{{ $group->id }}-tab">
                    <div class="row">
                      @forelse($group->products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                          <div class="product-item">
                            <div class="product-thumb">
                              <a href="{{ route('products.show', $product) }}">
                                <img src="{{ $product->thumb_image ? asset('storage/' . $product->thumb_image) : asset('assets/images/default-product.png') }}" alt="{{ $product->name }}">
                              </a>
                              <div class="product-action">
                                <a class="action-quick-view" href="{{ route('products.show', $product) }}"><i class="ion-arrow-expand"></i></a>
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
                              <h4 class="title"><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></h4>
                              <div class="prices">
                                <span class="price">${{ number_format($product->price, 2) }}</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      @empty
                        <div class="col-12 text-center text-muted">No products in this category yet.</div>
                      @endforelse
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Product Tab Area Wrapper ==-->
    <!--== Start Newsletter Area ==-->
    <section class="testimonial-area testimonial-default-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 m-auto">
            <div class="section-title text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
              <h2 class="title">Testimonial</h2>
              <div class="desc">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row aos-init aos-animate" data-aos="fade-up" data-aos-duration="1300">
          <div class="col-lg-12">
            <div class="swiper-container testimonial-slider-container swiper-container-initialized swiper-container-horizontal">
              <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(-1200px, 0px, 0px);"><div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="3" style="width: 370px; margin-right: 30px;">
                  <div class="testimonial-item">
                    <div class="client-content">
                      <div class="inner-content">
                        <div class="icon">
                          <img src="{{ asset('assets/images/1(2).png') }}" alt="Image">
                        </div>
                        <p>There are many variations of passage of Lorem Ipsum available, but the on majority have suffered alteration in some form, by injected humour.</p>
                      </div>
                      <div class="shape-group">
                        <div class="shape-style1">
                          <img src="{{ asset('assets/images/shape1.png') }}" alt="Image">
                        </div>
                      </div>
                    </div>
                    <div class="client-info">
                      <div class="thumb">
                        <img src="{{ asset('assets/images/1(3).png') }}" alt="Image">
                      </div>
                      <div class="desc">
                        <h4 class="title">Dasia Lovell</h4>
                        <p>Customer</p>
                      </div>
                    </div>
                  </div>
                </div><div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="4" style="width: 370px; margin-right: 30px;">
                  <div class="testimonial-item">
                    <div class="client-content">
                      <div class="inner-content">
                        <div class="icon">
                          <img src="{{ asset('assets/images/1(2).png') }}" alt="Image">
                        </div>
                        <p>Lorem ipsum dolor sit amet, consect adipisi elit sed do eiusmod temporlo incidid ut labore et dolore magnalop aliquall Ut enim ad minim.</p>
                      </div>
                      <div class="shape-group">
                        <div class="shape-style1">
                          <img src="{{ asset('assets/images/shape1.png') }}" alt="Image">
                        </div>
                      </div>
                    </div>
                    <div class="client-info">
                      <div class="thumb">
                        <img src="{{ asset('assets/images/2(2).png') }}" alt="Image">
                      </div>
                      <div class="desc">
                        <h4 class="title">Dasia Lovell</h4>
                        <p>Customer</p>
                      </div>
                    </div>
                  </div>
                </div><div class="swiper-slide swiper-slide-duplicate swiper-slide-prev" data-swiper-slide-index="5" style="width: 370px; margin-right: 30px;">
                  <div class="testimonial-item">
                    <div class="client-content">
                      <div class="inner-content">
                        <div class="icon">
                          <img src="{{ asset('assets/images/1(2).png') }}" alt="Image">
                        </div>
                        <p>There are many variations of passage of Lorem Ipsum available, but the on majority have suffered alteration in some form, by injected humour.</p>
                      </div>
                      <div class="shape-group">
                        <div class="shape-style1">
                          <img src="{{ asset('assets/images/shape1.png') }}" alt="Image">
                        </div>
                      </div>
                    </div>
                    <div class="client-info">
                      <div class="thumb">
                        <img src="{{ asset('assets/images/3(3).png') }}" alt="Image">
                      </div>
                      <div class="desc">
                        <h4 class="title">Akhil Newman</h4>
                        <p>Customer</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" style="width: 370px; margin-right: 30px;">
                  <div class="testimonial-item">
                    <div class="client-content">
                      <div class="inner-content">
                        <div class="icon">
                          <img src="{{ asset('assets/images/1(2).png') }}" alt="Image">
                        </div>
                        <p>Lorem ipsum dolor sit amet, consect adipisi elit sed do eiusmod temporlo incidid ut labore et dolore magnalop aliquall Ut enim ad minim.</p>
                      </div>
                      <div class="shape-group">
                        <div class="shape-style1">
                          <img src="{{ asset('assets/images/shape1.png') }}" alt="Image">
                        </div>
                      </div>
                    </div>
                    <div class="client-info">
                      <div class="thumb">
                        <img src="{{ asset('assets/images/1(3).png') }}" alt="Image">
                      </div>
                      <div class="desc">
                        <h4 class="title">Dasia Lovell</h4>
                        <p>Customer</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="1" style="width: 370px; margin-right: 30px;">
                  <div class="testimonial-item">
                    <div class="client-content">
                      <div class="inner-content">
                        <div class="icon">
                          <img src="{{ asset('assets/images/1(2).png') }}" alt="Image">
                        </div>
                        <p>There are many variations of passage of Lorem Ipsum available, but the on majority have suffered alteration in some form, by injected humour.</p>
                      </div>
                      <div class="shape-group">
                        <div class="shape-style1">
                          <img src="{{ asset('assets/images/shape1.png') }}" alt="Image">
                        </div>
                      </div>
                    </div>
                    <div class="client-info">
                      <div class="thumb">
                        <img src="{{ asset('assets/images/2(2).png') }}" alt="Image">
                      </div>
                      <div class="desc">
                        <h4 class="title">Dasia Lovell</h4>
                        <p>Customer</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide" data-swiper-slide-index="2" style="width: 370px; margin-right: 30px;">
                  <div class="testimonial-item">
                    <div class="client-content">
                      <div class="inner-content">
                        <div class="icon">
                          <img src="{{ asset('assets/images/1(2).png') }}" alt="Image">
                        </div>
                        <p>Lorem ipsum dolor sit amet, consect adipisi elit sed do eiusmod temporlo incidid ut labore et dolore magnalop aliquall Ut enim ad minim.</p>
                      </div>
                      <div class="shape-group">
                        <div class="shape-style1">
                          <img src="{{ asset('assets/images/shape1.png') }}" alt="Image">
                        </div>
                      </div>
                    </div>
                    <div class="client-info">
                      <div class="thumb">
                        <img src="{{ asset('assets/images/3(3).png') }}" alt="Image">
                      </div>
                      <div class="desc">
                        <h4 class="title">Akhil Newman</h4>
                        <p>Customer</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide" data-swiper-slide-index="3" style="width: 370px; margin-right: 30px;">
                  <div class="testimonial-item">
                    <div class="client-content">
                      <div class="inner-content">
                        <div class="icon">
                          <img src="{{ asset('assets/images/1(2).png') }}" alt="Image">
                        </div>
                        <p>There are many variations of passage of Lorem Ipsum available, but the on majority have suffered alteration in some form, by injected humour.</p>
                      </div>
                      <div class="shape-group">
                        <div class="shape-style1">
                          <img src="{{ asset('assets/images/shape1.png') }}" alt="Image">
                        </div>
                      </div>
                    </div>
                    <div class="client-info">
                      <div class="thumb">
                        <img src="{{ asset('assets/images/1(3).png') }}" alt="Image">
                      </div>
                      <div class="desc">
                        <h4 class="title">Dasia Lovell</h4>
                        <p>Customer</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide" data-swiper-slide-index="4" style="width: 370px; margin-right: 30px;">
                  <div class="testimonial-item">
                    <div class="client-content">
                      <div class="inner-content">
                        <div class="icon">
                          <img src="{{ asset('assets/images/1(2).png') }}" alt="Image">
                        </div>
                        <p>Lorem ipsum dolor sit amet, consect adipisi elit sed do eiusmod temporlo incidid ut labore et dolore magnalop aliquall Ut enim ad minim.</p>
                      </div>
                      <div class="shape-group">
                        <div class="shape-style1">
                          <img src="{{ asset('assets/images/shape1.png') }}" alt="Image">
                        </div>
                      </div>
                    </div>
                    <div class="client-info">
                      <div class="thumb">
                        <img src="{{ asset('assets/images/2(2).png') }}" alt="Image">
                      </div>
                      <div class="desc">
                        <h4 class="title">Dasia Lovell</h4>
                        <p>Customer</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide swiper-slide-duplicate-prev" data-swiper-slide-index="5" style="width: 370px; margin-right: 30px;">
                  <div class="testimonial-item">
                    <div class="client-content">
                      <div class="inner-content">
                        <div class="icon">
                          <img src="{{ asset('assets/images/1(2).png') }}" alt="Image">
                        </div>
                        <p>There are many variations of passage of Lorem Ipsum available, but the on majority have suffered alteration in some form, by injected humour.</p>
                      </div>
                      <div class="shape-group">
                        <div class="shape-style1">
                          <img src="{{ asset('assets/images/shape1.png') }}" alt="Image">
                        </div>
                      </div>
                    </div>
                    <div class="client-info">
                      <div class="thumb">
                        <img src="{{ asset('assets/images/3(3).png') }}" alt="Image">
                      </div>
                      <div class="desc">
                        <h4 class="title">Akhil Newman</h4>
                        <p>Customer</p>
                      </div>
                    </div>
                  </div>
                </div>
              <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="0" style="width: 370px; margin-right: 30px;">
                  <div class="testimonial-item">
                    <div class="client-content">
                      <div class="inner-content">
                        <div class="icon">
                          <img src="{{ asset('assets/images/1(2).png') }}" alt="Image">
                        </div>
                        <p>Lorem ipsum dolor sit amet, consect adipisi elit sed do eiusmod temporlo incidid ut labore et dolore magnalop aliquall Ut enim ad minim.</p>
                      </div>
                      <div class="shape-group">
                        <div class="shape-style1">
                          <img src="{{ asset('assets/images/shape1.png') }}" alt="Image">
                        </div>
                      </div>
                    </div>
                    <div class="client-info">
                      <div class="thumb">
                        <img src="{{ asset('assets/images/1(3).png') }}" alt="Image">
                      </div>
                      <div class="desc">
                        <h4 class="title">Dasia Lovell</h4>
                        <p>Customer</p>
                      </div>
                    </div>
                  </div>
                </div><div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next" data-swiper-slide-index="1" style="width: 370px; margin-right: 30px;">
                  <div class="testimonial-item">
                    <div class="client-content">
                      <div class="inner-content">
                        <div class="icon">
                          <img src="{{ asset('assets/images/1(2).png') }}" alt="Image">
                        </div>
                        <p>There are many variations of passage of Lorem Ipsum available, but the on majority have suffered alteration in some form, by injected humour.</p>
                      </div>
                      <div class="shape-group">
                        <div class="shape-style1">
                          <img src="{{ asset('assets/images/shape1.png') }}" alt="Image">
                        </div>
                      </div>
                    </div>
                    <div class="client-info">
                      <div class="thumb">
                        <img src="{{ asset('assets/images/2(2).png') }}" alt="Image">
                      </div>
                      <div class="desc">
                        <h4 class="title">Dasia Lovell</h4>
                        <p>Customer</p>
                      </div>
                    </div>
                  </div>
                </div><div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="2" style="width: 370px; margin-right: 30px;">
                  <div class="testimonial-item">
                    <div class="client-content">
                      <div class="inner-content">
                        <div class="icon">
                          <img src="{{ asset('assets/images/1(2).png') }}" alt="Image">
                        </div>
                        <p>Lorem ipsum dolor sit amet, consect adipisi elit sed do eiusmod temporlo incidid ut labore et dolore magnalop aliquall Ut enim ad minim.</p>
                      </div>
                      <div class="shape-group">
                        <div class="shape-style1">
                          <img src="{{ asset('assets/images/shape1.png') }}" alt="Image">
                        </div>
                      </div>
                    </div>
                    <div class="client-info">
                      <div class="thumb">
                        <img src="{{ asset('assets/images/3(3).png') }}" alt="Image">
                      </div>
                      <div class="desc">
                        <h4 class="title">Akhil Newman</h4>
                        <p>Customer</p>
                      </div>
                    </div>
                  </div>
                </div></div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
          </div>
        </div>
      </div>
      <div class="thumb-style bg-img" data-bg-img="{{ asset('assets/images/shape2.png') }}" style="background-image: url(&quot;{{ asset('assets/images/shape2.png') }}&quot;);"></div>
    </section>
    <!--== End Newsletter Area ==-->

    <!--== Start Blog Area Wrapper ==-->
    <section class="blog-area blog-default2-area">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-lg-6 m-auto">
            <div class="section-title text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
              <h2 class="title">Latest Blog</h2>
              <div class="desc">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row aos-init aos-animate" data-aos="fade-up" data-aos-duration="1300">
          <div class="col-lg-4 col-md-6 col-sm-6">
            <!--== Start Blog Post Item ==-->
            <div class="post-item">
              <div class="thumb">
                <a href="{{ route('shop.categories.show') }}"><img src="{{ asset('assets/images/1.jpg') }}" alt="Image"></a>
              </div>
              <div class="content">
                <div class="meta">By, <a class="author" href="{{ route('shop.categories.show') }}">June Cha </a><span class="dots"></span><span class="post-date">25 May, 2121</span></div>
                <h4 class="title">
                  <a href="{{ route('shop.categories.show') }}">Baby Planet's toys makes learning so easy</a>
                </h4>
                <a class="btn-theme" href="{{ route('shop.categories.show') }}">Read More</a>
              </div>
            </div>
            <!--== End Blog Post Item ==-->
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <!--== Start Blog Post Item ==-->
            <div class="post-item mt-xs-30">
              <div class="thumb">
                <a href="{{ route('shop.categories.show') }}"><img src="{{ asset('assets/images/2.jpg') }}" alt="Image"></a>
              </div>
              <div class="content">
                <div class="meta">By, <a class="author" href="{{ route('shop.categories.show') }}">June Cha </a><span class="dots"></span><span class="post-date">July 24, 2022</span></div>
                <h4 class="title">
                  <a href="{{ route('shop.categories.show') }}">Mother revolves around her children</a>
                </h4>
                <a class="btn-theme" href="{{ route('shop.categories.show') }}">Read More</a>
              </div>
            </div>
            <!--== End Blog Post Item ==-->
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <!--== Start Blog Post Item ==-->
            <div class="post-item mt-md-30">
              <div class="thumb">
                <a href="{{ route('shop.categories.show') }}"><img src="{{ asset('assets/images/3.jpg') }}" alt="Image"></a>
              </div>
              <div class="content">
                <div class="meta">By, <a class="author" href="{{ route('shop.categories.show') }}">June Cha </a><span class="dots"></span><span class="post-date">January 28, 2022</span></div>
                <h4 class="title">
                  <a href="{{ route('shop.categories.show') }}">Learn while you grow toys Baby Planet</a>
                </h4>
                <a class="btn-theme" href="{{ route('shop.categories.show') }}">Read More</a>
              </div>
            </div>
            <!--== End Blog Post Item ==-->
          </div>
        </div>
      </div>
    </section>
    <!--== End Blog Area Wrapper ==-->
  </main>
@endsection
