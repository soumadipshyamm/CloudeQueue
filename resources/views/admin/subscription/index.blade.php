@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('subscription', 'active')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/datatables/responsive.bootstrap4.min.css') }}">

@endpush
@section('content')
<div class="dashboard_mainsec">
    <!-- company Details -->
    <div class="companydetails_head">
        <h3 class="heading_title">
            Subscription List
        </h3>
        <div class="comdehead_right">
            <a href="{{ route('admin.subscription.add') }}" class="btn btn-primary">Add Subscription</a>
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
                    <th scope="col">Title</th>
                    <th scope="col">Type</th>
                    <th scope="col">Created On</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($fetchData as $key=>$subscription)
                <tr>
                    <td>{{ $key + 1 }}</td>

                    <td>
                        {{ $subscription->name ?? '' }}
                    </td>
                    <td>
                        {{ $subscription->free_subscription == 1 ? 'Free' : 'Paid' }}
                    </td>
                    <td>
                        {{ $subscription->CreatedAt ?? '' }}
                    </td>
                    <td>
                        @if ($subscription->free_subscription !== 1)
                        ₹ {{ $subscription->amount }}/{{ $subscription->payment_mode }}
                            <br>Trial:
                            <span style="color: red">{{ $subscription->trial_period }}
                                Days</span>
                        @else
                        <p>------ <br>Trial:
                            <span style="color: red">{{ $subscription->trial_period }}
                                Days</span></p>
                        @endif
                    </td>
                    <td>
                        <div class="action_box">
                            <a href="{{route('admin.subscription.features', $subscription->uuid)}}" class="text-primary" ><i class="fa fa-cog" style="cursor: pointer;" title="Manage Permission"></i></a>
                            <a href="{{route('admin.subscription.edit', $subscription->uuid)}}" class="text-primary" data-bs-toggle="" data-bs-target=""><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></a>
                            <a href="javascript:void(0)" data-model="" data-uuid="{{$subscription->uuid}}" data-table="subscriptions" class="text-danger deleteData"><i class="fa-regular fa-trash-can" aria-hidden="true"></i></a>
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
