@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('clinic', 'active')
@section('content')
<div class="dashboard_mainsec">
    <!-- company Details -->
    <div class="companydetails_head">
        <h3 class="heading_title">
            Clinics List
        </h3>
        <div class="comdehead_right">
            <div class="advancefilter_box">
                <div class="adfilterb_con">
                    <p>Advance Filters</p>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
            </div>
            <div class="search_box">
                <form action="">
                    <input type="search" name="" class="form-control" placeholder="Search">
                    <button class="search_btn">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>
            <a href="{{ route('admin.clinic.add') }}" class="btn btn-primary">Add Clinic</a>
        </div>
    </div>
</div>
<!-- advance filter box -->
<div class="filter_box card-body">
    <div class="row">
        <div class="col-md-3 adfilter-single">
            <select name="" id="" class="form-control">
                <option value="City">City</option>
                <option value="Q1 (2023)">Q1 (2023)</option>
                <option value="Q2 (2023)">Q2 (2023)</option>
                <option value="Q3 (2023)">Q3 (2023)</option>
                <option value="Q4 (2023)">Q4 (2023)</option>
                <option value="Q5 (2023)">Q5 (2023)</option>
            </select>
        </div>

        <div class="col-12 text-right">
            <button class="btn btn-primary">Show Results</button>
        </div>
    </div>
</div>
<!-- company details -->
<div class="company_profiles card-body">
    <div class="table-responsive adminbio_table">
        <table class="table table-hover">
            <thead>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone No.</th>
                        <th scope="col">Alternative Phone No.</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Address</th>
                        <th scope="col">DOB</th>
                        <th scope="col">Blood Group</th>
                        <th scope="col">Allergy Medicine</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            <tbody>
                @forelse ($fetchClinicList as $key=>$clinic)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        <img src="{{ asset('assets/images/company1.png') }}" class="img-fluid" alt="">
                    </td>
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
                        {{ $clinic->gender ?? '' }}
                    </td>
                    <td>
                        {{ $clinic->address ?? '' }}
                    </td>
                    <td>
                        {{ $clinic->clientProfile->clientProfile ?? '' }}
                    </td>
                    <td>
                        {{ $clinic->clientProfile->address ?? '' }}
                    </td>
                    <td>
                        {{ $clinic->clientProfile->lat ?? '' }}
                    </td>
                    <td>
                        {{ $clinic->clientProfile->long ?? '' }}
                    </td>
                    <td>
                        {{ $clinic->clientProfile->description ?? '' }}
                    </td>

                    <td>
                        <div class="action_box">
                            <a href="#" class="text-primary" data-bs-toggle="modal" data-bs-target="#attachoppModal"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></a>
                            <a href="#" class="text-danger"><i class="fa-regular fa-trash-can" aria-hidden="true"></i></a>
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
