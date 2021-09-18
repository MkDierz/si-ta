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
                            {{ $user->name }}
                        </h3>
                        <div class="float-right">
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST">

                                <a class="btn btn-primary" href="{{ route('user.edit', $user->id) }}">Edit</a>

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
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th>NIM/NIP user</th>
                                    <td>:</td>
                                    <td>{{ $user->nim_nip }}</td>
                                </tr>
                                <tr>
                                    <th>Role user</th>
                                    <td>:</td>
                                    <td>{{ $user->role }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

        </div>

    </div>
@stop
