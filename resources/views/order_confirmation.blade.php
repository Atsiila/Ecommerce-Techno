<!-- resources/views/order_confirmation.blade.php -->

@extends('layouts.front')

@section('content')
<div class="page-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h2>Order Confirmation</h2>
                        <p>Thank you for your order! Your order details are as follows:</p>

                        <ul>
                            <li><strong>Name:</strong> {{ $order->first_name }} {{ $order->last_name }}</li>
                            <li><strong>Email:</strong> {{ $order->email }}</li>
                            <li><strong>Phone:</strong> {{ $order->phone }}</li>
                            <li><strong>Address:</strong> {{ $order->address }}</li>
                        </ul>

                        <h3>Order Items:</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->orderItems as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>@rupiah($item->price)</td>
                                    <td>{{ $item->quantity }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <p><strong>Total Amount:</strong> @rupiah($order->total_amount)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
