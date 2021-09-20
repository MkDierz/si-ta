<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Gate;
use App\Models\Pembimbing;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'nim_nip'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function adminlte_image()
    {
        $url = 'uploads/';
        if (Gate::allows('admin')) {
            return 'https://picsum.photos/300/300';
        }
        if (Gate::allows('pembimbing')) {
            $foto = Pembimbing::where('NIP', Auth::user()->nim_nip)->first('foto')['foto'];
            return asset($url.$foto);
        }
        if (Gate::allows('mahasiswa')) {
            $foto = Mahasiswa::where('NIM', Auth::user()->nim_nip)->first('foto')['foto'];
            return asset($url.$foto);
        }

    }
}
