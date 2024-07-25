@extends('layout')
@section('title', 'JABATAN PENJARA MALAYSIA')
@section('body')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">

    <!----------------------- Main Container -------------------------->

        <div class="container d-flex justify-content-center align-items-center min-vh-100 ">

    <!----------------------- Login Container -------------------------->

        <div class="row border rounded-5 p-3 bg-white shadow box-area">

    <!--------------------------- Left Box ----------------------------->

        <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background:#1b8659;">
            <div class="featured-image mb-3">
            <img src="{{ asset('picture/penjara_logo.png') }}" class="img-fluid" style="width: 250px;">
            </div>
            <p class="text-white text-center fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">JABATAN PENJARA MALAYSIA</p>
        </div> 

    <!-------------------- ------ Right Box ---------------------------->
        
        <div class="col-md-6 right-box">
            <div class="row align-items-center">
                <div class="header-text mb-4">
                        <h2>Login</h2>
                        <p>Enter your email and password</p>
                </div>

                <form method="POST" action="{{ url('login') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email address" value="{{ old('email') }}" required autocomplete="off">
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="password" class="form-control" name="password" placeholder="password" required autocomplete="off">
                    </div>
                    {{-- <div class="input-group mb-5 d-flex justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="formCheck">
                            <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
                        </div>
                        <div class="forgot">
                            <small><a href="#">Forgot Password?</a></small>
                        </div>
                    </div> --}}
                    <div class="input-group mb-3">
                        <button class="btn btn-lg btn-primary w-100 fs-6">Login</button>
                    </div>
                {{-- <div class="input-group mb-3">
                    <button class="btn btn-lg btn-light w-100 fs-6"><img src="images/google.png" style="width:20px" class="me-2"><small>Sign In with Google</small></button>
                </div> --}}
                </form>
                <div class="row">
                    <small>Don't have account? <a href="{{ route('register') }}">Sign Up</a></small>
                </div>
            </div>
        </div>
    </div>
@endsection