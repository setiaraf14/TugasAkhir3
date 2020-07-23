@extends('kerangka.master')

@section('title', '| Olah Jenis Kegiatan');
@section('jeniskegiatan', 'active')

@section('ckeditor')
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@endsection

@section('judul')
    <h1>Tabel Data Jenis Kegiatan</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                      <h3 class="card-title">Data Jenis Kegiatan</h3>
                      <a href="{{ route('jabatan.create') }}" class="btn btn-primary">Tambah Jenis Kegiatan</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if (session('Pesan'))
                            <div class="alert alert-success">
                                {{ session('Pesan') }}
                            </div>
                        @endif
                        <table id="tabel-data" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                    <th>Nomor</th>
                                    <th>Nama Jenis Kegiatan</th>
                                    <th>Keterangan Jenis Kegiatan</th>
                                    <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($jenisKegiatan as $jenisKegiatans)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $jenisKegiatans->nama_jenis_kegiatan }}</td>
                                            <td>{!! Illuminate\Support\Str::of($jenisKegiatans->keterangan_jenis_kegiatan)->limit(20) !!}</td>
                                            <td>
                                                <div class="d-flex justify-content-start">
                                                    <a class="btn btn-outline-primary m-1" data-toggle="modal" data-target="#showjenis{{$loop->iteration}}"><i class="far fa-eye"></i></a>
                                                    <div class="modal fade" id="showjenis{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="showjenisLabel{{$loop->iteration}}" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="showjenisLabel{{$loop->iteration}}">Keterangan jenis kegiatan</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="card mb-3" style="max-width: 100%;">
                                                                    <div class="row no-gutters">
                                                                        <div class="col-lg-6 m-2">
                                                                            <h5>Nama Jabatan     : <b>{{ $jenisKegiatans->nama_jenis_kegiatan }}</b></h5>
                                                                            <h5><u>Keterangan</u>{!!  $jenisKegiatans->keterangan_jenis_kegiatan !!}</h5>
                                                                        </div>
                                                                    </div>
                                                                  </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <a class="btn btn-success m-1" href="{{ route('jeniskegiatan.edit', $jenisKegiatans->id) }}"><i class="fas fa-edit"></i></a>   


                                                    <form action="{{ route('jeniskegiatan.destroy', $jenisKegiatans->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger m-1"><i class="far fa-trash-alt"></i></button>                              
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <td text-center>Tidak ada jenis kegiatan yang ditambahkan</td>
                                    @endforelse
                                </tbody>
                        </table>
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
        CKEDITOR.replace( 'keterangan_jabatan' );
    </script>
@endsection

