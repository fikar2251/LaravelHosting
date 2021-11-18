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
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>No.</th>
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
                            @foreach($cutis as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->pegawai->nama }}</td>
                                <td>{{ Carbon\Carbon::parse($data->tanggal_mulai)->format('d F Y') }}</td>
                                <td>{{ Carbon\Carbon::parse($data->tanggal_akhir)->format('d F Y') }}</td>
                                <td>{{ Carbon\Carbon::parse($data->tanggal_mulai)->diff($data->tanggal_akhir)->d }} Hari</td>
                                <td>{{ $data->kategori_cuti->nama }}</td>
                                <td>{{ $data->keterangan }}</td>
                                <td>{{ $data->status }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.cuti.edit', $data->id) }}" class="btn btn-sm btn-success">Show</a>
                                        <form action="{{ route('admin.cuti.destroy', $data->id) }}" method="post">
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