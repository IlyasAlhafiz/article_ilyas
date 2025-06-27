<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Penulis;
use App\Models\Artikel;
use App\Models\Komentar;

class FrontController extends Controller
{
    public function index()
    {
        $artikel = Artikel::all();
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $komentar = Komentar::all();
        return view('welcome', compact('artikel', 'kategori', 'penulis', 'komentar'));
    }

    public function show($slug)
    {
        $artikel = Artikel::with('kategori', 'penulis')->where('slug', $slug)->first();
        $kategori = Kategori::all();
        return view('frontend.artikel', compact('artikel', 'kategori'));
    }

    public function kategori($slug)
    {
        $kategori = Kategori::where('slug', $slug)->firstOrFail();
        $artikel = Artikel::with('kategori')->where('id_kategori', $kategori->id)->get();
        return view('frontend.kategori', compact('kategori', 'artikel'));
    }

    public function penulis($slug)
    {
        $penulis = Penulis::where('slug', $slug)->first();
        $artikel = Artikel::with('kategori', 'penulis')->where('id_penulis', $penulis->id)->get();
        $kategori = Kategori::all();

        return view('frontend.penulis', compact('penulis', 'artikel', 'kategori'));
    }

    public function semuaPenulis()
    {
        $penulis = Penulis::with('artikel.kategori')->get();
        return view('frontend.tentang', compact('penulis'));
    }
    
    public function store(Request $request, $slug)
    {
        $request->validate([
            'komentar' => 'required|string|max:1000',
        ]);

        $artikel = Artikel::where('slug', $slug)->firstOrFail();

        Komentar::create([
            'id_artikel' => $artikel->id,
            'id_user' => auth()->id(),
            'isi_komentar' => $request->komentar,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan!');
    }


    public function destroy($id)
    {
        $komentar = Komentar::findOrFail($id);
        $komentar->delete();
        return redirect()->back()->with('success', 'Komentar berhasil Dihapus!');
    }

}
