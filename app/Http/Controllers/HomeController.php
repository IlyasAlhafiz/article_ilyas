<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Komentar;
use App\Models\Penulis;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $artikelPerBulan = Artikel::selectRaw('MONTH(created_at) as bulan, count(*) as total')->groupBy('bulan')->pluck('total', 'bulan')->toArray();
        $judulArtikelPerBulan = Artikel::selectRaw('MONTH(created_at) as bulan, GROUP_CONCAT(judul) as judul')->groupBy('bulan')->pluck('judul', 'bulan')->toArray();
        $totalArtikel = array_sum($artikelPerBulan);

        $komentarPerBulan = Komentar::with('user')->selectRaw('MONTH(komentar.created_at) as bulan, count(*) as total')->join('users', 'users.id', '=', 'komentar.id_user')->groupBy('bulan')->pluck('total', 'bulan')->toArray();
        $namaKomentarPerBulan = Komentar::with('user')->selectRaw('MONTH(komentar.created_at) as bulan, GROUP_CONCAT(DISTINCT users.name) as nama_pengguna') ->join('users', 'users.id', '=', 'komentar.id_user')->groupBy('bulan')->pluck('nama_pengguna', 'bulan')->toArray();
    
        $totalKomentar = array_sum($komentarPerBulan);
      
        $artikels = Artikel::with('penulis')->latest()->take(4)->get();
    
        return view('home', compact('artikelPerBulan', 'judulArtikelPerBulan', 'totalArtikel', 'komentarPerBulan', 'namaKomentarPerBulan', 'totalKomentar', 'artikels'));
    }
    
}
