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
        <form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="profile-name-style col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name : </label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Enter Name" value="{{ old('name', auth()->user()->name ?? '') }}">
                                @error('name')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email : </label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Enter Email" value="{{ old('email', auth()->user()->email ?? '') }}">
                                @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
                <div class="profile-image-style col-md-3">
                    <div class="form-group">
                        <label>Profile Image : </label>
                        <input type="file" class="form-control" name="profile_images" placeholder="Enter Alternative Phone Number">
                        @error('alternative_mobile_no')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- <img src="{{ asset('assets/images/company1.png') }}" alt=""
                        style="width: 170px; height: 170px;"> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Phone : </label>
                        <input type="number" class="form-control" name="phone" id="phone"
                            placeholder=" Enter Phone"
                            value="{{ old('mobile_number', auth()->user()->mobile_number ?? '') }}">
                        @error('phone')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Alternative Phone Number : </label>
                        <input type="number" class="form-control" name="alternative_mobile_no"
                            id="alternative_mobile_no" placeholder="Enter Alternative Phone Number"
                            value="{{ old('alternative_mobile_no', auth()->user()->alternative_mobile_no ?? '') }}">
                        @error('alternative_mobile_no')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="">---Select Gender---</option>
                            <option value="male" @selected(auth()->user()->gender == 'male')>Male</option>
                            <option value="female" @selected(auth()->user()->gender == 'female')>Female</option>
                            <option value="other" @selected(auth()->user()->gender == 'other')>Other</option>
                        </select>
                        @error('gender')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Address : </label>
                        <textarea name="address" id="address" cols="30" rows="3" class="form-control" placeholder="Enter Address">{{ auth()->user()->address }}</textarea>
                    @error('address')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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
