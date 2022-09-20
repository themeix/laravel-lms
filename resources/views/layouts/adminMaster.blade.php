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
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('logo.svg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/toastr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')}}">
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
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/extensions/ext-component-toastr.min.css')}}">

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <!-- END: Custom CSS-->

    @stack('styles')
</head>
<!-- END: Head-->


<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

@include('sweetalert::alert')

<!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
            </ul>
            <ul class="nav navbar-nav bookmark-icons">
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-email.html" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Email"><i class="ficon" data-feather="mail"></i></a></li>
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-chat.html" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Chat"><i class="ficon" data-feather="message-square"></i></a></li>
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-calendar.html" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Calendar"><i class="ficon" data-feather="calendar"></i></a></li>
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-todo.html" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Todo"><i class="ficon" data-feather="check-square"></i></a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon text-warning" data-feather="star"></i></a>
                    <div class="bookmark-input search-input">
                        <div class="bookmark-input-icon"><i data-feather="search"></i></div>
                        <input class="form-control input" type="text" placeholder="Bookmark" tabindex="0" data-search="search">
                        <ul class="search-list search-list-bookmark"></ul>
                    </div>
                </li>
            </ul>
        </div>



        <ul class="nav navbar-nav align-items-center ms-auto">

            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>
            <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon" data-feather="search"></i></a>
                <div class="search-input">
                    <div class="search-input-icon"><i data-feather="search"></i></div>
                    <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="-1" data-search="search">
                    <div class="search-input-close"><i data-feather="x"></i></div>
                    <ul class="search-list search-list-main"></ul>
                </div>
            </li>
            <li class="nav-item dropdown dropdown-cart me-25"><a class="nav-link" href="#" data-bs-toggle="dropdown"><i class="ficon" data-feather="shopping-cart"></i><span class="badge rounded-pill bg-primary badge-up cart-item-count">6</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                    <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex">
                            <h4 class="notification-title mb-0 me-auto">My Cart</h4>
                            <div class="badge rounded-pill badge-light-primary">4 Items</div>
                        </div>
                    </li>
                    <li class="scrollable-container media-list">
                        <div class="list-item align-items-center"><img class="d-block rounded me-1" src="{{asset('app-assets/images/pages/eCommerce/1.png')}}" alt="donuts" width="62">
                            <div class="list-item-body flex-grow-1"><i class="ficon cart-item-remove" data-feather="x"></i>
                                <div class="media-heading">
                                    <h6 class="cart-item-title"><a class="text-body" href="app-ecommerce-details.html"> Apple watch 5</a></h6><small class="cart-item-by">By Apple</small>
                                </div>
                                <div class="cart-item-qty">
                                    <div class="input-group">
                                        <input class="touchspin-cart" type="number" value="1">
                                    </div>
                                </div>
                                <h5 class="cart-item-price">$374.90</h5>
                            </div>
                        </div>
                        <div class="list-item align-items-center"><img class="d-block rounded me-1" src="{{asset('app-assets/images/pages/eCommerce/7.png')}}'" alt="donuts" width="62">
                            <div class="list-item-body flex-grow-1"><i class="ficon cart-item-remove" data-feather="x"></i>
                                <div class="media-heading">
                                    <h6 class="cart-item-title"><a class="text-body" href="app-ecommerce-details.html"> Google Home Mini</a></h6><small class="cart-item-by">By Google</small>
                                </div>
                                <div class="cart-item-qty">
                                    <div class="input-group">
                                        <input class="touchspin-cart" type="number" value="3">
                                    </div>
                                </div>
                                <h5 class="cart-item-price">$129.40</h5>
                            </div>
                        </div>
                        <div class="list-item align-items-center"><img class="d-block rounded me-1" src="{{asset('app-assets/images/pages/eCommerce/2.png')}}" alt="donuts" width="62">
                            <div class="list-item-body flex-grow-1"><i class="ficon cart-item-remove" data-feather="x"></i>
                                <div class="media-heading">
                                    <h6 class="cart-item-title"><a class="text-body" href="app-ecommerce-details.html"> iPhone 11 Pro</a></h6><small class="cart-item-by">By Apple</small>
                                </div>
                                <div class="cart-item-qty">
                                    <div class="input-group">
                                        <input class="touchspin-cart" type="number" value="2">
                                    </div>
                                </div>
                                <h5 class="cart-item-price">$699.00</h5>
                            </div>
                        </div>
                        <div class="list-item align-items-center"><img class="d-block rounded me-1" src="{{asset('app-assets/images/pages/eCommerce/3.png')}}'" alt="donuts" width="62">
                            <div class="list-item-body flex-grow-1"><i class="ficon cart-item-remove" data-feather="x"></i>
                                <div class="media-heading">
                                    <h6 class="cart-item-title"><a class="text-body" href="app-ecommerce-details.html"> iMac Pro</a></h6><small class="cart-item-by">By Apple</small>
                                </div>
                                <div class="cart-item-qty">
                                    <div class="input-group">
                                        <input class="touchspin-cart" type="number" value="1">
                                    </div>
                                </div>
                                <h5 class="cart-item-price">$4,999.00</h5>
                            </div>
                        </div>
                        <div class="list-item align-items-center"><img class="d-block rounded me-1" src="{{asset('app-assets/images/pages/eCommerce/5.png')}}" alt="donuts" width="62">
                            <div class="list-item-body flex-grow-1"><i class="ficon cart-item-remove" data-feather="x"></i>
                                <div class="media-heading">
                                    <h6 class="cart-item-title"><a class="text-body" href="app-ecommerce-details.html"> MacBook Pro</a></h6><small class="cart-item-by">By Apple</small>
                                </div>
                                <div class="cart-item-qty">
                                    <div class="input-group">
                                        <input class="touchspin-cart" type="number" value="1">
                                    </div>
                                </div>
                                <h5 class="cart-item-price">$2,999.00</h5>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown-menu-footer">
                        <div class="d-flex justify-content-between mb-1">
                            <h6 class="fw-bolder mb-0">Total:</h6>
                            <h6 class="text-primary fw-bolder mb-0">$10,999.00</h6>
                        </div><a class="btn btn-primary w-100" href="app-ecommerce-checkout.html">Checkout</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown dropdown-notification me-25"><a class="nav-link" href="#" data-bs-toggle="dropdown"><i class="ficon" data-feather="bell"></i><span class="badge rounded-pill bg-danger badge-up">5</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                    <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex">
                            <h4 class="notification-title mb-0 me-auto">Notifications</h4>
                            <div class="badge rounded-pill badge-light-primary">6 New</div>
                        </div>
                    </li>
                    <li class="scrollable-container media-list"><a class="d-flex" href="#">
                            <div class="list-item d-flex align-items-start">
                                <div class="me-1">
                                    <div class="avatar"><img src="{{asset('app-assets/images/portrait/small/avatar-s-15.jpg')}}'" alt="avatar" width="32" height="32"></div>
                                </div>
                                <div class="list-item-body flex-grow-1">
                                    <p class="media-heading"><span class="fw-bolder">Congratulation Sam 🎉</span>winner!</p><small class="notification-text"> Won the monthly best seller badge.</small>
                                </div>
                            </div></a><a class="d-flex" href="#">
                            <div class="list-item d-flex align-items-start">
                                <div class="me-1">
                                    <div class="avatar"><img src="{{asset('app-assets/images/portrait/small/avatar-s-3.jpg')}}'" alt="avatar" width="32" height="32"></div>
                                </div>
                                <div class="list-item-body flex-grow-1">
                                    <p class="media-heading"><span class="fw-bolder">New message</span>&nbsp;received</p><small class="notification-text"> You have 10 unread messages</small>
                                </div>
                            </div></a><a class="d-flex" href="#">
                            <div class="list-item d-flex align-items-start">
                                <div class="me-1">
                                    <div class="avatar bg-light-danger">
                                        <div class="avatar-content">MD</div>
                                    </div>
                                </div>
                                <div class="list-item-body flex-grow-1">
                                    <p class="media-heading"><span class="fw-bolder">Revised Order 👋</span>&nbsp;checkout</p><small class="notification-text"> MD Inc. order updated</small>
                                </div>
                            </div></a>
                        <div class="list-item d-flex align-items-center">
                            <h6 class="fw-bolder me-auto mb-0">System Notifications</h6>
                            <div class="form-check form-check-primary form-switch">
                                <input class="form-check-input" id="systemNotification" type="checkbox" checked="">
                                <label class="form-check-label" for="systemNotification"></label>
                            </div>
                        </div><a class="d-flex" href="#">
                            <div class="list-item d-flex align-items-start">
                                <div class="me-1">
                                    <div class="avatar bg-light-danger">
                                        <div class="avatar-content"><i class="avatar-icon" data-feather="x"></i></div>
                                    </div>
                                </div>
                                <div class="list-item-body flex-grow-1">
                                    <p class="media-heading"><span class="fw-bolder">Server down</span>&nbsp;registered</p><small class="notification-text"> USA Server is down due to high CPU usage</small>
                                </div>
                            </div></a><a class="d-flex" href="#">
                            <div class="list-item d-flex align-items-start">
                                <div class="me-1">
                                    <div class="avatar bg-light-success">
                                        <div class="avatar-content"><i class="avatar-icon" data-feather="check"></i></div>
                                    </div>
                                </div>
                                <div class="list-item-body flex-grow-1">
                                    <p class="media-heading"><span class="fw-bolder">Sales report</span>&nbsp;generated</p><small class="notification-text"> Last month sales report generated</small>
                                </div>
                            </div></a><a class="d-flex" href="#">
                            <div class="list-item d-flex align-items-start">
                                <div class="me-1">
                                    <div class="avatar bg-light-warning">
                                        <div class="avatar-content"><i class="avatar-icon" data-feather="alert-triangle"></i></div>
                                    </div>
                                </div>
                                <div class="list-item-body flex-grow-1">
                                    <p class="media-heading"><span class="fw-bolder">High memory</span>&nbsp;usage</p><small class="notification-text"> BLR Server using high memory</small>
                                </div>
                            </div></a>
                    </li>
                    <li class="dropdown-menu-footer"><a class="btn btn-primary w-100" href="#">Read all notifications</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

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
                    </div><span class="avatar"><img class="round" src="{{asset('custom/image/user-no-image.png')}}" alt="avatar" height="40" width="40">
                        <span class="avatar-status-online"></span></span></a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">

                    <a class="dropdown-item" href="page-profile.html">
                        <i class="me-50" data-feather="user">

                        </i> Profile</a>
                    {{--<a class="dropdown-item" href="app-email.html">
                        <i class="me-50" data-feather="mail"></i> Inbox</a>

                    <a class="dropdown-item" href="app-todo.html"><i class="me-50" data-feather="check-square">

                        </i> Task</a>

                    <a class="dropdown-item" href="app-chat.html"><i class="me-50" data-feather="message-square"></i> Chats</a>--}}

                    {{--<div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="page-account-settings-account.html">
                        <i class="me-50" data-feather="settings"></i> Settings</a>--}}

                    {{--<a class="dropdown-item" href="page-pricing.html"><i class="me-50" data-feather="credit-card"></i> Pricing</a>

                    <a class="dropdown-item" href="page-faq.html"><i class="me-50" data-feather="help-circle"></i> FAQ</a>--}}

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
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
            <div class="d-flex">
                <div class="me-75"><img src="{{asset('app-assets/images/icons/xls.png')}}" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing Manager</small>
                </div>
            </div><small class="search-data-size me-50 text-muted">&apos;17kb</small></a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
            <div class="d-flex">
                <div class="me-75"><img src="{{asset('app-assets/images/icons/jpg.png')}}" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd Developer</small>
                </div>
            </div><small class="search-data-size me-50 text-muted">&apos;11kb</small></a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
            <div class="d-flex">
                <div class="me-75"><img src="{{asset('app-assets/images/icons/pdf.png')}}" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital Marketing Manager</small>
                </div>
            </div><small class="search-data-size me-50 text-muted">&apos;150kb</small></a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
            <div class="d-flex">
                <div class="me-75"><img src="{{asset('app-assets/images/icons/doc.png" alt="png')}}" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web Designer</small>
                </div>
            </div><small class="search-data-size me-50 text-muted">&apos;256kb</small></a></li>
    <li class="d-flex align-items-center"><a href="#">
            <h6 class="section-label mt-75 mb-0">Members</h6></a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view-account.html">
            <div class="d-flex align-items-center">
                <div class="avatar me-75"><img src="{{asset('app-assets/images/portrait/small/avatar-s-8.jpg')}}" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                </div>
            </div></a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view-account.html">
            <div class="d-flex align-items-center">
                <div class="avatar me-75"><img src="{{asset('app-assets/images/portrait/small/avatar-s-1.jpg')}}" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd Developer</small>
                </div>
            </div></a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view-account.html">
            <div class="d-flex align-items-center">
                <div class="avatar me-75"><img src="{{asset('app-assets/images/portrait/small/avatar-s-14.jpg')}}" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing Manager</small>
                </div>
            </div></a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view-account.html">
            <div class="d-flex align-items-center">
                <div class="avatar me-75"><img src="{{asset('app-assets/images/portrait/small/avatar-s-6.jpg')}}" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
                </div>
            </div></a></li>
