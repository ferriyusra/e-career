@extends('layouts.admin')

@section('content')
       <!-- Begin Page Content -->
   <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Ubah Data Lowongan Pekerjaan</h1>
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
    
    <form action="{{ route('loker.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <!-- Grow In Utility -->
            <div class="col-lg-6">
                <div class="card position-relative mt-2">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_perusahaan">Nama Perusahaan</label>
                            <select name="perusahaan_id" class="form-control" >
                                <option value="{{$item->perusahaan_id}}">Tidak Diubah
                                </option>
                                @foreach ($nama_perusahaan as $perusahaan)
                                    <option value="{{$perusahaan->id}}">{{$perusahaan->nama_perusahaan}}</option>
                                @endforeach
                            </select>
                            @error('perusahaan_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="lokasi_detail_lowongan">Lokasi Lowongan </label>
                            <input type="text" name="lokasi_detail_lowongan" class="form-control" placeholder="Lokasi Lowongan..."
                            value="{{old('lokasi_detail_lowongan', $item->lokasi_detail_lowongan)}}"
                            />
                            @error('lokasi_detail_lowongan')
                                 <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
        
                        <div class="form-group">
                            <label for="deskripsi_lowongan">Deskripsi Lowongan </label>
                            <textarea name="deskripsi_lowongan" class="form-control" id="deskripsi_lowongan">{{old('deskripsi_lowongan', $item->deskripsi_lowongan)}}</textarea>
                            @error('deskripsi_lowongan')
                                 <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
        
                        <div class="form-group">
                            <label for="posisi_lowongan">Posisi Lowongan</label>
                            <input type="text" name="posisi_lowongan" placeholder="Posisi Lowongan..." class="form-control" value="{{old('posisi_lowongan', $item->posisi_lowongan)}}">
                            @error('posisi_lowongan')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
        
                        <div class="form-group">
                            <label for="tipe_pekerjaan">Tipe Pekerjaan</label>
                            <select name="tipe_pekerjaan" class="form-control">
                                <option value="">Pilih Tipe Pekerjaan</option>
                                <option value="Pekerja Tetap"{{ $item->tipe_pekerjaan == 'Pekerja Tetap'? 'selected': ''}}>Pekerja Tetap</option>
                                <option value="Magang"{{ $item->tipe_pekerjaan == 'Magang'? 'selected': ''}}>Magang</option>
                                <option value="Kontrak"{{ $item->tipe_pekerjaan == 'Kontrak'? 'selected': ''}}>Kontrak</option>
                            </select>
                            @error('tipe_pekerjaan')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
        
                        <div class="form-group">
                            <label for="kualifikasi_lowongan">Kualifikasi Lowongan </label>
                            <textarea name="kualifikasi_lowongan" class="form-control" id="kualifikasi_lowongan">{{old('kualifikasi_lowongan', $item->kualifikasi_lowongan)}}</textarea>
                            @error('kualifikasi_lowongan')
                                 <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                        </div>
                          
                    </div>
                </div>

            </div>

            <!-- Fade In Utility -->
            <div class="col-lg-6">

                <div class="card position-relative mt-2">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="cara_melamar">Cara Melamar Lowongan </label>
                            <textarea name="cara_melamar" class="form-control" id="cara_melamar">{{old('cara_melamar', $item->cara_melamar)}}</textarea>
                            @error('cara_melamar')
                                 <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                        </div>

                        <div class="form-group">
                            <label for="rentang_gaji_min">Gaji Minimal</label>
                            <input type="text" name="rentang_gaji_min" placeholder="Gaji Minimal Lowongan" class="form-control" value="{{old('rentang_gaji_min', $item->rentang_gaji_min)}}">
                            @error('rentang_gaji_min')
                                 <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                        </div>
        
                        <div class="form-group">
                            <label for="rentang_gaji_max">Gaji Maksimal</label>
                            <input type="text" name="rentang_gaji_max" placeholder="Gaji Minimal Lowongan" class="form-control" value="{{old('rentang_gaji_max', $item->rentang_gaji_max)}}">
                            @error('rentang_gaji_max')
                                 <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                        </div>
        
                        <div class="form-group">
                            <label for="pendaftaran_mulai">Pendaftaran Mulai</label>
                            <input type="date" name="pendaftaran_mulai" placeholder="Pendaftaran Mulai..." class="form-control" value="{{old('pendaftaran_mulai', $item->pendaftaran_mulai)}}">
                            @error('pendaftaran_mulai')
                                 <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                        </div>
        
                        <div class="form-group">
                            <label for="pendaftaran_akhir">Pendaftaran Akhir</label>
                            <input type="date" name="pendaftaran_akhir" placeholder="Gaji Minimal Lowongan..." class="form-control" value="{{old('pendaftaran_akhir', $item->pendaftaran_akhir)}}">
                            @error('pendaftaran_akhir')
                                 <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                        </div>
        
                        <div class="form-group">
                            <label for="url_lamaran">URL Lamaran (Ketikan tidak ada, apabila tidak ada link pendaftaran)</label>
                            <input type="text" name="url_lamaran" placeholder="URL Lamaran..." class="form-control" value="{{old('url_lamaran', $item->url_lamaran)}}">
                            @error('url_lamaran')
                                 <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                        </div>
                    </div>
                </div>

            </div>

            <button class="btn btn-primary btn-block mt-4" type="submit">Simpan</button>
        </div>

    </form>
    
    </div>
    <!-- /.container-fluid -->
@endsection