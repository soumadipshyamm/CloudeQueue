@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('dashboard', 'active')
@section('content')
    <div class="dashboard_mainsec">
        <!-- company Details -->
        <div class="companydetails_head">
            <h3 class="heading_title">
                {{ $pageTitle }}
            </h3>
            {{-- <div class="backwardright"><a href="{{ route('category.list') }}"><i class="fa fa-backward"></i></a></div> --}}
        </div>
        <div class="card-body p-4">
            <form action="{{ route('admin.password.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="profile-name-style">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>New Password : </label>
                                <input type="password" class="form-control" name="password" id="new_password"
                                    placeholder="***********">
                                @error('password')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Confirm Password : </label>
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password"
                                    placeholder="*********">
                                @error('confirm_password')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancle">Cancel</button>
                    <input type="submit" class="btn btn-book" value="Submit">
                </div>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
@endpush



{{--
    name:test
    email:clinic11@cloudequeue.com
    phone:1234567801
password:12345678
alternative_mobile_no:2134567890
type:clinic
clinic_name:ABCD Clinic
description:aaaaaaaaaaaaaaaaaaaaa
long:21.12345
lat:-98.98765
address:xdfghjk
time:10:10:10
gender:male --}}
{{-- latitude and longitude --}}
