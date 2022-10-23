@extends('layouts.adminMaster')
@section('title','Show Pending Order')



@section('content')

    <!-- BEGIN: Content-->

    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">

            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Show Pending Order</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Show Pending Order
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
                            <table class="table table-bordered"
                                   style="color: black;">
                                <thead>
                                <tr>
                                    <th>Property</th>
                                    <th>Value</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td><strong>Student Name</strong></td>
                                    <td>{{ @$order->user->name }}</td>
                                </tr>


                                <tr>
                                    <td><strong>Order Number</strong></td>
                                    <td>{{ @$order->order_number }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Sub Total</strong></td>
                                    <td>
                                        @if (get_currency_placement() == 'after')
                                            {{ @$order->sub_total }} {{ get_currency_symbol() }}
                                        @else
                                            {{ get_currency_symbol() }} {{ @$order->sub_total }}
                                        @endif

                                    </td>
                                </tr>

                                <tr>
                                    <td><strong>Discount</strong></td>
                                    <td>
                                        @if (get_currency_placement() == 'after')
                                            {{ @$order->discount }} {{ get_currency_symbol() }}
                                        @else
                                            {{ get_currency_symbol() }} {{ @$order->discount }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Platform Charge</strong></td>
                                    <td>
                                        @if (get_currency_placement() == 'after')
                                            {{ @$order->platform_charge }} {{ get_currency_symbol() }}
                                        @else
                                            {{ get_currency_symbol() }} {{ @$order->platform_charge }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Grand Total</strong></td>
                                    <td>
                                        @if (get_currency_placement() == 'after')
                                            {{ @$order->grand_total }} {{ get_currency_symbol() }}
                                        @else
                                            {{ get_currency_symbol() }} {{ @$order->grand_total }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Payment Method</strong></td>
                                    <td>
                                        <div>
                                            @if(@$order->payment_method == 'bank')
                                                Bank
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td><strong>Bank Name</strong></td>
                                    <td>
                                        <div>
                                            @if(@$order->payment_method == 'bank')
                                                {{ @$order->bank->name }}
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Deposit By</strong></td>
                                    <td>
                                        <div>
                                            @if(@$order->payment_method == 'bank')
                                                {{ $order->deposit_by }}
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Deposit Slip</strong></td>
                                    <td>
                                        <p class="font-bold mb-0">
                                            <a class="color-blue" href="{{ asset($order->deposit_slip) }}" download>Download</a>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Total Admin Commission</strong></td>
                                    <td>
                                        @if (get_currency_placement() == 'after')
                                            {{ $order->total_admin_commission }} {{ get_currency_symbol() }}
                                        @else
                                            {{ get_currency_symbol() }} {{ $order->total_admin_commission }}
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td><strong>Total Instructor Commission</strong></td>
                                    <td>
                                        @if (get_currency_placement() == 'after')
                                            {{ $order->total_owner_balance }} {{ get_currency_symbol() }}
                                        @else
                                            {{ get_currency_symbol() }} {{ $order->total_owner_balance }}
                                        @endif

                                    </td>
                                </tr>

                                <tr>
                                    <td><strong>Action</strong></td>
                                    <td>
                                        <div class="card-header flex-row justify-content-start">
                                            <a href="{{ route('report.order-paid', [$order->uuid, 'paid']) }}">
                                                <div class="action__buttons mb-2">
                                                    <button class="btn-action ms-2 btn btn-success" style="width: 150px;">
                                                        <span>Paid</span>
                                                    </button>
                                                </div>
                                            </a>

                                            <a href="{{ route('report.order-paid', [$order->uuid, 'cancelled']) }}">
                                                <div class="action__buttons mb-2">
                                                    <button class="btn-action ms-2 btn btn-secondary">
                                                        <span>Cancel</span>
                                                    </button>
                                                </div>
                                            </a>
                                        </div>

                                    </td>
                                </tr>


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


