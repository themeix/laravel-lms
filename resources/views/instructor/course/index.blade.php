@extends('layouts.instructorMaster')
@section('title','My Courses')
@section('content')

    <!-- BEGIN: Content-->

    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">


            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">My Courses</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('instructor')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">My Courses
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('instructor.createCourse')}}">
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
                                    <th>Sl.</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Details</th>
                                    <th>Ratings</th>
                                    <th>Status</th>
                                    <th>Resources</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($courses as $course)
                                    <tr class="removable-item">
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <img src="{{getImageFile($course->image_path)}}" alt="course" width="80" class="img-fluid">
                                        </td>
                                        <td>
                                            {{$course->title}}
                                        </td>

                                        <td>
                                            <div class="finance-table-inner-item my-2" style="display: flex; align-items: center; gap:4px;">
                                                <i data-feather='video'></i> Video:
                                            </div>

                                            <div class="finance-table-inner-item my-2" style="display: flex;align-items: center; gap:4px;">
                                                <i data-feather='clock'></i> Duration:
                                            </div>

                                            <div class="finance-table-inner-item my-2" style="display: flex;align-items: center; gap:4px;">
                                                <i data-feather='users'></i> Enrolled:
                                            </div>
                                        </td>
                                        <td>

                                        </td>
                                        <td>
                                            @if($course->status == 1)
                                                <span class="badge badge-glow bg-success">Published</span>
                                            @elseif($course->status == 2)
                                                <span class="badge badge-glow bg-primary">Waiting for Review</span>
                                            @elseif($course->status == 3)
                                                <span class="badge badge-glow bg-warning">Hold</span>
                                            @elseif($course->status == 4)
                                                <span class="badge badge-glow bg-info">Draft</span>
                                            @else
                                                <span class="badge badge-glow bg-danger">Pending</span>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="mb-1">
                                                <a href="{{route('instructor.course.resource.index', [$course->uuid])}}"><button type="button"  class="btn btn-primary waves-effect" style="width: 100%">Resources</button></a>
                                            </div>
                                            <div class="mb-1">
                                                <button type="button" class="btn btn-success waves-effect" style="width: 100%">Quiz</button>
                                            </div>
                                            <div class="mb-1">
                                                <button type="button" class="btn btn-info waves-effect" style="width: 100%">Assignment</button>
                                            </div>

                                        </td>

                                        <td style="width: 80px;">
                                            <div class="action__buttons text-center" style="width: 80px;">
                                                <a href="{{route('instructor.course.show', [$course->uuid])}}" title="Show"
                                                   class="btn-action">
                                                    <img src="{{asset('custom/image/eye-2.svg')}}" alt="Show">
                                                </a>

                                                <a href="{{route('instructor.course.edit', [$course->uuid])}}" title="Edit"
                                                   class="btn-action">
                                                    <img src="{{asset('custom/image/edit-2.svg')}}" alt="edit">
                                                </a>

                                                <form action="{{route('instructor.course.delete', [$course->uuid])}}" class="mb-0" method="post" class="d-inline">
                                                    @csrf

                                                    <a href="{{route('instructor.course.delete', [$course->uuid])}}"  class="btn-action confirm-delete"  title="Delete">
                                                        <img src="{{asset('custom/image/trash-2.svg')}}" alt="trash">
                                                    </a>

                                                </form>

                                            </div>
                                        </td>
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
            e.preventDefault();
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
        });
    </script>
@endpush
