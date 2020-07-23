@extends('kerangka.master')

@section('title', '| Olah Kegiatan');
@section('kegiatan', 'active')

@section('chosen')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
@endsection

@section('ckeditor')
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@endsection

@section('judul')
    <h1>Form Input Perbarui Data Kegiatan</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-6 col-md-3">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Perbarui Data Kegiatan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="nama_kegiatan">Masukan Judul Kegiatan</label>
                                    <input type="text" name="nama_kegiatan" class="form-control" @error('nama_kegiatan') ins-invalid @enderror value="{{ old('nama_kegiatan') ?? $kegiatan->nama_kegiatan}}" required>
                                    @error('nama_kegiatan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="anggota_id">Pilih Penanggung Jawab</label>
                                    <select name="anggota_id" id="anggota_id" class="form-control">
                                        @foreach($anggota as $anggotas)
                                            <option value="{{ $anggotas->id }}" {{ old('anggota_id') ?? $kegiatan->anggota->nama_anggota == $anggotas->nama_anggota ? 'selected' : '' }}>
                                                {{ $anggotas->nama_anggota }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('anggota_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                            </div>

                            <div class="form-group col-lg-12">
                                <label for="jenis_kegiatan_id">Pilih Jenis Kegiatan</label>
                                 <select name="jenis_kegiatan_id" id="jenis_kegiatan_id" class="form-control">
                                    @foreach($jenis_kegiatan as $jenis_kegiatans)
                                        <option value="{{ $jenis_kegiatans->id }}"
                                            {{ old('jenis_kegiatan_id') ?? $kegiatan->jeniskegiatan->nama_jenis_kegiatan == $jenis_kegiatans->nama_jenis_kegiatan ? 'selected' : '' }}>
                                            {{ $jenis_kegiatans->nama_jenis_kegiatan }}
                                        </option>
                                    @endforeach
                                    </select>
                                @error('jenis_kegiatan_id')
                                    <div class="text-danger">{{ $message }}</div>
                                 @enderror
                            </div>
                            

                            <div class="form-group col-lg-12">
                                <label for="summary_kegiatan">Masukan Summary</label>
                                <textarea id="field" onkeyup="countChar(this)" class="form-control @error('summary_kegiatan') is-invalid @enderror" name="summary_kegiatan"  rows="10" required>
                                    {{ old('summary_kegiatan') ?? $kegiatan->summary_kegiatan }}
                                </textarea>
                            </div>
                            
                            <div class="form-group col-lg-12 text-center p-2">
                                <img src="{{ Storage::url($kegiatan->foto_kegiatan) }}" alt="" style="width: 150px;">
                                <br><br>
                                <div class="d-flex justify-content-center">
                                    <label for="foto_kegiatan">Masukan Foto Kegiatan</label>
                                    <input type="file" class="form-control @error('foto_kegiatan') is-invalid @enderror" id="foto_kegiatan" name="foto_kegiatan">
                                    @error('foto_kegiatan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-lg-12">
                                <label for="tanggal_kegiatan">Tanggal Pelaksanaan Kegiatan</label>
                                <input type="date" name="tanggal_kegiatan" id="tanggal_kegiatan" class="form-control @error('tanggal_kegiatan') is-invalid @enderror" value="{{ old('tanggal_kegiatan') ?? $kegiatan->tanggal_kegiatan }}">
                                @error('tanggal_kegiatan')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-lg-12">
                                <label for="alamat_kegiatan">Masukan Alamat Pelaksanaan</label>
                                <textarea id="field" onkeyup="countChar(this)" class="form-control @error('alamat_kegiatan') is-invalid @enderror" name="alamat_kegiatan"  rows="10" required>
                                    {{ old('alamat_kegiatan') ?? $kegiatan->alamat_kegiatan }}
                                </textarea>
                            </div>

                            <button type="submit" class="btn btn-success">Simpan</button>
                        </form> 
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

