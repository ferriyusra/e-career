  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-text mx-3">Layanan Karir Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseOne">
            <i class="fas fa-fw fa-cog"></i>
            <span>Data Berita</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('berita.index')}}">
                    <i class="fas fa-fw fa-handshake"></i>
                   Data Berita</a>
                <a class="collapse-item" href="{{ route('kategori-berita.index')}}">
                    <i class="fas fa-fw fa-handshake"></i>
                   Data Kategori Berita</a>
            </div>
        </div>
    </li>

    {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('berita.index')}}">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Data Berita</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('kategori-berita.index')}}">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Data Kategori Berita</span></a>
    </li> --}}


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Data Perusahaan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('perusahaan.index')}}">
                    <i class="fas fa-fw fa-handshake"></i>
                   Data Perusahaan</a>
                <a class="collapse-item" href="{{ route('sosmed.index')}}">
                    <i class="fas fa-fw fa-handshake"></i>
                   Data Sosmed</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('loker.index')}}">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Data Lowongan Pekerjaan</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
            aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-fw fa-cog"></i>
            <span>Data Soal Kuisioner</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('kuisioner.index')}}">
                    <i class="fas fa-fw fa-handshake"></i>
                    Data Soal Kuisioner</a>
                <a class="collapse-item" href="{{route('jawaban-kuisioner.index')}}">
                    <i class="fas fa-fw fa-handshake"></i>
                   Data Jawaban Kuisioner</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('respon-mahasiswa.index')}}">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Data Respon Mahasiswa</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('respon-kuisioner.index')}}">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Data Respon Jawaban Kuisioner Mahasiswa</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('galeri-kegiatan.index')}}">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Data Galeri Kegiatan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('tentang-layanan-karir.index')}}">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Data Tentang Layanan Karir</span></a>
    </li>

    {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('perusahaan.index')}}">
            <i class="fas fa-fw fa-handshake"></i>
            <span>Data Perusahaan</span></a>
    </li> --}}

    {{-- <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-handshake"></i>
            <span>Data Lowongan Pekerjaan</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-pencil-ruler"></i>
            <span>Data Soal Kuisioner</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-pencil-ruler"></i>
            <span>Data Mahasiswa Alumni</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-pencil-ruler"></i>
            <span>Data Program Studi</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-pencil-ruler"></i>
            <span>Data Tahun Lulus</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-pencil-ruler"></i>
            <span>Tracer Study</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-user-edit"></i>
            <span>Pengaturan Tentang Layanan Karir</span></a>
    </li> --}}
   
    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->