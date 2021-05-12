<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

class Asprak extends Authenticatable
{
        use Notifiable;

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
                'nim', 'name', 'email', 'password',
        ];

        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        protected $hidden = [
                'password', 'remember_token',
        ];

        /**
         * The attributes that should be cast to native types.
         *
         * @var array
         */
        //     protected $casts = [
        //         'email_verified_at' => 'datetime',
        //     ];
        public function AuthRouteAPI(Request $request)
        {
                return $request->asprak();
        }
        /**
         * Function to add new user
         * 
         * @return void
         */
        public static function insert(Request $request)
        {
                Asprak::create([
                        'nim' => $request->nim,
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => bcrypt($request->password),
                ]);
        }
        public static function updateProfile(Request $request, $nim)
        {
                Asprak::where('nim', $nim)
                        ->update([
                                'nim' => $request['nim'],
                                'name' => $request['name'],
                                'email' => $request['email'],
                                'jurusan' => $request['jurusan'],
                                'angkatan' => $request['angkatan'],
                                'kelas' => $request['kelas'],
                        ]);
                Pendaftaran::where('nim', $nim)
                        ->update([
                                'nim' => $request['nim'],
                                'name' => $request['name'],
                                'email' => $request['email'],
                        ]);
        }


        // /** RELATIONSIHPS */
        // public function pendaftaran()
        // {
        //         return $this->hasMany('App\Models\Pendaftaran', 'nim');
        // }
}
