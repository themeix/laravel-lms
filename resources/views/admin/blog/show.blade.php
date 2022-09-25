@extends('layouts.adminMaster')
@section('title','Blog Details')
@section('content')

    <!-- BEGIN: Content-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
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
        <div class="content-detached content-left">
            <div class="content-body">
                <!-- Blog Detail -->
                <div class="blog-detail-wrapper">
                    <div class="row">
                        <!-- Blog -->
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <img src="../../../app-assets/images/banner/banner-12.jpg"
                                     class="img-fluid card-img-top" alt="Blog Detail Pic"/>
                                <div class="card-body">
                                    <h4 class="card-title">The Best Features Coming to iOS and Web design</h4>
                                    <div class="d-flex">
                                        <div class="avatar me-50">
                                            <img src="{{getImageFile($blog->user ? @$blog->user->image : '')}}"
                                                 alt="Avatar" width="24" height="24"/>
                                        </div>
                                        <div class="author-info">
                                            <small class="text-muted me-25">by</small>
                                            <small><a href="#" class="text-body">Ghani Pradita</a></small>
                                            <span class="text-muted ms-50 me-25">|</span>
                                            <small class="text-muted">Jan 10, 2020</small>
                                        </div>
                                    </div>
                                    <div class="my-1 py-25">
                                        <a href="#">
                                            <span class="badge rounded-pill badge-light-danger me-50">Gaming</span>
                                        </a>
                                        <a href="#">
                                            <span class="badge rounded-pill badge-light-warning">Video</span>
                                        </a>
                                    </div>
                                    <p class="card-text mb-2">
                                        Before you get into the nitty-gritty of coming up with a perfect title, start
                                        with a rough draft: your
                                        working title. What is that, exactly? A lot of people confuse working titles
                                        with topics. Let's clear that
                                        Topics are very general and could yield several different blog posts. Think
                                        "raising healthy kids," or
                                        "kitchen storage." A writer might look at either of those topics and choose to
                                        take them in very, very
                                        different directions.A working title, on the other hand, is very specific and
                                        guides the creation of a
                                        single blog post. For example, from the topic "raising healthy kids," you could
                                        derive the following working
                                        title See how different and specific each of those is? That's what makes them
                                        working titles, instead of
                                        overarching topics.
                                    </p>
                                    <h4 class="mb-75">Unprecedented Challenge</h4>
                                    <ul class="p-0 mb-2">
                                        <li class="d-block">
                                            <span class="me-25">-</span>
                                            <span>Preliminary thinking systems</span>
                                        </li>
                                        <li class="d-block">
                                            <span class="me-25">-</span>
                                            <span>Bandwidth efficient</span>
                                        </li>
                                        <li class="d-block">
                                            <span class="me-25">-</span>
                                            <span>Green space</span>
                                        </li>
                                        <li class="d-block">
                                            <span class="me-25">-</span>
                                            <span>Social impact</span>
                                        </li>
                                        <li class="d-block">
                                            <span class="me-25">-</span>
                                            <span>Thought partnership</span>
                                        </li>
                                        <li class="d-block">
                                            <span class="me-25">-</span>
                                            <span>Fully ethical life</span>
                                        </li>
                                    </ul>
                                    <div class="d-flex align-items-start">
                                        <div class="avatar me-2">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-6.jpg"
                                                 width="60" height="60" alt="Avatar"/>
                                        </div>
                                        <div class="author-info">
                                            <h6 class="fw-bolder">Willie Clark</h6>
                                            <p class="card-text mb-0">
                                                Based in London, Uncode is a blog by Willie Clark. His posts explore
                                                modern design trends through photos
                                                and quotes by influential creatives and web designer around the world.
                                            </p>
                                        </div>
                                    </div>
                                    <hr class="my-2"/>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center me-1">
                                                <a href="#" class="me-50">
                                                    <i data-feather="message-square"
                                                       class="font-medium-5 text-body align-middle"></i>
                                                </a>
                                                <a href="#">
                                                    <div class="text-body align-middle">19.1K</div>
                                                </a>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="me-50">
                                                    <i data-feather="bookmark"
                                                       class="font-medium-5 text-body align-middle"></i>
                                                </a>
                                                <a href="#">
                                                    <div class="text-body align-middle">139</div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="dropdown blog-detail-share">
                                            <i data-feather="share-2" class="font-medium-5 text-body cursor-pointer"
                                               role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                               aria-expanded="false"></i>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="#" class="dropdown-item py-50 px-1">
                                                    <i data-feather="github" class="font-medium-3"></i>
                                                </a>
                                                <a href="#" class="dropdown-item py-50 px-1">
                                                    <i data-feather="gitlab" class="font-medium-3"></i>
                                                </a>
                                                <a href="#" class="dropdown-item py-50 px-1">
                                                    <i data-feather="facebook" class="font-medium-3"></i>
                                                </a>
                                                <a href="#" class="dropdown-item py-50 px-1">
                                                    <i data-feather="twitter" class="font-medium-3"></i>
                                                </a>
                                                <a href="#" class="dropdown-item py-50 px-1">
                                                    <i data-feather="linkedin" class="font-medium-3"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
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
