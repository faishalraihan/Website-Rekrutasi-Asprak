<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $fillable = [
        'soal', 'kunciJawaban', 'nimPembuat', 'matkul'
    ];
}
