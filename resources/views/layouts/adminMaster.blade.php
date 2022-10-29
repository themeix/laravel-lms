<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Learn LMS - Learning Management System">
    <meta name="keywords" content="Learn LMS - Learning Management System">
    <meta name="author" content="PIXINVENT">

    <title>@yield('title') | Learning Management System </title>

    <link rel="apple-touch-icon" href="{{ asset('themes/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/assets/images/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
          rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/toastr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')}}">

    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/css/plugins/extensions/ext-component-sweet-alerts.css')}}">
    <!-- END: Vendor CSS-->


    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/components.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/dark-layout.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/bordered-layout.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/semi-dark-layout.min.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/css/plugins/extensions/ext-component-toastr.min.css')}}">

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">

    <style>
        .dataTables_info {
            align-items: center !important;
            text-align: center !important;
            justify-content: center !important;
            color: black !important;
        }

        .indexTable {
            overflow-x: auto !important;
            margin-right: 5px !important;
        }

        .action__buttons {
            justify-content: center !important;
        }
    </style>

    <!-- END: Custom CSS-->

    @stack('styles')
    {{--@stack('scripts')--}}
</head>
<!-- END: Head-->


<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
      data-menu="vertical-menu-modern" data-col="">


@include('sweetalert::alert')

<!-- BEGIN: Header-->
<nav
    class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a>
                </li>
            </ul>
            <ul class="nav navbar-nav bookmark-icons">
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-email.html"
                                                          data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                          title="Email"><i class="ficon" data-feather="mail"></i></a>
                </li>
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-chat.html" data-bs-toggle="tooltip"
                                                          data-bs-placement="bottom" title="Chat"><i class="ficon"
                                                                                                     data-feather="message-square"></i></a>
                </li>
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-calendar.html"
                                                          data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                          title="Calendar"><i class="ficon" data-feather="calendar"></i></a>
                </li>
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-todo.html" data-bs-toggle="tooltip"
                                                          data-bs-placement="bottom" title="Todo"><i class="ficon"
                                                                                                     data-feather="check-square"></i></a>
                </li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon text-warning"
                                                                                            data-feather="star"></i></a>
                    <div class="bookmark-input search-input">
                        <div class="bookmark-input-icon"><i data-feather="search"></i></div>
                        <input class="form-control input" type="text" placeholder="Bookmark" tabindex="0"
                               data-search="search">
                        <ul class="search-list search-list-bookmark"></ul>
                    </div>
                </li>
            </ul>
        </div>


        <ul class="nav navbar-nav align-items-center ms-auto">

            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon"
                                                                                         data-feather="moon"></i></a>
            </li>
            <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon"
                                                                                   data-feather="search"></i></a>
                <div class="search-input">
                    <div class="search-input-icon"><i data-feather="search"></i></div>
                    <input class="form-control input" type="text" placeholder="Explore Learn..." tabindex="-1"
                           data-search="search">
                    <div class="search-input-close"><i data-feather="x"></i></div>
                    <ul class="search-list search-list-main"></ul>
                </div>
            </li>
            <li class="nav-item dropdown dropdown-cart me-25">
                <a class="nav-link" href="{{ route('main.index') }}"><i
                        class="ficon" data-feather="globe" title="Visit Website"></i>
                </a>
            </li>

            {{--Notification Area Start--}}


            @php
                $adminNotifications = \App\Models\Notification::where('user_type', 1)->where('is_seen', 'no')->orderBy('created_at', 'DESC')->get();
            @endphp

            <li class="nav-item dropdown dropdown-notification me-25"><a class="nav-link" href="javascript:void(0);"
                                                                         data-bs-toggle="dropdown"><i class="ficon"
                                                                                                      data-feather="bell"></i><span
                        class="badge rounded-pill bg-danger badge-up">{{ sizeof($adminNotifications) }}</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                    <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex">
                            <h4 class="notification-title mb-0 me-auto">Notifications</h4>
                            <div class="badge rounded-pill badge-light-primary">{{ sizeof($adminNotifications) }} New
                            </div>
                        </div>
                    </li>
                    <li class="scrollable-container media-list">

                        @foreach($adminNotifications as $adminNotification)
                            <a class="d-flex" href="{{route('notification.url', [$adminNotification->uuid])}}">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar"><img
                                                src="{{ asset($adminNotification->sender->image_path) }}'"
                                                alt="avatar" width="32" height="32"></div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <h6 class="color-heading font-14 text-capitalize">{{$adminNotification->sender->name}}</h6>
                                        <p class="media-heading"><span
                                                class="fw-bolder">{{$adminNotification->text}}</span>
                                        </p><small
                                            class="notification-text"> {{@$adminNotification->created_at->diffForHumans()}}</small>
                                    </div>
                                </div>
                            </a>
                        @endforeach

                    </li>
                    <li class="dropdown-menu-footer">
                        <a class="btn btn-primary w-100" href="{{ route('notification.read.all') }}">
                            Read all notifications
                        </a>
                    </li>
                </ul>
            </li>

            {{--Notification Area Ends--}}

            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                                                           id="dropdown-user" href="#" data-bs-toggle="dropdown"
                                                           aria-haspopup="true" aria-expanded="false">

                    <div class="user-nav d-sm-flex d-none">
                        <span class="user-name fw-bolder">{{ Auth::user()->name }}</span><span class="user-status">

                            @if(Auth::user()->type == 1)
                                Admin
                            @endif

                            @if(Auth::user()->type == 2)
                                Instructor
                            @endif

                            @if(Auth::user()->type == 3)
                                Student
                            @endif

                            </span>
                    </div>
                    <span class="avatar"><img class="round"
                                              @if(Auth::user()->image != null)
                                                  src="{{getImageFile(Auth::user()->image)}}"
                                              @else
                                                  src="{{asset('custom/image/user-no-image.png')}}"
                                              @endif
                                              alt="avatar" height="40" width="40">
                        <span class="avatar-status-online"></span></span></a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">

                    <a class="dropdown-item" href="{{ route('main.index') }}">
                        <i class="me-50" data-feather="globe">

                        </i> Visit Site</a>

                    <a class="dropdown-item" href="{{ route('admin.profile') }}">
                        <i class="me-50" data-feather="user">

                        </i> Profile</a>
                    <a class="dropdown-item" href="{{ route('admin.changePassword') }}">
                        <i class="me-50" data-feather="settings">
                        </i> Password</a>


                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                        <i class="me-50" data-feather="power"></i> Logout

                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
