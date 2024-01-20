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
                        {{-- <th scope="col">Image</th> --}}
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone No.</th>
                        <th scope="col">Alternative Phone No.</th>
                        <th scope="col">Specialization</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            <tbody>
                @forelse ($fetchDoctorList as $key=>$doctor)
                    @if(auth()->user()->type == 'clinic')
                        <x-doctor.list :userData='$doctor->users' :key='$key'/>
                    @else
                        <x-doctor.list :userData='$doctor' :key='$key'/>
                    @endif
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
