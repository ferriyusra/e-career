<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\KategoriRequest;
use Illuminate\Http\Request;
use App\KategoriBerita;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $items = KategoriBerita::all();

        return view('pages.admin.kategori-berita.index', [
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori_berita = KategoriBerita::all();

        return view('pages.admin.kategori-berita.tambah', [
            'kategori_berita' => $kategori_berita,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KategoriRequest $request)
    {
        $data = $request->all();

        KategoriBerita::create($data);

        toast('Berhasil menambahkan kategori berita baru', 'success');

        return redirect()->route('kategori-berita.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = KategoriBerita::findOrFail($id);

        return view('pages.admin.kategori-berita.ubah', [
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KategoriRequest $request, $id){

        $item = KategoriBerita::findOrFail($id);

        
        $data = $request->all();

        $item->update($data);

        toast('Berhasil mengubah kategori berita', 'success');

        return redirect()->route('kategori-berita.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = KategoriBerita::findOrFail($id);
 
        $item->delete();

        
        toast('Berhasil menghapus kategori berita', 'info');

        return redirect()->route('kategori-berita.index');
    }
}
