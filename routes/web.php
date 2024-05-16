<?php

// routes/web.php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PengarangController;
use App\Http\Controllers\KategoriController;


// Route::resource('buku', BukuController::class);
//Route::get('/buku', [BukuController::class, 'create'])->name('buku.store');
//Route::post('buku', [BukuController::class, 'store'])->name('buku.store');
// Route::get('buku/edit', [BukuController::class, 'edit']);
// Route::get('buku/show', [BukuController::class, 'show']);

Route::get('buku', [BukuController::class, 'index']);
Route::get('buku/create', [BukuController::class, 'create']);
Route::get('buku/hapus/{id}', [BukuController::class, 'delete']);
Route::post('buku/store', [BukuController::class, 'store']);
Route::post('buku/update/{id}', [BukuController::class, 'update']);
Route::get('buku/edit/{id}', [BukuController::class, 'edit']);

Route::get('buku', [BukuController::class, 'index']);
Route::get('buku/create', [BukuController::class, 'create']);
Route::get('buku/hapus/{id}', [BukuController::class, 'delete']);
Route::post('buku/store', [BukuController::class, 'store']);
Route::post('buku/update/{id}', [BukuController::class, 'update']);
Route::get('buku/edit/{id}', [BukuController::class, 'edit']);

// Route::get('/penerbit', [PenerbitController::class, 'create'])->name('penerbit.store');
Route::get('penerbit', [PenerbitController::class, 'index']);
Route::get('penerbit/create', [PenerbitController::class, 'create']);
Route::get('penerbit/hapus/{id}', [PenerbitController::class, 'delete']);
Route::post('penerbit/store', [PenerbitController::class, 'store']);
Route::post('penerbit/update/{id}', [PenerbitController::class, 'update']);
Route::get('penerbit/edit/{id}', [PenerbitController::class, 'edit']);

Route::get('pengarang', [PengarangController::class, 'index']);
Route::get('pengarang/create', [PengarangController::class, 'create']);
Route::get('pengarang/hapus/{id}', [PengarangController::class, 'delete']);
Route::post('pengarang/store', [PengarangController::class, 'store']);
Route::post('pengarang/update/{id}', [PengarangController::class, 'update']);
Route::get('pengarang/edit/{id}', [PengarangController::class, 'edit']);

Route::get('kategori', [KategoriController::class, 'index']);
Route::get('kategori/create', [KategoriController::class, 'create']);
Route::get('kategori/hapus/{id}', [KategoriController::class, 'delete']);
Route::post('kategori/store', [KategoriController::class, 'store']);
Route::post('kategori/update/{id}', [KategoriController::class, 'update']);
Route::get('kategori/edit/{id}', [KategoriController::class, 'edit']);

Route::get('login', [PengarangController::class, 'index']);
Route::get('pengarang/create', [PengarangController::class, 'create']);
Route::get('pengarang/hapus/{id}', [PengarangController::class, 'delete']);
Route::post('pengarang/store', [PengarangController::class, 'store']);
Route::post('pengarang/update/{id}', [PengarangController::class, 'update']);
Route::get('pengarang/edit/{id}', [PengarangController::class, 'edit']);


Route::get('/login', function (){
    return view ('login.login');
});

Route::post('/postlogin', 'LoginController@postlogin')->name('postlogin');


