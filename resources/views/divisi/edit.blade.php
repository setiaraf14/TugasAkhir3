@extends('kerangka.master')

@section('title', '| Olah Divisi')
@section('divisi', 'active')

@section('ckeditor')
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@endsection

@section('judul')
    <h1>Pembaruan Data Divisi</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-6 col-md-3">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Edit Data Divisi Baru</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('divisi.update', $divisi->id) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label for="nama_divisi">Masukan nama divisi</label>
                                <input type="text" name="nama_divisi" class="form-control" @error('nama_divisi') ins-invalid @enderror value="{{ old('nama_divisi') ?? $divisi->nama_divisi}}" required>
                                @error('nama_divisi')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tufoksi_divisi">Masukan Tugas Pokok & Fungsi Divisi</label>
                                <textarea id="field" onkeyup="countChar(this)" class="form-control @error('tufoksi_divisi') is-invalid @enderror" name="tufoksi_divisi"  rows="10" required>
                                    {{ old('tufoksi_divisi') ?? $divisi->tufoksi_divisi }}
                                </textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace( 'tufoksi_divisi' );
    </script> 
@endsection

