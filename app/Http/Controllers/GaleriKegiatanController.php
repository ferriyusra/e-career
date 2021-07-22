<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GaleriKegiatan;

class GaleriKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index(){
        $galeriKegiatan = GaleriKegiatan::orderBy('id', 'desc')->paginate(2);

        return view('pages.galeri-kegiatan', [
            'galeriKegiatan' => $galeriKegiatan,
        ]);

     }

    public function detail($slug)
    {
        $galeriKegiatan = GaleriKegiatan::where('slug', $slug)->first();
        $semuaGaleriKegiatan = GaleriKegiatan::orderBy('id', 'desc')->limit(2)->get();

        return view('pages.detail-galeri', [
            'galeriKegiatan' => $galeriKegiatan,
            'semuaGaleriKegiatan' => $semuaGaleriKegiatan
        ]);
    }

}
