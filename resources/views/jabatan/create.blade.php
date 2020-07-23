@extends('kerangka.master')

@section('title', '| Olah Jabatan')
@section('jabatan', 'active')
    
@section('ckeditor')
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@endsection

@section('judul')
    <h1>Form Input Data Jabatan</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-6 col-md-3">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Input Data Jabatan </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('jabatan.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama_jabatan">Masukan nama jabatan</label>
                                <input type="text" name="nama_jabatan" class="form-control" @error('nama_jabatan') ins-invalid @enderror value="{{ old('nama_jabatan')}}" required>
                                @error('nama_jabatan')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="keterangan_jabatan">Masukan Tugas Pokok & Fungsi Divisi</label>
                                <textarea id="field" onkeyup="countChar(this)" class="form-control @error('keterangan_jabatan') is-invalid @enderror" name="keterangan_jabatan"  rows="10" required>
                                    {{ old('keterangan_jabatan') }}
                                </textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </form> 
                    </div>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace( 'keterangan_jabatan' );
    </script> 
@endsection

