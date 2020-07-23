@extends('kerangka.master')

@section('title', '| Olah Kegiatan')
@section('kegiatan', 'active')

@section('chosen')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
@endsection

@section('ckeditor')
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@endsection

@section('judul')
    <h1>Halaman Detail Kegiatan</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-6 col-md-3">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Detail Kegiatan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="foto-kegiatan text-center m-3">
                            <img src="{{ Storage::url($kegiatan->foto_kegiatan) }}" alt="" class="card-img-top" style="width: 600px">
                            <br><br>
                            <h2>{{ $kegiatan->nama_kegiatan }}</h2>
                        </div>

                        <div class="aksi d-flex justify-content-end">
                            <a class="btn btn-success m-1" href="{{ route('kegiatan.edit', $kegiatan->id) }}"><i class="fas fa-edit"> Edit Kegiatan</i></a>
                        </div>

                        <div class="content d-flex justify-content-center">
                            <table class="table table-bordered">
                                <tr>
                                    <td><h5>Penanggung jawab</h5></td>
                                    <td>:</td>
                                    <td><h5>{{ $kegiatan->anggota->nama_anggota }}</h5></td>
                                </tr>
                                <tr>
                                    <td><h5>Jenis Kegiatan</h5></td>
                                    <td>:</td>
                                    <td><h5>{{ $kegiatan->jeniskegiatan->nama_jenis_kegiatan }}</h5></td>
                                </tr>
                                <tr>
                                    <td><h5>Tanggal Pelaksanaan</h5></td>
                                    <td>:</td>
                                    <td><h5>{{ $kegiatan->tanggal_kegiatan }}</h5></td>
                                </tr>
                                <tr>
                                    <td><h5>Lokasi Kegiatan</h5></td>
                                    <td>:</td>
                                    <td><h5>{!! $kegiatan->alamat_kegiatan !!}</h5></td>
                                </tr>
                                <tr>
                                    <td><h5>Isi Kegiatan</h5></td>
                                    <td>:</td>
                                    <td><h5>{!! $kegiatan->summary_kegiatan !!}</h5></td>
                                </tr>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <script>
        CKEDITOR.replace( 'summary_kegiatan' );
        CKEDITOR.replace('alamat_kegiatan');
        $("#anggota_id").chosen();
    </script> 
@endsection

