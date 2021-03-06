<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Pendaftaran extends Model
{
        protected $table = 'pendaftarans';

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
                'email', 'name', 'nimPendaftar', 'pilihan_praktikum', 'berkas', 'id_pendaftaran', 'id_test'
        ];

        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        protected $hidden = [
                'remember_token',
        ];


        /**
         * Function to add new user
         * 
         * @return void
         */

        // public static function insert(Request $request)
        // {
        //         Pendaftaran::create([
        //                 'email' => $request->email,
        //                 'name' => $request->name,
        //                 'nim' => $request->nim,
        //                 'jurusan' => $request->jurusan,
        //                 'angkatan' => $request->angkatan,
        //                 'kelas' => $request->kelas,
        //                 'pilihan_praktikum' => $request->pilihan_praktikum,
        //                 'berkas' => $request->berkas
        //                 // 'email' => $request['email'],
        //                 // 'name' => $request['name'],
        //                 // 'nim' => $request['nim'],
        //                 // 'jurusan' => $request['jurusan'],
        //                 // 'angkatan' => $request['angkatan'],
        //                 // 'kelas' => $request['kelas'],
        //                 // 'pilihan_praktikum' => $request['pilihan_praktikum'],
        //                 // 'berkas' => $request['berkas']
        //         ]);
        // }


        // public function asprak()
        // {
        //         return $this->belongsTo('App\Models\Asprak', 'nim');
        // }
}
