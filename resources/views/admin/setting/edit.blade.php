@extends('layouts.app')
@section('title', 'Setting Edit')
@push('bread')
<li class="breadcrumb-item"><a href="{{ route('admin.setting.index') }}">Setting</a></li>
<li class="breadcrumb-item active">Edit</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between">
                <a href="{{ route('admin.setting.index') }} " class="btn btn-sm btn-info">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.setting.update', $setting->id) }}" method="post" id="form" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @include('admin.setting.form')
                </form>
            </div>
            <div class="card-footer d-flex flex-row justify-content-end">
                <button class="btn btn-sm btn-success" id="store">Update</button>
            </div>
        </div>
    </div>
</div>
@stop
@push('admin.head')
<!-- file Uploads -->
<link href="{{ asset('assets/plugins/fileuploads/css/fileuploads.css') }}" rel="stylesheet" type="text/css" />

<!-- File Uploads css -->
<link href="{{ asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
@endpush
@push('admin.script')
<!-- file uploads js -->
<script src="{{ asset('assets/plugins/fileuploads/js/fileuploads.js') }}"></script>
<script src="{{ asset('assets/plugins/fileuploads/js/fileuploads-demo.js') }}"></script>

<!--File-Uploads Js-->
<script src="{{ asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
<script src="{{ asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
<script src="{{ asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
<script src="{{ asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
<script src="{{ asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
<script>
    $('#store').on('click', function() {
        $('#form').submit()
    });
</script>
@endpush