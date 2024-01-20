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
        <form action="{{ route('admin.schedule.add') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="uuid" id="uuid" value="{{ $data->id ?? '' }}">
            <div class="row">
                {{-- ******************************************************************************************************************** --}}
                <hr>
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
                    <input type="date" class="form-control" name="valid_date" id="valid_date" placeholder="Select Date"
                        value="{{ old('valid_date', $data->valid_date ?? '') }}">
                    @error('valid_date')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- **************************************Clinic Staff Details************************************** --}}
                <h4>Schedule Time</h4>
                <hr>
                @php
                    if (isset($data->id) && !empty($data->schedule)) {
                        $schedule = $data->schedule;
                    } else {
                        $schedule = weekDays();
                    }
                @endphp
                @foreach ($schedule as $key => $weekDay)
                    {{-- @dd($weekDay) --}}
                    <div class="adddFiled row">
                        <div class="col-md-2 adfilter-single">
                            <label for="">Week Name</label>
                            <input type="hidden" name="schedule[{{ $key }}][week_id]"
                                value="{{ $weekDay['week_id'] ?? $weekDay['id'] }}">
                            <input type="text" class="form-control" name="schedule[{{ $key }}][week_name]"
                                id="week_name" value="{{ $weekDay['week_name'] ?? $weekDay['name'] }}" readonly>
                        </div>
                        <div class="col-md-10 timing_sec" data-key={{ $key }}>
                            <div class="row timing_row">
                                <div class="col-md-2 adfilter-single">
                                    <label for="">Start Time</label>
                                    <input type="time" class="form-control"
                                        name="schedule[{{ $key }}][times][0][open_time]"
                                        placeholder="enter start time" value="{{ $weekDay['open_time'] }}">
                                </div>
                                <div class="col-md-2 adfilter-single">
                                    <label for="">End Time</label>
                                    <input type="time" class="form-control"
                                        name="schedule[{{ $key }}][times][0][close_time]"
                                        placeholder="enter end time" value="{{ $weekDay['close_time'] }}">
                                </div>
                                <div class="col-md-3 adfilter-single">
                                    <label for="">Slot Duration(in Min)</label>
                                    <input type="number" class="form-control"
                                        name="schedule[{{ $key }}][times][0][slot_duration]"
                                        placeholder="enter slot duration" value="{{ $weekDay['slot_duration'] }}">
                                </div>
                                <div class="col-md-4 break_sec">
                                    <div class="d-flex break_flex">
                                        <div class="adfilter-single">
                                            <label for="">Break Start</label>
                                            <input type="time" class="form-control"
                                                name="schedule[{{ $key }}][times][0][break][0][break_start]"
                                                placeholder="enter start time" value="{{ $weekDay['break_start'] }}">
                                        </div>
                                        <div class="adfilter-single">
                                            <label for="">Break End</label>
                                            <input type="time" class="form-control"
                                                name="schedule[{{ $key }}][times][0][break][0][break_end]"
                                                placeholder="enter end time" value="{{ $weekDay['break_end'] }}">
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" class="add_break" data-length="0"> <i
                                            class="fa fa-plus"></i></a>
                                </div>
                                <div class="col-md-1">
                                    <a href="javascript:void(0)" class="add_newbox" data-id="{{ $weekDay['id'] }}"> <i
                                            class="fa fa-plus"></i></a>
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
        </form>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            var i = 1;
            var data = $('.additional_fields').val();

            var $dynamicContainer = $(".adddFiled");

            var content = '';

            $(document).on("click", ".add_newbox", function() {
                var key = $(this).closest(".timing_sec").attr("data-key")
                var length = $(this).closest(".timing_sec").find(".timing_row").length
                $(this).closest(".timing_sec").append(generateFieldHtml('', '', key, length))
                // $(generateFieldHtml('', '')).insertAfter($(this).closest(".adddFiled"))
                // i++;
            });
            $(document).on("click", ".add_break", function() {
                var key = $(this).closest(".timing_sec").attr("data-key")
                var length = $(this).attr("data-length")
                var break_length = $(this).closest(".break_sec").find(".break_flex").length
                $(this).closest(".break_sec").append(`<div class="d-flex break_flex">
                                        <div class="adfilter-single">
                                            <label for="">Break Start</label>
                                            <input type="time" class="form-control"
                                                name="schedule[${key}][times][${length}][break][${break_length}][break_start]"
                                                placeholder="enter start time" value="{{ $weekDay['break_start'] }}">
                                        </div>
                                        <div class="adfilter-single">
                                            <label for="">Break End</label>
                                            <input type="time" class="form-control"
                                                name="schedule[${key}][times][${length}][break][${break_length}][break_end]"
                                                placeholder="enter end time" value="{{ $weekDay['break_end'] }}">
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
                                        name="schedule[${key}][times][${length}][open_time]"
                                        placeholder="enter start time" value="{{ $weekDay['open_time'] }}">
                                </div>
                                <div class="col-md-2 adfilter-single">
                                    <label for="">End Time</label>
                                    <input type="time" class="form-control"
                                        name="schedule[${key}][times][${length}][close_time]"
                                        placeholder="enter end time" value="{{ $weekDay['close_time'] }}">
                                </div>
                                <div class="col-md-3 adfilter-single">
                                    <label for="">Slot Duration(in Min)</label>
                                    <input type="number" class="form-control"
                                        name="schedule[${key}][times][${length}][slot_duration]"
                                        placeholder="enter slot duration" value="{{ $weekDay['slot_duration'] }}">
                                </div>
                                <div class="col-md-4 break_sec">
                                    <div class="d-flex break_flex">
                                        <div class="adfilter-single">
                                            <label for="">Break Start</label>
                                            <input type="time" class="form-control"
                                                name="schedule[${key}][times][${length}][break][0][break_start]"
                                                placeholder="enter start time" value="{{ $weekDay['break_start'] }}">
                                        </div>
                                        <div class="adfilter-single">
                                            <label for="">Break End</label>
                                            <input type="time" class="form-control"
                                                name="schedule[${key}][times][${length}][break][0][break_end]"
                                                placeholder="enter end time" value="{{ $weekDay['break_end'] }}">
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" class="add_break" data-length="${length}"> <i
                                        class="fa fa-plus"></i></a>
                                </div>
                                <div class="col-md-1">
                                    <a href="javascript:void(0)" class="add_newbox" data-id="{{ $weekDay['id'] }}"> <i
                                    class="fa fa-plus"></i></a>
                                </div>
                            </div>`
                //     return `
            //     <div class="form-row">
            // <div class="col-md-4 adfilter-single">
            //             <label for="">Open Time</label>
            //             <input type="time" class="form-control" name="schedule[{{ $key }}][times][${i}][open_time]"
            //                 id="open_time_${i}" placeholder="enter Clinic Open Time." value="{{ $weekDay['open_time'] }}">
            //         </div>
            //         <div class="col-md-4 adfilter-single">
            //             <label for="">Close Time</label>
            //             <input type="time" class="form-control"
            //                 name="schedule[{{ $key }}][times][${i}][close_time]" id="close_time_${i}"
            //                 placeholder="enter Clinic Close Time." value="{{ $weekDay['close_time'] }}">
            //         </div>
            //         <button type="button" class="btn btn-outline-danger remove-input-field">Delete</button>
            //         </div>
            //     `;
            }

        });
    </script>
@endpush
