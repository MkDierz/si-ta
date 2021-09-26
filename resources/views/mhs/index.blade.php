@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop
@php
$columns = [['Tanggal', 'Hari', 'Waktu Hadir', 'Waktu Pulang', 'Kemajuan', 'Konsultasi', 'Catatan Pembimbing'], ['Tanggal Daftar', 'Status Kelayakan', 'keterangan']];
@endphp
@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/buttons.dataTables.min.css') }}">
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="float">
                            <h4>Data Kehadiran</h4>
                        </div>
                        <div class="ml-auto float-end">
                            <a href="{{ route('kehadiran') }}" class="btn btn-default bg-primary">
                                Isi Kehadiran
                            </a>
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
                            @foreach ($kehadiran as $i => $a)
                                <tr>
                                    {{-- <td style="width: 10px">{{ $i + 1 }}</td> --}}
                                    <td>{{ $a['tgl'] }}</td>
                                    <td>{{ $a['hari'] }}</td>
                                    <td>{{ $a['waktuhadir'] }}</td>
                                    <td>{{ $a['waktupulang'] }}</td>
                                    <td>{{ $a['kemajuan'] }}</td>
                                    <td>{{ $a['konsultasi'] }}</td>
                                    <td>{{ $a['catatan_ppb'] }}</td>
                                    <nobr>
                                        {{-- <form action="{{ route('mahasiswa.destroy', $a->id) }}" method="POST">

                                            <a class="btn btn-xs btn-default text-teal mx-1 shadow"
                                                href="{{ route('mahasiswa.show', $a->id) }}">
                                                <i class="fa fa-lg fa-fw fa-eye"></i>
                                            </a>

                                            <a class="btn btn-xs btn-default text-primary mx-1 shadow"
                                                href="{{ route('mahasiswa.edit', $a->id) }}">
                                                <i class="fa fa-lg fa-fw fa-pen"></i>
                                            </a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow">
                                                <i class="fa fa-lg fa-fw fa-trash"></i>
                                            </button>
                                        </form> --}}
                                    </nobr>
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="float">
                            <h4>Histori daftar kelayakan</h4>
                        </div>
                        <div class="ml-auto float-end">
                            <form action="{{ route('post.kelayakan') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-default bg-primary">
                                    Daftar Kelayakan
                                </button>
                            </form>
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
                            @foreach ($kelayakan as $i => $a)
                                <tr>
                                    {{-- <td style="width: 10px">{{ $i + 1 }}</td> --}}
                                    <td>{{ $a['tgl_daftar'] }}</td>
                                    <td>{{ $a['status_kelayakan'] }}</td>
                                    <td>{{ $a['ket'] }}</td>
                                    <nobr>
                                        {{-- <form action="{{ route('mahasiswa.destroy', $a->id) }}" method="POST">

                                            <a class="btn btn-xs btn-default text-teal mx-1 shadow"
                                                href="{{ route('mahasiswa.show', $a->id) }}">
                                                <i class="fa fa-lg fa-fw fa-eye"></i>
                                            </a>

                                            <a class="btn btn-xs btn-default text-primary mx-1 shadow"
                                                href="{{ route('mahasiswa.edit', $a->id) }}">
                                                <i class="fa fa-lg fa-fw fa-pen"></i>
                                            </a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow">
                                                <i class="fa fa-lg fa-fw fa-trash"></i>
                                            </button>
                                        </form> --}}
                                    </nobr>
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop


@section('js')
<script>
    $(document).ready(function() {
        $('#data').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'print'
            ]
        });
        $('#data1').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'print'
            ]
        });
    });
</script>
<script src="{{ asset('assets/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.buttons.min.js') }}"></script>
@stop
