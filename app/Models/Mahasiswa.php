<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pbb',
        'NIM',
        'nama_mhs',
        'thn_masuk',
        'j_kelamin',
        'HP',
        'judul_ta',
        'status',
        'foto'
    ];
}
