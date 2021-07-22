<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TentangLayananKarirRequest;
use App\TentangLayananKarir;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class TentangLayananKarirController extends Controller
{
    public function index(){

        $items = TentangLayananKarir::all();
    

        return view('pages.admin.tentang-layanan-karir.index', [
            'items' => $items
        ]);
    }

    public function create(){


        return view('pages.admin.tentang-layanan-karir.tambah');

    }

    public function store(TentangLayananKarirRequest $request){

        $data = $request->all();
        
        TentangLayananKarir::create($data);

        toast('Berhasil menambahkan data tentang layanan karir baru', 'success');

        return redirect()->route('tentang-layanan-karir.index');

    }

    public function edit($id){

        $item = TentangLayananKarir::findOrFail($id);

        return view('pages.admin.tentang-layanan-karir.ubah', [
            'item' => $item,
        ]);

    }


    public function update(TentangLayananKarirRequest $request, $id){

        $item = TentangLayananKarir::findOrFail($id);

        $data = $request->all();

        $item->update($data);

        toast('Berhasil mengubah data tentang layanan karir', 'success');

        return redirect()->route('tentang-layanan-karir.index');

    }

    public function destroy($id){

        $item = TentangLayananKarir::findOrFail($id);
  
        $item->delete();
        
        toast('Berhasil menghapus data tentang layanan karir', 'info');

        return redirect()->route('tentang-layanan-karir.index');

    }

}
