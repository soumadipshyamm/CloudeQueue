@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('subscription', 'active')
@section('content')
    <div class="dashboard_mainsec">
        <!-- company Details -->
        <div class="companydetails_head">
            <h3 class="heading_title">
                Manage Subscription Features
            </h3>
            <div class="comdehead_right">
                <div class="backwardright"><a href="{{ route('admin.subscription.list') }}"><i class="fa fa-backward"></i></a></div>
            </div>
        </div>
    </div>
    <!-- advance filter box -->
    <div class="company_profiles card-body">
        <div class="table-responsive adminbio_table">
            <h4>Features</h4>
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
