@extends('layouts.adminMaster')
@section('title','Edit Bank')
@section('content')

    <!-- BEGIN: Content-->


    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Edit Bank</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('bank.index')}}">All Bank List</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Bank
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('bank.index')}}">
                        <button type="button" class="btn btn-primary">All Bank List</button>
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
                                <form class="form" action="{{route('bank.update', $bank->id)}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="name">Name</label>
                                                <input
                                                    value="{{ $bank->name }}"
                                                    type="text"
                                                    id="name"
                                                    class="form-control"
                                                    placeholder="Name"
                                                    name="name"

                                                />
                                                @if ($errors->has('name'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i> {{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="name">Account Name</label>
                                                <input
                                                    value="{{ $bank->account_name }}"
                                                    type="text"
                                                    id="account_name"
                                                    class="form-control"
                                                    placeholder="Account Name"
                                                    name="account_name"

                                                />
                                                @if ($errors->has('account_name'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i> {{ $errors->first('account_name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="name">Account Number</label>
                                                <input
                                                    value="{{ $bank->account_number }}"
                                                    type="text"
                                                    id="account_number"
                                                    class="form-control"
                                                    placeholder="Account Number"
                                                    name="account_number"
                                                />
                                                @if ($errors->has('account_number'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i> {{ $errors->first('account_number') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="mb-2">
                                                <label class="form-label" for="bank-status">Status</label>
                                                <select class="form-select" name="status" id="status">
                                                    <option value="">---Select Status---</option>

                                                    <option value="1" @if($bank->status == 1) selected @endif>Active</option>
                                                    <option value="0" @if($bank->status == 0) selected @endif>Inactive</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                                    </div>
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

@push('script')
    <script src="{{asset('custom/js/image-preview.js')}}"></script>
@endpush
