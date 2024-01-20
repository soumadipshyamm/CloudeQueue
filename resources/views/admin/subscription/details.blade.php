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
            <div class="backwardright"><a href="{{ route('patient.list') }}"><i class="fa fa-backward"></i></a></div>
        </div>
    </div>
</div>
<!-- advance filter box -->

<!-- company details -->
<div class="company_profiles card-body">
    <div class="table-responsive adminbio_table">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone No.</th>
                    <th scope="col">Alternative Phone No.</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            {{-- <tbody>
                @forelse ($fetchPatientList as $key=>$patient)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        <img src="{{ asset('assets/images/company1.png') }}" class="img-fluid" alt="">
                    </td>
                    <td>
                        {{ $patient->name ?? '' }}
                    </td>
                    <td>
                        {{ $patient->email ?? '' }}
                    </td>
                    <td>
                        {{ $patient->mobile_number ?? '' }}
                    </td>
                    <td>
                        {{ $patient->alternative_mobile_no ?? '' }}
                    </td>
                    <td>
                        {{ $patient->gender ?? '' }}
                    </td>


                    <td>
                        <div class="action_box">
                            <a href="#" class="text-primary" data-bs-toggle="modal" data-bs-target="#attachoppModal"><i class="fa-solid fa-eye" aria-hidden="true"></i></a>
                            <a href="#" class="text-primary" data-bs-toggle="modal" data-bs-target="#attachoppModal"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></a>
                            <a href="#" class="text-danger"><i class="fa-regular fa-trash-can" aria-hidden="true"></i></a>
                        </div>
                    </td>
                </tr>
                @empty
                @endforelse
            </tbody> --}}
        </table>
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
<!--
    name:test
    email:patient1113432321@cloudequeue.com
    password:12345678
    //Password_confirmation:12345678
    phone:1230067775
    alternative_mobile_no:2134567890
    type:patient
    gender:male
dob:2023-12-12
allergy_medicine:yes
description:ssssssssssssssssssssssssssss
time:10:10:12
long:12.345678
lat:-34.123456
blood_group:o
address:kolkata -->
