@extends('layouts.app')
@section('title', 'Surat Keluar List')
@push('bread')
<li class="breadcrumb-item active">Surat Keluar</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-info">Back</a>
                <a href="{{ route('admin.surat_keluar.create') }}" class="btn btn-sm btn-primary">Create New</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>tujuan</th>
                                <th>nomor</th>
                                <th>ringkas</th>
                                <th>tanggal</th>
                                <th>keterangan</th>
                                <th>file</th>
                                <th>klasifikasi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($surat_keluars as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <th>{{ $data->tujuan }}</th>
                                <th>{{ $data->nomor }}</th>
                                <th>{{ $data->ringkas }}</th>
                                <th>{{ $data->tanggal }}</th>
                                <th>{{ $data->keterangan }}</th>
                                <td><a href="{{ asset('storage/'.$data->file) }}" class="btn btn-sm btn-purple">File</a></td>
                                <td><a href="{{ route('admin.klasifikasi.edit', $data->klasifikasi_id) }}">{{ $data->klasifikasi->nama }}</a></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.surat_keluar.show', $data->id) }}" class="btn btn-sm btn-info">Show</a>
                                        <a href="{{ route('admin.surat_keluar.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('admin.surat_keluar.destroy', $data->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger delete_confirm" type="submit">Destroy</button>
                                        </form>
                                    </div>
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
    $('.delete_confirm').click(function(event) {
        let form = $(this).closest("form");
        event.preventDefault();
        swal({
                title: `Are you sure you want to delete this record?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>
@endpush