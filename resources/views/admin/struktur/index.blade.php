@extends('layouts.app')
@section('title', 'Struktur Organisasi List')
@push('bread')
<li class="breadcrumb-item active">Struktur Organisasi</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-info">Back</a>
                <a href="{{ route('admin.struktur.create') }}" class="btn btn-sm btn-primary">Create New</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Parent</th>
                                <th>Child</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($strukturs as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td>
                                    <ul>
                                        @foreach($data->child_struktur as $list)
                                        <li>{{ $list->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.struktur.show', $data->id) }}" class="btn btn-sm btn-info">Show</a>
                                        <a href="{{ route('admin.struktur.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('admin.struktur.destroy', $data->id) }}" method="post">
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
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3>Struktur Organisasi</h3>
            </div>
            <div class="card-body">
                <ul id="tree1">
                    <li>
                        <a class="text-warning">{{ $parent->name }}</a>
                        <ol>
                            @foreach($parent->pegawai as $pa)
                            <li><a href="{{ route('admin.pegawai.show',$pa->id) }}"><strong class="text-danger">{{ $pa->nama }}</strong></a></li>
                            @endforeach
                        </ol>
                        <ul>
                            @foreach($parent->child_struktur as $data)
                            <li>
                                <a class="text-success">{{ $data->name }}</a>
                                <ol>
                                    @foreach($data->pegawai as $pb)
                                    <li><a href="{{ route('admin.pegawai.show',$pb->id) }}"><strong class="text-danger">{{ $pb->nama }}</strong></a></li>
                                    @endforeach
                                </ol>
                                @foreach(\App\Models\ParentStruktur::where('name',$data->name)->get() as $child)
                                <ul>
                                    @foreach($child->child_struktur as $list)
                                    <li>
                                        <a class="text-purple">{{ $list->name }}</a>
                                        <ol>
                                            @foreach($list->pegawai as $pc)
                                            <li><a href="{{ route('admin.pegawai.show',$pc->id) }}"><strong class="text-danger">{{ $pc->nama }}</strong></a></li>
                                            @endforeach
                                        </ol>
                                        <ul>
                                            @foreach(\App\Models\ParentStruktur::where('name',$list->name)->get() as $option)
                                            <ul>
                                                @foreach($option->child_struktur as $value)
                                                <li>
                                                    <a class="text-info">{{ $value->name }}</a>
                                                    <ol>
                                                        @foreach($value->pegawai as $pd)
                                                        <li><a href="{{ route('admin.pegawai.show',$pd->id) }}"><strong class="text-danger">{{ $pd->nama }}</strong></a></li>
                                                        @endforeach
                                                    </ol>
                                                    <ul>
                                                        @foreach(\App\Models\ParentStruktur::where('name',$value->name)->get() as $lol)
                                                        <ul>
                                                            @foreach($lol->child_struktur as $sad)
                                                            <li>
                                                                <a class="text-inverse">{{ $sad->name }}</a>
                                                                <ol>
                                                                    @foreach($sad->pegawai as $pe)
                                                                    <li><a href="{{ route('admin.pegawai.show',$pe->id) }}"><strong class="text-danger">{{ $pe->nama }}</strong></a></li>
                                                                    @endforeach
                                                                </ol>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                @endforeach
                                            </ul>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                                @endforeach
                            </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@stop
@push('admin.head')
<!-- treeview -->
<link href="{{ asset('assets/plugins/treeview/treeview.css') }}" rel="stylesheet" type="text/css" />
@endpush
@push('admin.script')
<!-- Treeview js -->
<script src="{{ asset('assets/plugins/treeview/treeview.js') }}"></script>
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