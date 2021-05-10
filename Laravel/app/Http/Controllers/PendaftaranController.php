<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Test;
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

                        'email' => 'required|min:4|email|unique:users',
                        'name' => 'required|min:4',
                        'nim' => 'required|max:10',
                        'pilihan_praktikum' => 'required|min:3',
                        'berkas' => 'required|mimes:png,jpg,jpeg,pdf|max:2048',
                ]);

                $add_pendaftaran = new Pendaftaran();
                $add_pendaftaran->email = $request->get('email');
                $add_pendaftaran->name = $request->get('name');
                $add_pendaftaran->nimPendaftar = $request->get('nim');
                $add_pendaftaran->pilihan_praktikum = $request->get('pilihan_praktikum');
                $add_pendaftaran->berkas = $request->file('berkas')->store(
                        'assets/product',
                        'public'
                );

                // $add_pendaftaran->id_test = NULL;
                $add_pendaftaran->save();
                $add_pendaftaran->id_pendaftaran = "pendaftaran_" . $add_pendaftaran->id;
                $add_pendaftaran->save();

                $add_test = new Test;
                $add_test->id_pendaftaran = $add_pendaftaran->id_pendaftaran;
                $add_test->id_test = "test_" . $add_test->id_pendaftaran;
                $add_test->save();
                return redirect()->route('asprak.dashboard')->with('status', 'Berhasil Mendaftar, Tunggu Info Selanjutnya Yaa');
                // $add_test->id_soal = $request->get('id_soal');
                // $add_test->jawaban = $request->get('jawaban');
                // $add_test->status = true;
                // return redirect()->route('asprak.dashboard')->with('success', 'Anda Sudah menyelesaikan Test');
        }
}
