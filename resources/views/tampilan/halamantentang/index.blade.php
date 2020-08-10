@extends('kerangka.front.master')

@section('tentang', 'active')

@section('content')

    {{-- Awal Content --}}
      <section class="site-section py-sm">
        <div class="container">
          @forelse ($tentang as $item)
            <div class="row">
              <div class="col-lg-12 m-5">
                <div class="about-judul d-flex justify-content-center">
                    <h1>About Us</h1>
                </div>
              </div>
            </div>
            <div class="row m-5">
              <div class="col-lg-6">
                  <h2>Visi Pemuda LIRA Banten</h2>
                  <p>{!! $item->visi_instansi !!}</p>
              </div>
              <div class="col-lg-6">
                <h2>Misi Pemuda LIRA Banten</h2>
                <p>{!! $item->misi_instansi !!}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 m-5 text-center">
                <h2>Deskripsi Pemuda LIRA</h2>
                <p>{!! $item->desk_instansi !!}</p>
              </div>
            </div>
          @empty
              <h1>Masih dalam perbaikan</h1>
          @endforelse
          
        </div>
      </section>  
    {{-- Akhir Content --}}
@endsection
