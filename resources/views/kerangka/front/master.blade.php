<!doctype html>
<html lang="en">
  <head>
    <title>Pemuda LIRA Banten</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('Admin/dist/img/pemuda.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('User/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('User/css/animate.css') }} ">
    <link rel="stylesheet" href="{{ asset('User/css/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="{{ asset('User/fonts/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('User/fonts/fontawesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('User/fonts/flaticon/font/flaticon.css') }}">

    <!-- Theme Style -->
    <link rel="stylesheet" href="{{ asset('User/css/style.css') }}">
  </head>
  <body>
    

    <div class="wrap">

      <header role="banner" style="background-color: brown;">
        <div class="top-bar">
          <div class="container">
            <div class="row">
              <div class="col-12 social text-center">
                <P>Bhineka Tunggal Ika</P>
              </div>
            </div>
          </div>
        </div>

        <div class="container logo-wrap">
          <div class="row pt-5">
            <div class="col-12 d-flex justify-content-center">
              @foreach ($tentang_mobile as $item)
                <img src="{{ Storage::url($item->logo_instansi) }}" alt="" width="150">
                <div class="title-pemuda mt-5">
                  <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
                  <h1 class="site-logo" style="font-size: 20px;"><a href="index.html"><b>{{ $item->nama_instansi }}</b></a></h1>
                </div>   
              @endforeach
            </div>
          </div>
        </div>
        
        <nav class="navbar navbar-expand-md  navbar-light bg-light">
          <div class="container">
            
           
            <div class="collapse navbar-collapse" id="navbarMenu">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link @yield('home')" href="{{ route('halamanutama.index') }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle @yield('divisi')" href="category.html" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Divisi</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown05">
                    @foreach ($divisi_menu as $item)
                      @if ($item->nama_divisi != "Non divisi")
                        <a class="dropdown-item " href="{{ route('halamandivisi.show', $item->id) }}">{{ $item->nama_divisi }}</a>
                      @endif
                    @endforeach
                  </div>

                </li>
                <li class="nav-item">
                  <a class="nav-link @yield('tentang')" href="{{ route('halamantentang.index') }}">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link @yield('contact')" href="{{ route('contact.create') }}">Contact</a>
                </li>
              </ul>
              
            </div>
          </div>
        </nav>
      </header>
      <!-- END header -->

      {{-- awal content --}}
      @yield('content')
      {{-- akhir content --}}

      <footer class="site-footer">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md-12 text-center">
              <h3>Adress</h3>
              @foreach ($tentang_mobile as $item)
                  <p>{!! $item->alamat_instansi !!}</p>
              @endforeach
              <p></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
              <p class="small">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy; <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> Pemuda LIRA Banten
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>
        </div>
      </footer>
      <!-- END footer -->

    </div>
    
    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

    <script src="{{ asset('User/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('User/js/jquery-migrate-3.0.0.js') }}"></script>
    <script src="{{ asset('User/js/popper.min.js') }}"></script>
    <script src="{{ asset('User/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('User/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('User/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('User/js/jquery.stellar.min.js') }}"></script>

    
    <script src="{{ asset('User/js/main.js') }}"></script>
  </body>
</html>