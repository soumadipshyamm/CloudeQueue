@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('doctor-assigne', 'active')
@section('content')
    <div class="dashboard_mainsec">
        <!-- company Details -->
        <div class="companydetails_head">
            <h3 class="heading_title">
                 Doctor Assigne
            </h3>
            <div class="backwardright"><a href="{{ route('admin.assigne.list') }}"><i class="fa fa-backward"></i></a></div>
        </div>
        <form action="{{ route('admin.assigne.add') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="uuid" id="uuid" value="{{ $data->uuid??'' }}">
            <div class="row">
                <hr>
                @if (auth()->user()->hasRole('super-admin'))
                <div class="col-md-4 adfilter-single">
                    <label for="clinicId">Clinic </label>
                    <select name="clinicId" id="clinicId" class="form-control" >
                        <option value="">------Select Clinic ------</option>
                        {{getClinic('')}}
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
                    <select name="doctorId" id="doctorId" class="form-control" required>
                        <option value="">------Select Doctor ------</option>
                        {{getDoctor('')}}
                    </select>
                    @error('doctorId')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-cancle">Cancel</button>
                    <input type="submit" class="btn btn-book" value="submit">
                </div>
            </div>
        </form>
      </div>
@endsection
@push('scripts')

@endpush
