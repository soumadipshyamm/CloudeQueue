@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('patient', 'active')
@section('content')
    <div class="dashboard_mainsec">
        <!-- company Details -->
        <div class="companydetails_head">
            <h3 class="heading_title">
                Patient Details
            </h3>
            <div class="comdehead_right">
                <div class="backwardright"><a href="{{ route('admin.patient.list') }}"><i class="fa fa-backward"></i></a></div>
            </div>
        </div>
    </div>
    <!-- advance filter box -->

    <!-- company details -->
    <div class="company_profiles card-body">
        <div class="doctor-img-name-style">
            <div class="doctor-name-style">
                <p>{{ $isPatient->name ? $isPatient->name : 'User ' . $isPatient->id }}</p>
            </div>
            <div class="doctor-image-style">
                <img src="{{ asset('assets/images/company1.png') }}" alt="" style="width: 170px; height: 170px;">
            </div>
        </div>
        <div class="doctor-main-details-style">
            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Email</label>
                <p class="doctor-details-value-style">{{ $isPatient->email ? $isPatient->email : '-' }}</p>
            </div>

            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Gender</label>
                <p class="doctor-details-value-style">{{ $isPatient->gender ? ucfirst($isPatient->gender) : '-' }}</p>
            </div>

            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Phone</label>
                <p class="doctor-details-value-style">{{ $isPatient->mobile_number ? $isPatient->mobile_number : '-' }}</p>
            </div>

            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Alternative Phone Number</label>
                <p class="doctor-details-value-style">
                    {{ $isPatient->alternative_mobile_no ? $isPatient->alternative_mobile_no : '-' }}</p>
            </div>

            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Date of Birth</label>
                <p class="doctor-details-value-style">
                    {{ $isPatient->patientProfile?->dob ? \Carbon\Carbon::parse($isPatient->patientProfile?->dob)->format('d M, Y') : '-' }}</p>
            </div>

            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Blood Group</label>
                <p class="doctor-details-value-style">
                    {{ $isPatient->patientProfile?->blood_group ? strtoupper($isPatient->patientProfile?->blood_group) : '-' }}</p>
            </div>

            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Allergy Medicine</label>
                <p class="doctor-details-value-style">
                    {{ $isPatient->patientProfile?->allergy_medicine ? ucfirst($isPatient->patientProfile?->allergy_medicine) : '-' }}</p>
            </div>

            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Address</label>
                <p class="doctor-details-value-style">{{ $isPatient->address }}</p>
            </div>

            <div class="doctor-details-style">
                <label class="doctor-details-lable-style">Description</label>
                <p class="doctor-details-value-style">
                    {{ $isPatient->patientProfile?->description ? $isPatient->patientProfile?->description : '-' }}</p>
            </div>
        </div>

    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $(".adfilterb_con").click(function() {
                $(".filter_box").toggle();
            });
        });
    </script>
@endpush
