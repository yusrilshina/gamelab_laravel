<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::with('kategori')->get();
        return view('artikel.index', [
            'artikel' => $artikel,
            'halaman' => 'Artikel'
        ]);
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('artikel.create', [
            'halaman' => 'Create Artikel',
            'kategori' => $kategori
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_kategori' => 'required|integer',
            'gambar'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'judul'     => 'required|min:5',
            'deskripsi'   => 'required|min:10'
        ]);

        $gambar = $request->file('gambar');
        $gambar->storeAs('public/gambar', $gambar->hashName());

        Artikel::create([
            'gambar'     => $gambar->hashName(),
            'id_kategori' => $request->id_kategori,
            'judul'     => $request->judul,
            'deskripsi'   => $request->deskripsi
        ]);

        return redirect()->route('artikel.index')->with(['success' => 'Artikel berhasil disimpan!']);
    }

    public function edit(string $id)
    {
        $kategori = Kategori::all();
        $artikel = Artikel::with('kategori')->find($id);
        $artikel = Artikel::findOrFail($id);
        return view('artikel.edit', [
            'artikel' => $artikel,
            'kategori' => $kategori,
            'halaman' => 'Halaman Edit'
        ]);
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'gambar'     => 'image|mimes:jpeg,jpg,png|max:2048',
            'id_kategori' => 'required|integer',
            'judul'     => 'required|string|max:255',
            'deskripsi'   => 'required|min:10|string'
        ]);
        $artikel = artikel::findOrFail($id);
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $image->storeAs('public/gambar', $image->hashName());
            Storage::delete('public/gambar/' . $artikel->gambar);
            $artikel->update([
                'gambar'     => $image->hashName(),
                'id_kategori' => $request->id_kategori,
                'judul'     => $request->judul,
                'deskripsi'   => $request->deskripsi
            ]);
        } else {
            $artikel->update([
                'id_kategori' => $request->id_kategori,
                'judul'     => $request->judul,
                'deskripsi'   => $request->deskripsi
            ]);
        }

        return redirect()->route('artikel.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function destroy(string $id)
    {
        $artikel = Artikel::findOrFail($id);
        Storage::delete('public/gambar/' . $artikel->gambar);
        $artikel->delete();
        return redirect()->route('artikel.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
