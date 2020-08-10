@extends('kerangka.master')

@section('title', '| Olah Profile');
@section('tentang', 'active')

@section('judul')
    <h1>Data Profile</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-6 col-md-3">
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">Detail Profile</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @foreach ($tentang as $tentangs)
                            <div class="aksi d-flex justify-content-end">
                                <a class="btn btn-success m-1" href="{{ route('tentang.edit', $tentangs->id) }}"><i class="fas fa-edit"> Edit Profile</i></a>
                            </div>
                            <div class="content d-flex justify-content-center">
                                <table class="table table-bordered">
                                    <tr>
                                        <td><h5>Nama Instansi</h5></td>
                                        <td>:</td>
                                        <td><h5>{{ $tentangs->nama_instansi }}</h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Moto Instansi</h5></td>
                                        <td>:</td>
                                        <td><h5>{!! $tentangs->moto_instansi !!}</h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Deskripsi Intansi</h5></td>
                                        <td>:</td>
                                        <td><h5>{!! $tentangs->desk_instansi !!}</h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Visi Instansi</h5></td>
                                        <td>:</td>
                                        <td><h5>{!! $tentangs->visi_instansi !!}</h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Misi Kegiatan</h5></td>
                                        <td>:</td>
                                        <td><h5>{!! $tentangs->misi_instansi !!}</h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Logo Instansi</h5></td>
                                        <td>:</td>
                                        <td><img src="{{ Storage::url($tentangs->logo_instansi) }}" alt=""></h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Misi Kegiatan</h5></td>
                                        <td>:</td>
                                        <td><h5>{!! $tentangs->alamat_instansi !!}</h5></td>
                                    </tr>
                                </table>
                            </div>
                        @endforeach
                        
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