@extends('layouts.adminMaster')
@section('title','Edit Promotion')


@push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.min.css')}}">
@endpush

@section('content')
    <!-- BEGIN: Content-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Edit Promotion</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('promotion.index')}}">Promotion List</a>
                                </li>

                                <li class="breadcrumb-item active">Edit Promotion
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('promotion.index')}}">
                        <button type="button" class="btn btn-primary">Promotion List</button>
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
                            <form class="needs-validation" action="{{route('promotion.update', $promotion->uuid)}}" method="post" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">Name</label>

                                            <input
                                                type="text"
                                                value="{{ $promotion->name }}"
                                                name="name"
                                                class="form-control"
                                                placeholder="Name"
                                                aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                required
                                            />
                                            @if ($errors->has('name'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12 col-12 mb-1">
                                        <label class="form-label" for="fp-date-time">Start Date</label>
                                        <input type="text" id="fp-date-time" name="start_date" value="{{ $promotion->start_date }}" class="form-control flatpickr-date-time flatpickr-input active" placeholder="YYYY-MM-DD HH:MM" >

                                        @if ($errors->has('start_date'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('start_date') }}</span>
                                        @endif
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12 col-12 mb-1">
                                        <label class="form-label" for="fp-date-time">End Date</label>
                                        <input type="text" id="fp-date-time" name="end_date" value="{{ $promotion->end_date }}" class="form-control flatpickr-date-time flatpickr-input active" placeholder="YYYY-MM-DD HH:MM" >

                                        @if ($errors->has('end_date'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('end_date') }}</span>
                                        @endif
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">Percentage (%)</label>

                                            <input
                                                type="number"
                                                step="any" min="1"
                                                name="percentage" value="{{ $promotion->percentage }}"
                                                class="form-control"
                                                placeholder="%"
                                                aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                required
                                            />
                                            @if ($errors->has('percentage'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('percentage') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="select-country1">Status</label>
                                            <select class="form-select" name="status" required>
                                                <option value="">---Select---</option>
                                                <option value="1" {{ @$promotion->status == 1 ? 'selected' : ''}}>Active</option>
                                                <option value="0" {{ @$promotion->status != 1 ? 'selected' : ''}}>Inactive</option>

                                            </select>
                                            @if ($errors->has('status'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('status') }}</span>
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
    <script src="{{asset('app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/pickadate/picker.time.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/pickadate/legacy.js')}}"></script>

    <script src="{{asset('app-assets/js/scripts/forms/pickers/form-pickers.js')}}"></script>

@endpush