</ul>
<ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion justify-content-between"><a class="d-flex align-items-center justify-content-between w-100 py-50">
            <div class="d-flex justify-content-start"><span class="me-75" data-feather="alert-circle"></span><span>No results found.</span></div></a></li>
</ul>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href="{{ route('admin') }}"><span class="brand-logo">

                        <svg width="138" height="24" viewBox="0 0 138 35" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0.512 34V0.399998H6.704V28.24H22.208V34H0.512ZM39.2964 34.48C36.6404 34.48 34.2884 33.936 32.2404 32.848C30.2244 31.728 28.6404 30.208 27.4884 28.288C26.3684 26.336 25.8084 24.096 25.8084 21.568C25.8084 19.584 26.1284 17.776 26.7684 16.144C27.4084 14.512 28.3044 13.104 29.4564 11.92C30.6084 10.704 31.9684 9.776 33.5364 9.136C35.1364 8.464 36.8644 8.128 38.7204 8.128C40.4164 8.128 41.9684 8.448 43.3764 9.088C44.8164 9.728 46.0644 10.608 47.1204 11.728C48.1764 12.816 48.9764 14.128 49.5204 15.664C50.0964 17.168 50.3684 18.816 50.3364 20.608L50.2884 22.72H29.8404L28.6884 18.64H45.3444L44.6244 19.456V18.352C44.5284 17.392 44.2084 16.544 43.6644 15.808C43.1204 15.04 42.4164 14.448 41.5524 14.032C40.7204 13.584 39.7924 13.36 38.7684 13.36C37.2004 13.36 35.8724 13.664 34.7844 14.272C33.6964 14.848 32.8644 15.712 32.2884 16.864C31.7444 18.016 31.4724 19.44 31.4724 21.136C31.4724 22.768 31.8084 24.192 32.4804 25.408C33.1844 26.624 34.1764 27.568 35.4564 28.24C36.7364 28.912 38.2244 29.248 39.9204 29.248C41.1044 29.248 42.1924 29.056 43.1844 28.672C44.2084 28.288 45.2964 27.6 46.4484 26.608L49.3284 30.64C48.4644 31.44 47.4724 32.128 46.3524 32.704C45.2644 33.248 44.1124 33.68 42.8964 34C41.6804 34.32 40.4804 34.48 39.2964 34.48ZM70.0134 34V17.824C70.0134 16.448 69.5494 15.376 68.6214 14.608C67.7254 13.808 66.5574 13.408 65.1174 13.408C63.7734 13.408 62.5574 13.68 61.4694 14.224C60.3814 14.736 59.3734 15.568 58.4454 16.72L54.7974 13.072C56.3014 11.472 57.9654 10.256 59.7894 9.424C61.6134 8.592 63.5814 8.176 65.6934 8.176C67.7094 8.176 69.4374 8.496 70.8774 9.136C72.3494 9.776 73.4854 10.736 74.2854 12.016C75.0854 13.264 75.4854 14.8 75.4854 16.624V34H70.0134ZM62.8134 34.48C61.1814 34.48 59.7254 34.16 58.4454 33.52C57.1654 32.88 56.1414 32 55.3734 30.88C54.6374 29.728 54.2694 28.384 54.2694 26.848C54.2694 25.504 54.5094 24.336 54.9894 23.344C55.4694 22.32 56.1734 21.472 57.1014 20.8C58.0614 20.128 59.2454 19.632 60.6534 19.312C62.0934 18.96 63.7414 18.784 65.5974 18.784H72.8454L72.4134 23.008H65.2614C64.3974 23.008 63.6294 23.088 62.9574 23.248C62.2854 23.408 61.7094 23.648 61.2294 23.968C60.7494 24.288 60.3974 24.672 60.1734 25.12C59.9494 25.536 59.8374 26.048 59.8374 26.656C59.8374 27.296 59.9974 27.856 60.3174 28.336C60.6374 28.784 61.0694 29.136 61.6134 29.392C62.1574 29.648 62.7974 29.776 63.5334 29.776C64.5894 29.776 65.5814 29.6 66.5094 29.248C67.4694 28.896 68.3174 28.4 69.0534 27.76C69.7894 27.12 70.3654 26.4 70.7814 25.6L71.9814 28.864C71.3094 29.984 70.4774 30.96 69.4854 31.792C68.5254 32.624 67.4694 33.28 66.3174 33.76C65.1974 34.24 64.0294 34.48 62.8134 34.48ZM81.7216 34V8.704H87.4816L87.5776 16.768L86.8096 14.944C87.1616 13.664 87.7696 12.512 88.6336 11.488C89.4976 10.464 90.4896 9.664 91.6096 9.088C92.7616 8.48 93.9456 8.176 95.1616 8.176C95.7056 8.176 96.2176 8.224 96.6976 8.32C97.2096 8.416 97.6256 8.528 97.9456 8.656L96.4096 15.088C96.0256 14.896 95.5776 14.752 95.0656 14.656C94.5856 14.528 94.0896 14.464 93.5776 14.464C92.7456 14.464 91.9616 14.624 91.2256 14.944C90.5216 15.232 89.8976 15.648 89.3536 16.192C88.8416 16.736 88.4256 17.376 88.1056 18.112C87.7856 18.816 87.6256 19.6 87.6256 20.464V34H81.7216ZM101.925 34V8.704H107.637L107.733 13.888L106.629 14.464C106.981 13.344 107.605 12.32 108.501 11.392C109.429 10.432 110.533 9.664 111.813 9.088C113.093 8.48 114.421 8.176 115.797 8.176C117.717 8.176 119.317 8.56 120.597 9.328C121.909 10.096 122.885 11.248 123.525 12.784C124.165 14.32 124.485 16.24 124.485 18.544V34H118.629V18.976C118.629 17.664 118.453 16.592 118.101 15.76C117.749 14.896 117.205 14.272 116.469 13.888C115.733 13.472 114.837 13.296 113.781 13.36C112.917 13.36 112.117 13.504 111.381 13.792C110.645 14.048 110.005 14.432 109.461 14.944C108.949 15.424 108.533 16 108.213 16.672C107.925 17.312 107.781 18.016 107.781 18.784V34H104.853C104.309 34 103.781 34 103.269 34C102.789 34 102.341 34 101.925 34ZM133.431 34.528C132.279 34.528 131.383 34.192 130.743 33.52C130.135 32.848 129.831 31.904 129.831 30.688C129.831 29.568 130.151 28.656 130.791 27.952C131.463 27.216 132.343 26.848 133.431 26.848C134.551 26.848 135.431 27.184 136.071 27.856C136.711 28.496 137.031 29.44 137.031 30.688C137.031 31.808 136.695 32.736 136.023 33.472C135.351 34.176 134.487 34.528 133.431 34.528Z" fill="url(#paint0_linear_58_449)"/>
<defs>
<linearGradient id="paint0_linear_58_449" x1="-4" y1="16" x2="140" y2="16" gradientUnits="userSpaceOnUse">
<stop stop-color="#0052D4"/>
<stop offset="0.5" stop-color="#4364F7"/>
<stop offset="1" stop-color="#6FB1FC"/>
</linearGradient>
</defs>
</svg>

                    </span>
                    {{--<h2 class="brand-text">Vuexy</h2>--}}
                </a>
            </li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('admin') }}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboard</span><span class="badge badge-light-warning rounded-pill ms-auto me-1"></span></a>

            </li>
            {{--<li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Course Management</span><i data-feather="more-horizontal"></i>
            </li>--}}


            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='settings'></i><span class="menu-title text-truncate" data-i18n="Invoice">Course Setup</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{ route('category.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Category</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ route('subCategory.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview">Sub Category</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ route('tag.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Edit">Tag</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ route('language.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">Language</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ route('difficultyLevel.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">Difficulty Level</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ route('promotionalTag.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">Promotional Tag</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ route('rulesBenifits.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">Rules & Benifits</span></a>
                    </li>

                </ul>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='book'></i><span class="menu-title text-truncate" data-i18n="Roles &amp; Permission">Manage Course</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{ route('course.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Roles">All Courses</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ route('course.enroll')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Permission">Enroll In Courses</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ route('course.approved')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Permission">Approved</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ route('course.hold')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Permission">Hold</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ route('course.reviewPending')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Permission">Review Pending</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='anchor'></i><span class="menu-title text-truncate" data-i18n="eCommerce">Manage Instructor</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{ route('instructor.index')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Shop">All Instructors</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ route('instructor.create')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Shop">Add Instructor</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ route('instructor.pending')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Shop">Pending Instructors</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ route('instructor.approved')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Shop">Approved Instructors</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ route('instructor.blocked')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Shop">Blocked Instructors</span></a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='heart'></i><span class="menu-title text-truncate" data-i18n="User">Manage Student</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{route('student.index')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">All Students</span></a>
                    </li>

                    <li><a class="d-flex align-items-center" href="{{route('student.create')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Add Student</span></a>
                    </li>

                </ul>
            </li>


            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='credit-card'></i><span class="menu-title text-truncate" data-i18n="User">Manage Payment</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{route('emailTemplate.index')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Student Payment</span></a>
                    </li>

                    <li><a class="d-flex align-items-center" href="{{route('emailTemplate.sendEmail')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Instructor Payment</span></a>
                    </li>



                </ul>
            </li>


            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='tag'></i><span class="menu-title text-truncate" data-i18n="User">Manage Coupon</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{route('coupon.index')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Coupon List</span></a>
                    </li>

                    <li><a class="d-flex align-items-center" href="{{route('coupon.create')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Add Coupon</span></a>
                    </li>



                </ul>
            </li>



            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='sun'></i><span class="menu-title text-truncate" data-i18n="User">Manage Promotion</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{route('promotion.index')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Promotion List</span></a>
                    </li>

                    <li><a class="d-flex align-items-center" href="{{route('promotion.create')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Add Promotion</span></a>
                    </li>



                </ul>
            </li>




            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='headphones'></i><span class="menu-title text-truncate" data-i18n="User">Support Ticket</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{route('supportTicket.index')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">All Tickets</span></a>
                    </li>

                    <li><a class="d-flex align-items-center" href="{{route('supportTicket.openTicket')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Open Tickets</span></a>
                    </li>



                </ul>
            </li>



            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='at-sign'></i><span class="menu-title text-truncate" data-i18n="User">Email Management</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{route('emailTemplate.index')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Email Templates</span></a>
                    </li>

                    <li><a class="d-flex align-items-center" href="{{route('emailTemplate.sendEmail')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Send Email</span></a>
                    </li>



                </ul>
            </li>



            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='book-open'></i><span class="menu-title text-truncate" data-i18n="User">Manage Blog</span></a>
                <ul class="menu-content">

                    <li><a class="d-flex align-items-center" href="{{route('blogCategory.index')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Blog Category</span></a>
                    </li>

                    <li><a class="d-flex align-items-center" href="{{route('emailTemplate.sendEmail')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Add Blog</span></a>
                    </li>

                    <li><a class="d-flex align-items-center" href="{{route('emailTemplate.index')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">All Blog</span></a>
                    </li>


                    <li><a class="d-flex align-items-center" href="{{route('emailTemplate.sendEmail')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Blog Comment List</span></a>
                    </li>

                </ul>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='slack'></i><span class="menu-title text-truncate" data-i18n="User">Application Settings</span></a>
                <ul class="menu-content">

                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Location</span></a>


                        <ul class="menu-content">
                            <li><a class="d-flex align-items-center" href="{{route('country.index')}}"><span class="menu-item text-truncate" data-i18n="Basic">Country</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="{{route('state.index')}}"><span class="menu-item text-truncate" data-i18n="Cover">State</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="{{route('city.index')}}"><span class="menu-item text-truncate" data-i18n="Cover">City</span></a>
                            </li>
                        </ul>





                    </li>

                    <li><a class="d-flex align-items-center" href="{{route('emailTemplate.sendEmail')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Add Blog</span></a>
                    </li>

                    <li><a class="d-flex align-items-center" href="{{route('emailTemplate.index')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">All Blog</span></a>
                    </li>


                    <li><a class="d-flex align-items-center" href="{{route('emailTemplate.sendEmail')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Blog Comment List</span></a>
                    </li>

                </ul>
            </li>


        </ul>
    </div>
</div>
<!-- END: Main Menu-->

<!-- BEGIN: Content-->

<div class="app-content content ">

@yield('content')

</div>

<!-- END: Content-->

<!-- BEGIN: Customizer-->
<div class="customizer d-none d-md-block"><a class="customizer-toggle d-flex align-items-center justify-content-center" href="#"><i class="spinner" data-feather="settings"></i></a><div class="customizer-content">
        <!-- Customizer header -->
        <div class="customizer-header px-2 pt-1 pb-0 position-relative">
            <h4 class="mb-0">Theme Customizer</h4>
            <p class="m-0">Customize & Preview in Real Time</p>

            <a class="customizer-close" href="#"><i data-feather="x"></i></a>
        </div>

        <hr />

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

        <hr />

        <!-- Menu -->
        <div class="customizer-menu px-2">
            <div id="customizer-menu-collapsible" class="d-flex">
                <p class="fw-bold me-auto m-0">Menu Collapsed</p>
                <div class="form-check form-check-primary form-switch">
                    <input type="checkbox" class="form-check-input" id="collapse-sidebar-switch" />
                    <label class="form-check-label" for="collapse-sidebar-switch"></label>
                </div>
            </div>
        </div>
        <hr />

        <!-- Layout Width -->
        <div class="customizer-footer px-2">
            <p class="fw-bold">Layout Width</p>
            <div class="d-flex">
                <div class="form-check me-1">
                    <input type="radio" id="layout-width-full" name="layoutWidth" class="form-check-input" checked />
                    <label class="form-check-label" for="layout-width-full">Full Width</label>
                </div>
                <div class="form-check me-1">
                    <input type="radio" id="layout-width-boxed" name="layoutWidth" class="form-check-input" />
                    <label class="form-check-label" for="layout-width-boxed">Boxed</label>
                </div>
            </div>
        </div>
        <hr />

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
                    <input type="radio" id="nav-type-floating" name="navType" class="form-check-input" checked />
                    <label class="form-check-label" for="nav-type-floating">Floating</label>
                </div>
                <div class="form-check me-1">
                    <input type="radio" id="nav-type-sticky" name="navType" class="form-check-input" />
                    <label class="form-check-label" for="nav-type-sticky">Sticky</label>
                </div>
                <div class="form-check me-1">
                    <input type="radio" id="nav-type-static" name="navType" class="form-check-input" />
                    <label class="form-check-label" for="nav-type-static">Static</label>
                </div>
                <div class="form-check">
                    <input type="radio" id="nav-type-hidden" name="navType" class="form-check-input" />
                    <label class="form-check-label" for="nav-type-hidden">Hidden</label>
                </div>
            </div>
        </div>
        <hr />

        <!-- Footer -->
        <div class="customizer-footer px-2">
            <p class="fw-bold">Footer Type</p>
            <div class="d-flex">
                <div class="form-check me-1">
                    <input type="radio" id="footer-type-sticky" name="footerType" class="form-check-input" />
                    <label class="form-check-label" for="footer-type-sticky">Sticky</label>
                </div>
                <div class="form-check me-1">
                    <input type="radio" id="footer-type-static" name="footerType" class="form-check-input" checked />
                    <label class="form-check-label" for="footer-type-static">Static</label>
                </div>
                <div class="form-check me-1">
                    <input type="radio" id="footer-type-hidden" name="footerType" class="form-check-input" />
                    <label class="form-check-label" for="footer-type-hidden">Hidden</label>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End: Customizer-->

<!-- Buynow Button-->
<div class="buy-now"><a href="https://1.envato.market/vuexy_admin" target="_blank" class="btn btn-danger">Buy Now</a>

</div>
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT  &copy; 2021<a class="ms-25" href="https://themeix.com/" target="_blank">Themeix</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-end d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="{{asset('app-assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
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
    $(window).on('load',  function(){
        if (feather) {
            feather.replace({ width: 14, height: 14 });
        }
    })
</script>

@stack('scripts')
</body>
<!-- END: Body-->
</html>
