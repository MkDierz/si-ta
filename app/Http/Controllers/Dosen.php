<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Pembimbing;
use App\Models\Kehadiran;
use App\Models\kelayakan;
use Illuminate\Support\Facades\Auth;


class Dosen extends Controller
{
    public function index()
    {
        $dosen_id = Pembimbing::where('NIP', Auth::user()->nim_nip)->get('id')[0]['id'];
        $mhs = Mahasiswa::where('id_pbb', $dosen_id)->get();
        $id_mhs = Mahasiswa::where('id_pbb', $dosen_id)->get('id')->toArray();
        $id_mhs = array_column($id_mhs, 'id');
        $konsul = Kehadiran::whereIn('id_mahasiswa', $id_mhs)->get();
        $kelayakan = kelayakan::whereIn('id_mahasiswa', $id_mhs)->get();
        return view('dosen.index', compact('mhs', 'konsul', 'kelayakan'));
    }

    public function kelayakan($id)
    {
        $data = Kelayakan::where('id', $id)->first();
        return view('dosen.kelayakan', compact('data'));
    }

    public function kelayakan_store(Request $request, $id)
    {
        $request->validate([
            'status_kelayakan' => 'required',
        ]);

        kelayakan::where('id', $id)->update($request->except(['_token','_method']));
        return redirect()->route('dosen');
    }
    public function konsultasi($id)
    {
        $id_mahasiswa = Kehadiran::where('id', $id)->first('id_mahasiswa')['id_mahasiswa'];
        $data = Kehadiran::where('id', $id)->first();
        $mhs = Mahasiswa::where('id_pbb', $data['id_mahasiswa'])->first();
        return view('dosen.kehadiran', compact('data', 'mhs'));
    }
    public function konsultasi_store(Request $request, $id){
        $request->validate([
            'catatan_ppb' => 'required'
        ]);
        Kehadiran::where('id', $id)->update($request->except(['_token','_method']));
        return redirect()->route('konsultasi.show', $id);
    }

}
