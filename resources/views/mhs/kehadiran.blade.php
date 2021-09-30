@extends('adminlte::page')

@section('title', 'Kehadiran')

@section('content_header')
    <h1>Entry Kehadiran dan Konsultasi</h1>
@stop

@section('plugins.TempusDominusBs4', true)
@section('plugins.BsCustomFileInput', true)

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{ route('post.kehadiran') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group w-50">
                    {{-- Placeholder, time only and prepend icon --}}
                    @php
                        $config = ['format' => 'YYYY-MM-DD'];
                    @endphp
                    <x-adminlte-input-date name="tgl" :config="$config" igroup-size="sm" label="Tanggal">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-calendar"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-date>
                    @php
                        $config = ['format' => 'dddd'];
                    @endphp
                    <x-adminlte-input-date name="hari" :config="$config" igroup-size="sm" label="Hari">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-calendar"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-date>

                    @php
                        $config = ['format' => 'hh:mm:ss'];
                    @endphp
                    <x-adminlte-input-date name="waktuhadir" :config="$config" igroup-size="sm" label="Waktu Hadir">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-calendar"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-date>

                    @php
                        $config = ['format' => 'hh:mm:ss'];
                    @endphp
                    <x-adminlte-input-date name="waktupulang" :config="$config" igroup-size="sm" label="Waktu Pulang">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-calendar"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-date>

                    <x-adminlte-textarea name="kemajuan" label="Kemajuan" rows=5 igroup-size="sm">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-lg fa-file-alt"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-textarea>

                    <x-adminlte-textarea name="konsultasi" label="Konsultasi" rows=5 igroup-size="sm">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-lg fa-file-alt"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-textarea>

                    <x-adminlte-input-file name="file" igroup-size="sm" placeholder="Choose a file..." label="File revisi" accept="application/msword, application/pdf">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
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
