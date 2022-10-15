@extends('layouts.adminMaster')
@section('title','Blocked Student List')



@section('content')

    <!-- BEGIN: Content-->

    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">

            @if(Session::has('create-message'))
                <div class="alert alert-success" role="alert">
                    <div class="alert-body">
                        {{ Session::get('create-message') }}
                    </div>
                </div>
            @endif

            @if(Session::has('update-message'))
                <div class="alert alert-success" role="alert">
                    <div class="alert-body">
                        {{ Session::get('update-message') }}
                    </div>
                </div>
            @endif

            @if(Session::has('delete-message'))
                <div class="alert alert-danger" role="alert">
                    <div class="alert-body">
                        {{ Session::get('delete-message') }}
                    </div>
                </div>
            @endif

            @if(Session::has('warning-message'))
                <div class="alert alert-danger" role="alert">
                    <div class="alert-body">
                        {{ Session::get('warning-message') }}
                    </div>
                </div>
            @endif


            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Blocked Student List</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Blocked Student List
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('instructor.create')}}">
                        <button type="button" class="btn btn-primary">Add New</button>
                    </a>
                </div>
            </div>--}}
        </div>
        <div class="content-body">



            <section id="column-search-datatable">
                <div class="card">
                    <div class="card-body indexTable">
                        <div class="col-12">
                            <table id="example" class="table table-bordered dataTables_info" style="color: black; justify-content: center; align-items: center;">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Country</th>
                                    <th>State</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($students as $student)
                                    <tr class="removable-item">
                                        <td>
                                            <img src="{{getImageFile($student->user ? @$student->user->image : '')}}" width="80">
                                        </td>
                                        <td>
                                            <strong>{{$student->first_name}} {{$student->last_name}}</strong>
                                        </td>
                                        <td>
                                            {{$student->user->email}}
                                        </td>
                                        <td>
                                            {{$student->phone_number ?? @$student->user->phone_number}}
                                        </td>

                                        <td>{{@$student->country->country_name}}</td>
                                        <td>{{@$student->state->name}}</td>
                                        <td>{{$student->address}}</td>

                                        {{--<td>{{$instructor->country ? $instructor->country->country_name : '' }}</td>
                                        <td>{{$instructor->state ? $instructor->state->name : '' }}</td>--}}


                                        <td>
                                            <span id="hidden_id" style="display: none">{{$student->id}}</span>


                                            <div class="mb-1 text-center" style="width: 120px">
                                                <select name="status" class="status form-select">
                                                    <option value="1" @if($student->status == 1) selected @endif>Approved</option>
                                                    <option value="2" @if($student->status == 2) selected @endif>Blocked</option>
                                                </select>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="action__buttons text-center" style="width: 80px">

                                                <a href="{{route('student.show', [$student->uuid])}}" class="btn-action mr-30" title="View Details">
                                                    <img src="{{asset('custom/image/eye-2.svg')}}" alt="eye">
                                                </a>

                                                <a href="{{route('student.edit', [$student->uuid])}}" class="btn-action" title="Edit">
                                                    <img src="{{asset('custom/image/edit-2.svg')}}" alt="edit">
                                                </a>

                                                <a href="{{route('student.delete', [$student->uuid])}}"  class="btn-action delete" title="Delete">
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

        'use strict'
        $(".status").change(function () {
            var id = $(this).closest('tr').find('#hidden_id').html();
            var status_value = $(this).closest('tr').find('.status option:selected').val();
            Swal.fire({
                title: "Are you sure to change status?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, Change it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        type: "POST",
                        url: "{{route('admin.student.changeStudentStatus')}}",
                        data: {"status": status_value, "id": id, "_token": "{{ csrf_token() }}",},
                        datatype: "json",
                        success: function (data) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Student status has been changed',
                                showConfirmButton: false,
                                timer: 1000
                            })

                            setTimeout(function(){
                                window.location.reload();
                            }, 1000);
                        },
                        error: function () {
                            alert("Error!");
                        },
                    });
                } else if (result.dismiss === "cancel") {
                    location.reload();
                }
            });
        });

    </script>
@endpush


