@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('user-permission', 'active')
@section('content')
    <div class="dashboard_mainsec">
        <!-- company Details -->
        <div class="companydetails_head">
            <h3 class="heading_title">
                {{ $pageTitle }}
            </h3>
            <div class="backwardright"><a href="{{ route('admin.user-permission.list') }}"><i class="fa fa-backward"></i></a>
            </div>
        </div>
        <form action="{{ route('admin.user-permission.add') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="uuid" id="uuid" value="{{ $isPatient->uuid ?? '' }}">
            <div class="row">
                @php
                    $gender = old('gender') ?? (isset($isPatient) ? $isPatient->gender : '');
                @endphp
                <div class="col-md-3 adfilter-single">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="">---Select Role---</option>
                        {{ getRole('') }}
                    </select>
                    @error('gender')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-3 adfilter-single">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" id="name"
                        placeholder="Enter Patient Name" value="{{ old('name', $isPatient->name ?? '') }}">
                    @error('name')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-3 adfilter-single">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" id="email"
                        placeholder="Enter Patient Email" value="{{ old('email', $isPatient->email ?? '') }}">
                    @error('email')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-3 adfilter-single">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" id="password"
                        placeholder="Enter Patient Password">
                    @error('password')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-3 adfilter-single">
                    <label for="">Phone</label>
                    <input type="number" class="form-control" name="phone" id="phone"
                        placeholder=" Enter Doctor Phone" value="{{ old('phone', $isPatient->mobile_number ?? '') }}">
                    @error('phone')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-3 adfilter-single">
                    <label for="alternative_mobile_no">Alternative Phone Number</label>
                    <input type="number" class="form-control" name="alternative_mobile_no" id="alternative_mobile_no"
                        placeholder="Ent Doctor Alternative Phone Number"
                        value="{{ old('alternative_mobile_no', $isPatient->alternative_mobile_no ?? '') }}">
                    @error('alternative_mobile_no')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-3 adfilter-single">
                    <label for="">Date of Birth</label>
                    <input type="date" class="form-control" name="dob" id="dob"
                        value="{{ old('dob', $isPatient->patientProfile?->dob ?? '') }}">
                    @error('dob')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                @php
                    $bloodGroup = old('blood_group') ?? (isset($isPatient) ? $isPatient->patientProfile?->blood_group : '');
                @endphp
                <div class="col-md-3 adfilter-single">
                    <label for="">Blood Group</label>
                    <select name="blood_group" id="blood_group" class="form-control">
                        <option value="">---Select Blood Group---</option>
                        <option value="a+" @selected($bloodGroup == 'a+')>A+</option>
                        <option value="b+" @selected($bloodGroup == 'b+')>B+</option>
                        <option value="ab" @selected($bloodGroup == 'ad')>AB</option>
                    </select>
                    @error('blood_group')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-6 adfilter-single">
                    <label for="">Address</label>
                    <textarea name="address" id="address" cols="30" rows="3" class="form-control">{{ old('address', $isPatient->address ?? '') }}</textarea>
                    @error('address')
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
                    <button type="button" class="btn btn-cancle">Cancel</button>
                    <button type="submit" class="btn btn-book">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('scripts')
    <script>
        $('.allergyMedicine').on('change', function(e) {
            // $e.preventDefault();
            $('#description').prop('readonly', true);
            let data = $(this).val();
            if (data == 'yes') {
                $('#description').prop('readonly', false);
            }
        });
    </script>
@endpush
