@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('clinic', 'active')
@section('content')
    <div class="dashboard_mainsec">
        <!-- company Details -->
        <div class="companydetails_head">
            <h3 class="heading_title">
                Clinic Staff Details
            </h3>
            <div class="comdehead_right">
                <div class="backwardright"><a href="{{ route('admin.clinic.list') }}"><i class="fa fa-backward"></i></a></div>
            </div>
        </div>
    </div>
    <div class="company_profiles card-body">
        <div class="doctor-img-name-style">
            <div class="doctor-name-style">
                <p>{{$isClinicStaff->name?$isClinicStaff->name:'User '.$isClinicStaff->id}}</p>
            </div>
            <div class="doctor-image-style">
                <img src="{{ asset('assets/images/company1.png') }}" alt="" style="width: 170px; height: 170px;">
            </div>
        </div>
        <div class="doctor-main-details-style">
            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Specialist Type</label>
                <p class="doctor-details-value-style">{{ $isClinicStaff->doctorProfile?->category?->name }}</p>
            </div>

            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Email</label>
                <p class="doctor-details-value-style">{{$isClinicStaff->email?$isClinicStaff->email:'-'}}</p>
            </div>

            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Gender</label>
                <p class="doctor-details-value-style">{{ $isClinicStaff->gender?ucfirst($isClinicStaff->gender):'-' }}</p>
            </div>

            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Phone</label>
                <p class="doctor-details-value-style">{{$isClinicStaff->mobile_number?$isClinicStaff->mobile_number:'-'}}</p>
            </div>

            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Alternative Phone Number</label>
                <p class="doctor-details-value-style">{{$isClinicStaff->alternative_mobile_no?$isClinicStaff->alternative_mobile_no:'-'}}</p>
            </div>

            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Qualifaction</label>
                <p class="doctor-details-value-style">{{ $isClinicStaff->doctorProfile?->qualifaction?$isClinicStaff->doctorProfile?->qualifaction:'-' }}</p>
            </div>

            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Registration Date</label>
                <p class="doctor-details-value-style">{{ $isClinicStaff->doctorProfile?->registration_date? \Carbon\Carbon::parse($isClinicStaff->doctorProfile?->registration_date)->format('d M, Y') :'-' }}</p>
            </div>

            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Registration Number</label>
                <p class="doctor-details-value-style">{{ $isClinicStaff->doctorProfile?->registration_number?$isClinicStaff->doctorProfile?->registration_number:'-' }}</p>
            </div>

            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Experience</label>
                <p class="doctor-details-value-style">{{ $isClinicStaff->doctorProfile?->experience?$isClinicStaff->doctorProfile?->experience:'-' }}</p>
            </div>

            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Consultation Fee</label>
                <p class="doctor-details-value-style">{{ $isClinicStaff->doctorProfile?->price?$isClinicStaff->doctorProfile?->price:'-' }}</p>
            </div>

            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Address</label>
                <p class="doctor-details-value-style">{{ $isClinicStaff->address }}</p>
            </div>

            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Description</label>
                <p class="doctor-details-value-style">{{ $isClinicStaff->doctorProfile?->description?$isClinicStaff->doctorProfile?->description:'-' }}</p>
            </div>
        </div>

    </div>
    </div>
@endsection
@push('scripts')

@endpush
