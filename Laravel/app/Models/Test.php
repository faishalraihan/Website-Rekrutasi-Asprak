<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class Test extends Model
{
    protected $table = 'tests';

    protected $fillable = [
        'id_test', 'id_soal', 'id_pendaftaran', 'jawaban', 'status'
    ];
}
