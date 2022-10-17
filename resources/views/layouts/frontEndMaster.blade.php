<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') | Learn-Learning Management System </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('frontend/assets/images/favicon.ico')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@300;400;500;600;700&family=Archivo:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- gulp:css -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/app.min.css')}}">
    <!-- endgulp -->

    <style>
        .buyButton {
            bottom: 47px;
            right: 79px;
            box-shadow: 0 1px 20px 1px #EA5455 !important;
            background-color: #EA5455 !important;
            color: #FFF !important;
            border-color: #EA5455 !important;
            box-sizing: border-box;
            font-size: 15px;
            border-radius: 0.358rem;
            font-weight: 500;
            display: flex;
            width: 109.297px;
            height: 38px;
            align-items: center;
            justify-content: center;
            letter-spacing: 0.14px;

        }

        select.arifSelect {
            display: block !important;
            border: 1px solid #e5e5e5;
            padding-top: 0.625rem;
            padding-bottom: 0.625rem;
            padding-left: 0.75rem;
            padding-right: 0.75rem;
            border-radius: 0.25rem;
            outline: none;

        }

        .buyButton:hover {
            box-shadow: unset !important;
        }

        .nice-select {
            display: none;
        !important;
        }

        .addToCart {
            cursor: pointer;
        }

    </style>

    @stack('styles')
</head>

<body class="bg-white font-sans relative text-gray-800">

@include('sweetalert::alert')

<div class="preloader fixed bottom-0 top-0 left-0 right-0 bg-white">
    <div class="w-16 h-16 absolute bottom-0 top-0 left-0 right-0 m-auto"><img
            src="{{asset('frontend/assets/images/preloader.gif')}}"
            alt="title"></div>
</div>

