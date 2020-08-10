@extends('kerangka.front.master')

@section('contact', 'active')

@section('content')

    {{-- Awal Content --}}
    <section class="site-section">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-6">
                <h1>Contact Kami</h1>
                </div>
            </div>
            <div class="row blog-entries">
                <div class="col-md-12 col-lg-8 main-content">
                
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control @error('nama') ins-invalid @enderror"  value="{{ old('nama')}}" required>
                            @error('nama')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control @error('email') ins-invalid @enderror"  value="{{ old('email')}}" required>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="pesan">Masukan Pesan</label>
                            <textarea name="pesan" id="pesan" class="form-control  @error('pesan') is-invalid @enderror" cols="30" rows="8">
                                {{ old('pesan') }}
                            </textarea>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary">
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> 
    {{-- Akhir Content --}}
@endsection
