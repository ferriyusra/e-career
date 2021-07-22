<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LokerRequest;
use App\Loker;
use App\Perusahaan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class LokerController extends Controller
{
    public function index(){

        $items = Loker::all();
    

        return view('pages.admin.lowongan-pekerjaan.index', [
            'items' => $items,
        ]);
    }

    public function create(){

        $perusahaan_loker = Perusahaan::all();

        return view('pages.admin.lowongan-pekerjaan.tambah', [
            'perusahaan_loker' => $perusahaan_loker,
        ]);

    }

    public function store(LokerRequest $request){

        $validasiGajiMin = $request->rentang_gaji_min;
        $validasiGajiMax = $request->rentang_gaji_max;

        $data = $request->all();

        if($validasiGajiMax <= $validasiGajiMin || $validasiGajiMax === $validasiGajiMin ){
            
            toast('Keslahan rentang gaji minimal dan maksimal harap cek kembali', 'error');
    
            return redirect()->route('loker.create');
            
          
        } else {

            // $kostumSlug = Str::random(5);
            $data['slug'] =  Str::slug($request->posisi_lowongan . ' ' . $request->perusahaan_id);
          
            Loker::create($data);
    
            toast('Berhasil menambahkan data lowongan pekerjaan baru', 'success');
    
            return redirect()->route('loker.index');

        } 


    }

    public function show($id){
        
        $item = Loker::findOrFail($id);

        return view('pages.admin.lowongan-pekerjaan.detail', [
            'item' => $item,
        ]);

    }

    public function edit($id){

        $item = Loker::findOrFail($id);
        $nama_perusahaan = Perusahaan::all();

        return view('pages.admin.lowongan-pekerjaan.ubah', [
            'item' => $item,
            'nama_perusahaan' => $nama_perusahaan,
        ]);

    }


    public function update(LokerRequest $request, $id){

        $item = Loker::findOrFail($id);
        $data = $request->all();

        $validasiGajiMin = $request->rentang_gaji_min;
        $validasiGajiMax = $request->rentang_gaji_max;


        if($validasiGajiMax <= $validasiGajiMin || $validasiGajiMax === $validasiGajiMin ){
            
            toast('Keslahan rentang gaji minimal dan maksimal harap cek kembali', 'error');
    
            return redirect()->route('loker.index');
            
          
        } else {

          
            $item->update($data);
    
            toast('Berhasil mengubah data lowongan pekerjaan baru', 'success');
    
            return redirect()->route('loker.index');

        } 

      

    }

    public function destroy($id){

        $item = Loker::findOrFail($id);
     
        $item->delete();

        
        toast('Berhasil menghapus data lowongan pekerjaan', 'info');

        return redirect()->route('loker.index');

    }

}
