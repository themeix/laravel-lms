@extends('layouts.adminMaster')
@section('title','Create Role')
@section('content')

    <!-- BEGIN: Content-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Create Role</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('role.index')}}">Role List</a>
                                </li>

                                <li class="breadcrumb-item active">Create Role
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('role.index')}}">
                        <button type="button" class="btn btn-primary">Role List</button>
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
                            <form class="needs-validation" action="{{route('role.store')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="name">Role Name</label>

                                            <input type="text" name="name" id="name" value="{{old('name')}}"
                                                   class="form-control" placeholder="Role Name">

                                            @if ($errors->has('name'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <label for="name" class="col-lg-3 text-lg-right text-black"> Select Permissions</label>
                                <div class="col-12 col-md-12">
                                    <div class="mb-1">
                                        <div class="form-control">
                                            <div class="row text-black">
                                                <div class="col-md-4">
                                                    <div class="form-check  d-flex align-items-center">
                                                        <input class="form-check-input p-1" type="checkbox"
                                                               name=""
                                                               id="check-all"
                                                               value="" readonly>
                                                        <label class="form-check-label  ps-1 color-heading"
                                                               for="check-all">Select All </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>


                                            <div class="row text-black">
                                                @foreach($permissions as $permission)
                                                    <div class="col-md-4">
                                                        <div class="form-check mb-2 d-flex align-items-center">
                                                            <input class="form-check-input p-1" type="checkbox"
                                                                   name="permissions[]"
                                                                   id="permission{{$permission->id}}"
                                                                   value="{{$permission->id}}">
                                                            <label class="form-check-label  ps-1 color-heading"
                                                                   for="permission{{$permission->id}}">{{ucwords(str_ireplace("_", " ", $permission->name))}} </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @if ($errors->has('permissions'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('permissions') }}</span>
                                            @endif
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
    <script>
        let checkAll = document.getElementById('check-all')
        let otherCheckboxes = document.querySelectorAll('input[type=checkbox]:not(#check-all)')

        checkAll.addEventListener('change', onCheckAllChange)
        otherCheckboxes.forEach(input => input.addEventListener('change', onOtherCheckboxChange))

        function onCheckAllChange() {
            otherCheckboxes.forEach((input) => input.checked = checkAll.checked)
        }

        function onOtherCheckboxChange() {
            let allChecked = Array.from(otherCheckboxes).every(input => input.checked);
            checkAll.checked = allChecked;
        }

    </script>
@endpush
