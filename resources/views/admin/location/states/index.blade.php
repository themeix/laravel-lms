@extends('layouts.adminMaster')
@section('title','State')
@section('content')

    <!-- BEGIN: Content-->

    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">

            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">State List</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('location.index')}}">All Countries</a>
                                </li>
                                <li class="breadcrumb-item active">State List
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('state.create', $country->uuid)}}">
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

                <section id="default-breadcrumb">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Country - {{$country->country_name}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            <section id="column-search-datatable">
                <div class="card">
                    <div class="card-body indexTable">
                        <div class="col-12">
                            <table id="example" class="table table-bordered dataTables_info" style="color: black;">
                                <thead>
                                <tr>
                                    <th>State</th>
                                    <th>Country</th>
                                    <th>Add City</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($states as $state)
                                    <tr class="removable-item">
                                        <td>
                                            {{$state->name}}
                                        </td>

                                        <td>
                                            {{$state->country ? $state->country->country_name: ''}}
                                        </td>
                                        <td>
                                            <div>
                                                <a href="{{ route('city.index', [$country->uuid, $state->uuid]) }}">
                                                    <button type="button" class="btn  btn-success waves-effect"
                                                            style="width: 150px;">
                                                        Add City
                                                    </button>
                                                </a>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="action__buttons">
                                                <a href="{{route('state.edit', [$country->uuid, $state->uuid])}}" class="btn-action" title="Edit">
                                                    <img src="{{asset('custom/image/edit-2.svg')}}" alt="edit">
                                                </a>

                                                <form action="{{route('state.delete', [$country->uuid, $state->uuid])}}" class="mb-0" method="post" class="d-inline">
                                                    @csrf

                                                    <a href="{{route('state.delete', [$country->uuid, $state->uuid])}}"  class="btn-action confirm-delete"  title="Delete">
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
    </script>
@endpush