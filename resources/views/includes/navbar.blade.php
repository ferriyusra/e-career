  <!-- header -->
        <!-- Navbar -->
        <div class="header-7-2" style="font-family: 'Inter', sans-serif">
            <div class="container-xxl mx-auto p-0 position-sticky" style="z-index: 50;top: 0;">
                <nav class="header-sticky navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="#">
                        <img src="{{ url('frontend/assets/img/logo/stmik3.png')}}" class="img-fluid" style="width: 50%;">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-lg-5 gap-3">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ url('/')}}">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('tentang-layanan-karir')}}">Tentang Layanan Karir</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('semua-berita')}}">Berita</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('semua-lowongan')}}">Lowongan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('isi-kuisioner')}}">Tracer Study</a>
                            </li>
                        </ul>
                        {{-- @guest
                        <form action="">
                            <div class="d-flex">
                                <button type="button" class="btn btn-header" onclick="event.preventDefault(); location.href='{{ url('login') }}'; ">Admin</button>
                            </div>
                        </form>
                       
                        @endguest

                        @auth
                        <form action="{{ url('logout')}}" method="POST">
                            @csrf
                            <div class="d-flex">
                                <button type="submit" class="btn btn-header">Keluar</button>
                            </div>
                        </form>
                        @endauth --}}
                    </div>
                </nav>
            </div>

       
        </div>
        <!-- end header -->