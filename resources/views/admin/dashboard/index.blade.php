@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('dashboard', 'active')
@section('content')
    <div class="dashboard_mainsec">
        <!-- statistical information -->
        <h3 class="heading_title">Statistical Information</h3>
        <div class="stats_box row">
            <div class="col-lg-4 col-md-4 col-12">
                <div class="statsb_single">
                    <div class="statright_box">
                        <img src="{{ asset('assets/images/statistical_clinicsicon.png') }}" class="img-fluid" alt="" />
                    </div>
                    <div class="statmain_box">
                        <h3>Clinics</h3>
                        <div class="weekbox">
                            <p>100 +</p>
                            <h6 class="text-success">
                                <span><img src="{{ asset('assets/images/up-green.svg') }}" alt="" /></span>45%
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="statsb_single">
                    <div class="statright_box">
                        <img src="{{ asset('assets/images/healthicons_doctor-icon.png') }}" class="img-fluid"
                            alt="" />
                    </div>
                    <div class="statmain_box">
                        <h3>Doctors</h3>
                        <div class="weekbox">
                            <p>100 +</p>
                            <h6 class="text-success">
                                <span><img src="{{ asset('assets/images/up-green.svg') }}" alt="" /></span>45%
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="statsb_single">
                    <div class="statright_box">
                        <img src="{{ asset('assets/images/mingcute_user-icon.png') }}" class="img-fluid" alt="" />
                    </div>
                    <div class="statmain_box">
                        <h3>App Users</h3>
                        <div class="weekbox">
                            <p>100 +</p>
                            <h6 class="text-danger">
                                <span><img src="{{ asset('assets/images/up-green.svg') }}" alt="" /></span>45%
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="statsb_single">
                    <div class="statright_box">
                        <img src="{{ asset('assets/images/guidance_care-staff-area.png') }}" class="img-fluid"
                            alt="" />
                    </div>
                    <div class="statmain_box">
                        <h3>Staffs</h3>
                        <div class="weekbox">
                            <p>100 +</p>
                            <h6 class="text-success">
                                <span><img src="{{ asset('assets/images/up-green.svg') }}" alt="" /></span>45%
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="statsb_single">
                    <div class="statright_box">
                        <img src="{{ asset('assets/images/Bookings_icon.png') }}" class="img-fluid" alt="" />
                    </div>
                    <div class="statmain_box">
                        <h3>Bookings</h3>
                        <div class="weekbox">
                            <p>100 +</p>
                            <h6 class="text-success">
                                <span><img src="{{ asset('assets/images/up-green.svg') }}" alt="" /></span>45%
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="statsb_single">
                    <div class="statright_box">
                        <img src="{{ asset('assets/images/grommet-icons_transaction.png') }}" class="img-fluid"
                            alt="" />
                    </div>
                    <div class="statmain_box">
                        <h3>Transactions</h3>
                        <div class="weekbox">
                            <p>100 +</p>
                            <h6 class="text-success">
                                <span><img src="{{ asset('assets/images/up-green.svg') }}" alt="" /></span>45%
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- overview box -->
        {{-- <div class="row">
        <!-- application overview -->
        <div class="col-md-6">
            <div class="geostat_head">
                <h3 class="heading_title">Statistics</h3>
            </div>
            <div class="geostat_body card-body">
                <div class="geostatb_head">
                    <h6>Statistics</h6>
                    <p>Lorem ipsum dolor sit amet, consec</p>
                    <div class="geostatbh_dropbox smartdiagbh_right">
                        <select name="" id="" class="form-control">
                            <option value="State">State</option>
                            <option value="Q1 (2023)">Q1 (2023)</option>
                            <option value="Q2 (2023)">Q2 (2023)</option>
                            <option value="Q3 (2023)">Q3 (2023)</option>
                            <option value="Q4 (2023)">Q4 (2023)</option>
                            <option value="Q5 (2023)">Q5 (2023)</option>
                        </select>
                        <select name="" id="" class="form-control">
                            <option value="Q1 (2023)">Q1 (2023)</option>
                            <option value="Q2 (2023)">Q2 (2023)</option>
                            <option value="Q3 (2023)">Q3 (2023)</option>
                            <option value="Q4 (2023)">Q4 (2023)</option>
                            <option value="Q5 (2023)">Q5 (2023)</option>
                        </select>
                    </div>
                </div>
                <div class="geostatb_chart">
                    <!-- char js try -->
                    <div id="piechart"></div>
                </div>
            </div>
        </div>
        <!-- geographical statistics -->
        <div class="col-md-6">
            <div class="geostat_head">
                <h3 class="heading_title">Statistics</h3>
            </div>
            <div class="geostat_body card-body">
                <div class="geostatb_head">
                    <h6>Statistics</h6>
                    <p>Lorem ipsum dolor sit amet, consec</p>
                    <div class="geostatbh_dropbox smartdiagbh_right">
                        <select name="" id="" class="form-control">
                            <option value="State">State</option>
                            <option value="Q1 (2023)">Q1 (2023)</option>
                            <option value="Q2 (2023)">Q2 (2023)</option>
                            <option value="Q3 (2023)">Q3 (2023)</option>
                            <option value="Q4 (2023)">Q4 (2023)</option>
                            <option value="Q5 (2023)">Q5 (2023)</option>
                        </select>
                        <select name="" id="" class="form-control">
                            <option value="Q1 (2023)">Q1 (2023)</option>
                            <option value="Q2 (2023)">Q2 (2023)</option>
                            <option value="Q3 (2023)">Q3 (2023)</option>
                            <option value="Q4 (2023)">Q4 (2023)</option>
                            <option value="Q5 (2023)">Q5 (2023)</option>
                        </select>
                    </div>
                </div>
                <div class="geostatb_chart">
                    <!-- char js try -->
                    <div id="piechart2"></div>
                </div>
            </div>
        </div>
    </div> --}}
        @if ($data->type === 'clinic' || $data->type === 'super-admin')
            <!-- company profiles -->
            <h3 class="heading_title">
                Clinics <span><a href="{{ route('admin.clinic.list') }}">View all</a></span>
            </h3>
            <div class="company_profiles card-body">
                <div class="table-responsive adminbio_table">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Clinic Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Address</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($clinicUser as $clinic)
                                {{-- @dd($clinic->clinicUser[0]['clinic_name']) --}}
                                <tr>
                                    <td>
                                        <div class="companyn_box">
                                            <div class="companyb_img">
                                                <p class="table-con">
                                                    {{ $clinic?->clinicUser[0]['clinic_name'] ?? '' }}<br /><span>{{ $clinic?->clinicUser[0]['phone']?? '' }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="table-con"><span>{{ $clinic?->clinicUser[0]['email']??"" }}</span></p>
                                    </td>
                                    <td>
                                        <p class="table-con">
                                            <span>{{ $clinic?->clinicUser[0]['address'] ??''}}</span>
                                        </p>
                                    </td>
                                    <td>
                                        <div class="actionbox">
                                            <a href="{{ route('admin.clinic.details', $clinic?->clinicUser[0]['uuid']??'') }}"
                                                class="text-primary"><i class="fa-solid fa-eye" title="clinic details"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        @if ($data->type === 'doctor' || $data->type === 'super-admin')
            <!-- company profiles -->
            <h3 class="heading_title">
                Doctors <span><a href="{{ route('admin.doctor.list') }}">View all</a></span>
            </h3>
            <div class="company_profiles card-body">
                <div class="table-responsive adminbio_table">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Doctors Name</th>
                                <th scope="col">Reg No.</th>
                                <th scope="col">Specialization</th>
                                <th scope="col">Qualifaction</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($doctorUser as $doctor)
                                <tr>
                                    <td>
                                        <div class="companyn_box">
                                            <div class="companyb_img">
                                                <p class="table-con">
                                                    {{ $doctor->name }}<br /><span>{{ $doctor->mobile_number }}</span><br /><a
                                                        href="mailto:{{ $doctor->email }}">{{ $doctor->email }}</a>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="table-con">
                                            <span>{{ $doctor?->doctorProfile?->registration_number }}</span></p>
                                    </td>
                                    <td>
                                        <p class="table-con"><span>{{ $doctor?->doctorProfile?->category?->name }}</span>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="table-con"><span>{{ $doctor?->doctorProfile?->qualifaction }}</span></p>
                                    </td>
                                    <td>
                                        <div class="actionbox">
                                            <a href="{{ route('admin.doctor.details', $doctor->uuid) }}"
                                                class="text-primary"><i class="fa-solid fa-eye"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        @if ($data->type === 'patient' || $data->type === 'doctor' || $data->type === 'super-admin')
            <!-- company profiles -->
            <h3 class="heading_title">
                Patients <span><a href="{{ route('admin.patient.list') }}">View all</a></span>
            </h3>
            <div class="company_profiles card-body">
                <div class="table-responsive adminbio_table">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Patients Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Address</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($patientUser as $patient)
                                <tr>
                                    <td>
                                        <div class="companyn_box">
                                            <div class="companyb_img">
                                                <img src="assets/images/company1.png" class="img-fluid" alt="" />
                                                <p class="table-con">
                                                    {{ $patient->name }}<br /><span>{{ $patient->mobile_number }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="table-con"><span>{{ $patient->email }}</span></p>
                                    </td>
                                    <td>
                                        <p class="table-con">
                                            <span>{{ $patient->address }}</span>
                                        </p>
                                    </td>
                                    <td>
                                        <div class="actionbox">
                                            <a href="{{ route('admin.patient.details', $patient->uuid) }}"
                                                class="text-primary"><i class="fa-solid fa-eye"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection
