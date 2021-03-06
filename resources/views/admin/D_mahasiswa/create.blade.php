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

            <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group w-50">
                    <x-adminlte-select2 name="id_pbb" igroup-size="sm" label="Nama Pembimbing" data-placeholder="Select an option...">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-lightblue">
                                <i class="fas fa-car-side"></i>
                            </div>
                        </x-slot>
                        @foreach ($data as $i => $d )
                        <option value="{{$d->id}}">{{$d->nama}}</option>
                        @endforeach
                    </x-adminlte-select2>

                    <x-adminlte-input name="NIM" value="" type="text" label="NIM" igroup-size="sm">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-lightblue">
                                <i class="fas fa-user"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                    <x-adminlte-input name="nama_mhs" value="" type="text" label="Nama Mahasiswa" igroup-size="sm">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-lightblue">
                                <i class="fas fa-user"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                    <x-adminlte-input name="thn_masuk" value="" type="text" label="Tahun Masuk" igroup-size="sm">
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

                    <x-adminlte-input name="judul_ta" value="" type="text" label="Judul Tugas Akhir" igroup-size="sm">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-lightblue">
                                <i class="fas fa-user"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                    <x-adminlte-input name="status" value="" type="text" label="Status" igroup-size="sm">
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
