<<<<<<< HEAD
=======
@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('doctor', 'active')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/responsive.bootstrap4.min.css') }}">
@endpush
@section('content')
    <div class="dashboard_mainsec">
        <!-- company Details -->
        <div class="companydetails_head">
            <h3 class="heading_title">
                Doctors List
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
                <a href="{{ route('admin.doctor.add') }}" class="btn btn-primary">Add Doctor</a>
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
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone No.</th>
                        <th scope="col">Alternative Phone No.</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($fetchDoctorList as $key=>$doctor)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <img src="{{ asset('assets/images/company1.png') }}" class="img-fluid" alt="">
                            </td>
                            <td>
                                {{ $doctor->name ?? '' }}
                            </td>
                            <td>
                                {{ $doctor->email ?? '' }}
                            </td>
                            <td>
                                {{ $doctor->mobile_number ?? '' }}
                            </td>
                            <td>
                                {{ $doctor->alternative_mobile_no ?? '' }}
                            </td>
                            <td>
                                {{ $doctor->gender ?? '' }}
                            </td>
                            <td>
                                <div class="action_box">
                                    <a href="{{ route('admin.doctor.details', $doctor->uuid) }}" class="text-primary"><i
                                            class="fa-solid fa-eye" aria-hidden="true"></i></a>
                                    <a href="{{ route('admin.doctor.edit', $doctor->uuid) }}" class="text-primary"
                                        data-bs-toggle="" data-bs-target=""><i class="fa-regular fa-pen-to-square"
                                            aria-hidden="true"></i></a>
                                    <a href="javascript:void(0)" data-model="" data-uuid="{{ $doctor->uuid }}"
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
@endpush
>>>>>>> 495f86a3e771b4b0b0eb3297b3b245e6ad68c8ac
