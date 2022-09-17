@extends('layouts.adminMaster')
@section('title','Category List')
@section('content')

    <!-- BEGIN: Content-->


    @if(Session::has('message'))

        <div class="toast-container">
            <div class="toast basic-toast position-fixed top-0 end-0 m-2" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img
                        src="{{asset('logo.svg')}}"
                        class="me-1"
                        alt="Toast image"
                        height="18"
                        width="25"
                    />
                    <strong class="me-auto">Learn</strong>
                    {{--<small class="text-muted">11 mins ago</small>--}}
                    <button type="button" class="ms-1 btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ Session::get('message') }}
                </div>
            </div>
        </div>
    @endif


    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Course Category List</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Course Category List
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('category.create')}}">
                        <button type="button" class="btn btn-primary">Add New</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="ajax-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            {{--<div class="card-header border-bottom">
                                <h4 class="card-title">Ajax Sourced Server-side</h4>
                            </div>--}}
                            <div class="card-datatable">
                                <table class="datatables-ajax table table-responsive">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Is Feature</th>
                                        <th>Total Course</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    @foreach($categories as $category)
                                        <tr class="removable-item">
                                            <td>
                                                {{$category->name}}
                                            </td>
                                            <td>
                                                @if($category->is_feature == 'yes')
                                                    <span class="status active">Yes</span>
                                                @else
                                                    <span class="status blocked">No</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ @$category->courses->count() }}
                                            </td>
                                            <td>
                                                <div class="action__buttons">
                                                    <a href="{{route('category.edit', [$category->uuid])}}" class="btn-action" title="Edit">
                                                        <img src="{{asset('custom/image/edit-2.svg')}}" alt="edit">
                                                    </a>
                                                    <a href="javascript:void(0);" data-url="{{route('category.delete', [$category->uuid])}}" class="btn-action delete" title="Delete">
                                                        <img src="{{asset('custom/image/trash-2.svg')}}" alt="trash">
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>


                                    @endforeach
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- END: Content-->

@endsection


