<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

class Aslab extends Authenticatable
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
                ]);
        }
}