<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    use HasFactory;
    protected $fillable =[
        'id_mahasiswa',
        'tgl',
        'hari',
        'waktuhadir',
        'waktupulang',
        'kemajuan',
        'konsultasi',
        'catatan_ppb',
        'file'
    ];
}
