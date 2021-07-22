<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JawabanKuisionerRequest;
use App\Http\Requests\Admin\KuisionerRequest;
use App\Kuisioner;
use App\JawabanKuisioner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class JawabanKuisionerController extends Controller
{
    public function index(){

        $items = JawabanKuisioner::orderBy('id_kuisioner')->get();
    

        return view('pages.admin.jawaban-kuisioner.index', [
            'items' => $items,
        ]);
    }

    public function create(){

        $soal_kuisioner = Kuisioner::all();

        return view('pages.admin.jawaban-kuisioner.tambah', [
            'soal_kuisioner' => $soal_kuisioner,
        ]);

    }

    public function store(JawabanKuisionerRequest $request){

        $data = $request->all();


        JawabanKuisioner::create($data);

        toast('Berhasil menambahkan data jawaban kuisioner baru', 'success');

        return redirect()->route('jawaban-kuisioner.index');


    }


    public function edit($id){

        $item = JawabanKuisioner::findOrFail($id);
        $soal_kuisioner = Kuisioner::all();

        return view('pages.admin.jawaban-kuisioner.ubah', [
            'item' => $item,
            'soal_kuisioner' => $soal_kuisioner
        ]);

    }


    public function update(JawabanKuisionerRequest $request, $id){

        $item = JawabanKuisioner::findOrFail($id);
        $data = $request->all();

        $item->update($data);

        toast('Berhasil mengubah data jawaban kuisioner', 'success');
        
        return redirect()->route('jawaban-kuisioner.index');


    }

    public function destroy($id){

        $item = JawabanKuisioner::findOrFail($id);
     
        $item->delete();
        // dd($item);

        
        toast('Berhasil menghapus data jawaban kuisioner', 'info');

        return redirect()->route('jawaban-kuisioner.index');

    }

}
