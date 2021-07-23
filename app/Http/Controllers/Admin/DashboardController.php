<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Berita;
use App\Loker;
use App\TracerStudy;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){

        $berita = Berita::count();
        $loker = Loker::count();
        $responden = TracerStudy::count();
        $respondenByYear = DB::table('response_mahasiswa')
                            ->selectRaw('tahun_lulus, count(*) as jumlah')
                            ->groupBy('tahun_lulus')
                            ->get();
        $tahun = [];
        $mhs = [];
        foreach ($respondenByYear as  $res) {
            $tahun[] = $res->tahun_lulus;
            $mhs[] = (int)$res->jumlah;
        }
        $chart = (new LarapexChart)->barChart()
                ->setTitle('Statistik Jumlah Alumni Pertahun')
                ->setSubtitle('Jumlah Alumni.')
                ->setGrid(true)
                ->addData('Jumlah Lulusan', $mhs)
                ->setXAxis($tahun);
                // ->addData('Physical sales', [40, 93, 35, 42, 18, 82])
                // ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);

        return view('pages.admin.dashboard',[
            'berita' => $berita,
            'loker' => $loker,
            'responden' => $responden,
            'chart' => $chart,
        ]);
    }
}
