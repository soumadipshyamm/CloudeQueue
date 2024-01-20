@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('clinic', 'active')
@push('styles')
{{-- <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/responsive.bootstrap4.min.css') }}"> --}}
@endpush
@section('content')
    <div class="dashboard_mainsec">
        <!-- company Details -->
        <div class="companydetails_head">
            <h3 class="heading_title">
                Clinic Staff List
            </h3>
            <div class="comdehead_right">
                {{-- <div class="search_box">
                    <form action="">
                        <input type="search" name="" class="form-control" placeholder="Search">
                        <button class="search_btn">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div> --}}
                <div class="backwardright"><a href="{{ route('admin.clinic.list') }}"><i class="fa fa-backward"></i></a></div>
                <a href="{{ route('admin.clinic.staff.add') }}" class="btn btn-primary">Add Staff</a>
            </div>
        </div>
    </div>
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
                    {{-- @if(!empty($fetchClinicList)) --}}
                    @php
                       $clinicUsers=$fetchClinicList->clinicUser->first();
                       @endphp
                       {{-- @dd() --}}
                    @forelse ( $clinicUsers as $key=>$clinic)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            {{-- <td>
                                <img src="{{ asset('assets/images/company1.png') }}" class="img-fluid" alt="">
                            </td> --}}
                            <td>
                                {{ $clinic->name ?? '' }}
                            </td>
                            <td>
                                {{ $clinic->email ?? '' }}
                            </td>
                            <td>
                                {{ $clinic->mobile_number ?? '' }}
                            </td>
                            <td>
                                {{ $clinic->alternative_mobile_no ?? '' }}
                            </td>
                            <td>
                                {{ $clinic->address ?? '' }}
                            </td>
                            <td>
                                <div class="action_box">
                                    <a href="{{route('admin.clinic.staff.details',$clinic->uuid)}}" class="text-primary"><i class="fa-solid fa-eye"
                                        aria-hidden="true"></i></a>
                                    <a href="{{route('admin.clinic.staff.edit',$clinic->uuid)}}" class="text-primary" ><i class="fa-regular fa-pen-to-square"
                                            aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-model="" data-uuid="{{$clinic->uuid}}" data-table="users" class="text-danger deleteData"><i class="fa-regular fa-trash-can" aria-hidden="true"></i></a>
                                </div>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                    {{-- @endif --}}
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
@push('scripts')
@endpush
