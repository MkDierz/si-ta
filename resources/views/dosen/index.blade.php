@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop
@php
$columns = [
    [
        'No.',
        'Nama',
        'NIM',
        'Judul',
        'Status'
    ],
    [
        'Nama Mahasiswa',
        'Tanggal Daftar',
        'Jam Hadir',
        'Kemajuan',
        'Konsultasi',
        'Catatan Pembimbing',
        'Action'
    ],
    [
        'Nama Mahasiswa',
        'Tanggal Daftar',
        'Status Kelayakan',
        'Keterangan',
        'Action',
    ]
];
function searchForId($id, $array)
{
    foreach ($array as $key => $val) {
        if ($val['id'] === $id) {
            return $val['nama_mhs'];
        }
    }
    return null;
}
@endphp

@section('content')
    <div class="col">
        <div class="row">
            <div class="card w-100">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="float">
                            <h4>List Mahasiswa Bimbingan</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="data" class="table table-bordered table-hover dataTable dtr-inline" role="grid">
                        <thead>
                            <tr role="row">
                                @foreach ($columns[0] as $col)
                                    <th>{{ $col }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mhs as $i => $a)
                                <tr>
                                    <td style="width: 10px">{{ $i + 1 }}</td>
                                    <td>{{ $a['nama_mhs'] }}</td>
                                    <td>{{ $a['NIM'] }}</td>
                                    <td>{{ $a['judul_ta'] }}</td>
                                    <td>{{ $a['status'] }}</td>
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card w-100">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="float">
                            <h4>Data Konsultasi</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="data1" class="table table-bordered table-hover dataTable dtr-inline" role="grid">
                        <thead>
                            <tr role="row">
                                @foreach ($columns[1] as $col)
                                    <th>{{ $col }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($konsul as $i => $a)
                                <tr>
                                    <td>{{ searchForId($a['id_mahasiswa'], $mhs) }}</td>
                                    <td>{{ $a['tgl'] . ', ' . $a['hari'] }}</td>
                                    <td>{{ $a['waktuhadir'] . ' - ' . $a['waktupulang'] }}</td>
                                    <td>{{ $a['kemajuan'] }}</td>
                                    <td>{{ $a['konsultasi'] }}</td>
                                    <td>{{ $a['catatan_ppb'] }}</td>
                                    <nobr>
                                        <td>
                                            <a class="btn btn-xs btn-default text-primary mx-1 shadow"
                                                href="{{ route('konsultasi.show', $a->id) }}">
                                                <i class="fa fa-lg fa-fw fa-eye"></i>
                                            </a>
                                        </td>
                                    </nobr>
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card w-100">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="float">
                            <h4>Permohonan Konsultasi</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="data1" class="table table-bordered table-hover dataTable dtr-inline" role="grid">
                        <thead>
                            <tr role="row">
                                @foreach ($columns[2] as $col)
                                    <th>{{ $col }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelayakan as $i => $a)
                            <tr>
                                <td>{{ searchForId($a['id_mahasiswa'], $mhs) }}</td>
                                <td>{{ $a['tgl_daftar'] }}</td>
                                <td>{{ $a['status_kelayakan'] }}</td>
                                <td>{{ $a['ket'] }}</td>
                                <td>
                                    <nobr>
                                        <a class="btn btn-xs btn-default text-primary mx-1"
                                        href="{{ route('kelayakan.show', $a->id) }}">
                                        <i class="fa fa-lg fa-fw fa-eye"></i>
                                    </a>
                                    </nobr>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop


@section('js')
    <script>
        $(function() {
            $('#data').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });
        });
        $(function() {
            $('#data1').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });
        });
    </script>
@stop
