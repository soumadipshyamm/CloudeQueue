@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('clinic', 'active')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/responsive.bootstrap4.min.css') }}">
@endpush
@section('content')
    <div class="dashboard_mainsec">
        <!-- company Details -->
        <div class="companydetails_head">
            <h3 class="heading_title">
                Clinics List
            </h3>
            @if (auth()->user()->hasRole('super-admin'))
                <div class="comdehead_right">
                    <a href="{{ route('admin.clinic.add') }}" class="btn btn-primary">Add Clinic</a>
                </div>
            @endif
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
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @dd($fetchClinicList->toArray()) --}}
                    @forelse ($fetchClinicList as $key=>$clinic)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            {{-- <td>
                                <img src="{{ asset('assets/images/company1.png') }}" class="img-fluid" alt="">
                            </td> --}}
                            <td>
                                {{ $clinic->clinic_name ?? '' }}
                            </td>
                            <td>
                                {{ $clinic->email ?? '' }}
                            </td>
                            <td>
                                {{ $clinic->phone ?? '' }}
                            </td>
                            <td>
                                {{ $clinic->alt_phone ?? '' }}
                            </td>
                            <td>
                                {{ $clinic->address ?? '' }}
                            </td>
                            <td>
                                <div class="action_box">
                                    <a href="{{ route('admin.clinic.clinic.doctor', $clinic->uuid) }}" class="text-primary"><i class="fa-solid fa-user-doctor"></i></a>
                                    <a href="{{ route('admin.clinic.details', $clinic->uuid) }}" class="text-primary"><i
                                            class="fa-solid fa-eye" title="clinic details" aria-hidden="true"></i></a>

                                    <a href="{{ route('admin.clinic.staff.list', $clinic->uuid) }}" class="text-primary"><i
                                            class="fa-solid fa-users" title="staff" aria-hidden="true"></i></a>

                                    <a href="{{ route('admin.clinic.edit', $clinic->uuid) }}" class="text-primary"><i
                                            class="fa-regular fa-pen-to-square" aria-hidden="true"></i></a>

                                    <a href="javascript:void(0)" data-model="" data-uuid="{{ $clinic->uuid }}"
                                        data-table="profile_clinics" class="text-danger deleteData"><i
                                            class="fa-regular fa-trash-can" aria-hidden="true"></i></a>
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
