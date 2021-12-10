@extends('layouts.app')
@section('title', 'Disposisi Keluar List')
@push('bread')
<li class="breadcrumb-item active">Disposisi Keluar</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-info">Back</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nomor Surat</th>
                                <th>Pengirim</th>
                                <th>Tanggal Surat Masuk</th>
                                <th>Tanggal Disposisi</th>
                                <th>Admin</th>
                                <th>Disposisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($disposisi as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="{{ route('admin.surat_masuk.show', $data->id) }}">{{ $data->nomor }}</a></td>
                                <td>{{ $data->asal }}</td>
                                <td>{{ $data->tanggal }}</td>
                                <td>{{ Carbon\Carbon::parse($data->disposisi->first()->created_at)->format('Y-m-d') }}</td>
                                <td>admin</td>
                                <td>
                                    <ul class="list-group list-group-horizontal">
                                        @foreach($data->disposisi as $row)
                                        <li class="list-group-item">{{ $row->pegawai->nama }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@push('admin.script')
<script>
    $('#datatable').DataTable()
</script>
@endpush