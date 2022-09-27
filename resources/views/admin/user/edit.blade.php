@extends('layouts.adminMaster')
@section('title','Edit User')
@section('content')

    <!-- BEGIN: Content-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Edit User</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('user.index')}}">User List</a>
                                </li>

                                <li class="breadcrumb-item active">Edit User
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('user.index')}}">
                        <button type="button" class="btn btn-primary">User List</button>
                    </a>
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
                            <form class="needs-validation" action="{{route('user.update', [$user->id])}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="name">Name</label>

                                            <input type="text" name="name" id="name" value="{{$user->name}}"
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

                                            <input type="email" name="email" id="name" value="{{$user->email}}"
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

                                            <input type="number" name="phone_number" id="phone_number" value="{{$user->phone_number}}"
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

                                            <input type="text" name="address" id="address" value="{{$user->address}}"
                                                   class="form-control" placeholder="Address">

                                            @if ($errors->has('address'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-2">
                                            <label class="form-label" for="blog-edit-status">Select Role</label>
                                            <select class="form-select" name="role_name" id="role_name">
                                                <option value="">---Select Role---</option>
                                                @foreach($roles as $role)
                                                    <option value="{{$role->name}}"  @if(count($user->getRoleNames()) > 0) {{$user->getRoleNames()[0] == $role->name ? 'selected' : '' }}@endif >{{$role->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-2">
                                            <label class="form-label" for="blog-edit-status">Status</label>
                                            <select class="form-select" name="status" id="blog-edit-status">
                                                <option value="">---Select Status---</option>
                                                <option value="1" @if($user->status == 1) selected @endif>Active</option>
                                                <option value="0" @if($user->status == 0) selected @endif>Inactive</option>

                                            </select>
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

