<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use Illuminate\Http\Request;

class HasilController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nilai = new Hasil;
        $nilai->id_test = $request->get('id_test');
        $nilai->id_pendaftaran = $request->get('id_pendaftaran');
        $nilai->nilai = $request->get('nilai');
        $nilai->save();
        $nilai->id_hasil = "hasil_" . $nilai->id . "_" . $nilai->id_test;
        $nilai->save();
        return redirect()->route('listPendaftar')->with('status', 'Nilai Berhasil dimasukkan');
    }

    
}
