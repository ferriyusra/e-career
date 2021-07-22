<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SosmedRequest;
use Illuminate\Http\Request;
use App\Perusahaan;
use App\Sosmed;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class SosmedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Sosmed::all();

        return view('pages.admin.sosial-media.index', [
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

        //  query untuk phpmyadmin " 
        // SELECT perusahaan_id, COUNT(jenis_sosial_media) FROM sosmed_perusahaan GROUP BY perusahaan_id ORDER BY perusahaan_id ASC

        $perusahaan_sosmed = Perusahaan::all();
        // $jml_sosmed = Sosmed::where('jenis_sosial_media', 'instagram')->OrderBy('perusahaan_id', 'ASC')->count();
     
        return view('pages.admin.sosial-media.tambah', [
            'perusahaan_sosmed' => $perusahaan_sosmed,
            // 'jml_sosmed' => $jml_sosmed,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SosmedRequest $request)
    {
        // DB::enableQueryLog();
        $data = $request->all();
        
        
        Sosmed::create($data);
        // $data = DB::getQueryLog();
        // dd($data);

        toast('Berhasil menambahkan data sosial media perusahaan baru', 'success');

        return redirect()->route('sosmed.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Sosmed::findOrFail($id);
        $perusahaan_sosmed = Perusahaan::all();

        return view('pages.admin.sosial-media.ubah', [
            'item' => $item,
            'perusahaan_sosmed' => $perusahaan_sosmed,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'perusahaan_id'              => 'required|integer|exists:perusahaan,id',
            'url_sosial_media'           => 'required|string|max:255',
            'jenis_sosial_media'         => 'required',
        ]);

        $item = Sosmed::findOrFail($id);

        $item->update([
            'perusahaan_id' => $request->perusahaan_id,
            'url_sosial_media' => $request->url_sosial_media,
            'jenis_sosial_media' => $request->jenis_sosial_media,
        ]);

        toast('Berhasil mengubah data sosial media perusahaan', 'success');

        return redirect()->route('sosmed.index');

        // $item = Sosmed::findOrFail($id);

        // $data = $request->all();
        // $item->update($data);

        // toast('Berhasil mengubah data sosial media perusahaan', 'success');

        // return redirect()->route('sosmed.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Sosmed::findOrFail($id);
        $item->delete();

        toast('Berhasil menghapus data sosial media perusahaan', 'info');

        return redirect()->route('sosmed.index');
    }
}
