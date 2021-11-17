@extends('layouts.app')
@section('title', 'Pengajuan Cuti Create')
@push('bread')
<li class="breadcrumb-item"><a href="{{ route('pegawai.cuti.index') }}">Pengajuan Cuti</a></li>
<li class="breadcrumb-item active">Create</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <a href="{{ route('pegawai.cuti.index') }} " class="btn btn-sm btn-info">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('pegawai.cuti.store') }}" method="post" id="form">
                    @csrf
                    @include('pegawai.cuti.form')
                </form>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button class="btn btn-sm btn-success" id="store">Store</button>
            </div>
        </div>
    </div>
</div>
@stop
@push('pegawai.script')
<script>
    $('#store').on('click', function(){
        $('#form').submit()
    });
</script>
@endpush