@extends('layouts.adminMaster')
@section('title','Update Promotional Course')
@section('content')

    <!-- BEGIN: Content-->

    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">


            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Promotion List</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="{{route('promotion.index')}}">Promotion
                                        List</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('promotion.index')}}">
                        <button type="button" class="btn btn-primary">Promotion List</button>
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
                                <h4 class="card-title">Promotion - {{$promotion->name}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="column-search-datatable">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12">
                            <table id="example" class="table table-bordered dataTables_info" style="color: black;">
                                <thead>
                                <tr>
                                    <th>sl</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($courses as $course)
                                    <tr class="removable-item">
                                        <td>{{ @$loop->iteration }}</td>
                                        <td><a href="#"> <img src="{{getImageFile($course->image_path)}}" width="60">
                                            </a></td>
                                        <td>{{$course->title}}</td>
                                        <td>
                                            <div class="action__buttons appendAddRemove{{ $course->id }}"
                                                 id="reloadElement">
                                                @if(in_array($course->id, @$promotionCourseIds))
                                                    <button class="btn-action ms-2 btn btn-danger removePromotion btn-remove"
                                                        data-course_id="{{$course->id}}">
                                                        <span>Remove</span>
                                                    </button>
                                                @elseif(in_array($course->id, @$alreadyAddedPromotionCourseIds))

                                                    <span class="status badge badge-glow bg-light-success ms-2" data-course_id="{{$course->uuid}}">Already Added Another Promotion</span>

                                                @else
                                                    <button class="btn-action ms-2 btn btn-primary addPromotion"
                                                            data-course_id="{{$course->id}}">
                                                        <span>Add</span>
                                                    </button>
                                                @endif
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

    <input type="hidden" class="addPromotionCourseRoute" value="{{ route('promotion.addPromotionalCourse') }}">
    <input type="hidden" class="removePromotionCourseRoute" value="{{ route('promotion.removePromotionalCourse') }}">
    <input type="hidden" class="promotion_id" value="{{ $promotion->id }}">

    <!-- END: Content-->

@endsection

@push('scripts')

    <script src="{{ asset('custom/js/promotion.js') }}"></script>

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

        $(document).ready(function () {

            $(document).on('click', '.addPromotion', function () {
                var course_id = $(this).data('course_id');
                var promotion_id = $('.promotion_id').val();
                var route = $('.addPromotionCourseRoute').val();
                console.log(course_id, promotion_id, route)
                $.ajax({
                    type: "GET",
                    url: route,
                    data: {"course_id": course_id, "promotion_id": promotion_id},
                    datatype: "json",
                    success: function (response) {
                        /*Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Course has been added.',
                            showConfirmButton: false,
                            timer: 1000
                        })

                        setTimeout(function () {
                            window.location.reload();
                        }, 1000);*/

                        window.location.reload();

                    },
                    error: function () {
                        alert("Error!");
                    },
                });

            });


            $(document).on('click', '.removePromotion', function () {
                var course_id = $(this).data('course_id');
                var promotion_id = $('.promotion_id').val();
                var route = $('.removePromotionCourseRoute').val();
                $.ajax({
                    type: "GET",
                    url: route,
                    data: {"course_id": course_id, "promotion_id": promotion_id},
                    datatype: "json",
                    success: function (response) {

                        window.location.reload();

                        /*Swal.fire({
                            position: 'top-end',
                            icon: 'info',
                            title: 'Course has been removed.',
                            showConfirmButton: false,
                            timer: 1000
                        })

                        setTimeout(function () {
                            window.location.reload();
                        }, 1000);*/
                    },
                    error: function () {
                        alert("Error!");
                    },
                });

            });

        });


    </script>
@endpush
