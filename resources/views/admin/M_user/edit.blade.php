@php
$config = ['format' => 'YYYY-MM-DD'];
@endphp

@extends('adminlte::page')

@section('title', 'Edit User')

@section('content_header')
    <h1>Edit User</h1>
@stop

@section('plugins.Select2', true)

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group w-50">
                    <x-adminlte-input name="name" value="{{$user->name}}" type="text" label="Nama" igroup-size="sm">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-lightblue">
                                <i class="fas fa-user"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                    <x-adminlte-input name="email" value="{{$user->email}}" type="email" label="Email" igroup-size="sm">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-lightblue">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                    <x-adminlte-input name="nim_nip" value="{{$user->nim_nip}}" type="text" label="NIM / NIP" igroup-size="sm">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-lightblue">
                                <i class="fas fa-key"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                    <x-adminlte-select2 name="role" igroup-size="sm" label="role"
                        data-placeholder="Select an option...">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-lightblue">
                                <i class="fas fa-car-side"></i>
                            </div>
                        </x-slot>
                        <x-adminlte-options :selected="['{{$user->role}}']" :options="['admin'=>'admin', 'pembimbing'=>'pembimbing', 'mahasiswa'=>'mahasiswa']" />
                    </x-adminlte-select2>

                    <x-adminlte-input name="password" value="" type="password" label="Password" igroup-size="sm">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-lightblue">
                                <i class="fas fa-key"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                    <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success"
                        icon="fas fa-lg fa-save" />

                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@stop
