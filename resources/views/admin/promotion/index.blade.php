@extends('layouts.adminMaster')
@section('title','Promotion List')



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
                                <li class="breadcrumb-item active">Promotion List
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('promotion.create')}}">
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
                            <table id="example" class="table table-bordered dataTables_info" style="color: black; text-align: center; justify-content: center; align-items: center;">
                                <thead>
                                <tr>
                                    <th>sl</th>
                                    <th>Name</th>
                                    <th style="width: 80px;">Start Date</th>
                                    <th style="width: 80px;">End Date</th>
                                    <th>Percentage</th>
                                    <th>Total Course</th>
                                    <th>Creator</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($promotions as $promotion)
                                    <tr class="removable-item">
                                        <td>{{ @$loop->iteration }}</td>
                                        <td>{{$promotion->name}}</td>
                                        <td style="width: 80px;">
                                            <span class="status badge badge-glow badge-light-dark ">{{ date('d M Y, H:i', strtotime(@$promotion->start_date)) }}</span>
                                        </td>
                                        <td style="width: 80px;">
                                            <span class="status badge badge-glow badge-light-dark ">{{ date('d M Y, H:i', strtotime(@$promotion->end_date)) }}</span>
                                        </td>

                                        <td>{{ $promotion->percentage }}</td>
                                        <td>{{ @$promotion->promotionCourses->count() }}</td>

                                        <td>{{ $promotion->user->name }}</td>


                                        <td>
                                            <span id="hidden_id" style="display: none">{{$promotion->id}}</span>
                                            <div class="mb-1" style="width: 120px">
                                                <select name="status" class="status form-select">
                                                    <option value="1" @if($promotion->status == 1) selected @endif>Active</option>
                                                    <option value="0" @if($promotion->status == 0) selected @endif>Inactive</option>
                                                </select>
                                            </div>
                                        </td>


                                        <td>
                                            <div class="action__buttons">
                                                <a href="{{ route('promotion.editCourse', $promotion->uuid) }}" class="btn-action mr-1" title="View promotion details">
                                                    <button class="btn btn-primary">+/- Course</button>
                                                </a>
                                                <a href="{{ route('promotion.edit', $promotion->uuid) }}" class="btn-action mr-1 edit" data-toggle="tooltip" title="Edit">
                                                    <img src="{{asset('custom/image/edit-2.svg')}}" alt="edit">
                                                </a>


                                                <form action="{{route('promotion.delete', [$promotion->uuid])}}" class="mb-0" method="post" class="d-inline">
                                                    @csrf

                                                    <a href="{{route('promotion.delete', [$promotion->uuid])}}"  class="btn-action confirm-delete"  title="Delete">
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



        $(".status").change(function () {
            var id = $(this).closest('tr').find('#hidden_id').html();
            var status_value = $(this).closest('tr').find('.status option:selected').val();
            console.log(id, status_value)
            Swal.fire({
                title: "Are you sure to change status?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, Change it",
                cancelButtonText: "No, cancel it",
                reverseButtons: true
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        type: "POST",
                        url: "{{route('promotion.changeStatus')}}",
                        data: {"status": status_value, "id": id, "_token": "{{ csrf_token() }}",},
                        datatype: "json",
                        success: function (data) {

                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Status Changed',
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


