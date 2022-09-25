@extends('layouts.adminMaster')
@section('title','Coupon List')



@section('content')

    <!-- BEGIN: Content-->

    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">

            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Coupon List</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Coupon List
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('coupon.create')}}">
                        <button type="button" class="btn btn-primary">Add New</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="content-body">

            @if(Session::has('create-message'))
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-primary" role="alert">
                            <div class="alert-body">
                                {{ Session::get('create-message') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if(Session::has('update-message'))
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success" role="alert">
                            <div class="alert-body">
                                {{ Session::get('update-message') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if(Session::has('delete-message'))
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="alert alert-warning" role="alert">
                            <div class="alert-body">
                                {{ Session::get('delete-message') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if(Session::has('warning-message'))
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="alert alert-warning" role="alert">
                            <div class="alert-body">
                                {{ Session::get('warning-message') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <section id="column-search-datatable">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12">
                            <table id="example" class="table table-bordered dataTables_info" style="color: black;">
                                <thead>
                                <tr>
                                    <th>sl</th>
                                    <th>Coupon Code Name</th>
                                    <th>Duration</th>
                                    <th>Details</th>
                                    <th>Creator</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($coupons as $coupon)
                                    <tr class="removable-item">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$coupon->coupon_code_name}}</td>
                                        <td>
                                            <div class="finance-table-inner-item my-2">
                                                <span class="fw-bold mr-1">Start Date:</span> {{ $coupon->start_date }}
                                            </div>

                                            <div class="finance-table-inner-item my-2">
                                                <span class="fw-bold mr-1">End Date:</span>{{ $coupon->end_date }}
                                            </div>
                                        </td>

                                        <td>
                                            <span class="fw-bold mr-1">Coupon Type:</span>
                                            @if($coupon->coupon_type == 1)
                                                Global
                                            @elseif($coupon->coupon_type == 2)
                                                Instructor
                                            @elseif($coupon->coupon_type == 3)
                                                Course
                                            @endif
                                            <br>
                                            <span class="fw-bold mr-1">Minimum Amount to Use: </span>
                                            @if(get_currency_placement() == 'after')
                                                {{ $coupon->minimum_amount }} {{ get_currency_symbol() }}
                                            @else
                                                {{ get_currency_symbol() }} {{ $coupon->minimum_amount }}
                                            @endif

                                            <br>
                                            <span class="fw-bold mr-1">Percentage: </span>{{ $coupon->percentage }}%
                                        </td>
                                        <td>{{ @$coupon->creator->name }}</td>

                                        <td>
                                            @if($coupon->status == 1)
                                                <span class="status bg-green">Active</span>
                                            @else
                                                <span class="status bg-red">Deactivated</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="action__buttons">
                                                <a href="{{route('coupon.edit', [$coupon->uuid])}}" class="btn-action" title="Edit">
                                                    <img src="{{asset('admin/images/icons/edit-2.svg')}}" alt="edit">
                                                </a>
                                                <a href="javascript:void(0);" data-url="{{route('coupon.delete', [$coupon->uuid])}}" class="btn-action delete" title="Delete">
                                                    <img src="{{asset('admin/images/icons/trash-2.svg')}}" alt="trash">
                                                </a>
                                            </div>
                                        </td>
                                    </tr>


                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- END: Content-->
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endpush


