<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\KuisionerRequest;
use App\Kuisioner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\KuisionerImport;

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

    public function importSoal(Request $request){
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = $file->hashName();

        //temporary file
        $path = $file->storeAs('public/excel/',$nama_file);

        // import data
        $import = Excel::import(new KuisionerImport(), storage_path('app/public/excel/'.$nama_file));

        //remove from server
        Storage::delete($path);

        if($import) {
            //redirect
            return redirect()->route('kuisioner.index')->with(['success' => 'Data Soal Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('kuisioner.index')->with(['error' => 'Data Soal Gagal Diimport!']);
        }
    }

}
