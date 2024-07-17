<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // Pastikan model Order sudah di-import

class CheckoutController extends Controller
{
    public function placeOrder(Request $request)
    {
        // Validasi request jika diperlukan
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'id_produk.*' => 'required|integer',
            'prices.*' => 'required|numeric',
            'quantities.*' => 'required|integer',
        ]);

        // Simpan order ke dalam database
        $order = new Order();
        $order->first_name = $request->input('first_name');
        $order->last_name = $request->input('last_name');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->save();

        // Simpan detail order
        $id_produk = $request->input('id_produk');
        $prices = $request->input('prices');
        $quantities = $request->input('quantities');

        // Loop untuk menyimpan setiap item order
        for ($i = 0; $i < count($id_produk); $i++) {
            $order->orderItems()->create([
                'id_produk' => $id_produk[$i],
                'price' => $prices[$i],
                'quantity' => $quantities[$i],
            ]);
        }

        // Proses lain seperti notifikasi atau pengiriman email bisa ditambahkan di sini

        // Redirect ke halaman sukses atau lainnya
        return redirect()->route('checkout.success')->with('success_message', 'Order has been placed successfully!');
    }
}
