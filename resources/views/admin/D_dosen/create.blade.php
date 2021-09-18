@php
$config = ['format' => 'YYYY-MM-DD'];
@endphp

@extends('adminlte::page')

@section('title', 'Buat User')

@section('content_header')
    <h1>Buat User</h1>
@stop

@section('plugins.BootstrapSelect', true)
@section('plugins.BsCustomFileInput', true)

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{ route('dosen.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group w-50">

                    <x-adminlte-input name="NIP" value="" type="text" label="NIP" igroup-size="sm">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-lightblue">
                                <i class="fas fa-user"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                    <x-adminlte-input name="nama" value="" type="text" label="Nama Dosen" igroup-size="sm">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-lightblue">
                                <i class="fas fa-user"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                    <x-adminlte-input name="j_kelamin" value="" type="text" label="Jenis kelamin" igroup-size="sm">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-lightblue">
                                <i class="fas fa-user"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                    <x-adminlte-input name="HP" value="" type="text" label="Nomor HP" igroup-size="sm">
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
