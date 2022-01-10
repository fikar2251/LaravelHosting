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
                <a href="{{ route('admin.rapat.index') }}" class="btn btn-sm btn-info">Back</a>
                <a href="{{ route('admin.rapat.create') }}" class="btn btn-sm btn-primary">Create New</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.rapat.filter') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="date" class="form-control @error('start') is-invalid @enderror" name="start">
                                @error('start')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="date" class="form-control @error('end') is-invalid @enderror" name="end">
                                @error('end')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-success btn-block">Submit</button>
                        </div>
                    </div>
                </form>
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
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script>
    $('#datatable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'print',
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL'
            }
        ]
    })
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