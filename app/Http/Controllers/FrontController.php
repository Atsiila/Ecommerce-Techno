<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\kategori;

use Illuminate\Http\Request;

class FrontController extends Controller //conroler aowkaokwoakw
{
    public function index()
    {
        $kategori = Kategori::all();
        $produk = Produk::all();
        return view('index', compact('produk', 'kategori'));
    }
    public function shop()
    {
        $produk = Produk::all();
        $kategori = Kategori::all();
        return view('shop', compact('produk', 'kategori'));
    }

    public function produkDetail($id)
    {
        $kategori = Kategori::all();
        $produk = Produk::findOrFail($id);
        return view('produk_detail', compact('produk', 'kategori'));
    }

    
    
    
}
