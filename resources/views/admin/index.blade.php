@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Admin Dashboard</h1>
@stop
@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/buttons.dataTables.min.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $user->count() }}</h3>
                    <p>Jumlah User</p>
                </div>
                <div class="icon">
                    <i class="far fa-chart-bar"></i>
                </div>
                <a href="{{ route('user.index') }}" class="small-box-footer">
                    More info
                    <i class="fas fa-arrow-circle-right">
                    </i>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $mhs->count() }}</h3>
                    <p>Jumlah Mahasiswa Aktif</p>
                </div>
                <div class="icon">
                    <i class="far fa-chart-bar"></i>
                </div>
                <a href="{{ route('mahasiswa.index') }}" class="small-box-footer">
                    More info
                    <i class="fas fa-arrow-circle-right">
                    </i>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $pbb->count() }}</h3>
                    <p>Jumlah Dosen Pembimbing</p>
                </div>
                <div class="icon">
                    <i class="far fa-chart-bar"></i>
                </div>
                <a href="{{ route('dosen.index') }}" class="small-box-footer">
                    More info
                    <i class="fas fa-arrow-circle-right">
                    </i>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3>Data Konsul</h3>
                </div>
                <div class="card-body">
                    <table id="data" class="table table-bordered table-hover dataTable dtr-inline" role="grid">
                        <thead>
                            <tr role="row">
                                <th style="width:40px;">No.</th>
                                <th>Tanggal</th>
                                <th>Nama Mahasiswa</th>
                                <th>Nama Pembimbing</th>
                                <th>Kemajuan</th>
                                <th>Konsultasi</th>
                                <th>File</th>
                                <th>Catatan Pembimbing</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($konsul as $i => $a)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>
                                        {{ $a['hari'] }}, {{ $a['tgl'] }} {{ $a['waktuhadir']}} -
                                        {{ $a['waktupulang'] }}
                                    </td>
                                    <td>{{ optional($mhs->firstwhere('id', $a->id_mahasiswa))->nama_mhs }}</td>
                                    <td>{{ optional($pbb->firstwhere('id', optional($mhs->firstwhere('id', $a->id_mahasiswa))->id_pbb))->nama }}</td>
                                    <td>{{ $a['kemajuan'] }}</td>
                                    <td>{{ $a['konsultasi'] }}</td>
                                    <td>{{ $a['file'] }}</td>
                                    <td>{{ $a['catatan_ppb'] ?? 'belum ada catatan pembimbing' }}</td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3>Data Pendaftaran Kelayakan</h3>
                </div>
                <div class="card-body">
                    <table id="data1" class="table table-bordered table-hover dataTable dtr-inline" role="grid">
                        <thead>
                            <tr role="row">
                                <th style="width:40px;">No.</th>
                                <th>Nama Mahasiswa</th>
                                <th>Nama Pembimbing</th>
                                <th>Tanggal Daftar</th>
                                <th>status kelayakan</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelayakan as $i => $a)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $mhs->where('id', $a->id)->first()->nama_mhs }}</td>
                                    <td>{{ $pbb->where('id', $mhs->where('id', $a->id)->first()->id_pbb)->first()->nama }}</td>
                                    <td>{{ $a->tgl_daftar }}</td>
                                    <td>{{ $a->status_kelayakan }}</td>
                                    <td>{{ $a->ket }}</td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#data').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'print'
                ]
            });
            $('#data1').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'print'
                ]
            });
        });
    </script>
    <script src="{{ asset('assets/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.buttons.min.js') }}"></script>
@stop
