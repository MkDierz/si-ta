@php
$config = ['format' => 'YYYY-MM-DD'];
@endphp

@extends('adminlte::page')

@section('title', 'Buat User')

@section('content_header')
    <h1>Buat User</h1>
@stop

@section('plugins.BootstrapSelect', true)

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group w-50">

                    <x-adminlte-select2 name="role" igroup-size="sm" label="role" data-placeholder="Select an option...">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-lightblue">
                                <i class="fas fa-car-side"></i>
                            </div>
                        </x-slot>
                        <x-adminlte-options
                            :options="['admin'=>'admin', 'pembimbing'=>'pembimbing', 'mahasiswa'=>'mahasiswa']" />
                    </x-adminlte-select2>

                    <x-adminlte-select2 name="nim_nip" igroup-size="sm" label="NIM NIP" data-placeholder="Select an option...">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-lightblue">
                                <i class="fas fa-car-side"></i>
                            </div>
                        </x-slot>
                        @foreach ($data as $d)
                        <option value="{{$d}}">{{$d}}</option>
                        @endforeach
                    </x-adminlte-select2>

                    <x-adminlte-input name="email" value="" type="email" label="Email" igroup-size="sm">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-lightblue">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

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
