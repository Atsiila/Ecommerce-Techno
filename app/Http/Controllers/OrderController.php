<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $keranjangItem = Cart::where('id_user', Auth::id())->with('produk')->get();
        return view('checkout', compact('keranjangItem'));
    }
    public function showOrderConfirmation(Order $order)
{
    return view('order-confirmation', compact('order'));
}


public function placeOrder(Request $request)
{
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:15',
        'address' => 'required|string|max:255',
    ]);

    // Get cart items for the authenticated user
    $keranjangItem = Cart::where('id_user', Auth::id())->with('produk')->get();

    // Check if cart is empty
    if ($keranjangItem->isEmpty()) {
        return redirect()->route('home')->with('error', 'Cart is empty!');
    }

    // Calculate total order amount
    $total = $keranjangItem->sum(function($item) {
        return $item->produk->harga * $item->qty;
    });

    // Create an order record
    $order = Order::create([
        'id_user' => Auth::id(),
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'total' => $total,
    ]);

    // Create order items for each item in the cart
    foreach ($keranjangItem as $item) {
        // Check if the product exists in the cart
        if ($item->produk) {
            OrderItem::create([
                'order_id' => $order->id,
                'id_produk' => $item->produk->id,
                'qty' => $item->qty,
                'price' => $item->produk->harga,
            ]);
        } else {
            // Handle case where product doesn't exist (optional)
            return redirect()->route('home')->with('error', 'Product not found!');
        }
    }

    // Clear the cart for the authenticated user
    Cart::where('id_user', Auth::id())->delete();

    // Redirect to order confirmation page with order details
    return redirect()->route('order.confirmation', ['order' => $order]);
}

}
