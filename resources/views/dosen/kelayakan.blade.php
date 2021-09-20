@extends('adminlte::page')

@section('title', 'Approval Kelayakan')

@section('content_header')
    <h1>Approval Kelayakan</h1>
@stop

@section('plugins.Select2', true)

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{ route('kelayakan.store', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group w-50">
                    {{-- With prepend slot, label and data-placeholder config --}}
                    <x-adminlte-select2 name="status_kelayakan" label="Status Kelayakan" igroup-size="sm"
                        data-placeholder="Select an option...">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-check"></i>
                            </div>
                        </x-slot>
                        <option>Layak</option>
                        <option>Belum Layak</option>
                    </x-adminlte-select2>

                    <x-adminlte-textarea name="ket" label="Keterangan" rows=5
                        igroup-size="sm" placeholder="Insert description...">
                        {{$data->ket}}
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-lg fa-file-alt"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-textarea>
                    <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success"
                        icon="fas fa-lg fa-save" />
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@stop
