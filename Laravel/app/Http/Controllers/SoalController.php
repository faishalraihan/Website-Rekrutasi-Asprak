<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $soals = Soal::all();
        return view('pages.listSoal')->with('soals', $soals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['nim'] = $request->session()->get('nim');
        $data['name'] = $request->session()->get('name');
        return view('pages.buatSoal')->with("data", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $add_soal = new Soal;
        $add_soal->soal = $request->get('soal');
        $add_soal->kunciJawaban = $request->get('kunciJawaban');
        $add_soal->nimPembuat = $request->get('nimPembuat');
        $add_soal->matkul = $request->get('matkul');
        $add_soal->save();
        $add_soal->id_soal = "soal_" . $add_soal->matkul . "_" . $add_soal->id;
        $add_soal->save();
        return redirect()->route('soals.create')->with('success', 'Soal Behasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data['soal'] = DB::table('soals')
        //     ->join('tests', 'soals.id_soal', '=', 'tests.id_soal') //->where('nimPendaftar', $nim)->first();
        //     ->join('pendaftarans', 'tests.id_pendaftaran', '=', 'pendaftarans.id_pendaftaran')
        //     ->select('soals.*', 'tests.*', 'pendaftarans.*')
        //     ->get();
        $soal = Soal::findOrFail($id);
        return view('pages.lihatSoal')->with('soal', $soal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function edit(Soal $soal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Soal $soal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Soal $soal)
    {
        //
    }
}
