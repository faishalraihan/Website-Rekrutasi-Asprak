<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PendaftaranController extends Controller
{
        /* Function: daftarAsprak

        Function Untuk Mengalihkan ke page daftar asprak

        Returns:

        return pages daftar asprak untuk pendaftaran asprak
        */
        public function daftarAsprak()
        {
                if (Session::has('nim')) {

                        return view('pages.daftarAsprak');
                } else {
                        return redirect('login')->with('alert', 'Please log in first');
                }
        }


        /* Function: store

        Function Untuk Menyimpan data yang telah diinput di dalam database

        Parameters:

        $request - request dari halaman web saat melakukan input data di form

        Returns:

        return pages homepage
        */
        public function store(Request $request)
        {
                $request->validate([
                        'jurusan' => 'required|min:4',
                        'angkatan' => 'required|min:4',
                        'kelas' => 'required|min:4',
                        'pilihan_praktikum' => 'required|min:3',
                        'berkas' => 'required|mimes:png,jpg,jpeg|max:2048',
                ]);
                Pendaftaran::insert($request);
                return view('pages.homepage');
        }
}
