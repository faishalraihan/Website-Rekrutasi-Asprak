<?php

namespace App\Http\Controllers;


use App\Models\Asprak;
use App\Models\Pendaftaran;
use App\Models\Test;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AsprakController extends Controller
{
        /* Function: Index

        Mengarahkan pengguna ke Halaman Utama.

        Returns:

        Tampilan dialihkan ke halaman utama.
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

        /* Function: register

        Mengarahkan pengguna ke Halaman register.

        Returns:

        Tampilan dialihkan ke halaman register.
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

        Apabila Email dan Password yang dimasukkan benar maka pengguna akan dialihkan ke Halaman Aslab, Jika tidak maka akan menampilkan bahwa inputan salah.
        */
        public function loginPost(Request $request)
        {
                $email = $request->email;
                $password = $request->password;
                $data = Asprak::where('email', $email)->first();
                if ($data && Hash::check($password, $data->password)) {
                        Session::put('nim', $data->nim);
                        Session::put('name', $data->name);
                        Session::put('email', $data->email);
                        Session::put('login', TRUE);
                        return redirect('asprak')->with('toast_success', 'Login Successfully!');
                } else {
                        return redirect('login')->with('alert', 'Invalid email or password!');
                }
        }
        /* Function: Logout

        Untuk Logout.
        
        Returns:

        Kembali ke halaman Login.
        */
        public function logout()
        {
                Session::flush();
                return redirect('login')->with('alert-success', 'Log out Succes');
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

        /* Function: store

        Untuk melakukan penyimpanan data yang diinput user ke database
        
        Returns:

        mengalihkan ke halaman login dan menampilkan pesan sukses.
        */
        public function store(Request $request)
        {
                $this->validate($request, [
                        'nim' => 'required|max:10',
                        'name' => 'required|min:4',
                        'email' => 'required|min:4|email|unique:aspraks',
                        'password' => 'required',
                        'password_confirmation' => 'required|same:password',
                        'jurusan' => 'required|min:4',
                        'angkatan' => 'required|min:4',
                        'kelas' => 'required|min:4',
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
        /* Function: show

        Untuk menampilkan profile asprak.
        
        Returns:

        Kembali ke halaman profile.
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
        /* Function: edit

        menampilkan halaman edit profil
        
        Returns:

        Kembali ke halaman edit profil.
        */
        public function edit($nim)
        {
                if (Session::has('nim')) {
                        $data = Asprak::where('nim', $nim)->first();
                        return view('pages.editProfile', ['data' => $data]);
                } else {
                        return redirect('login')->with('alert', 'Login First');
                }
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        /* Function: update

        Untuk melakukan update terhadap data sesuai dengan nim dan mengubahnya di database.
        
        Returns:

        Kembali ke halaman dashboard.
    */
        public function update(Request $request, $nim)
        {
                Asprak::updateProfile($request, $nim);
                $request->session()->forget(['name', 'nim', 'nimPendaftar', 'email']);
                Session::put('nim', $request->nim);
                Session::put('name', $request->name);
                Session::put('email', $request->email);
                Session::put('nimPendaftar', $request->nim);
                return redirect()->action(
                        'AsprakController@dashboard'
                );
        }
        /* Function: testTulis

        Untuk menampilkan halaman test tulis.
        
        Returns:

        Kembali ke halaman tes tulis.
        */
        public function testTulis($id_test)
        {
                if (!Session::get('login')) {
                        return redirect('login')->with('alert', 'Please log in or register first');
                } else {
                        $nim = Session::get('nim');
                        $data['session'] = Asprak::where('nim', $nim)->first();
                        $data['pendaftaran'] = Pendaftaran::where('nimPendaftar', $nim)->first();
                        $data['id_test'] = Pendaftaran::where('id_test', $id_test)->first();
                        return view('pages.testTulis', compact('data'));
                }
        }

        /* Function: submitJawabanTest

        Untuk melakukan submit jawaban ke database.
        
        Returns:

        Kembali ke halaman dashboar dan menampikan status.
        */
        public function submitJawabanTest(Request $request, $id_test)
        {
                $test = Test::findOrFail($id_test);
                $test->jawaban = $request->get('jawaban');
                $test->status = true;
                $test->save();
                return redirect()->route('dashboard')->with('status', 'Test berhasil dilakasnakan, Tunggu pengumumanya yaaa!');
        }

        /* Function: daftarAsprak

        Untuk menampilkan halaman daftar asprak.
        
        Returns:

        Kembali ke halaman daftar asprak jika sudah login atau ke halaman login jika belum melakukan login.
        */
        public function daftarAsprak()
        {
                if (Session::has('nim')) {

                        return view('pages.daftarAsprak');
                } else {
                        return redirect('login')->with('alert', 'Please log in first');
                }
        }

        /* Function: dashboard

        Untuk menampilkan halaman dashhboard.
        
        Returns:

        Kembali ke halaman dashboard.
        */
        public function dashboard()
        {

                $nim = Session::get('nim');
                $data['dataP'] = DB::table('pendaftarans')
                        ->join('aspraks', 'pendaftarans.nimPendaftar', '=', 'aspraks.nim')->where('nimPendaftar', $nim)->first();
                $data['dataT'] = DB::table('pendaftarans')
                        ->join('tests', 'pendaftarans.id_pendaftaran', '=', 'tests.id_pendaftaran')->where('nimPendaftar', $nim)
                        ->select('pendaftarans.*', 'tests.*')
                        ->get();
                $data['dataH'] = DB::table('hasils')
                        ->join('pendaftarans', 'hasils.id_pendaftaran', '=', 'pendaftarans.id_pendaftaran')->where('pendaftarans.nimPendaftar', $nim)
                        ->select('hasils.*', 'pendaftarans.*')
                        ->get();
                if ($data['dataP']) {
                        Session::put('nimPendaftar', $data['dataP']->nim);
                        return view('pages.dashboard')->with($data);
                } else {
                        $data['data'] = Asprak::where('nim', $nim)->first();
                        return view('pages.dashboard')->with($data);
                }
        }
}
