<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Pembimbing;
use Illuminate\Support\Facades\Hash;

class ManajemenUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all('id','name','nim_nip','email','role');
        // dd($data);
        return view('admin.M_user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $_n = User::get('nim_nip')->toArray();
        $n = Array();
        foreach ($_n as $i => $v) {
            array_push($n, $v['nim_nip']);
        }

        $data = Array();
        $mhs = Mahasiswa::get('NIM')->whereNotIn('NIM',$n)->toArray();
        foreach ($mhs as $i => $v) {
            array_push($data, $v['NIM']);
        }
        $pbb = Pembimbing::get('NIP')->whereNotIn('NIP',$n);
        foreach ($pbb as $i => $v) {
            array_push($data, $v['NIP']);
        }
        return view('admin.M_user.create', compact('data'));
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
            $valids[$data] = "required";
        }
        $request->validate($valids);
        $request['password'] = Hash::make($request->password);

        try {
            $nama = Mahasiswa::where('NIM', $request->nim_nip)->get('nama_mhs')->first()->nama_mhs;
        } catch (\Throwable $th) {
            $nama = Pembimbing::where('NIP', $request->nim_nip)->get('nama')->first()->nama;
        }
        $request['name'] = $nama;
        User::create($request->all());

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // dd($user);
        return view('admin.M_user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.M_user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        foreach ($request->except('_token') as $data => $value) {
            $valids[$data] = "required";
        }
        $request->validate($valids);
        $request['password'] = Hash::make($request->password);
        $user->update($request->all());

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }
}
