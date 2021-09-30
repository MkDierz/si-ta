@extends('adminlte::page')

@section('title', 'Approval Kelayakan')

@section('content_header')
    <h1>Konsultasi</h1>
@stop

@section('plugins.Select2', true)

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table">
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
                            <tr>
                                <th scope="row">Kemajuan</th>
                                <td style="width:10px">:</td>
                                <td>{{ $data->kemajuan }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Tanggal dan Waktu</th>
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
                                <td>
                                    <form action="{{ route('konsultasi.store', $data->id) }}" method="POST" style="width:500px"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group w-50">
                                            <x-adminlte-textarea name="catatan_ppb" rows=5 igroup-size="sm"
                                                placeholder="Insert description...">
                                                {{ $data->catatan_ppb }}
                                            </x-adminlte-textarea>
                                            <x-adminlte-button class="btn-flat" type="submit" label="Submit"
                                                theme="success" icon="fas fa-lg fa-save" />
                                        </div>
                                    </form>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h2 class="font-weight-bold">File</h2>
                </div>
                <div class="card-body">
                    <embed src="{{ asset('/uploads/'. $data->file )}}" style="width:100%; height:700px"
                        frameborder="0">
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@stop
