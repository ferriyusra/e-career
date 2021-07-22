@extends('layouts.admin')

@section('content')
       <!-- Begin Page Content -->
   <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Tambah Kategori Berita</h1>
    </div>
    <a href={{ route('kategori-berita.index')}} class="btn btn-success" type="submit">Kembali Ke Data Kategori</a>

    
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
        <div class="card-body col-md-6">
            <form action="{{ route('kategori-berita.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="kategori_berita">Kategori Berita</label>
                    <input type="text"  name="kategori_berita" placeholder="Kategori Berita..." class="form-control" value="{{old('kategori_berita')}}">
                    @error('kategori_berita')
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