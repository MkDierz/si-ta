<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembimbing;

class DataDosen extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pembimbing::all();
        return view('admin.D_dosen.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.D_dosen.create');
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

        $name = $request->NIP . '-' . $request->nama;

        if ($file = $request->file('foto')) {
            $destinationPath = 'uploads/';
            $filename = $name . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $input['foto'] = "$filename";
        }

        Pembimbing::create($input);

        return redirect()->route('dosen.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pembimbing = Pembimbing::find($id);
        return view('admin.D_dosen.show', compact('pembimbing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembimbing = Pembimbing::find($id);
        return view('admin.D_dosen.edit', compact('pembimbing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        foreach ($request->except('_token') as $data => $value) {
            $valids[$data] = "required";
        }
        $request->validate($valids);


        $input = $request->all();
        unset($input['_token']);
        unset($input['_method']);

        $name = $request->NIP . '-' . $request->nama;

        if ($file = $request->file('foto')) {
            $destinationPath = 'uploads/';
            $filename = $name . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $input['foto'] = "$filename";
        } else {
            unset($input['foto']);
        }

        Pembimbing::where('id', $id)->update($input);

        return redirect()->route('dosen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pembimbing::where('id', $id)->delete();
        return redirect()->route('dosen.index');
    }
}
