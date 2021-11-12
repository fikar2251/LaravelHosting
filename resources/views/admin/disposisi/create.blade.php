@extends('layouts.app')
@section('title', 'Disposisi Surat Masuk Create')
@push('bread')
<li class="breadcrumb-item"><a href="{{ route('admin.surat_masuk.index') }}">Surat Masuk</a></li>
<li class="breadcrumb-item"><a href="{{ route('admin.disposisi.show',$surat_masuk->id) }}">Disposisi Surat Masuk</a></li>
<li class="breadcrumb-item active">Create</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between">
                <a href="{{ route('admin.disposisi.show',$surat_masuk->id) }} " class="btn btn-sm btn-info">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.disposisi.store') }}" method="post" id="form" enctype="multipart/form-data">
                    @csrf
                    @include('admin.disposisi.form')
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