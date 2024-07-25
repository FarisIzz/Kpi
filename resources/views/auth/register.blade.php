@extends('layout')
@section('title', 'JABATAN PENJARA MALAYSIA')
@section('body')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">

    <!----------------------- Main Container -------------------------->
    <div class="container d-flex justify-content-center align-items-center min-vh-100 ">
        <!----------------------- Login Container -------------------------->
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <!--------------------------- Left Box ----------------------------->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #1b8659;">
                <div class="featured-image mb-3">
                    <img src="{{ asset('picture/penjara_logo.png') }}" class="img-fluid" style="width: 250px;">
                </div>
                <p class="text-white text-center fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">JABATAN PENJARA MALAYSIA</p>
            </div> 
            <!-------------------- ------ Right Box ---------------------------->
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Register</h2>
                    </div>

                    @if ($errors->any())
                        <ul class="error-list mb-3">
                            <li class="text-center">{{ $errors->first() }}</li>
                        </ul>
                    @endif

                    <form method="POST" action="{{ url('register') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Name" id="name" name="name" value="{{ old('name') }}" required autocomplete="off">
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email address" value="{{ old('email') }}" required autocomplete="off">
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" id="password" placeholder="password" class="form-control" name="password" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" placeholder="Confirm password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        <div class="input-group mb-3">
                            <button class="btn btn-lg btn-primary w-100 fs-6">Register</button>
                        </div>
                    </form>
                    <div class="row">
                        <small>Don't have account? <a href="{{ route('login') }}">Login</a></small>
                    </div>
                </div> 
            </div>
        </div>
    </div>
@endsection
