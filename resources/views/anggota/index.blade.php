@extends('kerangka.master')

@section('bootstrap')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endsection
@section('title', '| Olah Anggota')
@section('anggota', 'active')

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
                      <a href="{{ route('anggotas.create') }}" class="btn btn-primary">Tambah Anggota</a>
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
                                    <th>Nama Anggota</th>
                                    <th>Kontak </th>
                                    <th>No. KTP </th>
                                    <th>Alamat </th>
                                    <th>Divisi </th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($anggota as $anggotas)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $anggotas->nama_anggota }}</td>
                                            <td>{{ $anggotas->hp_anggota }}</td>
                                            <td>{{ $anggotas->ktp_anggota }}</td>
                                            <td>{!! Illuminate\Support\Str::of($anggotas->alamat_anggota)->limit(20) !!}</td>
                                            <td>{{ $anggotas->divisi->nama_divisi }}</td>
                                            <td>{{ $anggotas->jabatan->nama_jabatan }}</td>
                                            <td>
                                                <div class="d-flex justify-content-start">
                                                    <a class="btn btn-outline-primary m-1" data-toggle="modal" data-target="#showDivisi{{$loop->iteration}}"><i class="far fa-eye"></i></a>
                                                    <div class="modal fade" id="showDivisi{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="showDivisiLabel{{$loop->iteration}}" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="showDivisiLabel{{$loop->iteration}}">Keterangan Anggota</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="card mb-3" style="max-width: 100%;">
                                                                    <div class="row no-gutters">
                                                                        <div class="row">
                                                                            <div class="col-lg-12 m-2 d-flex justify-content-center">
                                                                                <img src="{{ Storage::url($anggotas->foto_anggota) }}" alt="" style="width: 150px; height:150px">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-12 m-2 d-flex justify-content-center">
                                                                                <table class="table table-bordered">
                                                                                    <tr>
                                                                                        <td>Nama</td>
                                                                                        <td>:</td>
                                                                                        <td>{{ $anggotas->nama_anggota }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Profile</td>
                                                                                        <td>:</td>
                                                                                        <td>{!! $anggotas->profile_anggota !!}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Alamat</td>
                                                                                        <td>:</td>
                                                                                        <td>{!! $anggotas->alamat_anggota !!}</td>
                                                                                    </tr>
                                                                                </table>
                                                                            </div>
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

                                                    <a class="btn btn-success m-1" href="{{ route('anggotas.edit', $anggotas->id) }}"><i class="fas fa-edit"></i></a>

                                                    <form action="{{ route('anggotas.destroy', $anggotas->id) }}" method="POST">
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
    </div>
    @section('js-bootstrap')
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    @endsection
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

