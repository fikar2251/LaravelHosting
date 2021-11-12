@extends('layouts.app')
@section('title', 'Beranda')
@push('bread')
<li class="breadcrumb-item active" aria-current="page"><a href="">Dashboard</a></li>
@endpush
@section('content')
    @auth
        @role('admin')
            @include('admin.dashboard')
        @endrole
        @role('pegawai')
            @include('pegawai.dashboard')
        @endrole
    @endauth
@endsection