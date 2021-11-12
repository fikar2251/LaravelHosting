@extends('layouts.app')
@section('title', 'Informasi List')
@push('bread')
<li class="breadcrumb-item active">Informasi</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-info">Back</a>
                <a href="{{ route('admin.informasi.create') }}" class="btn btn-sm btn-primary">Create New</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Isi</th>
                                <th>Kategori Artikel</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($informasis as $data)
                            <tr>
                                <td><img src="{{ asset('storage/'.$data->foto) }}" class="main-img-user avatar-lg mg-sm-r-20 mg-b-20 mg-sm-b-0" alt=""></td>
                                <td>
                                    <p class="text-purple">{{ $data->judul }}</p>
                                    <p>{{ Carbon\Carbon::parse($data->tanggal)->format('d M Y') }}</p>
                                    <p>{{ \Str::limit($data->isi,25) }}</p>
                                </td>
                                <td><a href="{{ asset('storage/'.$data->file) }}" class="btn btn-sm btn-purple">File</a></td>
                                <td>{{ $data->kategori_artikel->deskripsi }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.informasi.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('admin.informasi.destroy', $data->id) }}" method="post">
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