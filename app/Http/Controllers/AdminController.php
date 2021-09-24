<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Pembimbing;
use App\Models\Kehadiran;
use App\Models\kelayakan;

class AdminController extends Controller
{
    public function index() {
        $user = User::get();
        $mhs = Mahasiswa::get()->where('status', 'Aktif');
        $pbb = Pembimbing::get();
        $konsul = Kehadiran::get();
        $kelayakan = kelayakan::get();
        return view('admin.index', compact('user', 'mhs', 'pbb', 'konsul', 'kelayakan'));
    }
}
