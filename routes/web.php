<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AreaProduksiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LampungregionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\readadminController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RegisterController;


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



Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'index')->name('login');
    Route::post('/login', 'authenticate');
});

Route::get('/register', [RegisterController::class, 'index']);

Route::middleware(['auth'])->group(function(){  
    Route::controller(RegionController::class)->group(function () {
        // Route::get('/admin', 'index');
        Route::get('/region', 'index')->name('region');
        Route::post('/getkecamatan', 'getkecamatan')->name('getkecamatan');
        Route::post('/modalkecamatan', 'modalgetkecamatan')->name('modalgetkecamatan');
        Route::post('/updatemodalkecamatan', 'updatemodalgetkecamatan')->name('updatemodalgetkecamatan');
        Route::post('/create', 'create')->name('create');
        Route::match(['get', 'post'],'/update/{id}', 'update');
        Route::get('/hapus/{id}', 'destroy')->name('hapus');
        
    });
    Route::controller(LampungregionController::class)->group(function () {
        Route::get('/home', 'search')->name('home');
        Route::post('/getkecamatan', 'getkecamatan')->name('getkecamatan');
    });
    Route::controller(readadminController::class)->group(function () {
        Route::get('/admin', 'index')->name('admin');
        Route::post('/insertdata/{id}', 'insertdata')->name('insertdata');
        // Route::post('/admin', 'searching')->name('search');
        Route::match(['get', 'post'],'/edit/{id}', 'edit');
        Route::get('/delete/{id}', 'delete')->name('delete');
        // Route::get('/delete/area/{id}', 'delete')->name('delete');

    });
    Route::get('/logout',[LoginController::class, 'logout'])->name('logout'); 
    // Route::resource('/admin{id}',AreaProduksiController::class);
    // Route::controller(AreaProduksiController::class)->group(function () {
    //     Route::get('/admin', 'index')->name('admin');
    //     Route::post('/store', 'store')->name('store');
    //     // 
    //     Route::post('/edit{id}', 'edit')->name('update');
    //     Route::post('/update{id}', 'update')->name('update');
    //     Route::get('/delete{id}', 'destroy')->name('delete');
    // });
});




