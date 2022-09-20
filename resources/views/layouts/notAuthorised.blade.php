<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Learn LMS - Learning Management System">
    <meta name="keywords" content="Learn LMS - Learning Management System">
    <meta name="author" content="PIXINVENT">
    <title>Not-authorized - Learn - LMS</title>
    <link rel="apple-touch-icon" href="{{asset('app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('logo.svg')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
          rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors.min.css')}}">
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
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/page-misc.min.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click"
      data-menu="vertical-menu-modern" data-col="blank-page">
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Not authorized-->
            <div class="misc-wrapper">


                <h2 class="brand-text text-primary ms-1"></h2>
                <div class="misc-inner p-2 p-sm-3">
                    <div class="w-100 text-center">
                        <div class="pb-2">
                            <a href="{{route('home')}}">
                                <svg width="138" height="35" viewBox="0 0 138 35" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.512 34V0.399998H6.704V28.24H22.208V34H0.512ZM39.2964 34.48C36.6404 34.48 34.2884 33.936 32.2404 32.848C30.2244 31.728 28.6404 30.208 27.4884 28.288C26.3684 26.336 25.8084 24.096 25.8084 21.568C25.8084 19.584 26.1284 17.776 26.7684 16.144C27.4084 14.512 28.3044 13.104 29.4564 11.92C30.6084 10.704 31.9684 9.776 33.5364 9.136C35.1364 8.464 36.8644 8.128 38.7204 8.128C40.4164 8.128 41.9684 8.448 43.3764 9.088C44.8164 9.728 46.0644 10.608 47.1204 11.728C48.1764 12.816 48.9764 14.128 49.5204 15.664C50.0964 17.168 50.3684 18.816 50.3364 20.608L50.2884 22.72H29.8404L28.6884 18.64H45.3444L44.6244 19.456V18.352C44.5284 17.392 44.2084 16.544 43.6644 15.808C43.1204 15.04 42.4164 14.448 41.5524 14.032C40.7204 13.584 39.7924 13.36 38.7684 13.36C37.2004 13.36 35.8724 13.664 34.7844 14.272C33.6964 14.848 32.8644 15.712 32.2884 16.864C31.7444 18.016 31.4724 19.44 31.4724 21.136C31.4724 22.768 31.8084 24.192 32.4804 25.408C33.1844 26.624 34.1764 27.568 35.4564 28.24C36.7364 28.912 38.2244 29.248 39.9204 29.248C41.1044 29.248 42.1924 29.056 43.1844 28.672C44.2084 28.288 45.2964 27.6 46.4484 26.608L49.3284 30.64C48.4644 31.44 47.4724 32.128 46.3524 32.704C45.2644 33.248 44.1124 33.68 42.8964 34C41.6804 34.32 40.4804 34.48 39.2964 34.48ZM70.0134 34V17.824C70.0134 16.448 69.5494 15.376 68.6214 14.608C67.7254 13.808 66.5574 13.408 65.1174 13.408C63.7734 13.408 62.5574 13.68 61.4694 14.224C60.3814 14.736 59.3734 15.568 58.4454 16.72L54.7974 13.072C56.3014 11.472 57.9654 10.256 59.7894 9.424C61.6134 8.592 63.5814 8.176 65.6934 8.176C67.7094 8.176 69.4374 8.496 70.8774 9.136C72.3494 9.776 73.4854 10.736 74.2854 12.016C75.0854 13.264 75.4854 14.8 75.4854 16.624V34H70.0134ZM62.8134 34.48C61.1814 34.48 59.7254 34.16 58.4454 33.52C57.1654 32.88 56.1414 32 55.3734 30.88C54.6374 29.728 54.2694 28.384 54.2694 26.848C54.2694 25.504 54.5094 24.336 54.9894 23.344C55.4694 22.32 56.1734 21.472 57.1014 20.8C58.0614 20.128 59.2454 19.632 60.6534 19.312C62.0934 18.96 63.7414 18.784 65.5974 18.784H72.8454L72.4134 23.008H65.2614C64.3974 23.008 63.6294 23.088 62.9574 23.248C62.2854 23.408 61.7094 23.648 61.2294 23.968C60.7494 24.288 60.3974 24.672 60.1734 25.12C59.9494 25.536 59.8374 26.048 59.8374 26.656C59.8374 27.296 59.9974 27.856 60.3174 28.336C60.6374 28.784 61.0694 29.136 61.6134 29.392C62.1574 29.648 62.7974 29.776 63.5334 29.776C64.5894 29.776 65.5814 29.6 66.5094 29.248C67.4694 28.896 68.3174 28.4 69.0534 27.76C69.7894 27.12 70.3654 26.4 70.7814 25.6L71.9814 28.864C71.3094 29.984 70.4774 30.96 69.4854 31.792C68.5254 32.624 67.4694 33.28 66.3174 33.76C65.1974 34.24 64.0294 34.48 62.8134 34.48ZM81.7216 34V8.704H87.4816L87.5776 16.768L86.8096 14.944C87.1616 13.664 87.7696 12.512 88.6336 11.488C89.4976 10.464 90.4896 9.664 91.6096 9.088C92.7616 8.48 93.9456 8.176 95.1616 8.176C95.7056 8.176 96.2176 8.224 96.6976 8.32C97.2096 8.416 97.6256 8.528 97.9456 8.656L96.4096 15.088C96.0256 14.896 95.5776 14.752 95.0656 14.656C94.5856 14.528 94.0896 14.464 93.5776 14.464C92.7456 14.464 91.9616 14.624 91.2256 14.944C90.5216 15.232 89.8976 15.648 89.3536 16.192C88.8416 16.736 88.4256 17.376 88.1056 18.112C87.7856 18.816 87.6256 19.6 87.6256 20.464V34H81.7216ZM101.925 34V8.704H107.637L107.733 13.888L106.629 14.464C106.981 13.344 107.605 12.32 108.501 11.392C109.429 10.432 110.533 9.664 111.813 9.088C113.093 8.48 114.421 8.176 115.797 8.176C117.717 8.176 119.317 8.56 120.597 9.328C121.909 10.096 122.885 11.248 123.525 12.784C124.165 14.32 124.485 16.24 124.485 18.544V34H118.629V18.976C118.629 17.664 118.453 16.592 118.101 15.76C117.749 14.896 117.205 14.272 116.469 13.888C115.733 13.472 114.837 13.296 113.781 13.36C112.917 13.36 112.117 13.504 111.381 13.792C110.645 14.048 110.005 14.432 109.461 14.944C108.949 15.424 108.533 16 108.213 16.672C107.925 17.312 107.781 18.016 107.781 18.784V34H104.853C104.309 34 103.781 34 103.269 34C102.789 34 102.341 34 101.925 34ZM133.431 34.528C132.279 34.528 131.383 34.192 130.743 33.52C130.135 32.848 129.831 31.904 129.831 30.688C129.831 29.568 130.151 28.656 130.791 27.952C131.463 27.216 132.343 26.848 133.431 26.848C134.551 26.848 135.431 27.184 136.071 27.856C136.711 28.496 137.031 29.44 137.031 30.688C137.031 31.808 136.695 32.736 136.023 33.472C135.351 34.176 134.487 34.528 133.431 34.528Z"
                                        fill="url(#paint0_linear_58_449)"/>
                                    <defs>
                                        <linearGradient id="paint0_linear_58_449" x1="-4" y1="16" x2="140" y2="16"
                                                        gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#0052D4"/>
                                            <stop offset="0.5" stop-color="#4364F7"/>
                                            <stop offset="1" stop-color="#6FB1FC"/>
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </a>
                        </div>



                        <h1 class="mb-1" style="color: red;">Sorry, You are not authorized! 🔐</h1>
                        <p class="mb-2">
                            You have no permission to go there. Please go back & enjoy your own zone.
                        </p><a class="btn btn-primary mb-1 btn-sm-block" href="{{route('home')}}">Back to Home</a><img
                            class="img-fluid" src="{{asset('app-assets/images/pages/not-authorized.svg')}}"
                            alt="Not authorized page"/>
                    </div>
                </div>
            </div>
            <!-- / Not authorized-->
        </div>
    </div>
</div>
<!-- END: Content-->


<!-- BEGIN: Vendor JS-->
<script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('app-assets/js/core/app-menu.min.js')}}"></script>
<script src="{{asset('app-assets/js/core/app.min.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<!-- END: Page JS-->

<script>
    $(window).on('load', function () {
        if (feather) {
            feather.replace({width: 14, height: 14});
        }
    })
</script>
</body>
<!-- END: Body-->
</html>
