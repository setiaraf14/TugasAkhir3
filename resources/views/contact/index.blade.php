@extends('kerangka.master')

@section('title', '| Olah Pesan');
@section('contact', 'active')

@section('ckeditor')
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@endsection

@section('judul')
    <h1>Tabel Pesan</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                      <h3 class="card-title">Pesan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <button  class="btn btn-primary m-2" type="submit" onclick="refresh()" value="Refresh Page" id="refreshdata"><i class="fas fa-info-circle"></i> Refresh Pesan</button>
                        @if (session('Pesan'))
                            <div class="alert alert-success">
                                {{ session('Pesan') }}
                            </div>
                        @endif
                        <table id="tabel-data" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                    <th>Nomor</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Pesan</th>
                                    <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($contact as $contacts)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $contacts->nama }}</td>
                                            <td>{{ $contacts->email }}</td>
                                            <td>{!! Illuminate\Support\Str::of($contacts->pesan)->limit(20) !!}</td>
                                            <td>
                                                <div class="d-flex justify-content-start">
                                                    <a class="btn btn-outline-primary m-1" data-toggle="modal" data-target="#showContact{{$loop->iteration}}"><i class="far fa-eye"></i></a>
                                                    <div class="modal fade" id="showContact{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="showContactLabel{{$loop->iteration}}" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="showContactLabel{{$loop->iteration}}">Keterangan Pesan</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="card mb-3" style="max-width: 100%;">
                                                                    <div class="row no-gutters">
                                                                        <div class="col-lg-6 m-2">
                                                                            <h5>Nama Jabatan     : <b>{{ $contacts->nama }}</b></h5>
                                                                            <h5>Nama Email     : <b>{{ $contacts->email }}</b></h5>
                                                                            <h5><u>Keterangan : </u>{!!  $contacts->pesan !!}</h5>
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
                                                    <form action="{{ route('contact.destroy', $contacts->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger m-1"><i class="far fa-trash-alt"></i></button>                              
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <td text-center>Tidak ada pesan</td>
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
        <script>
            var refreshData = document.getElementById('refreshdata')
            function refresh(){
                location.reload();
            }
            refreshData.addEventListener('onclick', 'refresh');
        </script>
    @endsection 
@endsection
