<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Test;
use App\Models\Asprak;
use App\Models\Soal;
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
    public function store(Request $request, $id_test)
    {
        // 
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
            $nim = Session::get('nim');
            // var_dump($nim);
            $dataTest['session'] = Asprak::where('nim', $nim)->first();
            // $dataTest['pendaftaran'] = Pendaftaran::where('nim', $nim)->first();

            $dataTest['id_test'] = Pendaftaran::where('id_test', $id_test)->first();
            return view('pages.testTulis', compact('dataTest'));
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
    public function update(Request $request, Test $test)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }
}
