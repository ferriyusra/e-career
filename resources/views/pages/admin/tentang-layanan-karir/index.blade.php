@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
   <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Tentang Layanan Karir</h1>
        <a href="{{ route('tentang-layanan-karir.create')}}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i>
            Tambah Data Tentang Layanan Karir
        </a>
    </div>
    
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0" style="max-width: none !important">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Visi</th>
                            <th>Misi</th>
                            <th>Tujuan</th>
                            <th>Profil</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                            @forelse ($items as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ Str::limit($item->visi,50) }}</td>
                                    <td>{{ Str::limit($item->misi,50) }}</td>
                                    <td>{{ Str::limit($item->tujuan,50) }}</td>
                                    <td>{{ Str::limit($item->profil,50) }}</td>
                                    <td>
                                        <a href="{{route('tentang-layanan-karir.edit', $item->id)}}" class="btn btn-info my-2">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{route('tentang-layanan-karir.destroy', $item->id)}}" method="post" class="d-inline">
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