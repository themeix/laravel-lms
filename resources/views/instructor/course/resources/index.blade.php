@extends('layouts.instructorMaster')
@section('title','Course Resources')
@section('content')

    <!-- BEGIN: Content-->

    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">


            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Course Resource List</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('instructor')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('instructor.course.index')}}">My Courses</a>
                                </li>
                                <li class="breadcrumb-item active">Course Resource List
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('instructor.course.resource.create', [$course->uuid])}}">
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


                <section id="default-breadcrumb">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Course - {{$course->title}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>



            <section id="column-search-datatable">
                <div class="card">
                    <div class="card-body indexTable">
                        <div class="col-12">
                            <table id="example" class="table table-bordered dataTables_info" style="color: black;">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($resources as $resource)
                                    <tr class="removable-item">
                                        <td>
                                            <div class="resource-list-text">
                                                <span class="iconify" data-icon="akar-icons:link-chain"></span>
                                                <a href="{{ getImageFile($resource->file) }}"
                                                   class="text-decoration-underline">{{ @$resource->original_filename }}</a> {{ $resource->size }}
                                            </div>
                                        </td>

                                        <td>

                                            <form id="form1" method="post"
                                                  action="{{route('instructor.course.resource.delete', [$resource->uuid])}}">
                                                @csrf

                                                <button type="submit" form="form1"
                                                        class="btn btn-danger waves-effect waves-float waves-light confirm-delete">Delete
                                                </button>

                                            </form>
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
