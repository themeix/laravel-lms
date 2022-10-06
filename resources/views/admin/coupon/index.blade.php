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
                            <table id="example" class="table table-bordered dataTables_info" style="color: black; justify-content: center; align-items: center;">
                                <thead>
                                <tr>

                                    <th>Coupon Code Name</th>
                                    <th style="width: 80px;">Start Date</th>
                                    <th style="width: 80px;">End Date</th>
                                    <th>Coupon Type</th>
                                    <th>Min Amount</th>
                                    <th>Percentage</th>
                                    <th>Max Use Limit</th>
                                    <th>Creator</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($coupons as $coupon)
                                    <tr class="removable-item">
                                        <td>{{$coupon->coupon_code_name}}</td>
                                        <td style="width: 80px;">
                                            <span class="status badge badge-glow badge-light-dark ">{{ date('d-M-y', strtotime($coupon->start_date)) }}</span>
                                        </td>
                                        <td style="width: 80px;">
                                            <span class="status badge badge-glow badge-light-dark ">{{ date('d-M-y', strtotime($coupon->end_date)) }}</span>
                                        </td>
                                        <td>
                                            @if($coupon->coupon_type == 1)
                                                <span class="status badge badge-glow bg-info">Global</span>

                                            @elseif($coupon->coupon_type == 2)
                                                <span class="status badge badge-glow bg-info">Instructor</span>

                                            @elseif($coupon->coupon_type == 3)
                                                <span class="status badge badge-glow bg-info">Course</span>

                                            @endif
                                        </td>

                                        <td>
                                            @if(get_currency_placement() == 'after')
                                                {{ $coupon->minimum_amount }} {{ get_currency_symbol() }}
                                            @else
                                                {{ get_currency_symbol() }} {{ $coupon->minimum_amount }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $coupon->percentage }}%
                                        </td>

                                        <td>
                                            {{ $coupon->maximum_use_limit }} times
                                        </td>
                                        <td>{{ @$coupon->creator->name }}</td>

                                        <td>
                                            @if($coupon->status == 1)
                                                <span class="status badge badge-glow bg-success">Active</span>
                                            @else
                                                <span class="status badge badge-glow bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="action__buttons">
                                                <a href="{{route('coupon.edit', [$coupon->uuid])}}" class="btn-action" title="Edit">
                                                    <img src="{{asset('custom/image/edit-2.svg')}}" alt="edit">
                                                </a>


                                                <form action="{{route('coupon.delete', [$coupon->uuid])}}" class="mb-0" method="post" class="d-inline">
                                                    @csrf
                                                    <a href="{{route('coupon.delete', [$coupon->uuid])}}"  class="btn-action confirm-delete"  title="Delete">
                                                        <img src="{{asset('custom/image/trash-2.svg')}}" alt="trash">
                                                    </a>

                                                </form>
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


        $(document).on('click', '.confirm-delete', function (e) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                showCancelButton: true,

                confirmButtonText: 'Yes, Delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).parent('form').trigger('submit')
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            });
            e.preventDefault();
        });
    </script>
@endpush


