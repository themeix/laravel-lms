@extends('layouts.adminMaster')
@section('title','Currency List')
@section('content')

    <!-- BEGIN: Content-->

    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Currency List</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Currency List
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('currency.create')}}">
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

                @if(Session::has('error-message'))
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="alert alert-danger" role="alert">
                                <div class="alert-body">
                                    {{ Session::get('error-message') }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif


            <section id="column-search-datatable">
                <div class="card">
                    <div class="card-body indexTable">
                        <div class="col-12">
                            <table id="example" class="table table-bordered dataTables_info"
                                   style="color: black;text-align: center; justify-content: center; align-items: center; ">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Currency Code</th>
                                    <th>Symbol</th>
                                    <th>Currency Placement</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($currencies as $currency)
                                    <tr class="removable-item">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$currency->currency_code}}
                                            <b>
                                                @if($currency->current_currency == 'on')

                                                    <span class="status badge bg-primary ">
                                                    (Current Currency)
                                                </span>
                                                @endif


                                            </b>

                                        </td>
                                        <td>{{@$currency->symbol}}</td>
                                        <td>
                                            @if($currency->currency_placement == 'before')
                                                Before Amount
                                            @elseif($currency->currency_placement == 'after')
                                                After Amount
                                            @endif
                                        </td>
                                        <td>
                                            <div class="action__buttons">
                                                <a href="{{route('currency.edit', [$currency->id])}}" class="btn-action"
                                                   title="Edit">
                                                    <img src="{{asset('custom/image/edit-2.svg')}}" alt="edit">
                                                </a>


                                                <form action="{{route('currency.delete', [$currency->id])}}"
                                                      class="mb-0" method="post" class="d-inline">
                                                    @csrf

                                                    <a href="{{route('currency.delete', [$currency->id])}}"
                                                       class="btn-action confirm-delete" title="Delete">
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


