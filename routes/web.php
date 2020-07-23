<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/master', function () {
    return view('kerangka.master');
});

// Route::get('/test', function () {
//     return view('divisi.create');
// });


Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard.dashboard');
        Route::resource('/jeniskegiatan', 'JenisKegiatanController');
        Route::resource('/divisi', 'DivisiController');
        Route::resource('/jabatan', 'JabatanController');
        Route::resource('/anggotas', 'AnggotaController');
        Route::resource('/kegiatan', 'KegiatanController');
        Route::get('/home', 'HomeController@index')->name('home'); 
    }); 
});

