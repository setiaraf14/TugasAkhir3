<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('Admin/dist/img/pemuda.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">LIRA BANTEN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <h4><a href="#" class="d-block">{{ Auth::user()->name }}</a></h4>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('dashboard.dashboard') }}" class="nav-link @yield('dashboard')">
              <h5>Dashboard</h5>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('divisi.index') }}" class="nav-link @yield('divisi')">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Data Divisi
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('jabatan.index') }}" class="nav-link @yield('jabatan')">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Data Jabatan
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('anggotas.index') }}" class="nav-link @yield('anggota')">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Data Anggota
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('jeniskegiatan.index') }}" class="nav-link @yield('jeniskegiatan')">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Jenis Kegiatan
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('kegiatan.index') }}" class="nav-link @yield('kegiatan')">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Kegiatan
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a class="nav-link d-flex justify-content-start">
              <form action="{{ route('logout') }}" method="POST" class="">
                  @csrf
                  <button type="submit" class="btn btn-danger mt-1"><i class="fas fa-sign-out-alt"></i></button>
              </form>
              <p class="m-2">Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>