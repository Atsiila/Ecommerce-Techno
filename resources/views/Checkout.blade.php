@extends('layouts.front')

@section('content')
<div class="page-content">
    <div class="checkout">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <h2 class="checkout-title">Detail Pembelian</h2><!-- End .checkout-title -->

                    <form action="{{ route('checkout.process') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="name" required>
                            </div><!-- End .col-sm-6 -->

                            <div class="col-sm-6">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div><!-- End .col-sm-6 -->
                        </div><!-- End .row -->

                        <label>Alamat</label>
                        <input type="text" class="form-control" name="address" required>

                        <label>Telepon</label>
                        <input type="tel" class="form-control" name="phone" required>

                        <div class="cart-summary">
                            <h3>Total Pembayaran</h3>

                            <table class="table table-summary">
                                <tbody>
                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        <td>
                                            @if ($keranjangItems && !$keranjangItems->isEmpty())
                                                @rupiah($keranjangItems->sum(function($item) { return $item->produk->harga * $item->qty; }))
                                            @else
                                                Rp 0 <!-- Atau nilai default lainnya -->
                                            @endif
                                        </td>
                                    </tr><!-- End .summary-total -->
                                </tbody>
                            </table><!-- End .table table-summary -->

                            <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">PROSES PEMBAYARAN</button>
                        </div><!-- End .cart-summary -->
                    </form>
                </div><!-- End .col-lg-9 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .checkout -->
</div><!-- End .page-content -->
@endsection
