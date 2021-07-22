<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use App\KategoriBerita;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $semuaBerita = Berita::orderBy('id', 'desc')->paginate(4);
        $semuaBerita = Berita::with(['berita'])->paginate(4);

        $kategoriBerita = KategoriBerita::orderBy('id', 'desc')->get();

        
        return view('pages.berita', [
            'semuaBerita' => $semuaBerita,
            'kategoriBerita' => $kategoriBerita
        ]);
    }


    public function detail($slug)
    {
        $berita = Berita::with(['berita'])
                    ->where('slug', $slug)->firstOrFail();

        $semuaBerita = Berita::orderBy('id', 'desc')->limit(2)->get();

        return view('pages.detail-berita', [
            'berita' => $berita,
            'semuaBerita' => $semuaBerita,
        ]);

    }

    public function filterByKategori($kategori_berita){

        $kategoriBerita = KategoriBerita::orderBy('id', 'desc')->get();

        $filterBerita = Berita::whereHas('berita', function($query) use($kategori_berita){
            $query->where('kategori_berita', $kategori_berita);
        })->with('berita')->paginate(2);

        return view('pages.filter-berita', [
        'kategoriBerita' => $kategoriBerita,
        'filterBerita' => $filterBerita,
        ]);

    }

}
