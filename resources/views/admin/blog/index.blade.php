@extends('layouts.adminMaster')
@section('title','Blog Post List')



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


            <section id="column-search-datatable">
                <div class="card">
                    <div class="card-body">
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
                                            {{$blog->category ? $blog->category->name : '' }}
                                        </td>
                                        <td>
                                            @if($blog->status == 1)
                                                <span class="status badge bg-success">Published</span>
                                            @else
                                                <span class="status badge bg-danger">Unpublished</span>
                                            @endif
                                        </td>

                                        <td>
                                            {{ $blog->user ? $blog->user->name : '' }}
                                        </td>
                                        <td>
                                            <div class="action__buttons">
                                                <a href="{{route('blog.show', [$blog->uuid])}}" title="Show"
                                                   class="btn-action">
                                                    <img src="{{asset('custom/image/eye-2.svg')}}" alt="Show">
                                                </a>

                                                <a href="{{route('blog.edit', [$blog->uuid])}}" title="Edit"
                                                   class="btn-action">
                                                    <img src="{{asset('custom/image/edit-2.svg')}}" alt="edit">
                                                </a>
                                                <a href="javascript:void(0);"
                                                   data-url="{{route('blog.delete', [$blog->uuid])}}" title="Delete"
                                                   class="btn-action delete">
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


