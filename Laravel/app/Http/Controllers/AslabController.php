<?php

namespace App\Http\Controllers;


use App\Models\Aslab;
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
            return redirect('login')->with('alert', 'Please log in or register first');
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
        if (Hash::check($password, $data->password)) {
            // Session::put('id', $data->id);
            Session::put('nim', $data->nim);
            Session::put('name', $data->name);
            Session::put('email', $data->email);
            Session::put('login', TRUE);
            return redirect('aslab');
        } else {
            return redirect('login-aslab')->with('alert', 'Invalid email or passwordd!');
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
        return redirect('login')->with('alert-success', 'Register succes');
    }

    public function listAsprak()
    {
        $list_asprak = Aslab::all();
        return view('pages.listAsprak', compact('list_asprak'));
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function dashboard()
    // {
    //     $nim = Session::get('nim');
    //     // var_dump($nim);
    //     $data = Aslab::where('nim', $nim)->first();
    //     return view('pages.dashboardAslab', ['data' => $data]);
    // }
}
