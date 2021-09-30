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
        $id = Mhs::where('NIM', Auth::user()->nim_nip)->first('id');
        $kehadiran = Kehadiran::where('id_mahasiswa', $id->id)->get();
        $kelayakan = kelayakan::where('id_mahasiswa', $id->id)->get();
        return view('mhs.index', compact('kehadiran', 'kelayakan'));
    }

    public function kehadiran()
    {
        return view('mhs.kehadiran');
    }

    public function kehadiran_save(Request $request)
    {
        foreach ($request->except('_token') as $data => $value) {
            if ($data == 'file') {
                $valids[$data] = "mimes:pdf,doc,docx|required|max:10000";
            } else {
                $valids[$data] = "required";
            }
        }
        $request->validate($valids);

        $input = $request->all();

        $nim = Auth::user()->nim_nip;
        $id_mahasiswa = Mhs::where('NIM', $nim)->get('id')->toArray()[0]['id'];
        $input['id_mahasiswa'] = $id_mahasiswa;

        $name = $nim . '-' . $request->tgl . '' . $request->waktuhadir;
        if ($file = $request->file('file')) {
            $destinationPath = 'uploads/';
            $filename = $name . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $input['file'] = "$filename";
        }
        Kehadiran::create($input);
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
