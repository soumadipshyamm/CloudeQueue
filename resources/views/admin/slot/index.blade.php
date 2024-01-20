@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('slot', 'active')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/responsive.bootstrap4.min.css') }}">
@endpush
@section('content')
    <div class="dashboard_mainsec">
        <!-- company Details -->
        <div class="companydetails_head">
            <h3 class="heading_title">
                Week Days List
            </h3>
            <div class="comdehead_right">
                <div class="backwardright">
                    <a href="{{ route('admin.schedule.list') }}"><i class="fa fa-backward"></i></a>
                </div>
            </div>
        </div>
        <div class="company_profiles card-body">
            <div class="row">
                <div class="col-4">
                    <p>Clinic Name: {{ $fetchSchedule->first()->profileClinic->clinic_name }}</p>
                </div>
                <div class="col-4">
                    <p> Doctor Name: {{ $fetchSchedule->first()->users->name }}</p>
                </div>
                <div class="col-4">
                    <p> Date : {{ $date }}</p>
                </div>
            </div>
        </div>
        <div class="company_profiles card-body">
            <div class="clinicdetail-sect">
                <form action="{{ route('admin.schedule.add') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="uuid" id="uuid" value="{{ $data->id ?? '' }}">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 adfilter-single">
                            <div class="doctor-details-style clinicsheading_title">
                                Slot Booking
                            </div>
                        </div>
                        {{-- @dd($fetchSchedule->schedule[0]['times'][0]) --}}
                        {{-- ************************************************************************************** --}}
                        @php
                            $schedule = getTimeIncruse('2:00','5:30');
                        @endphp

                        {{-- @dd(getTimeIncruse('2:00','5:30')) --}}
                        {{-- 2:00 5:30  --}}
                        {{-- ************************************************************************************** --}}
                        <div class="stats_box row">
                            @foreach ($schedule as $key => $weekDay)
                                <div class="col">
                                    <a href="#">
                                        <div class="slot_statsb_single">
                                            <div class="statmain_box">
                                                <p class="slot_text-dsgn">{{ $weekDay }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('admin.schedule.list') }}"><button type="button"
                                    class="btn btn-cancle">Cancel</button></a>
                            <input type="submit" class="btn btn-book" value="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush
