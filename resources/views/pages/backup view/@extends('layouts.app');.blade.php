@extends('layouts.app');

@section('title')
Tracer Study
@endsection


@section('content')

@include('includes.judul-kuisioner')

<!-- section kuisioner -->
<section>
<div class="content-3-7 overflow-hidden container-xxl mx-auto position-relative"
style="font-family: 'Inter', sans-serif; margin-top: -100px;">

<div class="container mx-auto">

    <form action="{{ route('isi-kuisioner-kirim.storeQuiz')}}" method="POST" style="margin-top: 1.5rem" class="content-3-5">
        @csrf
            <div class="row mb-5">
                <div class="col-lg-12 mx-0">
                        <div class="row">
                            <div class="col-lg-4">
                                <div style="margin-bottom: 1.75rem">
                                    <label for="" class="d-block input-label-filter">Nama Lengkap
                                    </label>
                                    <div class="d-flex w-100 div-input">
                                        <input class="input-field border-0" name="nama_mahasiswa" type="text" value="{{old('nama_mahasiswa')}}"/>
                                    </div>
                                    @error('nama_mahasiswa')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div style="margin-bottom: 1.75rem">
                                    <label for="" class="d-block input-label-filter">NPM
                                    </label>
                                    <div class="d-flex w-100 div-input">
                                        <input class="input-field border-0" name="npm_mahasiswa" type="number" value="{{old('npm_mahasiswa')}}"/>
                                    </div>
                                    @error('npm_mahasiswa')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div style="margin-bottom: 1.75rem">
                                    <label for="" class="d-block input-label-filter">Tempat Lahir
                                    </label>
                                    <div class="d-flex w-100 div-input">
                                        <input class="input-field border-0" name="tempat_lahir_mahasiswa" type="text" value="{{old('tempat_lahir_mahasiswa')}}"/>
                                    </div>
                                    @error('tempat_lahir_mahasiswa')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div style="margin-bottom: 1.75rem">
                                    <label for="" class="d-block input-label-filter">Tanggal Lahir
                                    </label>
                                    <div class="d-flex w-100 div-input">
                                        <input class="input-field border-0" name="tgl_lahir_mahasiswa" type="date" value="{{old('tgl_lahir_mahasiswa')}}"/>
                                    </div>
                                    @error('tgl_lahir_mahasiswa')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div style="margin-bottom: 1.75rem">
                                    <label for="" class="d-block input-label-filter">NIK ( Nomor Induk
                                        Kependudukan )
                                    </label>
                                    <div class="d-flex w-100 div-input">
                                        <input class="input-field border-0" name="nik_mahasiswa" type="text" value="{{old('nik_mahasiswa')}}"/>
                                    </div>
                                    @error('nik_mahasiswa')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div style="margin-bottom: 1.75rem">
                                    <label for="" class="d-block input-label-filter">NPWP (Berikan nilai 0 Jika
                                        tidak ada )
                                    </label>
                                    <div class="d-flex w-100 div-input">
                                        <input class="input-field border-0" name="npwp_mahasiswa" type="text" value="{{old('npwp_mahasiswa')}}" />
                                    </div>
                                    @error('npwp_mahasiswa')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div style="margin-bottom: 1.75rem">
                                    <label for="" class="d-block input-label-filter">No.WhatsApp/Handphone
                                    </label>
                                    <div class="d-flex w-100 div-input">
                                        <input class="input-field border-0" name="no_telp_mahasiswa" type="text" value="{{old('no_telp_mahasiswa')}}"/>
                                    </div>
                                    @error('no_telp_mahasiswa')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div style="margin-bottom: 1.75rem">
                                    <label for="" class="d-block input-label-filter">Email
                                    </label>
                                    <div class="d-flex w-100 div-input">
                                        <input class="input-field border-0" name="email_mahasiswa" type="text" value="{{old('email_mahasiswa')}}"/>
                                    </div>
                                    @error('email_mahasiswa')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div style="margin-bottom: 1.75rem">
                                    <label for="" class="d-block input-label-filter">Tahun Lulus
                                    </label>
                                    <div class="d-flex w-100 div-input">
                                        <select name="tahun_lulus" class="input-field border-0">
                                            <option value="">Tahun Lulus</option>
                                            <option value="2015">2015</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                        </select>
                                    </div>
                                    @error('tahun_lulus')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div style="margin-bottom: 1.75rem">
                                    <label for="" class="d-block input-label-filter">Kode Program Studi
                                    </label>
                                    <div class="d-flex w-100 div-input">
                                        <select class="input-field border-0" name="program_studi">
                                            <option value="">Kode Program Studi</option>
                                            <option value="Sistem Informasi">57201 (Sistem Informasi)</option>
                                            <option value="Sistem Komputer">56201 (Sistem Komputer)</option>
                                            <option value="Manajemen Informatika">57401 (Manajemen Informatika)
                                            </option>
                                        </select>
                                    </div>
                                    @error('program_studi')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                </div>
                
            </div>

            <div class="row">
                @foreach ($items as $key => $val)
                @php
                    $jawaban = explode('-', $val->jawaban_pilihan);
                @endphp
                <div class="col-lg-12">
                    <div class="mx-2 card-item position-relative w-100 h-100">
                        <div
                            class="card-item-outline bg-white d-flex flex-column position-relative overflow-hidden h-100">
                            <div class="row">
                                <div class="card-header">
                                    <h2 class="jobs-title my-2 text-capitalize">{{$val->soal_kuisioner}}
                                    </h2>
                                    <input type="text" name="soal_kuisioner[{{$key}}]" value="{{$val->soal_kuisioner}}" hidden />
                                </div> 
                            
                                @foreach ($jawaban as $jwb)
                                    @if (($jwb == '0'))
                                    <div class="jobs-list mt-4">
                                        <div>
                                            <label>
                                                Jawaban Anda :
                                            </label>
                                        </div>
                                        <div class="d-flex w-100 div-input-more mt-4">
                                            <input class="input-field-more border-0" name="jawaban_essai[{{$key}}]" type="text" />
                                        </div>
                                
                                    </div>
                                    @else
                                    <div class="jobs-list mt-4">
                                        <div>
                                            <label>
                                                <input type="radio" class="option-input radio" name="jawaban_pilihan[{{$key}}]" 
                                                value="{{$jwb}}"/>
                                                {{$jwb}}
                                            </label>
                                        </div>
                                    </div>
                                    @endif
                                    
                                @endforeach
                            
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-lg-4">
                    <button class="btn btn-submit-quiz text-white d-block text-center mx-4" type="submit">
                        Kirim Jawaban
                    </button>
                </div>
            </div>
    </form>
