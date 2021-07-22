@extends('layouts.admin')

@section('content')
       <!-- Begin Page Content -->
   <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Tentang Layanan Karir</h1>
    </div>
    <a href={{ route('galeri-kegiatan.index')}} class="btn btn-success" type="submit">Kembali Ke Data Tentang Layanan Karir </a>
    @if ($errors->any())
        <div class="alert alert-danger mt-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card-shadow">
        <div class="card-body">
            <form action="{{ route('galeri-kegiatan.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="visi">Judul Kegiatan</label>
                    <input type="text" name="judul_kegiatan" placeholder="Judul Kegiatan..." class="form-control" value="{{old('judul_kegiatan', $item->judul_kegiatan)}}">
                    @error('judul_kegiatan')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                </div>
                <div class="form-group">
                    <label for="misi">Isi Kegiatan</label>
                    <textarea name="isi_kegiatan" id="isi_kegiatan" class="form-control">{{old('isi_kegiatan', $item->isi_kegiatan)}}</textarea>
                    @error('isi_kegiatan')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                </div>
                <div class="form-group">
                    <label for="image">Gambar Kegiatan</label>
                    <input type="file" name="gambar" placeholder="Gambar Kegiatan..." class="form-control">
                    <label for="image">Gambar Kegiatan Sekarang</label>
                    <img src="{{Storage::url($item->gambar)}}" alt="" style="width: 150px;" class="img-thumbnail" />
                    @error('gambar')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-primary btn-block" type="submit">Simpan</button>
            </form>
        </div>
    </div>

    
    </div>
    <!-- /.container-fluid -->
@endsection