@extends('layouts.adminMaster')
@section('title','Course')
@section('content')

    <!-- BEGIN: Content-->

    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">

            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">All Course List</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">All Course List
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('category.create')}}">
                        <button type="button" class="btn btn-primary">Add New</button>
                    </a>
                </div>
            </div>--}}
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
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Instructor</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($courses as $course)
                                    <tr class="removable-item">
                                        <td>
                                            <a href="#"> <img src="{{getImageFile($course->image_path)}}" width="80"> </a>
                                        </td>
                                        <td>
                                            {{$course->title}}
                                        </td>


                                        <td>
                                            {{$course->instructor ? $course->instructor->name : '' }}
                                        </td>
                                        <td>
                                            {{$course->category ? $course->category->name : '' }}
                                        </td>
                                        <td>
                                            {{$course->subcategory ? $course->subcategory->name : '' }}
                                        </td>
                                        <td>
                                            @if(get_currency_placement() == 'after')
                                                {{$course->price}} {{ get_currency_symbol() }}
                                            @else
                                                {{ get_currency_symbol() }} {{$course->price}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($course->status == 1)
                                                <span class="status active">Published</span>
                                            @elseif($course->status == 2)
                                                <span class="status active">Waiting for Review</span>
                                            @elseif($course->status == 3)
                                                <span class="status blocked">Hold</span>
                                            @elseif($course->status == 4)
                                                <span class="status ">Draft</span>
                                            @else
                                                <span class="status ">Pending</span>
                                            @endif
                                        </td>
                                        <td>

                                            <div class="action__buttons">

                                                <a href="{{route('course.show', [$course->uuid])}}" class="btn-action mr-30" title="View Details">
                                                    <img src="{{asset('custom/image/eye-2.svg')}}" alt="eye">
                                                </a>

                                                <a href="javascript:void(0);" data-url="{{route('course.delete', [$course->uuid])}}" class="btn-action delete" title="Delete">
                                                    <img src="{{asset('custom/image/trash-2.svg')}}" alt="trash">
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


