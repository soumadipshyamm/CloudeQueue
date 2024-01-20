@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('schedule', 'active')
@section('content')
    <div class="dashboard_mainsec">
        <!-- company Details -->
        <div class="companydetails_head">
            <h3 class="heading_title">
                {{ $pageTitle }}
            </h3>
            <div class="backwardright"><a href="{{ route('admin.schedule.list') }}"><i class="fa fa-backward"></i></a></div>
        </div>
        {{-- @dd($data) --}}
        {{-- <div class="company_profiles card-body"> --}}
        {{-- <div class="clinicdetail-sect"> --}}
        <form action="{{ route('admin.schedule.add') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="uuid" id="uuid" value="{{ $data->id ?? '' }}">
            <div class="row">
                {{-- ******************************************************************************************************************** --}}
                <div class="company_profiles card-body">
                    <div class="row">
                        {{-- <hr> --}}
                        {{-- <div class="clinicdetail-sect"> --}}
                        @if (auth()->user()->hasRole('super-admin'))
                            <div class="col-md-4 adfilter-single">
                                <label for="clinicId">Clinic </label>
                                <select name="clinicId" id="clinicId" class="form-control">
                                    <option value="">------Select Clinic ------</option>
                                    {{ getClinic($data->profile_clinics_id ?? '') }}
                                </select>
                                @error('clinicId')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        @endif
                        <div class="col-md-4 adfilter-single">
                            <label for="doctorId">Doctor </label>
                            <select name="doctorId" id="doctorId" class="form-control">
                                <option value="">------Select Doctor ------</option>
                                {{ getDoctor($data->user_id ?? '') }}
                            </select>
                            @error('doctorId')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @php
                            $allergyMedicine = old('allergy_medicine') ?? (isset($isPatient) ? $isPatient->patientProfile?->allergy_medicine : '');
                        @endphp
                        <div class="col-md-4 adfilter-single">
                            <label for="">Valid Till</label>
                            <input type="date" class="form-control" name="valid_date" id="valid_date"
                                placeholder="Select Date" value="{{ old('valid_date', $data->valid_date ?? '') }}">
                            @error('valid_date')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- **************************************Clinic Staff Details************************************** --}}
                <h4>Schedule Time</h4>
                {{-- <hr> --}}
                @php
                    if (isset($data->id) && !empty($data->schedule)) {
                        $schedule = $data->schedule;
                    } else {
                        $schedule = weekDays();
                    }
                @endphp
                @foreach ($schedule as $key => $available_day)
                    <div class="company_profiles card-body">
                        <div class="adddFiled row">
                            <div class="col-md-2 adfilter-single">
                                <label for="">Available Day</label>
                                <div class="input-group">
                                    <h2 class="text-lg font-medium mr-auto">{{ $available_day['name'] }}</h2>
                                </div>
                            </div>

                            <div class="col-md-10 timing_sec" data-key={{ $key }}>
                                <div class="row timing_row">
                                    <div class="col-md-2 adfilter-single">
                                        <label for="">Available From</label>
                                        <input type="time" class="timepicker form-control"
                                            name="available_from[{{ $available_day['name'] }}][]"
                                            placeholder="enter start time" autocomplete="off">

                                        @error('available_from')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 adfilter-single">
                                        <label for="">Available To</label>
                                        <input type="time" class=" timepicker form-control"
                                            name="available_to[{{ $available_day['name'] }}][]"
                                            placeholder="enter end time">
                                        @error('available_from')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 adfilter-single">
                                        <label for="">Number of Patient</label>
                                        <input type="number" class="form-control"
                                            name="available_person[{{ $available_day['name'] }}][]"
                                            placeholder="enter slot duration">
                                        @error('available_from')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 break_sec">
                                        <div class="d-flex break_flex">
                                            <div class="adfilter-single">
                                                <label for="">Break From</label>
                                                <input type="time" class="timepicker form-control"
                                                    name="break_from[{{ $available_day['name'] }}][]"
                                                    placeholder="enter start time" value="">
                                                @error('available_from')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="adfilter-single">
                                                <label for="">Break To</label>
                                                <input type="time" class="timepicker form-control"
                                                    name="break_to[{{ $available_day['name'] }}][]"
                                                    placeholder="enter end time" value="">
                                                @error('available_from')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <a href="javascript:void(0)" class="add_break" data-length="0"> <i
                                                class="fa fa-plus"></i></a>
                                    </div>
                                    <div class="col-md-1">
                                        <a href="javascript:void(0)" class="add_newbox"
                                            data-id="{{ $available_day['id'] }}">
                                            <i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="modal-footer">
                    <a href="{{ route('admin.schedule.list') }}"><button type="button"
                            class="btn btn-cancle">Cancel</button></a>
                    <input type="submit" class="btn btn-book" value="submit">
                </div>
            </div>
    </div>
    </form>
    {{-- </div> --}}
    </div>
    </div>
