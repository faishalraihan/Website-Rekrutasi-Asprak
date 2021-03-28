<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
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


        // /** RELATIONSIHPS */
        // public function questions()
        // {
        //         return $this->hasMany('App\Question', 'uploader_id');
        // }
        // public function answers()
        // {
        //         return $this->hasMany('App\Answer', 'uploader_id');
        // }
        // public function questionComments()
        // {
        //         return $this->hasMany('App\QuestionComment', 'uploader_id');
        // }
        // public function answerComments()
        // {
        //         return $this->hasMany('App\AnswerComment', 'uploader_id');
        // }
        // public function questionVotes()
        // {
        //         return $this->hasMany('App\QuestionVote', 'voter_id');
        // }
        // public function answerVotes()
        // {
        //         return $this->hasMany('App\AnswerVote', 'voter_id');
        // }
}
