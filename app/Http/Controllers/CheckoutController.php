<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\KeranjangItem; // Pastikan model KeranjangItem diimpor

class CheckoutController extends Controller
{
    public function index()
    {
        // Ambil item keranjang untuk user yang terautentikasi
        $keranjangItems = auth()->user()->keranjangItems ?? collect(); // Menggunakan collect() untuk membuat koleksi kosong jika keranjangItems null

        return view('Checkout', compact('keranjangItems'));
    }

    public function process(Request $request)
    {
        // Validasi request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        // Ambil item keranjang untuk user yang terautentikasi
        $keranjangItems = auth()->user()->keranjangItems ?? collect(); // Menggunakan collect() untuk membuat koleksi kosong jika keranjangItems null

        // Cek jika keranjangItems kosong
        if ($keranjangItems->isEmpty()) {
            // Handle case where cart is empty
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Proses pesanan
        $order = new Order();
        $order->user_id = auth()->id();
        $order->name = $request->name;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->phone = $request->phone;

        // Hitung total hanya jika keranjangItems tidak kosong
        $order->total = $keranjangItems->sum(function($item) {
            return $item->produk->harga * $item->qty; // Sesuaikan dengan struktur data Anda
        });

        $order->save();

        // Hapus item dari keranjang belanja
        auth()->user()->keranjangItems()->delete();

        // Redirect ke halaman sukses
        return redirect()->route('order.success');
    }
}
