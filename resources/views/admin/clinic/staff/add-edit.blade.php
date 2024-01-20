@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('clinic', 'active')
@section('content')
    <div class="dashboard_mainsec">
        <!-- company Details -->
        <div class="companydetails_head">
            <h3 class="heading_title">
                 Staff Details
            </h3>
            <div class="backwardright"><a href="{{ route('admin.clinic.list') }}"><i class="fa fa-backward"></i></a></div>
        </div>
        <div class="company_profiles card-body">
            <form action="{{ route('admin.clinic.staff.add') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="uuid" id="uuid" value="{{ $data->uuid??'' }}">
                <div class="row">
                    <div class="col-lg-12 col-md-12 ">
                        <div class="doctor-details-style clinicsheading_title">
                            Staff Details
                        </div>
                    </div>
                    <div class="col-md-4 adfilter-single">
                        <label for="clinicId">Clinic</label>
                        <select name="clinicId" id="clinicId" class="form-control">
                            <option value="">---Select Clinic---</option>
                            {{getClinic(isset($data)?$data->clinicUser?->first()->id:'')}}
                        </select>
                        @error('clinicId')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <hr>
                    <div class="col-md-4 adfilter-single">
                        <label for="name"> Clinic Staff Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="Enter Clinic Staff Name." value="{{ old('name',$data->name??'') }}">
                        @error('name')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4 adfilter-single">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email"
                            placeholder="Enter Clinic Staff Email Id." value="{{ old('email',$data->email??'') }}">
                        @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                @if(!isset($data->uuid))
                    <div class="col-md-4 adfilter-single">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Enter  Password.">
                        @error('password')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                @endif
                    <div class="col-md-4 adfilter-single">
                        <label for="phone">Phone Number</label>
                        <input type="number" class="form-control" name="phone" id="phone"
                            placeholder="Enter Staff Phone Number." value="{{ old('phone',$data->mobile_number??'') }}">
                        @error('phone')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4 adfilter-single">
                        <label for="alternative_mobile_no">Alternative Phone Number</label>
                        <input type="number" class="form-control" name="alternative_mobile_no" id="alternative_mobile_no"
                            placeholder="Enter Staff Alternative Phone Number" value="{{ old('alternative_mobile_no',$data->alternative_mobile_no??'') }}">
                        @error('alternative_mobile_no')
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
                    {{-- **************************************************************** --}}
                    @php
                    $iscountry = old('country_id') ?? (isset($data) ? $data->country_id : '');
                @endphp
                <div class="col-md-4 adfilter-single">
                    <label for="">Country</label>
                    <select name="country_id" class="form-control select_country" id="select_country">
                        <option value="">---Select---</option>
                        @foreach ($getCountries as $country)
                            <option value="{{ $country->id }}" @selected($iscountry == $country->id)>{{ $country->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('country_id')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                @php
                    $isstate = old('state_id') ?? (isset($data) ? $data->state_id : '');
                @endphp
                <input type="hidden" name="state" value="{{ $isstate }}" class="select_state_name">
                <div class="col-md-4 adfilter-single">
                    <label for="">State</label>
                    <select name="state_id" id="" class="form-control select_state">
                        <option value="">---Select---</option>
                    </select>
                    @error('state_id')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                @php
                    $iscity = old('city_id') ?? (isset($data) ? $data->city_id : '');
                @endphp
                <input type="hidden" name="state" value="{{ $iscity }}" class="select_city_name">
                <div class="col-md-4 adfilter-single">
                    <label for="">City</label>
                    <select name="city_id" id="" class="form-control select_city">
                        <option value="">---Select---</option>
                    </select>
                    @error('city_id')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- *********************************************************************** --}}
                    <div class="col-md-6 adfilter-single">
                        <label for="">Address</label>
                        <textarea name="address" id="address" cols="30" rows="3" class="form-control">
                            {{$data->address??''}}
                        </textarea>
                        @error('address')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 adfilter-single">
                        <label for="">Image</label>
                        <input type="file" class="form-control" name="profile_images" id="profile_images"
                            placeholder="">
                        @error('profile_images')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-cancle">Cancel</button>
                        <input type="submit" class="btn btn-book" value="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
<script src="{{ asset('assets/js/custom/address.js') }}"></script>
@endpush
