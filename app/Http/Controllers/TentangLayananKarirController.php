<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TentangLayananKarir;

class TentangLayananKarirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $items = TentangLayananKarir::get();

        // dd($items);

        return view('pages.layanan-karir', [
            'items' => $items,
        ]);
    }
}
