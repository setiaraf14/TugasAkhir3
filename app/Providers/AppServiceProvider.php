<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Divisi;
use App\Anggota;
use App\Jabatan;
use App\Tentang;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        $divisi_menu = Divisi::all();
        $anggota_menu = Anggota:: all();
        $tentang_mobile = Tentang::all(); 
        view()->share([
            'divisi_menu' => $divisi_menu,
            'anggota_menu' => $anggota_menu,
            'tentang_mobile' => $tentang_mobile
        ]);
    }
}
