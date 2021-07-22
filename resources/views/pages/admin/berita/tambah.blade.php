@extends('layouts.admin')

@section('content')
       <!-- Begin Page Content -->
   <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Tambah Berita</h1>
    </div>
    <a href={{ route('berita.index')}} class="btn btn-success" type="submit">Kembali Ke Data Berita </a>
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
            <form action="{{ route('berita.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="kategori_berita">Kategori Berita</label>
                    <select name="kategori_id" class="form-control" required>
                        <option value="">Pilih Kategori Berita </option>
                        @forelse ($kategori_berita as $kategori)
                            <option value="{{ $kategori->id }}">
                                {{ $kategori->kategori_berita }}
                            </option>
                        @empty
                            <option value="tidak ada kategori" disabled>
                               tidak ada kategori (isi kategori terlebih dahulu agar dapat melanjutkan)
                            </option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label for="judul_berita">Judul Berita</label>
                    <input type="text"  name="judul_berita" placeholder="Judul Berita..." class="form-control" value="{{old('judul_berita')}}">
                    @error('judul_berita')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="isi_berita">Isi Berita</label>
                    <textarea name="isi_berita" id="isi_berita" class="form-control">{{old('isi_berita')}}</textarea>
                    @error('isi_berita')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                </div>
                <div class="form-group">
                    <label for="image">Gambar Berita</label>
                    <input type="file"  name="gambar" placeholder="Gambar Berita..." class="form-control">
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