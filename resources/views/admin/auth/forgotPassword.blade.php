@extends('layouts.auth')
@section('content')
<div class="forgetpass_box">
    <div class="forgetpass_boxhead">
        <img src="assets/images/cloudqueue_Logo.png" class="img-fluid" alt="" title="Cloud Queue" />
    </div>
    <div class="forgetpass_form">
        <form>
            <div class="single-login">
                <label class="login-label">
                    Enter Email to recover your password</label>
                <input class="form-control" type="text" name="" id="" placeholder="Enter your username" />
            </div>

            <div class="pass_btn">
                <button class="btn btn-primary btn-effect btn-effect-arrow mt-4">
                    Send
                </button>
            </div>
        </form>
    </div>
    @endsection