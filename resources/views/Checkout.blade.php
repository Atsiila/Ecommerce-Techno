@extends('layouts.front')

@section('content')
<div class="page-content">
    <div class="checkout">
        <div class="container">
            <form action="{{ route('checkout.placeOrder') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-9">
                        <h2 class="checkout-title">Billing Details</h2>

                        <div class="row">
                            <div class="col-sm-6">
                                <label>First Name *</label>
                                <input type="text" class="form-control" name="first_name" required>
                            </div>

                            <div class="col-sm-6">
                                <label>Last Name *</label>
                                <input type="text" class="form-control" name="last_name" required>
                            </div>
                        </div>

                        <label>Email address *</label>
                        <input type="email" class="form-control" name="email" required>

                        <label>Phone *</label>
                        <input type="tel" class="form-control" name="phone" required>

                        <label>Address *</label>
                        <input type="text" class="form-control" name="address" required>
                    </div>

                    <aside class="col-lg-3">
                        <div class="summary">
                            <h3 class="summary-title">Your Order</h3>

                            <table class="table table-summary">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($keranjangItem as $item)
                                    <tr>
                                        <td>{{ $item->produk->name }}</td>
                                        <td>@rupiah($item->produk->harga * $item->qty)</td>
                                        <input type="hidden" name="id_produk[]" value="{{ $item->produk->id_produk }}">
                                        <input type="hidden" name="prices[]" value="{{ $item->produk->harga }}">
                                        <input type="hidden" name="quantities[]" value="{{ $item->qty }}">
                                    </tr>
                                    @endforeach
                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        <td>@rupiah($keranjangItem->sum(function($item) { return $item->produk->harga * $item->qty; }))</td>
                                    </tr>
                                </tbody>
                            </table>

                            <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">PLACE ORDER</button>
                        </div>
                    </aside>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
