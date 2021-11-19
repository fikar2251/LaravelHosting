@extends('layouts.app')
@section('title', 'Kategori Sppd List')
@push('bread')
<li class="breadcrumb-item active">Kategori Sppd</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-info">Back</a>
                <a href="{{ route('admin.kategori_sppd.create') }}" class="btn btn-sm btn-primary">Create New</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>tujuan</th>
                                <th>jenis</th>
                                <th>harian</th>
                                <th>penginapan</th>
                                <th>transportasi</th>
                                <th>dll</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kategori_sppds as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->tujuan }}</td>
                                <td>{{ $data->jenis }}</td>
                                <td>{{ number_format($data->harian) }}</td>
                                <td>{{ number_format($data->penginapan) }}</td>
                                <td>{{ number_format($data->transportasi) }}</td>
                                <td>{{ number_format($data->dll) }}</td>
                                <td>{{ $data->sppd->count() }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.kategori_sppd.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('admin.kategori_sppd.destroy', $data->id) }}" method="post">
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