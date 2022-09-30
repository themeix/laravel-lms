@extends('layouts.instructorMaster')
@section('title','Notice List')
@section('content')

    <!-- BEGIN: Content-->

    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">


            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Notice List</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('instructor')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Notice List
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                 <div class="mb-1 breadcrumb-right">
                     <a href="{{route('instructor.notice.create', [$course->uuid])}}">
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

            {{--<section id="default-breadcrumb">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Course - {{$course->title}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </section>--}}


            <section id="column-search-datatable">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12">
                            <table id="example" class="table table-bordered dataTables_info text-center align-items-center justify-content-center" style="color: black;">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Course Title</th>
                                    <th>Total Notice</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($courses as $course)

                                    <tr>

                                        <td>
                                            <img src="{{getImageFile($course->image_path)}}" alt="course" width="80"
                                                 height="20px"
                                                 class="img-fluid">
                                        </td>
                                        <td>
                                            <strong>{{$course->title}} </strong>
                                        </td>


                                        <td>{{ @$course->notices->count() }}</td>

                                        <td>
                                            <div style="display: flex; gap: 10px" class="justify-content-center">

                                                    <a href="{{ route('instructor.notice.create', $course->uuid) }}">
                                                        <button type="button" class="btn  btn-primary waves-effect" style="width: 130px">Add Notice
                                                        </button>
                                                    </a>

                                                    <a href="{{ route('instructor.notice.index', $course->uuid) }}">
                                                        <button type="button" class="btn  btn-info waves-effect" style="width: 130px">View List
                                                        </button>
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
