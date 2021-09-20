<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kehadiran;
use App\Models\Mahasiswa as Mhs;
use App\Models\kelayakan;
use Illuminate\Support\Facades\Auth;

class Mahasiswa extends Controller
{
    public function index()
    {
        $kehadiran = Kehadiran::where('id_mahasiswa', Auth::user()->nim_nip)->get();
        $kelayakan = kelayakan::where('id_mahasiswa', Auth::user()->nim_nip)->get();
        // dd($kelayakan);
        return view('mhs.index', compact('kehadiran', 'kelayakan'));
    }

    public function kehadiran()
    {
        return view('mhs.kehadiran');
    }

    public function kehadiran_save(Request $request)
    {
        foreach ($request->except('_token') as $data => $value) {
            $valids[$data] = "required";
        }
        $request->validate($valids);
        $nim = Auth::user()->nim_nip;
        $id_mahasiswa = Mhs::where('NIM', $nim)->get('id')->toArray()[0]['id'];
        $request['id_mahasiswa'] = $id_mahasiswa;
        Kehadiran::create($request->all());
        return redirect()->route('mhs');
    }

    public function kelayakan_save()
    {
        $data = [
            'id_mahasiswa' => Mhs::where('NIM', Auth::user()->nim_nip)->get('id')->toArray()[0]['id'],
            'tgl_daftar' => date('Y-m-d')
        ];
        Kelayakan::create($data);
        return redirect()->route('mhs');
    }
}
