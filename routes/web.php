<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArtikelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\McController;
use App\Http\Controllers\ProfileController;
use App\Models\Berita;
use App\Models\User;
use Illuminate\Database\Query\IndexHint;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

// route untuk login
Route::middleware('guest')->get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// route untuk dashboard
Route::get('dashboard', function () {
    $user = Auth::user(); // Ambil data pengguna yang sedang login
    return view('dashboard', compact('user'));
})->middleware('auth')->name('dashboard');

// Profile Settings route

// Route untuk edit profile (menampilkan form)
Route::get('profile/settings', [ProfileController::class, 'edit'])->name('profile.settings')->middleware('auth');

// Route untuk update profile (menyimpan perubahan)
Route::patch('profile/settings', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

// Route untuk CRUD Galeri
Route::resource('galeri', GaleriController::class);
Route::get('gal', [GaleriController::class, 'gal'])->name('gal');

Route::prefix('galeri')->name('galeri.')->group(function () {
    Route::get('/', [GaleriController::class, 'index'])->name('index');
    Route::get('create', [GaleriController::class, 'create'])->name('create');
    Route::post('store', [GaleriController::class, 'store'])->name('store');
    Route::get('edit/{galeri}', [GaleriController::class, 'edit'])->name('edit'); // Route untuk edit
    Route::get('view/{galeri}', [GaleriController::class, 'view'])->name('view'); // Route untuk view
    Route::patch('update/{galeri}', [GaleriController::class, 'update'])->name('update'); // Route untuk update
    Route::delete('destroy/{galeri}', [GaleriController::class, 'destroy'])->name('destroy');
});


// routes untuk kontak
Route::get('kontak', [KontakController::class, 'liat'])->name('addKontak.kontak');

Route::get('kon', [KontakController::class, 'kon'])->name('kon');

Route::middleware('auth')->group(function () {

    Route::get('add/kontak', [KontakController::class, 'index'])->name('add.kontak');
    Route::post('update/kontak', [KontakController::class, 'update'])->name('update.kontak');
    Route::delete('/kontak/{id}', [KontakController::class, 'destroy'])->name('kontak.destroy');
});

// route untuk artikel frontend

// backend
Route::prefix('articles')->name('articles.')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('index');
    Route::get('/create', [ArticleController::class, 'create'])->name('create');
    Route::post('/store', [ArticleController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [ArticleController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [ArticleController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [ArticleController::class, 'destroy'])->name('destroy');
    Route::get('/show', [ArticleController::class, 'show'])->name('show');
    Route::get('/detail{id}', [ArticleController::class, 'detail'])->name('detail');
});

Route::get('profile', [McController::class, 'profile'])->name('profile');

// edit mc
Route::prefix('mc')->name('mc.')->group(function () {
    Route::get('/', [McController::class, 'index'])->name('index');
    Route::get('/create', [McController::class, 'create'])->name('create');
    Route::post('/store', [McController::class, 'store'])->name('store');
    Route::get('edit/{id}', [McController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [McController::class, 'update'])->name('update');
    Route::delete('/destroy{id}', [McController::class, 'destroy'])->name('destroy');
});

Route::get('berita', [BeritaController::class, 'berita'])->name('berita');

Route::prefix('news')->name('news.')->group(function () {
    Route::get('/', [BeritaController::class, 'index'])->name('index');
    Route::get('/create', [BeritaController::class, 'create'])->name('create');
    Route::post('/store', [BeritaController::class, 'store'])->name('store');
    Route::get('edit/{id}', [BeritaController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [BeritaController::class, 'update'])->name('update');
    Route::delete('/destroy{id}', [BeritaController::class, 'destroy'])->name('destroy');
    Route::get('/detail{id}', [BeritaController::class, 'detail'])->name('detail');
});