<div class="main-area ">
    <div class="mobile-site-menu lg:hidden  header-area py-3 ">
        <div class="container">
            <div class="grid grid-cols-3   items-center justify-between">
                <div class="flex-col relative">
                    <div class="right-side-bar right-side-menu relative flex gap-4 flex-shrink-0">

                        @if (Auth::user() == null)
                            <div class="discount-button text-center">
                                <a class="px-4  py-2 rounded-full border-slate-200 font-medium border inline-block bg-blue-600 hover:border-blue-200 hover:bg-black-200 text-white  !transition   !duration-500 "
                                   href="{{route('login')}}">Sign In</a>
                            </div>
                        @endif


                        @if(Auth::user())
                            <div class="author-profile userMenuButton">
                                <img class="author-profile-img cursor-pointer  w-12 h-12 rounded-full object-cover"
                                     @if(Auth::user()->image != null)
                                         src="{{getImageFile(Auth::user()->image)}}"
                                     @else
                                         src="{{asset('custom/image/user-no-image.png')}}"
                                     @endif alt="images">
                                <div class="activeMan">

                                </div>
                                <div
                                    class="author-profile-info   absolute top-20 z-10 w-screen max-w-[260px] transition duration-500  sm:px-0 opacity-0 invisible">
                                    <div
                                        class="relative grid rounded-xl shadow grid-cols-1 gap-6 bg-white white:bg-neutral-800 py-7 px-6">
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="wil-avatar relative flex-shrink-0 inline-flex items-center justify-center text-neutral-100 uppercase font-semibold shadow-inner rounded-full w-12 h-12 ring-1 ring-white dark:ring-neutral-900">
                                                <img class="absolute inset-0 w-10 h-10  object-cover rounded-full"
                                                     @if(Auth::user()->image != null)
                                                         src="{{getImageFile(Auth::user()->image)}}"
                                                     @else
                                                         src="{{asset('custom/image/user-no-image.png')}}"
                                                     @endif
                                                     alt="images">
                                            </div>
                                            <div class="flex-grow">
                                                <h4 class="font-semibold text-black-200">{{Auth::user()->name}}</h4>
                                                <p class="text-xs mt-0.5">
                                                    @if(Auth::user()->type == 1)
                                                        Admin
                                                    @endif

                                                    @if(Auth::user()->type == 2)
                                                        Instructor
                                                    @endif

                                                    @if(Auth::user()->type == 3)
                                                        Student
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                        <div class="w-full border-b border-neutral-200 dark:border-neutral-700"></div>

                                        <a href="{{route('home')}}"
                                           class="flex items-center p-2 -m-3 transition duration-150 ease-in-out rounded-lg  hover:bg-gray-200">
                                            <div
                                                class="flex items-center justify-center flex-shrink-0 text-neutral-500 dark:text-neutral-300">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M12.1601 10.87C12.0601 10.86 11.9401 10.86 11.8301 10.87C9.45006 10.79 7.56006 8.84 7.56006 6.44C7.56006 3.99 9.54006 2 12.0001 2C14.4501 2 16.4401 3.99 16.4401 6.44C16.4301 8.84 14.5401 10.79 12.1601 10.87Z"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path
                                                        d="M7.15997 14.56C4.73997 16.18 4.73997 18.82 7.15997 20.43C9.90997 22.27 14.42 22.27 17.17 20.43C19.59 18.81 19.59 16.17 17.17 14.56C14.43 12.73 9.91997 12.73 7.15997 14.56Z"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                            </div>
                                            <div class="ml-4">
                                                <p class="text-sm font-medium text-black-200">My Dashboard</p>
                                            </div>
                                        </a>
                                        <a class="flex items-center p-2 -m-3 transition duration-150 ease-in-out rounded-lg  hover:bg-gray-200  gray:hover:bg-neutral-700 focus:outline-none focus-visible:ring focus-visible:ring-orange-500 focus-visible:ring-opacity-50"
                                           href=" ">
                                            <div
                                                class="flex items-center justify-center flex-shrink-0 text-neutral-500 dark:text-neutral-300">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M8 12.2H15" stroke="currentColor" stroke-width="1.5"
                                                          stroke-miterlimit="10" stroke-linecap="round"
                                                          stroke-linejoin="round">
                                                    </path>
                                                    <path d="M8 16.2H12.38" stroke="currentColor" stroke-width="1.5"
                                                          stroke-miterlimit="10" stroke-linecap="round"
                                                          stroke-linejoin="round">
                                                    </path>
                                                    <path
                                                        d="M10 6H14C16 6 16 5 16 4C16 2 15 2 14 2H10C9 2 8 2 8 4C8 6 9 6 10 6Z"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path
                                                        d="M16 4.02002C19.33 4.20002 21 5.43002 21 10V16C21 20 20 22 15 22H9C4 22 3 20 3 16V10C3 5.44002 4.67 4.20002 8 4.02002"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </div>
                                            <div class="ml-4">
                                                <p class="text-sm font-medium text-black-200">My Order</p>
                                            </div>
                                        </a>
                                        <a class="flex items-center p-2 -m-3 transition duration-150 ease-in-out rounded-lg  hover:bg-gray-200  gray:hover:bg-neutral-700 focus:outline-none focus-visible:ring focus-visible:ring-orange-500 focus-visible:ring-opacity-50"
                                           href="checkout.html">
                                            <div
                                                class="flex items-center justify-center flex-shrink-0 text-neutral-500 dark:text-neutral-300">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                            </div>
                                            <div class="ml-4">
                                                <p class="text-sm font-medium text-black-200">Wishlist</p>
                                            </div>
                                        </a>
                                        <div
                                            class="w-full border-b border-neutral-200 dark:border-neutral-700"></div>
                                        <a class="flex items-center p-2 -m-3 transition duration-150 ease-in-out rounded-lg  hover:bg-gray-200  gray:hover:bg-neutral-700 focus:outline-none focus-visible:ring focus-visible:ring-orange-500 focus-visible:ring-opacity-50"
                                           href="/ciseco/">
                                            <div
                                                class="flex items-center justify-center flex-shrink-0 text-neutral-500 dark:text-neutral-300">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.97 22C17.4928 22 21.97 17.5228 21.97 12C21.97 6.47715 17.4928 2 11.97 2C6.44715 2 1.97 6.47715 1.97 12C1.97 17.5228 6.44715 22 11.97 22Z"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path
                                                        d="M12 16.5C14.4853 16.5 16.5 14.4853 16.5 12C16.5 9.51472 14.4853 7.5 12 7.5C9.51472 7.5 7.5 9.51472 7.5 12C7.5 14.4853 9.51472 16.5 12 16.5Z"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M4.89999 4.92993L8.43999 8.45993" stroke="currentColor"
                                                          stroke-width="1.5" stroke-linecap="round"
                                                          stroke-linejoin="round"></path>
                                                    <path d="M4.89999 19.07L8.43999 15.54" stroke="currentColor"
                                                          stroke-width="1.5"
                                                          stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M19.05 19.07L15.51 15.54" stroke="currentColor"
                                                          stroke-width="1.5"
                                                          stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M19.05 4.92993L15.51 8.45993" stroke="currentColor"
                                                          stroke-width="1.5"
                                                          stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </div>
                                            <div class="ml-4">
                                                <p class="text-sm font-medium text-black-200">Help</p>
                                            </div>
                                        </a>
                                        <a class="flex items-center p-2 -m-3 transition duration-150 ease-in-out rounded-lg  hover:bg-gray-200  gray:hover:bg-neutral-700 focus:outline-none focus-visible:ring focus-visible:ring-orange-500 focus-visible:ring-opacity-50"
                                           href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <div
                                                class="flex items-center justify-center flex-shrink-0 text-neutral-500 dark:text-neutral-300">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M8.90002 7.55999C9.21002 3.95999 11.06 2.48999 15.11 2.48999H15.24C19.71 2.48999 21.5 4.27999 21.5 8.74999V15.27C21.5 19.74 19.71 21.53 15.24 21.53H15.11C11.09 21.53 9.24002 20.08 8.91002 16.54"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M15 12H3.62" stroke="currentColor" stroke-width="1.5"
                                                          stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M5.85 8.6499L2.5 11.9999L5.85 15.3499"
                                                          stroke="currentColor"
                                                          stroke-width="1.5" stroke-linecap="round"
                                                          stroke-linejoin="round"></path>
                                                </svg>
                                            </div>
                                            <div class="ml-4">
                                                <p class="text-sm font-medium text-black-200">Log out</p>
                                            </div>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{--Mobile Cart Starts herer--}}
                        <div class="cart-box">
                            <a class="w-12 h-12  hover:bg-gray-200 transition duration-500  rounded-full inline-flex items-center justify-center   relative"
                               href="{{ route('main.cart') }}">
                                <div
                                    class="w-4 h-4 flex items-center justify-center bg-blue-600 absolute top-1.5 right-1.5 rounded-full text-[11px] leading-none text-white font-medium">
                                    <span class="mt-[1px]" id="quantity">
                                        @if(Auth::user() != null)
                                            {{ $quantity = \App\Models\CartManagement::where('user_id', Auth::user()->id)->count() }}
                                        @else
                                            {{ $quantity = 0 }}
                                        @endif
                                    </span>
                                </div>
                                <span>
                              <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path
                                     d="M2 2H3.74001C4.82001 2 5.67 2.93 5.58 4L4.75 13.96C4.61 15.59 5.89999 16.99 7.53999 16.99H18.19C19.63 16.99 20.89 15.81 21 14.38L21.54 6.88C21.66 5.22 20.4 3.87 18.73 3.87H5.82001"
                                     stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                     stroke-linecap="round" stroke-linejoin="round"></path>
                                 <path
                                     d="M16.25 22C16.9404 22 17.5 21.4404 17.5 20.75C17.5 20.0596 16.9404 19.5 16.25 19.5C15.5596 19.5 15 20.0596 15 20.75C15 21.4404 15.5596 22 16.25 22Z"
                                     stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                     stroke-linecap="round" stroke-linejoin="round"></path>
                                 <path
                                     d="M8.25 22C8.94036 22 9.5 21.4404 9.5 20.75C9.5 20.0596 8.94036 19.5 8.25 19.5C7.55964 19.5 7 20.0596 7 20.75C7 21.4404 7.55964 22 8.25 22Z"
                                     stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                     stroke-linecap="round" stroke-linejoin="round"></path>
                                 <path d="M9 8H21" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                       stroke-linecap="round" stroke-linejoin="round"></path>
                              </svg>
                           </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="flex-col">
                    <div class="header-logo">
                        <a href="{{route('main.index')}}">
                            <svg class="h-8" width="211" height="48" viewBox="0 0 211 48" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M49.2687 7.90854L25.6083 0.0730428C25.3038 -0.0243476 24.9763 -0.0243476 24.6718 0.0730428L1.03606 7.90854H0.986772L0.814249 8.00648H0.789603L0.617079 8.10443C0.617079 8.11092 0.614483 8.11715 0.609861 8.12174C0.605238 8.12634 0.59897 8.12891 0.592433 8.12891L0.41991 8.27583L0.296679 8.42275C0.296679 8.42924 0.294082 8.43547 0.28946 8.44006C0.284838 8.44465 0.278569 8.44723 0.272033 8.44723L0.173448 8.61863C0.173448 8.64312 0.148801 8.64312 0.148801 8.66761L0.0748626 8.83901C0.0441957 8.89993 0.0273689 8.9668 0.0255705 9.03489C0.00537419 9.10654 -0.00295014 9.18097 0.000924186 9.25527V28.844C0.000924186 29.2337 0.156723 29.6073 0.434046 29.8829C0.71137 30.1584 1.0875 30.3132 1.4797 30.3132C1.87189 30.3132 2.24802 30.1584 2.52535 29.8829C2.80267 29.6073 2.95847 29.2337 2.95847 28.844V11.3366L12.4965 14.4953C10.7706 17.0054 9.85112 19.9764 9.85941 23.0164C9.86118 25.7604 10.6115 28.4527 12.0307 30.8068C13.4498 33.1609 15.4846 35.0889 17.9187 36.3857C12.9025 38.0264 8.59911 41.3171 5.71884 45.7148C5.61204 45.8772 5.53847 46.0589 5.50234 46.2495C5.46621 46.4402 5.46823 46.636 5.50828 46.8259C5.54833 47.0157 5.62563 47.1959 5.73576 47.356C5.84589 47.5162 5.9867 47.6533 6.15015 47.7594C6.3136 47.8655 6.49648 47.9386 6.68836 47.9745C6.88024 48.0104 7.07736 48.0084 7.26846 47.9686C7.45956 47.9288 7.6409 47.852 7.80212 47.7426C7.96335 47.6332 8.1013 47.4933 8.20811 47.3309C10.0401 44.5264 12.5488 42.2215 15.5059 40.6258C18.4631 39.0301 21.7749 38.1942 25.1401 38.1942C28.5052 38.1942 31.817 39.0301 34.7742 40.6258C37.7313 42.2215 40.24 44.5264 42.072 47.3309C42.2133 47.5326 42.4012 47.6978 42.6198 47.8128C42.8384 47.9278 43.0816 47.9893 43.329 47.992C43.6111 47.9939 43.8868 47.9083 44.1176 47.7472C44.2812 47.6428 44.4225 47.5074 44.5333 47.3487C44.6442 47.19 44.7224 47.0112 44.7637 46.8224C44.8049 46.6336 44.8082 46.4386 44.7735 46.2486C44.7387 46.0585 44.6666 45.8772 44.5613 45.7148C41.681 41.3171 37.3776 38.0264 32.3614 36.3857C34.7955 35.0889 36.8303 33.1609 38.2495 30.8068C39.6686 28.4527 40.4189 25.7604 40.4207 23.0164C40.429 19.9764 39.5095 17.0054 37.7836 14.4953L49.2687 10.6999C49.5645 10.6033 49.8221 10.4164 50.0048 10.1658C50.1874 9.91514 50.2857 9.61364 50.2857 9.30424C50.2857 8.99484 50.1874 8.69333 50.0048 8.44271C49.8221 8.19209 49.5645 8.00515 49.2687 7.90854ZM37.4632 23.0164C37.4625 24.9663 36.9931 26.8879 36.0939 28.6212C35.1947 30.3545 33.8918 31.8494 32.2936 32.9813C30.6955 34.1133 28.8482 34.8496 26.9058 35.129C24.9633 35.4084 22.9817 35.2228 21.126 34.5877C19.2704 33.9525 17.5942 32.8861 16.2372 31.4774C14.8801 30.0686 13.8814 28.3582 13.3241 26.4885C12.7668 24.6187 12.6671 22.6438 13.0333 20.7281C13.3995 18.8124 14.221 17.0113 15.4294 15.4747L24.6718 18.5354C24.9763 18.6328 25.3038 18.6328 25.6083 18.5354L34.8507 15.4747C36.5377 17.632 37.4565 20.2845 37.4632 23.0164ZM25.1401 15.5971L6.16248 9.30424L25.1401 3.01135L44.1176 9.30424L25.1401 15.5971Z"
                                    fill="#223655"></path>
                                <path d="M75.6538 42V8.4H82.8538V35.52H98.0698V42H75.6538Z" fill="#035AE0"></path>
                                <path
                                    d="M115.275 42.48C112.747 42.48 110.507 41.936 108.555 40.848C106.603 39.728 105.067 38.192 103.947 36.24C102.859 34.288 102.315 32.064 102.315 29.568C102.315 27.616 102.619 25.84 103.227 24.24C103.867 22.608 104.731 21.216 105.819 20.064C106.939 18.88 108.267 17.968 109.803 17.328C111.339 16.688 113.019 16.368 114.843 16.368C116.443 16.368 117.931 16.656 119.307 17.232C120.715 17.808 121.931 18.64 122.955 19.728C123.979 20.784 124.763 22.048 125.307 23.52C125.851 24.96 126.091 26.56 126.027 28.32L125.979 30.144H104.955L104.187 27.168H122.955L122.283 27.984L122.331 26.784C122.267 25.408 121.883 24.192 121.179 23.136C120.475 22.08 119.563 21.248 118.443 20.64C117.355 20.032 116.155 19.728 114.843 19.728C112.987 19.728 111.387 20.128 110.043 20.928C108.699 21.696 107.675 22.8 106.971 24.24C106.299 25.648 105.947 27.344 105.915 29.328C105.947 31.312 106.363 33.04 107.163 34.512C107.963 35.952 109.083 37.088 110.523 37.92C111.995 38.72 113.691 39.12 115.611 39.12C116.987 39.12 118.267 38.896 119.451 38.448C120.635 37.968 121.835 37.184 123.051 36.096L124.875 38.688C124.107 39.456 123.195 40.128 122.139 40.704C121.115 41.248 120.011 41.68 118.827 42C117.643 42.32 116.459 42.48 115.275 42.48ZM147.208 42V25.2C147.208 23.568 146.632 22.256 145.48 21.264C144.328 20.272 142.808 19.776 140.92 19.776C139.352 19.776 137.928 20.096 136.648 20.736C135.368 21.376 134.232 22.336 133.24 23.616L130.84 21.216C132.28 19.584 133.848 18.368 135.544 17.568C137.272 16.768 139.144 16.368 141.16 16.368C143.08 16.368 144.744 16.688 146.152 17.328C147.56 17.968 148.632 18.896 149.368 20.112C150.136 21.328 150.52 22.8 150.52 24.528V42H147.208ZM138.568 42.48C136.936 42.48 135.48 42.16 134.2 41.52C132.92 40.88 131.896 40 131.128 38.88C130.392 37.728 130.024 36.384 130.024 34.848C130.024 33.6 130.248 32.496 130.696 31.536C131.176 30.576 131.864 29.776 132.76 29.136C133.656 28.496 134.792 28.016 136.168 27.696C137.544 27.344 139.112 27.168 140.872 27.168H148.84L148.552 30.192H140.392C139.272 30.192 138.28 30.288 137.416 30.48C136.584 30.672 135.864 30.976 135.256 31.392C134.68 31.776 134.232 32.256 133.912 32.832C133.624 33.376 133.48 34.032 133.48 34.8C133.48 35.696 133.704 36.496 134.152 37.2C134.632 37.872 135.256 38.4 136.024 38.784C136.824 39.136 137.72 39.312 138.712 39.312C140.024 39.312 141.256 39.088 142.408 38.64C143.56 38.16 144.584 37.52 145.48 36.72C146.408 35.888 147.144 34.96 147.688 33.936L148.696 36.24C147.992 37.456 147.112 38.544 146.056 39.504C145 40.432 143.832 41.168 142.552 41.712C141.304 42.224 139.976 42.48 138.568 42.48ZM156.959 42V16.8H160.607L160.655 24.096L160.223 22.848C160.543 21.696 161.087 20.624 161.855 19.632C162.655 18.64 163.615 17.856 164.735 17.28C165.855 16.672 167.087 16.368 168.431 16.368C168.975 16.368 169.487 16.416 169.967 16.512C170.447 16.576 170.847 16.672 171.167 16.8L170.207 20.784C169.759 20.624 169.295 20.496 168.815 20.4C168.367 20.272 167.935 20.208 167.519 20.208C166.527 20.208 165.599 20.416 164.735 20.832C163.903 21.216 163.183 21.744 162.575 22.416C161.967 23.088 161.487 23.856 161.135 24.72C160.815 25.552 160.655 26.416 160.655 27.312V42H156.959ZM174.819 42V16.8H178.467V22.176L177.747 22.608C178.099 21.488 178.739 20.464 179.667 19.536C180.595 18.608 181.715 17.856 183.027 17.28C184.339 16.672 185.699 16.368 187.107 16.368C188.995 16.368 190.579 16.736 191.859 17.472C193.171 18.176 194.163 19.28 194.835 20.784C195.507 22.288 195.843 24.192 195.843 26.496V42H192.195V26.736C192.195 25.104 191.955 23.76 191.475 22.704C191.027 21.648 190.339 20.88 189.411 20.4C188.515 19.92 187.379 19.696 186.003 19.728C184.915 19.728 183.907 19.904 182.979 20.256C182.083 20.608 181.299 21.088 180.627 21.696C179.955 22.272 179.427 22.928 179.043 23.664C178.659 24.368 178.467 25.072 178.467 25.776V42H176.691C176.403 42 176.099 42 175.779 42C175.459 42 175.139 42 174.819 42ZM204.586 42.432C203.722 42.432 203.05 42.192 202.57 41.712C202.122 41.2 201.898 40.48 201.898 39.552C201.898 38.688 202.138 38 202.618 37.488C203.13 36.944 203.786 36.672 204.586 36.672C205.45 36.672 206.106 36.928 206.554 37.44C207.034 37.92 207.274 38.624 207.274 39.552C207.274 40.384 207.018 41.072 206.506 41.616C206.026 42.16 205.386 42.432 204.586 42.432Z"
                                    fill="#757F8F"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="flex-col relative">
                    <div id="sidebar-btn" class="inline-block w-8  absolute cursor-pointer">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div id="sidebar"
                         class="overflow-y-scroll bg-white  w-full max-w-md h-full block fixed  z-10  -right-50 top-0 transition duration-500 ">
                        <ul class="toggle-menu-class mx-10 dropdown-menu bg-white lg:bg-transparent absolute justify-center lg:relative inset-x-0 hidden lg:flex lg:flex-grow items-center mt-10 lg:mt-0 mobile-hover"
                            style="display: block;">
                            <li class="relative lg:px-2 lg:py-5 dropdown ">
                                <a class=" lg:hover:bg-gray-200 text-black-200 group py-2 px-4 rounded-full flex items-center text-coolGray-600 font-medium transition duration-500 hover:text-blue-600 arrow"
                                   href="#"> Home <span
                                        class="leading-6 text-2xl text-center  bg-gray-200   w-6 h-6 absolute right-2 top-3 block lg:hidden toggle">+</span></a>
                                <ul
                                    class="hidden lg:block bg-white rounded-md lg:absolute top-full lg:shadow lg:w-48   submenu">
                                    <li>
                                        <a class="py-2 lg:py-2 px-5 hover:bg-gray-200 border-coolGray-300 mx-2 mt-2 rounded-md flex items-center whitespace-nowrap text-black-200 font-normal transition duration-500 hover:text-blue-600"
                                           href="{{route('main.index')}}"> Home 1</a></li>
                                    <li>
                                        <a class="py-2 lg:py-2 px-5 hover:bg-gray-200 border-coolGray-300 mx-2 mb-2 rounded-md flex items-center whitespace-nowrap text-black-200 font-normal transition duration-500 hover:text-blue-600"
                                           href="{{route('main.index2')}}"> Home 2</a></li>
                                </ul>
                            </li>
                            <li class="relative lg:px-2 lg:py-5 dropdown ">
                                <a class=" lg:hover:bg-gray-200 text-black-200 group py-2 px-4 rounded-full flex items-center text-coolGray-600 font-medium transition duration-500 hover:text-blue-600 arrow"
                                   href="#"> Courses <span
                                        class="leading-6 text-2xl text-center  bg-gray-200   w-6 h-6 absolute right-2 top-3 block lg:hidden toggle">+</span></a>
                                <ul
                                    class="hidden lg:block bg-white rounded-md lg:absolute top-full lg:shadow lg:w-52   submenu">

                                    <li>
                                        <a class="py-2 lg:py-2 px-5 hover:bg-gray-200 border-coolGray-300 mx-2 mb-2 rounded-md flex items-center whitespace-nowrap text-black-200 font-normal transition duration-500 hover:text-blue-600"
                                           href="{{route('main.allCourses1')}}"> All Courses 1</a>
                                    <li>

                                    <li>
                                        <a class="py-2 lg:py-2 px-5 hover:bg-gray-200 border-coolGray-300 mx-2 mb-2 rounded-md flex items-center whitespace-nowrap text-black-200 font-normal transition duration-500 hover:text-blue-600"
                                           href="{{route('main.allCourses2')}}"> All Courses 2</a>
                                    <li>


                                    <li>
                                        <a class="py-2 lg:py-2 px-5 hover:bg-gray-200 border-coolGray-300 mx-2 mb-2 rounded-md flex items-center whitespace-nowrap text-black-200 font-normal transition duration-500 hover:text-blue-600"
                                           href="{{route('main.allCategories1')}}">All Catagories 1 </a></li>
                                    <li>
                                        <a class="py-2 lg:py-2 px-5 hover:bg-gray-200 border-coolGray-300 mx-2 mb-2 rounded-md flex items-center whitespace-nowrap text-black-200 font-normal transition duration-500 hover:text-blue-600"
                                           href="{{route('main.allCategories2')}}">All Catagories 2 </a></li>
                                    <li>
                                        <a class="py-2 lg:py-2 px-5 hover:bg-gray-200 border-coolGray-300 mx-2 mb-2 rounded-md flex items-center whitespace-nowrap text-black-200 font-normal transition duration-500 hover:text-blue-600"
                                           href="{{route('main.courseDetails')}}"> Course </a></li>
                                </ul>
                            </li>
                            <li class="relative lg:px-2 lg:py-5 dropdown ">
                                <a class=" lg:hover:bg-gray-200 text-black-200 group py-2 px-4 rounded-full flex items-center text-coolGray-600 font-medium transition duration-500 hover:text-blue-600 arrow"
                                   href="#"> Blog <span
                                        class="leading-6 text-2xl text-center  bg-gray-200   w-6 h-6 absolute right-2 top-3 block lg:hidden toggle">+</span></a>
                                <ul
                                    class="hidden lg:block bg-white rounded-md lg:absolute top-full lg:shadow lg:w-48   submenu">
                                    <li>
                                        <a class="py-2 lg:py-2 px-5 hover:bg-gray-200 border-coolGray-300 mx-2 mt-2 rounded-md flex items-center whitespace-nowrap text-black-200 font-normal transition duration-500 hover:text-blue-600"
                                           href="{{route('main.blog.index')}}"> Blog </a></li>
                                    <li>
                                        <a class="py-2 lg:py-2 px-5 hover:bg-gray-200 border-coolGray-300 mx-2 mb-2 rounded-md flex items-center whitespace-nowrap text-black-200 font-normal transition duration-500 hover:text-blue-600"
                                           href="{{route('main.blog.details')}}"> Blog Details </a></li>
                                </ul>
                            </li>
                            <li class="relative lg:px-2 lg:py-5 dropdown ">
                                <a class=" lg:hover:bg-gray-200 text-black-200 group py-2 px-4 rounded-full flex items-center text-coolGray-600 font-medium transition duration-500 hover:text-blue-600 arrow"
                                   href="#"> Pages <span
                                        class="leading-6 text-2xl text-center  bg-gray-200   w-6 h-6 absolute right-2 top-3 block lg:hidden toggle">+</span></a>
                                <ul
                                    class="hidden lg:block bg-white rounded-md lg:absolute top-full lg:shadow lg:w-48   submenu">
                                    <li>
                                        <a class="py-2 lg:py-2 px-5 hover:bg-gray-200 border-coolGray-300 mx-2 mt-2 rounded-md flex items-center whitespace-nowrap text-black-200 font-normal transition duration-500 hover:text-blue-600"
                                           href="{{route('main.about1')}}"> About </a></li>
                                    <li>
                                        <a class="py-2 lg:py-2 px-5 hover:bg-gray-200 border-coolGray-300 mx-2 mb-2 rounded-md flex items-center whitespace-nowrap text-black-200 font-normal transition duration-500 hover:text-blue-600"
                                           href="{{route('main.about2')}}"> About 2 </a></li>

                                </ul>
                            </li>
                            <li class="relative lg:px-2 lg:py-5 dropdown ">
                                <a class=" lg:hover:bg-gray-200 text-black-200 group py-2 px-4 rounded-full flex items-center text-coolGray-600 font-medium transition duration-500 hover:text-blue-600 arrow"
                                   href="{{route('main.contact')}}"> Contact </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header class="header-area relative z-50  py-4 hidden lg:block  lg:py-0">
        <div class="container">
            <div class="header-area-inner relative px-4 z-20">
                <nav class="header-nav flex items-center justify-between gap-6 relative">
                    <div class="header-logo">
                        <a href="{{route('main.index')}}" class="flex items-center flex-shrink-0 mr-6 md:mr-0">
                        <span>
                           <svg width="211" height="48" viewBox="0 0 211 48" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                              <path
                                  d="M49.2687 7.90854L25.6083 0.0730428C25.3038 -0.0243476 24.9763 -0.0243476 24.6718 0.0730428L1.03606 7.90854H0.986772L0.814249 8.00648H0.789603L0.617079 8.10443C0.617079 8.11092 0.614483 8.11715 0.609861 8.12174C0.605238 8.12634 0.59897 8.12891 0.592433 8.12891L0.41991 8.27583L0.296679 8.42275C0.296679 8.42924 0.294082 8.43547 0.28946 8.44006C0.284838 8.44465 0.278569 8.44723 0.272033 8.44723L0.173448 8.61863C0.173448 8.64312 0.148801 8.64312 0.148801 8.66761L0.0748626 8.83901C0.0441957 8.89993 0.0273689 8.9668 0.0255705 9.03489C0.00537419 9.10654 -0.00295014 9.18097 0.000924186 9.25527V28.844C0.000924186 29.2337 0.156723 29.6073 0.434046 29.8829C0.71137 30.1584 1.0875 30.3132 1.4797 30.3132C1.87189 30.3132 2.24802 30.1584 2.52535 29.8829C2.80267 29.6073 2.95847 29.2337 2.95847 28.844V11.3366L12.4965 14.4953C10.7706 17.0054 9.85112 19.9764 9.85941 23.0164C9.86118 25.7604 10.6115 28.4527 12.0307 30.8068C13.4498 33.1609 15.4846 35.0889 17.9187 36.3857C12.9025 38.0264 8.59911 41.3171 5.71884 45.7148C5.61204 45.8772 5.53847 46.0589 5.50234 46.2495C5.46621 46.4402 5.46823 46.636 5.50828 46.8259C5.54833 47.0157 5.62563 47.1959 5.73576 47.356C5.84589 47.5162 5.9867 47.6533 6.15015 47.7594C6.3136 47.8655 6.49648 47.9386 6.68836 47.9745C6.88024 48.0104 7.07736 48.0084 7.26846 47.9686C7.45956 47.9288 7.6409 47.852 7.80212 47.7426C7.96335 47.6332 8.1013 47.4933 8.20811 47.3309C10.0401 44.5264 12.5488 42.2215 15.5059 40.6258C18.4631 39.0301 21.7749 38.1942 25.1401 38.1942C28.5052 38.1942 31.817 39.0301 34.7742 40.6258C37.7313 42.2215 40.24 44.5264 42.072 47.3309C42.2133 47.5326 42.4012 47.6978 42.6198 47.8128C42.8384 47.9278 43.0816 47.9893 43.329 47.992C43.6111 47.9939 43.8868 47.9083 44.1176 47.7472C44.2812 47.6428 44.4225 47.5074 44.5333 47.3487C44.6442 47.19 44.7224 47.0112 44.7637 46.8224C44.8049 46.6336 44.8082 46.4386 44.7735 46.2486C44.7387 46.0585 44.6666 45.8772 44.5613 45.7148C41.681 41.3171 37.3776 38.0264 32.3614 36.3857C34.7955 35.0889 36.8303 33.1609 38.2495 30.8068C39.6686 28.4527 40.4189 25.7604 40.4207 23.0164C40.429 19.9764 39.5095 17.0054 37.7836 14.4953L49.2687 10.6999C49.5645 10.6033 49.8221 10.4164 50.0048 10.1658C50.1874 9.91514 50.2857 9.61364 50.2857 9.30424C50.2857 8.99484 50.1874 8.69333 50.0048 8.44271C49.8221 8.19209 49.5645 8.00515 49.2687 7.90854ZM37.4632 23.0164C37.4625 24.9663 36.9931 26.8879 36.0939 28.6212C35.1947 30.3545 33.8918 31.8494 32.2936 32.9813C30.6955 34.1133 28.8482 34.8496 26.9058 35.129C24.9633 35.4084 22.9817 35.2228 21.126 34.5877C19.2704 33.9525 17.5942 32.8861 16.2372 31.4774C14.8801 30.0686 13.8814 28.3582 13.3241 26.4885C12.7668 24.6187 12.6671 22.6438 13.0333 20.7281C13.3995 18.8124 14.221 17.0113 15.4294 15.4747L24.6718 18.5354C24.9763 18.6328 25.3038 18.6328 25.6083 18.5354L34.8507 15.4747C36.5377 17.632 37.4565 20.2845 37.4632 23.0164ZM25.1401 15.5971L6.16248 9.30424L25.1401 3.01135L44.1176 9.30424L25.1401 15.5971Z"
                                  fill="#223655"/>
                              <path d="M75.6538 42V8.4H82.8538V35.52H98.0698V42H75.6538Z" fill="#035AE0"/>
                              <path
                                  d="M115.275 42.48C112.747 42.48 110.507 41.936 108.555 40.848C106.603 39.728 105.067 38.192 103.947 36.24C102.859 34.288 102.315 32.064 102.315 29.568C102.315 27.616 102.619 25.84 103.227 24.24C103.867 22.608 104.731 21.216 105.819 20.064C106.939 18.88 108.267 17.968 109.803 17.328C111.339 16.688 113.019 16.368 114.843 16.368C116.443 16.368 117.931 16.656 119.307 17.232C120.715 17.808 121.931 18.64 122.955 19.728C123.979 20.784 124.763 22.048 125.307 23.52C125.851 24.96 126.091 26.56 126.027 28.32L125.979 30.144H104.955L104.187 27.168H122.955L122.283 27.984L122.331 26.784C122.267 25.408 121.883 24.192 121.179 23.136C120.475 22.08 119.563 21.248 118.443 20.64C117.355 20.032 116.155 19.728 114.843 19.728C112.987 19.728 111.387 20.128 110.043 20.928C108.699 21.696 107.675 22.8 106.971 24.24C106.299 25.648 105.947 27.344 105.915 29.328C105.947 31.312 106.363 33.04 107.163 34.512C107.963 35.952 109.083 37.088 110.523 37.92C111.995 38.72 113.691 39.12 115.611 39.12C116.987 39.12 118.267 38.896 119.451 38.448C120.635 37.968 121.835 37.184 123.051 36.096L124.875 38.688C124.107 39.456 123.195 40.128 122.139 40.704C121.115 41.248 120.011 41.68 118.827 42C117.643 42.32 116.459 42.48 115.275 42.48ZM147.208 42V25.2C147.208 23.568 146.632 22.256 145.48 21.264C144.328 20.272 142.808 19.776 140.92 19.776C139.352 19.776 137.928 20.096 136.648 20.736C135.368 21.376 134.232 22.336 133.24 23.616L130.84 21.216C132.28 19.584 133.848 18.368 135.544 17.568C137.272 16.768 139.144 16.368 141.16 16.368C143.08 16.368 144.744 16.688 146.152 17.328C147.56 17.968 148.632 18.896 149.368 20.112C150.136 21.328 150.52 22.8 150.52 24.528V42H147.208ZM138.568 42.48C136.936 42.48 135.48 42.16 134.2 41.52C132.92 40.88 131.896 40 131.128 38.88C130.392 37.728 130.024 36.384 130.024 34.848C130.024 33.6 130.248 32.496 130.696 31.536C131.176 30.576 131.864 29.776 132.76 29.136C133.656 28.496 134.792 28.016 136.168 27.696C137.544 27.344 139.112 27.168 140.872 27.168H148.84L148.552 30.192H140.392C139.272 30.192 138.28 30.288 137.416 30.48C136.584 30.672 135.864 30.976 135.256 31.392C134.68 31.776 134.232 32.256 133.912 32.832C133.624 33.376 133.48 34.032 133.48 34.8C133.48 35.696 133.704 36.496 134.152 37.2C134.632 37.872 135.256 38.4 136.024 38.784C136.824 39.136 137.72 39.312 138.712 39.312C140.024 39.312 141.256 39.088 142.408 38.64C143.56 38.16 144.584 37.52 145.48 36.72C146.408 35.888 147.144 34.96 147.688 33.936L148.696 36.24C147.992 37.456 147.112 38.544 146.056 39.504C145 40.432 143.832 41.168 142.552 41.712C141.304 42.224 139.976 42.48 138.568 42.48ZM156.959 42V16.8H160.607L160.655 24.096L160.223 22.848C160.543 21.696 161.087 20.624 161.855 19.632C162.655 18.64 163.615 17.856 164.735 17.28C165.855 16.672 167.087 16.368 168.431 16.368C168.975 16.368 169.487 16.416 169.967 16.512C170.447 16.576 170.847 16.672 171.167 16.8L170.207 20.784C169.759 20.624 169.295 20.496 168.815 20.4C168.367 20.272 167.935 20.208 167.519 20.208C166.527 20.208 165.599 20.416 164.735 20.832C163.903 21.216 163.183 21.744 162.575 22.416C161.967 23.088 161.487 23.856 161.135 24.72C160.815 25.552 160.655 26.416 160.655 27.312V42H156.959ZM174.819 42V16.8H178.467V22.176L177.747 22.608C178.099 21.488 178.739 20.464 179.667 19.536C180.595 18.608 181.715 17.856 183.027 17.28C184.339 16.672 185.699 16.368 187.107 16.368C188.995 16.368 190.579 16.736 191.859 17.472C193.171 18.176 194.163 19.28 194.835 20.784C195.507 22.288 195.843 24.192 195.843 26.496V42H192.195V26.736C192.195 25.104 191.955 23.76 191.475 22.704C191.027 21.648 190.339 20.88 189.411 20.4C188.515 19.92 187.379 19.696 186.003 19.728C184.915 19.728 183.907 19.904 182.979 20.256C182.083 20.608 181.299 21.088 180.627 21.696C179.955 22.272 179.427 22.928 179.043 23.664C178.659 24.368 178.467 25.072 178.467 25.776V42H176.691C176.403 42 176.099 42 175.779 42C175.459 42 175.139 42 174.819 42ZM204.586 42.432C203.722 42.432 203.05 42.192 202.57 41.712C202.122 41.2 201.898 40.48 201.898 39.552C201.898 38.688 202.138 38 202.618 37.488C203.13 36.944 203.786 36.672 204.586 36.672C205.45 36.672 206.106 36.928 206.554 37.44C207.034 37.92 207.274 38.624 207.274 39.552C207.274 40.384 207.018 41.072 206.506 41.616C206.026 42.16 205.386 42.432 204.586 42.432Z"
                                  fill="#757F8F"/>
                           </svg>
                        </span>
                        </a>
                    </div>


                    <div class="menu-box flex-grow lg:flex lg:items-center lg:w-auto">
                        <div class="header-left-menu flex-grow relative">
                            <ul
                                class="toggle-menu-class  dropdown-menu bg-white lg:bg-transparent shadow lg:shadow-none absolute justify-center lg:relative inset-x-0 hidden lg:flex lg:flex-grow items-center mt-10 lg:mt-0 mobile-hover">
                                <li class="relative lg:px-2 lg:py-5 dropdown ">
                                    <a class=" lg:hover:bg-gray-200 text-black-200 group py-2 px-4 rounded-full flex items-center text-coolGray-600 font-medium transition duration-500 hover:text-blue-600 arrow"
                                       href="#">
                                        Home
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                             aria-hidden="true" class="ml-1 -mr-1 h-4 w-4 text-slate-400">
                                            <path class="group-hover:fill-blue-600" fill-rule="evenodd"
                                                  d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                        <span
                                            class="leading-6 text-2xl text-center  bg-gray-200   w-6 h-6 absolute right-2 top-3 block lg:hidden toggle">+</span>
                                    </a>
                                    <ul
                                        class="hidden lg:block bg-white rounded-md lg:absolute top-full lg:shadow   submenu">
                                        <li>
                                            <a class="py-2 lg:py-2 px-5 hover:bg-gray-200 border-coolGray-300 mx-2 mt-2 rounded-md flex items-center whitespace-nowrap text-black-200 font-normal transition duration-500 hover:text-blue-600"
                                               href="{{route('main.index')}}"> Home 1</a></li>
                                        <li>
                                            <a class="py-2 lg:py-2 px-5 hover:bg-gray-200 border-coolGray-300 mx-2   rounded-md flex items-center whitespace-nowrap text-black-200 font-normal transition duration-500 hover:text-blue-600"
                                               href="{{route('main.index2')}}"> Home 2</a></li>
                                    </ul>
                                </li>
                                <li class="relative lg:px-2 lg:py-5 dropdown ">
                                    <a class=" lg:hover:bg-gray-200 text-black-200 group py-2 px-4 rounded-full flex items-center text-coolGray-600 font-medium transition duration-500 hover:text-blue-600 arrow"
                                       href="#">
                                        Courses
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                             aria-hidden="true" class="ml-1 -mr-1 h-4 w-4 text-slate-400">
                                            <path class="group-hover:fill-blue-600" fill-rule="evenodd"
                                                  d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                        <span
                                            class="leading-6 text-2xl text-center  bg-gray-200   w-6 h-6 absolute right-2 top-3 block lg:hidden toggle">+</span>
                                    </a>
                                    <ul class="hidden lg:block bg-white  rounded-md lg:absolute top-full lg:shadow   submenu">


                                        <li>
                                            <a class="py-2 lg:py-2 px-5 hover:bg-gray-200 border-coolGray-300 mx-2 mt-2  rounded-md flex items-center whitespace-nowrap text-black-200 font-normal transition duration-500 hover:text-blue-600"
                                               href="{{route('main.allCourses1')}}"> All Courses 1</a>
                                        <li>

                                        <li>
                                            <a class="py-2 lg:py-2 px-5 hover:bg-gray-200 border-coolGray-300 mx-2 mb-2 rounded-md flex items-center whitespace-nowrap text-black-200 font-normal transition duration-500 hover:text-blue-600"
                                               href="{{route('main.allCourses2')}}"> All Courses 2</a>
                                        <li>


                                        <li>
                                            <a class="py-2 lg:py-2 px-5 hover:bg-gray-200 border-coolGray-300 mx-2 mb-2 rounded-md flex items-center whitespace-nowrap text-black-200 font-normal transition duration-500 hover:text-blue-600"
                                               href="{{route('main.allCategories1')}}">All Catagories 1 </a></li>
                                        <li>
                                            <a class="py-2 lg:py-2 px-5 hover:bg-gray-200 border-coolGray-300 mx-2 mb-2 rounded-md flex items-center whitespace-nowrap text-black-200 font-normal transition duration-500 hover:text-blue-600"
                                               href="{{route('main.allCategories2')}}">All Catagories 2 </a></li>


                                        <li>
                                            <a class="py-2 lg:py-2 px-5 hover:bg-gray-200 border-coolGray-300 mx-2 mt-2 rounded-md flex items-center whitespace-nowrap text-black-200 font-normal transition duration-500 hover:text-blue-600"
                                               href="{{route('main.courseDetails')}}"> Course </a></li>
                                    </ul>
                                </li>
                                <li class="relative lg:px-2 lg:py-5 dropdown ">
                                    <a class=" lg:hover:bg-gray-200 text-black-200 group py-2 px-4 rounded-full flex items-center text-coolGray-600 font-medium transition duration-500 hover:text-blue-600 arrow"
                                       href="#">
                                        Blog
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                             aria-hidden="true" class="ml-1 -mr-1 h-4 w-4 text-slate-400">
                                            <path class="group-hover:fill-blue-600" fill-rule="evenodd"
                                                  d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                        <span
                                            class="leading-6 text-2xl text-center  bg-gray-200   w-6 h-6 absolute right-2 top-3 block lg:hidden toggle">+</span>
                                    </a>
                                    <ul
                                        class="hidden lg:block bg-white rounded-md lg:absolute top-full lg:shadow  submenu">
                                        <li>
                                            <a class="py-2 lg:py-2 px-5 hover:bg-gray-200 border-coolGray-300 mx-2 mt-2  rounded-md flex items-center whitespace-nowrap text-black-200 font-normal transition duration-500 hover:text-blue-600"
                                               href="{{route('main.blog.index')}}"> Blog </a></li>
                                        <li>
                                            <a class="py-2 lg:py-2 px-5 hover:bg-gray-200 border-coolGray-300 mx-2 mt-2  rounded-md flex items-center whitespace-nowrap text-black-200 font-normal transition duration-500 hover:text-blue-600"
                                               href="{{route('main.blog.details')}}"> Blog Details </a></li>
                                    </ul>
                                </li>
                                <li class="relative lg:px-2 lg:py-5 dropdown ">
                                    <a class=" lg:hover:bg-gray-200 text-black-200 group py-2 px-4 rounded-full flex items-center text-coolGray-600 font-medium transition duration-500 hover:text-blue-600 arrow"
                                       href="#">
                                        Pages
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                             aria-hidden="true" class="ml-1 -mr-1 h-4 w-4 text-slate-400">
                                            <path class="group-hover:fill-blue-600" fill-rule="evenodd"
                                                  d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                        <span
                                            class="leading-6 text-2xl text-center  bg-gray-200   w-6 h-6 absolute right-2 top-3 block lg:hidden toggle">+</span>
                                    </a>
                                    <ul
                                        class="hidden lg:block bg-white rounded-md lg:absolute top-full lg:shadow   submenu">
                                        <li>
                                            <a class="py-2 lg:py-2 px-5 hover:bg-gray-200 border-coolGray-300 mx-2 mt-2 rounded-md flex items-center whitespace-nowrap text-black-200 font-normal transition duration-500 hover:text-blue-600"
                                               href="{{route('main.about1')}}"> About 1 </a></li>
                                        <li>
                                            <a class="py-2 lg:py-2 px-5 hover:bg-gray-200 border-coolGray-300 mx-2 mt-2 rounded-md flex items-center whitespace-nowrap text-black-200 font-normal transition duration-500 hover:text-blue-600"
                                               href="{{route('main.about2')}}"> About 2 </a></li>
                                    </ul>
                                </li>
                                <li class="relative lg:px-2 lg:py-5 dropdown ">
                                    <a class=" lg:hover:bg-gray-200 text-black-200 group py-2 px-4 rounded-full flex items-center text-coolGray-600 font-medium transition duration-500 hover:text-blue-600 arrow"
                                       href="{{route('main.contact')}}"> Contact </a>
                                </li>
                            </ul>
                            <div class="search-box absolute top-0 w-full hidden shadow mt-3 rounded-md"
                                 id="search-content">
                                <form class="flex items-center px-6" action="#">
                                    <div class="search-open-icon">
                                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path d="M22 22L20 20" stroke="currentColor" stroke-width="1.5"
                                                  stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                    <input
                                        class=" appearance-none  rounded w-full py-4 px-3 placeholder-black-200   leading-tight focus:outline-none focus:shadow-outline"
                                        id="search" name="search" type="text" placeholder="Type and press enter">
                                    <div class="search-open-close">
                                 <span class="search-close cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="w-5 h-5">
                                       <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12">
                                       </path>
                                    </svg>
                                 </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="right-side-bar right-side-menu flex gap-4 flex-shrink-0">
                            <div
                                class="search-icon  flex items-center hover:bg-gray-200 transition duration-500 w-12 h-12 justify-center rounded-full cursor-pointer">
                                <div id="search-toggle" class="search-icon search-close ">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M22 22L20 20" stroke="currentColor" stroke-width="1.5"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                            </div>


                            @if (Auth::user() == null)
                                <div class="discount-button text-center">
                                    <a class="py-2 px-8 rounded-full border-slate-200 font-medium border inline-block bg-blue-600 hover:border-blue-200 hover:bg-black-200 text-white  !transition   !duration-500 "
                                       href="{{route('login')}}">Sign In</a>
                                </div>
                            @endif


                            @if (Auth::user())
                                <div class="author-profile  relative">
                                    <img class="author-profile-img cursor-pointer  w-12 h-12 rounded-full object-cover"

                                         @if(Auth::user()->image != null)
                                             src="{{getImageFile(Auth::user()->image)}}"
                                         @else
                                             src="{{asset('custom/image/user-no-image.png')}}"
                                         @endif

                                         alt="images">
                                    <div
                                        class="author-profile-info   absolute top-20 z-10 w-screen max-w-[260px] px-4    transition duration-500 sm:right-0 sm:px-0 opacity-0 invisible">
                                        <div
                                            class="relative grid rounded-xl shadow grid-cols-1 gap-6 bg-white white:bg-neutral-800 py-7 px-6">
                                            <div class="flex items-center space-x-3">
                                                <div
                                                    class="wil-avatar relative flex-shrink-0 inline-flex items-center justify-center text-neutral-100 uppercase font-semibold shadow-inner rounded-full w-12 h-12 ring-1 ring-white dark:ring-neutral-900">
                                                    <img class="absolute inset-0 w-10 h-10  object-cover rounded-full"

                                                         @if(Auth::user()->image != null)
                                                             src="{{getImageFile(Auth::user()->image)}}"
                                                         @else
                                                             src="{{asset('custom/image/user-no-image.png')}}"
                                                         @endif

                                                         alt="images">
                                                </div>
                                                <div class="flex-grow">
                                                    <h4 class="font-semibold text-black-200">{{Auth::user()->name}}</h4>
                                                    <p class="text-xs mt-0.5">
                                                        @if(Auth::user()->type == 1)
                                                            Admin
                                                        @endif

                                                        @if(Auth::user()->type == 2)
                                                            Instructor
                                                        @endif

                                                        @if(Auth::user()->type == 3)
                                                            Student
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                            <div
                                                class="w-full border-b border-neutral-200 dark:border-neutral-700"></div>
                                            <a class="flex items-center p-2 -m-3 transition duration-150 ease-in-out rounded-lg  hover:bg-gray-200  gray:hover:bg-neutral-700 focus:outline-none focus-visible:ring focus-visible:ring-orange-500 focus-visible:ring-opacity-50"
                                               href="{{route('home')}}">
                                                <div
                                                    class="flex items-center justify-center flex-shrink-0 text-neutral-500 dark:text-neutral-300">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M12.1601 10.87C12.0601 10.86 11.9401 10.86 11.8301 10.87C9.45006 10.79 7.56006 8.84 7.56006 6.44C7.56006 3.99 9.54006 2 12.0001 2C14.4501 2 16.4401 3.99 16.4401 6.44C16.4301 8.84 14.5401 10.79 12.1601 10.87Z"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                        <path
                                                            d="M7.15997 14.56C4.73997 16.18 4.73997 18.82 7.15997 20.43C9.90997 22.27 14.42 22.27 17.17 20.43C19.59 18.81 19.59 16.17 17.17 14.56C14.43 12.73 9.91997 12.73 7.15997 14.56Z"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </svg>
                                                </div>
                                                <div class="ml-4">
                                                    <p class="text-sm font-medium text-black-200">My Dashboard</p>
                                                </div>
                                            </a>
                                            <a class="flex items-center p-2 -m-3 transition duration-150 ease-in-out rounded-lg  hover:bg-gray-200  gray:hover:bg-neutral-700 focus:outline-none focus-visible:ring focus-visible:ring-orange-500 focus-visible:ring-opacity-50"
                                               href="cart.html">
                                                <div
                                                    class="flex items-center justify-center flex-shrink-0 text-neutral-500 dark:text-neutral-300">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path d="M8 12.2H15" stroke="currentColor" stroke-width="1.5"
                                                              stroke-miterlimit="10" stroke-linecap="round"
                                                              stroke-linejoin="round">
                                                        </path>
                                                        <path d="M8 16.2H12.38" stroke="currentColor" stroke-width="1.5"
                                                              stroke-miterlimit="10" stroke-linecap="round"
                                                              stroke-linejoin="round">
                                                        </path>
                                                        <path
                                                            d="M10 6H14C16 6 16 5 16 4C16 2 15 2 14 2H10C9 2 8 2 8 4C8 6 9 6 10 6Z"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path
                                                            d="M16 4.02002C19.33 4.20002 21 5.43002 21 10V16C21 20 20 22 15 22H9C4 22 3 20 3 16V10C3 5.44002 4.67 4.20002 8 4.02002"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </div>
                                                <div class="ml-4">
                                                    <p class="text-sm font-medium text-black-200">My Order</p>
                                                </div>
                                            </a>
                                            <a class="flex items-center p-2 -m-3 transition duration-150 ease-in-out rounded-lg  hover:bg-gray-200  gray:hover:bg-neutral-700 focus:outline-none focus-visible:ring focus-visible:ring-orange-500 focus-visible:ring-opacity-50"
                                               href="checkout.html">
                                                <div
                                                    class="flex items-center justify-center flex-shrink-0 text-neutral-500 dark:text-neutral-300">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </svg>
                                                </div>
                                                <div class="ml-4">
                                                    <p class="text-sm font-medium text-black-200">Wishlist</p>
                                                </div>
                                            </a>
                                            <div
                                                class="w-full border-b border-neutral-200 dark:border-neutral-700"></div>
                                            <a class="flex items-center p-2 -m-3 transition duration-150 ease-in-out rounded-lg  hover:bg-gray-200  gray:hover:bg-neutral-700 focus:outline-none focus-visible:ring focus-visible:ring-orange-500 focus-visible:ring-opacity-50"
                                               href="/ciseco/">
                                                <div
                                                    class="flex items-center justify-center flex-shrink-0 text-neutral-500 dark:text-neutral-300">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M11.97 22C17.4928 22 21.97 17.5228 21.97 12C21.97 6.47715 17.4928 2 11.97 2C6.44715 2 1.97 6.47715 1.97 12C1.97 17.5228 6.44715 22 11.97 22Z"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                        <path
                                                            d="M12 16.5C14.4853 16.5 16.5 14.4853 16.5 12C16.5 9.51472 14.4853 7.5 12 7.5C9.51472 7.5 7.5 9.51472 7.5 12C7.5 14.4853 9.51472 16.5 12 16.5Z"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                        <path d="M4.89999 4.92993L8.43999 8.45993" stroke="currentColor"
                                                              stroke-width="1.5" stroke-linecap="round"
                                                              stroke-linejoin="round"></path>
                                                        <path d="M4.89999 19.07L8.43999 15.54" stroke="currentColor"
                                                              stroke-width="1.5" stroke-linecap="round"
                                                              stroke-linejoin="round"></path>
                                                        <path d="M19.05 19.07L15.51 15.54" stroke="currentColor"
                                                              stroke-width="1.5"
                                                              stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M19.05 4.92993L15.51 8.45993" stroke="currentColor"
                                                              stroke-width="1.5" stroke-linecap="round"
                                                              stroke-linejoin="round"></path>
                                                    </svg>
                                                </div>
                                                <div class="ml-4">
                                                    <p class="text-sm font-medium text-black-200">Help</p>
                                                </div>
                                            </a>
                                            <a class="flex items-center p-2 -m-3 transition duration-150 ease-in-out rounded-lg  hover:bg-gray-200  gray:hover:bg-neutral-700 focus:outline-none focus-visible:ring focus-visible:ring-orange-500 focus-visible:ring-opacity-50"
                                               href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                <div
                                                    class="flex items-center justify-center flex-shrink-0 text-neutral-500 dark:text-neutral-300">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M8.90002 7.55999C9.21002 3.95999 11.06 2.48999 15.11 2.48999H15.24C19.71 2.48999 21.5 4.27999 21.5 8.74999V15.27C21.5 19.74 19.71 21.53 15.24 21.53H15.11C11.09 21.53 9.24002 20.08 8.91002 16.54"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                        <path d="M15 12H3.62" stroke="currentColor" stroke-width="1.5"
                                                              stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M5.85 8.6499L2.5 11.9999L5.85 15.3499"
                                                              stroke="currentColor"
                                                              stroke-width="1.5" stroke-linecap="round"
                                                              stroke-linejoin="round"></path>
                                                    </svg>
                                                </div>
                                                <div class="ml-4">
                                                    <p class="text-sm font-medium text-black-200">Log out</p>
                                                </div>
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{--Desktop Cart Starts Here--}}

                            <div class="cart-box">
                                <div class="relative">
                                    <div
                                        class="cart-box-close cursor-pointer w-12 h-12  hover:bg-gray-200 transition duration-500  rounded-full inline-flex items-center justify-center   relative">
                                        <div
                                            class="w-4 h-4 flex items-center justify-center bg-blue-600 absolute top-1.5 right-1.5 rounded-full text-[11px] leading-none text-white font-medium">
                                            <span class="mt-[1px]">

                                                @if(Auth::user() != null)
                                                    {{ $quantity = \App\Models\CartManagement::where('user_id', Auth::user()->id)->count() }}
                                                @else
                                                    {{ $quantity = 0 }}
                                                @endif

                                            </span>
                                        </div>
                                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2 2H3.74001C4.82001 2 5.67 2.93 5.58 4L4.75 13.96C4.61 15.59 5.89999 16.99 7.53999 16.99H18.19C19.63 16.99 20.89 15.81 21 14.38L21.54 6.88C21.66 5.22 20.4 3.87 18.73 3.87H5.82001"
                                                stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path
                                                d="M16.25 22C16.9404 22 17.5 21.4404 17.5 20.75C17.5 20.0596 16.9404 19.5 16.25 19.5C15.5596 19.5 15 20.0596 15 20.75C15 21.4404 15.5596 22 16.25 22Z"
                                                stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path
                                                d="M8.25 22C8.94036 22 9.5 21.4404 9.5 20.75C9.5 20.0596 8.94036 19.5 8.25 19.5C7.55964 19.5 7 20.0596 7 20.75C7 21.4404 7.55964 22 8.25 22Z"
                                                stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M9 8H21" stroke="currentColor" stroke-width="1.5"
                                                  stroke-miterlimit="10"
                                                  stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                    <div
                                        class="cart-wrap  opacity-0 invisible absolute z-10 w-screen max-w-xs sm:max-w-md px-4 mt-3.5 -right-28 sm:right-0 sm:px-0  translate-y-10">
                                        <div class="overflow-hidden rounded-xl shadow  ">
                                            <div class="relative bg-white">
                                                <div class="max-h-[60vh] p-5 overflow-y-auto hiddenScrollbar">
                                                    <h3 class="text-xl font-semibold text-black-200">Shopping cart</h3>
                                                    <div class="divide-y divide-slate-100 dark:divide-slate-700">
                                                        @if(Auth::user() != null)
                                                            @php
                                                                $carts = \App\Models\CartManagement::where('user_id', Auth::user()->id)->get();
                                                                $total = \App\Models\CartManagement::whereUserId(Auth::user()->id)->sum('price');
                                                            @endphp
                                                            @foreach($carts as $item)

                                                                <div class="flex py-5 last:pb-0">
                                                                    <div
                                                                        class="relative h-24 w-24 flex-shrink-0 overflow-hidden rounded-xl bg-slate-100">
                                                                        <img class="h-full object-cover"
                                                                             src="{{asset('frontend/assets/images/lessons-images-1-1.webp')}}"
                                                                             alt="#">
                                                                    </div>
                                                                    <div class="ml-4 flex flex-1 flex-col">
                                                                        <div>
                                                                            <div class="flex justify-between ">
                                                                                <div>
                                                                                    <h3
                                                                                        class="text-base font-medium text-black-200 hover:text-blue-600 transition duration-500">
                                                                                        <a href="courses-lesson-1.html">
                                                                                            {{ $item->course->title }} </a>
                                                                                    </h3>
                                                                                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                                                                                        <span>{{ @$item->course->category->name }}</span>
                                                                                    </p>
                                                                                </div>
                                                                                <div class="mt-0.5">
                                                                                    <div
                                                                                        class="flex items-center border border-blue-600 rounded-lg py-1 px-2 md:py-1.5 md:px-2.5 text-sm font-medium">
                                                                                        <span
                                                                                            class="text-blue-600">$ {{$item->price}}</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="flex flex-1 items-end justify-between text-sm">
                                                                            <p></p>
                                                                            <div class="flex">
                                                                                <a href="{{ route('main.cartDelete', $item->id) }}">
                                                                                    <img src="{{asset('frontend/custom/image/icons8-remove-48.png')}}"
                                                                                         alt="trash" style="width: 35px; height: 35px;">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="p-5  bg-white">
                                                    <p class="flex justify-between font-semibold text-black-200">
                                             <span><span>Subtotal</span>
                                                 <span class="block text-sm">Shipping
                                                   and taxes calculated at checkout.
                                                 </span>
                                             </span>
                                                        <span>
                                                            @if(Auth::user() != null)
                                                                $ {{ $total }}
                                                            @else
                                                                $ 0
                                                            @endif
                                                        </span>
                                                    </p>

                                                    <div class="flex space-x-2 mt-5"><a
                                                            class=" relative inline-flex items-center justify-center rounded-full  font-medium py-3 px-4    bg-blue-600 hover:bg-black-200 transition duration-500 text-white  flex-1"
                                                            rel="noopener noreferrer" href="{{ route('main.cart') }}">View
                                                            cart</a>
                                                        <a class=" relative inline-flex items-center justify-center rounded-full  font-medium py-3 px-4    hover:bg-blue-600 bg-black-200 transition duration-500 text-white  flex-1"
                                                           rel="noopener noreferrer"
                                                           href="{{ route('main.checkout') }}">Check out</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--Desktop Cart Ends Here--}}

                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>


    {{--Main Content Start--}}

    @yield('content')

    {{--Main Content End--}}


    <a class="fixed text-white buyButton" href="https://themeix.com" target="_blank">Buy Now</a>


    <!--  ====================== Footer  Area Start =============================  -->
    <footer class="footer-area pb-20 bg-no-repeat"
            style="background-image:url({{asset('frontend/assets/images/effects-footer.svg')}})">
        <div class="container">
            <div class="grid md:grid-cols-10 grid-cols-2 md:gap-16 gap-10  border-t border-blue-5 pt-32">
                <div class=" md:col-span-4">
                    <div class="footer-item" data-aos="fade-up" data-aos-delay="500">
                        <div class="footer-logo">
                            <a href="{{route('main.index')}}"><img
                                    src="{{asset('frontend/assets/images/header-logo.png')}}" alt="images"></a>
                        </div>
                        <p class="pt-8">Instantly are in most her. At many, a been some don't he they the his to is fail
                            with I that for titles let butter check and a picture because
                        </p>
                    </div>
                </div>
                <div class="md:col-span-2">
                    <div class="footer-item" data-aos="fade-up" data-aos-delay="1000">
                        <h4 class="text-xl font-medium text-black-200">Navigation</h4>
                        <ul class="mt-10">
                            <li class="mb-6"><a class="hover:text-blue-600 " href="#">Home</a></li>
                            <li class="mb-6"><a class="hover:text-blue-600 " href="#">Pages</a></li>
                            <li><a class="hover:text-blue-600" href="#">About us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="md:col-span-2">
                    <div class="footer-item" data-aos="fade-up" data-aos-delay="1500">
                        <h4 class="text-xl font-medium text-black-200">Quick links</h4>
                        <ul class="mt-10">
                            <li class="mb-6"><a class="hover:text-blue-600 " href="#">Contact Us</a></li>
                            <li class="mb-6"><a class="hover:text-blue-600 " href="#">Terms Of Service</a></li>
                            <li><a class="hover:text-blue-600" href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="md:col-span-2">
                    <div class="footer-item" data-aos="fade-up" data-aos-delay="2000">
                        <h4 class="text-xl font-medium text-black-200">Popular Courses</h4>
                        <ul class="mt-10">
                            <li class="mb-6"><a class="hover:text-blue-600 " href="#">Web Design</a></li>
                            <li class="mb-6"><a class="hover:text-blue-600 " href="#">Web Development</a></li>
                            <li><a class="hover:text-blue-600" href="#">Mobile Development</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="grid md:grid-cols-2 mt-16">
                <div class="flex-col" data-aos="fade-up" data-aos-delay="500">
                    <div class="social-link ">
                        <ul class="flex gap-4">
                            <li>
                                <a class="bg-stone-50 group hover:bg-linkedin-100  !transition   !duration-500  h-10 w-10 flex items-center justify-center rounded-full"
                                   href="#">
                                    <svg width="14" height="15" viewBox="0 0 14 15" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path class="group-hover:fill-white" fill-rule="evenodd" clip-rule="evenodd"
                                              d="M5.2003 5.05408H7.8001V6.34908C8.1746 5.60428 9.135 4.93508 10.5777 4.93508C13.3434 4.93508 14 6.41768 14 9.13788V14.1758H11.2V9.75738C11.2 8.20828 10.8255 7.33468 9.8721 7.33468C8.5498 7.33468 8.0003 8.27618 8.0003 9.75668V14.1758H5.2003V5.05408ZM0.399 14.0568H3.199V4.93508H0.399V14.0568ZM3.6001 1.96078C3.6002 2.19547 3.55366 2.42785 3.46317 2.64439C3.37268 2.86094 3.24006 3.05734 3.073 3.22218C2.73448 3.55862 2.27627 3.74694 1.799 3.74578C1.32257 3.74546 0.865418 3.55762 0.5264 3.22288C0.359948 3.05748 0.22777 2.86086 0.137441 2.64428C0.047111 2.42771 0.000405392 2.19544 0 1.96078C0 1.48688 0.189 1.03328 0.5271 0.698681C0.86582 0.363492 1.32317 0.175572 1.7997 0.175781C2.2771 0.175781 2.7349 0.364081 3.073 0.698681C3.4104 1.03328 3.6001 1.48688 3.6001 1.96078Z"
                                              fill="#035AE0"/>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a class="bg-stone-50 group hover:bg-facebook-100  !transition   !duration-500  h-10 w-10 flex items-center justify-center rounded-full"
                                   href="#">
                                    <svg width="10" height="15" viewBox="0 0 10 15" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path class="group-hover:fill-white"
                                              d="M9.27638 0.56914C9.27638 0.466034 9.23542 0.367151 9.16251 0.294244C9.08961 0.221337 8.99072 0.180379 8.88762 0.180379H6.94381C5.96501 0.131621 5.00669 0.472254 4.27825 1.12785C3.54981 1.78345 3.11046 2.70071 3.0562 3.67923V5.77854H1.11239C1.00929 5.77854 0.910405 5.8195 0.837498 5.89241C0.764592 5.96531 0.723633 6.06419 0.723633 6.1673V8.18886C0.723633 8.29197 0.764592 8.39085 0.837498 8.46375C0.910405 8.53666 1.00929 8.57762 1.11239 8.57762H3.0562V13.787C3.0562 13.8901 3.09716 13.989 3.17006 14.0619C3.24297 14.1348 3.34186 14.1758 3.44496 14.1758H5.77753C5.88063 14.1758 5.97952 14.1348 6.05242 14.0619C6.12533 13.989 6.16629 13.8901 6.16629 13.787V8.57762H8.2034C8.28985 8.57886 8.37425 8.55125 8.44325 8.49915C8.51225 8.44704 8.56191 8.37343 8.58438 8.28994L9.1442 6.26838C9.15967 6.21094 9.16175 6.15071 9.15028 6.09234C9.13881 6.03397 9.11409 5.97901 9.07804 5.93169C9.04199 5.88437 8.99556 5.84596 8.94233 5.81941C8.88909 5.79285 8.83048 5.77887 8.77099 5.77854H6.16629V3.67923C6.18563 3.48677 6.27601 3.30844 6.41978 3.17904C6.56355 3.04965 6.75039 2.97849 6.94381 2.97946H8.88762C8.99072 2.97946 9.08961 2.9385 9.16251 2.86559C9.23542 2.79269 9.27638 2.6938 9.27638 2.5907V0.56914Z"
                                              fill="#035AE0"/>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a class="bg-stone-50 group hover:bg-linkedin-100  !transition   !duration-500  h-10 w-10 flex items-center justify-center rounded-full"
                                   href="#">
                                    <svg width="18" height="15" viewBox="0 0 18 15" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path class="group-hover:fill-white"
                                              d="M17.6107 1.83644C16.9774 2.11707 16.2971 2.30668 15.5819 2.39239C16.3199 1.95081 16.872 1.25581 17.1352 0.437084C16.4418 0.848918 15.683 1.1388 14.8917 1.29414C14.3595 0.725954 13.6547 0.34935 12.8866 0.2228C12.1184 0.0962496 11.33 0.226833 10.6437 0.594276C9.95745 0.961719 9.41166 1.54546 9.09112 2.25488C8.77058 2.9643 8.69322 3.75969 8.87105 4.51758C7.46615 4.44704 6.09178 4.08189 4.83714 3.44581C3.58249 2.80974 2.47562 1.91696 1.58834 0.825414C1.28496 1.34875 1.11051 1.95551 1.11051 2.60172C1.11018 3.18345 1.25343 3.75628 1.52757 4.26936C1.80171 4.78245 2.19826 5.21994 2.68204 5.54302C2.12099 5.52517 1.57232 5.37357 1.08169 5.10084V5.14634C1.08164 5.96225 1.36386 6.75304 1.88049 7.38455C2.39711 8.01605 3.11631 8.44937 3.91605 8.61098C3.39558 8.75183 2.84991 8.77258 2.32025 8.67165C2.54589 9.37369 2.98542 9.9876 3.5773 10.4274C4.16917 10.8673 4.88378 11.111 5.62106 11.1245C4.36948 12.107 2.82378 12.64 1.23263 12.6376C0.950768 12.6377 0.66915 12.6212 0.389221 12.5883C2.00434 13.6268 3.88445 14.1779 5.80461 14.1758C12.3046 14.1758 15.858 8.79225 15.858 4.12319C15.858 3.97149 15.8542 3.81829 15.8473 3.66659C16.5385 3.16675 17.1351 2.54779 17.6092 1.83871L17.6107 1.83644Z"
                                              fill="#1B66CA"/>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a class="bg-stone-50 group hover:bg-instagram-100  !transition   !duration-500  h-10 w-10 flex items-center justify-center rounded-full"
                                   href="#">
                                    <svg width="14" height="15" viewBox="0 0 14 15" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path class="group-hover:fill-white" fill-rule="evenodd" clip-rule="evenodd"
                                              d="M4.11409 0.217781C4.86055 0.183418 5.09855 0.175781 7 0.175781C8.90145 0.175781 9.13945 0.184054 9.88527 0.217781C10.6311 0.251509 11.1402 0.370509 11.5856 0.542963C12.0521 0.719236 12.4753 0.994781 12.8253 1.35114C13.1816 1.70051 13.4565 2.12305 13.6322 2.59014C13.8053 3.0356 13.9236 3.54469 13.958 4.28924C13.9924 5.03696 14 5.27496 14 7.17578C14 9.07724 13.9917 9.31524 13.958 10.0617C13.9243 10.8062 13.8053 11.3153 13.6322 11.7608C13.4565 12.2279 13.1812 12.6512 12.8253 13.0011C12.4753 13.3574 12.0521 13.6323 11.5856 13.808C11.1402 13.9811 10.6311 14.0994 9.88655 14.1338C9.13945 14.1681 8.90145 14.1758 7 14.1758C5.09855 14.1758 4.86055 14.1675 4.11409 14.1338C3.36955 14.1001 2.86045 13.9811 2.415 13.808C1.94786 13.6323 1.52461 13.3569 1.17473 13.0011C0.818605 12.6515 0.543018 12.2284 0.367182 11.7614C0.194727 11.316 0.0763636 10.8069 0.042 10.0623C0.00763635 9.3146 0 9.0766 0 7.17578C0 5.27433 0.00827272 5.03633 0.042 4.29051C0.0757273 3.54469 0.194727 3.0356 0.367182 2.59014C0.543278 2.12311 0.819076 1.70007 1.17536 1.35051C1.52475 0.994464 1.94757 0.718882 2.41436 0.542963C2.85982 0.370509 3.36955 0.252145 4.11409 0.217781ZM9.82864 1.47778C9.09045 1.44405 8.869 1.43705 7 1.43705C5.131 1.43705 4.90955 1.44405 4.17136 1.47778C3.48855 1.50896 3.11818 1.62287 2.87127 1.71896C2.54482 1.84624 2.31127 1.99705 2.06627 2.24205C1.83403 2.468 1.6553 2.74305 1.54318 3.04705C1.44709 3.29396 1.33318 3.66433 1.302 4.34714C1.26827 5.08533 1.26127 5.30678 1.26127 7.17578C1.26127 9.04478 1.26827 9.26624 1.302 10.0044C1.33318 10.6872 1.44709 11.0576 1.54318 11.3045C1.65518 11.6081 1.834 11.8836 2.06627 12.1095C2.29218 12.3418 2.56773 12.5206 2.87127 12.6326C3.11818 12.7287 3.48855 12.8426 4.17136 12.8738C4.90955 12.9075 5.13036 12.9145 7 12.9145C8.86964 12.9145 9.09045 12.9075 9.82864 12.8738C10.5115 12.8426 10.8818 12.7287 11.1287 12.6326C11.4552 12.5053 11.6887 12.3545 11.9337 12.1095C12.166 11.8836 12.3448 11.6081 12.4568 11.3045C12.5529 11.0576 12.6668 10.6872 12.698 10.0044C12.7317 9.26624 12.7387 9.04478 12.7387 7.17578C12.7387 5.30678 12.7317 5.08533 12.698 4.34714C12.6668 3.66433 12.5529 3.29396 12.4568 3.04705C12.3295 2.7206 12.1787 2.48705 11.9337 2.24205C11.7078 2.00983 11.4327 1.8311 11.1287 1.71896C10.8818 1.62287 10.5115 1.50896 9.82864 1.47778ZM6.10591 9.33369C6.60524 9.54155 7.16124 9.5696 7.67895 9.41306C8.19667 9.25652 8.64398 8.92509 8.94448 8.47539C9.24498 8.02569 9.38004 7.48561 9.32658 6.94739C9.27312 6.40918 9.03446 5.90622 8.65136 5.52442C8.40715 5.28036 8.11186 5.09348 7.78676 4.97724C7.46165 4.861 7.11482 4.81828 6.77122 4.85217C6.42763 4.88606 6.09582 4.99571 5.79969 5.17323C5.50356 5.35074 5.25047 5.59171 5.05865 5.87878C4.86682 6.16585 4.74103 6.49187 4.69033 6.83339C4.63963 7.17491 4.66528 7.52342 4.76543 7.85384C4.86559 8.18425 5.03776 8.48835 5.26955 8.74424C5.50134 9.00013 5.78698 9.20144 6.10591 9.33369ZM4.45582 4.6316C4.78992 4.29749 5.18657 4.03246 5.6231 3.85165C6.05963 3.67083 6.5275 3.57776 7 3.57776C7.4725 3.57776 7.94037 3.67083 8.3769 3.85165C8.81343 4.03246 9.21008 4.29749 9.54418 4.6316C9.87829 4.96571 10.1433 5.36235 10.3241 5.79888C10.505 6.23541 10.598 6.70328 10.598 7.17578C10.598 7.64828 10.505 8.11615 10.3241 8.55268C10.1433 8.98921 9.87829 9.38586 9.54418 9.71996C8.86942 10.3947 7.95425 10.7738 7 10.7738C6.04575 10.7738 5.13058 10.3947 4.45582 9.71996C3.78106 9.0452 3.40198 8.13003 3.40198 7.17578C3.40198 6.22153 3.78106 5.30636 4.45582 4.6316ZM11.396 4.1136C11.4788 4.0355 11.5451 3.94158 11.5909 3.8374C11.6368 3.73322 11.6612 3.62091 11.6629 3.5071C11.6646 3.39329 11.6434 3.28031 11.6006 3.17484C11.5578 3.06937 11.4943 2.97356 11.4138 2.89308C11.3333 2.8126 11.2375 2.74908 11.132 2.70629C11.0266 2.6635 10.9136 2.64231 10.7998 2.64397C10.686 2.64563 10.5736 2.67011 10.4695 2.71595C10.3653 2.7618 10.2714 2.82808 10.1933 2.91087C10.0414 3.07189 9.95822 3.28577 9.96145 3.5071C9.96467 3.72843 10.054 3.9398 10.2106 4.09632C10.3671 4.25284 10.5784 4.3422 10.7998 4.34543C11.0211 4.34865 11.235 4.26549 11.396 4.1136Z"
                                              fill="#035AE0"/>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex-col md:text-right mt-6 md:mt-0" data-aos="fade-up" data-aos-delay="100">
                    <p class="">© 2022 All rights reserved by <a class="text-blue-600" href="https://themeix.com/"
                                                                 target="_blank">themeix</a></p>
                </div>
            </div>
        </div>
    </footer>
    <!--  ====================== Footer  Area End =============================  -->
</div>
<!-- gulp:js -->
<script src="{{asset('frontend/assets/js/build.min.js')}}"></script> <!-- endgulp -->


<script>
    $('#search').on('keyup', function () {
        search();
    });
    search();

    function search() {
        debugger;

        var keyword = $('#search').val();
        $.post('{{ route("main.search") }}',
            {
                _token: $('meta[name="csrf-token"]').attr('content'),
                keyword: keyword
            },
            function (data) {
                table_post_row(data);
                console.log(data);
            });
    }

    // table row with ajax
    function table_post_row(data) {
        var html = '';
        $.each(data, function (key, value) {
            html += '<tr>';
            html += '<td>' + value.id + '</td>';
            html += '<td>' + value.title + '</td>';
            html += '<td>' + value.description + '</td>';
            html += '<td>' + value.created_at + '</td>';
            html += '</tr>';
        });
        $('#table_post_row').html(html);
    }


    $(document).ready(function () {
        $('#example').DataTable();
    });


</script>


@stack('scripts')
</body>
</html>
