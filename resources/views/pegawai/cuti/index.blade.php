@extends('layouts.app')
@section('title', 'Pengajuan Cuti')
@push('bread')
<li class="breadcrumb-item"><a href="{{ route('pegawai.profile.index') }}">Pegawai</a></li>
<li class="breadcrumb-item active">Pengajuan Cuti</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('pegawai.cuti.create') }}" class="btn btn-primary">Pengajuan Cuti</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>No</th>
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
                                <td>{{ Carbon\Carbon::parse($data->tanggal_mulai)->format('d F Y') }}</td>
                                <td>{{ Carbon\Carbon::parse($data->tanggal_akhir)->format('d F Y') }}</td>
                                <td>{{ Carbon\Carbon::parse($data->tanggal_mulai)->diff($data->tanggal_akhir)->d }} Hari</td>
                                <td>{{ $data->kategori_cuti->nama }}</td>
                                <td>{{ $data->keterangan }}</td>
                                <td>{{ $data->status }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('pegawai.cuti.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('pegawai.cuti.destroy', $data->id) }}" method="post">
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
@push('pegawai.script')
<script>
    $('#datatable').DataTable()
    $('.delete_confirm').click(function(event) {
        let form = $(this).closest("form");
        event.preventDefault();
        Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            })
            .then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
    });
</script>
@endpush