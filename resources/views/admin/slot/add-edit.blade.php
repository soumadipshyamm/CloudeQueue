@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('slot', 'active')
@section('content')
    <div class="dashboard_mainsec">
        <!-- company Details -->
        <div class="companydetails_head">
            <h3 class="heading_title">
                {{ $pageTitle }}
            </h3>
            <div class="backwardright"><a href="{{ route('admin.slot.list',$fetchSchedule['id']) }}"><i class="fa fa-backward"></i></a></div>
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
                        {{-- @dd($fetchSchedule['id']) --}}
                        {{-- ************************************************************************************** --}}
                        @php
                            $schedule = ['10:00', '10:05', '10:10', '10:00', '10:05', '10:10', '10:00', '10:05', '10:10', '10:00', '10:05', '10:10', '10:00', '10:05', '10:10', '10:00', '10:05', '10:10', '10:00', '10:05', '10:10', '10:00', '10:05', '10:10', '10:00', '10:05', '10:10', '10:00', '10:05', '10:10', '10:00', '10:05', '10:10', '10:00', '10:05', '10:10', '10:00', '10:05', '10:10', '10:00', '10:05', '10:10', '10:00', '10:05', '10:10', '10:00', '10:05', '10:10'];
                        @endphp
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
