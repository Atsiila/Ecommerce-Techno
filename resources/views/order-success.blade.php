@extends('layouts.front')

@section('content')
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="order-success">
                    <h2>Pesanan Anda Berhasil!</h2>
                    <p>Terima kasih telah berbelanja di toko kami.</p>
                    <a href="{{ url('shop') }}" class="btn btn-outline-primary-2 btn-block">LANJUT BELANJA</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
