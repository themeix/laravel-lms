@extends('layouts.adminMaster')
@section('title','Blog Details')
@section('content')

    <!-- BEGIN: Content-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header col-md-12 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Blog Post Detail</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('blog.index')}}">Blog Post List</a>
                                </li>
                                <li class="breadcrumb-item active">Blog Post Details
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-detached">
            <div class="content-body">
                <!-- Blog Detail -->
                <div class="blog-detail-wrapper">
                    <div class="row">
                        <!-- Blog -->
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <img src="{{getImageFile($blog->image)}}"
                                     class="img-fluid card-img-top" alt="Blog Detail Pic"/>
                                <div class="card-body">
                                    <h4 class="card-title">{{ $blog->title }}</h4>
                                    <div class="d-flex">
                                        <div class="avatar me-50">
                                            <img src="{{getImageFile($blog->user ? @$blog->user->image : '')}}"
                                                 alt="Avatar" width="24" height="24"/>
                                        </div>
                                        <div class="author-info">
                                            <small class="text-muted me-25">by</small>
                                            <small><a href="#" class="text-body">{{ $user->name }}</a></small>
                                            <span class="text-muted ms-50 me-25">|</span>
                                            <small class="text-muted">{{ $blog->created_at }}</small>
                                        </div>
                                    </div>
                                    <div class="my-1 py-25">
                                            <span
                                                class="badge rounded-pill badge-light-danger me-50">{{$blog->category->name}}
                                            </span>
                                    </div>
                                    <p class="card-text mb-2">
                                        {!! $blog->details !!}
                                    </p>

                                </div>
                            </div>
                        </div>
                        <!--/ Blog -->
                    </div>
                </div>
                <!--/ Blog Detail -->

            </div>
        </div>
    </div>

    <!-- END: Content-->

@endsection
