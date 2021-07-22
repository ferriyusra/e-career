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
                        Lihat informasi dari pusat<br />Layanan Karir
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
                <div class="row d-flex flex-md-row flex-column gap-5 px-5" style="margin-bottom: 5rem">
                    
                    @foreach ($semuaBerita as $berita)
                    <div class="col-lg-6 card-item left h-100 position-relative">
                        <div class="card-body p-0">
                            <div class="card-offset-left bg-white-1 position-absolute"></div>
                            <h5 class="card-title text-center text-capitalize">{{$berita->judul_berita}}</h5>
                            <img src="{{ Storage::url($berita->gambar )}}" alt="" class="img-fluid mx-auto d-block">
                            </p>
                            <hr />
                            <div class="pb-4">
                                <div class="d-flex align-items-center card-point gap-2">
                                    <p class="text-base">
                                        {!! Str::limit($berita->isi_berita,300) !!}
                                    </p>
                                </div>
                                <div class="d-flex align-items-center card-point gap-2">
                                    <p class="text-base"><i class="fas fa-info-circle"></i> {{$berita->berita->kategori_berita}}</p>
                                </div>
                                <div class="d-flex align-items-center card-point gap-2">
                                    <p class="text-base"><i class="fas fa-calendar-day"></i> {{date('d-m-Y', strtotime($berita->pendaftaran_mulai))}}</p>
                                </div>

                            </div>
                            <div class="text-center position-relative btn-hover">
                                <div class="btn-offset-left m-auto position-absolute text-white"></div>
                                <button class="btn btn-card-left position-relative w-100">
                                    Baca Selengkapnya
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach

                   

             
                </div>
            </div>

        </div>
    </section>
    <!-- end section berita -->



    <!-- paginate -->
            {{$semuaBerita->links()}}
    <!-- end paginate -->

@endsection


    {{-- <div class="jobs-list mt-4">
                                                    <div>
                                                        <label>
                                                            <input type="radio" class="option-input radio" name="example" />
                                                                Jawaban 2
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="jobs-list mt-4">
                                                    <div>
                                                        <label>
                                                            <input type="radio" class="option-input radio" name="example" />
                                                            Jawaban 3
                                                        </label>
                                                    </div>
                                                </div> --}}
                                               
                                                {{-- <div class="jobs-list mt-4">
                                                    <div>
                                                        <label>
                                                            <input type="radio" class="option-input radio" name="example" />
                                                            Jawaban Lain :
                                                        </label>
                                                    </div>
                                                    <div class="d-flex w-100 div-input-more mt-4">
                                                        <input class="input-field-more border-0" name=""
                                                            id="" type="text" />
                                                    </div>
                                                </div> --}}