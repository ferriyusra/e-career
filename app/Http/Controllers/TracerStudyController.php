<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KirimKuisRequest;
use App\Kuisioner;
use App\TracerStudy;
use App\AnswerResponseTracerStudy;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class TracerStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        // dd($request->all());

        $request->validate([
                    'nama_mahasiswa'            => 'required',
                    'npm_mahasiswa'             => 'required|integer|digits:8|unique:response_mahasiswa',
                    'tempat_lahir_mahasiswa'    => 'required|string|max:50',
                    'tgl_lahir_mahasiswa'       => 'required',
                    'nik_mahasiswa'             => 'required|integer|digits:16|unique:response_mahasiswa',
                    'npwp_mahasiswa'            => 'required|integer',
                    'no_telp_mahasiswa'         => 'required|digits_between:10,12|unique:response_mahasiswa',
                    'email_mahasiswa'           => 'required|string|email|unique:response_mahasiswa',
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
        $questions = $request->soal_kuisioner;
        $answerQuiz = $request->jawaban_mahasiswa;


          for ($i=0; $i < count($questions); $i++) { 
 
            $answers[] = [
                        'id_mhs'                    => $id_insert_response_mahasiswa,
                        'soal_kuisioner'            => $request->soal_kuisioner[$i],
                        'jawaban'                   => $answerQuiz[$i],
                    ];
        }
                
        AnswerResponseTracerStudy::insert($answers);

        alert()->success('Berhasil mengirimkan jawaban kuis', 'Terimakasih telah mengisi kuisioner');
        return redirect()->route('home');
 
    }

}
