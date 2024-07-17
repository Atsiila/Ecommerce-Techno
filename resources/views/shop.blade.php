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
                <img src="{{ asset('/storage/produk/'. $data->image) }}" alt="Product image" class="product-image">
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
                @rupiah($data->harga) <!-- Corrected to $data->harga -->
            </div><!-- End .product-price -->
            <!-- End .rating-container -->
            <div class="product-nav product-nav-dots">
                <!-- Product navigation dots if needed -->
            </div><!-- End .product-nav -->
        </div><!-- End .product-body -->
    </div><!-- End .product -->
</div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
@endforeach
<!-- End .col-sm-6 col-lg-4 col-xl-3 -->

                    <!-- End .row -->

                   <!-- End .products -->
                    <!-- End .load-more-container -->
            </div><!-- End .products -->
            <div class="products">
                <div class="row">
                    @foreach ($produk as $data)
                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                        <div class="product">
                            <!-- Markup Produk -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                    @endforeach
                </div><!-- End .row -->
            
                <div class="load-more-container text-center">
                    <button class="btn btn-outline-darker btn-load-more" id="load-more-btn">Lebih Banyak Produk <i class="icon-refresh"></i></button>
                    <div id="load-more-products" class="d-none">
                        <!-- Placeholder untuk memuat produk -->
                    </div>
                </div><!-- End .load-more-container -->
            </div>
            <div class="sidebar-filter-overlay"></div><!-- End .sidebar-filter-overlay -->
            <!-- End .sidebar-filter -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var loadMoreBtn = document.getElementById('load-more-btn');
        var loadMoreProductsContainer = document.getElementById('load-more-products');
        var offset = {{ count($produk) }}; // Mendapatkan jumlah produk yang sudah dimuat

        loadMoreBtn.addEventListener('click', function () {
            fetch('/load-more-products?offset=' + offset) // Ganti dengan route Laravel Anda untuk mengambil lebih banyak produk
                .then(response => response.json())
                .then(data => {
                    data.forEach(product => {
                        var productHtml = `
                            <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                <div class="product">
                                    <!-- Markup Produk -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                        `;
                        loadMoreProductsContainer.insertAdjacentHTML('beforeend', productHtml);
                    });
                    offset += data.length; // Update offset untuk produk berikutnya
                })
                .catch(error => console.error('Error fetching more products:', error));
        });
    });
</script>

@endsection