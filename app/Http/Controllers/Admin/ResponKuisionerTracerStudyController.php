<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\AnswerResponseTracerStudy;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ResponKuisionerTracerStudyController extends Controller
{
    public function index(){

        $items = AnswerResponseTracerStudy::with(['responseNameMhs'])->get();

        return view('pages.admin.respon-kuisioner.index', [
            'items' => $items,
        ]);
    }

    public function destroy($id){

        $item = AnswerResponseTracerStudy::findOrFail($id);
     
        $item->delete();
        
        toast('Berhasil menghapus data jawaban responden mahasiswa', 'info');

        return redirect()->route('respon-kuisioner.index');

    }

}
