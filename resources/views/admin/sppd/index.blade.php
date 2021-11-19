@extends('layouts.app')
@section('title', 'Sppd List')
@push('bread')
<li class="breadcrumb-item active">Sppd</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-info">Back</a>
                <a href="{{ route('admin.sppd.create') }}" class="btn btn-sm btn-primary">Create New</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>nomor</th>
                                <th>asal</th>
                                <th>tanggal surat</th>
                                <th>tanggal berangkat</th>
                                <th>tanggal kembali</th>
                                <th>pemberi</th>
                                <th>pegawai</th>
                                <th>kategori sppd dan tujuan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sppds as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nomor }}</td>
                                <td>{{ $data->asal }}</td>
                                <td>{{ Carbon\Carbon::parse($data->tanggal_surat)->format('d F Y') }}</td>
                                <td><strong>{{ Carbon\Carbon::parse($data->tanggal_berangkat)->format('d F Y') }}</strong></td>
                                <td><strong>{{ Carbon\Carbon::parse($data->tanggal_kembali)->format('d F Y') }}</strong></td>
                                <td>{{ $data->pemberi }}</td>
                                <td><a href="{{ route('admin.pegawai.show',$data->pegawai->id) }}">{{ $data->pegawai->nama }}</a></td>
                                <th>{{ $data->kategori_sppd->tujuan }} - {{ $data->kategori_sppd->jenis }} </th>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.sppd.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('admin.sppd.destroy', $data->id) }}" method="post">
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