@extends('layouts.app')

@section('content')
<!-- Main-signin-wrapper -->
<div class="main-signin-wrapper">
    <div class="row text-center pl-0 pr-0 ml-0 mr-0">
        <div class="col-lg-3 d-block mx-auto">
            <div class="card">
                <div class="card-body">
                    @if(App\Models\Setting::first())
                    <img src="{{ asset('storage/'.App\Models\Setting::first()->logo_pegawai) }}" class="mb-3" alt="Logo">
                    @else
                    <img src="{{ asset('assets/img/brand/icon-1.png') }}" class="mb-3" alt="">
                    @endif
                    <h4>Please sign in to continue</h4>
                    <form method="post" action="{{ route('login') }}" class="text-left mt-3">
                        @csrf
                        <div class="form-group">
                            <label>Email</label> <input class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter your email" type="text">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label> <input class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter your password" type="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div><button class="btn btn-main-primary btn-block">Sign In</button>
                    </form>
                    <div class="main-signin-footer mg-t-5">
                        <p><a href="">Forgot password?</a></p>
                        <p>Don't have an account? <a href="page-signup.html">Create an Account</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main-signin-wrapper -->
@endsection