<ul class="main-search-list-defaultlist d-none">
    <li class="d-flex align-items-center"><a href="#">
            <h6 class="section-label mt-75 mb-0">Files</h6></a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                                   href="app-file-manager.html">
            <div class="d-flex">
                <div class="me-75"><img src="{{asset('app-assets/images/icons/xls.png')}}" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing
                        Manager</small>
                </div>
            </div>
            <small class="search-data-size me-50 text-muted">&apos;17kb</small></a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                                   href="app-file-manager.html">
            <div class="d-flex">
                <div class="me-75"><img src="{{asset('app-assets/images/icons/jpg.png')}}" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd
                        Developer</small>
                </div>
            </div>
            <small class="search-data-size me-50 text-muted">&apos;11kb</small></a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                                   href="app-file-manager.html">
            <div class="d-flex">
                <div class="me-75"><img src="{{asset('app-assets/images/icons/pdf.png')}}" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital
                        Marketing Manager</small>
                </div>
            </div>
            <small class="search-data-size me-50 text-muted">&apos;150kb</small></a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                                   href="app-file-manager.html">
            <div class="d-flex">
                <div class="me-75"><img src="{{asset('app-assets/images/icons/doc.png" alt="png')}}" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web Designer</small>
                </div>
            </div>
            <small class="search-data-size me-50 text-muted">&apos;256kb</small></a></li>
    <li class="d-flex align-items-center"><a href="#">
            <h6 class="section-label mt-75 mb-0">Members</h6></a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                                   href="app-user-view-account.html">
            <div class="d-flex align-items-center">
                <div class="avatar me-75"><img src="{{asset('app-assets/images/portrait/small/avatar-s-8.jpg')}}"
                                               alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                                   href="app-user-view-account.html">
            <div class="d-flex align-items-center">
                <div class="avatar me-75"><img src="{{asset('app-assets/images/portrait/small/avatar-s-1.jpg')}}"
                                               alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd
                        Developer</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                                   href="app-user-view-account.html">
            <div class="d-flex align-items-center">
                <div class="avatar me-75"><img src="{{asset('app-assets/images/portrait/small/avatar-s-14.jpg')}}"
                                               alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing
                        Manager</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                                   href="app-user-view-account.html">
            <div class="d-flex align-items-center">
                <div class="avatar me-75"><img src="{{asset('app-assets/images/portrait/small/avatar-s-6.jpg')}}"
                                               alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
                </div>
            </div>
        </a></li>
</ul>
<ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion justify-content-between"><a
            class="d-flex align-items-center justify-content-between w-100 py-50">
            <div class="d-flex justify-content-start"><span class="me-75" data-feather="alert-circle"></span><span>No results found.</span>
            </div>
        </a></li>
