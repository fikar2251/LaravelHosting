@extends('layouts.app')
@section('title', 'Show')
@push('bread')
<li class="breadcrumb-item"><a href="{{ route('admin.surat_keluar.index') }}">Surat Masuk</a></li>
<li class="breadcrumb-item active">Show</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span class="badge badge-warning">{{ $surat_keluar->nomor }}</span>
                <span class="badge badge-success">{{ $surat_keluar->asal }}</span>
            </div>
            <div class="card-body">
                <table cellpadding="5">
                    <tr>
                        <th>Ringkas</th>
                        <th>:</th>
                        <th>{{ $surat_keluar->ringkas }}</th>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <th>:</th>
                        <th>{{ $surat_keluar->keterangan }}</th>
                    </tr>
                    <tr>
                        <th>File</th>
                        <th>:</th>
                        <th><a href="{{ asset('storage/'.$surat_keluar->file) }}" class="btn btn-sm btn-purple">File</a></th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection