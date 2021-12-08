@extends('layouts.app')
@section('title', 'Rapat List')
@push('bread')
<li class="breadcrumb-item active">Rapat</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-info">Back</a>
                <a href="{{ route('admin.rapat.create') }}" class="btn btn-sm btn-primary">Create New</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>tanggal</th>
                                <th>mulai</th>
                                <th>selesai</th>
                                <th>tempat</th>
                                <th>agenda</th>
                                <th>pegawai</th>
                                <th>file</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rapats as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->tanggal }}</td>
                                <td>{{ $data->mulai }}</td>
                                <td>{{ $data->selesai }}</td>
                                <td>{{ $data->tempat }}</td>
                                <td>{{ $data->agenda }}</td>
                                <td>
                                    <ul class="list-group list-group-flush">
                                        @foreach($data->peserta_rapat as $pegawai)
                                        <li class="list-group-item">{{ $pegawai->pegawai->nama }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul class="list-group list-group-horizontal-sm">
                                        @foreach($data->file_rapat as $file)
                                        <li class="list-group-item"><a href="{{ asset('storage/'.$file->path) }}" class="btn btn-sm btn-success">File</a></li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.rapat.show', $data->id) }}" class="btn btn-sm btn-info">Show</a>
                                        <a href="{{ route('admin.rapat.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('admin.rapat.destroy', $data->id) }}" method="post">
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