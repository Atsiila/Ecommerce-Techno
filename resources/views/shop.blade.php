@extends('layouts.front')

@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('front/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Techno Store<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="toolbox">
                <!-- End .toolbox-left -->

                <!-- End .toolbox-center -->

                
            </div><!-- End .toolbox -->

            <div class="products">
                <div class="row">
                    @foreach ($produk as $data)
                        
                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                        <div class="product">
                            <figure class="product-media">
                                <a href="/produk_detail/{{$data->id}}">
                                    <img src="{{asset('/storage/produk/'. $data->image)}}" alt="Product image" class="product-image">
                                </a>

                                <!-- End .product-action -->

                                <div class="product-action action-icon-top">
                                    <a href="/produk_detail/{{$data->id}}" class="btn-product btn-cart"><span>detail produk</span></a>
                                   
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="/produk_detail/{{$data->id}}">{{ $data->name }}</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="/produk_detail/{{$data->id}}">Stock {{ $data->stock }}</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    Rp: {{ $data->harga }}
                                </div><!-- End .product-price -->
                                <!-- End .rating-container -->

                                <div class="product-nav product-nav-dots">
                                   
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div>
                    @endforeach<!-- End .col-sm-6 col-lg-4 col-xl-3 -->

                    <!-- End .row -->

                <div class="load-more-container text-center">
                    <a href="#" class="btn btn-outline-darker btn-load-more">More Products <i class="icon-refresh"></i></a>
                </div><!-- End .load-more-container -->
            </div><!-- End .products -->

            <div class="sidebar-filter-overlay"></div><!-- End .sidebar-filter-overlay -->
            <!-- End .sidebar-filter -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main>
@endsection