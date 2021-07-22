@extends('layouts.admin')

@section('content')
       <!-- Begin Page Content -->
   <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Tambah Data Perusahaan</h1>
    </div>

    <a href={{ route('perusahaan.index')}} class="btn btn-success" type="submit">Kembali Ke Data Perusahaan </a>
    
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
            <form action="{{ route('perusahaan.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_perusahaan">Nama Perusahaan</label>
                    <input type="text"  name="nama_perusahaan" placeholder="Nama Perusahaan..." class="form-control" value="{{old('nama_perusahaan')}}">
                    @error('nama_perusahaan')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tentang_perusahaan">Tentang Perusahaan</label>
                    <textarea name="tentang_perusahaan" class="form-control" id="tentang_perusahaan">{{old('tentang_perusahaan')}}</textarea>
                    @error('tentang_perusahaan')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                </div>
                <div class="form-group">
                    <label for="lokasi_perusahaan">Lokasi Strategis Perusahaan</label>
                    <input type="text"  name="lokasi_perusahaan" placeholder="Lokasi Strategis Perusahaan..." class="form-control" value="{{old('lokasi_perusahaan')}}">
                    @error('lokasi_perusahaan')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gambar">Logo Perusahaan</label>
                    <input type="file"  name="gambar" placeholder="Logo Perushaaan..." class="form-control">
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