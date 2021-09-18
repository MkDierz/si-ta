<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembimbing extends Model
{
    use HasFactory;
    protected $fillable = [
        'NIP',
        'nama',
        'j_kelamin',
        'HP',
        'foto'
    ];
}
