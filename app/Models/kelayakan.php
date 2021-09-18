<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelayakan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_mahasiswa',
        'tgl_daftar',
        'status_kelayakan',
        'ket',
    ];
}
