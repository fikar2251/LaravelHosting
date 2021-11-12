@extends('layouts.app')
@section('title', 'Backup Database List')
@push('bread')
<li class="breadcrumb-item active">Backup Database</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-info">Back</a>
                <a href="{{ route('admin.backup.export') }}" class="btn btn-sm btn-info">Backup</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-group">
                            @foreach($logs as $log)
                            <li class="list-group-item @if($log->id == $last_id) active @endif">
                                @if($log->id == $last_id)
                                <h5>Last Back Up</h5>
                                @endif
                                <strong>{{ $log->user->name }} - {{ $log->title }}</strong>
                                <p>{{ $log->description }}</p>
                                <p>{{ Carbon\Carbon::parse($log->datetime)->format('d F Y H:i:s') }} - {{ Carbon\Carbon::parse($log->datetime)->diffForHumans() }}</p>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-center">
                {{ $logs->links() }}
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