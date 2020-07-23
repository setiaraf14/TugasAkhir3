@extends('kerangka.master')

@section('title', '| Dashboard')
@section('dashboard', 'active')

@section('ckeditor')
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@endsection

@section('judul')
    <h1>Dashboard</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-page text-center">
                    <div class="card">
                        <h1>Data Utama</h1>
                    </div>
                </div>
                <div class="info d-flex justify-content-center">
                    <div class="col-lg-3 col-md-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                               <h3>{{ $kegiatan }}</h3>
                               <p>Kegiatan</p>
                           </div>
                           <div class="icon">
                               <i class="ion ion-stats-bars"></i>
                           </div>
                           <a href="{{ route('kegiatan.index') }}" class="small-box-footer">olah kegiatan <i class="fas fa-arrow-circle-right"></i></a>
                       </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $anggota }}</h3>
                                <p>Anggota</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{ route('anggotas.index') }}" class="small-box-footer">olah anggota <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $divisi }}</h3>
                                <p>Divisi</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                              <a href="{{ route('divisi.index') }}" class="small-box-footer">olah divisi <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <img src="{{ asset('Admin/dist/img/pemuda.png') }}" alt="">
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

