@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
   <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Berikut ini Data Mahasiswa yang telah menjawab Kuisioner</h1>
    </div>
    {{-- <a href="{{ route('print-all-mhs.print')}}" class="btn btn-md btn-success shadow-sm">
        <i class="fas fa-file-pdf fa-sm text-white-50"></i>
        Export Data Mahasiswa PDF
    </a> --}}

    <div class="row table-responsive">
        <div class="card-body">
            <div class="">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0" style="max-width: none !important">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mahasiswa</th>
                            <th>NPM Mahasiswa</th>
                            <th>Tempat Lahir Mahasiswa</th>
                            <th>Tanggal Lahir Mahasiswa</th>
                            <th>NIK Mahasiswa</th>
                            <th>NPWP Mahasiswa</th>
                            <th>No.Telp Mahasiswa</th>
                            <th>Email</th>
                            <th>Tahun Lulus</th>
                            <th>Program Studi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                            @forelse ($items as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->nama_mahasiswa}}</td>
                                    <td>{{ $item->npm_mahasiswa}}</td>
                                    <td>{{ $item->tempat_lahir_mahasiswa}}</td>
                                    <td>{{ date('d-m-Y', strtotime($item->tgl_lahir_mahasiswa))}}</td>
                                    <td>{{ $item->nik_mahasiswa}}</td>
                                    <td>{{ $item->npwp_mahasiswa}}</td>
                                    <td>{{ $item->no_telp_mahasiswa}}</td>
                                    <td>{{ $item->email_mahasiswa}}</td>
                                    <td>{{ $item->tahun_lulus}}</td>
                                    <td>{{ $item->program_studi}}</td>
                                    <td>
                                        <form action="{{route('respon-mahasiswa.destroy', $item->id)}}" method="post" class="d-inline">
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