@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('doctor-assigne', 'active')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/datatables/responsive.bootstrap4.min.css') }}">

@endpush
@section('content')
<div class="dashboard_mainsec">
    <!-- company Details -->
    <div class="companydetails_head">
        <h3 class="heading_title">
            Doctor Assigne List
        </h3>
        <div class="comdehead_right">

            <a href="{{ route('admin.assigne.add') }}" class="btn btn-primary">Doctor Assigne</a>
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
                    {{-- @dd($fetchData[0]->profileClinic->toArray()) --}}
                </tbody>
        </table>
    </div>
    {{-- profileClinic --}}
{{-- users --}}
</div>
</div>
@endsection
@push('scripts')

@endpush
