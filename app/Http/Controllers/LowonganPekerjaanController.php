<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loker;
use App\Perusahaan;
use Illuminate\Support\Facades\DB;

class LowonganPekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $semuaLoker = Loker::with(['lokerPerusahaan'])->paginate(4);

        $kategoriLokerPekerjaTetap = Loker::where('tipe_pekerjaan', 'Pekerja Tetap')->count();
        $kategoriLokerPekerjaMagang = Loker::where('tipe_pekerjaan', 'Magang')->count();
        $kategoriLokerPekerjaKontrak = Loker::where('tipe_pekerjaan', 'Kontrak')->count();
       

        $kategoriLokerLokasi = DB::table('loker')
                                    ->select('lokasi_detail_lowongan', DB::raw('count(*) as id'))
                                    ->groupBy('lokasi_detail_lowongan')
                                    ->orderBy('id', 'desc')
                                    ->get();

        $kategoriLokerPerusahaan = DB::table('loker')
                                    ->join('perusahaan', 'perusahaan.id', '=', 'loker.perusahaan_id')
                                    ->select('loker.perusahaan_id', 'perusahaan.nama_perusahaan',
                                            DB::raw('count(*) as id'))
                                    ->groupBy('perusahaan_id')
                                    ->orderBy('id', 'desc')
                                    ->get();

        // $kategoriLokerLokasi = DB::table('loker')
        //                         ->select('lokasi_detail_lowongan', DB::raw('count(*) as id'))
        //                         ->groupBy('lokasi_detail_lowongan')
        //                         ->get();

        // $kategoriLokerLokasi = Loker::groupBy('lokasi_detail_lowongan')->get();


        // dd($kategoriLokerPerusahaan);

        return view('pages.lowongan-pekerjaan', [
            'semuaLoker' => $semuaLoker,
            'kategoriLokerPekerjaTetap' => $kategoriLokerPekerjaTetap,
            'kategoriLokerPekerjaMagang' => $kategoriLokerPekerjaMagang,
            'kategoriLokerPekerjaKontrak' => $kategoriLokerPekerjaKontrak,
            'kategoriLokerLokasi' => $kategoriLokerLokasi,
            'kategoriLokerPerusahaan' => $kategoriLokerPerusahaan,
        ]);

    }

    public function detail($slug)
    {
        $loker = Loker::with(['lokerPerusahaan'])
                    ->where('slug', $slug)->firstOrFail();

        $lokerLain = Loker::with(['lokerPerusahaan'])->orderBy('id', 'desc')->limit(2)->get();

        return view('pages.detail-lowongan', [
            'loker' => $loker,
            'lokerLain' => $lokerLain,
        ]);

    }

    public function cariLoker(Request $request){

   

        $kategoriLokerLokasi = DB::table('loker')
                                    ->select('lokasi_detail_lowongan', DB::raw('count(*) as id'))
                                    ->groupBy('lokasi_detail_lowongan')
                                    ->orderBy('id', 'desc')
                                    ->get();

        $kategoriLokerPerusahaan = DB::table('loker')
                                    ->join('perusahaan', 'perusahaan.id', '=', 'loker.perusahaan_id')
                                    ->select('loker.perusahaan_id', 'perusahaan.nama_perusahaan',
                                            DB::raw('count(*) as id'))
                                    ->groupBy('perusahaan_id')
                                    ->orderBy('id', 'desc')
                                    ->get();

        $cari = $request->input('posisi_lowongan');

        $lokerCari = Loker::query()
                    ->where('posisi_lowongan', 'LIKE', "%{$cari}%")
                    ->get();
        
        if($cari == null){
            abort(404);
        }
        
        return view('pages.cari-loker', [
            'kategoriLokerLokasi' => $kategoriLokerLokasi,
            'kategoriLokerPerusahaan' => $kategoriLokerPerusahaan,
            'lokerCari' => $lokerCari,
        ]);

    }
    
    public function filterLoker(Request $request, $lokasi){


        $kategoriLokerLokasi = DB::table('loker')
                                    ->select('lokasi_detail_lowongan', DB::raw('count(*) as id'))
                                    ->groupBy('lokasi_detail_lowongan')
                                    ->orderBy('id', 'desc')
                                    ->get();

        $kategoriLokerPerusahaan = DB::table('loker')
                                    ->join('perusahaan', 'perusahaan.id', '=', 'loker.perusahaan_id')
                                    ->select('loker.perusahaan_id', 'perusahaan.nama_perusahaan',
                                            DB::raw('count(*) as id'))
                                    ->groupBy('perusahaan_id')
                                    ->orderBy('id', 'desc')
                                    ->get();
      
        $cari = $request->input('posisi_lowongan');

        $lokerCari = Loker::query()
                    ->where('posisi_lowongan', 'LIKE', "%{$cari}%")
                    ->get();

        $filterLoker = Loker::whereHas('lokerPerusahaan', function($query) use($lokasi){
            $query->where('lokasi_detail_lowongan', $lokasi);
        })->with('lokerPerusahaan')->paginate(2);


        // dd($filterLokerPerusahaan);
        
        // if($cari == null){
        //     abort(404);
        // }

        // if($lokasi == null){
        //     abort(404);
        // }

        return view('pages.filter-loker', [
            'kategoriLokerLokasi' => $kategoriLokerLokasi,
            'kategoriLokerPerusahaan' => $kategoriLokerPerusahaan,
            'lokerCari' => $lokerCari,
            'filterLoker' => $filterLoker,
        ]);

    }

    public function filterLokerPerusahaan(Request $request, $perusahaan){


        $kategoriLokerLokasi = DB::table('loker')
                                    ->select('lokasi_detail_lowongan', DB::raw('count(*) as id'))
                                    ->groupBy('lokasi_detail_lowongan')
                                    ->orderBy('id', 'desc')
                                    ->get();

        $kategoriLokerPerusahaan = DB::table('loker')
                                    ->join('perusahaan', 'perusahaan.id', '=', 'loker.perusahaan_id')
                                    ->select('loker.perusahaan_id', 'perusahaan.nama_perusahaan',
                                            DB::raw('count(*) as id'))
                                    ->groupBy('perusahaan_id')
                                    ->orderBy('id', 'desc')
                                    ->get();
      
        $cari = $request->input('posisi_lowongan');

        $lokerCari = Loker::query()
                    ->where('posisi_lowongan', 'LIKE', "%{$cari}%")
                    ->get();

        $filterLoker = Loker::whereHas('lokerPerusahaan', function($query) use($perusahaan){
            $query->where('perusahaan_id', $perusahaan);
        })->with('lokerPerusahaan')->paginate(2);

        // dd($filterLoker);

        
        return view('pages.filter-loker', [
            'kategoriLokerLokasi' => $kategoriLokerLokasi,
            'kategoriLokerPerusahaan' => $kategoriLokerPerusahaan,
            'lokerCari' => $lokerCari,
            'filterLoker' => $filterLoker,
        ]);

    }

}
