<?php

namespace App\Http\Controllers;


use App\Models\Asprak;
use App\Models\Aslab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AsprakController extends Controller
{
        public function index()
        {
                if (!Session::get('login')) {
                        return redirect('login')->with('alert', 'Please log in or register first');
                } else {
                        return view('homepage');
                }
        }

        public function login()
        {
                return view('auth.login');
        }

        public function register()
        {
                return view('auth.register');
        }

        public function loginPost(Request $request)
        {
                $email = $request->email;
                // var_dump($email);
                $password = $request->password;
                $data = Asprak::where('email', $email)->first();
                // var_dump($data);
                if ($data) { //apakah email tersebut ada atau tidak
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
                } else if ($data == null) {
                        $data = Aslab::where('email', $email)->first();
                        if ($data) {
                                if ($password == $data->password) {
                                        Session::put('nim', $data->nim);
                                        Session::put('name', $data->name);
                                        Session::put('email', $data->email);
                                        Session::put('login', TRUE);
                                        return redirect('asprak');
                                } else {
                                        return redirect('login')->with('alert', 'Invalid email or passwordd!');
                                }
                        }
                } else {
                        return redirect('login')->with('alert', 'Invalid email or passworde!');
                }
        }

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
        public function store(Request $request)
        {
                $this->validate($request, [
                        'nim' => 'required|min:10',
                        'name' => 'required|min:4',
                        'email' => 'required|min:4|email|unique:users',
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
        public function test()
        {
                return view('homepage');
        }
}
