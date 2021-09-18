@extends('adminlte::page')

@section('title', 'Detail Dosen')

@section('content_header')
    <h1>Detail Dosen</h1>
@stop

@section('content')
    <div class="container ml-0">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-header">
                        <h3 class="text-capitalize float-left">
                            {{ $pembimbing->nama }}
                        </h3>
                        <div class="float-right">
                            <form action="{{ route('dosen.destroy', $pembimbing->id) }}" method="POST">

                                <a class="btn btn-primary" href="{{ route('dosen.edit', $pembimbing->id) }}">Edit</a>

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
                                    <td>{{ $pembimbing->nama_mhs }}</td>
                                </tr>
                                <tr>
                                    <th>NIM user</th>
                                    <td>:</td>
                                    <td>{{ $pembimbing->NIP }}</td>
                                </tr>
                                <tr>
                                    <th>No, HP</th>
                                    <td>:</td>
                                    <td>{{ $pembimbing->judul_ta }}</td>
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
                            <source srcset="{{ asset('uploads/'.$pembimbing->foto) }}" type="image/svg+xml">
                            <img src="{{ asset('uploads/'.$pembimbing->foto) }}" class="img-fluid img-thumbnail" alt="...">
                          </picture>
                        <img class="img-responsive max-w-50" src="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
