@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('doctor', 'active')
@section('content')
<div class="dashboard_mainsec">
    <!-- company Details -->
    <div class="companydetails_head">
        <h3 class="heading_title">
            Doctors Details
        </h3>
        <div class="comdehead_right">
            <div class="backwardright"><a href="{{ route('admin.doctor.list') }}"><i class="fa fa-backward"></i></a></div>
        </div>
    </div>
</div>
<!-- advance filter box -->

<!-- company details -->
<div class="company_profiles card-body">
    <div class="doctor-img-name-style">
        <div class="doctor-name-style">
            <p>{{$isDoctor->name?$isDoctor->name:'User '.$isDoctor->id}}</p>
        </div>
        <div class="doctor-image-style">
            <img src="{{ asset('assets/images/company1.png') }}" alt="" style="width: 170px; height: 170px;">
        </div>
    </div>
    <div class="doctor-main-details-style">
        <div class="doctor-details-style">
            <label class="doctor-details-lable-style">Specialist Type</label>
            <p class="doctor-details-value-style">{{ $isDoctor->doctorProfile?->category?->name }}</p>
        </div>

        <div class="doctor-details-style">
            <label class="doctor-details-lable-style">Email</label>
            <p class="doctor-details-value-style">{{$isDoctor->email?$isDoctor->email:'-'}}</p>
        </div>

        <div class="doctor-details-style">
            <label class="doctor-details-lable-style">Gender</label>
            <p class="doctor-details-value-style">{{ $isDoctor->gender?ucfirst($isDoctor->gender):'-' }}</p>
        </div>

        <div class="doctor-details-style">
            <label class="doctor-details-lable-style">Phone</label>
            <p class="doctor-details-value-style">{{$isDoctor->mobile_number?$isDoctor->mobile_number:'-'}}</p>
        </div>

        <div class="doctor-details-style">
            <label class="doctor-details-lable-style">Alternative Phone Number</label>
            <p class="doctor-details-value-style">{{$isDoctor->alternative_mobile_no?$isDoctor->alternative_mobile_no:'-'}}</p>
        </div>

        <div class="doctor-details-style">
            <label class="doctor-details-lable-style">Qualifaction</label>
            <p class="doctor-details-value-style">{{ $isDoctor->doctorProfile?->qualifaction?$isDoctor->doctorProfile?->qualifaction:'-' }}</p>
        </div>

        <div class="doctor-details-style">
            <label class="doctor-details-lable-style">Registration Date</label>
            <p class="doctor-details-value-style">{{ $isDoctor->doctorProfile?->registration_date? \Carbon\Carbon::parse($isDoctor->doctorProfile?->registration_date)->format('d M, Y') :'-' }}</p>
        </div>

        <div class="doctor-details-style">
            <label class="doctor-details-lable-style">Registration Number</label>
            <p class="doctor-details-value-style">{{ $isDoctor->doctorProfile?->registration_number?$isDoctor->doctorProfile?->registration_number:'-' }}</p>
        </div>

        <div class="doctor-details-style">
            <label class="doctor-details-lable-style">Experience</label>
            <p class="doctor-details-value-style">{{ $isDoctor->doctorProfile?->experience?$isDoctor->doctorProfile?->experience:'-' }}</p>
        </div>

        <div class="doctor-details-style">
            <label class="doctor-details-lable-style">Consultation Fee</label>
            <p class="doctor-details-value-style">{{ $isDoctor->doctorProfile?->price?$isDoctor->doctorProfile?->price:'-' }}</p>
        </div>

        <div class="doctor-details-style">
            <label class="doctor-details-lable-style">Address</label>
            <p class="doctor-details-value-style">{{ $isDoctor->address }}</p>
        </div>

        <div class="doctor-details-style">
            <label class="doctor-details-lable-style">Description</label>
            <p class="doctor-details-value-style">{{ $isDoctor->doctorProfile?->description?$isDoctor->doctorProfile?->description:'-' }}</p>
        </div>
    </div>

</div>
</div>
@endsection
@push('scripts')
    
@endpush
