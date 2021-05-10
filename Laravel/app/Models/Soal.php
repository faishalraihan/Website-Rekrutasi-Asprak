<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{

    protected $table = 'soals';

    protected $fillable = [
        'soal', 'kunciJawaban', 'nimPembuat', 'matkul', 'id_soal'
    ];
}
