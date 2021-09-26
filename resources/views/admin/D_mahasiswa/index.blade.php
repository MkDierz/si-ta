@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex">
        <div class="float">
            <h1>Manajemen Mahasiswa</h1>
        </div>
        <div class="ml-auto float-end">
            <a class="btn btn-primary" href="{{ route('mahasiswa.create') }}">Tambah Mahasiswa</a>
        </div>
    </div>
@stop
@section('plugins.DatatablesPlugin', true)
@section('plugins.Datatables', true)
@php
$columns = ['No.', 'Nama', 'NIM', 'Judul', 'Status', 'Action'];
@endphp
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/buttons.dataTables.min.css') }}">
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <table id="data" class="table table-bordered table-hover dataTable dtr-inline" role="grid">
                <thead>
                    <tr role="row">
                        @foreach ($columns as $col)
                            <th>{{ $col }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $i => $a)
                        <tr>
                            <td style="width: 10px">{{ $i + 1 }}</td>
                            <td>{{ $a['nama_mhs'] }}</td>
                            <td>{{ $a['NIM'] }}</td>
                            <td>{{ $a['judul_ta'] }}</td>
                            <td>{{ $a['status'] }}</td>
                            <td style="width: 40px">
                                <nobr>
                                    <form action="{{ route('mahasiswa.destroy', $a->id) }}" method="POST">

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
                                    </form>
                                </nobr>
                            </td>
                        </tr>
                    @endforeach
            </table>
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
