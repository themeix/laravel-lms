@extends('layouts.frontEndMaster')
@section('title','Contact Us')
@section('content')
    <!--  ====================== Breadcrum  Area Start =============================  -->
    <section class="breadcrumb-area md:py-32 relative py-20  bg-blue-100 overflow-hidden">
        <div class="container">
            <div class="breadcrumb-titel md:w-7/12 m-auto text-center z-10 relative">
                <h2 class="xl:text-6xl lg:text-5xl md:text-4xl text-3xl text-black-200  font-medium" data-aos="fade-up"
                    data-aos-delay="100">Contact</h2>
            </div>
            <ul class="flex gap-2 justify-center mt-6 relative z-10" data-aos="fade-up" data-aos-delay="200">
                <li><a class="hover:text-blue-600 transition duration-500" href="{{ route('main.index') }}">Home </a> </li>
                <li>/</li>
                <li> Contact </li>
            </ul>
        </div>
        <div class="shape-breadcrumb absolute top-0 right-0">
            <img src="{{asset('frontend/assets/images/about/about-breadcrumb.svg')}}" alt="images">
        </div>
    </section>
    <!--  ====================== Breadcrum  Area End =============================  -->
    <!--  ====================== Contact  Area Start =============================  -->
    <section class="contact-area md:py-32 py-20 md:-mb-40 relative">
        <div class="container">
            <div class="md:grid md:grid-cols-10 mx-auto gap-12 flex flex-col md:gap-20">
                <div class="col-span-4">
                    <div class="contact-info-title border-b pb-10 mb-10">
                        <h3 class="text-black-200 font-medium md:text-3xl text-2xl">Contact us</h3>
                    </div>
                    <div class="location-box mb-8">
                        <div class="location-icon flex gap-4">
                        <span>
                           <svg width="22" height="28" viewBox="0 0 22 28" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                              <path
                                  d="M11 0C8.08369 0.00344047 5.28779 1.16347 3.22564 3.22563C1.16348 5.28778 0.00345217 8.08367 1.17029e-05 11C-0.00348119 13.3832 0.774992 15.7018 2.21601 17.6C2.21601 17.6 2.51601 17.995 2.56501 18.052L11 28L19.439 18.047C19.483 17.994 19.784 17.6 19.784 17.6L19.785 17.597C21.2253 15.6996 22.0034 13.3821 22 11C21.9966 8.08367 20.8365 5.28778 18.7744 3.22563C16.7122 1.16347 13.9163 0.00344047 11 0ZM11 15C10.2089 15 9.43553 14.7654 8.77773 14.3259C8.11993 13.8864 7.60724 13.2616 7.30449 12.5307C7.00174 11.7998 6.92253 10.9956 7.07687 10.2196C7.23121 9.44372 7.61217 8.73098 8.17158 8.17157C8.73099 7.61216 9.44373 7.2312 10.2197 7.07686C10.9956 6.92252 11.7998 7.00173 12.5307 7.30448C13.2616 7.60723 13.8864 8.11992 14.3259 8.77772C14.7654 9.43552 15 10.2089 15 11C14.9987 12.0605 14.5768 13.0771 13.827 13.827C13.0771 14.5768 12.0605 14.9987 11 15Z"
                                  fill="#223655" />
                           </svg>
                        </span>
                            <div class="location-info">
                                <h6 class="mb-4 text-black-200 font-medium">Address</h6>
                                <p>4140 Parker Rd. Allentown, New Mexico 31134</p>
                            </div>
                        </div>
                    </div>
                    <div class="location-box mb-8">
                        <div class="location-icon flex gap-4">
                        <span>
                           <svg width="30" height="26" viewBox="0 0 30 26" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                              <path
                                  d="M18.5211 13.1296H17.904C17.3319 13.1369 16.768 12.9929 16.2695 12.712C15.7711 12.4311 15.3558 12.0233 15.0658 11.5301C14.7757 11.0369 14.6213 10.4758 14.6182 9.90363C14.615 9.33148 14.7633 8.76867 15.0478 8.2723L17.0666 4.84312H1.75426C1.59606 4.84556 1.43891 4.86928 1.28704 4.91364L14.0252 17.599L18.5211 13.1296Z"
                                  fill="#223655" />
                              <path
                                  d="M27.9888 13.1296H21.0158L15.2682 18.8507C14.9379 19.1791 14.491 19.3634 14.0252 19.3634C13.5595 19.3634 13.1126 19.1791 12.7823 18.8507L0.0617076 6.16543C0.0226021 6.30915 0.0018677 6.45726 0 6.60619V24.2369C0 24.7045 0.185752 25.153 0.516392 25.4836C0.847033 25.8142 1.29548 26 1.76307 26H26.4461C26.9137 26 27.3621 25.8142 27.6928 25.4836C28.0234 25.153 28.2092 24.7045 28.2092 24.2369V13.1119L27.9888 13.1296ZM2.97078 24.2369H1.74544V22.9763L8.15421 16.6205L9.39718 17.8634L2.97078 24.2369ZM26.4285 24.2369H25.1943L18.7679 17.8634L20.0109 16.6205L26.4197 22.9763L26.4285 24.2369Z"
                                  fill="#223655" />
                              <path
                                  d="M21.9679 0.558854L16.9255 9.2508C16.8082 9.423 16.7408 9.6243 16.7309 9.83242C16.721 10.0405 16.7689 10.2473 16.8693 10.4299C16.9697 10.6125 17.1187 10.7637 17.2998 10.8667C17.4809 10.9698 17.687 11.0207 17.8952 11.0139H27.9888C28.197 11.0207 28.4031 10.9698 28.5842 10.8667C28.7652 10.7637 28.9142 10.6125 29.0147 10.4299C29.1151 10.2473 29.163 10.0405 29.1531 9.83242C29.1431 9.6243 29.0758 9.423 28.9585 9.2508L23.9161 0.558854C23.8166 0.388766 23.6744 0.247681 23.5035 0.149635C23.3326 0.0515893 23.139 0 22.942 0C22.745 0 22.5514 0.0515893 22.3805 0.149635C22.2096 0.247681 22.0673 0.388766 21.9679 0.558854Z"
                                  fill="#223655" />
                           </svg>
                        </span>
                            <div class="location-info">
                                <h6 class="mb-4 text-black-200 font-medium">Email</h6>
                                <a class="hover:text-blue-600 transition duration-500"
                                   href="mailto:themeix@gmail.com">themeix@gmail.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="location-box mb-8">
                        <div class="location-icon flex gap-4">
                        <span>
                           <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                              <path
                                  d="M27.4854 21.9331L21.0963 16.124C20.7943 15.8495 20.3974 15.7031 19.9895 15.7157C19.5816 15.7283 19.1945 15.8989 18.91 16.1915L15.1488 20.0596C14.2435 19.8867 12.4234 19.3193 10.5499 17.4505C8.67643 15.5754 8.10903 13.7506 7.94086 12.8516L11.8058 9.08887C12.0987 8.80459 12.2696 8.41746 12.2822 8.00941C12.2949 7.60136 12.1482 7.20442 11.8733 6.90258L6.06577 0.515046C5.79079 0.212261 5.4086 0.0285999 5.00038 0.0030677C4.59216 -0.0224645 4.19006 0.112144 3.87949 0.378305L0.468821 3.30331C0.197085 3.57603 0.0348949 3.939 0.0130171 4.32336C-0.010559 4.7163 -0.460075 14.0241 6.75734 21.2447C13.0537 27.5395 20.9407 28 23.1128 28C23.4303 28 23.6252 27.9906 23.6771 27.9874C24.0614 27.9659 24.4242 27.803 24.6956 27.5301L27.619 24.1178C27.8862 23.8082 28.0218 23.4065 27.9969 22.9983C27.9719 22.5901 27.7883 22.2078 27.4854 21.9331Z"
                                  fill="#223655" />
                           </svg>
                        </span>
                            <div class="location-info">
                                <h6 class="mb-4 text-black-200 font-medium">Phone</h6>
                                <a class="hover:text-blue-600 transition duration-500" href="tel:+15655684548">+1 565 5684
                                    548</a>
                            </div>
                        </div>
                    </div>
                    <div class="location-box mb-8">
                        <ul class="flex gap-4">
                            <li>
                                <a class="bg-gray-400 h-12 group  w-12 hover:bg-blue-600 transition duration-500 flex items-center justify-center rounded-full"
                                   href="#">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path class="group-hover:fill-white"
                                              d="M11.2866 9.71429C10.7776 9.71429 10.308 9.89286 9.94012 10.1911L6.24012 7.51429C6.30208 7.17423 6.30208 6.82577 6.24012 6.48571L9.94012 3.80893C10.308 4.10714 10.7776 4.28571 11.2866 4.28571C12.4687 4.28571 13.4294 3.325 13.4294 2.14286C13.4294 0.960714 12.4687 0 11.2866 0C10.1044 0 9.14369 0.960714 9.14369 2.14286C9.14369 2.35 9.17227 2.54821 9.22762 2.7375L5.71334 5.28214C5.19191 4.59107 4.36334 4.14286 3.42941 4.14286C1.85084 4.14286 0.572266 5.42143 0.572266 7C0.572266 8.57857 1.85084 9.85714 3.42941 9.85714C4.36334 9.85714 5.19191 9.40893 5.71334 8.71786L9.22762 11.2625C9.17227 11.4518 9.14369 11.6518 9.14369 11.8571C9.14369 13.0393 10.1044 14 11.2866 14C12.4687 14 13.4294 13.0393 13.4294 11.8571C13.4294 10.675 12.4687 9.71429 11.2866 9.71429ZM11.2866 1.21429C11.7991 1.21429 12.2151 1.63036 12.2151 2.14286C12.2151 2.65536 11.7991 3.07143 11.2866 3.07143C10.7741 3.07143 10.358 2.65536 10.358 2.14286C10.358 1.63036 10.7741 1.21429 11.2866 1.21429ZM3.42941 8.57143C2.56334 8.57143 1.85798 7.86607 1.85798 7C1.85798 6.13393 2.56334 5.42857 3.42941 5.42857C4.29548 5.42857 5.00084 6.13393 5.00084 7C5.00084 7.86607 4.29548 8.57143 3.42941 8.57143ZM11.2866 12.7857C10.7741 12.7857 10.358 12.3696 10.358 11.8571C10.358 11.3446 10.7741 10.9286 11.2866 10.9286C11.7991 10.9286 12.2151 11.3446 12.2151 11.8571C12.2151 12.3696 11.7991 12.7857 11.2866 12.7857Z"
                                              fill="#757F8F" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a class="bg-gray-400 h-12 group  w-12 hover:bg-blue-600 transition duration-500 flex items-center justify-center rounded-full"
                                   href="#">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path class="group-hover:fill-white" fill-rule="evenodd" clip-rule="evenodd"
                                              d="M5.2003 4.8783H7.8001V6.1733C8.1746 5.4285 9.135 4.7593 10.5777 4.7593C13.3434 4.7593 14 6.2419 14 8.9621V14H11.2V9.5816C11.2 8.0325 10.8255 7.1589 9.8721 7.1589C8.5498 7.1589 8.0003 8.1004 8.0003 9.5809V14H5.2003V4.8783ZM0.399 13.881H3.199V4.7593H0.399V13.881ZM3.6001 1.785C3.6002 2.01969 3.55366 2.25206 3.46317 2.46861C3.37268 2.68516 3.24006 2.88156 3.073 3.0464C2.73448 3.38284 2.27627 3.57116 1.799 3.57C1.32257 3.56968 0.865418 3.38184 0.5264 3.0471C0.359948 2.8817 0.22777 2.68508 0.137441 2.4685C0.047111 2.25193 0.000405392 2.01966 0 1.785C0 1.3111 0.189 0.8575 0.5271 0.5229C0.86582 0.187711 1.32317 -0.000209447 1.7997 1.75185e-07C2.2771 1.75185e-07 2.7349 0.1883 3.073 0.5229C3.4104 0.8575 3.6001 1.3111 3.6001 1.785Z"
                                              fill="#757F8F" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a class="bg-gray-400 h-12 group  w-12 hover:bg-blue-600 transition duration-500 flex items-center justify-center rounded-full"
                                   href="#">
                                    <svg width="10" height="14" viewBox="0 0 10 14" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path class="group-hover:fill-white"
                                              d="M9.2754 0.393359C9.2754 0.290253 9.23444 0.19137 9.16154 0.118463C9.08863 0.0455561 8.98975 0.00459735 8.88664 0.00459735H6.94283C5.96403 -0.0441604 5.00571 0.296473 4.27727 0.95207C3.54883 1.60767 3.10948 2.52493 3.05522 3.50345V5.60276H1.11142C1.00831 5.60276 0.909429 5.64372 0.836522 5.71662C0.763615 5.78953 0.722656 5.88841 0.722656 5.99152V8.01308C0.722656 8.11618 0.763615 8.21507 0.836522 8.28797C0.909429 8.36088 1.00831 8.40184 1.11142 8.40184H3.05522V13.6112C3.05522 13.7143 3.09618 13.8132 3.16909 13.8861C3.242 13.959 3.34088 14 3.44398 14H5.77655C5.87966 14 5.97854 13.959 6.05145 13.8861C6.12435 13.8132 6.16531 13.7143 6.16531 13.6112V8.40184H8.20242C8.28887 8.40308 8.37327 8.37547 8.44227 8.32337C8.51127 8.27126 8.56094 8.19765 8.58341 8.11416L9.14322 6.0926C9.15869 6.03516 9.16077 5.97493 9.1493 5.91656C9.13783 5.85819 9.11312 5.80323 9.07707 5.75591C9.04101 5.70859 8.99458 5.67018 8.94135 5.64362C8.88812 5.61707 8.8295 5.60309 8.77001 5.60276H6.16531V3.50345C6.18465 3.31099 6.27503 3.13266 6.4188 3.00326C6.56257 2.87387 6.74941 2.80271 6.94283 2.80368H8.88664C8.98975 2.80368 9.08863 2.76272 9.16154 2.68981C9.23444 2.61691 9.2754 2.51802 9.2754 2.41492V0.393359Z"
                                              fill="#757F8F" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a class="bg-gray-400 h-12 group  w-12 hover:bg-blue-600 transition duration-500 flex items-center justify-center rounded-full"
                                   href="#">
                                    <svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path class="group-hover:fill-white"
                                              d="M17.6102 1.66066C16.9769 1.94128 16.2966 2.1309 15.5813 2.2166C16.3193 1.77503 16.8714 1.08003 17.1346 0.261302C16.4413 0.673137 15.6825 0.963023 14.8911 1.11836C14.359 0.550172 13.6541 0.173569 12.886 0.0470186C12.1179 -0.0795316 11.3295 0.0510517 10.6432 0.418495C9.9569 0.785938 9.41111 1.36968 9.09057 2.0791C8.77003 2.78852 8.69267 3.58391 8.8705 4.3418C7.4656 4.27126 6.09123 3.90611 4.83659 3.27003C3.58194 2.63395 2.47507 1.74117 1.58779 0.649633C1.28441 1.17297 1.10996 1.77973 1.10996 2.42594C1.10963 3.00767 1.25288 3.58049 1.52702 4.09358C1.80117 4.60667 2.19771 5.04416 2.68149 5.36724C2.12044 5.34938 1.57177 5.19778 1.08114 4.92506V4.97056C1.08109 5.78647 1.36331 6.57726 1.87994 7.20877C2.39656 7.84027 3.11576 8.27359 3.9155 8.43519C3.39503 8.57605 2.84936 8.5968 2.3197 8.49587C2.54534 9.19791 2.98487 9.81181 3.57675 10.2516C4.16862 10.6915 4.88323 10.9352 5.62051 10.9487C4.36893 11.9312 2.82323 12.4642 1.23208 12.4618C0.950219 12.4619 0.6686 12.4455 0.388672 12.4125C2.00379 13.451 3.8839 14.0021 5.80406 14C12.304 14 15.8574 8.61647 15.8574 3.9474C15.8574 3.79571 15.8536 3.6425 15.8468 3.49081C16.538 2.99097 17.1346 2.37201 17.6087 1.66293L17.6102 1.66066Z"
                                              fill="#757F8F" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-span-6">
                    <div class="contact-box  p-10">
                        <h3 class="text-black-200 font-medium md:text-3xl text-2xl mb-4">Get In Touch</h3>
                        <p>Latter trumpet you doing come way. Interaction apartment, times poured pass were century didn't
                            may his they talking broad.
                        </p>
                    </div>
                    <div class="contact-forms  bg-white shadow-4xl p-10">
                        <form action="{{ route('main.contact.store') }}" method="post">
                            @csrf
                            <div class="grid md:grid-cols-2 gap-4">
                                <div class="flex-col">
                                    <input
                                        class=" appearance-none border rounded w-full py-3 px-3 bg-white  placeholder-blue-50 leading-tight focus:outline-blue-600 focus:shadow-outline"
                                        id="text" type="text" name="name" value="{{ old('name') }}" placeholder="Your Name*" required>

                                    @if ($errors->has('name'))
                                        <span style="color: red;"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="flex-col">
                                    <input
                                        class=" appearance-none border rounded w-full py-3 px-3 bg-white  placeholder-blue-50 leading-tight focus:outline-blue-500 focus:shadow-outline"
                                        id="tel" type="tel" name="phone" value="{{ old('phone') }}" placeholder="Your Phone*" >

                                </div>
                            </div>
                            <div class="grid-grid-cols-1 mt-4">
                                <div class="flex-col">
                                    <input
                                        class=" appearance-none border rounded w-full py-3 px-3 bg-white  placeholder-blue-50 leading-tight focus:outline-blue-500 focus:shadow-outline"
                                        id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Your Email*" required>

                                    @if ($errors->has('email'))
                                        <span style="color: red;"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="grid-grid-cols-1 mt-4">
                                <div class="flex-col">
                              <textarea
                                  class=" arifText appearance-none border rounded w-full py-3 px-3 bg-white  placeholder-blue-600 leading-tight focus:outline-blue-500 focus:shadow-outline" placeholder="Message" cols="30" name="message" rows="6"> {{old('message')}}</textarea>

                                    @if ($errors->has('message'))
                                        <span style="color: red;"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('message') }}</span>
                                    @endif
                                </div>
                                <div class="contact-button mt-4 text-end">
                                    <button type="submit"
                                            class="bg-blue-600 py-4 px-12 hover:bg-black-200 w-full md:w-auto text-center hover:text-white transition duration-500 rounded-md text-white inline-block">Send
                                        Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  ====================== Contact  Area End =============================  -->
    <!--  ====================== Map  Area Start =============================  -->
    <div class="map-area">
        <p><iframe class="max-h-[500px]"
                   src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.1583091352!2d-74.11976373946234!3d40.69766374859258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1664023853454!5m2!1sen!2sbd"
                   width="100%" height="630" style="border:0;" allowfullscreen="" loading="lazy"
                   referrerpolicy="no-referrer-when-downgrade"></iframe></p>
    </div>
    <!--  ====================== Map  Area End =============================  -->
@endsection
