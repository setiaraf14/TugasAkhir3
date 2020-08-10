@extends('kerangka.master')

@section('title', '| Olah Profile');
@section('tentang', 'active')

@section('ckeditor')
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@endsection

@section('judul')
    <h1>Data Profile</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-sm-6 col-md-3">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Perbarui Profile</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <img src="{{Storage::url($tentang->logo_instansi)}}" class="card-img-top" alt="...">
                    <form action="{{ route('tentang.update', $tentang->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nama_instansi">Nama Instansi</label>
                                <input type="text" class="form-control @error('nama_instansi') is-invalid @enderror"
                                    id="nama_instansi" name="nama_instansi"
                                    value="{{ old('nama_instansi') ?? $tentang->nama_instansi }}">
                                @error('nama_instansi')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="moto_instansi">Moto Instansi</label>
                                <textarea name="moto_instansi" id="moto_instansi"
                                    class="form-control @error('moto_instansi') is-invalid @enderror">
                                    {{ old('moto_instansi') ?? $tentang->moto_instansi }}
                                </textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="desk_instansi">Deskripsi Instansi</label>
                                <textarea name="desk_instansi" id="desk_instansi"
                                    class="form-control @error('desk_instansi') is-invalid @enderror">
                                    {{ old('desk_instansi') ?? $tentang->desk_instansi }}
                                </textarea>
                                @error('desk_instansi')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="visi_instansi">Visi Instansi</label>
                                <textarea name="visi_instansi" id="visi_instansi"
                                    class="form-control @error('visi_instansi') is-invalid @enderror">
                                    {{ old('visi_instansi') ?? $tentang->visi_instansi }}
                                </textarea>
                                @error('visi_instansi')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="misi_instansi">Misi Instansi</label>
                                <textarea name="misi_instansi" id="misi_instansi"
                                    class="form-control @error('misi_instansi') is-invalid @enderror">
                                    {{ old('misi_instansi') ?? $tentang->misi_instansi }}
                                </textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="logo_instansi">Logo Instansi</label>
                                <input type="file" class="form-control @error('logo_instansi') is-invalid @enderror" name="logo_instansi">
                                @error('logo_instansi')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="alamat_instansi">Alamat Instansi</label>
                                <textarea name="alamat_instansi" id="alamat_instansi"
                                    class="form-control @error('alamat_instansi') is-invalid @enderror">
                                    {{ old('alamat_instansi') ?? $tentang->alamat_instansi }}
                                </textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace( 'moto_instansi' );
        CKEDITOR.replace( 'desk_instansi' );
        CKEDITOR.replace( 'visi_instansi' );
        CKEDITOR.replace( 'misi_instansi' );
        CKEDITOR.replace( 'alamat_instansi' );
    </script>

@endsection