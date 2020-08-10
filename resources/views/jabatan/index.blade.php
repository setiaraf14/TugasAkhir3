@extends('kerangka.master')

@section('title', '| Olah Jabatan');
@section('jabatan', 'active')

@section('judul')
    <h1>Tabel Data Divisi</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                      <h3 class="card-title">Data Jabatan</h3>
                      <a href="{{ route('jabatan.create') }}" class="btn btn-primary">Tambah Jabatan</a>
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
                                    <th>Nama Jabatan</th>
                                    <th>Keterangan Jabatan</th>
                                    <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($jabatan as $jabatans)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $jabatans->nama_jabatan }}</td>
                                            <td>{!! Illuminate\Support\Str::of($jabatans->keterangan_jabatan)->limit(20) !!}</td>
                                            <td>
                                                <div class="d-flex justify-content-start">
                                                    <a class="btn btn-outline-primary m-1" data-toggle="modal" data-target="#showJabatan{{$loop->iteration}}"><i class="far fa-eye"></i></a>
                                                    <div class="modal fade" id="showJabatan{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="showJabatanLabel{{$loop->iteration}}" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="showJabatanLabel{{$loop->iteration}}">Keterangan Jabatan</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="card mb-3" style="max-width: 100%;">
                                                                    <div class="row no-gutters">
                                                                        <div class="col-lg-6 m-2">
                                                                            <h5>Nama Jabatan     : <b>{{ $jabatans->nama_jabatan }}</b></h5>
                                                                            <h5><u>Keterangan</u>{!!  $jabatans->keterangan_jabatan !!}</h5>
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

                                                    <a class="btn btn-success m-1" href="{{ route('jabatan.edit', $jabatans->id) }}"><i class="fas fa-edit"></i></a>   


                                                    <form action="{{ route('jabatan.destroy', $jabatans->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger m-1"><i class="far fa-trash-alt"></i></button>                              
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <td text-center>Tidak ada divisi yang ditambahkan</td>
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
    
@endsection

