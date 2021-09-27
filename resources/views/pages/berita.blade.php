@extends('layouts.app')

@section('title')
    Semua Berita
@endsection

@section('content')
    <!-- section berita -->
    <section class="h-100 w-100" style="box-sizing: border-box; padding-top: 5rem; padding-bottom: 5rem">
        <div class="content-4-3" style="font-family: 'Inter', sans-serif; overflow-x: hidden">
            <div class="container-xxl mx-auto">
                <div class="content-section px-5">
                    <h1 class="title-font text-center">
                        Lihat informasi dari Pusat<br />Layanan Karir
                    </h1>
                    <p class="caption-font text-center">
                        Lihat informasi mengenai seputar seminar, workshop dan lainnya di website pusat layanan karir.
                    </p>
                </div>

                <div class="wrap-other-news" style="padding-top: 2rem; padding-bottom: 3rem">
                    <div class="container-xxl mx-auto">
                        <div class="px-5">
                            <p class="footer-caption text-left mx-2">
                                Topik Berita lainnya
                            </p>
                            <div class="align-items-center flex-column justify-content-md-center gap-1">
                                @foreach ($kategoriBerita as $kategori)
                                <a href="{{ route('kategori-berita', $kategori->kategori_berita )}}" class="btn btn-fill-news text-white text-center mx-2 text-capitalize">
                                    {{$kategori->kategori_berita}}
                                </a>
                                @endforeach
                            </div>

                        </div>
                    </div>

                </div>
                <br>
            </div>
        </div>
    </section>
    <!-- end section berita -->

    <!-- section lowongan -->
    <section>
        <div class="content-3-7 overflow-hidden container-xxl mx-auto position-relative"
            style="font-family: 'Inter', sans-serif">
            <div class="mx-auto" style="margin-top: -120px;">
                <!-- section all item lowongan -->
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @foreach ($semuaBerita as $berita)
                    <div class="col-lg-6">
                        <div class="mx-2 card-item position-relative w-100 h-100">
                            <div
                                class="card-item-outline bg-white d-flex flex-column position-relative overflow-hidden h-100">
                                <div class="row">
                                    <img src="{{ Storage::url($berita->gambar)}}"
                                    class="img-fluid mx-auto d-block" style="width: 320px" />
                                    <div class="col-lg-12">
                                        <h2 class="jobs-title text-capitalize text-center mt-2">{{$berita->judul_berita}}</h2>
                                        <p class="jobs-caption">
                                            {!! Str::limit($berita->isi_berita, 300) !!}
                                        </p>
                                        <div class="jobs-list">
                                            <p class="d-flex align-items-center check">
                                                <span
                                                    class="span-icon d-inline-flex align-items-center justify-content-center flex-shrink-0">
                                                    <i class="fas fa-edit"></i>
                                                </span>{{$berita->berita->kategori_berita}}
                                            </p>
                                            <p class="d-flex align-items-center check">
                                                <span
                                                    class="span-icon d-inline-flex align-items-center justify-content-center flex-shrink-0">
                                                    <i class="fas fa-clock"></i> </span>Tanggal Posting
                                                : {{date('d-m-Y', strtotime($berita->created_at))}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('detail-berita', $berita->slug )}}" class="btn btn-outline d-flex justify-content-center align-items-center w-100">
                                Lihat Detail Berita
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
        {{$semuaBerita->links()}}
    <!-- end paginate -->

@endsection