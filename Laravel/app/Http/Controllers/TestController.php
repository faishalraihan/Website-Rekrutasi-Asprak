<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Test;
use App\Models\Asprak;
use App\Models\Soal;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_test)
    {
        if (!Session::get('login')) {
            return redirect('login')->with('alert', 'Please log in or register first');
        } else {
            $nim = Session::get('nim');
            // var_dump($nim);
            $data['session'] = Asprak::where('nim', $nim)->first();
            $data['pendaftaran'] = Pendaftaran::where('nim', $nim)->first();
            $data['id_test'] = Pendaftaran::where('id_test', $id_test)->first();
            $data['soal'] = Soal::where('id_test', $id_test)->first();
            return view('pages.testTulis', compact('data'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show($id_test)
    {
        if (!Session::get('login')) {
            return redirect('login')->with('alert', 'Please log in or register first');
        } else {
            $dataTest['data'] = DB::table('pendaftarans')
                ->join('tests', 'pendaftarans.id_test', '=', 'tests.id_test')
                ->join('soals', 'tests.id_soal', '=', 'soals.id_soal')
                ->select('pendaftarans.*', 'tests.*', 'soals.*')
                ->where('pendaftarans.id_test', '=', $id_test)
                ->first();
            if ($dataTest['data']) {
                return view('pages.testTulis')->with('data', $dataTest);
            } else {
                return redirect()->action(
                    'AsprakController@dashboard'
                )->with('alert', 'Soal Belum ada');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_test)
    {
        $jawaban = $request->get('jawaban');
        Test::where('id_test', $id_test)->update(['jawaban' => $jawaban, 'status' => true]);
        return redirect()->route('dashboard')->with('status', 'Test berhasil dilakasnakan, Tunggu pengumumanya yaaa!');
    }
}
