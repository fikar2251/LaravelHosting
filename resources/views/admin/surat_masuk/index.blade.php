@extends('layouts.app')
@section('title', 'Surat Masuk List')
@push('bread')
<li class="breadcrumb-item active">Surat Masuk</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-info">Back</a>
                <a href="{{ route('admin.surat_masuk.create') }}" class="btn btn-sm btn-primary">Create New</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Asal</th>
                                <th>Nomor</th>
                                <th>Ringkas</th>
                                <th>Index</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>File</th>
                                <th>Klasifikasi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($surat_masuks as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->asal }}</td>
                                <td><a href="{{ route('admin.surat_masuk.show', $data->id) }}">{{ $data->nomor }}</a></td>
                                <td>{{ $data->ringkas }}</td>
                                <td>{{ $data->index }}</td>
                                <td>{{ $data->tanggal }}</td>
                                <td>{{ $data->keterangan }}</td>
                                <td><a href="{{ asset('storage/'.$data->file) }}" class="btn btn-sm btn-purple">File</a></td>
                                <td><a href="{{ route('admin.klasifikasi.edit', $data->klasifikasi_id) }}">{{ $data->klasifikasi->nama }}</a></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.disposisi.show', $data->id) }}" class="btn btn-sm btn-success">DISP</a>
                                        <a href="{{ route('admin.surat_masuk.show', $data->id) }}" class="btn btn-sm btn-info">Show</a>
                                        <a href="{{ route('admin.surat_masuk.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('admin.surat_masuk.destroy', $data->id) }}" method="post">
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