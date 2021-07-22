@extends('layouts.app')

@section('title')
    Tentang Layanan Karir STI&K
@endsection

@section('content')
        <!-- section layanankarir  -->
        <section class="section-details-header"></section>
        <section class="section-details-content mb-4">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mx-3">
                                <li class="breadcrumb-item" aria-current="page" style="color: #304970;">
                                    Beranda
                                </li>
                                <li class="breadcrumb-item " aria-current="page" style="color: #304970;">
                                    Tentang Layanan Karir
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Profil Visi Misi dan Tujuan Layanan Karir
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 pl-lg-0">
                        <div class="card card-details">
                            <h1 class="jobs-title">Visi Misi Layanan Karir STMIK Jakarta STI&K</h1>
                            <hr />
                            <div class="jobs-required">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h1 class="jobs-title"><i class="fas fa-thumbtack"></i>
                                            Visi
                                            <p class="jobs-title mt-2 mb-2 text-bold text-justify"
                                                style="margin: 28px;">
                                                {!! $items[0]->visi !!}
                                            </p>
                                        </h1>
                                    </div>
                                    <hr>
                                    <div class="col-lg-12 my-3">
                                        <h1 class="jobs-title"><i class="fas fa-paste"></i>
                                            Misi
                                            <div class="jobs-title text-justify" style="margin: 28px;">
                                                {!! $items[0]->misi !!}
                                            </div>
                                        </h1>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12 pl-lg-0">
                        <div class="card card-details">
                            <h1 class="jobs-title">Profil Layanan Karir STMIK Jakarta STI&K</h1>
                            <hr />
                            <div class="jobs-required">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h1 class="jobs-title"><i class="fas fa-thumbtack"></i>
                                            Profil Layanan Karir
                                            <p class="jobs-title mt-2 mb-2 text-bold text-justify"
                                                style="margin: 28px;">{!! $items[0]->tujuan !!}
                                            </p>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </section>
        <!-- end section layanankarir -->
@endsection