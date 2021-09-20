@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex">
        <div class="float">
            <h1>Manajemen User</h1>
        </div>
        <div class="ml-auto float-end">
            <a class="btn btn-primary" href="{{ route('user.create') }}">Buat User</a>
        </div>
    </div>
@stop
@section('plugins.DatatablesPlugin', true)
@section('plugins.Datatables', true)
@php
$columns = ['Nama', 'NIM/NIP', 'Email', 'Role', 'action'];
@endphp
@section('content')
    <div class="card">
        <div class="card-body">
            <table id="data" class="table table-bordered table-hover dataTable dtr-inline" role="grid">
                <thead>
                    <tr role="row">
                        <th>No.</th>
                        @foreach ($columns as $col)
                            <th>{{ $col }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $i => $a)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $a['name'] }}</td>
                            <td>{{ $a['nim_nip'] }}</td>
                            <td>{{ $a['email'] }}</td>
                            <td>{{ $a['role'] }}</td>
                            <td style="width: 40px">
                                <nobr>
                                    <form action="{{ route('user.destroy', $a->id) }}" method="POST">

                                        <a class="btn btn-xs btn-default text-teal mx-1 shadow" href="{{ route('user.show', $a->id) }}">
                                            <i class="fa fa-lg fa-fw fa-eye"></i>
                                        </a>

                                        <a class="btn btn-xs btn-default text-primary mx-1 shadow" href="{{ route('user.edit', $a->id) }}">
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
    </script>
@stop
