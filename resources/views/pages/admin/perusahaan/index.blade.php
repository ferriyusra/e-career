@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
   <div class="container-fluid">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Perusahaan</h1>
        <a href="{{ route('perusahaan.create')}}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i>
            Tambah Data Perusahaan
        </a>
    </div>

    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table  class="table table-bordered" id="example" width="100%" cellspacing="0" style="max-width: none !important">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Perusahaan</th>
                            <th>Tentang Perusahaan</th>
                            <th>Lokasi Perusahaan</th>
                            <th>Logo Perusahaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                            @forelse ($items as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->nama_perusahaan}}</td>
                                    <td>{{ Str::limit($item->tentang_perusahaan, 50) }}</td>
                                    <td>{{ $item->lokasi_perusahaan }}</td>
                                    <td>
                                        <img src="{{Storage::url($item->gambar)}}" alt="" style="width: 150px;" class="img-thumbnail" />
                                    </td>
                                    <td>
                                        <a href="{{route('perusahaan.edit', $item->id)}}" class="btn btn-info my-2">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{route('perusahaan.destroy', $item->id)}}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger my-2">
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