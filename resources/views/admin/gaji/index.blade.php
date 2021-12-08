@extends('layouts.app')
@section('title', 'Gaji List')
@push('bread')
<li class="breadcrumb-item active">Gaji</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-info">Back</a>
                <a href="{{ route('admin.gaji.create') }}" class="btn btn-sm btn-primary">Create</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>no</th>
                                <th>pegawai</th>
                                <th>tanggal</th>
                                <th>gaji_pokok</th>
                                <th>jabatan</th>
                                <th>golongan</th>
                                <th>admin</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($penggajians as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->pegawai->nama }}</td>
                                <td>{{ $data->tanggal }}</td>
                                <td>{{ number_format($data->gaji_pokok) }}</td>
                                <td>{{ $data->jabatan }}</td>
                                <td>{{ $data->golongan }}</td>
                                <td>{{ $data->admin }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.gaji.show',$data->id) }}" class="btn btn-sm btn-info">Rincian</a>
                                        <a href="{{ route('admin.gaji.edit',$data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('admin.gaji.destroy', $data->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger delete_confirm" type="submit">Delete</button>
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