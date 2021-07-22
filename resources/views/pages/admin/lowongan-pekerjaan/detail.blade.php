@extends('layouts.admin')

@section('content')
       <!-- Begin Page Content -->
   <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Data Lowongan Pekerjaan</h1>
    </div>

    <a href={{ route('loker.index')}} class="btn btn-success" type="submit">Kembali Ke Data Lowongan Pekerjaan </a>
    
    @if ($errors->any())
        <div class="alert alert-danger mt-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
        <div class="row">
            <!-- Grow In Utility -->
            <div class="col-lg-12">
                <div class="card position-relative mt-2">
                    <div class="card-body">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h5 class="m-0 font-weight-bold text-primary">{{$item->lokerPerusahaan->nama_perusahaan }}</h5>
                            </div>
                            <div class="card-body">
                                <h6 class="m-0 font-weight-bold text-primary">Lokasi Lowongan Pekerjaan :</h6>
                                <p class="text-capitalize">{{$item->lokasi_detail_lowongan }}</p>
                                <h6 class="m-0 font-weight-bold text-primary">Deskripsi Lowongan Pekerjaan :</h6>
                                <div>
                                    {!! $item->deskripsi_lowongan !!}
                                </div>
                                <h6 class="m-0 font-weight-bold text-primary">Posisi Lowongan :</h6>
                                <p>{{ $item->posisi_lowongan }}</p>
                                <h6 class="m-0 font-weight-bold text-primary">Tipe Pekerjaan :</h6>
                                <p>{{ $item->tipe_pekerjaan }}</p>
                                <h6 class="m-0 font-weight-bold text-primary">Kualifikasi Lowongan :</h6>
                                <div>
                                    {!! $item->kualifikasi_lowongan !!}
                                </div>
                                <h6 class="m-0 font-weight-bold text-primary">Cara Melamar Lowongan :</h6>
                                <div>
                                    {!! $item->cara_melamar !!}
                                </div>
                                <h6 class="m-0 font-weight-bold text-primary">Rentang Gaji :</h6>
                                <p>{{ "IDR ". number_format($item->rentang_gaji_min, 0, '.', '.') . ' - ' . number_format($item->rentang_gaji_max, 0, '.', '.') }} / Bulan</p>

                                <h6 class="m-0 font-weight-bold text-primary">URL Lamaran :</h6>
                                <p>{{ $item->url_lamaran }}</p>

                            </div>
                        </div>
                          
                    </div>
                </div>

            </div>

        </div>
    
    </div>
    <!-- /.container-fluid -->
@endsection