<?php

namespace App\Http\Controllers;


use App\Models\Aslab;
use App\Models\Soal;
use App\Models\Asprak;
use App\Models\Pendaftaran;
use App\Models\Test;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AslabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Session::get('login')) {
            return redirect('loginAslab')->with('alert', 'Please log in or register first');
        } else {
            $nim = Session::get('nim');
            $data = Aslab::where('nim', $nim)->first();
            return view('pages.dashboardAslab', ['data' => $data]);
        }
    }

    /* Function: Login

        Mengarahkan pengguna ke Halaman Login.

        Returns:

        Tampilan dialihkan ke halaman Login.
    */
    public function login()
    {
        return view('auth.login-aslab');
    }

    /* Function: Register

        Mengarahkan pengguna ke Halaman Register.

        Returns:

        Tampilan dialihkan ke halaman Register.
    */
    public function register()
    {
        return view('auth.register-aslab');
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
        $data = Aslab::where('email', $email)->first();
        if ($data && Hash::check($password, $data->password)) {
            Session::put('nim', $data->nim);
            Session::put('name', $data->name);
            Session::put('email', $data->email);
            Session::put('login', TRUE);
            return redirect('aslab')->with('toast_success', 'Login Successfully!');
        } else {
            return redirect()->route('loginAslab')->with('alert', 'Invalid email or password!');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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

        Aslab::insert($request);
        return redirect()->route('loginAslab')->with('alert-success', 'Register succes');
    }

    /* Function: ListAsprak

        Melakukan Query untuk menampilkan Daftar Asprak.
        
        Returns:

        Menampilkan list/daftar Asprak ke dalam Table.
    */
    public function listAsprak()
    {
        if (Session::has('nim')) {

            $list_asprak = Asprak::all();
            return view('pages.listAsprak', compact('list_asprak'));
        } else {
            return redirect()->route('loginAslab')->with('alert', 'Please log in first');
        }
    }

    /* Function: ListAPendaftar

        Melakukan Query untuk menampilkan Daftar Asprak yang telah mendaftar.
        
        Returns:

        Menampilkan list/daftar Pendaftaran Asprak ke dalam Table.
    */
    public function listPendaftar()
    {
        if (Session::has('nim')) {
            $data['test'] = DB::table('tests')
                ->join('pendaftarans', 'tests.id_pendaftaran', '=', 'pendaftarans.id_pendaftaran')
                ->get();
            $data['soals'] = Soal::all();
            return view('pages.listPendaftar')->with($data);
        } else {
            return redirect()->route('loginAslab')->with('alert', 'Please log in first');
        }
    }

    /* Function: ViewHasilAkhir

        Melakukan Query untuk menampilkan Hasil Seleksi pendaftaran Asprak.
        
        Returns:

        Menampilkan Hasil Akhir.
    */
    public function viewHasilAkhir()
    {
        if (Session::has('nim')) {
            $data['test'] = DB::table('tests')
                ->join('pendaftarans', 'tests.id_pendaftaran', '=', 'pendaftarans.id_pendaftaran')
                ->join('hasils', 'tests.id_test', '=', 'hasils.id_test')
                ->get();
            return view('pages.viewResult')->with($data);
        } else {
            return redirect()->route('loginAslab')->with('alert', 'Please log in first');
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
        return redirect()->route('loginAslab')->with('alert', 'Log out Succes');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
    {
        if (Session::has('nim')) {
            $data = Aslab::where('nim', $nim)->first();
            return view('pages.editProfileAslab', ['data' => $data]);
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
    public function update(Request $request, $nim)
    {
        Aslab::updateProfile($request, $nim);
        $request->session()->forget(['name', 'nim', 'nimPendaftar', 'email']);
        Session::put('nim', $request->nim);
        Session::put('name', $request->name);
        Session::put('email', $request->email);
        Session::put('nimPendaftar', $request->nim);
        return redirect('aslab')->with('success','Profile berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pendaftar = Pendaftaran::findOrFail($id);
        $pendaftar->delete();
        return redirect()->route('listPendaftar')->with('success', 'Data Deleted Permanently!');
    }

    /* Function: EditDataPendaftaran

        Melakukan Perubahan terhadap data pendaftaran.

        Parameters:

        $id - Nomor Induk Mahasiswa/ID pengguna.
        
        Returns:

        Menampilkan halaman edit pendaftaran.
    */
    public function editDataPendaftaran($id)
    {
        $asprak = Pendaftaran::findOrFail($id);
        return view('pages.editDataPendaftaran', ['asprak' => $asprak]);
    }

    /* Function: PostUpdate

        Melakukan Query untuk menampilkan Daftar Asprak.

        Parameters:

        $request - Menyimpan nama, nim, pilihan praktikum dan berkas.
        $id - Nomor Induk Mahasiswa/ID pengguna.
        
        Returns:

        Kembali ke halaman Pendaftar dan memberi notifikasi perubahan berhasil.
    */
    public function postUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'min:4',
            'nim' => 'max:10',
            'pilihan_praktikum' => 'min:3',
            'berkas' => 'mimes:png,jpg,jpeg,pdf|max:2048',
        ]);

        $edit_pendaftaran = Pendaftaran::findOrFail($id);
        $edit_pendaftaran->name = $request->get('name');
        $edit_pendaftaran->nimPendaftar = $request->get('nim');
        $edit_pendaftaran->pilihan_praktikum = $request->get('pilihan_praktikum');
        $edit_pendaftaran->save();

        $edit_test = Test::findOrFail($id);
        $edit_test->id_soal = $request->get('id_soal');
        $edit_test->save();

        return redirect()->route('listPendaftar')->with('success', 'Data Berhasil diupdate');
    }

    /* Function: SetSoalAsprak

        Menentukan Soal Tes untuk Asprak.

        Parameters:

        $request - Menyimpan ID Soal.
        $id - ID soal yang dicari.
        
        Returns:

        Menampilkan halaman Pendaftar dan memberi notifikasi soal berhasil di set.
    */
    public function setSoalAsprak(Request $request, $id)
    {
        $soal = Test::findOrFail($id);
        $soal->id_soal = $request->get('id_soal');
        $soal->save();
        return redirect()->route('listPendaftar')->with('success', 'Soal Berhasil di Set');
    }

    /* Function: ViewJawabanAsprak

        Melakukan Query untuk menampilkan Jawaban Tes dari Asprak.

        Parameters:

        $id_test - Nomor ID Test.
        
        Returns:

        Menampilkan Halaman Soal dan Jawaban asprak.
    */
    public function viewJawabanAsprak($id_test)
    {
        $jawabanTest = DB::table('tests')
            ->join('pendaftarans', 'tests.id_pendaftaran', '=', 'pendaftarans.id_pendaftaran')
            ->join('soals', 'tests.id_soal', '=', 'soals.id_soal')
            ->where('tests.id_test', '=', $id_test)
            ->first();
        return view('pages.viewJawaban')->with('jawabanTest', $jawabanTest);
    }
}
