<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\FrontKategoriController;
use App\Http\Middleware\isAdmin;
use App\Models\Artikel;
use App\Models\Kategori;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontController::class, 'index'])->name('welcome');

Route::get('/kategori/{id}', [FrontController::class, 'kategori'])->name('kategori.front.show');
Route::get('/artikel/{slug}', [FrontController::class, 'show'])->name('artikel.front.show');
Route::get('/penulis/{slug}', [FrontController::class, 'penulis'])->name('penulis.front.show');
Route::get('/tentang', [FrontController::class, 'semuaPenulis'])->name('tentang.penulis');
Route::resource('kategoris', FrontKategoriController::class);

Route::post('/artikel/{slug}/komentar', [FrontController::class, 'store'])->name('komentar.front.store');
Route::delete('/komentar/{id}', [FrontController::class, 'destroy'])->name('komentar.front.destroy');

Route::get('/admin/login', [AdminLoginController::class, 'shows'])->name('admin.login.form');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->middleware(['auth', isAdmin::class])->group(function () {
    Route::resource('home', HomeController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('penulis', PenulisController::class);
    Route::resource('artikel', ArtikelController::class);
    Route::resource('komentar', KomentarController::class);
    Route::post('artikel/{artikelId}/komentar', [ArtikelController::class, 'storeKomentar'])->name('komentar.store');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
