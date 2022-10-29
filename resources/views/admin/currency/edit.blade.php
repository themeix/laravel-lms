@extends('layouts.adminMaster')
@section('title','Edit Currency')
@section('content')

    <!-- BEGIN: Content-->


    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Edit Currency</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('currency.index')}}">Currency List</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Currency
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('currency.index')}}">
                        <button type="button" class="btn btn-primary">Currency List</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="content-body">

            <!-- Basic multiple Column Form section start -->
            <section id="multiple-column-form">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            {{--<div class="card-header">
                                <h4 class="card-title">Multiple Column</h4>
                            </div>--}}
                            <div class="card-body">
                                <form class="form" action="{{route('currency.update', $currency->id)}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="name">Currency ISO Code (Must be correct
                                                    ISO code)</label>
                                                <input
                                                    value="{{ $currency->currency_code }}"
                                                    type="text"
                                                    id="currency_code"
                                                    class="form-control"
                                                    placeholder="Currency ISO Code"
                                                    name="currency_code"
                                                    required
                                                />
                                                @if ($errors->has('currency_code'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i> {{ $errors->first('currency_code') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="name">Symbol</label>
                                                <input
                                                    value="{{ $currency->symbol }}"
                                                    type="text"
                                                    id="symbol"
                                                    class="form-control"
                                                    placeholder="Symbol"
                                                    name="symbol"
                                                    required
                                                />
                                                @if ($errors->has('symbol'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i> {{ $errors->first('symbol') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="name">Currency Placement</label>
                                                <select class="form-control" name="currency_placement" id="" required>
                                                    <option value="">--Select Option--</option>
                                                    <option value="before"
                                                            @if($currency->currency_placement == 'before') selected @endif>
                                                        Before Amount
                                                    </option>
                                                    <option value="after"
                                                            @if($currency->currency_placement == 'after') selected @endif>
                                                        After Amount
                                                    </option>
                                                </select>
                                                @if ($errors->has('currency_placement'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i> {{ $errors->first('currency_placement') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="is_feature">Current Currency</label>

                                                <div class="form-check form-check-inline">

                                                    <label class="form-check-label"> <input class="form-check-input p-2"
                                                                                            type="checkbox"
                                                                                            name="current_currency"
                                                                                            id="current_currency"
                                                                                            value="on" {{@$currency->current_currency == 'on' ? 'checked' : '' }} >
                                                    </label>
                                                </div>
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
        </div>
        </section>
        <!-- Basic Floating Label Form section end -->

    </div>
    </div>

    <!-- END: Content-->

@endsection

@push('script')
    <script src="{{asset('custom/js/image-preview.js')}}"></script>
@endpush
