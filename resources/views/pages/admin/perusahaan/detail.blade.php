@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
   <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Data Perusahaan</h1>
    </div>
    
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Perusahaan</th>
                            <th>Tentang Perusahaan</th>
                            <th>Lokasi Perusahaan</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                            @forelse ($items as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->nama_perusahaan}}</td>
                                    <td>{{ $item->tentang_perusahaan }}</td>
                                    <td>{{ $item->lokasi_perusahaan }}</td>
                                    <td>
                                        <img src="{{Storage::url($item->gambar)}}" alt="" style="width: 150px;" class="img-thumbnail" />
                                    </td>
                                    <td>
                                        <a href="{{route('perusahaan.show', $item->id)}}" class="btn btn-info">
                                            <i class="fa fa-eyes-alt"></i>
                                        </a>
                                        <a href="{{route('perusahaan.edit', $item->id)}}" class="btn btn-info">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{route('perusahaan.destroy', $item->id)}}" method="post" class="d-inline">
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