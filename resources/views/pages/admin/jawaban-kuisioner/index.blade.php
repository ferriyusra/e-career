@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
   <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Jawaban Kuisioner</h1>
        <a href="{{ route('jawaban-kuisioner.create')}}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i>
            Tambah Jawaban Kuisioner
        </a>
    </div>
    
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0" style="max-width: none !important">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Soal Kuisioner</th>
                            <th>Jawaban Kuisioner</th>
                            <th>Tipe Soal</th>
                            {{-- <th>Jawaban Lain</th> --}}
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                            @forelse ($items as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->soalKuisioner->soal_kuisioner}}</td>
                                    <td>{{ $item->jawaban}}</td>
                                    @if ( ($item->soalKuisioner->tipe_soal == 1))
                                        <td>soal pilihan ganda</td>
                                    @else
                                        <td>soal essai</td>
                                    @endif
                                    {{-- @if ( ($item->soalKuisioner->jawaban_lain == 1))
                                        <td>Tidak Ada Jawaban Lain</td>
                                    @else
                                        <td>Ada Jawaban Lain</td>
                                    @endif --}}
                                    <td>
                                        <a href="{{route('jawaban-kuisioner.edit', $item->id)}}" class="btn btn-info">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{route('jawaban-kuisioner.destroy', $item->id)}}" method="post" class="d-inline">
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