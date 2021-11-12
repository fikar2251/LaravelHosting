@extends('layouts.app')
@section('title', 'Kategori Informasi Create')
@push('bread')
<li class="breadcrumb-item"><a href="{{ route('admin.kategori_informasi.index') }}">Kategori Informasi</a></li>
<li class="breadcrumb-item active">Create</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between">
                <a href="{{ route('admin.kategori_informasi.index') }} " class="btn btn-sm btn-info">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.kategori_informasi.store') }}" method="post" id="form">
                    @csrf
                    @include('admin.kategori_informasi.form')
                </form>
            </div>
            <div class="card-footer d-flex flex-row justify-content-end">
                <button class="btn btn-sm btn-success" id="store">Store</button>
            </div>
        </div>
    </div>
</div>
@stop
@push('admin.script')
<script>
    $('#store').on('click', function(){
        $('#form').submit()
    });
</script>
@endpush