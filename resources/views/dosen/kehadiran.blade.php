@extends('adminlte::page')

@section('title', 'Approval Kelayakan')

@section('content_header')
    <h1>Konsultasi</h1>
@stop

@section('plugins.Select2', true)

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table p-2 w-auto">
                <tbody>
                    <tr>
                        <th scope="row" style="width:150px">Nama Mahasiswa</th>
                        <td style="width:10px">:</td>
                        <td>{{ $mhs->nama_mhs }}</td>
                    </tr>
                    <tr>
                        <th scope="row">NIM</th>
                        <td>:</td>
                        <td>{{ $mhs->NIM }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Judul Tugas Akhir</th>
                        <td>:</td>
                        <td>{{ $mhs->judul_ta }}</td>
                    </tr>
                </tbody>
            </table>
            <table class="table w-auto" >
                <tbody>
                    <tr>
                        <th scope="row" style="width:200px">Kemajuan</th>
                        <td style="width:10px">:</td>
                        <td>{{ $data->kemajuan }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width:150px">Tanggal dan Waktu</th>
                        <td style="width:10px">:</td>
                        <td>{{ $data->tgl }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Konsultasi</th>
                        <td>:</td>
                        <td>{{ $data->konsultasi }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Catatan Pembimbing</th>
                        <td>:</td>
                        <td style="width:700px">
                            <form action="{{ route('konsultasi.store', $data->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group w-50">
                                    <x-adminlte-textarea name="catatan_ppb" rows=5 igroup-size="sm"
                                        placeholder="Insert description...">
                                        {{ $data->catatan_ppb }}
                                    </x-adminlte-textarea>
                                    <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success"
                                        icon="fas fa-lg fa-save" />
                                </div>
                            </form>
                        </td>
                    </tr>

                </tbody>
            </table>

        </div>
        <!-- /.card-body -->
    </div>
@stop
