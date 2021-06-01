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
            // var_dump($nim);
            $data = Aslab::where('nim', $nim)->first();
            return view('pages.dashboardAslab', ['data' => $data]);
        }
    }

    public function login()
    {
        return view('auth.login-aslab');
    }

    public function register()
    {
        return view('auth.register-aslab');
    }

    public function loginPost(Request $request)
    {
        //       {
        $email = $request->email;
        // var_dump($email);
        $password = $request->password;
        $data = Aslab::where('email', $email)->first();
        // var_dump($data);
        //apakah email tersebut ada atau tidak
        if ($data && Hash::check($password, $data->password)) {
            // Session::put('id', $data->id);
            Session::put('nim', $data->nim);
            Session::put('name', $data->name);
            Session::put('email', $data->email);
            Session::put('login', TRUE);
            return redirect('aslab');
        } else {
            return redirect()->route('loginAslab')->with('alert', 'Invalid email or password!');
        }
    }


    // public function logout()
    // {
    //     Session::flush();
    //     return redirect('login')->with('alert', 'Log out Succes');
    // }

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

    public function listAsprak()
    {
        if (Session::has('nim')) {

            $list_asprak = Asprak::all();
            return view('pages.listAsprak', compact('list_asprak'));
        } else {
            return redirect()->route('loginAslab')->with('alert', 'Please log in first');
        }
    }

    public function listPendaftar()
    {
        if (Session::has('nim')) {
            $data['test'] = DB::table('tests')
                ->join('pendaftarans', 'tests.id_pendaftaran', '=', 'pendaftarans.id_pendaftaran')
                // ->select('users.*', 'contacts.phone', 'orders.price')
                ->get();
            $data['soals'] = Soal::all();
            return view('pages.listPendaftar')->with($data);
        } else {
            return redirect()->route('loginAslab')->with('alert', 'Please log in first');
        }
    }

    public function viewHasilAkhir()
    {
        if (Session::has('nim')) {
            $data['test'] = DB::table('tests')
                ->join('pendaftarans', 'tests.id_pendaftaran', '=', 'pendaftarans.id_pendaftaran')
                ->join('hasils', 'tests.id_test', '=', 'hasils.id_test')
                // ->select('users.*', 'contacts.phone', 'orders.price')
                ->get();
            return view('pages.viewResult')->with($data);
        } else {
            return redirect()->route('loginAslab')->with('alert', 'Please log in first');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('loginAslab')->with('alert', 'Log out Succes');
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
    {
        //
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
        return redirect('aslab');
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
        return redirect()->route('listPendaftar');
    }

    public function editDataPendaftaran($id)
    {
        // $asprak = Pendaftaran::findOrFail($id);
        $asprak = Pendaftaran::findOrFail($id);
        // $asprak = DB::table('pendaftarans')
        //     ->join('aspraks', 'pendaftarans.nimPendaftar', '=', 'aspraks.nim')->where('id_pendaftaran', $nim->id_pendaftaran)->first();
        return view('pages.editDataPendaftaran', ['asprak' => $asprak]);
    }

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
        // var_dump($edit_pendaftaran->berkas);
        // var_dump($request->get('berkas'));
        // if ($request->get('berkas') == null) {
        //     $edit_pendaftaran->berkas =  $edit_pendaftaran->berkas;
        // } else {
        //     $edit_pendaftaran->berkas = $request->get('berkas')->store(
        //         'assets/product',
        //         'public'
        //     );

        // }

        // $add_pendaftaran->id_test = NULL;
        $edit_pendaftaran->save();
        // $add_pendaftaran->id_pendaftaran = "pendaftaran_" . $add_pendaftaran->id;
        // $add_pendaftaran->save();

        $edit_test = Test::findOrFail($id);
        $edit_test->id_soal = $request->get('id_soal');
        // $edit_test->id_pendaftaran = $request->get('name');
        // $edit_test->id_test = $request->get('name');
        $edit_test->save();

        return redirect()->route('listPendaftar')->with('status', 'Data Berhasil diUpdate');
    }

    public function setSoalAsprak(Request $request, $id)
    {
        $soal = Test::findOrFail($id);
        $soal->id_soal = $request->get('id_soal');
        $soal->save();
        return redirect()->route('listPendaftar')->with('status', 'Soal Berhasil di Set');
    }

    public function viewJawabanAsprak($id_test)
    {
        $jawabanTest = DB::table('tests')
            ->join('pendaftarans', 'tests.id_pendaftaran', '=', 'pendaftarans.id_pendaftaran')
            ->join('soals', 'tests.id_soal', '=', 'soals.id_soal')
            ->where('tests.id_test', '=', $id_test)
            // ->select('users.*', 'contacts.phone', 'orders.price')
            ->first();
        return view('pages.viewJawaban')->with('jawabanTest', $jawabanTest);
    }

    // public function dashboard()
    // {
    //     $nim = Session::get('nim');
    //     // var_dump($nim);
    //     $data = Aslab::where('nim', $nim)->first();
    //     return view('pages.dashboardAslab', ['data' => $data]);
    // }
}
