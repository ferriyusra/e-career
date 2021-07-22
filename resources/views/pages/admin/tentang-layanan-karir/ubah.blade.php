@extends('layouts.admin')

@section('content')
       <!-- Begin Page Content -->
   <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Ubah Tentang Layanan Karir</h1>
    </div>
    <a href={{ route('tentang-layanan-karir.index')}} class="btn btn-success" type="submit">Kembali Ke Data Tentang Layanan Karir </a>
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
            <form action="{{ route('tentang-layanan-karir.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="visi">Visi Layanan Karir</label>
                    <textarea name="visi" id="visi" class="form-control">{{old('visi', $item->visi)}}</textarea>
                    @error('visi')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                </div>
                <div class="form-group">
                    <label for="misi">Misi Layanan Karir</label>
                    <textarea name="misi" id="misi" class="form-control">{{old('misi', $item->misi)}}</textarea>
                    @error('misi')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                </div>
                <div class="form-group">
                    <label for="tujuan">Tujuan Layanan Karir</label>
                    <textarea name="tujuan" id="tujuan" class="form-control">{{old('tujuan', $item->tujuan)}}</textarea>
                    @error('tujuan')
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