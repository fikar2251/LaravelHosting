@extends('layouts.app')
@section('title', 'Kenaikan Berkala List')
@push('bread')
<li class="breadcrumb-item active">Kenaikan Berkala</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-info">Back</a>
                <a href="{{ route('admin.kenaikan_berkala.create') }}" class="btn btn-sm btn-primary">Create New</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <td>Kode</td>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Tanggal Generate</th>
                                <th>Tanggal Kenaikan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kenaikan_berkalas as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->kode }}</td>
                                <td><a href="{{ route('admin.pegawai.show',$data->pegawai_id) }}">{{ $data->pegawai->nip }}</a></td>
                                <td>{{ $data->pegawai->nama }}</td>
                                <td>{{ $data->tanggal_generate }}</td>
                                <td>{{ $data->tanggal_kenaikan }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.kenaikan_berkala.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('admin.kenaikan_berkala.destroy', $data->id) }}" method="post">
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
          let form =  $(this).closest("form");
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