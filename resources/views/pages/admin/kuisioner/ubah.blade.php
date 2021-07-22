@extends('layouts.admin')

@section('content')
       <!-- Begin Page Content -->
   <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Tambah Data Kuisioner</h1>
    </div>

    <a href={{ route('kuisioner.index')}} class="btn btn-success" type="submit">Kembali Ke Data Kuisioner </a>
    
    
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
        <div class="card-body col-md-8">
            <form action="{{ route('kuisioner.update', $item->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="soal_kuisioner">Soal Kuisioner</label>
                    <textarea name="soal_kuisioner" class="form-control" placeholder="Isi Soal...">{{old('soal_kuisioner', $item->soal_kuisioner)}}</textarea>
                    @error('soal_kuisioner')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="form-check-label">
                        Tipe Soal
                      </label>
                    <div class="form-check">
                        <input class="form-check-input" name="tipe_soal" type="radio" id="pilihan_ganda" value="1" {{ $item->tipe_soal == '1'? 'checked': ''}}>
                        @error('tipe_soal')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label class="form-check-label" for="pilihan_ganda">
                          Soal Pilihan Ganda
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipe_soal" id="soal_essai" value="0" {{ $item->tipe_soal == '0'? 'checked': ''}}>
                        @error('tipe_soal')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label class="form-check-label" for="soal_essai">
                            Soal Essai
                        </label>
                    </div>
                </div>

                {{-- <div class="form-group">
                    <label class="form-check-label">
                        Jawaban Lain (Jika Soal Essai silahkan memilih "tidak ada jawaban lain")
                      </label>
                    <div class="form-check">
                        <input class="form-check-input" name="jawaban_lain" type="radio" id="tidak_jawaban_lain" value="1" {{ $item->jawaban_lain == '1'? 'checked': ''}}>
                        @error('jawaban_lain')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label class="form-check-label" for="tidak_jawaban_lain">
                          Tidak Ada Jawaban Lain
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jawaban_lain" id="ada_jawaban_lain" value="0" {{ $item->jawaban_lain == '0'? 'checked': ''}}>
                        @error('jawaban_lain')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label class="form-check-label" for="ada_jawaban_lain">
                          Ada Jawaban Lain
                        </label>
                    </div>
                </div> --}}

                <button class="btn btn-primary btn-block" type="submit">Simpan</button>
            </form>
        </div>
    </div>

    
    </div>
    <!-- /.container-fluid -->
@endsection