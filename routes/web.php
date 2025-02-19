<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('/pichturest')->group(function(){
        Route::get('/', [GaleryController::class,'index'])->name('picturest');
        Route::get('/pin/{id_uni}', [GaleryController::class,'show'])->name('galery.show');
    });

    Route::post('/comment',[CommentController::class,'store'])->name('comment.store');
});


Route::get('/index', [DataController::class, 'index']); // Menampilkan halaman index
Route::get('/ambil-data', [DataController::class, 'getData']); // Ambil data tanpa reload
Route::post('/simpan-data', [DataController::class, 'store']); // Simpan data tanpa reload


require __DIR__.'/auth.php';
