@extends('layouts.front')
@section('content')

<!DOCTYPE html>
<html lang="en">


<!-- molla/index-2.html  22 Nov 2019 09:55:32 GMT -->
<div class="intro-section bg-lighter pt-5 pb-6">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="intro-slider-container slider-container-ratio slider-container-1 mb-2 mb-lg-0">
                    @if($produk->isNotEmpty())
                    <div class="intro-slider intro-slider-1 owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{
                            "nav": false, 
                            "responsive": {
                                "768": {
                                    "nav": true
                                }
                            }
                        }'>
                        @php
                            $maxSlides = 3;
                            $counter = 0;
                        @endphp

                        @foreach ($produk as $data)
                            @if ($counter < $maxSlides)
                                <div class="intro-slide">
                                    <figure class="slide-image">
                                        <picture>
                                            <source media="(max-width: 480px)" srcset="{{ asset('/storage/produk/' . $data->image) }}">
                                            <img src="{{ asset('/storage/produk/' . $data->image) }}" alt="Image Desc">
                                        </picture>
                                    </figure><!-- End .slide-image -->

                                    <div class="intro-content">
                                        <h3 class="intro-subtitle">{{ $data->name }}</h3><!-- End .h3 intro-subtitle -->
                                        <h1 class="intro-title">{{ $data->name }}<br></h1><!-- End .intro-title -->

                                        <a href="{{url('shop')}}" class="btn btn-outline-white">
                                            <span>SHOP NOW</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </a>
                                    </div><!-- End .intro-content -->
                                </div><!-- End .intro-slide -->

                                @php
                                    $counter++;
                                @endphp
                            @else
                                @break
                            @endif
                        @endforeach
                    </div><!-- End .intro-slider owl-carousel owl-simple -->
                    
                    <span class="slider-loader"></span><!-- End .slider-loader -->
                    @else
                        <p>No products available.</p>
                    @endif
                </div><!-- End .intro-slider-container -->
            </div><!-- End .col-lg-8 -->

            <div class="col-lg-4">
                <div class="intro-banners">
                    <div class="row row-sm">
                        @if($produk->isNotEmpty())
                        @php
                            $randomProduk = $produk->random(1)->first();
                        @endphp

                        <div class="col-md-6 col-lg-12">
                            <div class="banner banner-display">
                                <a href="/produk_detail/{{ $randomProduk->id }}">
                                    <img src="{{ asset('/storage/produk/' . $randomProduk->image) }}" alt="Banner">
                                </a>

                                <div class="banner-content">
                                    <h4 class="banner-subtitle text-darkwhite">
                                        <a href="/produk_detail/{{ $randomProduk->id }}">{{ $randomProduk->name }}</a>
                                    </h4><!-- End .banner-subtitle -->
                                    <h3 class="banner-title text-white">
                                        <a href="/produk_detail/{{ $randomProduk->id }}">{{ $randomProduk->name }}</a>
                                    </h3><!-- End .banner-title -->
                                    <a href="/produk_detail/{{ $randomProduk->id }}" class="btn btn-outline-white banner-link">
                                        Shop Now<i class="icon-long-arrow-right"></i>
                                    </a>
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                        </div><!-- End .col-md-6 col-lg-12 -->
                        @else
                            <p>No products available.</p>
                        @endif
                    </div><!-- End .row row-sm -->
                </div><!-- End .intro-banners -->
            </div><!-- End .col-lg-4 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .intro-section -->

        </div><!-- End .row -->

        <div class="mb-6"></div><!-- End .mb-6 -->

        <div class="owl-carousel owl-simple" data-toggle="owl" 
            data-owl-options='{
                "nav": false, 
                "dots": false,
                "margin": 30,
                "loop": false,
                "responsive": {
                    "0": {
                        "items":2
                    },
                    "420": {
                        "items":3
                    },
                    "600": {
                        "items":4
                    },
                    "900": {
                        "items":5
                    },
                    "1024": {
                        "items":6
                    }
                }
            }'>
            <a href="https://www.lenovo.com/id/id/pc/?msockid=388f531f36f866da246b47b237bd6775" class="brand">
                <img src="{{asset('front/assets/images/brands/lenovo-logo1.png')}}" alt="Brand Name">
            </a>

            <a href="https://www.apple.com/" class="brand">
                <img src="{{asset('front/assets/images/brands/apple-logo1.png')}}" alt="Brand Name">
            </a>

            <a href="https://www.hp.com/id-en/shop/?msockid=388f531f36f866da246b47b237bd6775" class="brand">
                <img src="{{asset('front/assets/images/brands/hp-logo1.png')}}" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="{{asset('front/assets/images/brands/4.png')}}" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="{{asset('front/assets/images/brands/5.png')}}" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="{{asset('front/assets/images/brands/6.png')}}" alt="Brand Name">
            </a>
        </div><!-- End .owl-carousel -->
    </div><!-- End .container -->
