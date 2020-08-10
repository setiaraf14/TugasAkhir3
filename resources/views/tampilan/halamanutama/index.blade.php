@extends('kerangka.front.master')

@section('home', 'active')

@section('content')

    {{-- Awal Carousel --}}
      <section class="site-section pt-5 pb-5">
        <div class="container">
          <div class="row">
              <div class="col-md-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    @foreach ($kegiatan_carousel as $item)
                      <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                    @endforeach
                  </ol>
                  <div class="carousel-inner">
                    @foreach ($kegiatan_carousel as $item)
                      <div class="carousel-item {{ $loop->first ? ' active' : '' }}" >
                        <div style="overflow: hidden; padding: 0; max-width: 100%;">
                            <img class="d-block w-100" src="{{Storage::url($item->foto_kegiatan)}}" alt="First slide" style="max-height: 450px; display: block; margin: auto;">
                            <div class="carousel-caption d-none d-md-block">
                              <a href="{{ route('halamanutama.show', $item->id) }}">
                                <h1 style="color:red ;font-family:Helvetica, sans-serif ;font-size: 50px;">{{ $item->nama_kegiatan }}</h1>
                              </a>
                              <p>{!! Illuminate\Support\Str::of($item->summary_kegiatan)->limit(30) !!}</p>
                            </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
          </div>
        </div>
      </section>  
    {{-- Akhir Carousel --}}

    {{-- Awal Content --}}
      <section class="site-section py-sm">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h2 class="mb-4">Berita Terakhir</h2>
            </div>
          </div>
          <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">
              <div class="row mb-4">
                  <div class="col-md-12 jenis">
                    <nav class="nav nav-pills nav-justified  d-flex justify-content-between">
                      <a class="nav-item nav-link btn-danger m-1 {{ $id == Null ? 'active' : ' ' }}" href="{{ route('halamanutama.index') }}">All</a>
                      @foreach ($jeniskegiatan as $item)
                      <a href="{{ route('halamanutama.jenis', $item->id) }}" class="nav-item nav-link btn-danger m-1 {{ $item->id == $id ?? '' ? 'active' : ' ' }}">{{ $item->nama_jenis_kegiatan }}</a>
                      @endforeach
                    </nav>
                  </div>
              </div>
              <div class="row">
                  @forelse ($kegiatan_berita as $item)
                  <div class="col-md-6">
                    <a href="{{ route('halamanutama.show', $item->id) }}" class="blog-entry element-animate" data-animate-effect="fadeIn">
                      <div class="kolom-berita" style="max-width: 350px ;padding: 0; overflow: hidden;">
                          <img src="{{Storage::url($item->foto_kegiatan)}}" style="width:100% ;margin:auto ;display:block ;max-height: 200px;">
                      </div>
                      <div class="blog-content-body">
                        <div class="post-meta">
                          <span class="mr-2">{{ $item->tanggal_kegiatan }}</span> &bullet;
                          <span class="ml-2">{{ $item->anggota->nama_anggota }}</span>
                        </div>
                        <h2><a href="{{ route('halamanutama.show', $item->id) }}" style="text-decoration: none">{{ $item->nama_kegiatan }}</a></h2>
                      </div>
                    </a>
                  </div>
                  @empty
                      <h1>Dalam Proses Perbaikan</h1>
                  @endforelse
              </div>
              <div class="row">
                <div class="col-md-12 col-lg-8 main-content m-2">
                    <div class="paginatiion d-flex justify-content-center text-center">
                      {{ $kegiatan_berita->links() }}
                    </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-lg-4 sidebar">
              <div class="sidebar-box">
                <h3 class="heading">Divisi</h3>
                <ul class="divisi">
                  @foreach ($divisi_menu as $item)
                    @if ($item->nama_divisi != 'Non divisi')
                      <li><a href="{{ route('halamandivisi.show', $item->id) }}">{{ $item->nama_divisi }}</a></li>
                    @endif
                  @endforeach
                </ul>
              </div>
            </div>  
        </div>
      </section>  
    {{-- Akhir Content --}}
@endsection
     