@extends('layouts.app')

@section('title')
    Lowongan Pekerjaan
@endsection


@section('content')
    <!-- section lowongan -->
      <!-- section lowongan detail -->
      <section class="section-details-header"></section>
      <section class="section-details-content mb-5">
          <div class="container">
              <div class="row">
                  <div class="col-lg-9 p-0">
                      <nav aria-label="breadcrumb">
                          <ol class="breadcrumb mx-3">
                              <li class="breadcrumb-item" aria-current="page" style="color: #304970;">
                                  Beranda
                              </li>
                              <li class="breadcrumb-item" aria-current="page" style="color: #304970;">
                                  Lowongan Pekerjaan
                              </li>
                              <li class="breadcrumb-item" aria-current="page">
                                  {{$loker->lokerPerusahaan->nama_perusahaan}}
                              </li>
                              <li class="breadcrumb-item active text-capitalize" aria-current="page">
                                {{$loker->posisi_lowongan}}
                            </li>
                          </ol>
                      </nav>
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-9 pl-lg-0">
                      <div class="card card-details">
                          <h1 class="jobs-title text-capitalize">{{$loker->posisi_lowongan}}</h1>
                          <p class="jobs-title mt-2 mb-2 text-capitalize text-bold"> <i class="fas fa-building"></i> {{$loker->lokerPerusahaan->nama_perusahaan}}
                              <br>
                              <i class="fas fa-map-signs"></i> {{$loker->lokasi_detail_lowongan}}
                          </p>

                          <hr />

                          <div class="jobs-required">
                              <div class="row">
                                  <div class="col-lg-4">
                                      <h2 class="jobs-title">Posisi Pekerjaan :
                                          <p class="jobs-title mt-2 mb-2 text-bold text-capitalize">{{$loker->posisi_lowongan}}
                                          </p>
                                      </h2>
                                  </div>
                                  <div class="col-lg-4">
                                      <h2 class="jobs-title">Rentang Gaji : <p class="jobs-title mt-2 mb-2 text-bold"
                                              style="color: #112340;"><span style="color: #112340;">IDR <span>{{ number_format($loker->rentang_gaji_min, 0, '.', '.') }} - {{ number_format($loker->rentang_gaji_max, 0, '.', '.') }}</span>
                                            </span>
                                          </p>
                                      </h2>
                                  </div>
                              </div>
                          </div>

                          <hr>

                          <div class="jobs-required">
                              <div class="row">
                                  <div class="col-lg-12">
                                      <h1 class="jobs-title"><i class="fas fa-thumbtack"></i>
                                          Deskripsi Pekerjaan
                                      </h1>
                                        <p class="jobs-title mt-2 mb-2 text-bold text-justify"
                                              style="margin: 28px;">{!! $loker->deskripsi_lowongan !!}
                                        </p>
                                  </div>
                                  <div class="col-lg-12 my-3">
                                      <h1 class="jobs-title"><i class="fas fa-paste"></i>
                                          Persyaratan
                                      </h1>
                                      <p class="jobs-title text-bold text-justify" style="margin: 28px;">
                                        {!! $loker->kualifikasi_lowongan !!}
                                      </p>
                                  </div>
                              </div>
                          </div>
                          <hr>

                          <div class="jobs-required">
                              <div class="row">
                                  <div class="col-lg-12 my-3">
                                      <h1 class="jobs-title"><i class="fas fa-print"></i>
                                          Tata Cara Mengirimkan Berkas Lamaran
                                      </h1>
                                      <p class="jobs-title text-bold text-justify" style="margin: 28px;">
                                        {!! $loker->cara_melamar !!}
                                      </p>
                                  </div>
                              </div>
                          </div>

                          <hr>
                          <div class="row">
                              <div class="col-lg-6">
                                  <p class="jobs-title mt-2 mb-2 text-bold text-center">
                                      Diiklankan sejak {{date('d-m-Y', strtotime($loker->pendaftaran_mulai))}}
                                  </p>
                              </div>
                              <div class="col-lg-6">
                                  <p class="jobs-title mt-2 mb-2 text-bold text-justify text-center text-end"
                                      >
                                      Ditutup pada  {{date('d-m-Y', strtotime($loker->pendaftaran_akhir))}}
                                  </p>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-lg-12 px-4">
                                  <div class="content-3-5">
                                    @if (Carbon\Carbon::now()->between(Carbon\Carbon::parse($loker->pendaftaran_awal), Carbon\Carbon::parse($loker->pendaftaran_akhir)))
                                        <a href="{{route('home')}}" class="btn btn-fill text-white d-block text-center btn-block">
                                        Lamaran Telah Ditutup
                                        </a>
                                    @elseif ($loker->url_lamaran == 'tidak ada')
                                        <a href="{{route('home')}}" class="btn btn-fill text-white d-block text-center btn-block">
                                        Tidak Ada Link Lamaran
                                        </a>
                                    @else
                                        <a href="{{$loker->url_lamaran}}" class="btn btn-fill text-white d-block text-center btn-block" target="blank_">
                                        Kirim Lamaran Sekarang
                                        </a>
                                    @endif
                                  </div>
                              </div>
                          </div>

                      </div>
                  </div>
                  <!-- righ column -->
                  <div class="col-lg-3 wrapp-loker-serupa">
                      <h1 class="jobs-title">Lowongan Pekerjaan Lainnya </h1>
                    @foreach ($lokerLain as $dataLokerLain)
                        <div class="card card-details mb-3">
                            <img src="{{Storage::url($dataLokerLain->lokerPerusahaan->gambar)}}" alt="{{$dataLokerLain->lokerPerusahaan->nama_perusahaan}}" class="rounded mx-auto d-block"
                                style="width: 50%; height: 50%;">
                            <h1 class="jobs-title text-capitalize">{{$dataLokerLain->posisi_lowongan}}</h1>
                            <hr>
                            <p class="jobs-title mt-2 mb-2 text-bold text-capitalize"> <i class="fas fa-building"></i> {{$dataLokerLain->lokerPerusahaan->nama_perusahaan}}
                                <br>
                                <i class="fas fa-map-signs"></i> {{$dataLokerLain->lokasi_detail_lowongan}}
                            </p>
                            <p class="jobs-title text-bold mt-2"> <i class="fas fa-dollar-sign"></i>
                                IDR {{ number_format($dataLokerLain->rentang_gaji_min, 0, '.', '.') }} - {{ number_format($dataLokerLain->rentang_gaji_max, 0, '.', '.') }}
                            </p>
                            <a href="{{route('detail-lowongan', $dataLokerLain->slug)}}" class="see-all-jobs">Lihat Lowongan</a>
                        </div>
                    @endforeach
                  </div>
                  <!-- end right column -->
              </div>
          </div>

          <!-- section company -->
          <div class="container">
              <div class="row">
                  <div class="container-fluid">
                      <div class="row">
                          <div class="col-lg-9 mt-3 col">
                              <div class="card card-details">
                                  <div class="card-horizontal">
                                      <div class="img-square-wrapper">
                                          <h1 class="jobs-title">Tentang Perusahaan</h1>
                                          <img class="img-fluid" src="{{Storage::url($loker->lokerPerusahaan->gambar)}}"
                                              alt="{{$loker->lokerPerusahaan->nama_perusahaan}}">
                                      </div>
                                      <div class="card-body">
                                          <h1 class="jobs-title text-capitalize">
                                            {{$loker->lokerPerusahaan->nama_perusahaan}}</h1>
                                          <p class="jobs-title mt-2 mb-2 text-bold text-justify">
                                            {!! $loker->lokerPerusahaan->tentang_perusahaan !!}
                                          </p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- end section company -->
      </section>
      <!-- end section lowongan detail-->
    <!-- end section lowongan -->
@endsection