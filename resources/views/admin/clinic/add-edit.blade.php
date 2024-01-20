@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('clinic', 'active')
@section('content')
    <div class="dashboard_mainsec">
        <!-- company Details -->
        <div class="companydetails_head">
            <h3 class="heading_title">
                Clinic Details
            </h3>
            <div class="backwardright"><a href="{{ route('admin.clinic.list') }}"><i class="fa fa-backward"></i></a></div>
        </div>
        <div class="company_profiles card-body">
            <div class="clinicdetail-sect">
                <form action="{{ route('admin.clinic.add') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="uuid" id="uuid" value="{{ $data->uuid ?? '' }}">
                    <div class="row">
                        {{-- ******************************************************************************************************************** --}}
                        <div class="col-lg-12 col-md-12 ">
                            <div class="doctor-details-style clinicsheading_title">
                                Clinics Details
                            </div>
                        </div>
                        <div class="col-md-4 adfilter-single">
                            <label for="clinic_name">Clinic Name</label>
                            <input type="text" class="form-control" name="clinic_name" id="clinic_name"
                                value="{{ old('clinic_name', $data->clinic_name ?? '') }}" placeholder="Enter Clinic Name.">
                            @error('clinic_name')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4 adfilter-single">
                            <label for="clinic_email">Email</label>
                            <input type="text" class="form-control" name="clinic_email" id="clinic_email"
                                value="{{ old('clinic_email', $data->email ?? '') }}" placeholder="Enter Clinic Email Id.">
                            @error('clinic_email')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4 adfilter-single">
                            <label for="clinic_phone">Phone Number</label>
                            <input type="number" class="form-control" name="clinic_phone" id="clinic_phone"
                                value="{{ old('clinic_phone', $data->phone ?? '') }}"
                                placeholder="Enter Clinic Phone Number.">
                            @error('clinic_phone')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4 adfilter-single">
                            <label for="clinic_alternative_mobile_no">Alternative Phone Number</label>
                            <input type="number" class="form-control" name="clinic_alternative_mobile_no"
                                id="clinic_alternative_mobile_no"
                                value="{{ old('clinic_alternative_mobile_no', $data->alt_phone ?? '') }}"
                                placeholder="Enter Clinic Alternative Phone Number">
                            @error('clinic_alternative_mobile_no')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-4 adfilter-single">
                            <label for="">Latitude</label>
                            <input type="text" class="form-control" name="clinic_long" id="clinic_long"
                                value="{{ old('clinic_long', $data->long ?? '') }}" placeholder="Enter Clinic Latitude.">
                            @error('clinic_long')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4 adfilter-single">
                            <label for="">Longitude</label>
                            <input type="text" class="form-control" name="clinic_lat" id="clinic_lat"
                                value="{{ old('clinic_lat', $data->lat ?? '') }}" placeholder="Enter Clinic Longitude.">
                            @error('clinic_lat')
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
                            <textarea name="clinic_address" id="address" value="{{ old('clinic_address', $data->address ?? '') }}"
                                cols="30" rows="3" class="form-control">{{ old('clinic_address', $data->address ?? '') }}</textarea>
                            @error('clinic_address')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 adfilter-single">
                            <label for="">Description</label>
                            <textarea name="clinic_description" id="clinic_description"
                                value="{{ old('clinic_description', $data->description ?? '') }}" cols="30" rows="3"
                                class="form-control">{{ old('clinic_description', $data->description ?? '') }}</textarea>
                            @error('clinic_description')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 adfilter-single">
                            <label for="">Image</label>
                            <input type="file" class="form-control" name="clinic_profile_images"
                                id="clinic_profile_images" placeholder="">
                            @error('clinic_profile_images')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- *********************************Clinic Staff Details************************** --}}

                        @if (!isset($data->uuid))
                            <div class="col-lg-12 col-md-12 adfilter-single">
                                <div class="doctor-details-style clinicsheading_title">
                                    Clinics Staff Details
                                </div>
                            </div>
                            <div class="col-md-4 adfilter-single">
                                <label for="name"> Clinic Owner Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Enter Clinic Owner Name.">
                                @error('name')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 adfilter-single">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="email"
                                    placeholder="Enter Clinic Owner Email Id.">
                                @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
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
                            <div class="col-md-4 adfilter-single">
                                <label for="phone">Phone Number</label>
                                <input type="number" class="form-control" name="phone" id="phone"
                                    placeholder="Enter Owner Phone Number.">
                                @error('phone')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 adfilter-single">
                                <label for="alternative_mobile_no">Alternative Phone Number</label>
                                <input type="number" class="form-control" name="alternative_mobile_no"
                                    id="alternative_mobile_no" placeholder="Enter Owner Alternative Phone Number">
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
                                <label for="">Image</label>
                                <input type="file" class="form-control" name="profile_images" id="profile_images"
                                    placeholder="">
                                @error('profile_images')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        @endif
                        {{-- ******************************************************************************************************************** --}}
                        <div class="modal-footer">
                            <button type="button" class="btn btn-cancle">Cancel</button>
                            <input type="submit" class="btn btn-book" value="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/custom/address.js') }}"></script>
    <script>
        $(document).ready(function() {
            let country = $('.select_country').val();
            let state_id = $('.select_state_name').val();
            if (country != '') {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: APP_URL + '/admin/doctor/state-by-country',
                    data: {
                        'id': country
                    },
                    success: function(response) {
                        var statehtml = '';
                        if (response.status == true) {
                            response.data.forEach(element => {
                                const selected = (element.id == state_id) ? 'selected' : '';
                                statehtml += `<option value="${element.id}" ${selected} >${element
                                    .name}</option>`;
                            })
                            $('.select_state').html(statehtml);
                        } else {
                            $('.select_state').html(`<option value="">---Select---</option>`);
                        }
                    },
                    error: function(errorResponse) {
                        $('.select_state').html(`<option value="">---Select---</option>`);
                    }
                })
            }
            let city_id = $('.select_city_name').val();
            if (state_id != '') {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: APP_URL + '/admin/doctor/city-by-state',
                    data: {
                        'id': state_id
                    },
                    success: function(response) {
                        var cityhtml = '';
                        if (response.status == true) {
                            response.data.forEach(element => {
                                const selectedcity = (element.id == city_id) ? 'selected' : '';
                                cityhtml += `<option value="${element.id}" ${selectedcity}>${element
                                    .name}</option>`;
                            })
                            $('.select_city').html(cityhtml);
                        } else {
                            $('.select_city').html(`<option value="">---Select---</option>`);
                        }
                    },
                    error: function(errorResponse) {
                        $('.select_city').html(`<option value="">---Select---</option>`);
                    }
                })
            }
        })
    </script>
@endpush
