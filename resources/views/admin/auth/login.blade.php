@extends('layouts.auth')
@push('styles')
@endpush
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="login-secleft">
            <div class="loginleft_logo">
                <img src="{{ asset('assets/images/cloudqueue_Logo.png') }}" class="img-fluid" alt="" title="Cloud Queue" />
            </div>
            <div class="loginleft_img">
                <img src="{{ asset('assets/images/login-leftimg.png') }}" alt="" />
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="login-secright">
            <div class="login-rightbox">
                <h3>Login as Admin User</h3>
                <div class="line-around-flex"></div>
                <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="single-login">
                        <label class="login-label"> Username / Email ID</label>
                        <input class="form-control" type="text" name="email" id="c" placeholder="Enter your username" required />
                        @error('email')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="single-login">
                        <label class="login-label"> Password</label>
                        <input id="password-eye" type="c" placeholder="Enter your password" class="form-control" name="password" id="password" value=""  required/>
                      <span toggle="#password-eye" class="fa fa-fw fa-eye eye-icon toggle-eye"></span>
                      @error('password')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="signup-checkbox">
                        <div class="forgot-btn">
                            <a href="forgetpass.html" class="forgot-pass">
                                Forgot Password?</a>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-effect btn-effect-arrow mt-4">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
@endpush
