@extends('adminlte::page')

@section('title', 'Detail User')

@section('content_header')
    <h1>Detail User</h1>
@stop

@section('content')
    <div class="container ml-0">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-header">
                        <h3 class="text-capitalize float-left">
                            {{ $mahasiswa->nama_mhs }}
                        </h3>
                        <div class="float-right">
                            <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST">

                                <a class="btn btn-primary" href="{{ route('mahasiswa.edit', $mahasiswa->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Nama user</th>
                                    <td>:</td>
                                    <td>{{ $mahasiswa->nama_mhs }}</td>
                                </tr>
                                <tr>
                                    <th>NIM user</th>
                                    <td>:</td>
                                    <td>{{ $mahasiswa->NIM }}</td>
                                </tr>
                                <tr>
                                    <th>Judul TA</th>
                                    <td>:</td>
                                    <td>{{ $mahasiswa->judul_ta }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col ">
                <div class="card">
                    <div class="card-body">
                        <picture>
                            <source srcset="{{ asset('uploads/'.$mahasiswa->foto) }}" type="image/svg+xml">
                            <img src="{{ asset('uploads/'.$mahasiswa->foto) }}" class="img-fluid img-thumbnail" alt="...">
                          </picture>
                        <img class="img-responsive max-w-50" src="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
