@extends('layouts.app')
@section('title', 'Pegawai Create')
@push('bread')
<li class="breadcrumb-item"><a href="{{ route('admin.pegawai.index') }}">Pegawai</a></li>
<li class="breadcrumb-item active">Create</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between">
                <a href="{{ route('admin.pegawai.index') }} " class="btn btn-sm btn-info">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.pegawai.store') }}" method="post" id="form" enctype="multipart/form-data">
                    @csrf
                    @include('admin.pegawai.form')
                </form>
            </div>
            <div class="card-footer d-flex flex-row justify-content-end">
                <button class="btn btn-sm btn-success" id="store">Store</button>
            </div>
        </div>
    </div>
</div>
@stop
@push('admin.head')
<!-- amazeui.datetimepicker css -->
<link href="{{ asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css') }}" rel="stylesheet">

<!-- jquery.simple-dtpicker css -->
<link href="{{ asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css') }}" rel="stylesheet">
@endpush
@push('admin.script')
<script>
    $('#store').on('click', function(){
        $('#form').submit()
    });
    $('.input-group.fc-datepicker').datepicker({
    format: "dd/mm/yyyy",
    startDate: "01-01-2015",
    endDate: "01-01-2020",
    todayBtn: "linked",
    autoclose: true,
    todayHighlight: true,
    container: '#myModal modal-body'
  });
</script>
<!-- jquery-simple-datetimepicker js -->
<script src="{{ asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>

<!-- Ionicons js -->
<script src="{{ asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
@endpush