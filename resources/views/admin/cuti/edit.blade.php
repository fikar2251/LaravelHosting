@extends('layouts.app')
@section('title', 'Cuti List')
@push('bread')
<li class="breadcrumb-item"><a href="{{ route('admin.cuti.index') }}">Cuti</a></li>
<li class="breadcrumb-item active">Show</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between">
                <a href="{{ route('admin.cuti.index') }}" class="btn btn-sm btn-info">Back</a>
            </div>
            <div class="card-body">
                <table cellspacing="5" cellpadding="5">
                    <tr>
                        <th>Pegawai</th>
                        <th>:</th>
                        <th>{{ $cuti->pegawai->nama }}</th>
                    </tr>
                    <tr>
                        <th>Tanggal Awal</th>
                        <th>:</th>
                        <th>{{ Carbon\Carbon::parse($cuti->tanggal_mulai)->format('d F Y') }}</th>
                    </tr>
                    <tr>
                        <th>Tanggal Akhir</th>
                        <th>:</th>
                        <th>{{ Carbon\Carbon::parse($cuti->tanggal_akhir)->format('d F Y') }}</th>
                    </tr>
                    <tr>
                        <th>Jumlah Cuti</th>
                        <th>:</th>
                        <th>{{ Carbon\Carbon::parse($cuti->tanggal_mulai)->diff($cuti->tanggal_akhir)->d }} Hari</th>
                    </tr>
                    <tr>
                        <th>Kategori Cuti</th>
                        <th>:</th>
                        <th>{{ $cuti->kategori_cuti->nama }}</th>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <th>:</th>
                        <th>{{ $cuti->keterangan }}</th>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <th>:</th>
                        <th>{{ $cuti->status }}</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h3>Status</h3>
            </div>
            <div class="card-body">
                <div class="btn-group">
                    <form action="{{ route('admin.cuti.update', $cuti->id) }}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="status" value="0">
                        <button class="btn btn-sm btn-info" type="submit">Pending</button>
                    </form>
                    <form action="{{ route('admin.cuti.update', $cuti->id) }}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="status" value="1">
                        <button class="btn btn-sm btn-success" type="submit">Terima</button>
                    </form>
                    <form action="{{ route('admin.cuti.update', $cuti->id) }}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="status" value="2">
                        <button class="btn btn-sm btn-danger" type="submit">Tolak</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop