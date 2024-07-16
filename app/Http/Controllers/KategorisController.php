<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
Use Alert;
class KategorisController extends Controller
{
 
    public function index()
    {
        $kategoris = Kategori::all();
        $title = 'Delete kategori!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('admin.kategori.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.kategori.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $this->validate($request, [
        'kategori' => 'required',
        'deskripsi' => 'required',
    ]);

           $kategori = new Kategori;
            $kategori->kategori = $request->kategori;
            $kategori->deskripsi = $request->deskripsi;
            $kategori->save();
            Alert::success('Success', 'Data Berhasil di simpan')->autoClose(3000);
            return redirect()->route('kategori.index')->with('success','data berhasil di tambahkan');
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
             'kategori' => 'required',
             'deskripsi' => 'required',
         ]);

         $kategori = Kategori::findOrFail($id);
         $kategori->kategori = $request->kategori;
         $kategori->deskripsi = $request->deskripsi;
         $kategori->save();
         return redirect()->route('kategori.index');
     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori = Kategori::FindOrFail($id);

        $kategori->delete();
        Alert::success('Success', 'Data Berhasil di hapus')->autoClose(3000);
        return redirect()->route('kategori.index')->with('success', 'data berhasil di hapus');
    }
}
