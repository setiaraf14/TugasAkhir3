@extends('kerangka.front.master')

@section('divisi', 'active')
  
@section('content')

    {{-- Awal content isi kegiatan --}}
    <div class="row blog-entries element-animate">

        <div class="col-md-12 col-lg-12 main-content p-5">
          <h1 class="mb-4">{{ $divisi_halaman->nama_divisi }}</h1>
          <div class="post-content-body">
           {!! $divisi_halaman->tufoksi_divisi !!}
          </div>
        </div>

        <div class="col-md-12 col-lg-12 main-content p-5">
          <h1 class="mb-4">Anggota</h1>
          <br>
          <div class="row">
            @forelse ($anggota_menu as $anggota)
            @if ( $anggota->divisi->nama_divisi == $divisi_halaman->nama_divisi)
              <div class="col-lg-3 m-2">
                <div class="post-content-body">
                  <div class="bio text-center">
                    <img src="{{Storage::url($anggota->foto_anggota)}}" alt="Image Placeholder" class="img-fluid">
                    <div class="bio-body">
                      <h1>{{ $anggota->nama_anggota }}</h1>
                      <h2>{{ $anggota->jabatan->nama_jabatan }}</h2>
                      <p>{!! $anggota->profile_anggota !!}</p>
                      <p class="social">
                        <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            @endif
            @empty
                <h1>Maintanance</h1>
            @endforelse
          </div>
        </div>

    </div> 
    {{-- Akhir Carousel --}}
@endsection