@extends('layouts.app')

@section('title')
    Galeri Pusat Layanan Karir STI&K
@endsection

@section('content')
          <!-- section lowongan detail -->
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mx-3">
                                <li class="breadcrumb-item" aria-current="page" style="color: #304970;">
                                    Beranda
                                </li>
                                <li class="breadcrumb-item " aria-current="page" style="color: #304970;">
                                    Galeri Kegiatan
                                </li>
                                <li class="breadcrumb-item active text-capitalize" aria-current="page">
                                   {{$galeriKegiatan->judul_kegiatan}}
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9 pl-lg-0">
                        <div class="card card-details">
                            <img src="{{Storage::url($galeriKegiatan->gambar)}}" alt="" class="img-fluid mx-auto d-block mb-2">
                            <h1 class="jobs-title text-capitalize mt-2">{{$galeriKegiatan->judul_berita}}</h1>
                            <p class="jobs-title mt-2 mb-2 text-bold text-justify">
                                Tanggal Terbit - {{date('d-m-Y', strtotime($galeriKegiatan->created_at))}}
                            </p>
                            <hr />
                            <div class=" jobs-required">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p class="jobs-title mt-2 mb-2 text-bold text-justify">
                                            {!! $galeriKegiatan->isi_kegiatan !!}
                                        </p>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- right column -->
                    <div class="col-lg-3">
                        <h1 class="jobs-title">Galeri Kegiatan lainnya </h1>
                        @foreach ($semuaGaleriKegiatan as $galeri)
                        <div class="card card-details mb-3">
                            <img src="{{Storage::url($galeri->gambar)}}" alt=""  class="rounded mx-auto d-block"
                                style="width: 50%; height: 50%;">
                            <h1 class="jobs-title text-capitalize mt-2">{{$galeri->judul_berita}}</h1>
                            <hr>
                            <a href="{{ route('detail-galeri', $galeri->slug )}}" class="see-all-jobs">Baca Selengkapnya</a>
                        </div>
                        @endforeach
                    </div>
                    <!-- end right column -->
                </div>
            </div>


        </section>
        <!-- end section lowongan detail-->

@endsection
