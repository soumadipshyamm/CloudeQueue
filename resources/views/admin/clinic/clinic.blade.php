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
            {{ $pageTitle }}
        </h3>
        <div class="comdehead_right">
            <div class="backwardright"><a href="{{ route('admin.doctor.list') }}"><i class="fa fa-backward"></i></a></div>
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
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone No.</th>
                    <th scope="col">Alternative Phone No.</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($isUser->schedules as $key=>$schedule)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            {{ $schedule?->profileClinic?->clinic_name ?? '' }}
                        </td>
                        <td>
                            {{ $schedule?->profileClinic?->email ?? '' }}
                        </td>
                        <td>
                            {{ $schedule?->profileClinic?->phone ?? '' }}
                        </td>
                        <td>
                            {{ $schedule?->profileClinic?->alt_phone ?? '' }}
                        </td>
                        <td>
                            {{ $schedule?->profileClinic?->address ?? '' }}
                        </td>
                        <td>
                            <div class="action_box">
                                <a href="{{ route('admin.clinic.details', $schedule?->profileClinic?->uuid) }}" class="text-primary"><i
                                        class="fa-solid fa-eye" title="clinic details" aria-hidden="true"></i></a>
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
