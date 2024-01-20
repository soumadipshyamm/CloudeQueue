@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('schedule', 'active')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/datatables/responsive.bootstrap4.min.css') }}">

@endpush
@section('content')
<div class="dashboard_mainsec">
    <!-- company Details -->
    <div class="companydetails_head">
        <h3 class="heading_title">
            Schedule List
        </h3>
        <div class="comdehead_right">
            <a href="{{ route('admin.schedule.add') }}" class="btn btn-primary">Add Schedule</a>
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
                    <th scope="col">Clinic Name</th>
                    <th scope="col">Doctor Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($fetchData as $key=>$schedule)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        {{ $schedule->profileClinic->clinic_name ?? '' }}
                    </td>
                    <td>
                        {{ $schedule->users->name ?? '' }}
                    </td>
                    <td>
                        <div class="action_box">
                            <a href="{{ route('admin.schedule.doctorScheduleList',$schedule->users->id) }}" class="text-primary" ><i class="fa fa-calendar" aria-hidden="true"></i></a>
                            {{-- <a href="{{ route('admin.slot.list',$schedule->id) }}" class="text-primary" ><i class="fa-regular fa-calendar-check" aria-hidden="true"></i></a> --}}
                            <a href="{{ route('admin.schedule.edit',$schedule->id) }}" class="text-primary"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></a>
                            <a href="javascript:void(0)" data-model="" data-uuid="{{ $schedule->id }}" data-table="schedules" class="text-danger deleteData"><i class="fa-regular fa-trash-can" aria-hidden="true"></i></a>
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
