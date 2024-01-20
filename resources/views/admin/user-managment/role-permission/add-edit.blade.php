@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('role-permission', 'active')
@section('content')
    <div class="dashboard_mainsec">
        <!-- company Details -->
        <div class="companydetails_head">
            <h3 class="heading_title">
                {{ $pageTitle }}
            </h3>
            <div class="backwardright"><a href="{{ route('admin.role-permission.list') }}"><i class="fa fa-backward"></i></a>
            </div>
        </div>
        <form action="{{ route('admin.role-permission.add') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="uuid" id="uuid" value="{{ $data->uuid ?? '' }}">
            <div class="row">
                <div class="col-md-4 adfilter-single">
                    <label for="role">Role</label>
                    <input type="text" class="form-control" name="role" id="role" placeholder="Enter Role"
                        value="{{ old('role', $data->role ?? '') }}">
                    @error('role')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancle">Cancel</button>
                    <button type="submit" class="btn btn-book">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('scripts')
    <script>
        $('.allergyMedicine').on('change', function(e) {
            $('#description').prop('readonly', true);
            let data = $(this).val();
            if (data == 'yes') {
                $('#description').prop('readonly', false);
            }
        });
    </script>
@endpush
