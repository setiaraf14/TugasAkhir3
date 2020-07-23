@extends('kerangka.master')

@section('title', '| Olah Anggota')
@section('anggota', 'active')

@section('ckeditor')
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@endsection

@section('judul')
    <h1>Form Input Data Anggota</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-6 col-md-3">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Input Data Anggota Baru</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('anggotas.update', $anggota->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="nama_anggota">Masukan nama anggota</label>
                                    <input type="text" name="nama_anggota" class="form-control" @error('nama_anggota') ins-invalid @enderror value="{{ old('nama_anggota') ?? $anggota->nama_anggota}}" required>
                                    @error('nama_anggota')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="hp_anggota">Masukan nomor kontak</label>
                                    <input type="number" name="hp_anggota" class="form-control" @error('hp_anggota') ins-invalid @enderror value="{{ old('hp_anggota') ?? $anggota->hp_anggota}}" required>
                                    @error('hp_anggota')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-lg-12">
                                <label for="ktp_anggota">Masukan nomor KTP</label>
                                <input type="number" name="ktp_anggota" class="form-control" @error('ktp_anggota') ins-invalid @enderror value="{{ old('ktp_anggota') ?? $anggota->ktp_anggota }}" required>
                                @error('ktp_anggota')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-lg-12">
                                <label for="alamat_anggota">Masukan alamat</label>
                                <textarea id="field" onkeyup="countChar(this)" class="form-control @error('alamat_anggota') is-invalid @enderror" name="alamat_anggota"  rows="10" required>
                                    {{ old('alamat_anggota') ?? $anggota->alamat_anggota }}
                                </textarea>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="divisi_id">Pilih divisi</label>
                                    <select name="divisi_id" id="divisi_id" class="form-control">
                                        @foreach($divisi as $divisis)
                                            <option value="{{ $divisis->id }}"
                                                {{ old('divisi_id') ?? $anggota->divisi->nama_divisi  == $divisis->nama_divisi ?  'selected' : '' }}>
                                                {{ $divisis->nama_divisi }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('divisi_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="jabatan_id">Pilih jabatan</label>
                                    <select name="jabatan_id" id="jabatan_id" class="form-control">
                                        @foreach($jabatan as $jabatans)
                                        <option value="{{ $jabatans->id }}" 
                                            {{ (old('jabatan_id') ?? $anggota->jabatan->nama_jabatan) == $jabatans->nama_jabatan ? 'selected' : '' }}>
                                            {{ $jabatans->nama_jabatan }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('jabatan_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-lg-12">
                                <label for="profile_anggota">Masukan profile</label>
                                <textarea id="field" onkeyup="countChar(this)" class="form-control @error('profile_anggota') is-invalid @enderror" name="profile_anggota"  rows="10" required>
                                    {{ old('profile_anggota') ?? $anggota->profile_anggota }}
                                </textarea>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="foto_anggota">Masukan foto</label>
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <img src="{{ Storage::url($anggota->foto_anggota) }}" alt="" style="width: 150px;">
                                        <br>
                                        <input type="file" class="form-control @error('foto_anggota') is-invalid @enderror" id="foto_anggota" name="foto_anggota">
                                      </div>
                                    </div>
                                      @error('foto_anggota')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="tanggal_masuk">Tanggal Masuk</label>
                                    <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control @error('tanggal_masuk') is-invalid @enderror" value="{{ old('tanggal_masuk') ?? $anggota->tanggal_masuk }}">
                                    @error('tanggal_masuk')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br><br><br>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </form> 
                    </div>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace( 'alamat_anggota' );
        CKEDITOR.replace( 'profile_anggota' );
    </script> 
@endsection

