@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('subscription', 'active')
@section('content')
    <div class="dashboard_mainsec">
        <!-- company Details -->
        <div class="companydetails_head">
            <h3 class="heading_title">
                Add Subscription Details
            </h3>
            <div class="backwardright"><a href="{{ route('admin.subscription.list') }}"><i class="fa fa-backward"></i></a></div>
        </div>
        <form action="{{ route('admin.subscription.add') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="uuid" id="uuid" value="{{ $data->uuid??'' }}">
            <div class="row">
                <div class="col-md-4 adfilter-single">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" id="name"
                        placeholder="Enter Patient Name">
                    @error('name')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 adfilter-single">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" id="email"
                        placeholder="Enter Patient Email">
                    @error('email')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 adfilter-single">
                    <label for="">assword</label>
                    <input type="password" class="form-control" name="password" id="password"
                        placeholder="Enter Patient Password">
                    @error('password')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 adfilter-single">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="">---Select Gender---</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                    @error('gender')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 adfilter-single">
                    <label for="">Phone</label>
                    <input type="number" class="form-control" name="phone" id="phone"
                        placeholder=" Enter Doctor Phone">
                    @error('phone')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 adfilter-single">
                    <label for="alternative_mobile_no">Alternative Phone Number</label>
                    <input type="number" class="form-control" name="alternative_mobile_no" id="alternative_mobile_no"
                        placeholder="Ent Doctor Alternative Phone Number">
                    @error('alternative_mobile_no')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 adfilter-single">
                    <label for="">Date of Birth</label>
                    <input type="date" class="form-control" name="dob" id="dob">
                    @error('dob')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 adfilter-single">
                    <label for="">Blood Group</label>
                    <select name="blood_group" id="blood_group" class="form-control">
                        <option value="">---Select Blood Group---</option>
                        <option value="a+">A+</option>
                        <option value="b+">B+</option>
                        <option value="ab">AB</option>
                    </select>
                    @error('blood_group')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 adfilter-single">
                    <label for="">Allergy Medicine</label>
                    <input type="radio" class="allergyMedicine" name="allergy_medicine" id="allergy_medicine_yes"
                        value="yes">
                    <label for="">Yes</label>
                    <input type="radio" class="allergyMedicine" name="allergy_medicine" id="allergy_medicine_no"
                        value="no">
                    <label for="">No</label>
                    @error('allergy_medicine')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 adfilter-single">
                    <label for="">Address</label>
                    <textarea name="address" id="address" cols="30" rows="3" class="form-control"></textarea>
                    @error('address')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 adfilter-single">
                    <label for="">Description</label>
                    <textarea name="description" id="description" cols="30" rows="3" class="form-control" readonly></textarea>
                    @error('description')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 adfilter-single">
                    <label for="">Profile Images</label>
                    <input type="file" class="form-control" name="profile_images" id="profile_images"
                        placeholder="">
                    @error('profile_images')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancle"><a href="{{ route('admin.subscription.list') }}">Cancel</a></button>
                    <button type="submit" class="btn btn-book">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('scripts')
   @endpush
