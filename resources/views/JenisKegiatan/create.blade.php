@extends('kerangka.master')

@section('title', '| Olah Jenis Kegiatan')
@section('jeniskegiatan', 'active')
    
@section('ckeditor')
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@endsection

@section('judul')
    <h1>Form Input Data Jenis Kegiatan</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-6 col-md-3">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Input Data Jenis Kegiatan </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('jeniskegiatan.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama_jenis_kegiatan">Masukan nama jenis kegiatan</label>
                                <input type="text" name="nama_jenis_kegiatan" class="form-control" @error('nama_jenis_kegiatan') ins-invalid @enderror value="{{ old('nama_jenis_kegiatan')}}" required>
                                @error('nama_jenis_kegiatan')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="keterangan_jenis_kegiatan">Masukan keterangan jenis kegiatan </label>
                                <textarea id="field" onkeyup="countChar(this)" class="form-control @error('keterangan_jenis_kegiatan') is-invalid @enderror" name="keterangan_jenis_kegiatan"  rows="10" required>
                                    {{ old('keterangan_jenis_kegiatan') }}
                                </textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </form> 
                    </div>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace( 'keterangan_jenis_kegiatan' );
    </script> 
@endsection

