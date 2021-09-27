@extends('layouts.app')

@section('title')
    Lowongan Pekerjaan
@endsection


@section('content')
    <!-- section lowongan -->
    <section>
        <div class="content-3-7 overflow-hidden container-xxl mx-auto position-relative"
            style="font-family: 'Inter', sans-serif">
            <div class="mx-auto">
                <div class="content-section px-5">
                    <h1 class="title-font-jobs text-center">
                        Berbagai macam jenis lowongan pekerjaan menunggu<br />
                    </h1>
                    <p class="caption-font-jobs text-center">
                        Segera mencari jenis pekerjaan impian disini.
                    </p>
                </div>
                <div class="row mt-5 mb-5">
                    <div class="col-lg-12 px-5">
                        <form action="{{route('cari-lowongan')}}" method="get" class="content-3-5">
                            <div class="row">
                                <div class="col-lg-10 col-lg-12">
                                    <div style="margin-bottom: 0.5rem">
                                        <label for="" class="d-block input-label-filter">Cari Posisi Lowongan
                                        </label>
                                        <div class="div-input">
                                            <input class="input-field border-0" name="posisi_lowongan"
                                                id="posisi_lowongan" type="text"
                                                placeholder="Contoh : Web Developer, Junior Backend..." />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-12 d-flex flex-column">
                                    <button class="btn btn-fill text-white  text-center" type="submit">
                                        Cari
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-5 mb-5">
                    <div class="col-lg-12 px-5">
                        <form style="margin-top: -1.75rem" action="" method="post" class="content-3-5">
                            <div class="row">
                                <div class="col-lg-12 text-center d-flex justify-content-center">
                                    <div class="empty">
                                        <div class="btn-group px-2" role="group">
                                            <button id="btnGroupDrop2" type="button"
                                                class="btn btn-fill text-white d-block text-center dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Lokasi Pekerjaan
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="
                                                btnGroupDrop2">
                                                @foreach ($kategoriLokerLokasi as $lokerLokasi)
                                                    <li>
                                                        <a class="dropdown-item text-capitalize" href="{{ route('kategori-lowongan', $lokerLokasi->lokasi_detail_lowongan )}}">
                                                            {{$lokerLokasi->lokasi_detail_lowongan}}
                                                            ({{$lokerLokasi->id}})
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        <div class="btn-group px-2" role="group">
                                            <button id="btnGroupDrop3" type="button"
                                                class="btn btn-fill text-white d-block text-center dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Perusahaan
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="
                                                btnGroupDrop3">
                                                @foreach ($kategoriLokerPerusahaan as $lokerPerusahaan)
                                                <li>
                                                    <a class="dropdown-item text-capitalize" href="{{ route('kategori-nama-lowongan', $lokerPerusahaan->perusahaan_id )}}">{{$lokerPerusahaan->nama_perusahaan}}
                                                    ({{$lokerPerusahaan->id}})
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                        </form>

                    </div>
                </div>

                <!-- section all item lowongan -->
                <div class="row row-cols-1 row-cols-md-2 g-4">

                    @foreach ($semuaLoker as $loker)
                    <div class="col">
                        <div class="mx-2 card-item position-relative w-100 h-100">
                            <div
                                class="card-item-outline bg-white d-flex flex-column position-relative overflow-hidden h-100">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{Storage::url($loker->lokerPerusahaan->gambar)}}" alt="{{$loker->lokerPerusahaan->nama_perusahaan}}"
                                            class="img-fluid mx-auto d-block" style="width: 80px; height: 80px;">
                                    </div>
                                    <div class="col-md-8">
                                        <h2 class="jobs-title text-capitalize">{{$loker->posisi_lowongan}}</h2>
                                        <h2 class="jobs-value-all d-flex align-items-center">
                                            <span style="color: color: #112340;">IDR <span>{{ number_format($loker->rentang_gaji_min, 0, '.', '.') }} - </span>
                                            <span style="color: color: #112340;">IDR <span>{{ number_format($loker->rentang_gaji_max, 0, '.', '.') }}</span>
                                            </span>
                                            <span class="jobs-duration-all">/ Bulan</span>
                                        </h2>
                                        <p class="jobs-caption">
                                            {!! Str::limit($loker->deskripsi_lowongan, 300) !!}
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
                <!-- end section all item lowongan -->

            </div>
        </div>
    </section>
    <!-- end section lowongan -->
    <!-- paginate -->
    {{$semuaLoker->links()}}
    <!-- end paginate -->
@endsection