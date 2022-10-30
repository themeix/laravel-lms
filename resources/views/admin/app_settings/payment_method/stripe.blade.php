@extends('layouts.adminMaster')
@section('title','Add Stripe')
@section('content')

    <!-- BEGIN: Content-->


    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Add Stripe</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Add Stripe
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">

            <!-- Basic multiple Column Form section start -->
            <section id="multiple-column-form">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form" action="{{route('setting.save')}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf

                                    <div class="row mb-2 mt-2" >
                                        <div class="col-6">
                                            <span class="badge badge-light-danger" style="font-size: 15px;"> Make Sure To Enter Valid Currency ISO Code.</span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="name">Currency ISO code</label>
                                                <input
                                                    value="{{ get_option('stripe_currency') }}"
                                                    type="text"
                                                    id="stripe_currency"
                                                    class="form-control stripe_currency"
                                                    name="stripe_currency"
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="name">Conversion Rate</label>
                                                <div style="display: flex; gap: 4px;">
                                                    <div class="col-md-2">
                                                    <span
                                                        class="input-group-text mb-1">{{ '1 ' . get_currency_symbol() . ' = ' }}</span>
                                                    </div>
                                                    <div class="col-md-2 ">
                                                        <input
                                                            value="{{ get_option('stripe_conversion_rate') ? get_option('stripe_conversion_rate') : 1 }}"
                                                            type="number" step="any" min="0"
                                                            class="form-control mb-1"
                                                            name="stripe_conversion_rate"
                                                        />
                                                    </div>
                                                    <div class="col-md-2 ">
                                                        <span
                                                            class="input-group-text stripe_append_currency"></span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="name">Stripe Status</label>
                                                <select name="stripe_status" class="form-control">
                                                    <option value="1"
                                                        {{ get_option('stripe_status') == 1 ? 'selected' : '' }}>
                                                        Enable
                                                    </option>
                                                    <option value="0"
                                                        {{ get_option('stripe_status') == '0' ? 'selected' : '' }}>
                                                        Disable
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label" for="bank-status">Stripe Mode</label>
                                                <select name="STRIPE_MODE" class="form-control">
                                                    <option value="sandbox"
                                                        {{ get_option('stripe_mode') == 'sandbox' ? 'selected' : '' }}>
                                                        Sandbox
                                                    </option>
                                                    <option value="live"
                                                        {{ get_option('stripe_mode') == 'live' ? 'selected' : '' }}>
                                                        Live
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="name">Public Key</label>

                                                <input type="text" name="STRIPE_PUBLIC_KEY"
                                                       value="{{ get_option('STRIPE_PUBLIC_KEY') }}"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="name">Secret key</label>

                                                <input type="text" name="STRIPE_SECRET_KEY"
                                                       value="{{ get_option('STRIPE_SECRET_KEY') }}" class="form-control">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Basic Floating Label Form section end -->

        </div>
    </div>

    <!-- END: Content-->

@endsection

@push('scripts')
    <script src="{{ asset('frontend/custom/js/payment-method.js') }}"></script>
@endpush


