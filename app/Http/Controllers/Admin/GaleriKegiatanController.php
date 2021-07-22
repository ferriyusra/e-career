<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GaleriRequest;
use App\GaleriKegiatan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class GaleriKegiatanController extends Controller
{
    public function index(){

        $items = GaleriKegiatan::all();
    

        return view('pages.admin.galeri-kegiatan.index', [
            'items' => $items
        ]);
    }

    public function create(){

        return view('pages.admin.galeri-kegiatan.tambah');

    }

    public function store(GaleriRequest $request){

        $data = $request->all();
        
        $data['slug'] = Str::slug($request->judul_kegiatan);
        $data['gambar'] = $request->file('gambar')->store(
            'assets/galeri-kegiatan', 'public'
        );
      
        GaleriKegiatan::create($data);

        toast('Berhasil menambahkan galeri kegiatan baru', 'success');

        return redirect()->route('galeri-kegiatan.index');

    }

    public function edit($id){

        $item = GaleriKegiatan::findOrFail($id);

        return view('pages.admin.galeri-kegiatan.ubah', [
            'item' => $item,
        ]);

    }


    public function update(Request $request, $id){

        $item = GaleriKegiatan::findOrFail($id);

        $request->validate([
            'judul_kegiatan'      => 'required|min:10|max:255',
            'isi_kegiatan'         => 'required|min:10|max:255',
        ]);

        if($request->gambar){

            $data['gambar'] = $request->file('gambar')->store(
                'assets/galeri-kegiatan', 'public'
            );
    
            \Storage::disk('local')->delete('public/' . $item->gambar);
            
    
            $item->update($data);
    
            toast('Berhasil mengubah kegiatan dan gambar kegiatan', 'success');
    
            return redirect()->route('galeri-kegiatan.index');
        }

        $item->update([
            'judul_kegiatan' => $request->judul_kegiatan,
            'isi_kegiatan' => $request->isi_kegiatan,
        ]);

        toast('Berhasil mengubah berita tanpa mengubah gambar', 'success');

        return redirect()->route('galeri-kegiatan.index');

    }

    public function destroy($id){

        $item = GaleriKegiatan::findOrFail($id);
        \Storage::disk('local')->delete('public/' . $item->gambar);
        $item->delete();

        
        toast('Berhasil menghapus galeri kegiatan', 'info');

        return redirect()->route('galeri-kegiatan.index');

    }

}
