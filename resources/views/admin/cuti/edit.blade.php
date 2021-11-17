@extends('layouts.app')
@section('title', 'Cuti List')
@push('bread')
<li class="breadcrumb-item active">Cuti</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-info">Back</a>
                <a href="{{ route('admin.cuti.create') }}" class="btn btn-sm btn-primary">Create New</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>Pegawai</th>
                                <th>Tanggal Awal</th>
                                <th>Tanggal Akhir</th>
                                <th>Jumlah Cuti</th>
                                <th>Kategori Cuti</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $cuti->pegawai->nama }}</td>
                                <td>{{ Carbon\Carbon::parse($cuti->tanggal_mulai)->format('d F Y') }}</td>
                                <td>{{ Carbon\Carbon::parse($cuti->tanggal_akhir)->format('d F Y') }}</td>
                                <td>{{ Carbon\Carbon::parse($cuti->tanggal_mulai)->diff($cuti->tanggal_akhir)->d }} Hari</td>
                                <td>{{ $cuti->kategori_cuti->nama }}</td>
                                <td>{{ $cuti->keterangan }}</td>
                                <td>{{ $cuti->status }}</td>
                                <td>
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
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop