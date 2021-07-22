<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\KuisionerRequest;
use App\Kuisioner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class KuisionerController extends Controller
{
    public function index(){

        $items = Kuisioner::orderBy('tipe_soal', 'desc')->get();
    

        return view('pages.admin.kuisioner.index', [
            'items' => $items,
        ]);
    }

    public function create(){


        return view('pages.admin.kuisioner.tambah');

    }

    public function store(KuisionerRequest $request){

        $data = $request->all();


        Kuisioner::create($data);

        toast('Berhasil menambahkan soal kuisioner baru', 'success');

        return redirect()->route('kuisioner.index');


    }


    public function edit($id){

        $item = Kuisioner::findOrFail($id);

        return view('pages.admin.kuisioner.ubah', [
            'item' => $item,
        ]);

    }


    public function update(KuisionerRequest $request, $id){

        $item = Kuisioner::findOrFail($id);
        $data = $request->all();

        $item->update($data);

        toast('Berhasil mengubah data kuisioner', 'success');
        
        return redirect()->route('kuisioner.index');


    }

    public function destroy($id){

        $item = Kuisioner::findOrFail($id);
     
        $item->delete();

        // dd($item);

        
        toast('Berhasil menghapus data kuisioner', 'info');

        return redirect()->route('kuisioner.index');

    }

}
