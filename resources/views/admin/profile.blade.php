@extends('layouts.adminMaster')
@section('title','Profile')
@section('content')

    <!-- BEGIN: Content-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Change Profile</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Profile
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section class="bs-validation">
                <div class="col-md-12 col-12">
                    <div class="card">
                        {{--<div class="card-header">
                            <h4 class="card-title">Bootstrap Validation</h4>
                        </div>--}}
                        <div class="card-body">
                            <form class="needs-validation" action="{{route('admin.profileStore')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="name">Name</label>

                                            <input type="text" name="name" id="name" value="{{ $user->name }}"
                                                   class="form-control" placeholder="Name">

                                            @if ($errors->has('name'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="name">Email</label>

                                            <input type="email" name="email" id="name" value="{{ $user->email }}"
                                                   class="form-control" placeholder="Email">

                                            @if ($errors->has('email'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="name">Phone Number</label>

                                            <input type="number" name="phone_number" id="phone_number"
                                                   value="{{ $user->phone_number }}"
                                                   class="form-control" placeholder="Phone Number">

                                            @if ($errors->has('phone_number'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('phone_number') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="name">Address</label>

                                            <input type="text" name="address" id="address" value="{{ $user->address }}"
                                                   class="form-control" placeholder="Address">

                                            @if ($errors->has('address'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <div class="border rounded p-2">
                                            <h4 class="mb-1">Image</h4>
                                            <div class="d-flex flex-column flex-md-row">
                                                @if($user->image != null)

                                                    <img src="{{getImageFile($user->image)}}"
                                                         id="blog-feature-image" class="rounded me-2 mb-1 mb-md-0"
                                                         width="170" height="110" alt="Blog Featured Image"/>
                                                @else

                                                    <img src="{{asset('custom/image/imagePreview.svg')}}"
                                                         id="blog-feature-image" class="rounded me-2 mb-1 mb-md-0"
                                                         width="170" height="110" alt="Blog Featured Image"/>

                                                @endif
                                                <div class="featured-info">
                                                    <p class="my-50">
                                                        <a href="#" id="blog-image-text">C:\fakepath\banner.jpg</a>
                                                    </p>
                                                    <div class="d-inline-block">
                                                        <input class="form-control" type="file" name="image"
                                                               id="blogCustomFile" accept="image/*"
                                                               onchange="previewFile(this)"/>
                                                    </div>
                                                    @if ($errors->has('image'))
                                                        <span class="text-danger"><i
                                                                class="fas fa-exclamation-triangle"></i> {{ $errors->first('image') }}</span>
                                                    @endif
                                                    <p> Accepted Size: 300 x 300 (1MB)</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>


            </section>
            <!-- /Validation -->

        </div>
    </div>

    <!-- END: Content-->

@endsection

@push('scripts')
    <script src="{{asset('app-assets/vendors/js/editors/quill/quill.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/pages/page-blog-edit.js')}}"></script>
@endpush

