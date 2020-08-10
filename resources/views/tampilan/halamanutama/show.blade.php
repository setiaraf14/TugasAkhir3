@extends('kerangka.front.master')

@section('home', 'active')

@section('content')

    {{-- Awal content isi kegiatan --}}
    <div class="row blog-entries element-animate">

        <div class="col-md-12 col-lg-12 main-content p-5">
          <div class="kolom-berita" style="max-width: 100% ;padding: 0; overflow: hidden;">
            <img src="{{ Storage::url($kegiatan->foto_kegiatan) }}" alt="Image" class="img-fluid mb-5" style="width:100% ;margin:auto ;display:block ;max-height: 400px;">
          </div>
            <div class="post-meta">
                <span class="mr-2">{{ date("F j, Y", strtotime($kegiatan->tanggal_kegiatan))  }} </span> &bullet;
            </div>
          <h1 class="mb-4">{{ $kegiatan->nama_kegiatan }}</h1>
          <div class="post-content-body">
           {!! $kegiatan->summary_kegiatan !!}
          </div>
        </div>
    </div> 
    {{-- Akhir Carousel --}}
@endsection
     