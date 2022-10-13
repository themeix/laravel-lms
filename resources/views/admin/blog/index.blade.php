@extends('layouts.adminMaster')
@section('title','Blog Post List')



@section('content')

    <!-- BEGIN: Content-->

    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">

            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Blog Post List</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Blog Post List
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('blog.create')}}">
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
                    <div class="card-body indexTable">
                        <div class="col-12">
                            <table id="example" class="table table-bordered dataTables_info" style="color: black;">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($blogs as $blog)
                                    <tr class="removable-item">
                                        <td>
                                            <div class="admin-dashboard-blog-list-img">
                                                <img src="{{getImageFile($blog->image_path)}}" width="100" alt="img">
                                            </div>
                                        </td>
                                        <td>
                                            {{$blog->title}}
                                        </td>
                                        <td>
                                            <span class="status badge badge-glow badge-light-dark ">{{$blog->category ? $blog->category->name : '' }}</span>

                                        </td>
                                        <td>
                                            @if($blog->status == 1)
                                                <span class="status badge badge-glow bg-success">Published</span>
                                            @else
                                                <span class="status badge badge-glow bg-danger">Unpublished</span>
                                            @endif
                                        </td>

                                        <td>
                                            {{ $blog->user ? $blog->user->name : '' }}
                                        </td>
                                        <td style="width: 80px;">
                                            <div class="action__buttons text-center" style="width: 80px;">
                                                <a href="{{route('blog.show', [$blog->uuid])}}" title="Show"
                                                   class="btn-action">
                                                    <img src="{{asset('custom/image/eye-2.svg')}}" alt="Show">
                                                </a>

                                                <a href="{{route('blog.edit', [$blog->uuid])}}" title="Edit"
                                                   class="btn-action">
                                                    <img src="{{asset('custom/image/edit-2.svg')}}" alt="edit">
                                                </a>

                                                <form action="{{route('blog.delete', [$blog->uuid])}}" class="mb-0" method="post" class="d-inline">
                                                    @csrf

                                                    <a href="{{route('blog.delete', [$blog->uuid])}}"  class="btn-action confirm-delete"  title="Delete">
                                                        <img src="{{asset('custom/image/trash-2.svg')}}" alt="trash">
                                                    </a>

                                                </form>

                                               {{-- <a href="javascript:void(0);"
                                                   data-url="{{route('blog.delete', [$blog->uuid])}}" title="Delete"
                                                   class="btn-action delete">
                                                    <img src="{{asset('custom/image/trash-2.svg')}}" alt="trash">
                                                </a>--}}
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


