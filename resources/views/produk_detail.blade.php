@extends('layouts.front')

@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <!-- End .pager-nav -->
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="product-details-top">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery product-gallery-vertical">
                            <div class="row">
                                <figure class="product-main-image">
                                    <img id="product-zoom" src="{{ asset('storage/produk/' . $produk->image) }}" data-zoom-image="{{ asset('storage/produk/' . $produk->image) }}" alt="product image">
                                    <a href="{{ asset('storage/produk/' . $produk->image) }}" id="btn-product-gallery" class="btn-product-gallery">
                                        <i class="icon-arrows"></i>
                                    </a>
                                </figure><!-- End .product-main-image -->
                                <!-- End .product-image-gallery -->
                            </div><!-- End .row -->
                        </div><!-- End .product-gallery -->
                    </div><!-- End .col-md-6 -->

                    <div class="col-md-6">
                        <div class="product-details">
                            <h1 class="product-title">{{ $produk->name }}</h1><!-- End .product-title -->

                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                            </div><!-- End .rating-container -->

                            <div class="product-price">
                                @rupiah($produk->harga)
                            </div><!-- End .product-price -->

                            <div class="product-content">
                                <p>
                                    {!! $produk->deskripsi !!}
                                </p>
                            </div><!-- End .product-content -->

                            <div class="details-filter-row details-row-size">
                                <label for="qty">Quantity:</label>
                                <div class="product-details-quantity">
                                    <input type="number" id="qty" class="form-control" value="1" min="1" max="10" step="1" produk-decimals="0" required>
                                </div><!-- End .product-details-quantity -->
                            </div><!-- End .details-filter-row -->

                            @guest
                            <form action="{{url('login')}}">
                                <div class="product-details-action">
                                    @csrf
                                    <input type="hidden"> {{--qty wak--}} {{--anomali pernah kesini--}}
                                    <button class="btn-product"><span>Harap Login Terlebih dahulu</span></button>
                                </div><!-- End .product-details-action -->
                            </form>
                            @else
                            <form action="{{ route('cart.add', $produk->id) }}" method="POST">
                                <div class="product-details-action">
                                    @csrf
                                    
                                    <input type="hidden" name="qty" value="1" class="quantity-input"> {{--qty wak--}} {{--anomali pernah kesini--}}
                                    <button  class="btn-product btn-info"><span>Tambah ke Keranjang</span></button>
                                </div><!-- End .product-details-action -->
                            </form>
                            @endguest
                            
                            <div class="social-icons social-icons-sm">
                                <span class="social-label">Share:</span>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" class="social-icon" title="Facebook" target="_blank">
                                    <i class="icon-facebook-f"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}&text={{ urlencode($produk->name) }}" class="social-icon" title="Twitter" target="_blank">
                                    <i class="icon-twitter"></i>
                                </a>
                                <a href="#" class="social-icon" title="Instagram" target="_blank">
                                    <i class="icon-instagram"></i>
                                </a>
                                <a href="https://pinterest.com/pin/create/button/?url={{ urlencode(Request::fullUrl()) }}&media={{ asset('storage/produk/' . $produk->image) }}&description={{ urlencode($produk->name) }}" class="social-icon" title="Pinterest" target="_blank">
                                    <i class="icon-pinterest"></i>
                                </a>
                            </div>
                            <!-- End .social-icons -->
                        </div><!-- End .product-details -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .product-details-top -->

            <div class="product-details-tab">
                <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                        <div class="product-desc-content">
                            <h3>Product Information</h3>
                            <p>- {{ $produk->deskripsi }} </p>
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .product-details-tab -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main>
@endsection
