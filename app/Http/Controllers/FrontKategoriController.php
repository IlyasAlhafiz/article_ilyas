<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Komentar;
use App\Models\Kategori;

class FrontKategoriController extends Controller
{
    public function show($slug)
    {
        $judul = Str::of($slug)->replace('-', ' ')->title();
        $kategori = Kategori::where('nama_kategori', $judul)->firstOrFail();
        $artikel = Artikel::where('id_kategori', $kategori->id)->get();
        $semuaKategori = Kategori::all();

        return view('frontend.kategori', compact('kategori', 'artikel', 'semuaKategori'));
    }
}
