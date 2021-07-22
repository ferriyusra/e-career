<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PerusahaanRequest;
use App\Perusahaan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PerusahaanController extends Controller
{
    public function index(){

        $items = Perusahaan::all();
    

        return view('pages.admin.perusahaan.index', [
            'items' => $items
        ]);
    }

    public function create(){

        $perusahaan = Perusahaan::all();

        return view('pages.admin.perusahaan.tambah', [
            'perusahaan' => $perusahaan,
        ]);

    }

    public function store(PerusahaanRequest $request){

        $data = $request->all();
        
        $data['gambar'] = $request->file('gambar')->store(
            'assets/perusahaan', 'public'
        );
   
        Perusahaan::create($data);

        toast('Berhasil menambahkan data perusahaan baru', 'success');

        return redirect()->route('perusahaan.index');

    }

    public function edit($id){

        $item = Perusahaan::findOrFail($id);

        return view('pages.admin.perusahaan.ubah', [
            'item' => $item,
        ]);

    }


    public function update(Request $request, $id){

        $item = Perusahaan::findOrFail($id);

        $request->validate([
            'nama_perusahaan'    => 'required|min:5|max:255',
            'tentang_perusahaan' => 'required|min:5',
            'lokasi_perusahaan' => 'required|min:3|max:255',
        ]);

        if($request->gambar){

            $data['gambar'] = $request->file('gambar')->store(
                'assets/perusahaan', 'public'
            );
    
          
            \Storage::disk('local')->delete('public/' . $item->gambar);
            
    
            $item->update($data);
    
            toast('Berhasil mengubah data dan logo perusahaan', 'success');
    
            return redirect()->route('perusahaan.index');
        }

        $item->update([
            'nama_perusahaan' => $request->nama_perusahaan,
            'tentang_perusahaan' => $request->tentang_perusahaan,
            'lokasi_perusahaan' => $request->lokasi_perusahaan,
        ]);

        
        toast('Berhasil mengubah data perusahaan tanpa mengubah logo perusahaan', 'success');
        return redirect()->route('perusahaan.index');

    }

    public function destroy($id){

        $item = Perusahaan::findOrFail($id);
        \Storage::disk('local')->delete('public/' . $item->gambar);
        $item->delete();

        toast('Berhasil menghapus data perusahaan', 'info');

        return redirect()->route('perusahaan.index');

    }

}
