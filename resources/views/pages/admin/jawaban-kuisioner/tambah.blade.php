@extends('layouts.admin')

@section('content')
       <!-- Begin Page Content -->
   <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Tambah Data Jawaban Kuisioner</h1>
    </div>

    <a href={{ route('jawaban-kuisioner.index')}} class="btn btn-success" type="submit">Kembali Ke Data Jawaban Kuisioner </a>
    
    @if ($errors->any())
        <div class="alert alert-danger mt-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('jawaban-kuisioner.store') }}" method="POST">
        @csrf
        <div class="row">
            <!-- Grow In Utility -->
            <div class="col-lg-6">
                <div class="card position-relative mt-2">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="soal_kuisioner">Soal Kuisioner</label>
                            <select name="id_kuisioner" class="form-control" >
                                <option value="">Pilih Soal Kuisioner Ingin Diberikan Jawaban </option>
                                @forelse ($soal_kuisioner as $sk)
                                    @if ($sk->tipe_soal == 1)
                                    <option value="{{ $sk->id }}">
                                        {{ $sk->soal_kuisioner }} (Soal Pilihan Ganda)
                                    </option>
                                    @else
                                    <option value="{{ $sk->id }}">
                                        {{ $sk->soal_kuisioner }} (Soal Essai)
                                    </option>
                                    {{-- @elseif ($sk->jawaban)
                                    <option value="{{ $sk->id }}">
                                        {{ $sk->soal_kuisioner }} (Tidak Ada Jawaban Lain)
                                    </option> --}}
                                    @endif
                                @empty
                                <option value="tidak ada soal kuisioner" disabled>
                                    tidak ada soal kuisioner (isi data soal kuisioner terlebih dahulu agar dapat melanjutkan)
                                </option>
                                @endforelse
                            </select>
                            @error('id_kuisioner')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jawaban">Jawaban Kuisioner (Apabila Soal Essai Berikan Nilai 0)</label>
                            <input type="text" name="jawaban" class="form-control" placeholder="Jawaban Kuisioner..."
                            value="{{old('jawaban')}}"
                            />
                            @error('jawaban')
                                 <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
        
                    </div>
                </div>
                <button class="btn btn-primary btn-block mt-4" type="submit">Simpan</button>
            </div>

        
         
        </div>

    </form>

    
    </div>
    <!-- /.container-fluid -->
@endsection