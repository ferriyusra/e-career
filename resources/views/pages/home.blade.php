@extends('layouts.app')

@section('title')
    Pusat Layanan Karir STI&K
@endsection

@section('content')
            <div class="header-7-2">
                    <!-- Hero-header -->
                    <div class="container-xxl mx-auto main">
                        <div class="mx-auto row">
                            <!-- Left Column -->
                            <div
                                class="left-col flex-lg-grow-0 col-lg-6 p-0 d-flex flex-column align-items-lg-start text-lg-start align-items-center text-center" >
                            {{-- <div
                                class="left-col flex-lg-grow-0 col-lg-6 p-0 d-flex flex-column align-items-lg-start text-lg-start align-items-center text-center" data-aos="fade-right"> --}}
                                <h1 class="title-font">
                                    <marquee behavior="" direction="">Layanan Karir<br /></marquee>
                                </h1>
                                <p class="caption-font">
                                    Selamat Datang diwebsite Layanan Karir STMIK Jakarta STI&K<br class="d-sm-block d-none" />
                                    Diwebsite ini akan memberikan informasi seputar layanan karir<br class="d-sm-block d-none" />
                                    dan pengisian Kuisioner untuk para Alumni STMIK Jakarta STI&K.
                                </p>
                                <div
                                    class="d-inline-block align-items-center mx-auto mx-lg-0 d-lg-flex justify-content-center gap-sm-3 gap-0">
                                    <a href="#loker" class="btn btn-jobs text-white mb-3 mb-md-0">
                                       Informasi Lowongan Pekerjaan
                                    </a>
                                </div>
                            </div>
                            <!-- Right Column -->
                            <div
                                class="col-lg-6 p-0 text-center justify-content-lg-end justify-content-center d-flex pe-0 position-relative" >
                                <div id="owl-header-7-2" class="owl-carousel owl-theme">
                            {{-- <div
                                class="col-lg-6 p-0 text-center justify-content-lg-end justify-content-center d-flex pe-0 position-relative" data-aos="fade-left">
                                <div id="owl-header-7-2" class="owl-carousel owl-theme"> --}}
                                    @foreach ($GaleriKegiatan as $galeri)
                                    <div class="item">
                                        <img class="carousel-img img-fluid"
                                            src="{{ Storage::url($galeri->gambar)}}"
                                            alt="" />
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

         <!-- section gallery -->
         <section class="features bg-light">
            <div class="content-7-4" style="font-family: 'Inter', sans-serif">
                <div
                    class="container-xxl mx-auto main-top d-flex flex-md-row flex-column justify-content-between align-items-lg-end align-items-start gap-md-0 gap-4">
                    <a href="{{route('galeri-kegiatan')}}" class="see-all">Semua Kegiatan</a>
                    <h2 class="title-text">Kegiatan Kami</h2>
                </div>
            </div>
            <div class="container">
                <div class="row px-5">
               
                    @foreach ($semuaGaleriKegiatan as $semuaGaleri)
                    <div class="col-lg-4">
                        <figure class="figure" >
                        {{-- <figure class="figure" data-aos="flip-down"> --}}
                            <div class="figure-img">
                                <img src="{{ Storage::url($semuaGaleri->gambar)}}" class="figure-img img-fluid" style="width: 385px; height: 271px;">
                                <a href="{{ route('detail-galeri', $semuaGaleri->slug )}}" class="d-flex justify-content-center">
                                    <img src="{{url('frontend/assets/img/scope.png')}}" class="align-self-center">
                                </a>
                            </div>
                            <figcaption class="figure-caption text-center">
                                <h5 class="title-font-gallery text-capitalize">{{ $semuaGaleri->judul_kegiatan }}</h5>
                            </figcaption>
                        </figure>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- end section gallery -->     
        
        <!-- section berita -->
        <section>
            <div class="content-7-4" style="font-family: 'Inter', sans-serif">
                <div
                    class="container-xxl mx-auto main-top d-flex flex-md-row flex-column justify-content-between align-items-lg-end align-items-start gap-md-0 gap-4">
                    <h2 class="title-text">Berita Terbaru</h2>
                    <a href="{{url('/semua-berita')}}" class="see-all">Semua Berita</a>
                </div>
                <div id="owl-content-7-4" class="container-xxl mx-auto main-carousel owl-carousel owl-theme">

                    @foreach ($semuaBerita as $berita)
                    <div class="item" >
                    {{-- <div class="item" data-aos="fade-right"> --}}
                        <lottie-player src="https://assets7.lottiefiles.com/temp/lf20_gNBoNM.json"  background="transparent"  speed="1"  style="width: 100px; height: 100px;"  loop autoplay></lottie-player>
                        <img id="1" class="slide-img" src="{{Storage::url($berita->gambar)}}" style="width: 420px; height: 350px;" />
                        <a href="{{ route('detail-berita', $berita->slug )}}" style="text-decoration: none">
                            <div class="card-item position-relative">
                                <h3 class="slide-title text-capitalize">{{$berita->judul_berita}}</h3>
                                <div class="d-flex justify-content-between">
                                    <p class="slide-caption">Baca Selengkapnya</p>
                                    <svg class="arrow" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.75 11.7257L4.75 11.7257" stroke="#112340" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M13.7002 5.70131L19.7502 11.7253L13.7002 17.7503" stroke="#112340"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- end section berita -->


        <!-- section lowongan -->
        <section id="loker">
            <div class="content-3-7 overflow-hidden container-xxl mx-auto position-relative"
                style="font-family: 'Inter', sans-serif">
                <div class="container mx-auto">
                    <div class="content-section px-5">
                        <h1 class="title-font-jobs text-center">
                            Berbagai macam jenis lowongan pekerjaan menunggu<br />
                        </h1>
                        <p class="caption-font-jobs text-center">
                            Segera mencari informasi lamaran pekerjaan disini.
                        </p>
                    </div>
                    <div class="row">

                        @foreach ($lowonganKerja as $loker)
                        <div class="col-lg-12">
                            <div class="mx-2 card-item position-relative w-100 h-100">
                                <div
                                    class="card-item-outline bg-white d-flex flex-column position-relative overflow-hidden h-100" >
                                {{-- <div
                                    class="card-item-outline bg-white d-flex flex-column position-relative overflow-hidden h-100" data-aos="fade-up"
                                    data-aos-anchor-placement="top-center"> --}}
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="{{Storage::url($loker->lokerPerusahaan->gambar)}}" class="img-fluid rounded mx-auto d-block" style="width: 200px; height: 80;">
                                        </div>
                                        <div class="col-md-8">
                                             <div>
                                            <lottie-player src="https://assets7.lottiefiles.com/temp/lf20_gNBoNM.json"  background="transparent"  speed="1"  style="width: 100px; height: 100px;"  loop autoplay></lottie-player>
                                           </div>
                                            <h2 class="jobs-title text-capitalize">{{ $loker->posisi_lowongan}}</h2>
                                            <h2 class="jobs-value d-flex align-items-center">
                                                <span style="color: #112340;">IDR <span>{{ number_format($loker->rentang_gaji_min, 0, '.', '.') }} - {{ number_format($loker->rentang_gaji_max, 0, '.', '.') }}</span>
                                                </span>
                                                <span class="jobs-duration">/ Bulan</span>
                                            </h2>
                                            <p class="jobs-caption">
                                                {!! $loker->deskripsi_lowongan !!}
                                            </p>
                                            <div class="jobs-list">
                                                <p class="d-flex align-items-center check text-capitalize">
                                                    <span
                                                        class="span-icon d-inline-flex align-items-center justify-content-center flex-shrink-0">
                                                        <i class="fas fa-building"></i>
                                                    </span>Perusahaan : {{$loker->lokerPerusahaan->nama_perusahaan}}
                                                </p>
                                                <p class="d-flex align-items-center check text-capitalize">
                                                    <span
                                                        class="span-icon d-inline-flex align-items-center justify-content-center flex-shrink-0">
                                                        <i class="fas fa-map-signs"></i>
                                                    </span>Lokasi : {{$loker->lokasi_detail_lowongan}}
                                                </p>
                                                <p class="d-flex align-items-center check">
                                                    <span
                                                        class="span-icon d-inline-flex align-items-center justify-content-center flex-shrink-0">
                                                        <i class="fas fa-briefcase"></i> </span>Tanggal Posting Lowongan
                                                    : {{date('d-m-Y', strtotime($loker->pendaftaran_mulai))}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="{{route('detail-lowongan', $loker->slug)}}" class="btn btn-outline d-flex justify-content-center align-items-center w-100">
                                        Lihat Detail Lamaran
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                    <a href="{{ url('/semua-lowongan')}}"
                        class="btn btn-outline-all d-flex justify-content-center align-items-center w-100 mt-3 mx-3">
                        Semua Lamaran
                    </a>
                </div>
            </div>

        </section>
        <!-- end section lowongan -->
@endsection

@push('prepend-style')
    <!-- Owl Carousel -->
<link rel="stylesheet"
href="{{ url('frontend/assets/owl-carousel/owl.carousel.min.css')}}" />

<link rel="stylesheet"
href="{{ url('frontend/assets/owl-carousel/owl.theme.default.min.css')}}" />
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

@endpush

@push('addon-script')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script src="{{url('frontend/assets/owl-carousel/owl.carousel.min.js')}}"></script>
<!-- Owl Carousel Script -->
<script>
$("#owl-header-7-2").owlCarousel({
    autoplay: true,
    autoplayTimeout: 3000,
    loop: true,
    nav: true,
    navText: [
                "<img src='{{url('frontend/assets/img/arrow-left.png')}}'>",
                "<img src='{{url('frontend/assets/img/arrow-right.png')}}'>",
            ],
    dots: false,
    items: 1,
});
</script>

<script>
$(function () {
    $(document).scroll(function () {
        var $nav = $(".header-7-2 .header-sticky");
        $nav.toggleClass("scrolled", $(this).scrollTop() > $nav.height());
    });
});
</script>
<!-- Owl Carousel init & navigation -->
<script>
$("#owl-content-7-4").owlCarousel({
    loop: true,
    nav: false,
    dots: false,
    responsive: {
        0: {
            items: 1,
        },
        769: {
            items: 2.4,
            margin: 40,
        },
    },
});
</script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

@endpush