@extends('layouts.instructorMaster')
@section('title','All Enrolled Student')



@section('content')

    <!-- BEGIN: Content-->

    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">

            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">All Enrolled Student</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">All Enrolled Student
                                </li>
                            </ol>
                        </div>
                    </div>
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

            @if(sizeof($orderItems) > 0)

                <section id="column-search-datatable">
                    <div class="card">
                        <div class="card-body indexTable">
                            <div class="col-12">
                                <table id="example" class="table table-bordered dataTables_info"
                                       style="color: black; justify-content: center; align-items: center;">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Student Name</th>
                                        <th>Email</th>
                                        <th>Contact No</th>
                                        <th>Country</th>
                                        <th>Enrolled Course</th>
                                        <th>Purchase Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    @foreach ($orderItems as $orderItem)
                                        @php

                                            @endphp

                                        <tr class="removable-item">
                                            <td>
                                                @if(@$orderItem->order->user->image == null)
                                                    <img src="{{asset('custom/image/user-no-image.png')}}"
                                                         style="width: 50px; height: 50px; border-radius: 50%;">
                                                @else
                                                    <img src="{{getImageFile(@$orderItem->order->user->image)}}"
                                                         style="width: 50px; height: 50px; border-radius: 50%;">
                                                @endif
                                            </td>

                                            <td>{{ @$orderItem->order->user->name }}</td>


                                            <td>
                                                {{ @$orderItem->order->user->email }}
                                            </td>

                                            <td>
                                                {{ @$orderItem->order->user->phone_number }}
                                            </td>


                                            <td>
                                                {{@$orderItem->user->student->country->country_name}}
                                            </td>


                                            <td>
                                                {{ @$orderItem->course->title }}
                                            </td>

                                            <td>
                                                {{ @$orderItem->created_at->format('d/m/Y') }}
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>

            @else

                <section id="default-breadcrumb">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">No Students Found</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            @endif
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


