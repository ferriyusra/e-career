@extends('layouts.admin')

@section('content')
       <!-- Begin Page Content -->
   <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Ubah Data Jawaban Kuisioner</h1>
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
    
    <form action="{{ route('jawaban-kuisioner.update', $item->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <!-- Grow In Utility -->
            <div class="col-lg-6">
                <div class="card position-relative mt-2">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="soal_kuisioner">Soal Kuisioner</label>
                            <select name="id_kuisioner" class="form-control" >
                                <option value="{{$item->id_kuisioner}}">Tidak Diubah</option>
                                @foreach ($soal_kuisioner as $sk)
                                    @if ($sk->tipe_soal == 1)
                                    <option value="{{ $sk->id }}">
                                        {{ $sk->soal_kuisioner }} (Soal Pilihan Ganda)
                                    </option>
                                    @else
                                    <option value="{{ $sk->id }}">
                                        {{ $sk->soal_kuisioner }} (Soal Essai)
                                    </option>
                                    {{-- <option value="{{$sk->id}}">{{$sk->soal_kuisioner}}</option> --}}
                                    @endif
                                    {{-- @if ($sk->tipe_soal == 0)
                                    <option value="{{ $sk->id }}" hidden>
                                        {{ $sk->soal_kuisioner }}
                                    </option>
                                    @else
                                    <option value="{{$sk->id}}">{{$sk->soal_kuisioner}}</option>
                                    @endif --}}
                                @endforeach
                            </select>
                            @error('id_kuisioner')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jawaban">Jawaban Kuisioner (Apabila Soal Essai Berikan Nilai 0)</label>
                            <input type="text" name="jawaban" class="form-control" placeholder="Jawaban Kuisioner..."
                            value="{{old('jawaban', $item->jawaban)}}"
                            />
                            @error('jawaban')
                                 <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
        
                    </div>
                </div>

            </div>

        
            <button class="btn btn-primary btn-block mt-4" type="submit">Simpan</button>
        </div>

    </form>

    
    </div>
    <!-- /.container-fluid -->
@endsection