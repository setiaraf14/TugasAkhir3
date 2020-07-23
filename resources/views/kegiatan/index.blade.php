@extends('kerangka.master')

@section('title', '| Olah Kegiatan')
@section('kegiatan', 'active')

@section('ckeditor')
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@endsection

@section('judul')
    <h1>Tabel Data Anggota</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                      <h3 class="card-title">Data Divisi</h3>
                      <a href="{{ route('kegiatan.create') }}" class="btn btn-primary">Tambah Kegiatan</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if (session('Pesan'))
                            <div class="alert alert-success">
                                {{ session('Pesan') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table id="tabel-data" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                    <th>Nomor</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Penanggung Jawab </th>
                                    <th>Jenis Kegiatan </th>
                                    <th>Isi Kegiatan </th>
                                    <th>Tanggal Kegiatan </th>
                                    <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($kegiatan as $kegiatans)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $kegiatans->nama_kegiatan }}</td>
                                            <td>{{ $kegiatans->anggota->nama_anggota }}</td>
                                            <td>{{ $kegiatans->jeniskegiatan->nama_jenis_kegiatan }}</td>
                                            <td>{!! Illuminate\Support\Str::of($kegiatans->summary_kegiatan)->limit(20) !!}</td>
                                            <td>{{ $kegiatans->tanggal_kegiatan }}</td>
                                            <td>
                                                <div class="d-flex justify-content-start">
                                                    <a href="{{ route('kegiatan.show', $kegiatans->id) }}" class="btn btn-info p-1 m-1"><i class="fas fa-eye"></i></a>
                                                    <a class="btn btn-success m-1" href="{{ route('kegiatan.edit', $kegiatans->id) }}"><i class="fas fa-edit"></i></a>
                                                    <form action="{{ route('kegiatan.destroy', $kegiatans->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger m-1"><i class="far fa-trash-alt"></i></button>                              
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <td text-center>Tidak ada Kegiatan yang ditambahkan</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>   
            </div>
        </div>
    </div>
    @section('data-table')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function(){
                $('#tabel-data').DataTable();
            });
        </script>
    @endsection 
    <script>
        CKEDITOR.replace( 'tufoksi_divisi' );
    </script>
@endsection

