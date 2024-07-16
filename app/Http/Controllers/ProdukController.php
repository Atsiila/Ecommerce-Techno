<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Alert;
use Storage;
class ProdukController extends Controller
{
    /**
     * Menampilkan daftar resource.
     */
    public function index()
    {
        $produk = Produk::latest()->paginate(5);
        return view('admin.produk.index', compact('produk'));
    }

    /**
     * Menampilkan formulir untuk membuat resource baru.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.produk.create', compact('kategori'));
    }

    /**
     * Menyimpan resource yang baru dibuat ke dalam storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'stock' => 'required',
            'id_kategori' => 'required|exists:kategoris,id',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',

        ]);

        $produk = new Produk;
        $produk->name = $request->name;
        $produk->deskripsi = $request->deskripsi;
        $produk->harga = $request->harga;
        $produk->stock = $request->stock;
        $produk->id_kategori = $request->id_kategori;
         // upload image
         $image = $request->file('image');
         $image->storeAs('public/produk', $image->hashName());
         $produk->image = $image->hashName();
         $produk->save();
         return redirect()->route('produk.index');

        Alert::success('Sukses', 'Data Berhasil Disimpan')->autoClose(3000);
        return redirect()->route('produk.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Menampilkan resource yang spesifik.
     */
    public function show(Produk $produk)
    {
        $produk = Produk::findOrFail($id);
        return view('detail_produk', compact('produk'));
    }

    /**
     * Menampilkan formulir untuk mengedit resource yang spesifik.
     */
    public function edit(Produk $produk)
    {
        $kategori = Kategori::all();
        return view('admin.produk.edit', compact('produk', 'kategori'));
    }

    /**
     * Memperbarui resource yang spesifik di storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'name' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'stock' => 'required|integer',
            'id_kategori' => 'required|exists:kategoris,id',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);
    

        $produk->name = $request->name;
    $produk->deskripsi = $request->deskripsi;
    $produk->harga = (int) $request->harga; // Ensure harga is an integer
    $produk->stock = (int) $request->stock; // Ensure stock is an integer
    $produk->id_kategori = $request->id_kategori;

    // upload image
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $image->storeAs('public/produk', $image->hashName());
        
        // delete old image
        Storage::delete('public/produk/' . $produk->image);
        
        $produk->image = $image->hashName();
    }

    $produk->save();

    Alert::success('Sukses', 'Data Berhasil Diperbarui')->autoClose(3000);
    return redirect()->route('produk.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Menghapus resource yang spesifik dari storage.
     */
    public function destroy(Produk $produk)
    {
        // delete the product's image
        Storage::delete('public/produk/' . $produk->image);
        
        $produk->delete();
        
        Alert::success('Success', 'Data Berhasil di hapus')->autoClose(3000);
        return redirect()->route('produk.index')->with('success', 'Data berhasil dihapus');
    }
}
