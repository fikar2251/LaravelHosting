@extends('layouts.app')
@section('title', 'Setting')
@push('bread')
<li class="breadcrumb-item active">Setting</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-3 col-sm-12">
        <a href="{{ route('admin.role.index') }}">
            <div class="card card-body tx-white bg-primary bd-0">
                <h1 class="display-2"><i class="ti-panel"></i></h1>
                <h1>Role</h1>
            </div>
        </a>
    </div>
    <div class="col-md-3 col-sm-12">
        <a href="{{ route('admin.permission.index') }}">
            <div class="card card-body tx-white bg-orange bd-0">
                <h1 class="display-2"><i class="ti-flag-alt-2"></i></h1>
                <h1>Permission</h1>
            </div>
        </a>
    </div>
    <div class="col-md-3 col-sm-12">
        <a href="{{ route('admin.user.index') }}">
            <div class="card card-body tx-white bg-green bd-0">
                <h1 class="display-2"><i class="ti-user"></i></h1>
                <h1>User</h1>
            </div>  
        </a>
    </div>
    <div class="col-md-3 col-sm-12">
        <a href="{{ route('admin.setting.show',1) }}">
            <div class="card card-body tx-white bg-info bd-0">
                <h1 class="display-2"><i class="ti-settings"></i></h1>
                <h1>Setting</h1>
            </div>
        </a>
    </div>
</div>
@stop