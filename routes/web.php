<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LetterTypeController;
use App\Http\Controllers\LetterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['isLogin', 'cekRole:staff'])->prefix('data-user')->group(function () {
    //user list staff
    Route::get('/staff/search', [UserController::class, 'search'])->name('staff.search');
    Route::get('/staff', [UserController::class, 'index'])->name('staff.home');
    Route::get('/staff/create', [UserController::class, 'create'])->name('staff.create');
    Route::post('/staff/store', [UserController::class, 'store'])->name('staff.store');
    Route::get('/staff/edit/{id}', [UserController::class, 'edit'])->name('staff.edit');
    Route::patch('/staff/update/{id}', [UserController::class, 'update'])->name('staff.update');
    Route::delete('/staff/delete/{id}', [UserController::class, 'destroy'])->name('staff.destroy');

    //user list guru
    Route::get('/guru/search', [UserController::class, 'searchg'])->name('guru.search');
    Route::get('/guru', [UserController::class, 'indexg'])->name('guru.home');
    Route::get('/guru/create', [UserController::class, 'createg'])->name('guru.create');
    Route::post('/guru/store', [UserController::class, 'storeg'])->name('guru.store');
    Route::get('/guru/edit/{id}', [UserController::class, 'editg'])->name('guru.edit');
    Route::patch('/guru/update/{id}', [UserController::class, 'updateg'])->name('guru.update');
    Route::delete('/guru/delete/{id}', [UserController::class, 'destroy'])->name('guru.destroy');
});
Route::middleware(['isLogin', 'cekRole:staff,guru'])->prefix('data-surat')->group(function () {

Route::get('/klasifikasi/search', [LetterTypeController::class, 'search'])->name('klasifikasi.search');
Route::get('/klasifikasi', [LetterTypeController::class, 'index'])->name('klasifikasi');
Route::get('/klasifikasi/create', [LetterTypeController::class, 'create'])->name('klasifikasi.create');
Route::post('/klasifikasi/store', [LetterTypeController::class, 'store'])->name('klasifikasi.store');
Route::get('/klasifikasi/edit/{id}', [LetterTypeController::class, 'edit'])->name('klasifikasi.edit');
Route::get('/klasifikasi/show/{id}', [LetterTypeController::class, 'detail'])->name('klasifikasi.show');
Route::patch('/klasifikasi/update/{id}', [LetterTypeController::class, 'update'])->name('klasifikasi.update');
Route::delete('/klasifikasi/delete/{id}', [LetterTypeController::class, 'destroy'])->name('klasifikasi.destroy');
Route::get('/klasifikasi/downloadexcel', [LetterTypeController::class, 'downloadexcel'])->name('klasifikasi.downloadexcel');

//data surat
Route::get('/datasurat', [LetterController::class, 'index'])->name('datasurat');
Route::get('/datasurat/search', [LetterController::class, 'search'])->name('datasurat.search');
Route::get('/datasurat/create', [LetterController::class, 'create'])->name('datasurat.create');
Route::post('/datasurat/store', [LetterController::class, 'store'])->name('datasurat.store');
Route::get('/datasurat/edit/{id}', [LetterController::class, 'edit'])->name('datasurat.edit');
Route::patch('/datasurat/update/{id}', [LetterController::class, 'update'])->name('datasurat.update');
Route::delete('/datasurat/delete/{id}', [LetterController::class, 'destroy'])->name('datasurat.destroy');
Route::get('/datasurat/downloadexcel', [LetterController::class, 'downloadexcel'])->name('datasurat.downloadexcel');



});




// Route::prefix('/staff')->name('staff.')->group(function () {
//     Route::get('/create', [UserController::class, 'create'])->name('create');
//     Route::post('/daftar', [UserController::class, 'daftar'])->name('daftar');
//     Route::get('/', [UserController::class, 'indexs'])->name('home');
//     Route::get('/{id}', [UserController::class, 'edit'])->name('edit');
//     Route::patch('/{id}', [UserController::class, 'update'])->name('update');
//     Route::delete('/{id}', [UserController::class, 'destroy'])->name('delete');
// });
// Route::prefix('/guru')->name('guru.')->group(function () {
//     Route::get('/create', [UserController::class, 'create'])->name('create');
//     Route::post('/daftar', [UserController::class, 'daftar'])->name('daftar');
//     Route::get('/', [UserController::class, 'indexg'])->name('home');
//     Route::get('/{id}', [UserController::class, 'edit'])->name('edit');
//     Route::patch('/{id}', [UserController::class, 'update'])->name('update');
//     Route::delete('/{id}', [UserController::class, 'destroy'])->name('delete');
// });


    Route::middleware(['isLogin', 'cekRole:staff,guru'])->group(function () {
        Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
    });



    Route::middleware(['isGuest'])->group(function () {
        Route::get('/', [LoginController::class, 'login'])->name('login');
        Route::post('/login/post', [LoginController::class, 'auth'])->name('auth');
    });

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
