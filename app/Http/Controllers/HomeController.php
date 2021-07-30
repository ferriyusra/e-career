<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GaleriKegiatan;
use App\Berita;
use App\Loker;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $beritaKegiatan = Berita::whereHas('berita', function($query){
        //     $query->where('kategori_berita', 'kegiatan');
        // })->with('berita')->orderBy('id', 'desc')->limit(5)->get();

        // $beritaSemuaKegiatan = Berita::with(['berita'])->get();

        $GaleriKegiatan = GaleriKegiatan::orderBy('id', 'desc')->limit(3)->get();
        $semuaGaleriKegiatan = GaleriKegiatan::orderBy('id', 'desc')->limit(6)->get();

        $semuaBerita = Berita::orderBy('id', 'desc')->limit(3)->get();

        $lowonganKerja = Loker::with(['lokerPerusahaan'])->orderBy('id','desc')->limit(3)->get();

        
        return view('pages.home', [
            'GaleriKegiatan' => $GaleriKegiatan,
            'semuaGaleriKegiatan' => $semuaGaleriKegiatan,
            'semuaBerita' => $semuaBerita,
            'lowonganKerja' => $lowonganKerja,
        ]);
    }

    public function halamaKosong(){
        return abort(404);
    }

}
