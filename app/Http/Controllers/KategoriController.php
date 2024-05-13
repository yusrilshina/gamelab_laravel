<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    
    public function index()
    {
        $kategori = Kategori::all();

        return view('kategori.index', [
            'halaman' => 'kategori',
            'kategori' => $kategori
        ]);
    }

    public function create()
    {
        return view('kategori.create', [
            'halaman' => 'Tambah Kategori'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kategori'     => 'required|string|max:255',
            'deskripsi'   => 'required|min:10|string'
        ]);
        Kategori::create([
            'nama_kategori'     => $request->kategori,
            'deskripsi'   => $request->deskripsi
        ]);
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id)
    {
        $kategori = kategori::findOrFail($id);
        return view('kategori.edit', [
            'halaman' => 'Edit Kategori',
            'kategori' => $kategori
        ]);
    }
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'kategori'     => 'required|string|max:255',
            'deskripsi'   => 'required|min:10|string'
        ]);
        $kategori = kategori::findOrFail($id);
        $kategori->update([
            'nama_kategori'     => $request->kategori,
            'deskripsi'   => $request->deskripsi
        ]);
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Diupdate!']);
    
    }


    public function destroy(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