</ul>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto mb-5"><a class="navbar-brand" href="{{ route('admin') }}"><span
                        class="brand-logo">

                        <svg width="211" height="35" viewBox="0 0 211 48" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                              <path
                                  d="M49.2687 7.90854L25.6083 0.0730428C25.3038 -0.0243476 24.9763 -0.0243476 24.6718 0.0730428L1.03606 7.90854H0.986772L0.814249 8.00648H0.789603L0.617079 8.10443C0.617079 8.11092 0.614483 8.11715 0.609861 8.12174C0.605238 8.12634 0.59897 8.12891 0.592433 8.12891L0.41991 8.27583L0.296679 8.42275C0.296679 8.42924 0.294082 8.43547 0.28946 8.44006C0.284838 8.44465 0.278569 8.44723 0.272033 8.44723L0.173448 8.61863C0.173448 8.64312 0.148801 8.64312 0.148801 8.66761L0.0748626 8.83901C0.0441957 8.89993 0.0273689 8.9668 0.0255705 9.03489C0.00537419 9.10654 -0.00295014 9.18097 0.000924186 9.25527V28.844C0.000924186 29.2337 0.156723 29.6073 0.434046 29.8829C0.71137 30.1584 1.0875 30.3132 1.4797 30.3132C1.87189 30.3132 2.24802 30.1584 2.52535 29.8829C2.80267 29.6073 2.95847 29.2337 2.95847 28.844V11.3366L12.4965 14.4953C10.7706 17.0054 9.85112 19.9764 9.85941 23.0164C9.86118 25.7604 10.6115 28.4527 12.0307 30.8068C13.4498 33.1609 15.4846 35.0889 17.9187 36.3857C12.9025 38.0264 8.59911 41.3171 5.71884 45.7148C5.61204 45.8772 5.53847 46.0589 5.50234 46.2495C5.46621 46.4402 5.46823 46.636 5.50828 46.8259C5.54833 47.0157 5.62563 47.1959 5.73576 47.356C5.84589 47.5162 5.9867 47.6533 6.15015 47.7594C6.3136 47.8655 6.49648 47.9386 6.68836 47.9745C6.88024 48.0104 7.07736 48.0084 7.26846 47.9686C7.45956 47.9288 7.6409 47.852 7.80212 47.7426C7.96335 47.6332 8.1013 47.4933 8.20811 47.3309C10.0401 44.5264 12.5488 42.2215 15.5059 40.6258C18.4631 39.0301 21.7749 38.1942 25.1401 38.1942C28.5052 38.1942 31.817 39.0301 34.7742 40.6258C37.7313 42.2215 40.24 44.5264 42.072 47.3309C42.2133 47.5326 42.4012 47.6978 42.6198 47.8128C42.8384 47.9278 43.0816 47.9893 43.329 47.992C43.6111 47.9939 43.8868 47.9083 44.1176 47.7472C44.2812 47.6428 44.4225 47.5074 44.5333 47.3487C44.6442 47.19 44.7224 47.0112 44.7637 46.8224C44.8049 46.6336 44.8082 46.4386 44.7735 46.2486C44.7387 46.0585 44.6666 45.8772 44.5613 45.7148C41.681 41.3171 37.3776 38.0264 32.3614 36.3857C34.7955 35.0889 36.8303 33.1609 38.2495 30.8068C39.6686 28.4527 40.4189 25.7604 40.4207 23.0164C40.429 19.9764 39.5095 17.0054 37.7836 14.4953L49.2687 10.6999C49.5645 10.6033 49.8221 10.4164 50.0048 10.1658C50.1874 9.91514 50.2857 9.61364 50.2857 9.30424C50.2857 8.99484 50.1874 8.69333 50.0048 8.44271C49.8221 8.19209 49.5645 8.00515 49.2687 7.90854ZM37.4632 23.0164C37.4625 24.9663 36.9931 26.8879 36.0939 28.6212C35.1947 30.3545 33.8918 31.8494 32.2936 32.9813C30.6955 34.1133 28.8482 34.8496 26.9058 35.129C24.9633 35.4084 22.9817 35.2228 21.126 34.5877C19.2704 33.9525 17.5942 32.8861 16.2372 31.4774C14.8801 30.0686 13.8814 28.3582 13.3241 26.4885C12.7668 24.6187 12.6671 22.6438 13.0333 20.7281C13.3995 18.8124 14.221 17.0113 15.4294 15.4747L24.6718 18.5354C24.9763 18.6328 25.3038 18.6328 25.6083 18.5354L34.8507 15.4747C36.5377 17.632 37.4565 20.2845 37.4632 23.0164ZM25.1401 15.5971L6.16248 9.30424L25.1401 3.01135L44.1176 9.30424L25.1401 15.5971Z"
                                  fill="#223655"></path>
                              <path d="M75.6538 42V8.4H82.8538V35.52H98.0698V42H75.6538Z" fill="#035AE0"></path>
                              <path
                                  d="M115.275 42.48C112.747 42.48 110.507 41.936 108.555 40.848C106.603 39.728 105.067 38.192 103.947 36.24C102.859 34.288 102.315 32.064 102.315 29.568C102.315 27.616 102.619 25.84 103.227 24.24C103.867 22.608 104.731 21.216 105.819 20.064C106.939 18.88 108.267 17.968 109.803 17.328C111.339 16.688 113.019 16.368 114.843 16.368C116.443 16.368 117.931 16.656 119.307 17.232C120.715 17.808 121.931 18.64 122.955 19.728C123.979 20.784 124.763 22.048 125.307 23.52C125.851 24.96 126.091 26.56 126.027 28.32L125.979 30.144H104.955L104.187 27.168H122.955L122.283 27.984L122.331 26.784C122.267 25.408 121.883 24.192 121.179 23.136C120.475 22.08 119.563 21.248 118.443 20.64C117.355 20.032 116.155 19.728 114.843 19.728C112.987 19.728 111.387 20.128 110.043 20.928C108.699 21.696 107.675 22.8 106.971 24.24C106.299 25.648 105.947 27.344 105.915 29.328C105.947 31.312 106.363 33.04 107.163 34.512C107.963 35.952 109.083 37.088 110.523 37.92C111.995 38.72 113.691 39.12 115.611 39.12C116.987 39.12 118.267 38.896 119.451 38.448C120.635 37.968 121.835 37.184 123.051 36.096L124.875 38.688C124.107 39.456 123.195 40.128 122.139 40.704C121.115 41.248 120.011 41.68 118.827 42C117.643 42.32 116.459 42.48 115.275 42.48ZM147.208 42V25.2C147.208 23.568 146.632 22.256 145.48 21.264C144.328 20.272 142.808 19.776 140.92 19.776C139.352 19.776 137.928 20.096 136.648 20.736C135.368 21.376 134.232 22.336 133.24 23.616L130.84 21.216C132.28 19.584 133.848 18.368 135.544 17.568C137.272 16.768 139.144 16.368 141.16 16.368C143.08 16.368 144.744 16.688 146.152 17.328C147.56 17.968 148.632 18.896 149.368 20.112C150.136 21.328 150.52 22.8 150.52 24.528V42H147.208ZM138.568 42.48C136.936 42.48 135.48 42.16 134.2 41.52C132.92 40.88 131.896 40 131.128 38.88C130.392 37.728 130.024 36.384 130.024 34.848C130.024 33.6 130.248 32.496 130.696 31.536C131.176 30.576 131.864 29.776 132.76 29.136C133.656 28.496 134.792 28.016 136.168 27.696C137.544 27.344 139.112 27.168 140.872 27.168H148.84L148.552 30.192H140.392C139.272 30.192 138.28 30.288 137.416 30.48C136.584 30.672 135.864 30.976 135.256 31.392C134.68 31.776 134.232 32.256 133.912 32.832C133.624 33.376 133.48 34.032 133.48 34.8C133.48 35.696 133.704 36.496 134.152 37.2C134.632 37.872 135.256 38.4 136.024 38.784C136.824 39.136 137.72 39.312 138.712 39.312C140.024 39.312 141.256 39.088 142.408 38.64C143.56 38.16 144.584 37.52 145.48 36.72C146.408 35.888 147.144 34.96 147.688 33.936L148.696 36.24C147.992 37.456 147.112 38.544 146.056 39.504C145 40.432 143.832 41.168 142.552 41.712C141.304 42.224 139.976 42.48 138.568 42.48ZM156.959 42V16.8H160.607L160.655 24.096L160.223 22.848C160.543 21.696 161.087 20.624 161.855 19.632C162.655 18.64 163.615 17.856 164.735 17.28C165.855 16.672 167.087 16.368 168.431 16.368C168.975 16.368 169.487 16.416 169.967 16.512C170.447 16.576 170.847 16.672 171.167 16.8L170.207 20.784C169.759 20.624 169.295 20.496 168.815 20.4C168.367 20.272 167.935 20.208 167.519 20.208C166.527 20.208 165.599 20.416 164.735 20.832C163.903 21.216 163.183 21.744 162.575 22.416C161.967 23.088 161.487 23.856 161.135 24.72C160.815 25.552 160.655 26.416 160.655 27.312V42H156.959ZM174.819 42V16.8H178.467V22.176L177.747 22.608C178.099 21.488 178.739 20.464 179.667 19.536C180.595 18.608 181.715 17.856 183.027 17.28C184.339 16.672 185.699 16.368 187.107 16.368C188.995 16.368 190.579 16.736 191.859 17.472C193.171 18.176 194.163 19.28 194.835 20.784C195.507 22.288 195.843 24.192 195.843 26.496V42H192.195V26.736C192.195 25.104 191.955 23.76 191.475 22.704C191.027 21.648 190.339 20.88 189.411 20.4C188.515 19.92 187.379 19.696 186.003 19.728C184.915 19.728 183.907 19.904 182.979 20.256C182.083 20.608 181.299 21.088 180.627 21.696C179.955 22.272 179.427 22.928 179.043 23.664C178.659 24.368 178.467 25.072 178.467 25.776V42H176.691C176.403 42 176.099 42 175.779 42C175.459 42 175.139 42 174.819 42ZM204.586 42.432C203.722 42.432 203.05 42.192 202.57 41.712C202.122 41.2 201.898 40.48 201.898 39.552C201.898 38.688 202.138 38 202.618 37.488C203.13 36.944 203.786 36.672 204.586 36.672C205.45 36.672 206.106 36.928 206.554 37.44C207.034 37.92 207.274 38.624 207.274 39.552C207.274 40.384 207.018 41.072 206.506 41.616C206.026 42.16 205.386 42.432 204.586 42.432Z"
                                  fill="#757F8F"></path>
                           </svg>

                    </span>
                    {{--<h2 class="brand-text">Vuexy</h2>--}}
                </a>
            </li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item {{ (request()->is('admin/dashboard')) ? 'active' : '' }}"><a
                    class="d-flex align-items-center" href="{{ route('admin') }}"><i data-feather="home"></i><span
                        class="menu-title text-truncate" data-i18n="Dashboards">Dashboard</span><span
                        class="badge badge-light-warning rounded-pill ms-auto me-1"></span></a>

            </li>
            {{--<li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Course Management</span><i data-feather="more-horizontal"></i>
            </li>--}}

            @canany(['manage_course_reference', 'manage_course_category', 'manage_course_subcategory', 'manage_course_tag', 'manage_course_language', 'manage_course_difficulty_level'])

                <li class="nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='settings'></i><span
                            class="menu-title text-truncate" data-i18n="Invoice">Course Setup</span></a>
                    <ul class="menu-content">

                        @can('manage_course_category')
                            <li class="{{ (request()->is('admin/category*')) ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="{{ route('category.index') }}"><i
                                        data-feather="circle"></i><span class="menu-item text-truncate"
                                                                        data-i18n="List">Category</span></a>
                            </li>
                        @endcan

                        @can('manage_course_subcategory')
                            <li class="{{ (request()->is('admin/subCategory*')) ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="{{ route('subCategory.index') }}"><i
                                        data-feather="circle"></i><span class="menu-item text-truncate"
                                                                        data-i18n="Preview">Sub Category</span></a>
                            </li>
                        @endcan

                        @can('manage_course_tag')
                            <li class="{{ (request()->is('admin/tag*')) ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="{{ route('tag.index') }}"><i
                                        data-feather="circle"></i><span class="menu-item text-truncate"
                                                                        data-i18n="Edit">Tag</span></a>
                            </li>

                        @endcan

                        @can('manage_course_language')
                            <li class="{{ (request()->is('admin/language*')) ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="{{ route('language.index') }}"><i
                                        data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">Language</span></a>
                            </li>
                        @endcan

                        @can('manage_course_difficulty_level')
                            <li class="{{ (request()->is('admin/difficultyLevel*')) ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="{{ route('difficultyLevel.index') }}"><i
                                        data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">Difficulty Level</span></a>
                            </li>
                        @endcan

                        <li class="{{ (request()->is('admin/keyPoints*')) ? 'active' : '' }}"><a
                                class="d-flex align-items-center" href="{{ route('keyPoints.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">Key Points</span></a>
                        </li>

                        <li class="{{ (request()->is('admin/promotionalTag*')) ? 'active' : '' }}"><a
                                class="d-flex align-items-center" href="{{ route('promotionalTag.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">Promotional Tag</span></a>
                        </li>
                        <li class="{{ (request()->is('admin/rulesBenefits*')) ? 'active' : '' }}"><a
                                class="d-flex align-items-center" href="{{ route('rulesBenefits.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">Rules & Benifits</span></a>
                        </li>

                    </ul>
                </li>
            @endcanany

            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='book'></i><span
                        class="menu-title text-truncate" data-i18n="Roles &amp; Permission">Manage Course</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('admin/reviewPendingCourse*')) ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{ route('course.reviewPending')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Permission">Review Pending</span></a>
                    </li>
                    <li class="{{ (request()->is('admin/course*')) ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{ route('course.index') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Roles">All Courses</span></a>
                    </li>

                    <li class="{{ (request()->is('admin/approvedCourse*')) ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{ route('course.approved')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Permission">Approved Courses</span></a>
                    </li>
                    <li class="{{ (request()->is('admin/holdCourse*')) ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{ route('course.hold')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Permission">Hold Courses</span></a>
                    </li>

                    <li class="{{ (request()->is('admin/enrollStudent*')) ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{ route('course.enroll')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Permission">Enroll In Courses</span></a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='briefcase'></i><span
                        class="menu-title text-truncate" data-i18n="eCommerce">Manage Instructor</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('admin/instructor*')) ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{ route('instructor.index')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Shop">All Instructors</span></a>
                    </li>

                    <li class="{{ (request()->is('admin/createInstructor')) ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{ route('createInstructor')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Shop">Add Instructor</span></a>
                    </li>

                    <li class="{{ (request()->is('admin/approvedInstructor')) ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{ route('instructor.approved')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Shop">Approved Instructors</span></a>
                    </li>
                    <li class="{{ (request()->is('admin/blockedInstructor')) ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{ route('instructor.blocked')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Shop">Blocked Instructors</span></a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='heart'></i><span
                        class="menu-title text-truncate" data-i18n="User">Manage Student</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('admin/student*')) ? 'active' : '' }} "><a
                            class="d-flex align-items-center" href="{{route('student.index')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">All Students</span></a>
                    </li>

                    <li class="{{ (request()->is('admin/createStudent')) ? 'active' : '' }} "><a
                            class="d-flex align-items-center" href="{{route('createStudent')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Add Student</span></a>
                    </li>

                    <li class="{{ (request()->is('admin/approvedStudent')) ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{ route('student.approved')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Shop">Approved Students</span></a>
                    </li>
                    <li class="{{ (request()->is('admin/blockedStudent')) ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{ route('student.blocked')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Shop">Blocked Students</span></a>
                    </li>


                </ul>
            </li>


            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='tag'></i><span
                        class="menu-title text-truncate" data-i18n="User">Manage Coupon</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('admin/coupon*')) ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{route('coupon.index')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Coupon List</span></a>
                    </li>

                    <li class="{{ (request()->is('admin/createCoupon')) ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{route('createCoupon')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Add Coupon</span></a>
                    </li>


                </ul>
            </li>


            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='sun'></i><span
                        class="menu-title text-truncate" data-i18n="User">Manage Promotion</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('admin/promotion*')) ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{route('promotion.index')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Promotion List</span></a>
                    </li>

                    <li class="{{ (request()->is('admin/createPromotion')) ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{route('createPromotion')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Add Promotion</span></a>
                    </li>
                </ul>
            </li>


            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='dollar-sign'></i></i>
                    <span
                        class="menu-title text-truncate" data-i18n="User">Payment Settings</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('admin/bank*')) ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{route('bank.index')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                                data-i18n="List">Bank</span></a>
                    </li>

                    <li><a class="d-flex align-items-center" href="#"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">SSLCOMMERZ</span></a>
                    </li>

                    <li class="{{ (request()->is('admin/payment-method/paypal*')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ route('payment-method.paypal') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                                data-i18n="List">PayPal</span>
                        </a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                                data-i18n="List">Stripe</span></a>
                    </li>
                </ul>
            </li>


            <li class=" nav-item"><a class="d-flex align-items-center" href="javascript:void(0);"><i
                        data-feather='pie-chart'></i><span
                        class="menu-title text-truncate" data-i18n="User">Manage Order</span></a>
                <ul class="menu-content">

                    <li class="{{ (request()->is('admin/all-order*')) ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{ route('report.allOrder') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">All Order</span></a>
                    </li>

                    <li class="{{ (request()->is('admin/order-pending*')) ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{ route('report.order-pending') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Order Pending</span></a>
                    </li>

                    <li class="{{ (request()->is('admin/order-cancelled*')) ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{ route('report.orderCancelled') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Cancelled Order</span></a>
                    </li>


                </ul>
            </li>


            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='command'></i><span
                        class="menu-title text-truncate" data-i18n="User">Manage Payment</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="#"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Student Payment</span></a>
                    </li>

                    <li><a class="d-flex align-items-center" href="#"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Instructor Payment</span></a>
                    </li>


                </ul>
            </li>


            {{--<li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='headphones'></i><span
                        class="menu-title text-truncate" data-i18n="User">Support Ticket</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{route('supportTicket.index')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">All Tickets</span></a>
                    </li>

                    <li><a class="d-flex align-items-center" href="{{route('supportTicket.openTicket')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Open Tickets</span></a>
                    </li>


                </ul>
            </li>--}}


            {{--<li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='at-sign'></i><span
                        class="menu-title text-truncate" data-i18n="User">Email Management</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{route('emailTemplate.index')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Email Templates</span></a>
                    </li>

                    <li><a class="d-flex align-items-center" href="{{route('emailTemplate.sendEmail')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Send Email</span></a>
                    </li>


                </ul>
            </li>--}}


            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='book-open'></i><span
                        class="menu-title text-truncate" data-i18n="User">Manage Blog</span></a>
                <ul class="menu-content">

                    <li class="{{ (request()->is('admin/blogCategory*')) ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{route('blogCategory.index')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Blog Category</span></a>
                    </li>

                    <li class="{{ (request()->is('admin/createBlogPost')) ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{route('createBlogPost')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Add Blog Post</span></a>
                    </li>

                    <li class="{{ (request()->is('admin/blogPost*')) ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{route('blog.index')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">All Blog Posts</span></a>
                    </li>


                    <li class="{{ (request()->is('admin/blogComment*')) ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{route('blogComment.index')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Blog Comment List</span></a>
                    </li>

                </ul>
            </li>


            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='users'></i><span
                        class="menu-title text-truncate" data-i18n="User">User Management</span></a>
                <ul class="menu-content">

                    <li class="{{ (request()->is('admin/role*')) ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{route('role.index')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                                data-i18n="List">Roles</span></a>
                    </li>

                    <li class="{{ (request()->is('admin/createUser')) ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{route('createUser')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Add User</span></a>
                    </li>

                    <li class="{{ (request()->is('admin/user*')) ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{route('user.index')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">All Users</span></a>
                    </li>

                </ul>
            </li>


            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='slack'></i><span
                        class="menu-title text-truncate" data-i18n="User">Application Settings</span></a>
                <ul class="menu-content">

                    <li class="{{ (request()->is('admin/currency*')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{route('currency.index')}}"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="List">Currency</span></a>

                    <li class="{{ (request()->is('admin/location*')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{route('location.index')}}"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="List">Location</span></a>
                    </li>


                </ul>
            </li>


        </ul>
    </div>
</div>
<!-- END: Main Menu-->

<!-- BEGIN: Content-->

<div class="app-content content ">

    {{--<div class="preloader fixed bottom-0 top-0 left-0 right-0 bg-white">
        <div class="w-16 h-16 absolute bottom-0 top-0 left-0 right-0 m-auto"><img
                src="{{asset('frontend/assets/images/preloader.gif')}}"
                alt="title"></div>
    </div>--}}

    @yield('content')

</div>

<!-- END: Content-->

<!-- BEGIN: Customizer-->
<div class="customizer d-none d-md-block"><a class="customizer-toggle d-flex align-items-center justify-content-center"
                                             href="#"><i class="spinner" data-feather="settings"></i></a>
    <div class="customizer-content">
        <!-- Customizer header -->
        <div class="customizer-header px-2 pt-1 pb-0 position-relative">
            <h4 class="mb-0">Theme Customizer</h4>
            <p class="m-0">Customize & Preview in Real Time</p>

            <a class="customizer-close" href="#"><i data-feather="x"></i></a>
        </div>

        <hr/>

        <!-- Styling & Text Direction -->
        <div class="customizer-styling-direction px-2">
            <p class="fw-bold">Skin</p>
            <div class="d-flex">
                <div class="form-check me-1">
                    <input
                        type="radio"
                        id="skinlight"
                        name="skinradio"
                        class="form-check-input layout-name"
                        checked
                        data-layout=""
                    />
                    <label class="form-check-label" for="skinlight">Light</label>
                </div>
                <div class="form-check me-1">
                    <input
                        type="radio"
                        id="skinbordered"
                        name="skinradio"
                        class="form-check-input layout-name"
                        data-layout="bordered-layout"
                    />
                    <label class="form-check-label" for="skinbordered">Bordered</label>
                </div>
                <div class="form-check me-1">
                    <input
                        type="radio"
                        id="skindark"
                        name="skinradio"
                        class="form-check-input layout-name"
                        data-layout="dark-layout"
                    />
                    <label class="form-check-label" for="skindark">Dark</label>
                </div>
                <div class="form-check">
                    <input
                        type="radio"
                        id="skinsemidark"
                        name="skinradio"
                        class="form-check-input layout-name"
                        data-layout="semi-dark-layout"
                    />
                    <label class="form-check-label" for="skinsemidark">Semi Dark</label>
                </div>
            </div>
        </div>

        <hr/>

        <!-- Menu -->
        <div class="customizer-menu px-2">
            <div id="customizer-menu-collapsible" class="d-flex">
                <p class="fw-bold me-auto m-0">Menu Collapsed</p>
                <div class="form-check form-check-primary form-switch">
                    <input type="checkbox" class="form-check-input" id="collapse-sidebar-switch"/>
                    <label class="form-check-label" for="collapse-sidebar-switch"></label>
                </div>
            </div>
        </div>
        <hr/>

        <!-- Layout Width -->
        <div class="customizer-footer px-2">
            <p class="fw-bold">Layout Width</p>
            <div class="d-flex">
                <div class="form-check me-1">
                    <input type="radio" id="layout-width-full" name="layoutWidth" class="form-check-input" checked/>
                    <label class="form-check-label" for="layout-width-full">Full Width</label>
                </div>
                <div class="form-check me-1">
                    <input type="radio" id="layout-width-boxed" name="layoutWidth" class="form-check-input"/>
                    <label class="form-check-label" for="layout-width-boxed">Boxed</label>
                </div>
            </div>
        </div>
        <hr/>

        <!-- Navbar -->
        <div class="customizer-navbar px-2">
            <div id="customizer-navbar-colors">
                <p class="fw-bold">Navbar Color</p>
                <ul class="list-inline unstyled-list">
                    <li class="color-box bg-white border selected" data-navbar-default=""></li>
                    <li class="color-box bg-primary" data-navbar-color="bg-primary"></li>
                    <li class="color-box bg-secondary" data-navbar-color="bg-secondary"></li>
                    <li class="color-box bg-success" data-navbar-color="bg-success"></li>
                    <li class="color-box bg-danger" data-navbar-color="bg-danger"></li>
                    <li class="color-box bg-info" data-navbar-color="bg-info"></li>
                    <li class="color-box bg-warning" data-navbar-color="bg-warning"></li>
                    <li class="color-box bg-dark" data-navbar-color="bg-dark"></li>
                </ul>
            </div>

            <p class="navbar-type-text fw-bold">Navbar Type</p>
            <div class="d-flex">
                <div class="form-check me-1">
                    <input type="radio" id="nav-type-floating" name="navType" class="form-check-input" checked/>
                    <label class="form-check-label" for="nav-type-floating">Floating</label>
                </div>
                <div class="form-check me-1">
                    <input type="radio" id="nav-type-sticky" name="navType" class="form-check-input"/>
                    <label class="form-check-label" for="nav-type-sticky">Sticky</label>
                </div>
                <div class="form-check me-1">
                    <input type="radio" id="nav-type-static" name="navType" class="form-check-input"/>
                    <label class="form-check-label" for="nav-type-static">Static</label>
                </div>
                <div class="form-check">
                    <input type="radio" id="nav-type-hidden" name="navType" class="form-check-input"/>
                    <label class="form-check-label" for="nav-type-hidden">Hidden</label>
                </div>
            </div>
        </div>
        <hr/>

        <!-- Footer -->
        <div class="customizer-footer px-2">
            <p class="fw-bold">Footer Type</p>
            <div class="d-flex">
                <div class="form-check me-1">
                    <input type="radio" id="footer-type-sticky" name="footerType" class="form-check-input"/>
                    <label class="form-check-label" for="footer-type-sticky">Sticky</label>
                </div>
                <div class="form-check me-1">
                    <input type="radio" id="footer-type-static" name="footerType" class="form-check-input" checked/>
                    <label class="form-check-label" for="footer-type-static">Static</label>
                </div>
                <div class="form-check me-1">
                    <input type="radio" id="footer-type-hidden" name="footerType" class="form-check-input"/>
                    <label class="form-check-label" for="footer-type-hidden">Hidden</label>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End: Customizer-->

<!-- Buynow Button-->
<div class="buy-now"><a href="https://themeix.com" target="_blank" class="btn btn-danger">Buy Now</a>

</div>
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT  &copy; 2021<a
                class="ms-25" href="https://themeix.com/" target="_blank">Themeix</a><span
                class="d-none d-sm-inline-block">, All rights Reserved</span></span><span
            class="float-md-end d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="{{asset('app-assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->


<script src="{{asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
<script src="{{asset('app-assets/js/scripts/extensions/ext-component-sweet-alerts.js') }}"></script>


<script src="{{asset('app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
{{--<script src="{{asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>--}}
<script src="{{asset('app-assets/vendors/js/extensions/moment.min.js') }}"></script>
<script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('app-assets/js/core/app-menu.min.js') }}"></script>
<script src="{{asset('app-assets/js/core/app.min.js') }}"></script>
<script src="{{asset('/app-assets/js/scripts/customizer.min.js') }}"></script>

<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('app-assets/js/scripts/pages/dashboard-analytics.min.js') }}"></script>

<!-- END: Page JS-->


<!-- Datatbale js -->

<script src="{{asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js')}}"></script>


<script>
    $(window).on('load', function () {
        if (feather) {
            feather.replace({width: 14, height: 14});
        }
    })
</script>

@stack('scripts')
</body>
<!-- END: Body-->
</html>
