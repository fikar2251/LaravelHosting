@extends('layouts.app')
@section('title', 'Disposisi Surat Masuk List')
@push('bread')
<li class="breadcrumb-item"><a href="{{ route('admin.surat_masuk.index') }}">Surat Masuk</a></li>
<li class="breadcrumb-item active">Disposisi Surat Masuk</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between">
                <a href="{{ route('admin.surat_masuk.index') }}" class="btn btn-sm btn-info">Back</a>
                <a href="{{ route('admin.disposisi.create.surat_masuk',$surat_masuk->id) }}" class="btn btn-sm btn-primary">Create New</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tujuan Disposisi</th>
                                <th>Isi</th>
                                <th>Sifat Batas Waktu</th>
                                <th>Pegawai</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($surat_masuk->disposisi as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->tujuan }}</td>
                                <td>{{ $data->isi }}</td>
                                <td>
                                    <span class="badge badge-info">{{ $data->tipe }}</span>
                                    <br>
                                    <span class="badge badge-primary">{{ Carbon\Carbon::parse($data->batas_waktu)->format('d F Y') }}</span>
                                </td>
                                <td><a href="{{ route('admin.pegawai.show',$data->pegawai->id) }}">{{ $data->pegawai->nama }}</a></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.disposisi.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('admin.disposisi.destroy', $data->id) }}" method="post">
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

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Perihal Surat</h3>
                <p><span class="badge badge-success">{{ $surat_masuk->asal }}</span><span class="badge badge-secondary">{{ $surat_masuk->nomor }}</span></p>
                <p>{{ $surat_masuk->ringkas }}</p>
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