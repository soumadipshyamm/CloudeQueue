@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('subscription', 'active')
@section('content')
    <div class="dashboard_mainsec">
        <!-- company Details -->
        <div class="companydetails_head">
            <h3 class="heading_title">
                {{$pageTitle}}
            </h3>
            <div class="backwardright"><a href="{{ route('admin.subscription.list') }}"><i class="fa fa-backward"></i></a></div>
        </div>
        <form action="{{ route('admin.subscription.add') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="uuid" id="uuid" value="{{ $isPatient->uuid??'' }}">
            <div class="row">
                <div class="col-md-5 adfilter-single">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" id="name"
                        placeholder="Enter Patient Name" value="{{ old('name',$data->name??'') }}">
                    @error('name')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-5 adfilter-single">
                    @if (checkFreeSubscription('') == false)
                    <label for="free_subscription" class="">Free Subscription</label>
                    <input name="free_subscription" id="free_subscription" type="checkbox" class="" value="1">
                    @error('allergy_medicine')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @endif
                </div>
                <div class="col-md-4 adfilter-single">
                    <label for="">Payment Mode</label>
                    <select class="form-control" name="payment_mode" id="payment_mode">
                        <option value="month">Month</option>
                        <option value="year">Year</option>
                    </select>
                    @error('payment_mode')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-4 adfilter-single">
                    <label for="gender">Duration</label>
                    <select name="duration" id="duration" class="form-control">
                        <option value="">----Select Duration----</option>
                        <option value="1" {{ isset($data->duration) && $data->duration == '1' ? 'selected' : '' }}> 1</option>
                        <option value="2" {{ isset($data->duration) && $data->duration == '2' ? 'selected' : '' }}> 2</option>
                        <option value="3" {{ isset($data->duration) && $data->duration == '3' ? 'selected' : '' }}> 3</option>
                        <option value="4" {{ isset($data->duration) && $data->duration == '4' ? 'selected' : '' }}> 4</option>
                        <option value="5" {{ isset($data->duration) && $data->duration == '5' ? 'selected' : '' }}> 5</option>
                        <option value="6" {{ isset($data->duration) && $data->duration == '6' ? 'selected' : '' }}> 6</option>
                        <option value="7" {{ isset($data->duration) && $data->duration == '7' ? 'selected' : '' }}> 7</option>
                        <option value="8" {{ isset($data->duration) && $data->duration == '8' ? 'selected' : '' }}> 8</option>
                        <option value="9" {{ isset($data->duration) && $data->duration == '9' ? 'selected' : '' }}> 9</option>
                        <option value="10" {{ isset($data->duration) && $data->duration == '10' ? 'selected' : '' }}>10</option>
                        <option value="11" {{ isset($data->duration) && $data->duration == '11' ? 'selected' : '' }}>11</option>
                        <option value="12" {{ isset($data->duration) && $data->duration == '12' ? 'selected' : '' }}>12</option>
                    </select>
                    @error('duration')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 adfilter-single">
                    <label for="">Amount</label>
                    <input type="number" class="form-control" name="amount" id="amount"
                        placeholder=" Enter Amount" value="{{ old('amount',$isPatient->amount ??'') }}">
                    @error('amount')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 adfilter-single">
                    <label for="alternative_mobile_no">Trial Period(How Many Days)</label>
                    <input type="number" class="form-control" name="trial_period" id="trial_period"
                        placeholder="Ent Doctor Alternative Phone Number" value="{{ old('trial_period',$isPatient->trial_period??'') }}">
                    @error('trial_period')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancle"><a href="{{ route('admin.subscription.list') }}">Cancel</a></button>
                    <button type="submit" class="btn btn-book">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('scripts')
   @endpush
