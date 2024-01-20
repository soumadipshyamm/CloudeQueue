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
                <div class="col-6">
                    <h5>Clinic Name: {{ $fetchSchedule?->first()->profileClinic?->clinic_name ?? '' }}</h5>
                </div>
                <div class="col-6">
                    <h5> Doctor Name: <b>{{ $fetchSchedule?->first()->users?->name ?? '' }}</b></h5>
                </div>
            </div>
        </div>
        <div class="company_profiles card-body">
            <div class="stats_box row">
                @for ($i = 1; $i <= 20; $i++)
                    <div class="col-2">
                        <div class="statsb_single">
                            <input type="radio" id="date{{ $i }}" name="booking_date"
                                value="{{ \Carbon\Carbon::today()->addDays($i)->format('Y-m-d') }}" class="booking_date">
                                <label for="date{{ $i }}" class="statmain_box">
                                    {{ \Carbon\Carbon::today()->addDays($i)->format('D') }}
                                    <h6>
                                        {{ \Carbon\Carbon::today()->addDays($i)->format('d') }}
                                    </h6>
                                    {{ \Carbon\Carbon::today()->addDays($i)->format('M') }}
                                </label>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
        <div class="company_profiles card-body">
            <div class="time_row">
                <div class="stats_box row">
                    @php
                        $startPeriod = \Carbon\Carbon::parse('8:00');
                        $endPeriod = \Carbon\Carbon::parse('24:00');
                        $period = \Carbon\CarbonPeriod::create($startPeriod, '15 minutes', $endPeriod);
                    @endphp
                    @foreach ($period as $k => $time)
                        <div class="col">
                            <div class="slot_statsb_single">
                                <input id="time{{ $k }}" type="radio" name="booking_time"
                                    value="{{ $time }}" class="booking_time">
                                <div class="statmain_box">
                                    <label for="time{{ $k }}" class="slot_text-dsgn">
                                        {{ $time->format('h:i A') }}
                                    </label>
                                </div>
                            </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $(document).on("change", "#booking_for", function() {
                if ($(this).val() == 'other') {
                    $('.booking_for_other').fadeIn();
                } else {
                    $('.booking_for_other').fadeOut();
                }
            });
            $("#booking_for").trigger("change");
            $(document).on("change", ".booking_date", function() {
                $('.booking_time').prop('checked', false);
                $('.time_row').fadeIn();
            });
        });
    </script>
@endpush
