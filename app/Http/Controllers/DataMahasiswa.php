<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Pembimbing;

class DataMahasiswa extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Mahasiswa::all();
        return view('admin.D_mahasiswa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Pembimbing::get();
        return view('admin.D_mahasiswa.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->except('_token') as $data => $value) {
            if ($data == 'foto') {
                $valids[$data] = "mimes:jpeg,jpg,png,gif|required|max:10000";
            } else {
                $valids[$data] = "required";
            }
        }
        // dd($valids);
        $request->validate($valids);

        $input = $request->all();

        $name = $request->NIM . '-' . $request->nama_mhs;

        if ($file = $request->file('foto')) {
            $destinationPath = 'uploads/';
            $filename = $name . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $input['foto'] = "$filename";
        }

        Mahasiswa::create($input);

        return redirect()->route('mahasiswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('admin.D_mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('admin.D_mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        foreach ($request->except('_token') as $data => $value) {
            $valids[$data] = "required";
        }
        $request->validate($valids);

        $input = $request->all();

        $name = $request->NIM . '-' . $request->nama_mhs;

        if ($file = $request->file('foto')) {
            $destinationPath = 'uploads/';
            $filename = $name . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $input['foto'] = "$filename";
        } else {
            unset($input['foto']);
        }

        $mahasiswa->update($input);

        return redirect()->route('mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index');
    }
}
