@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
   <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Berita</h1>
        <a href="{{ route('berita.create')}}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i>
            Tambah Data Berita
        </a>
    </div>
    
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered " id="example" width="100%" cellspacing="0" >
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori Berita</th>
                            <th>Judul</th>
                            {{-- <th>Slug</th> --}}
                            <th>Isi Berita</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                            @forelse ($items as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->berita->kategori_berita}}</td>
                                    {{-- <td>
                                        @foreach ($items->kategori_berita as $kategori)
                                            {{ $kategori->kategori_berita }}
                                        @endforeach
                                    </td> --}}
                                    <td>{{ $item->judul_berita }}</td>
                                    {{-- <td>{{ $item->slug }}</td> --}}
                                    <td>{{ Str::limit($item->isi_berita,20) }}</td>
                                    <td>
                                        <img src="{{Storage::url($item->gambar)}}" alt="" style="width: 150px;" class="img-thumbnail" />
                                    </td>
                                    <td>
                                        <a href="{{route('berita.edit', $item->id)}}" class="btn btn-info">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{route('berita.destroy', $item->id)}}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan=7 class="text-center">
                                        Data Kosong
                                    </td>
                                </tr>
                            @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
    </div>
    <!-- /.container-fluid -->
@endsection