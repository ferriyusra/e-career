<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BeritaRequest;
use App\Berita;
use App\KategoriBerita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class BeritaController extends Controller
{
    public function index(){

        $items = Berita::all();
    

        return view('pages.admin.berita.index', [
            'items' => $items
        ]);
    }

    public function create(){

        $kategori_berita = KategoriBerita::all();

        return view('pages.admin.berita.tambah', [
            'kategori_berita' => $kategori_berita,
        ]);

    }

    public function store(BeritaRequest $request){

        // DB::enableQueryLog();
        $data = $request->all();
        
        $data['slug'] = Str::slug($request->judul_berita);
        $data['gambar'] = $request->file('gambar')->store(
            'assets/berita', 'public'
        );
        // $data = DB::getQueryLog();
        // dd($data);
        Berita::create($data);

        toast('Berhasil menambahkan berita baru', 'success');

        return redirect()->route('berita.index');

    }

    public function edit($id){

        $item = Berita::findOrFail($id);
        $kategori_berita = KategoriBerita::all();

        return view('pages.admin.berita.ubah', [
            'item' => $item,
            'kategori_berita' => $kategori_berita,
        ]);

    }


    public function update(Request $request, $id){

        // tangkap id berita yang akan diupdate
        $item = Berita::findOrFail($id);

        $request->validate([
            'kategori_id'   => 'required|integer|exists:kategori_berita,id',
            'judul_berita'      => 'required|min:10|max:255',
            'isi_berita'        => 'required',
        ]);

        // jika ada gambar baru/ubah
        if($request->gambar){

            $data['gambar'] = $request->file('gambar')->store(
                'assets/berita', 'public'
            );
    
            // hapus gambar lama yang ada di folder
            \Storage::disk('local')->delete('public/' . $item->gambar);
            
    
            $item->update($data);
    
            toast('Berhasil mengubah berita dan gambar', 'success');
    
            return redirect()->route('berita.index');
        }

        $item->update([
            'kategori_id' => $request->kategori_id,
            'judul_berita' => $request->judul_berita,
            'isi_berita' => $request->isi_berita,
        ]);

        toast('Berhasil mengubah berita tanpa mengubah gambar', 'success');

        return redirect()->route('berita.index');

    }

    public function destroy($id){

        $item = Berita::findOrFail($id);
        \Storage::disk('local')->delete('public/' . $item->gambar);
        $item->delete();

        
        toast('Berhasil menghapus berita', 'info');

        return redirect()->route('berita.index');

    }

}
