@php
$config = ['format' => 'YYYY-MM-DD'];
@endphp

@extends('adminlte::page')

@section('title', 'Edit Mahasiswa')

@section('content_header')
    <h1>Edit Mahasiswa</h1>
@stop

@section('plugins.Select2', true)

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{ route('dosen.update', $pembimbing->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group w-50">

                    <x-adminlte-input name="NIP" value="{{$pembimbing->NIP}}" type="text" label="NIP" igroup-size="sm">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-lightblue">
                                <i class="fas fa-user"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                    <x-adminlte-input name="nama" value="{{$pembimbing->nama}}" type="text" label="Nama Dosen" igroup-size="sm">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-lightblue">
                                <i class="fas fa-user"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                    <x-adminlte-input name="j_kelamin" value="{{$pembimbing->j_kelamin}}" type="text" label="Jenis kelamin" igroup-size="sm">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-lightblue">
                                <i class="fas fa-user"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                    <x-adminlte-input name="HP" value="{{$pembimbing->HP}}" type="text" label="Nomor HP" igroup-size="sm">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-lightblue">
                                <i class="fas fa-user"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                    <x-adminlte-input-file name="foto" igroup-size="sm" placeholder="Choose a file..."  accept="image/*"
                        label="Foto">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-lightblue">
                                <i class="fas fa-upload"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-file>

                    <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success"
                        icon="fas fa-lg fa-save" />

                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@stop
