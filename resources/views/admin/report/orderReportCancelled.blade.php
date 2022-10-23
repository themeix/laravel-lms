@extends('layouts.adminMaster')
@section('title','Order Cancelled List')



@section('content')

    <!-- BEGIN: Content-->

    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">

            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Order Cancelled List</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Order Cancelled List
                                </li>
                            </ol>
                        </div>
                    </div>
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
                            <table id="example" class="table table-bordered dataTables_info"
                                   style="color: black; justify-content: center; align-items: center;">
                                <thead>
                                <tr>
                                    <th>Student Name</th>
                                    <th>Order Number</th>
                                    <th>Sub total</th>
                                    <th>Discount</th>
                                    <th>Grand Total</th>
                                    <th>Payment Method</th>
                                    <th>Total Admin Commission</th>
                                    <th>Total Instructor Commission</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($orders as $order)
                                    <tr class="removable-item">
                                        <td>{{ @$order->user->name }}</td>

                                        <td>{{ @$order->order_number }}</td>


                                        <td>
                                            @if (get_currency_placement() == 'after')
                                                {{ @$order->sub_total }} {{ get_currency_symbol() }}
                                            @else
                                                {{ get_currency_symbol() }} {{ @$order->sub_total }}
                                            @endif
                                        </td>


                                        <td>
                                            @if (get_currency_placement() == 'after')
                                                {{ @$order->discount }} {{ get_currency_symbol() }}
                                            @else
                                                {{ get_currency_symbol() }} {{ @$order->discount }}
                                            @endif
                                        </td>


                                        <td>
                                            @if (get_currency_placement() == 'after')
                                                {{ @$order->grand_total }} {{ get_currency_symbol() }}
                                            @else
                                                {{ get_currency_symbol() }} {{ @$order->grand_total }}
                                            @endif
                                        </td>

                                        <td>
                                            @if (@$order->payment_method)
                                                Bank
                                            @endif
                                        </td>


                                        <td>
                                            @if (get_currency_placement() == 'after')
                                                {{ $order->total_admin_commission }} {{ get_currency_symbol() }}
                                            @else
                                                {{ get_currency_symbol() }} {{ $order->total_admin_commission }}
                                            @endif

                                        </td>

                                        <td>
                                            @if (get_currency_placement() == 'after')
                                                {{ $order->total_owner_balance }} {{ get_currency_symbol() }}
                                            @else
                                                {{ get_currency_symbol() }} {{ $order->total_owner_balance }}
                                            @endif

                                        </td>
                                        <td>
                                            <a href="{{ route('report.order-pending.show', $order->uuid) }}">
                                                <div class="action__buttons">
                                                    <button class="btn-action ms-2 btn btn-primary addPromotion">
                                                        <span>Details</span>
                                                    </button>
                                                </div>
                                            </a>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{$orders->links()}}
                            </div>
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


