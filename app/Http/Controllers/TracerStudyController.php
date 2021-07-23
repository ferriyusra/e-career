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

        // $items = JawabanKuisioner::groupBy('id_kuisioner')->get();
        // $items = DB::table('kuisioner_jawaban')
        //             ->join('soal_kuisioner', 'soal_kuisioner.id', '=', 'kuisioner_jawaban.id_kuisioner')
        //             ->select('kuisioner_jawaban.id_kuisioner', 'soal_kuisioner.soal_kuisioner' ,DB::raw("jawaban, GROUP_CONCAT(jawaban SEPARATOR '-')"))
        //             ->groupBy('id_kuisioner')
        //             ->get();
        $items = DB::table('kuisioner_jawaban')
                ->join('soal_kuisioner', 'soal_kuisioner.id', '=', 'kuisioner_jawaban.id_kuisioner')
                ->select('soal_kuisioner.*', 'kuisioner_jawaban.id_kuisioner', 'soal_kuisioner.soal_kuisioner', DB::raw("jawaban, GROUP_CONCAT(jawaban SEPARATOR '-') as jawaban_pilihan "))
                ->groupBy('id_kuisioner')
                ->orderBy('id_kuisioner', 'asc')
                ->get();
        // dd($items);

        // $soal = Kuisioner::all();
        // dd($soal);

        return view('pages.kuisioner', [
            'items' => $items,
        ]);
        // return view('pages.kuisioner', [
        //     'items' => $items,
        //     'soal' => $soal,
        // ]);

        // return view('pages.jawaban-mahasiswa.index', [
        //     'items' => $items,
        // ]);
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






        //   for ($i=0; $i < count($answerQuiz); $i++) { 
 
        //     $answers = [
        //                 'id_mhs'                    => $id_insert_response_mahasiswa,
        //                 'soal_kuisioner'            => $request->soal_kuisioner[$i],
        //                 'jawaban'                   => $answerQuiz[$i],
        //             ];
        //     AnswerResponseTracerStudy::create($answers);
        // }

        // toast('Berhasil mengirimkan jawaban kuis', 'success');
        // return redirect()->route('isi-kuisioner');

        // foreach ($answerQuiz as $key) {
        //     $answers = [
        //         'id_mhs'                    => $id_insert_response_mahasiswa,
        //         'soal_kuisioner'            => $request->soal_kuisioner[$key],
        //         'jawaban'                   => $answerQuiz[$key],
        //         ];

        //    AnswerResponseTracerStudy::create($answers);

        // }
 
       

        // $answerQuizChoice = $request->jawaban_pilihan;
        // $answerQuizEssai = $request->jawaban_essai;
        // dd($answerQuizChoice, $answerQuizEssai);
        // $answerMerge = array_merge($answerQuizChoice); // -> jawaban pg aja
        // $answerMerge = array_merge($answerQuiz); // -> jawaban pg - essai
        // $answerMerge = array_merge($answerQuizChoice, $answerQuizEssai); // -> jawaban pg - essai
      
        
        // dd($request->soal_kuisioner);
        // dd($answerMerge);
 
        // for ($i=0; $i < count($answerMerge); $i++) { 
 
        //     $answers[] = [
        //                 'id_mhs'                    => $id_insert_response_mahasiswa,
        //                 'soal_kuisioner'            => $request->soal_kuisioner[$i],
        //                 'jawaban'                   => $answerMerge[$i],
        //                 // 'jawaban_pilihan'           => $request->jawaban_pilihan[$i],
        //                 // 'jawaban_essai'             => $request->jawaban_essai[$i],
        //             ];
        //     AnswerResponseTracerStudy::create($answers);
        // }

       
 
 
    }

    // public static function get_kuisioner($tipe_soal){
    //     return DB::table('kuisioner_jawaban')
    //             ->join('soal_kuisioner', 'soal_kuisioner.id', '=', 'kuisioner_jawaban.id_kuisioner')
    //             ->select('soal_kuisioner.*', 'kuisioner_jawaban.id_kuisioner', 'soal_kuisioner.soal_kuisioner' ,DB::raw("jawaban, GROUP_CONCAT(jawaban SEPARATOR '-') as jawaban_pilihan "))
    //             ->where('soal_kuisioner.tipe_soal', '=', $tipe_soal)
    //             ->groupBy('id_kuisioner')
    //             ->orderBy('id_kuisioner', 'asc')
    //             ->get();
    // }
    // public function storeQuiz(Request $request){
 
    //     // dd($request->all());
 
    //     $request->validate([
    //                 'soal_kuisioner.*'          => 'required',
    //                 'jawaban_pilihan.*'         => 'required',
    //                 'jawaban_essai.*'           => 'required',
    //                 'nama_mahasiswa'            => 'required',
    //                 'npm_mahasiswa'             => 'required|integer|digits:8',
    //                 'tempat_lahir_mahasiswa'    => 'required|string|max:50',
    //                 'tgl_lahir_mahasiswa'       => 'required',
    //                 'nik_mahasiswa'             => 'required|integer|digits:16',
    //                 'npwp_mahasiswa'            => 'required|integer',
    //                 'no_telp_mahasiswa'         => 'required|digits_between:10,12',
    //                 'email_mahasiswa'           => 'required|string|email',
    //                 'tahun_lulus'               => 'required',
    //                 'program_studi'             => 'required',
    //             ]);

    //             // UNIQUEE VALIDATION
    //     // $request->validate([
    //     //             'soal_kuisioner.*'          => 'required',
    //     //             'jawaban_pilihan.*'         => 'required',
    //     //             'jawaban_essai.*'           => 'required',
    //     //             'nama_mahasiswa'            => 'required|unique:response_mahasiswa',
    //     //             'npm_mahasiswa'             => 'required|integer|digits:8|unique:response_mahasiswa',
    //     //             'tempat_lahir_mahasiswa'    => 'required|string|max:50',
    //     //             'tgl_lahir_mahasiswa'       => 'required',
    //     //             'nik_mahasiswa'             => 'required|integer|digits:16|unique:response_mahasiswa',
    //     //             'npwp_mahasiswa'            => 'required|integer',
    //     //             'no_telp_mahasiswa'         => 'required|digits_between:10,12|unique:response_mahasiswa',
    //     //             'email_mahasiswa'           => 'required|string|email|unique:response_mahasiswa',
    //     //             'tahun_lulus'               => 'required',
    //     //             'program_studi'             => 'required',
    //     //         ]);

    //     $response_mahasiswa = TracerStudy::create([
    //         'nama_mahasiswa'            => $request->nama_mahasiswa,
    //         'npm_mahasiswa'             => $request->npm_mahasiswa,
    //         'tempat_lahir_mahasiswa'    => $request->tempat_lahir_mahasiswa,
    //         'tgl_lahir_mahasiswa'       => $request->tgl_lahir_mahasiswa,
    //         'nik_mahasiswa'             => $request->nik_mahasiswa,
    //         'npwp_mahasiswa'            => $request->npwp_mahasiswa,
    //         'no_telp_mahasiswa'         => $request->no_telp_mahasiswa,
    //         'email_mahasiswa'           => $request->email_mahasiswa,
    //         'tahun_lulus'               => $request->tahun_lulus,
    //         'program_studi'             => $request->program_studi,
    //     ]);
    //     $id_insert_response_mahasiswa = $response_mahasiswa->id;
    //     // $question = $request->soal_kuisioner;
    //     $answerQuizChoice = $request->jawaban_pilihan;
    //     $answerQuizEssai = $request->jawaban_essai;
    //     $answerMerge = array_merge($answerQuizChoice, $answerQuizEssai);
 
    //     for ($i=0; $i < count($answerMerge); $i++) { 
      
    //         $answers = [
    //                     'id_mhs'                    => $id_insert_response_mahasiswa,
    //                     'soal_kuisioner'            => $request->soal_kuisioner[$i],
    //                     // 'jawaban_pilihan'           => $request->jawaban_pilihan[$i],
    //                     // 'jawaban_essai'             => $request->jawaban_essai[$i],
    //                 ];
    //         if(isset($request->jawaban_response[$i])){
    //             $answers['jawaban_response'] = $request->jawaban_response[$i];
    //         } else {
    //             $answers['jawaban_response'] = $answerMerge[$i];
    //         }
            
    //         AnswerResponseTracerStudy::create($answers);
    //     }
 
    //     toast('Berhasil mengirimkan jawaban kuisioner', 'success');
    //     return redirect()->route('home');
 
 
    // }

    // public function storeQuiz tanpa relasi tabel(Request $request){

    //     // dd($request->all());

    //     $request->validate([
    //                 'soal_kuisioner.*'          => 'required|array',
    //                 'jawaban_pilihan.*'         => 'required|array',
    //                 'jawaban_essai.*'           => 'required|array',
    //                 'nama_mahasiswa'            => 'required',
    //                 'npm_mahasiswa'             => 'required|integer|digits:8',
    //                 'tempat_lahir_mahasiswa'    => 'required|string|max:50',
    //                 'tgl_lahir_mahasiswa'       => 'required',
    //                 'nik_mahasiswa'             => 'required|integer|digits:16',
    //                 'npwp_mahasiswa'            => 'required|integer',
    //                 'no_telp_mahasiswa'         => 'required|digits_between:10,12',
    //                 'email_mahasiswa'           => 'required|string|email',
    //                 'tahun_lulus'               => 'required',
    //                 'program_studi'             => 'required',
    //             ]);
            
    //     $question = $request->soal_kuisioner;        
    //     $answerQuizChoice = $request->jawaban_pilihan;
    //     $answerQuizEssai = $request->jawaban_essai;
    //     $answerMerge = array_merge($question, $answerQuizChoice, $answerQuizEssai);
        
    //     for ($i=0; $i < count($answerMerge); $i++) { 
    //         $answers[] = [
    //                         'soal_kuisioner'            => $request->soal_kuisioner[$i],
    //                         'jawaban_pilihan'           => $request->jawaban_pilihan[$i],
    //                         'jawaban_essai'             => $request->jawaban_essai[$i],
    //                         'nama_mahasiswa'            => $request->nama_mahasiswa[$i],
    //                         'npm_mahasiswa'             => $request->npm_mahasiswa[$i],
    //                         'tempat_lahir_mahasiswa'    => $request->tempat_lahir_mahasiswa[$i],
    //                         'tgl_lahir_mahasiswa'       => $request->tgl_lahir_mahasiswa[$i],
    //                         'nik_mahasiswa'             => $request->nik_mahasiswa[$i],
    //                         'npwp_mahasiswa'            => $request->npwp_mahasiswa[$i],
    //                         'no_telp_mahasiswa'         => $request->no_telp_mahasiswa[$i],
    //                         'email_mahasiswa'           => $request->email_mahasiswa[$i],
    //                         'tahun_lulus'               => $request->tahun_lulus[$i],
    //                         'program_studi'             => $request->program_studi[$i],
    //                     ];

    //     }

    
    //     answerTracer::create($answers);

    
    //     toast('Berhasil mengirimkan jawaban kuis', 'success');
    //     return redirect()->route('home.index');
      
        
    // }
    // public function storeQuiz(Request $request){

    //     // dd($request->all());

    //     $request->validate([
    //                 'soal_kuisioner.*'          => 'required|array',
    //                 'jawaban_pilihan.*'         => 'required|array',
    //                 'jawaban_essai.*'           => 'required|array',
    //                 'nama_mahasiswa'            => 'required',
    //                 'npm_mahasiswa'             => 'required|integer|digits:8',
    //                 'tempat_lahir_mahasiswa'    => 'required|string|max:50',
    //                 'tgl_lahir_mahasiswa'       => 'required',
    //                 'nik_mahasiswa'             => 'required|integer|digits:16',
    //                 'npwp_mahasiswa'            => 'required|integer',
    //                 'no_telp_mahasiswa'         => 'required|digits_between:10,12',
    //                 'email_mahasiswa'           => 'required|string|email',
    //                 'tahun_lulus'               => 'required',
    //                 'program_studi'             => 'required',
    //             ]);
            
    //     $answerQuizChoice = $request->jawaban_pilihan;
    //     $answerQuizEssai = $request->jawaban_essai;
    //     $answerMerge = array_merge($answerQuizChoice, $answerQuizEssai);
        
    //     for ($i=1; $i < count($answerMerge); $i++) { 
    //         $answers[] = [
    //                         'soal_kuisioner'            => $request->soal_kuisioner[$i],
    //                         'jawaban_pilihan'           => $request->jawaban_pilihan[$i],
    //                         'jawaban_essai'             => $request->jawaban_essai[$i]
    //                     ];
    //     }

    //     // dd($answerMerge);
        
    //     // for ($i=1; $i < count($request->jawaban_pilihan && $request->jawaban_essai); $i++) { 
    //     //     $answers[] = [
    //     //                     'soal_kuisioner'            => $request->soal_kuisioner[$i],
    //     //                     'jawaban_pilihan'           => $request->jawaban_pilihan[$i],
    //     //                     'jawaban_essai'             => $request->jawaban_essai[$i]
    //     //                 ];
    //     // }

    //     // AnswerResponseTracerStudy::create($answers);

    //     // dd($data);
    //     TracerStudy::create([
    //         'nama_mahasiswa'            => $request->nama_mahasiswa,
    //         'npm_mahasiswa'             => $request->npm_mahasiswa,
    //         'tempat_lahir_mahasiswa'    => $request->tempat_lahir_mahasiswa,
    //         'tgl_lahir_mahasiswa'       => $request->tgl_lahir_mahasiswa,
    //         'nik_mahasiswa'             => $request->nik_mahasiswa,
    //         'npwp_mahasiswa'            => $request->npwp_mahasiswa,
    //         'no_telp_mahasiswa'         => $request->no_telp_mahasiswa,
    //         'email_mahasiswa'           => $request->email_mahasiswa,
    //         'tahun_lulus'               => $request->tahun_lulus,
    //         'program_studi'             => $request->program_studi,
    //     ]);
    //     AnswerResponseTracerStudy::create($answers);
        
    
    //     toast('Berhasil mengirimkan jawaban kuis', 'success');
    //     return redirect()->route('home.index');
    //     // AnswerResponseTracerStudy::create([
    //     //     'soal_kuisioner' => $request->soal_kuisioner,
    //     //     'jawaban_pilihan' => $request->jawaban_pilihan,
    //     //     'jawaban_essai' => $request->jawaban_essai,
    //     // ]);
    //     // TracerStudy::create([
    //     //     'nama_mahasiswa'            => $request->nama_mahasiswa,
    //     //     'npm_mahasiswa'             => $request->npm_mahasiswa,
    //     //     'tempat_lahir_mahasiswa'    => $request->tempat_lahir_mahasiswa,
    //     //     'tgl_lahir_mahasiswa'       => $request->tgl_lahir_mahasiswa,
    //     //     'nik_mahasiswa'             => $request->nik_mahasiswa,
    //     //     'npwp_mahasiswa'            => $request->npwp_mahasiswa,
    //     //     'no_telp_mahasiswa'         => $request->no_telp_mahasiswa,
    //     //     'email_mahasiswa'           => $request->email_mahasiswa,
    //     //     'tahun_lulus'               => $request->tahun_lulus,
    //     //     'program_studi'             => $request->program_studi,
    //     // ]);
     
    //     // return view('pages.home');
        
    // }

    // public function storeQuiz(Request $request){

       
    //     dd($request->all());
    //     $answers = $request->all();

    //     foreach ($answers as $answer){
    //         TracerStudy::create($answer);
    //     }
    

    //     toast('Berhasil mengirimkan jawaban kuis', 'success');
    //     return view('pages.home');
        
    // }
    // public function storeQuiz(Request $request){

    //     $request->validate([
    //         'soal_kuisioner'            => 'required|exists:soal_kuisioner,id',
    //         'jawaban_kuis.*'            => 'required|array',
    //         'jawaban_essai'             => 'required',
    //         'nama_mahasiswa'            => 'required',
    //         'npm_mahasiswa'             => 'required|integer|digits:8',
    //         'tempat_lahir_mahasiswa'    => 'required|string|max:50',
    //         'tgl_lahir_mahasiswa'       => 'required',
    //         'nik_mahasiswa'             => 'required|integer|digits:16',
    //         'npwp_mahasiswa'            => 'required|integer',
    //         'no_telp_mahasiswa'         => 'required|digits_between:10,12',
    //         'email_mahasiswa'           => 'required|string|email',
    //         'tahun_lulus'               => 'required',
    //         'program_studi'             => 'required',
    //     ]);
    //     // dd($request->all());
    //     $data = $request->all();
    
    //     dd($data);
        // TracerStudy::create([
        //     'soal_kuisioner'            => $request->soal_kuisioner,
        //     'jawaban_kuis'              => $request->jawaban_kuis,
        //     'jawaban_essai'             => $request->jawaban_essai,
        //     'nama_mahasiswa'            => $request->nama_mahasiswa,
        //     'npm_mahasiswa'             => $request->npm_mahasiswa,
        //     'tempat_lahir_mahasiswa'    => $request->tempat_lahir_mahasiswa,
        //     'tgl_lahir_mahasiswa'       => $request->tgl_lahir_mahasiswa,
        //     'nik_mahasiswa'             => $request->nik_mahasiswa,
        //     'npwp_mahasiswa'            => $request->npwp_mahasiswa,
        //     'no_telp_mahasiswa'         => $request->no_telp_mahasiswa,
        //     'email_mahasiswa'           => $request->email_mahasiswa,
        //     'tahun_lulus'                 => $request->tahun_lulus,
        //     'program_studi'                => $request->program_studi,
        // ]);
    //     // TracerStudy::create($data);

    //     toast('Berhasil mengirimkan jawaban kuis', 'success');
    //     return view('pages.home');
        
    // }
    // public function storeQuiz(KirimKuisRequest $request){

    //     $data = $request->all();
    // $request->validate([
    //     'soal_kuisioner'            => 'required|exists:soal_kuisioner,id',
    //     'jawaban_kuis.*'            => 'required|array',
    //     'jawaban_essai'             => 'required',
    //     'nama_mahasiswa'            => 'required',
    //     'npm_mahasiswa'             => 'required|integer|digits:8',
    //     'tempat_lahir_mahasiswa'    => 'required|string|max:50',
    //     'tgl_lahir_mahasiswa'       => 'required',
    //     'nik_mahasiswa'             => 'required|integer|digits:16',
    //     'npwp_mahasiswa'            => 'required|integer',
    //     'no_telp_mahasiswa'         => 'required|digits_between:10,12',
    //     'email_mahasiswa'           => 'required|string|email',
    //     'tahun_lulus'               => 'required',
    //     'program_studi'             => 'required',
    // ]);

    //     // TracerStudy::create([
    //     //     'soal_kuisioner'            => $request->soal_kuisioner,
    //     //     'jawaban_kuis'              => $request->jawaban_kuis,
    //     //     'jawaban_essai'             => $request->jawaban_essai,
    //     //     'nama_mahasiswa'            => $request->nama_mahasiswa,
    //     //     'npm_mahasiswa'             => $request->npm_mahasiswa,
    //     //     'tempat_lahir_mahasiswa'    => $request->tempat_lahir_mahasiswa,
    //     //     'tgl_lahir_mahasiswa'       => $request->tgl_lahir_mahasiswa,
    //     //     'nik_mahasiswa'             => $request->nik_mahasiswa,
    //     //     'npwp_mahasiswa'            => $request->npwp_mahasiswa,
    //     //     'no_telp_mahasiswa'         => $request->no_telp_mahasiswa,
    //     //     'email_mahasiswa'           => $request->email_mahasiswa,
    //     //     'thn_lulus'                 => $request->thn_lulus,
    //     //     'prog_studi'                => $request->prog_studi,
    //     // ]);

    //     // dd($data);
    //     TracerStudy::create($data);
    //     toast('Berhasil mengirimkan jawaban kuis', 'success');

    //     return redirect()->route('home.index');
        



    //     // toast('Berhasil mengirimkan jawaban kuis', 'success');

    //     // return redirect()->route('home.index');

    // }

}
