@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('doctor', 'active')
@section('content')
    <div class="dashboard_mainsec">
        <!-- company Details -->
        <div class="companydetails_head">
            <h3 class="heading_title">
                {{ $pageTitle }}
            </h3>
            <div class="backwardright"><a href="{{ route('admin.doctor.list') }}"><i class="fa fa-backward"></i></a></div>
        </div>
        <div class="company_profiles card-body">
            <form action="{{ route('admin.doctor.add') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="uuid" id="uuid" value="{{ $isDoctor->uuid ?? '' }}">
                <div class="row">
                    <div class="col-lg-12 col-md-12 ">
                        <div class="doctor-details-style clinicsheading_title">
                            Doctor Details
                        </div>
                    </div>
                    <div class="col-md-4 adfilter-single">
                        <label for="categoryId">Specialist </label>
                        <select name="categoryId" id="categoryId" class="form-control">
                            <option value="">------Select Specialist ------</option>
                            {{ getCategory($isDoctor->doctorProfile?->category?->id ?? '') }}
                        </select>
                        @error('categoryId')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <hr>
                    <div class="col-md-4 adfilter-single">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Doctor Name"
                            value="{{ old('name', $isDoctor->name ?? '') }}">
                        @error('name')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4 adfilter-single">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="Enter Doctor Email" value="{{ old('email', $isDoctor->email ?? '') }}">
                        @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4 adfilter-single">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Enter Doctor Password">
                        @error('password')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @php
                        $gender = old('gender') ?? (isset($isDoctor) ? $isDoctor->gender : '');
                    @endphp
                    <div class="col-md-4 adfilter-single">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="">---Select Gender---</option>
                            <option value="male" @selected($gender == 'male')>Male</option>
                            <option value="female" @selected($gender == 'female')>Female</option>
                            <option value="other" @selected($gender == 'other')>Other</option>
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
                            placeholder=" Enter Doctor Phone"
                            value="{{ old('mobile_number', $isDoctor->mobile_number ?? '') }}">
                        @error('phone')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4 adfilter-single">
                        <label for="alternative_mobile_no">Alternative Phone Number</label>
                        <input type="number" class="form-control" name="alternative_mobile_no" id="alternative_mobile_no"
                            placeholder="Ent Doctor Alternative Phone Number"
                            value="{{ old('alternative_mobile_no', $isDoctor->alternative_mobile_no ?? '') }}">
                        @error('alternative_mobile_no')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4 adfilter-single">
                        <label for="">Qualifaction</label>
                        <input type="text" class="form-control" name="qualifaction" id="qualifaction"
                            placeholder="Enter Doctor Qualifaction"
                            value="{{ old('qualifaction', $isDoctor->doctorProfile?->qualifaction ?? '') }}">
                        @error('qualifaction')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4 adfilter-single">
                        <label for="">Registration Date</label>
                        <input type="date" class="form-control" name="registration_date" id="registration_date"
                            placeholder="Select Doctor Registration Date"
                            value="{{ old('registration_date', $isDoctor->doctorProfile?->registration_date ?? '') }}">
                        @error('registration_date')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4 adfilter-single">
                        <label for="">Registration Number</label>
                        <input type="text" class="form-control" name="registration_number" id="registration_number"
                            placeholder="Enter Doctor Registration Number"
                            value="{{ old('registration_number', $isDoctor->doctorProfile?->registration_number ?? '') }}">
                        @error('registration_number')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4 adfilter-single">
                        <label for="">Experience</label>
                        <input type="number" class="form-control" name="experience" id="experience"
                            placeholder="Enter Doctor Experience"
                            value="{{ old('experience', $isDoctor->doctorProfile?->experience ?? '') }}">
                        @error('experience')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @php
                        $consultation_fee = old('consultation_fee') ?? (isset($isDoctor) ? $isDoctor->doctorProfile?->consultation_fee : '');
                    @endphp
                    <div class="col-md-4 adfilter-single">
                        <label for="">Consultation Fee</label>
                        <input type="radio" class="consultationFee" name="consultation_fee" id="consultation_fee_yes"
                            value="yes" @checked($consultation_fee == 'yes')>
                        <label for="">Yes</label>
                        <input type="radio" class="consultationFee" name="consultation_fee" id="consultation_fee_no"
                            value="no" @checked($consultation_fee == 'no')>
                        <label for="">No</label>
                        @error('consultation_fee')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4 adfilter-single">
                        <label for="">Price</label>
                        <input type="number" class="form-control" name="price" id="price"
                            placeholder="Enter Doctor Price" readonly
                            value="{{ old('price', $isDoctor->doctorProfile?->price ?? '') }}">
                        @error('price')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @php
                        $iscountry = old('country_id') ?? (isset($isDoctor) ? $isDoctor->country_id : '');
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
                        $isstate = old('state_id') ?? (isset($isDoctor) ? $isDoctor->state_id : '');
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
                        $iscity = old('city_id') ?? (isset($isDoctor) ? $isDoctor->city_id : '');
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
                    <div class="col-md-6 adfilter-single">
                        <label for="">Address</label>
                        <textarea name="address" id="address" cols="30" rows="3" class="form-control">{{ old('address', $isDoctor->address ?? '') }}</textarea>
                        @error('address')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 adfilter-single">
                        <label for="">Description</label>
                        <textarea name="description" id="description" cols="30" rows="3" class="form-control">{{ old('description', $isDoctor->doctorProfile?->description ?? '') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 adfilter-single">
                        <label for="">Name</label>
                        <input type="file" class="form-control" name="profile_images" id="profile_images" placeholder=""
                            value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-cancle">Cancel</button>
                        <input type="submit" class="btn btn-book" value="Submit">
                    </div>
                </div>
            </form>
        </div>
        <!-- advance filter box -->
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/custom/address.js') }}"></script>
    <script>
        $('.consultationFee').on('change', function(e) {
            // $e.preventDefault();
            $('#price').prop('readonly', true);
            let data = $(this).val();
            if (data == 'yes') {
                $('#price').prop('readonly', false);
            }
        });

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
