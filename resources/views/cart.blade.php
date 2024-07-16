@extends('layouts.front')

@section('content')
<div class="page-content">
    <div class="cart">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <table class="table table-cart table-mobile">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($keranjangItem as $data)
                            <tr>
                                <td class="product-col">
                                    <div class="product">
                                        <figure class="product-media">
                                            <a href="#">
                                                <img src="{{ asset('image/produk/' . $data->produk->image) }}" alt="Product image">
                                            </a>
                                        </figure>

                                        <h3 class="product-title">
                                            <a href="#">{{ $data->produk ? $data->produk->name_produk : 'Produk Tidak Tersedia' }}</a>
                                        </h3><!-- End .product-title -->
                                    </div><!-- End .product -->
                                </td>
                                {{--subtotal--}}
                                <td class="price-col">@rupiah($data->produk->harga)</td>
                                <td class="quantity-col">
                                    <div class="cart-product-quantity">
                                        <form action="{{ route('cart.update', $data->id) }}" method="POST">
                                            @csrf
                                            <input type="number" name="qty" class="form-control" value="{{ $data->qty }}" min="1" required>
                                            <button type="submit" class="form-control"><i class="icon-refresh"></i></button>
                                        </form>
                                    </div><!-- End .cart-product-quantity -->
                                </td>
                                <td class="total-col">@rupiah($data->produk->harga * $data->qty)</td>
                                <td class="remove-col">
                                    <form action="{{ route('cart.delete', $data->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-remove">
                                            <i class="icon-close"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table><!-- End .table table-cart -->

                </div><!-- End .col-lg-9 -->
                <aside class="col-lg-3">
                    <div class="summary summary-cart">
                        <h3 class="summary-title">Total Keranjang</h3><!-- End .summary-title -->

                        <table class="table table-summary">
                            <tbody>

                                <tr class="summary-subtotal">
                                    <td>Total:</td>
                                    <td>@rupiah($keranjangItem->sum(function($item) { return $item->produk->harga * $item->qty; }))</td>
                                </tr><!-- End .summary-total -->
                            </tbody>
                        </table><!-- End .table table-summary -->

                        <a href="checkout.html" class="btn btn-outline-primary-2 btn-order btn-block">CHECKOUT</a>
                    </div><!-- End .summary -->

                    <a href="{{url ('shop')}}" class="btn btn-outline-dark-2 btn-block mb-3"><span>LANJUT BELANJA</span><i class="icon-refresh"></i></a>
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .cart -->
</div><!-- End .page-content -->
@endsection