@endsection
@push('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            $('input.timepicker').timepicker();
            var i = 1;
            var data = $('.additional_fields').val();

            var $dynamicContainer = $(".adddFiled");

            var content = '';

            $(document).on("click", ".add_newbox", function() {
                var key = $(this).closest(".timing_sec").attr("data-key")
                var length = $(this).closest(".timing_sec").find(".timing_row").length
                $(this).closest(".timing_sec").append(generateFieldHtml('', '', key, length))

            });
            $(document).on("click", ".add_break", function() {
                var key = $(this).closest(".timing_sec").attr("data-key")
                var length = $(this).attr("data-length")
                var break_length = $(this).closest(".break_sec").find(".break_flex").length
                $(this).closest(".break_sec").append(`<div class="d-flex break_flex">
                                        <div class="adfilter-single">
                                            <label for="">Break Start</label>
                                            <input type="time" class="form-control"
                                                name="break_from[{{ $available_day['name'] }}][]"
                                                placeholder="enter start time" value="">
                                        </div>
                                        <div class="adfilter-single">
                                            <label for="">Break End</label>
                                            <input type="time" class="form-control"
                                                name="break_to[{{ $available_day['name'] }}][]"
                                                placeholder="enter end time" value="">
                                        </div>
                                        <a href="javascript:void(0)" class="remove-break"> <i
                                            class="fa fa-trash"></i></a>
                                    </div>`)
            })
            $(document).on("click", ".remove-input-field", function() {
                $(this).closest(".timing_row").remove()
            })

            function generateFieldHtml(name, value, key, length) {

                return `<div class="row timing_row">
                                <div class="col-md-2 adfilter-single">
                                    <label for="">Start Time</label>
                                    <input type="time" class="form-control"
                                        name="available_from[{{ $available_day['name'] }}][]"
                                        placeholder="enter start time" value="">
                                </div>
                                <div class="col-md-2 adfilter-single">
                                    <label for="">End Time</label>
                                    <input type="time" class="form-control"
                                        name="available_to[{{ $available_day['name'] }}][]"
                                        placeholder="enter end time" value="">
                                </div>
                                <div class="col-md-3 adfilter-single">
                                    <label for="">Slot Duration(in Min)</label>
                                    <input type="number" class="form-control"
                                        name="available_person[{{ $available_day['name'] }}][]"
                                        placeholder="enter slot duration" value="">
                                </div>
                                <div class="col-md-4 break_sec">
                                    <div class="d-flex break_flex">
                                        <div class="adfilter-single">
                                            <label for="">Break Start</label>
                                            <input type="time" class="form-control"
                                                name="break_from[{{ $available_day['name'] }}][]"
                                                placeholder="enter start time" value="">
                                        </div>
                                        <div class="adfilter-single">
                                            <label for="">Break End</label>
                                            <input type="time" class="form-control"
                                                name="break_to[{{ $available_day['name'] }}][]"
                                                placeholder="enter end time" value="">
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" class="add_break" data-length="${length}"> <i
                                        class="fa fa-plus"></i></a>
                                </div>
                                <div class="col-md-1">
                                    <a href="javascript:void(0)" class="add_newbox" data-id="{{ $available_day['id'] }}"> <i
                                    class="fa fa-plus"></i></a>
                                </div>
                            </div>`
            }

        });
    </script>
@endpush
