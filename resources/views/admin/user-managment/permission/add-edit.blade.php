@extends('layouts.app', ['isSidebar' => true, 'isNavbar' => true, 'isFooter' => true])
@section('role-permission', 'active')
@section('content')
    <div class="dashboard_mainsec">
        <!-- company Details -->
        <div class="companydetails_head">
            <h3 class="heading_title">
                {{ $pageTitle }}
            </h3>
            <div class="comdehead_right">

                {{-- <a href="{{ route('admin.role-permission.add') }}" class="btn btn-primary">Add Role</a> --}}
            </div>
        </div>
    </div>
    <!-- advance filter box -->

    <!-- company details -->
    <div class="company_profiles card-body">
        <div class="table-responsive adminbio_table">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                {{-- <tbody>
                    @forelse ( $fetchAll as $key=>$role )
                    <tr>
                        <td>{{$key +1}}</td>
                        <td>{{$role->name}}</td>
                        <td>
                            <div class="action_box">
                                <a href="{{route('admin.role-permission.permission', $role->id)}}" class="text-primary" ><i class="fa fa-cog" style="cursor: pointer;" title="Manage Permission"></i></a>
                                <a href="{{route('admin.role-permission.edit', $role->id)}}" class="text-primary" data-bs-toggle="" data-bs-target=""><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></a>
                                <a href="javascript:void(0)" data-model="" data-uuid="{{ $role->id }}" data-table="users" class="text-danger deleteData"><i class="fa-regular fa-trash-can" aria-hidden="true"></i></a>
                            </div>
                        </td>
                       </tr>
                    @empty

                    @endforelse

                </tbody> --}}
            </table>
        </div>
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