</div><!-- End .bg-lighter -->

<div class="mb-6"></div><!-- End .mb-6 -->

<div class="container">
    <div class="heading heading-center mb-3">
        <h2 class="title-lg">Trendy Products</h2><!-- End .title -->
    </div><!-- End .heading -->

    <div class="tab-content tab-content-carousel">
        <div class="tab-pane p-0 fade show active" id="trendy-all-tab" role="tabpanel" aria-labelledby="trendy-all-link">
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1200": {
                            "items":4,
                            "nav": true,
                            "dots": false
                        }
                    }
                }'>
               
                @if($produk->isNotEmpty())

                @foreach ($produk as $data)
                <div class="product product-11 text-center">
                    <figure class="product-media">
                        <a href="/produk_detail/{{$data->id}}">
                            <img src="{{asset('/storage/produk/'. $data->image)}}" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                        </div><!-- End .product-action-vertical -->

                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <h3 class="product-title"><a href="/produk_detail/{{$data->id}}">{{ $data->name }}</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            <span class="new-price">@rupiah($data->harga)</span>
                        </div><!-- End .product-price -->

                        <!-- End .product-nav -->
                    </div><!-- End .product-body -->
                    <div class="product-action">
                        <a href="/produk_detail/{{$data->id}}" class="btn-product btn-cart"><span>Detail Produk</span></a>
                    </div>
                </div><!-- End .product -->
                @endforeach
                @else
                <p>No products available.</p>
            @endif<!-- End .product-action --> 
                
                <!-- End .product -->
            </div><!-- End .owl-carousel -->
        </div><!-- .End .tab-pane -->
        <!-- .End .tab-pane -->
    </div><!-- End .tab-content -->
</div><!-- End .container -->


    <div class="container categories pt-6">
        <h2 class="title-lg text-center mb-4">Shop by Categories</h2><!-- End .title-lg text-center -->
    
        <div class="row">
            @if($produk->isNotEmpty())
        @php
            // Select up to 2 random products
            $selectedProduk = $produk->random(min(3, $produk->count()));
        @endphp
    
        <div class="row">
            @foreach ($selectedProduk as $data)
                <div class="col-6 col-lg-4">
                    <div class="banner banner-display banner-link-anim">
                        <a href="/produk_detail/{{$data->id}}">
                            <img src="{{asset('/storage/produk/' . $data->image)}}" alt="Banner">
                        </a>
    
                        <div class="banner-content banner-content-center">
                            <h3 class="banner-title text-white"><a href="/produk_detail/{{$data->id}}">{{ $data->name }}</a></h3><!-- End .banner-title -->
                            <a href="/produk_detail/{{$data->id}}" class="btn btn-outline-white banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div>
            @endforeach
        </div>
    @else
        <p>No products available.</p>
    @endif<!-- End .container --><!-- End .container --><!-- End .row -->
</div><!-- End .container -->

<div class="mb-5"></div><!-- End .mb-6 -->


<div class="container">
    <div class="heading heading-center mb-6">
        <h2 class="title">Recent Arrivals</h2><!-- End .title -->

        
    </div><!-- End .heading -->

    <div class="tab-content">
        <div class="tab-pane p-0 fade show active" id="top-all-tab" role="tabpanel" aria-labelledby="top-all-link">
            <div class="products">
                <div class="row justify-content-center">
                    @if (!$produk->isEmpty())
                        @foreach ($produk as $data)
                        <div class="col-6 col-md-4 col-lg-3 mb-4"> <!-- Added mb-4 for margin bottom -->
                            <div class="product product-11 mt-v3 text-center">
                                <figure class="product-media">
                                    <a href="/produk_detail/{{$data->id}}">
                                        <img src="{{asset('/storage/produk/' . $data->image)}}" alt="Product image" class="product-image">
                                    </a>
                                </figure><!-- End .product-media -->
    
                                <div class="product-body">
                                    <h3 class="product-title"><a href="/produk_detail/{{$data->id}}">{{$data->name}}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        @rupiah($data->harga)
                                    </div><!-- End .product-price -->
                                </div><!-- End .product-body -->
    
                                <div class="product-action">
                                    <a href="/produk_detail/{{$data->id}}" class="btn-product btn-cart"><span>Detail Produk</span></a>
                                </div><!-- End .product-action -->
                            </div><!-- End .product -->
                        </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                        @endforeach
                    @else
                        <p>No products found.</p>
                    @endif
                </div><!-- End .row -->
    
                <div class="more-container text-center">
                    <a href="#" class="btn btn-outline-darker btn-more"><span>Load more products</span><i class="icon-long-arrow-down"></i></a>
                </div><!-- End .more-container -->
            </div><!-- End .products -->
        </div><!-- .End .tab-pane -->
    </div><!-- End .tab-content -->
    <!-- End .tab-content -->
   <!-- End .more-container -->
</div><!-- End .container -->

<div class="container">
    <hr>
    <div class="row justify-content-center">
        <div class="col-lg-4 col-sm-6">
            <div class="icon-box icon-box-card text-center">
                <span class="icon-box-icon">
                    <i class="icon-rocket"></i>
                </span>
                <div class="icon-box-content">
                    <h3 class="icon-box-title">Payment & Delivery</h3><!-- End .icon-box-title -->
                    <p>Free shipping for orders over $50</p>
                </div><!-- End .icon-box-content -->
            </div><!-- End .icon-box -->
        </div><!-- End .col-lg-4 col-sm-6 -->

        <div class="col-lg-4 col-sm-6">
            <div class="icon-box icon-box-card text-center">
                <span class="icon-box-icon">
                    <i class="icon-rotate-left"></i>
                </span>
                <div class="icon-box-content">
                    <h3 class="icon-box-title">Return & Refund</h3><!-- End .icon-box-title -->
                    <p>Free 100% money back guarantee</p>
                </div><!-- End .icon-box-content -->
            </div><!-- End .icon-box -->
        </div><!-- End .col-lg-4 col-sm-6 -->

        <div class="col-lg-4 col-sm-6">
            <div class="icon-box icon-box-card text-center">
                <span class="icon-box-icon">
                    <i class="icon-life-ring"></i>
                </span>
                <div class="icon-box-content">
                    <h3 class="icon-box-title">Quality Support</h3><!-- End .icon-box-title -->
                    <p>Alway online feedback 24/7</p>
                </div><!-- End .icon-box-content -->
            </div><!-- End .icon-box -->
        </div><!-- End .col-lg-4 col-sm-6 -->
    </div><!-- End .row -->

    <div class="mb-2"></div><!-- End .mb-2 -->
</div><!-- End .container -->


<!-- molla/index-2.html  22 Nov 2019 09:55:42 GMT -->
</html>
@endsection