@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('clinic', 'active')
@section('content')
    <div class="dashboard_mainsec">
        <!-- company Details -->
        <div class="companydetails_head">
            <h3 class="heading_title">
                Clinics Details
            </h3>
            <div class="comdehead_right">
                <div class="backwardright"><a href="{{ route('admin.clinic.list') }}"><i class="fa fa-backward"></i></a></div>
            </div>
        </div>
    </div>
    <!-- company details -->
    <div class="company_profiles card-body">
        <div class="doctor-details-style clinicsheading_title">
           Clinics Details
        </div>
        <div class="">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="clinicsheading_logo">
                        <img src="{{ asset('assets/images/company1.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-12"></div>
            </div>
        </div>
        <div class="doctor-main-details-style">
            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Name</label>
                <p class="doctor-details-value-style">{{ $isClinic->clinic_name ? $isClinic->clinic_name : '-' }}</p>
            </div>
            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Email</label>
                <p class="doctor-details-value-style">{{ $isClinic->email ? $isClinic->email : '-' }}</p>
            </div>

            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Phone</label>
                <p class="doctor-details-value-style">{{ $isClinic->phone ? $isClinic->phone : '-' }}</p>
            </div>

            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Alternative Phone Number</label>
                <p class="doctor-details-value-style">{{ $isClinic->alt_phone ? $isClinic->alt_phone : '-' }}</p>
            </div>

            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Address</label>
                <p class="doctor-details-value-style">{{ $isClinic->address }}</p>
            </div>

            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Latitude</label>
                <p class="doctor-details-value-style">{{ $isClinic->lat ? $isClinic?->lat : '-' }}</p>
            </div>

            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Longitude</label>
                <p class="doctor-details-value-style">{{ $isClinic->long ? $isClinic->long : '-' }}</p>
            </div>

            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Description</label>
                <p class="doctor-details-value-style">{{ $isClinic->description ? $isClinic->description : '-' }}</p>
            </div>
        </div>
        {{-- ************************************************************************************ --}}
        <div class="doctor-details-style clinicsheading_title mt-4">
           Clinic Staff Details
        </div>
        <div class="">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="clinicsheading_logo">
                        <img src="{{ asset('assets/images/company1.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-12"></div>
            </div>
        </div>
        <div class="doctor-main-details-style">
            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Name</label>
                <p class="doctor-details-value-style">{{ $isClinic->clinic_name ? $isClinic->clinic_name : '-' }}</p>
            </div>
            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Email</label>
                <p class="doctor-details-value-style">{{$clinicUser->email?$clinicUser->email:'-'}}</p>
            </div>

            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Phone</label>
                <p class="doctor-details-value-style">{{$clinicUser->mobile_number?$clinicUser->mobile_number:'-'}}</p>
            </div>

            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Alternative Phone Number</label>
                <p class="doctor-details-value-style">{{$clinicUser->alternative_mobile_no?$clinicUser->alternative_mobile_no:'-'}}</p>
            </div>

            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Gender</label>
                <p class="doctor-details-value-style">{{ $clinicUser->gender?ucfirst($clinicUser?->gender):'-' }}</p>
            </div>

            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Address</label>
                <p class="doctor-details-value-style">{{ $clinicUser->address }}</p>
            </div>
        </div>

    </div>
    </div>
@endsection
@push('scripts')
@endpush
