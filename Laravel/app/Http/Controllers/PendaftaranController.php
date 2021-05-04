<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PendaftaranController extends Controller
{
        public function index()
        {
                if (!Session::get('login')) {
                        return redirect('login')->with('alert', 'Please log in or register first');
                } else {
                        return view('pages.homepage');
                }
        }


        public function daftarAsprak()
        {
                // $asprak = Asprak::find($id);
                if (Session::has('nim')) {

                        return view('pages.daftarAsprak');
                } else {
                        return redirect('login')->with('alert', 'Please log in first');
                }
        }

        public function store(Request $request)
        {
                // $this->validate($request, [
                //         'jurusan' => 'required',
                //         'angkatan' => 'required',
                //         'kelas' => 'required',
                //         'pilihan_pratikum' => 'required',
                //         'berkas' => 'required|mimes:png,jpg,jpeg|max:2048',
                // ]);
                // echo ($request);
                $request->validate([
                        'email' => 'required|min:4|email|unique:users',
                        'name' => 'required|min:4',
                        'nim' => 'required|max:10',
                        'jurusan' => 'required|min:4',
                        'angkatan' => 'required|min:4',
                        'kelas' => 'required|min:4',
                        'pilihan_praktikum' => 'required|min:4',
                        'berkas' => 'required|mimes:png,jpg,jpeg|max:2048',
                ]);
                // echo ($request);
                Pendaftaran::insert($request);
                return view('pages.homepage');
        }
}
