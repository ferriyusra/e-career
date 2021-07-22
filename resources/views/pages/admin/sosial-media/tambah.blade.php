@extends('layouts.admin')

@section('content')
       <!-- Begin Page Content -->
   <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Tambah Sosial Media Perusahaan</h1>
    </div>

    <a href={{ route('sosmed.index')}} class="btn btn-success" type="submit">Kembali Ke Data Sosial Media Perusahaan </a>
    
    
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
            <form action="{{ route('sosmed.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    {{-- <h1>{{$jml_sosmed}}</h1> --}}
                    <label for="perusahaan_id">Nama Perusahaan</label>
                    <select name="perusahaan_id" class="form-control" required>
                        <option value="">Pilih Nama Perusahaan </option>
                        @forelse ($perusahaan_sosmed as $perusahaan)
                            <option value="{{ $perusahaan->id }}">
                                {{ $perusahaan->nama_perusahaan }}
                            </option>
                        @empty
                            <option value="tidak ada perusahaan" disabled>
                               tidak ada perusahaan (isi data perusahaan terlebih dahulu agar dapat melanjutkan)
                            </option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label for="url_sosial_media">Sosial Media</label>
                    <input type="text" name="url_sosial_media" placeholder="URL Sosial Media (Isikan tidak ada, apabila tidak ada sosial media)" class="form-control" value="{{old('sosial_media')}}">
                    @error('url_sosial_media')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jenis_sosial_media">Jenis Sosial Media</label>
                    <select name="jenis_sosial_media" class="form-control" required>
                        <option value="">Pilih Jenis Sosial Media Perusahaan</option>
                        <option value="instagram">Instagram</option>
                        <option value="twitter">Twitter</option>
                        <option value="facebook">Facebook</option>
                        <option value="website">Website</option>
                    </select>
                </div>
                <button class="btn btn-primary btn-block" type="submit">Simpan</button>
            </form>
        </div>
    </div>

    
    </div>
    <!-- /.container-fluid -->
@endsection