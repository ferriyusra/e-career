<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\TracerStudy;
// use Mpdf\Mpdf;
use PDF;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ResponMahasiswaTracerStudyController extends Controller
{
    public function index(){

        $items = TracerStudy::all();


        return view('pages.admin.respon-mahasiswa.index', [
            'items' => $items,
        ]);
    }

    public function destroy($id){

        $item = TracerStudy::findOrFail($id);
     
        $item->delete();
        
        toast('Berhasil menghapus data mahasiswa', 'info');

        return redirect()->route('respon-mahasiswa.index');

    }


    public function print(){
        $items = TracerStudy::all();
        $pdf = PDF::loadview('pages.admin.respon-mahasiswa.print',[
            'items' => $items,
        ])->setPaper('A4', 'potrait');
        // return $pdf->stream();
        return $pdf->download('semua-mahasiswa.pdf');
    }

    // public function print(){
    // // menggunakan mpdf;
    //     $items = TracerStudy::all();
    //     $table ='';
    //     $no=1;

    //     foreach ($items as $item) {
    //         $table .='<tr>
    //                     <td>'.$no++.'</td>
    //                     <td>'.$item->nama_mahasiswa.'</td>
    //                     <td>'.$item->npm_mahasiswa.'</td>
    //                     <td>'.$item->tempat_lahir_mahasiswa.'</td>
    //                     <td>'.date('d-m-Y', strtotime($item->tgl_lahir_mahasiswa)).'</td>
    //                     <td>'.$item->nik_mahasiswa.'</td>
    //                     <td>'.$item->npwp_mahasiswa.'</td>
    //                     <td>'.$item->no_telp_mahasiswa.'</td>
    //                     <td>'.$item->email_mahasiswa.'</td>
    //                     <td>'.$item->tahun_lulus.'</td>
    //                     <td>'.$item->program_studi.'</td>
    //                     </tr>';
    //     }
    //                     $mpdf = new Mpdf(['debug'=>FALSE,'mode' => 'utf-8', 'orientation' => 'L']);
    //                     $mpdf->WriteHTML('
    //                     <table border="1" id="datatable" class="table table-striped table-bordered" style="border-collapse: collapse;">
    //                                 <thead>
    //                                 <tr>
    //                                     <th>No</th>
    //                                     <th>Nama Mahasiswa</th>
    //                                     <th>NPM Mahasiswa</th>
    //                                     <th>Tempat Lahir Mahasiswa</th>
    //                                     <th>Tanggal Lahir Mahasiswa</th>
    //                                     <th>NIK Mahasiswa</th>
    //                                     <th>NPWP Mahasiswa</th>
    //                                     <th>No.Telp Mahasiswa</th>
    //                                     <th>Email</th>
    //                                     <th>Tahun Lulus</th>
    //                                     <th>Program Studi</th>
    //                                 </tr>
    //                                 </thead>
    //                                 <tbody>
    //                                 '.$table.'                       
    //                                 </tbody>
    //                             </table>');
    //                     $mpdf->Output('semua-data-mahasiswa.pdf','I');
    //                     exit;
       
    // }

}