</div>
</div>

</section>
<!-- end section kuisioner -->

@endsection

{{-- @push('addon-script')

@endpush --}}


public function index()
{

    $items = DB::table('kuisioner_jawaban')
            ->join('soal_kuisioner', 'soal_kuisioner.id', '=', 'kuisioner_jawaban.id_kuisioner')
            ->select('soal_kuisioner.*', 'kuisioner_jawaban.id_kuisioner', 'soal_kuisioner.soal_kuisioner', DB::raw("jawaban, GROUP_CONCAT(jawaban SEPARATOR '-') as jawaban_pilihan "))
            ->groupBy('id_kuisioner')
            ->orderBy('id_kuisioner', 'asc')
            ->get();
 

    return view('pages.kuisioner', [
        'items' => $items,
    ]);

}

public function storeQuiz(Request $request){

    $request->validate([
                'nama_mahasiswa'            => 'required',
                'npm_mahasiswa'             => 'required|integer|digits:8',
                'tempat_lahir_mahasiswa'    => 'required|string|max:50',
                'tgl_lahir_mahasiswa'       => 'required',
                'nik_mahasiswa'             => 'required|integer|digits:16',
                'npwp_mahasiswa'            => 'required|integer',
                'no_telp_mahasiswa'         => 'required|digits_between:10,12',
                'email_mahasiswa'           => 'required|string|email',
                'tahun_lulus'               => 'required',
                'program_studi'             => 'required',
            ]);

    $response_mahasiswa = TracerStudy::create([
        'nama_mahasiswa'            => $request->nama_mahasiswa,
        'npm_mahasiswa'             => $request->npm_mahasiswa,
        'tempat_lahir_mahasiswa'    => $request->tempat_lahir_mahasiswa,
        'tgl_lahir_mahasiswa'       => $request->tgl_lahir_mahasiswa,
        'nik_mahasiswa'             => $request->nik_mahasiswa,
        'npwp_mahasiswa'            => $request->npwp_mahasiswa,
        'no_telp_mahasiswa'         => $request->no_telp_mahasiswa,
        'email_mahasiswa'           => $request->email_mahasiswa,
        'tahun_lulus'               => $request->tahun_lulus,
        'program_studi'             => $request->program_studi,
    ]);
    $id_insert_response_mahasiswa = $response_mahasiswa->id;

    $answerQuizChoice = $request->jawaban_pilihan;
    $answerQuizEssai = $request->jawaban_essai;


    for ($i=0; $i < count($answerMerge); $i++) { 

        $answers = [
                    'id_mhs'                    => $id_insert_response_mahasiswa,
                    'soal_kuisioner'            => $request->soal_kuisioner[$i],
                    'jawaban'                   => $answerMerge[$i],
                ];

        AnswerResponseTracerStudy::create($answers);
    }

    toast('Berhasil mengirimkan jawaban kuis', 'success');
    return redirect()->route('isi-kuisioner');


}
