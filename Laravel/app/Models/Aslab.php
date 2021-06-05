<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Aslab extends Authenticatable
{
        use Notifiable;
        protected $table = 'aslabs';
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
                'nim', 'name', 'email', 'password', 'jurusan', 'angkatan', 'kelas', 'kode'
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
                return $request->aslab();
        }
        /**
         * Function to add new user
         * 
         * @return void
         */
        public static function insert(Request $request)
        {
                Aslab::create([
                        'nim' => $request->nim,
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => bcrypt($request->password),
                        'jurusan' => $request->jurusan,
                        'angkatan' => $request->angkatan,
                        'kelas' => $request->kelas,
                        'kode' => NULL,
                ]);
        }
        public static function updateProfile(Request $request, $nim)
        {
                DB::table('aslabs')
                        ->where('nim', $nim)
                        ->update([
                                'nim' => $request->nim,
                                'name' => $request->name,
                                'email' => $request->email,
                                'jurusan' => $request->jurusan,
                                'angkatan' => $request->angkatan,
                                'kelas' => $request->kelas,

                        ]);
                DB::table('soals')
                        ->where('nimPembuat', $nim)
                        ->update([
                                'nimPembuat' => $request->nim,
                        ]);
        }
}
