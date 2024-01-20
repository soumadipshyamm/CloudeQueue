@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('patient', 'active')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/responsive.bootstrap4.min.css') }}">
@endpush
@section('content')
    <div class="dashboard_mainsec">
        <!-- company Details -->
        <div class="companydetails_head">
            <h3 class="heading_title">
                Patient List
            </h3>
            <div class="comdehead_right">
                {{-- <div class="advancefilter_box">
                <div class="adfilterb_con">
                    <p>Advance Filters</p>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
            </div> --}}
                {{-- <div class="search_box">
                <form action="">
                    <input type="search" name="" class="form-control" placeholder="Search">
                    <button class="search_btn">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div> --}}
                <a href="{{ route('admin.patient.add') }}" class="btn btn-primary">Add Patient</a>
            </div>
        </div>
    </div>
    <!-- advance filter box -->

    <!-- company details -->
    <div class="company_profiles card-body">
        <div class="table-responsive adminbio_table">
            <table class="table table-hover dataTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        {{-- <th scope="col">Image</th> --}}
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone No.</th>
                        <th scope="col">Alternative Phone No.</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Address</th>
                        {{-- <th scope="col">Address</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Blood Group</th>
                    <th scope="col">Allergy Medicine</th>
                    <th scope="col">Description</th> --}}
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($fetchPatientList as $key=>$patient)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            {{-- <td>
                                <img src="{{ asset('assets/images/company1.png') }}" class="img-fluid" alt="">
                            </td> --}}
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
                                {{ $patient->address ?? '' }}
                            </td>
                            {{-- <td>
                        {{ $patient->address ?? '' }}
                    </td>
                    <td>
                        {{ $patient->patientProfile->dob ?? '' }}
                    </td>
                    <td>
                        {{ $patient->patientProfile->blood_group ?? '' }}
                    </td>
                    <td>
                        {{ $patient->patientProfile->allergy_medicine ?? '' }}
                    </td>
                    <td>
                        {{ $patient->patientProfile->description ?? '' }}
                    </td> --}}
                            <td>
                                <div class="action_box">

                                    <a href="{{ route('admin.patient.details', $patient->uuid) }}" class="text-primary"><i
                                            class="fa-solid fa-eye" aria-hidden="true"></i></a>
                                    <a href="{{ route('admin.patient.edit', $patient->uuid) }}" class="text-primary"
                                        data-bs-toggle="" data-bs-target=""><i class="fa-regular fa-pen-to-square"
                                            aria-hidden="true"></i></a>
                                    <a href="javascript:void(0)" data-model="" data-uuid="{{ $patient->uuid }}"
                                        data-table="users" class="text-danger deleteData"><i class="fa-regular fa-trash-can"
                                            aria-hidden="true"></i></a>

                                </div>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
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
