@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('schedule', 'active')
@section('content')
    <div class="dashboard_mainsec">
        <!-- company Details -->
        <div class="companydetails_head">
            <h3 class="heading_title">
                {{ $pageTitle }}
            </h3>
            <div class="comdehead_right">
                <div class="backwardright">
                    <a href="{{ route('admin.schedule.list') }}"><i class="fa fa-backward"></i></a>
            </div>
            </div>
        </div>
        <!-- advance filter box -->

        <div class="company_profiles card-body">
            <div class="table-responsive adminbio_table">
                <table class="table table-hover dataTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Day Name</th>
                            <th scope="col">Open Time</th>
                            <th scope="col">Close Time</th>
                            <th scope="col">Slot Duration</th>
                            <th scope="col">Break Time</th>
                            {{-- <th scope="col">Break End</th> --}}
                            {{-- <th scope="col">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($fetchData->schedule as $key => $weekDay)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    {{ $weekDay['week_name']??'----' }}</td>
                                @if (isset($weekDay['times']))
                                    @forelse ($weekDay['times'] as $key => $times)
                                        <td>
                                            {{ $times['open_time']??'----' }}
                                        </td>
                                        <td>
                                            {{ $times['close_time']??'----' }}
                                        </td>
                                        <td>
                                            {{ $times['slot_duration']??'----' }}
                                        </td>
                                        @if (isset($times['break']))
                                            @forelse ($times['break'] as $key => $break)
                                                <td>{{ $break['break_start']??'----' }}--{{ $break['break_end']??'----' }}</td>
                                            @empty
                                            @endforelse
                                        @endif
                                    @empty
                                    @endforelse
                                @endif
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
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

    {{-- <a href="{{ route('admin.schedule.edit',$fetchData->id) }}" class="text-primary"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></a>
    <a href="javascript:void(0)" data-model="" data-uuid="{{ $fetchData->id }}" data-table="schedules" class="text-danger deleteData"><i class="fa-regular fa-trash-can" aria-hidden="true"></i></a> --}}


    {{--
          "week_id" => "1"
  "week_name" => "Sunday"
#	Day Name	Open Time	Close Time
array:4 [▼ // resources\views/admin/schedule-management/details.blade.php
  "open_time" => "06:03"
  "close_time" => "10:01"
  "slot_duration" => "5"
  "break" => array:2 [▼
    0 => array:2 [▼
      "break_start" => "07:00"
      "break_end" => "07:30" --}}
