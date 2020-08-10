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
    return view('kerangka.front.master');
});

// Route::get('/halaman', function () {
//     return view('tampilan.halamanutama');
// });

Route::get('/master', function () {
    return view('kerangka.master');
});

// Route::get('/test', function () {
//     return view('divisi.create');
// });

Route::get('/', 'HalamanUtamaController@index')->name('halamanutama.index');
Route::get('/tentang', 'HalamanTentangController@index')->name('halamantentang.index');
Route::get('/detail/{id}', 'HalamanUtamaController@show')->name('halamanutama.show');
Route::get('/jenis/{id}', 'HalamanUtamaController@jenis')->name('halamanutama.jenis');
Route::get('/divisi/{id}', 'HalamanDivisiController@show')->name('halamandivisi.show');
Route::get('/contact/create', 'ContactController@create')->name('contact.create');
Route::post('/contact', 'ContactController@store')->name('contact.store');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard.dashboard');
        Route::resource('/jeniskegiatan', 'JenisKegiatanController');
        Route::resource('/divisi', 'DivisiController');
        Route::resource('/jabatan', 'JabatanController');
        Route::resource('/anggotas', 'AnggotaController');
        Route::resource('/kegiatan', 'KegiatanController');
        Route::resource('/tentang', 'TentangController');
        Route::get('/contact', 'ContactController@index' )->name('contact.index');
        Route::delete('/contact/{contact}', 'ContactController@destroy')->name('contact.destroy');
        Route::get('/home', 'HomeController@index')->name('home'); 
    }); 
});

