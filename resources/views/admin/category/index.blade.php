@extends('layouts.adminMaster')
@section('title','Category List')
@section('content')

    <!-- BEGIN: Content-->

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




            <section id="column-search-datatable">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                <table id="example" class="table table-bordered dataTables_info" style="color: black;">
                                    <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>Is Feature</th>
                                        <th>Total Course</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

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


                                                    <form action="{{route('category.delete', [$category->uuid])}}" class="mb-0" method="post" class="d-inline">
                                                        @csrf

                                                        <a href="{{route('category.delete', [$category->uuid])}}"  class="btn-action confirm-delete"  title="Delete">
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
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
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


