@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
   <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Lowongan Pekerjaan</h1>
        <a href="{{ route('loker.create')}}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i>
            Tambah Data Lowongan Pekerjaan
        </a>
    </div>
    
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0" style="max-width: none !important">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Perusahaan</th>
                            <th>Lokasi Lowongan</th>
                            {{-- <th>Deskripsi Lowongan</th> --}}
                            <th>Posisi Lowongan</th>
                            <th>Tipe Pekerjaan</th>
                            {{-- <th>Kualifikasi Lowongan</th> --}}
                            {{-- <th>Cara Melamar</th> --}}
                            {{-- <th>Rentang Gaji Minimal</th>
                            <th>Rentang Gaji Maksimal</th> --}}
                            {{-- <th>Pendaftaran Mulai</th> --}}
                            {{-- <th>Pendaftaran Akhir</th> --}}
                            {{-- <th>URL Lamaran</th> --}}
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                            @forelse ($items as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->lokerPerusahaan->nama_perusahaan }}</td>
                                    <td>{{ $item->lokasi_detail_lowongan }}</td>
                                    {{-- <td>{{ Str::limit($item->deskripsi_lowongan, 50) }}</td> --}}
                                    <td>{{ $item->posisi_lowongan }}</td>
                                    <td>{{ $item->tipe_pekerjaan }}</td>
                                    {{-- <td>{{ Str::limit($item->kualifikasi_lowongan,50) }}</td> --}}
                                    {{-- <td>{{ Str::limit($item->cara_melamar,50) }}</td> --}}
                                    {{-- <td>{{ number_format($item->rentang_gaji_min, 0, '.', '.') }}</td>
                                    <td>{{ number_format($item->rentang_gaji_max, 0, '.', '.') }}</td> --}}
                                    {{-- <td>{{ $item->pendaftaran_mulai }}</td> --}}
                                    {{-- <td>{{ $item->pendaftaran_akhir }}</td> --}}
                                    {{-- <td>{{ $item->url_lamaran }}</td> --}}
                                    <td>
                                        <a href="{{route('loker.show', $item->id)}}" class="btn btn-info my-2">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{route('loker.edit', $item->id)}}" class="btn btn-info my-2">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{route('loker.destroy', $item->id)}}" method="post" class="d-inline">
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