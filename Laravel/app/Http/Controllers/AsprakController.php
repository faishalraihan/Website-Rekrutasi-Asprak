<?php

namespace App\Http\Controllers;


use App\Models\Asprak;
use App\Models\Aslab;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AsprakController extends Controller
{
        /* Function: Index

        Melakukan pengecekan terhadap pengguna apakah sudah melakukan Login atau Belum.

        */
        public function index()
        {
                if (!Session::get('login')) {
                        return redirect('login')->with('alert', 'Please log in or register first');
                } else {
                        return view('pages.homepage');
                }
        }

        /* Function: Login

        Mengarahkan pengguna ke Halaman Login.

        Returns:

        Tampilan dialihkan ke halaman Login.

        */
        public function login()
        {
                return view('auth.login');
        }

        /* Function: Register

        Mengarahkan pengguna ke Halaman Login

        Returns:

        Tampilan dialihkan ke halaman Register.

        */
        public function register()
        {
                return view('auth.register');
        }

        /* Function: LoginPost

        Autentikasi Login pengguna.

        Parameters:

        $request - Nilai input pengguna saat Login (Email, Password, Data).

        Returns:

        Apabila Email dan Password yang dimasukkan benar maka pengguna akan dialihkan ke Halaman Asprak, Jika tidak maka akan menampilkan bahwa inputan salah.

        */
        public function loginPost(Request $request)
        {
                $email = $request->email;
                // var_dump($email);
                $password = $request->password;
                $data = Asprak::where('email', $email)->first();
                // var_dump($data);
                //apakah email tersebut ada atau tidak
                if (Hash::check($password, $data->password)) {
                        // Session::put('id', $data->id);
                        Session::put('nim', $data->nim);
                        Session::put('name', $data->name);
                        Session::put('email', $data->email);
                        Session::put('login', TRUE);
                        return redirect('asprak');
                } else {
                        return redirect('login')->with('alert', 'Invalid email or passwordd!');
                }
        }

        /* Function: Logout

        Keluar dari Akun Pengguna.

        Returns:

        Tampilan dialihkan ke Halaman Login dan Pengguna sudah Keluar dari Akun nya.

        */
        public function logout()
        {
                Session::flush();
                return redirect('login')->with('alert', 'Log out Succes');
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */

        /* Function: Store

        Untuk melakukan Registrasi Akun.

        Parameters:

        $request - Nilai input pengguna saat Registrasi (Nim, Nama, Email, Password).

        Returns:

        Menambahkan Akun baru ke dalam Database Asprak dan dapat digunakan pada saat login.

        */
        public function store(Request $request)
        {
                $this->validate($request, [
                        'nim' => 'required|max:10',
                        'name' => 'required|min:4',
                        'email' => 'required|min:4|email|unique:aspraks',
                        'password' => 'required',
                        'password_confirmation' => 'required|same:password',
                ]);

                Asprak::insert($request);
                return redirect('login')->with('alert-success', 'Register succes');
        }

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */

        /* Function: Show

        Untuk menempilkan User.

        Parameters:

        $id - ID Pengguna berdasarkan Database Asprak.

        Returns:

        Menampilkan Nama User.

        */
        public function show($id)
        {
                $user = Asprak::find($id);
                return view('auth.profile', compact('user'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */

        public function edit($id)
        {
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
        }

        /* Function: TestTulis

        Untuk melakukan Tes Tulis bagi Asprak.

        Returns:

        Menampilkan Halaman Tes Tulis.

        */
        public function testTulis()
        {
                return view('pages.testTulis');
        }

        /* Function: DaftarAsprak

        Untuk melakukan Pendaftaran Asprak.

        Returns:

        Menampilkan Halaman Pendaftaran Asprak.

        */
        public function daftarAsprak()
        {
                // $asprak = Asprak::find($id);
                if (Session::has('nim')) {

                        return view('pages.daftarAsprak');
                } else {
                        return redirect('login')->with('alert', 'Please log in first');
                }
        }

        /* Function: Dashboard

        Untuk menampilkan Dashboard ASprak.

        Returns:

        Menampilkan Halaman Dashboard milik Asprak.

        */
        public function dashboard()
        {
                $nim = Session::get('nim');
                // var_dump($nim);
                $dataP = Pendaftaran::where('nim', $nim)->first();
                //var_dump($dataP);
                if ($dataP) {
                        Session::put('nimPendaftar', $dataP->nim);
                        return view('pages.dashboard', ['dataP' => $dataP]);
                } else {
                        $data = Asprak::where('nim', $nim)->first();
                        return view('pages.dashboard', ['data' => $data]);
                }
        }
}
