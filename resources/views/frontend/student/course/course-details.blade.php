@extends('layouts.frontEndMaster')
@section('title','Course Details')
@section('content')

    <!--  ====================== Hero  Area Start =============================  -->
    <div class="hero-area pt-20 xl:pt-28 mb-6">
        <div class="container">
            <div class="lg:grid lg:grid-cols-12 flex flex-col gap-12 lg:gap-0">
                <div class="col-span-8 lg:pr-20">
                    <div class="hero-content " data-animation="fadeInUp" data-delay="300">
                        <h1 class="font-serif !leading-tight text-4xl lg:text-6xl text-black-200 font-medium mb-6">
                            {{ $course->title }}
                        </h1>
                        <div class="author flex items-center">
                            <a href="{{ route('main.instructorWiseCourses', $course->instructor->slug) }}">
                                <img class="w-10 h-10 rounded-full object-fit"
                                     src="{{getImageFile($course->instructor->user ? @$course->instructor->user->image : '')}}"
                                     alt="author">

                            </a>
                            <div class="course-content ml-2">
                                <h6 class="font-serif text-base text-black-200 hover:text-blue-800 font-medium duration-300">
                                    <a href="{{ route('main.instructorWiseCourses', $course->instructor->slug)}}">{{$course->instructor ? $course->instructor->name : '' }}</a>
                                </h6>
                                <p class="text-sm  font-normal opacity-60">Instructor</p>
                            </div>
                        </div>
                        <div class="author-rating pt-6 flex mb-6">
                            <div class="rating-box flex items-center mr-6">
                           <span class="rating-icon">
                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                   xmlns="http://www.w3.org/2000/svg">
                                 <path
                                     d="M0.473842 5.4298L4.86876 4.79107L6.83341 0.808118C6.88707 0.699068 6.97535 0.610788 7.0844 0.557128C7.35789 0.422113 7.69024 0.534626 7.82699 0.808118L9.79163 4.79107L14.1866 5.4298C14.3077 5.44711 14.4185 5.50423 14.5033 5.59078C14.6059 5.69617 14.6624 5.83796 14.6604 5.98499C14.6585 6.13202 14.5982 6.27227 14.4929 6.37491L11.3132 9.47507L12.0644 13.8527C12.082 13.9545 12.0707 14.0592 12.0319 14.155C11.993 14.2508 11.9281 14.3337 11.8444 14.3944C11.7608 14.4552 11.6619 14.4913 11.5588 14.4986C11.4557 14.5059 11.3526 14.4843 11.2612 14.436L7.3302 12.3692L3.39918 14.436C3.29186 14.4931 3.16722 14.5122 3.04779 14.4914C2.7466 14.4395 2.54408 14.1539 2.59601 13.8527L3.34725 9.47507L0.167461 6.37491C0.0809124 6.29009 0.0237907 6.17931 0.00648106 6.05814C-0.040255 5.75522 0.170923 5.4748 0.473842 5.4298Z"
                                     fill="#FFA800"/>
                              </svg>
                           </span>
                                <span class="px-1">5.0</span>
                                <span class="rating-number  opacity-60">({{$total_reviews}} reviews)</span>
                            </div>

                            <div class="student-box flex items-center mr-6">
                           <span class="student-icon">
                              <svg width="15" height="17" viewBox="0 0 15 17" fill="none"
                                   xmlns="http://www.w3.org/2000/svg">
                                 <path
                                     d="M7.35625 6.9C8.71625 6.9 9.80425 5.82 9.80425 4.5C9.80425 3.18 8.71625 2.1 7.35625 2.1C5.99625 2.1 4.90825 3.18 4.90825 4.5C4.90825 5.82 5.99625 6.9 7.35625 6.9ZM7.35625 8.5C5.11625 8.5 3.30825 6.708 3.30825 4.5C3.30825 2.292 5.11625 0.5 7.35625 0.5C9.59625 0.5 11.4042 2.292 11.4042 4.5C11.4042 6.708 9.59625 8.5 7.35625 8.5ZM1.75625 14.9H12.9562V13.836C12.9562 12.436 11.1082 10.988 7.35625 10.988C3.60425 10.988 1.75625 12.436 1.75625 13.836V14.9ZM7.35625 9.388C12.6842 9.388 14.5562 12.052 14.5562 13.836V16.5H0.15625V13.836C0.15625 12.052 2.02825 9.388 7.35625 9.388Z"
                                     fill="#5A5A5B"/>
                              </svg>
                           </span>
                                <span class="student-number  opacity-60 pl-1">{{$total_enrolled_students}} students
                           </span>
                            </div>
                        </div>
                        <div class="nav-bottom-area border-t py-6  header-area left-0 right-0 top-0">
                            <ul class="flex flex-wrap nav-link-wrap navbar-nav gap-4">
                                <li class="inline-block relative  active"><a
                                        class=" inline-block   hover:text-blue-600 transition duration-500"
                                        href="#overview">Overview</a></li>
                                <li class="inline-block relative"><a
                                        class="inline-block relative hover:text-blue-600 transition duration-500"
                                        href="#course-curricullam">Curriculum</a></li>
                                <li class="inline-block relative"><a
                                        class="  inline-block hover:text-blue-600 transition duration-500"
                                        href="#resources">Resources</a></li>
                                <li class="inline-block relative"><a
                                        class="  inline-block hover:text-blue-600 transition duration-500"
                                        href="#quiz">Quiz</a></li>
                                <li class="inline-block relative"><a
                                        class="  inline-block hover:text-blue-600 transition duration-500"
                                        href="#assignment">Assignment</a></li>
                                <li class="inline-block relative"><a
                                        class="  inline-block hover:text-blue-600 transition duration-500"
                                        href="#live-class">Live Class</a></li>
                                <li class="inline-block relative"><a
                                        class="  inline-block  hover:text-blue-600 transition duration-500"
                                        href="#discussion">Discussion</a></li>
                                <li class="inline-block relative"><a
                                        class="  inline-block hover:text-blue-600 transition duration-500"
                                        href="#review">Review</a></li>
                            </ul>
                        </div>

                        {{--OVERVIEW SECTION START--}}
                        <section class="learning-box mt-8 pt-8" id="overview">
                            <div class="learning-title">
                                <h2 class="text-2xl md:text-3xl font-serif !leading-tight text-black-200 font-normal pb-10 ">
                                    What will be learned
                                </h2>
                            </div>
                            @if(count($course->keyPoints) > 0)
                                <div class="md:grid md:grid-cols-2 flex flex-col gap-6 pb-16">
                                    <div class="flex-col flex gap-6">
                                        @foreach(@$course->keyPoints as $key => $point)
                                            @if($key % 2 == 0)
                                                <div class="learn-item flex">
                                                    <div class="lern-item-icon mr-4 ">
                                    <span
                                        class="bg-blue-800 bg-opacity-10 h-8 w-8 flex items-center justify-center rounded-full">
                                       <svg width="26" height="22" viewBox="0 0 26 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                          <g filter="url(#filter0_d_646_4180)">
                                             <path d="M5 9L11 15L21 3" stroke="#1650B7" stroke-width="2"
                                                   stroke-linecap="round" stroke-linejoin="round"
                                                   shape-rendering="crispEdges"/>
                                          </g>
                                          <defs>
                                             <filter id="filter0_d_646_4180" x="0" y="0" width="26" height="22"
                                                     filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                <feColorMatrix in="SourceAlpha" type="matrix"
                                                               values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                               result="hardAlpha"/>
                                                <feOffset dy="2"/>
                                                <feGaussianBlur stdDeviation="2"/>
                                                <feComposite in2="hardAlpha" operator="out"/>
                                                <feColorMatrix type="matrix"
                                                               values="0 0 0 0 0.0666667 0 0 0 0 0.337255 0 0 0 0 0.866667 0 0 0 0.4 0"/>
                                                <feBlend mode="normal" in2="BackgroundImageFix"
                                                         result="effect1_dropShadow_646_4180"/>
                                                <feBlend mode="normal" in="SourceGraphic"
                                                         in2="effect1_dropShadow_646_4180" result="shape"/>
                                             </filter>
                                          </defs>
                                       </svg>
                                    </span>
                                                    </div>
                                                    <p class=" text-sm">
                                                        {{ $point->name }}
                                                    </p>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="flex-col flex gap-6">
                                        @foreach(@$course->keyPoints as $key=> $point)
                                            @if($key % 2 == 1)
                                                <div class="learn-item flex">
                                                    <div class="lern-item-icon mr-4 ">
                                    <span
                                        class="bg-blue-800 bg-opacity-10 h-8 w-8 flex items-center justify-center rounded-full">
                                       <svg width="26" height="22" viewBox="0 0 26 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                          <g filter="url(#filter0_d_646_4180)">
                                             <path d="M5 9L11 15L21 3" stroke="#1650B7" stroke-width="2"
                                                   stroke-linecap="round" stroke-linejoin="round"
                                                   shape-rendering="crispEdges"/>
                                          </g>
                                          <defs>
                                             <filter id="filter0_d_646_4180" x="0" y="0" width="26" height="22"
                                                     filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                <feColorMatrix in="SourceAlpha" type="matrix"
                                                               values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                               result="hardAlpha"/>
                                                <feOffset dy="2"/>
                                                <feGaussianBlur stdDeviation="2"/>
                                                <feComposite in2="hardAlpha" operator="out"/>
                                                <feColorMatrix type="matrix"
                                                               values="0 0 0 0 0.0666667 0 0 0 0 0.337255 0 0 0 0 0.866667 0 0 0 0.4 0"/>
                                                <feBlend mode="normal" in2="BackgroundImageFix"
                                                         result="effect1_dropShadow_646_4180"/>
                                                <feBlend mode="normal" in="SourceGraphic"
                                                         in2="effect1_dropShadow_646_4180" result="shape"/>
                                             </filter>
                                          </defs>
                                       </svg>
                                    </span>
                                                    </div>
                                                    <p class=" text-sm">
                                                        {{ $point->name }}
                                                    </p>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <p class=" text-sm">{{ $course->description }}</p>
                        </section>
                        {{--OVERVIEW SECTION END--}}


                        {{--CURRICULAR SECTION START--}}
                        <section class="curricullam-box mt-20 pt-20" id="course-curricullam">
                            <div class="learning-title">
                                <h2 class="text-2xl md:text-3xl font-serif !leading-tight text-black-200 font-normal pb-10 ">
                                    Course Curricullam
                                </h2>
                            </div>
                            @if(sizeof($lessons)>0)
                                @php
                                    $total_lesson = sizeof($lessons);
                                @endphp

                                @for($i = 0; $i < $total_lesson; $i++)
                                    <div id="accordion-collapse" data-accordion="collapse">

                                        <div class="accordion-collapse-item border-b ">
                                            <h2 id="accordion-collapse-heading-{{$i}}">
                                                <button type="button"
                                                        class="!bg-transparent text-black-200 flex items-center justify-between w-full p-5 font-medium text-left"
                                                        data-accordion-target="#accordion-collapse-body-{{$i}}"
                                                        aria-expanded="false"
                                                        aria-controls="accordion-collapse-body-{{$i}}">
                                                    <span class="text-black-200 font-bold">{{$lessons[$i]->name}}</span>
                                                    <svg data-accordion-icon="" class="w-4 h-4 rotate-180 shrink-0"
                                                         width="16"
                                                         height="8" viewBox="0 0 16 8" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M15 7L8 1L1 7" stroke="#5A5A5B" stroke-width="2"
                                                              stroke-linecap="round"
                                                              stroke-linejoin="round"/>
                                                    </svg>
                                                </button>
                                            </h2>

                                            @php
                                                $data['lectures'] = \App\Models\CourseLecture::where('lesson_id', $lessons[$i]->id)->get();
                                            @endphp


                                            <div id="accordion-collapse-body-{{$i}}"
                                                 aria-labelledby="accordion-collapse-heading-{{$i}}"
                                                 class="hidden">
                                                <div class="p-5">

                                                    @foreach($data['lectures'] as $lecture)

                                                        <div
                                                            class="curricullam-accordion-box flex justify-between mb-6">
                                                            <div class="flex-col  ">
                                                                <div class="course-play flex items-center">
                                                                    <p class="mr-4">
                                                                        <svg width="16" height="16" viewBox="0 0 16 16"
                                                                             fill="none"
                                                                             xmlns="http://www.w3.org/2000/svg">
                                                                            <rect width="16" height="16" rx="8"
                                                                                  fill="#5A5A5B"/>
                                                                            <path
                                                                                d="M10.25 7.56698C10.5833 7.75943 10.5833 8.24055 10.25 8.433L5.75 11.0311C5.41667 11.2235 5 10.983 5 10.5981V5.40191C5 5.01701 5.41667 4.77645 5.75 4.9689L10.25 7.56698Z"
                                                                                fill="white"/>
                                                                        </svg>
                                                                    </p>
                                                                    {{$lecture->title}}
                                                                </div>
                                                            </div>
                                                            <div class="flex-col gap-2">
                                                                <div class="preview-box flex items-center">

                                                                    @if($lecture->type == 'youtube')
                                                                        <a class="popup-youtube pr-10 hover:text-blue-800  underline "
                                                                           href="{{$lecture->url_path}}">Preview</a>

                                                                    @elseif($lecture->type == 'video')
                                                                        <video class="videoPlayer" id="myVideo"
                                                                               controls controlsList="nodownload"
                                                                               style="margin: 15px; width:80%; top: 0px;">
                                                                            <source class="xdPlayer lectureVideo"
                                                                                    src="{{ getVideoFile($lecture->file_path) }}"
                                                                                    type="video/mp4">
                                                                        </video>
                                                                    @endif

                                                                    <p class="">{{$lecture->file_duration}}</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor

                        </section>
                        {{--CURRICULAR SECTION END--}}
                        @endif
                        {{--RESOURCES SECTION START--}}
                        <section class="resources   mt-20 pt-20" id="resources">
                            {{--Resource Heading--}}
                            <div class="learning-title">
                                <h2 class="text-2xl md:text-3xl font-serif !leading-tight text-black-200 font-normal pb-10 ">
                                    Resources
                                </h2>
                            </div>

                            {{--Resource Details--}}

                            <div class="md:grid md:grid-cols-2 flex flex-col gap-6">
                                <div class="flex-col">
                                    <div class="instructor-profile shadow-3xl rounded bg-white p-5">
                                        <div class="profile-info flex gap-3 items-center mb-8">
                                            {{--<div class="flex-col">
                                                <a href="{{route('main.instructorWiseCourses', $course->instructor->uuid)}}"><img class="w-16 h-16 rounded-full" src="{{getImageFile($instructor->user ? @$instructor->user->image : '')}}"
                                                                                                                                  alt="images"></a>
                                            </div>--}}
                                            {{--<div class="flex-col">
                                                <div class="profile-name ">
                                                    <p class="text-blue-600 mb-1">Instructor</p>
                                                    <h6><a class="text-black-200 hover:text-blue-600 font-medium transition duration-500"
                                                           href="{{route('main.instructorWiseCourses', $course->instructor->uuid)}}">{{$course->instructor ? $course->instructor->name : '' }} </a>
                                                    </h6>
                                                </div>
                                            </div>--}}
                                        </div>
                                        <div class="info-instructor flex justify-between mb-5">
                                            <div class="flex gap-4 items-center">
                                       <span>
                                          <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                               xmlns="http://www.w3.org/2000/svg">
                                             <path
                                                 d="M1 2.88037C1.885 2.51037 3.154 2.11137 4.388 1.98737C5.718 1.85337 6.846 2.05037 7.5 2.73937V12.4854C6.565 11.9554 5.38 11.8824 4.287 11.9924C3.107 12.1124 1.917 12.4534 1 12.8034V2.88037ZM8.5 2.73937C9.154 2.05037 10.282 1.85337 11.612 1.98737C12.846 2.11137 14.115 2.51037 15 2.88037V12.8034C14.082 12.4534 12.893 12.1114 11.713 11.9934C10.619 11.8824 9.435 11.9544 8.5 12.4854V2.73937ZM8 1.83537C7.015 0.988371 5.587 0.862371 4.287 0.992371C2.773 1.14537 1.245 1.66437 0.293 2.09737C0.205649 2.1371 0.131575 2.20112 0.079621 2.2818C0.0276667 2.36248 2.65714e-05 2.45641 0 2.55237V13.5524C2.3162e-05 13.636 0.0210371 13.7183 0.0611171 13.7918C0.101197 13.8652 0.159062 13.9274 0.229411 13.9727C0.29976 14.018 0.380345 14.0449 0.463783 14.0509C0.547222 14.057 0.630848 14.042 0.707 14.0074C1.589 13.6074 3.01 13.1264 4.387 12.9874C5.796 12.8454 6.977 13.0744 7.61 13.8644C7.65685 13.9228 7.71622 13.9699 7.78372 14.0023C7.85122 14.0347 7.92513 14.0515 8 14.0515C8.07487 14.0515 8.14878 14.0347 8.21628 14.0023C8.28378 13.9699 8.34315 13.9228 8.39 13.8644C9.023 13.0744 10.204 12.8454 11.612 12.9874C12.99 13.1264 14.412 13.6074 15.293 14.0074C15.3692 14.042 15.4528 14.057 15.5362 14.0509C15.6197 14.0449 15.7002 14.018 15.7706 13.9727C15.8409 13.9274 15.8988 13.8652 15.9389 13.7918C15.979 13.7183 16 13.636 16 13.5524V2.55237C16 2.45641 15.9723 2.36248 15.9204 2.2818C15.8684 2.20112 15.7944 2.1371 15.707 2.09737C14.755 1.66437 13.227 1.14537 11.713 0.992371C10.413 0.861371 8.985 0.988371 8 1.83537Z"
                                                 fill="#757F8F"/>
                                          </svg>
                                       </span>
                                                <span>Category</span>
                                            </div>
                                            <div class="flex-col">UI UX Designer</div>
                                        </div>
                                        <div class="info-instructor flex justify-between mb-5">
                                            <div class="flex gap-4 items-center">
                                       <span>
                                          <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                               xmlns="http://www.w3.org/2000/svg">
                                             <path
                                                 d="M0.541534 5.63406L5.5643 4.90408L7.80961 0.352135C7.87094 0.227506 7.97183 0.126615 8.09646 0.0652895C8.40902 -0.0890138 8.78885 0.0395723 8.94513 0.352135L11.1904 4.90408L16.2132 5.63406C16.3517 5.65384 16.4783 5.71912 16.5752 5.81803C16.6924 5.93848 16.757 6.10053 16.7548 6.26856C16.7525 6.4366 16.6837 6.59688 16.5634 6.71418L12.9293 10.2572L13.7879 15.2602C13.808 15.3766 13.7951 15.4963 13.7507 15.6057C13.7063 15.7151 13.6321 15.8099 13.5365 15.8794C13.4409 15.9488 13.3278 15.99 13.21 15.9984C13.0922 16.0068 12.9744 15.982 12.87 15.9269L8.37737 13.5648L3.88477 15.9269C3.76212 15.9922 3.61969 16.0139 3.48319 15.9902C3.13897 15.9308 2.90752 15.6044 2.96686 15.2602L3.82542 10.2572L0.191384 6.71418C0.0924713 6.61724 0.0271894 6.49064 0.00740693 6.35216C-0.0460057 6.00597 0.19534 5.68549 0.541534 5.63406Z"
                                                 fill="#FFA800"/>
                                          </svg>
                                       </span>
                                                <span> Rating</span>
                                            </div>
                                            <div class="flex-col">5.0</div>
                                        </div>
                                        <div class="info-instructor flex justify-between mb-5">
                                            <div class="flex gap-4 items-center">
                                       <span>
                                          <svg width="15" height="16" viewBox="0 0 15 16" fill="none"
                                               xmlns="http://www.w3.org/2000/svg">
                                             <path
                                                 d="M7.48062 0C7.096 0 6.71385 0.129231 6.38462 0.365539L5.36554 1.07692L4.19138 1.23077H4.17231L4.15323 1.24985C3.76815 1.33681 3.41559 1.53113 3.13644 1.81028C2.85728 2.08944 2.66296 2.44199 2.576 2.82708L2.55754 2.84615V2.86523L2.40369 4.05785L1.69231 4.98092L1.67262 5V5.01908C1.24246 5.70646 1.22338 6.59385 1.69231 7.24985L2.42277 8.26892L2.61538 9.32738L0.634462 12.3458L0 13.2886H2.94215L3.65354 14.9422L4.096 16L4.73046 15.0382L6.67262 12.1151C7.19446 12.3292 7.78338 12.3489 8.28862 12.1151L10.2308 15.0382L10.8652 16L11.3077 14.9422L12.0191 13.2886H14.9612L14.3268 12.3458L12.4037 9.42338L12.5575 8.26954L13.2689 7.25046L13.2886 7.23139V7.21231C13.7188 6.52492 13.7378 5.65662 13.2689 5.00062L12.5575 3.98092L12.3268 2.82708H12.3458C12.3434 2.81231 12.3292 2.80246 12.3268 2.78831C12.216 1.98338 11.5791 1.32985 10.7692 1.23077H10.7495L9.59569 1.07692L8.57662 0.365539C8.25834 0.13238 7.87513 0.00457143 7.48062 0ZM7.48062 1.24985C7.62215 1.24985 7.76185 1.29292 7.86523 1.36554L8.96123 2.15385L9.096 2.24985L9.24985 2.26954L10.5963 2.46154H10.6148C10.8917 2.49231 11.0837 2.68492 11.1151 2.96185V3L11.3655 4.36554L11.384 4.50031L11.4806 4.61538L12.2689 5.71138C12.416 5.91569 12.4351 6.26215 12.2498 6.55754L11.3846 7.76923L11.3649 7.92308L11.1729 9.26954V9.288C11.1627 9.38417 11.1298 9.47655 11.0769 9.55754L11.0382 9.57723V9.59569C10.9467 9.70554 10.8155 9.77478 10.6732 9.78831H10.6345L9.23077 10.0388L9.07692 10.0572L8.96123 10.1538L7.86523 10.9422C7.66092 11.0892 7.29538 11.1083 7 10.9231L6 10.1538L5.88431 10.0578L5.71138 10.0382L4.36492 9.84615H4.34646C4.25945 9.83847 4.17556 9.80998 4.10187 9.76306C4.02818 9.71615 3.96686 9.6522 3.92308 9.57662C3.88218 9.50565 3.85602 9.42716 3.84615 9.34585V9.30769L3.59631 7.904L3.57662 7.75015L3.48062 7.63446L2.69231 6.53846C2.54523 6.33415 2.52615 5.96862 2.71138 5.67323L3.48062 4.67323L3.57662 4.55754L3.59569 4.38462L3.76923 3.096C3.77169 3.08677 3.78585 3.08677 3.78831 3.07692C3.82667 2.92878 3.90396 2.79361 4.01217 2.6854C4.12037 2.57719 4.25555 2.4999 4.40369 2.46154C4.41354 2.45908 4.41354 2.44492 4.42277 2.44246L5.71138 2.26892L5.86523 2.25046L6 2.15385L7.096 1.36554C7.19939 1.29354 7.33908 1.24985 7.48062 1.24985ZM11.7305 10.6154L12.6732 12.0578H11.1914L11.0375 12.4425L10.6148 13.4228L9.30708 11.4228L9.59508 11.2117L10.8074 11V11.0191C10.8215 11.0166 10.8308 11.0025 10.8455 11C11.1694 10.9533 11.4754 10.8204 11.7305 10.6154ZM3.23077 10.6345C3.49798 10.8774 3.83368 11.0319 4.192 11.0769H4.21108L5.38462 11.2308L5.65354 11.4425L4.34585 13.4228L3.92308 12.4425L3.76923 12.0578H2.28862L3.23077 10.6345Z"
                                                 fill="#757F8F"/>
                                          </svg>
                                       </span>
                                                <span> Review</span>
                                            </div>
                                            <div class="flex-col">542</div>
                                        </div>
                                        <div class="info-instructor flex justify-between mb-5">
                                            <div class="flex gap-4 items-center">
                                       <span>
                                          <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                               xmlns="http://www.w3.org/2000/svg">
                                             <path
                                                 d="M16.3161 3.13618L8.4806 0.524348C8.37976 0.491884 8.27128 0.491884 8.17045 0.524348L0.343109 3.13618H0.326785L0.269651 3.16883H0.261489L0.204355 3.20148C0.204355 3.20364 0.203496 3.20572 0.201965 3.20725C0.200434 3.20878 0.198358 3.20964 0.196193 3.20964L0.13906 3.25861L0.0982499 3.30758C0.0982499 3.30975 0.0973899 3.31182 0.0958593 3.31335C0.0943286 3.31488 0.0922525 3.31574 0.0900878 3.31574L0.05744 3.37288C0.05744 3.38104 0.049278 3.38104 0.049278 3.3892L0.0247919 3.44634C0.0146361 3.46664 0.00906363 3.48893 0.00846807 3.51163C0.00177975 3.53551 -0.000976986 3.56032 0.000306059 3.58509V10.1147C0.000306059 10.2446 0.0519012 10.3691 0.143741 10.461C0.235581 10.5528 0.360143 10.6044 0.490025 10.6044C0.619906 10.6044 0.744468 10.5528 0.836308 10.461C0.928148 10.3691 0.979743 10.2446 0.979743 10.1147V4.27886L4.13843 5.33175C3.56685 6.16847 3.26235 7.15881 3.2651 8.17212C3.26568 9.0868 3.51417 9.98422 3.98414 10.7689C4.4541 11.5536 5.12797 12.1963 5.93406 12.6286C4.27285 13.1755 2.84773 14.2724 1.89388 15.7383C1.85851 15.7924 1.83415 15.853 1.82219 15.9165C1.81022 15.9801 1.81089 16.0453 1.82415 16.1086C1.83742 16.1719 1.86302 16.232 1.89949 16.2853C1.93596 16.3387 1.98259 16.3844 2.03672 16.4198C2.09085 16.4552 2.15141 16.4795 2.21496 16.4915C2.2785 16.5035 2.34378 16.5028 2.40706 16.4895C2.47035 16.4763 2.5304 16.4507 2.5838 16.4142C2.63719 16.3777 2.68287 16.3311 2.71824 16.277C3.32494 15.3421 4.15572 14.5738 5.13503 14.0419C6.11434 13.51 7.21109 13.2314 8.32552 13.2314C9.43996 13.2314 10.5367 13.51 11.516 14.0419C12.4953 14.5738 13.3261 15.3421 13.9328 16.277C13.9796 16.3442 14.0418 16.3993 14.1142 16.4376C14.1866 16.4759 14.2671 16.4964 14.3491 16.4973C14.4425 16.498 14.5338 16.4694 14.6102 16.4157C14.6644 16.3809 14.7112 16.3358 14.7479 16.2829C14.7846 16.23 14.8105 16.1704 14.8242 16.1075C14.8378 16.0445 14.8389 15.9795 14.8274 15.9162C14.8159 15.8528 14.7921 15.7924 14.7572 15.7383C13.8033 14.2724 12.3782 13.1755 10.717 12.6286C11.5231 12.1963 12.1969 11.5536 12.6669 10.7689C13.1369 9.98422 13.3854 9.0868 13.386 8.17212C13.3887 7.15881 13.0842 6.16847 12.5126 5.33175L16.3161 4.06665C16.4141 4.03444 16.4994 3.97213 16.5599 3.88859C16.6203 3.80505 16.6529 3.70455 16.6529 3.60141C16.6529 3.49828 16.6203 3.39778 16.5599 3.31424C16.4994 3.2307 16.4141 3.16838 16.3161 3.13618ZM12.4065 8.17212C12.4063 8.82211 12.2508 9.46265 11.9531 10.0404C11.6553 10.6182 11.2238 11.1165 10.6945 11.4938C10.1653 11.8711 9.55355 12.1165 8.91027 12.2097C8.26699 12.3028 7.61076 12.2409 6.99622 12.0292C6.38168 11.8175 5.8266 11.462 5.37719 10.9925C4.92778 10.5229 4.59703 9.95273 4.41248 9.32949C4.22793 8.70625 4.19492 8.04794 4.3162 7.40937C4.43747 6.77079 4.70952 6.17042 5.1097 5.65823L8.17045 6.67848C8.27128 6.71094 8.37976 6.71094 8.4806 6.67848L11.5413 5.65823C12.1 6.37734 12.4043 7.2615 12.4065 8.17212ZM8.32552 5.69904L2.0408 3.60141L8.32552 1.50378L14.6102 3.60141L8.32552 5.69904Z"
                                                 fill="#757F8F"/>
                                          </svg>
                                       </span>
                                                <span> Student</span>
                                            </div>
                                            <div class="flex-col">1200</div>
                                        </div>
                                        <div class="info-instructor flex justify-between mb-5">
                                            <div class="flex gap-4 items-center">
                                       <span>
                                          <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                               xmlns="http://www.w3.org/2000/svg">
                                             <rect y="0.5" width="16" height="16" rx="8" fill="#757F8F"/>
                                             <path
                                                 d="M10.25 8.06722C10.5833 8.25967 10.5833 8.7408 10.25 8.93325L5.75 11.5313C5.41667 11.7238 5 11.4832 5 11.0983V5.90216C5 5.51726 5.41667 5.2767 5.75 5.46915L10.25 8.06722Z"
                                                 fill="white"/>
                                          </svg>
                                       </span>
                                                <span> Course </span>
                                            </div>
                                            <div class="flex-col">20</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-col">
                                    <div class="about-instructor">
                                        <h4 class="text-lg text-black-200 mb-4 font-medium">About Instructor</h4>
                                        <p class="mb-3">
                                            {{ $course->instructor ? $course->instructor->about_me : '' }}
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </section>
                        {{--RESOURCES SECTION END--}}

                        {{--QUIZ SECTION START--}}
                        <section class="quiz mt-20 pt-20" id="quiz">
                            <div class="learning-title">
                                <h2 class="text-2xl md:text-3xl font-serif !leading-tight text-black-200 font-normal pb-10 ">
                                    Quiz
                                </h2>
                            </div>
                            <div class="md:grid md:grid-cols-2 flex flex-col gap-6">
                                <div class="flex-col">
                                    <div class="instructor-profile shadow-3xl rounded bg-white p-5">
                                        <div class="profile-info flex gap-3 items-center mb-8">
                                            {{--<div class="flex-col">
                                                <a href="{{route('main.instructorWiseCourses', $course->instructor->uuid)}}"><img class="w-16 h-16 rounded-full" src="{{getImageFile($instructor->user ? @$instructor->user->image : '')}}"
                                                                                                                                  alt="images"></a>
                                            </div>--}}
                                            {{--<div class="flex-col">
                                                <div class="profile-name ">
                                                    <p class="text-blue-600 mb-1">Instructor</p>
                                                    <h6><a class="text-black-200 hover:text-blue-600 font-medium transition duration-500"
                                                           href="{{route('main.instructorWiseCourses', $course->instructor->uuid)}}">{{$course->instructor ? $course->instructor->name : '' }} </a>
                                                    </h6>
                                                </div>
                                            </div>--}}
                                        </div>
                                        <div class="info-instructor flex justify-between mb-5">
                                            <div class="flex gap-4 items-center">
                                       <span>
                                          <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                               xmlns="http://www.w3.org/2000/svg">
                                             <path
                                                 d="M1 2.88037C1.885 2.51037 3.154 2.11137 4.388 1.98737C5.718 1.85337 6.846 2.05037 7.5 2.73937V12.4854C6.565 11.9554 5.38 11.8824 4.287 11.9924C3.107 12.1124 1.917 12.4534 1 12.8034V2.88037ZM8.5 2.73937C9.154 2.05037 10.282 1.85337 11.612 1.98737C12.846 2.11137 14.115 2.51037 15 2.88037V12.8034C14.082 12.4534 12.893 12.1114 11.713 11.9934C10.619 11.8824 9.435 11.9544 8.5 12.4854V2.73937ZM8 1.83537C7.015 0.988371 5.587 0.862371 4.287 0.992371C2.773 1.14537 1.245 1.66437 0.293 2.09737C0.205649 2.1371 0.131575 2.20112 0.079621 2.2818C0.0276667 2.36248 2.65714e-05 2.45641 0 2.55237V13.5524C2.3162e-05 13.636 0.0210371 13.7183 0.0611171 13.7918C0.101197 13.8652 0.159062 13.9274 0.229411 13.9727C0.29976 14.018 0.380345 14.0449 0.463783 14.0509C0.547222 14.057 0.630848 14.042 0.707 14.0074C1.589 13.6074 3.01 13.1264 4.387 12.9874C5.796 12.8454 6.977 13.0744 7.61 13.8644C7.65685 13.9228 7.71622 13.9699 7.78372 14.0023C7.85122 14.0347 7.92513 14.0515 8 14.0515C8.07487 14.0515 8.14878 14.0347 8.21628 14.0023C8.28378 13.9699 8.34315 13.9228 8.39 13.8644C9.023 13.0744 10.204 12.8454 11.612 12.9874C12.99 13.1264 14.412 13.6074 15.293 14.0074C15.3692 14.042 15.4528 14.057 15.5362 14.0509C15.6197 14.0449 15.7002 14.018 15.7706 13.9727C15.8409 13.9274 15.8988 13.8652 15.9389 13.7918C15.979 13.7183 16 13.636 16 13.5524V2.55237C16 2.45641 15.9723 2.36248 15.9204 2.2818C15.8684 2.20112 15.7944 2.1371 15.707 2.09737C14.755 1.66437 13.227 1.14537 11.713 0.992371C10.413 0.861371 8.985 0.988371 8 1.83537Z"
                                                 fill="#757F8F"/>
                                          </svg>
                                       </span>
                                                <span>Category</span>
                                            </div>
                                            <div class="flex-col">UI UX Designer</div>
                                        </div>
                                        <div class="info-instructor flex justify-between mb-5">
                                            <div class="flex gap-4 items-center">
                                       <span>
                                          <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                               xmlns="http://www.w3.org/2000/svg">
                                             <path
                                                 d="M0.541534 5.63406L5.5643 4.90408L7.80961 0.352135C7.87094 0.227506 7.97183 0.126615 8.09646 0.0652895C8.40902 -0.0890138 8.78885 0.0395723 8.94513 0.352135L11.1904 4.90408L16.2132 5.63406C16.3517 5.65384 16.4783 5.71912 16.5752 5.81803C16.6924 5.93848 16.757 6.10053 16.7548 6.26856C16.7525 6.4366 16.6837 6.59688 16.5634 6.71418L12.9293 10.2572L13.7879 15.2602C13.808 15.3766 13.7951 15.4963 13.7507 15.6057C13.7063 15.7151 13.6321 15.8099 13.5365 15.8794C13.4409 15.9488 13.3278 15.99 13.21 15.9984C13.0922 16.0068 12.9744 15.982 12.87 15.9269L8.37737 13.5648L3.88477 15.9269C3.76212 15.9922 3.61969 16.0139 3.48319 15.9902C3.13897 15.9308 2.90752 15.6044 2.96686 15.2602L3.82542 10.2572L0.191384 6.71418C0.0924713 6.61724 0.0271894 6.49064 0.00740693 6.35216C-0.0460057 6.00597 0.19534 5.68549 0.541534 5.63406Z"
                                                 fill="#FFA800"/>
                                          </svg>
                                       </span>
                                                <span> Rating</span>
                                            </div>
                                            <div class="flex-col">5.0</div>
                                        </div>
                                        <div class="info-instructor flex justify-between mb-5">
                                            <div class="flex gap-4 items-center">
                                       <span>
                                          <svg width="15" height="16" viewBox="0 0 15 16" fill="none"
                                               xmlns="http://www.w3.org/2000/svg">
                                             <path
                                                 d="M7.48062 0C7.096 0 6.71385 0.129231 6.38462 0.365539L5.36554 1.07692L4.19138 1.23077H4.17231L4.15323 1.24985C3.76815 1.33681 3.41559 1.53113 3.13644 1.81028C2.85728 2.08944 2.66296 2.44199 2.576 2.82708L2.55754 2.84615V2.86523L2.40369 4.05785L1.69231 4.98092L1.67262 5V5.01908C1.24246 5.70646 1.22338 6.59385 1.69231 7.24985L2.42277 8.26892L2.61538 9.32738L0.634462 12.3458L0 13.2886H2.94215L3.65354 14.9422L4.096 16L4.73046 15.0382L6.67262 12.1151C7.19446 12.3292 7.78338 12.3489 8.28862 12.1151L10.2308 15.0382L10.8652 16L11.3077 14.9422L12.0191 13.2886H14.9612L14.3268 12.3458L12.4037 9.42338L12.5575 8.26954L13.2689 7.25046L13.2886 7.23139V7.21231C13.7188 6.52492 13.7378 5.65662 13.2689 5.00062L12.5575 3.98092L12.3268 2.82708H12.3458C12.3434 2.81231 12.3292 2.80246 12.3268 2.78831C12.216 1.98338 11.5791 1.32985 10.7692 1.23077H10.7495L9.59569 1.07692L8.57662 0.365539C8.25834 0.13238 7.87513 0.00457143 7.48062 0ZM7.48062 1.24985C7.62215 1.24985 7.76185 1.29292 7.86523 1.36554L8.96123 2.15385L9.096 2.24985L9.24985 2.26954L10.5963 2.46154H10.6148C10.8917 2.49231 11.0837 2.68492 11.1151 2.96185V3L11.3655 4.36554L11.384 4.50031L11.4806 4.61538L12.2689 5.71138C12.416 5.91569 12.4351 6.26215 12.2498 6.55754L11.3846 7.76923L11.3649 7.92308L11.1729 9.26954V9.288C11.1627 9.38417 11.1298 9.47655 11.0769 9.55754L11.0382 9.57723V9.59569C10.9467 9.70554 10.8155 9.77478 10.6732 9.78831H10.6345L9.23077 10.0388L9.07692 10.0572L8.96123 10.1538L7.86523 10.9422C7.66092 11.0892 7.29538 11.1083 7 10.9231L6 10.1538L5.88431 10.0578L5.71138 10.0382L4.36492 9.84615H4.34646C4.25945 9.83847 4.17556 9.80998 4.10187 9.76306C4.02818 9.71615 3.96686 9.6522 3.92308 9.57662C3.88218 9.50565 3.85602 9.42716 3.84615 9.34585V9.30769L3.59631 7.904L3.57662 7.75015L3.48062 7.63446L2.69231 6.53846C2.54523 6.33415 2.52615 5.96862 2.71138 5.67323L3.48062 4.67323L3.57662 4.55754L3.59569 4.38462L3.76923 3.096C3.77169 3.08677 3.78585 3.08677 3.78831 3.07692C3.82667 2.92878 3.90396 2.79361 4.01217 2.6854C4.12037 2.57719 4.25555 2.4999 4.40369 2.46154C4.41354 2.45908 4.41354 2.44492 4.42277 2.44246L5.71138 2.26892L5.86523 2.25046L6 2.15385L7.096 1.36554C7.19939 1.29354 7.33908 1.24985 7.48062 1.24985ZM11.7305 10.6154L12.6732 12.0578H11.1914L11.0375 12.4425L10.6148 13.4228L9.30708 11.4228L9.59508 11.2117L10.8074 11V11.0191C10.8215 11.0166 10.8308 11.0025 10.8455 11C11.1694 10.9533 11.4754 10.8204 11.7305 10.6154ZM3.23077 10.6345C3.49798 10.8774 3.83368 11.0319 4.192 11.0769H4.21108L5.38462 11.2308L5.65354 11.4425L4.34585 13.4228L3.92308 12.4425L3.76923 12.0578H2.28862L3.23077 10.6345Z"
                                                 fill="#757F8F"/>
                                          </svg>
                                       </span>
                                                <span> Review</span>
                                            </div>
                                            <div class="flex-col">542</div>
                                        </div>
                                        <div class="info-instructor flex justify-between mb-5">
                                            <div class="flex gap-4 items-center">
                                       <span>
                                          <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                               xmlns="http://www.w3.org/2000/svg">
                                             <path
                                                 d="M16.3161 3.13618L8.4806 0.524348C8.37976 0.491884 8.27128 0.491884 8.17045 0.524348L0.343109 3.13618H0.326785L0.269651 3.16883H0.261489L0.204355 3.20148C0.204355 3.20364 0.203496 3.20572 0.201965 3.20725C0.200434 3.20878 0.198358 3.20964 0.196193 3.20964L0.13906 3.25861L0.0982499 3.30758C0.0982499 3.30975 0.0973899 3.31182 0.0958593 3.31335C0.0943286 3.31488 0.0922525 3.31574 0.0900878 3.31574L0.05744 3.37288C0.05744 3.38104 0.049278 3.38104 0.049278 3.3892L0.0247919 3.44634C0.0146361 3.46664 0.00906363 3.48893 0.00846807 3.51163C0.00177975 3.53551 -0.000976986 3.56032 0.000306059 3.58509V10.1147C0.000306059 10.2446 0.0519012 10.3691 0.143741 10.461C0.235581 10.5528 0.360143 10.6044 0.490025 10.6044C0.619906 10.6044 0.744468 10.5528 0.836308 10.461C0.928148 10.3691 0.979743 10.2446 0.979743 10.1147V4.27886L4.13843 5.33175C3.56685 6.16847 3.26235 7.15881 3.2651 8.17212C3.26568 9.0868 3.51417 9.98422 3.98414 10.7689C4.4541 11.5536 5.12797 12.1963 5.93406 12.6286C4.27285 13.1755 2.84773 14.2724 1.89388 15.7383C1.85851 15.7924 1.83415 15.853 1.82219 15.9165C1.81022 15.9801 1.81089 16.0453 1.82415 16.1086C1.83742 16.1719 1.86302 16.232 1.89949 16.2853C1.93596 16.3387 1.98259 16.3844 2.03672 16.4198C2.09085 16.4552 2.15141 16.4795 2.21496 16.4915C2.2785 16.5035 2.34378 16.5028 2.40706 16.4895C2.47035 16.4763 2.5304 16.4507 2.5838 16.4142C2.63719 16.3777 2.68287 16.3311 2.71824 16.277C3.32494 15.3421 4.15572 14.5738 5.13503 14.0419C6.11434 13.51 7.21109 13.2314 8.32552 13.2314C9.43996 13.2314 10.5367 13.51 11.516 14.0419C12.4953 14.5738 13.3261 15.3421 13.9328 16.277C13.9796 16.3442 14.0418 16.3993 14.1142 16.4376C14.1866 16.4759 14.2671 16.4964 14.3491 16.4973C14.4425 16.498 14.5338 16.4694 14.6102 16.4157C14.6644 16.3809 14.7112 16.3358 14.7479 16.2829C14.7846 16.23 14.8105 16.1704 14.8242 16.1075C14.8378 16.0445 14.8389 15.9795 14.8274 15.9162C14.8159 15.8528 14.7921 15.7924 14.7572 15.7383C13.8033 14.2724 12.3782 13.1755 10.717 12.6286C11.5231 12.1963 12.1969 11.5536 12.6669 10.7689C13.1369 9.98422 13.3854 9.0868 13.386 8.17212C13.3887 7.15881 13.0842 6.16847 12.5126 5.33175L16.3161 4.06665C16.4141 4.03444 16.4994 3.97213 16.5599 3.88859C16.6203 3.80505 16.6529 3.70455 16.6529 3.60141C16.6529 3.49828 16.6203 3.39778 16.5599 3.31424C16.4994 3.2307 16.4141 3.16838 16.3161 3.13618ZM12.4065 8.17212C12.4063 8.82211 12.2508 9.46265 11.9531 10.0404C11.6553 10.6182 11.2238 11.1165 10.6945 11.4938C10.1653 11.8711 9.55355 12.1165 8.91027 12.2097C8.26699 12.3028 7.61076 12.2409 6.99622 12.0292C6.38168 11.8175 5.8266 11.462 5.37719 10.9925C4.92778 10.5229 4.59703 9.95273 4.41248 9.32949C4.22793 8.70625 4.19492 8.04794 4.3162 7.40937C4.43747 6.77079 4.70952 6.17042 5.1097 5.65823L8.17045 6.67848C8.27128 6.71094 8.37976 6.71094 8.4806 6.67848L11.5413 5.65823C12.1 6.37734 12.4043 7.2615 12.4065 8.17212ZM8.32552 5.69904L2.0408 3.60141L8.32552 1.50378L14.6102 3.60141L8.32552 5.69904Z"
                                                 fill="#757F8F"/>
                                          </svg>
                                       </span>
                                                <span> Student</span>
                                            </div>
                                            <div class="flex-col">1200</div>
                                        </div>
                                        <div class="info-instructor flex justify-between mb-5">
                                            <div class="flex gap-4 items-center">
                                       <span>
                                          <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                               xmlns="http://www.w3.org/2000/svg">
                                             <rect y="0.5" width="16" height="16" rx="8" fill="#757F8F"/>
                                             <path
                                                 d="M10.25 8.06722C10.5833 8.25967 10.5833 8.7408 10.25 8.93325L5.75 11.5313C5.41667 11.7238 5 11.4832 5 11.0983V5.90216C5 5.51726 5.41667 5.2767 5.75 5.46915L10.25 8.06722Z"
                                                 fill="white"/>
                                          </svg>
                                       </span>
                                                <span> Course </span>
                                            </div>
                                            <div class="flex-col">20</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-col">
                                    <div class="about-instructor">
                                        <h4 class="text-lg text-black-200 mb-4 font-medium">About Instructor</h4>
                                        <p class="mb-3">
                                            {{ $course->instructor ? $course->instructor->about_me : '' }}
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </section>
                        {{--QUIZ SECTION END--}}

                        {{--ASSIGNMENT SECTION START--}}
                        <section class="assignment mt-20 pt-20" id="assignment">
                            <div class="learning-title">
                                <h2 class="text-2xl md:text-3xl font-serif !leading-tight text-black-200 font-normal pb-10 ">
                                    Assignment
                                </h2>
                            </div>
                            <div class="md:grid md:grid-cols-2 flex flex-col gap-6">
                                <div class="flex-col">
                                    <div class="instructor-profile shadow-3xl rounded bg-white p-5">
                                        <div class="profile-info flex gap-3 items-center mb-8">
                                            {{--<div class="flex-col">
                                                <a href="{{route('main.instructorWiseCourses', $course->instructor->uuid)}}"><img class="w-16 h-16 rounded-full" src="{{getImageFile($instructor->user ? @$instructor->user->image : '')}}"
                                                                                                                                  alt="images"></a>
                                            </div>--}}
                                            {{--<div class="flex-col">
                                                <div class="profile-name ">
                                                    <p class="text-blue-600 mb-1">Instructor</p>
                                                    <h6><a class="text-black-200 hover:text-blue-600 font-medium transition duration-500"
                                                           href="{{route('main.instructorWiseCourses', $course->instructor->uuid)}}">{{$course->instructor ? $course->instructor->name : '' }} </a>
                                                    </h6>
                                                </div>
                                            </div>--}}
                                        </div>
                                        <div class="info-instructor flex justify-between mb-5">
                                            <div class="flex gap-4 items-center">
                                       <span>
                                          <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                               xmlns="http://www.w3.org/2000/svg">
                                             <path
                                                 d="M1 2.88037C1.885 2.51037 3.154 2.11137 4.388 1.98737C5.718 1.85337 6.846 2.05037 7.5 2.73937V12.4854C6.565 11.9554 5.38 11.8824 4.287 11.9924C3.107 12.1124 1.917 12.4534 1 12.8034V2.88037ZM8.5 2.73937C9.154 2.05037 10.282 1.85337 11.612 1.98737C12.846 2.11137 14.115 2.51037 15 2.88037V12.8034C14.082 12.4534 12.893 12.1114 11.713 11.9934C10.619 11.8824 9.435 11.9544 8.5 12.4854V2.73937ZM8 1.83537C7.015 0.988371 5.587 0.862371 4.287 0.992371C2.773 1.14537 1.245 1.66437 0.293 2.09737C0.205649 2.1371 0.131575 2.20112 0.079621 2.2818C0.0276667 2.36248 2.65714e-05 2.45641 0 2.55237V13.5524C2.3162e-05 13.636 0.0210371 13.7183 0.0611171 13.7918C0.101197 13.8652 0.159062 13.9274 0.229411 13.9727C0.29976 14.018 0.380345 14.0449 0.463783 14.0509C0.547222 14.057 0.630848 14.042 0.707 14.0074C1.589 13.6074 3.01 13.1264 4.387 12.9874C5.796 12.8454 6.977 13.0744 7.61 13.8644C7.65685 13.9228 7.71622 13.9699 7.78372 14.0023C7.85122 14.0347 7.92513 14.0515 8 14.0515C8.07487 14.0515 8.14878 14.0347 8.21628 14.0023C8.28378 13.9699 8.34315 13.9228 8.39 13.8644C9.023 13.0744 10.204 12.8454 11.612 12.9874C12.99 13.1264 14.412 13.6074 15.293 14.0074C15.3692 14.042 15.4528 14.057 15.5362 14.0509C15.6197 14.0449 15.7002 14.018 15.7706 13.9727C15.8409 13.9274 15.8988 13.8652 15.9389 13.7918C15.979 13.7183 16 13.636 16 13.5524V2.55237C16 2.45641 15.9723 2.36248 15.9204 2.2818C15.8684 2.20112 15.7944 2.1371 15.707 2.09737C14.755 1.66437 13.227 1.14537 11.713 0.992371C10.413 0.861371 8.985 0.988371 8 1.83537Z"
                                                 fill="#757F8F"/>
                                          </svg>
                                       </span>
                                                <span>Category</span>
                                            </div>
                                            <div class="flex-col">UI UX Designer</div>
                                        </div>
                                        <div class="info-instructor flex justify-between mb-5">
                                            <div class="flex gap-4 items-center">
                                       <span>
                                          <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                               xmlns="http://www.w3.org/2000/svg">
                                             <path
                                                 d="M0.541534 5.63406L5.5643 4.90408L7.80961 0.352135C7.87094 0.227506 7.97183 0.126615 8.09646 0.0652895C8.40902 -0.0890138 8.78885 0.0395723 8.94513 0.352135L11.1904 4.90408L16.2132 5.63406C16.3517 5.65384 16.4783 5.71912 16.5752 5.81803C16.6924 5.93848 16.757 6.10053 16.7548 6.26856C16.7525 6.4366 16.6837 6.59688 16.5634 6.71418L12.9293 10.2572L13.7879 15.2602C13.808 15.3766 13.7951 15.4963 13.7507 15.6057C13.7063 15.7151 13.6321 15.8099 13.5365 15.8794C13.4409 15.9488 13.3278 15.99 13.21 15.9984C13.0922 16.0068 12.9744 15.982 12.87 15.9269L8.37737 13.5648L3.88477 15.9269C3.76212 15.9922 3.61969 16.0139 3.48319 15.9902C3.13897 15.9308 2.90752 15.6044 2.96686 15.2602L3.82542 10.2572L0.191384 6.71418C0.0924713 6.61724 0.0271894 6.49064 0.00740693 6.35216C-0.0460057 6.00597 0.19534 5.68549 0.541534 5.63406Z"
                                                 fill="#FFA800"/>
                                          </svg>
                                       </span>
                                                <span> Rating</span>
                                            </div>
                                            <div class="flex-col">5.0</div>
                                        </div>
                                        <div class="info-instructor flex justify-between mb-5">
                                            <div class="flex gap-4 items-center">
                                       <span>
                                          <svg width="15" height="16" viewBox="0 0 15 16" fill="none"
                                               xmlns="http://www.w3.org/2000/svg">
                                             <path
                                                 d="M7.48062 0C7.096 0 6.71385 0.129231 6.38462 0.365539L5.36554 1.07692L4.19138 1.23077H4.17231L4.15323 1.24985C3.76815 1.33681 3.41559 1.53113 3.13644 1.81028C2.85728 2.08944 2.66296 2.44199 2.576 2.82708L2.55754 2.84615V2.86523L2.40369 4.05785L1.69231 4.98092L1.67262 5V5.01908C1.24246 5.70646 1.22338 6.59385 1.69231 7.24985L2.42277 8.26892L2.61538 9.32738L0.634462 12.3458L0 13.2886H2.94215L3.65354 14.9422L4.096 16L4.73046 15.0382L6.67262 12.1151C7.19446 12.3292 7.78338 12.3489 8.28862 12.1151L10.2308 15.0382L10.8652 16L11.3077 14.9422L12.0191 13.2886H14.9612L14.3268 12.3458L12.4037 9.42338L12.5575 8.26954L13.2689 7.25046L13.2886 7.23139V7.21231C13.7188 6.52492 13.7378 5.65662 13.2689 5.00062L12.5575 3.98092L12.3268 2.82708H12.3458C12.3434 2.81231 12.3292 2.80246 12.3268 2.78831C12.216 1.98338 11.5791 1.32985 10.7692 1.23077H10.7495L9.59569 1.07692L8.57662 0.365539C8.25834 0.13238 7.87513 0.00457143 7.48062 0ZM7.48062 1.24985C7.62215 1.24985 7.76185 1.29292 7.86523 1.36554L8.96123 2.15385L9.096 2.24985L9.24985 2.26954L10.5963 2.46154H10.6148C10.8917 2.49231 11.0837 2.68492 11.1151 2.96185V3L11.3655 4.36554L11.384 4.50031L11.4806 4.61538L12.2689 5.71138C12.416 5.91569 12.4351 6.26215 12.2498 6.55754L11.3846 7.76923L11.3649 7.92308L11.1729 9.26954V9.288C11.1627 9.38417 11.1298 9.47655 11.0769 9.55754L11.0382 9.57723V9.59569C10.9467 9.70554 10.8155 9.77478 10.6732 9.78831H10.6345L9.23077 10.0388L9.07692 10.0572L8.96123 10.1538L7.86523 10.9422C7.66092 11.0892 7.29538 11.1083 7 10.9231L6 10.1538L5.88431 10.0578L5.71138 10.0382L4.36492 9.84615H4.34646C4.25945 9.83847 4.17556 9.80998 4.10187 9.76306C4.02818 9.71615 3.96686 9.6522 3.92308 9.57662C3.88218 9.50565 3.85602 9.42716 3.84615 9.34585V9.30769L3.59631 7.904L3.57662 7.75015L3.48062 7.63446L2.69231 6.53846C2.54523 6.33415 2.52615 5.96862 2.71138 5.67323L3.48062 4.67323L3.57662 4.55754L3.59569 4.38462L3.76923 3.096C3.77169 3.08677 3.78585 3.08677 3.78831 3.07692C3.82667 2.92878 3.90396 2.79361 4.01217 2.6854C4.12037 2.57719 4.25555 2.4999 4.40369 2.46154C4.41354 2.45908 4.41354 2.44492 4.42277 2.44246L5.71138 2.26892L5.86523 2.25046L6 2.15385L7.096 1.36554C7.19939 1.29354 7.33908 1.24985 7.48062 1.24985ZM11.7305 10.6154L12.6732 12.0578H11.1914L11.0375 12.4425L10.6148 13.4228L9.30708 11.4228L9.59508 11.2117L10.8074 11V11.0191C10.8215 11.0166 10.8308 11.0025 10.8455 11C11.1694 10.9533 11.4754 10.8204 11.7305 10.6154ZM3.23077 10.6345C3.49798 10.8774 3.83368 11.0319 4.192 11.0769H4.21108L5.38462 11.2308L5.65354 11.4425L4.34585 13.4228L3.92308 12.4425L3.76923 12.0578H2.28862L3.23077 10.6345Z"
                                                 fill="#757F8F"/>
                                          </svg>
                                       </span>
                                                <span> Review</span>
                                            </div>
                                            <div class="flex-col">542</div>
                                        </div>
                                        <div class="info-instructor flex justify-between mb-5">
                                            <div class="flex gap-4 items-center">
                                       <span>
                                          <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                               xmlns="http://www.w3.org/2000/svg">
                                             <path
                                                 d="M16.3161 3.13618L8.4806 0.524348C8.37976 0.491884 8.27128 0.491884 8.17045 0.524348L0.343109 3.13618H0.326785L0.269651 3.16883H0.261489L0.204355 3.20148C0.204355 3.20364 0.203496 3.20572 0.201965 3.20725C0.200434 3.20878 0.198358 3.20964 0.196193 3.20964L0.13906 3.25861L0.0982499 3.30758C0.0982499 3.30975 0.0973899 3.31182 0.0958593 3.31335C0.0943286 3.31488 0.0922525 3.31574 0.0900878 3.31574L0.05744 3.37288C0.05744 3.38104 0.049278 3.38104 0.049278 3.3892L0.0247919 3.44634C0.0146361 3.46664 0.00906363 3.48893 0.00846807 3.51163C0.00177975 3.53551 -0.000976986 3.56032 0.000306059 3.58509V10.1147C0.000306059 10.2446 0.0519012 10.3691 0.143741 10.461C0.235581 10.5528 0.360143 10.6044 0.490025 10.6044C0.619906 10.6044 0.744468 10.5528 0.836308 10.461C0.928148 10.3691 0.979743 10.2446 0.979743 10.1147V4.27886L4.13843 5.33175C3.56685 6.16847 3.26235 7.15881 3.2651 8.17212C3.26568 9.0868 3.51417 9.98422 3.98414 10.7689C4.4541 11.5536 5.12797 12.1963 5.93406 12.6286C4.27285 13.1755 2.84773 14.2724 1.89388 15.7383C1.85851 15.7924 1.83415 15.853 1.82219 15.9165C1.81022 15.9801 1.81089 16.0453 1.82415 16.1086C1.83742 16.1719 1.86302 16.232 1.89949 16.2853C1.93596 16.3387 1.98259 16.3844 2.03672 16.4198C2.09085 16.4552 2.15141 16.4795 2.21496 16.4915C2.2785 16.5035 2.34378 16.5028 2.40706 16.4895C2.47035 16.4763 2.5304 16.4507 2.5838 16.4142C2.63719 16.3777 2.68287 16.3311 2.71824 16.277C3.32494 15.3421 4.15572 14.5738 5.13503 14.0419C6.11434 13.51 7.21109 13.2314 8.32552 13.2314C9.43996 13.2314 10.5367 13.51 11.516 14.0419C12.4953 14.5738 13.3261 15.3421 13.9328 16.277C13.9796 16.3442 14.0418 16.3993 14.1142 16.4376C14.1866 16.4759 14.2671 16.4964 14.3491 16.4973C14.4425 16.498 14.5338 16.4694 14.6102 16.4157C14.6644 16.3809 14.7112 16.3358 14.7479 16.2829C14.7846 16.23 14.8105 16.1704 14.8242 16.1075C14.8378 16.0445 14.8389 15.9795 14.8274 15.9162C14.8159 15.8528 14.7921 15.7924 14.7572 15.7383C13.8033 14.2724 12.3782 13.1755 10.717 12.6286C11.5231 12.1963 12.1969 11.5536 12.6669 10.7689C13.1369 9.98422 13.3854 9.0868 13.386 8.17212C13.3887 7.15881 13.0842 6.16847 12.5126 5.33175L16.3161 4.06665C16.4141 4.03444 16.4994 3.97213 16.5599 3.88859C16.6203 3.80505 16.6529 3.70455 16.6529 3.60141C16.6529 3.49828 16.6203 3.39778 16.5599 3.31424C16.4994 3.2307 16.4141 3.16838 16.3161 3.13618ZM12.4065 8.17212C12.4063 8.82211 12.2508 9.46265 11.9531 10.0404C11.6553 10.6182 11.2238 11.1165 10.6945 11.4938C10.1653 11.8711 9.55355 12.1165 8.91027 12.2097C8.26699 12.3028 7.61076 12.2409 6.99622 12.0292C6.38168 11.8175 5.8266 11.462 5.37719 10.9925C4.92778 10.5229 4.59703 9.95273 4.41248 9.32949C4.22793 8.70625 4.19492 8.04794 4.3162 7.40937C4.43747 6.77079 4.70952 6.17042 5.1097 5.65823L8.17045 6.67848C8.27128 6.71094 8.37976 6.71094 8.4806 6.67848L11.5413 5.65823C12.1 6.37734 12.4043 7.2615 12.4065 8.17212ZM8.32552 5.69904L2.0408 3.60141L8.32552 1.50378L14.6102 3.60141L8.32552 5.69904Z"
                                                 fill="#757F8F"/>
                                          </svg>
                                       </span>
                                                <span> Student</span>
                                            </div>
                                            <div class="flex-col">1200</div>
                                        </div>
                                        <div class="info-instructor flex justify-between mb-5">
                                            <div class="flex gap-4 items-center">
                                       <span>
                                          <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                               xmlns="http://www.w3.org/2000/svg">
                                             <rect y="0.5" width="16" height="16" rx="8" fill="#757F8F"/>
                                             <path
                                                 d="M10.25 8.06722C10.5833 8.25967 10.5833 8.7408 10.25 8.93325L5.75 11.5313C5.41667 11.7238 5 11.4832 5 11.0983V5.90216C5 5.51726 5.41667 5.2767 5.75 5.46915L10.25 8.06722Z"
                                                 fill="white"/>
                                          </svg>
                                       </span>
                                                <span> Course </span>
                                            </div>
                                            <div class="flex-col">20</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-col">
                                    <div class="about-instructor">
                                        <h4 class="text-lg text-black-200 mb-4 font-medium">About Instructor</h4>
                                        <p class="mb-3">
                                            {{ $course->instructor ? $course->instructor->about_me : '' }}
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </section>
                        {{--ASSIGNMENT SECTION END--}}

                        {{--LIVE CLASS SECTION START--}}
                        <section class="live-class mt-20 pt-20" id="live-class">
                            <div class="learning-title">
                                <h2 class="text-2xl md:text-3xl font-serif !leading-tight text-black-200 font-normal pb-10 ">
                                    Live Class
                                </h2>
                            </div>
                            <div class="md:grid md:grid-cols-2 flex flex-col gap-6">
                                <div class="flex-col">
                                    <div class="instructor-profile shadow-3xl rounded bg-white p-5">
                                        <div class="profile-info flex gap-3 items-center mb-8">
                                            {{--<div class="flex-col">
                                                <a href="{{route('main.instructorWiseCourses', $course->instructor->uuid)}}"><img class="w-16 h-16 rounded-full" src="{{getImageFile($instructor->user ? @$instructor->user->image : '')}}"
                                                                                                                                  alt="images"></a>
                                            </div>--}}
                                            {{--<div class="flex-col">
                                                <div class="profile-name ">
                                                    <p class="text-blue-600 mb-1">Instructor</p>
                                                    <h6><a class="text-black-200 hover:text-blue-600 font-medium transition duration-500"
                                                           href="{{route('main.instructorWiseCourses', $course->instructor->uuid)}}">{{$course->instructor ? $course->instructor->name : '' }} </a>
                                                    </h6>
                                                </div>
                                            </div>--}}
                                        </div>
                                        <div class="info-instructor flex justify-between mb-5">
                                            <div class="flex gap-4 items-center">
                                       <span>
                                          <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                               xmlns="http://www.w3.org/2000/svg">
                                             <path
                                                 d="M1 2.88037C1.885 2.51037 3.154 2.11137 4.388 1.98737C5.718 1.85337 6.846 2.05037 7.5 2.73937V12.4854C6.565 11.9554 5.38 11.8824 4.287 11.9924C3.107 12.1124 1.917 12.4534 1 12.8034V2.88037ZM8.5 2.73937C9.154 2.05037 10.282 1.85337 11.612 1.98737C12.846 2.11137 14.115 2.51037 15 2.88037V12.8034C14.082 12.4534 12.893 12.1114 11.713 11.9934C10.619 11.8824 9.435 11.9544 8.5 12.4854V2.73937ZM8 1.83537C7.015 0.988371 5.587 0.862371 4.287 0.992371C2.773 1.14537 1.245 1.66437 0.293 2.09737C0.205649 2.1371 0.131575 2.20112 0.079621 2.2818C0.0276667 2.36248 2.65714e-05 2.45641 0 2.55237V13.5524C2.3162e-05 13.636 0.0210371 13.7183 0.0611171 13.7918C0.101197 13.8652 0.159062 13.9274 0.229411 13.9727C0.29976 14.018 0.380345 14.0449 0.463783 14.0509C0.547222 14.057 0.630848 14.042 0.707 14.0074C1.589 13.6074 3.01 13.1264 4.387 12.9874C5.796 12.8454 6.977 13.0744 7.61 13.8644C7.65685 13.9228 7.71622 13.9699 7.78372 14.0023C7.85122 14.0347 7.92513 14.0515 8 14.0515C8.07487 14.0515 8.14878 14.0347 8.21628 14.0023C8.28378 13.9699 8.34315 13.9228 8.39 13.8644C9.023 13.0744 10.204 12.8454 11.612 12.9874C12.99 13.1264 14.412 13.6074 15.293 14.0074C15.3692 14.042 15.4528 14.057 15.5362 14.0509C15.6197 14.0449 15.7002 14.018 15.7706 13.9727C15.8409 13.9274 15.8988 13.8652 15.9389 13.7918C15.979 13.7183 16 13.636 16 13.5524V2.55237C16 2.45641 15.9723 2.36248 15.9204 2.2818C15.8684 2.20112 15.7944 2.1371 15.707 2.09737C14.755 1.66437 13.227 1.14537 11.713 0.992371C10.413 0.861371 8.985 0.988371 8 1.83537Z"
                                                 fill="#757F8F"/>
                                          </svg>
                                       </span>
                                                <span>Category</span>
                                            </div>
                                            <div class="flex-col">UI UX Designer</div>
                                        </div>
                                        <div class="info-instructor flex justify-between mb-5">
                                            <div class="flex gap-4 items-center">
                                       <span>
                                          <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                               xmlns="http://www.w3.org/2000/svg">
                                             <path
                                                 d="M0.541534 5.63406L5.5643 4.90408L7.80961 0.352135C7.87094 0.227506 7.97183 0.126615 8.09646 0.0652895C8.40902 -0.0890138 8.78885 0.0395723 8.94513 0.352135L11.1904 4.90408L16.2132 5.63406C16.3517 5.65384 16.4783 5.71912 16.5752 5.81803C16.6924 5.93848 16.757 6.10053 16.7548 6.26856C16.7525 6.4366 16.6837 6.59688 16.5634 6.71418L12.9293 10.2572L13.7879 15.2602C13.808 15.3766 13.7951 15.4963 13.7507 15.6057C13.7063 15.7151 13.6321 15.8099 13.5365 15.8794C13.4409 15.9488 13.3278 15.99 13.21 15.9984C13.0922 16.0068 12.9744 15.982 12.87 15.9269L8.37737 13.5648L3.88477 15.9269C3.76212 15.9922 3.61969 16.0139 3.48319 15.9902C3.13897 15.9308 2.90752 15.6044 2.96686 15.2602L3.82542 10.2572L0.191384 6.71418C0.0924713 6.61724 0.0271894 6.49064 0.00740693 6.35216C-0.0460057 6.00597 0.19534 5.68549 0.541534 5.63406Z"
                                                 fill="#FFA800"/>
                                          </svg>
                                       </span>
                                                <span> Rating</span>
                                            </div>
                                            <div class="flex-col">5.0</div>
                                        </div>
                                        <div class="info-instructor flex justify-between mb-5">
                                            <div class="flex gap-4 items-center">
                                       <span>
                                          <svg width="15" height="16" viewBox="0 0 15 16" fill="none"
                                               xmlns="http://www.w3.org/2000/svg">
                                             <path
                                                 d="M7.48062 0C7.096 0 6.71385 0.129231 6.38462 0.365539L5.36554 1.07692L4.19138 1.23077H4.17231L4.15323 1.24985C3.76815 1.33681 3.41559 1.53113 3.13644 1.81028C2.85728 2.08944 2.66296 2.44199 2.576 2.82708L2.55754 2.84615V2.86523L2.40369 4.05785L1.69231 4.98092L1.67262 5V5.01908C1.24246 5.70646 1.22338 6.59385 1.69231 7.24985L2.42277 8.26892L2.61538 9.32738L0.634462 12.3458L0 13.2886H2.94215L3.65354 14.9422L4.096 16L4.73046 15.0382L6.67262 12.1151C7.19446 12.3292 7.78338 12.3489 8.28862 12.1151L10.2308 15.0382L10.8652 16L11.3077 14.9422L12.0191 13.2886H14.9612L14.3268 12.3458L12.4037 9.42338L12.5575 8.26954L13.2689 7.25046L13.2886 7.23139V7.21231C13.7188 6.52492 13.7378 5.65662 13.2689 5.00062L12.5575 3.98092L12.3268 2.82708H12.3458C12.3434 2.81231 12.3292 2.80246 12.3268 2.78831C12.216 1.98338 11.5791 1.32985 10.7692 1.23077H10.7495L9.59569 1.07692L8.57662 0.365539C8.25834 0.13238 7.87513 0.00457143 7.48062 0ZM7.48062 1.24985C7.62215 1.24985 7.76185 1.29292 7.86523 1.36554L8.96123 2.15385L9.096 2.24985L9.24985 2.26954L10.5963 2.46154H10.6148C10.8917 2.49231 11.0837 2.68492 11.1151 2.96185V3L11.3655 4.36554L11.384 4.50031L11.4806 4.61538L12.2689 5.71138C12.416 5.91569 12.4351 6.26215 12.2498 6.55754L11.3846 7.76923L11.3649 7.92308L11.1729 9.26954V9.288C11.1627 9.38417 11.1298 9.47655 11.0769 9.55754L11.0382 9.57723V9.59569C10.9467 9.70554 10.8155 9.77478 10.6732 9.78831H10.6345L9.23077 10.0388L9.07692 10.0572L8.96123 10.1538L7.86523 10.9422C7.66092 11.0892 7.29538 11.1083 7 10.9231L6 10.1538L5.88431 10.0578L5.71138 10.0382L4.36492 9.84615H4.34646C4.25945 9.83847 4.17556 9.80998 4.10187 9.76306C4.02818 9.71615 3.96686 9.6522 3.92308 9.57662C3.88218 9.50565 3.85602 9.42716 3.84615 9.34585V9.30769L3.59631 7.904L3.57662 7.75015L3.48062 7.63446L2.69231 6.53846C2.54523 6.33415 2.52615 5.96862 2.71138 5.67323L3.48062 4.67323L3.57662 4.55754L3.59569 4.38462L3.76923 3.096C3.77169 3.08677 3.78585 3.08677 3.78831 3.07692C3.82667 2.92878 3.90396 2.79361 4.01217 2.6854C4.12037 2.57719 4.25555 2.4999 4.40369 2.46154C4.41354 2.45908 4.41354 2.44492 4.42277 2.44246L5.71138 2.26892L5.86523 2.25046L6 2.15385L7.096 1.36554C7.19939 1.29354 7.33908 1.24985 7.48062 1.24985ZM11.7305 10.6154L12.6732 12.0578H11.1914L11.0375 12.4425L10.6148 13.4228L9.30708 11.4228L9.59508 11.2117L10.8074 11V11.0191C10.8215 11.0166 10.8308 11.0025 10.8455 11C11.1694 10.9533 11.4754 10.8204 11.7305 10.6154ZM3.23077 10.6345C3.49798 10.8774 3.83368 11.0319 4.192 11.0769H4.21108L5.38462 11.2308L5.65354 11.4425L4.34585 13.4228L3.92308 12.4425L3.76923 12.0578H2.28862L3.23077 10.6345Z"
                                                 fill="#757F8F"/>
                                          </svg>
                                       </span>
                                                <span> Review</span>
                                            </div>
                                            <div class="flex-col">542</div>
                                        </div>
                                        <div class="info-instructor flex justify-between mb-5">
                                            <div class="flex gap-4 items-center">
                                       <span>
                                          <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                               xmlns="http://www.w3.org/2000/svg">
                                             <path
                                                 d="M16.3161 3.13618L8.4806 0.524348C8.37976 0.491884 8.27128 0.491884 8.17045 0.524348L0.343109 3.13618H0.326785L0.269651 3.16883H0.261489L0.204355 3.20148C0.204355 3.20364 0.203496 3.20572 0.201965 3.20725C0.200434 3.20878 0.198358 3.20964 0.196193 3.20964L0.13906 3.25861L0.0982499 3.30758C0.0982499 3.30975 0.0973899 3.31182 0.0958593 3.31335C0.0943286 3.31488 0.0922525 3.31574 0.0900878 3.31574L0.05744 3.37288C0.05744 3.38104 0.049278 3.38104 0.049278 3.3892L0.0247919 3.44634C0.0146361 3.46664 0.00906363 3.48893 0.00846807 3.51163C0.00177975 3.53551 -0.000976986 3.56032 0.000306059 3.58509V10.1147C0.000306059 10.2446 0.0519012 10.3691 0.143741 10.461C0.235581 10.5528 0.360143 10.6044 0.490025 10.6044C0.619906 10.6044 0.744468 10.5528 0.836308 10.461C0.928148 10.3691 0.979743 10.2446 0.979743 10.1147V4.27886L4.13843 5.33175C3.56685 6.16847 3.26235 7.15881 3.2651 8.17212C3.26568 9.0868 3.51417 9.98422 3.98414 10.7689C4.4541 11.5536 5.12797 12.1963 5.93406 12.6286C4.27285 13.1755 2.84773 14.2724 1.89388 15.7383C1.85851 15.7924 1.83415 15.853 1.82219 15.9165C1.81022 15.9801 1.81089 16.0453 1.82415 16.1086C1.83742 16.1719 1.86302 16.232 1.89949 16.2853C1.93596 16.3387 1.98259 16.3844 2.03672 16.4198C2.09085 16.4552 2.15141 16.4795 2.21496 16.4915C2.2785 16.5035 2.34378 16.5028 2.40706 16.4895C2.47035 16.4763 2.5304 16.4507 2.5838 16.4142C2.63719 16.3777 2.68287 16.3311 2.71824 16.277C3.32494 15.3421 4.15572 14.5738 5.13503 14.0419C6.11434 13.51 7.21109 13.2314 8.32552 13.2314C9.43996 13.2314 10.5367 13.51 11.516 14.0419C12.4953 14.5738 13.3261 15.3421 13.9328 16.277C13.9796 16.3442 14.0418 16.3993 14.1142 16.4376C14.1866 16.4759 14.2671 16.4964 14.3491 16.4973C14.4425 16.498 14.5338 16.4694 14.6102 16.4157C14.6644 16.3809 14.7112 16.3358 14.7479 16.2829C14.7846 16.23 14.8105 16.1704 14.8242 16.1075C14.8378 16.0445 14.8389 15.9795 14.8274 15.9162C14.8159 15.8528 14.7921 15.7924 14.7572 15.7383C13.8033 14.2724 12.3782 13.1755 10.717 12.6286C11.5231 12.1963 12.1969 11.5536 12.6669 10.7689C13.1369 9.98422 13.3854 9.0868 13.386 8.17212C13.3887 7.15881 13.0842 6.16847 12.5126 5.33175L16.3161 4.06665C16.4141 4.03444 16.4994 3.97213 16.5599 3.88859C16.6203 3.80505 16.6529 3.70455 16.6529 3.60141C16.6529 3.49828 16.6203 3.39778 16.5599 3.31424C16.4994 3.2307 16.4141 3.16838 16.3161 3.13618ZM12.4065 8.17212C12.4063 8.82211 12.2508 9.46265 11.9531 10.0404C11.6553 10.6182 11.2238 11.1165 10.6945 11.4938C10.1653 11.8711 9.55355 12.1165 8.91027 12.2097C8.26699 12.3028 7.61076 12.2409 6.99622 12.0292C6.38168 11.8175 5.8266 11.462 5.37719 10.9925C4.92778 10.5229 4.59703 9.95273 4.41248 9.32949C4.22793 8.70625 4.19492 8.04794 4.3162 7.40937C4.43747 6.77079 4.70952 6.17042 5.1097 5.65823L8.17045 6.67848C8.27128 6.71094 8.37976 6.71094 8.4806 6.67848L11.5413 5.65823C12.1 6.37734 12.4043 7.2615 12.4065 8.17212ZM8.32552 5.69904L2.0408 3.60141L8.32552 1.50378L14.6102 3.60141L8.32552 5.69904Z"
                                                 fill="#757F8F"/>
                                          </svg>
                                       </span>
                                                <span> Student</span>
                                            </div>
                                            <div class="flex-col">1200</div>
                                        </div>
                                        <div class="info-instructor flex justify-between mb-5">
                                            <div class="flex gap-4 items-center">
                                       <span>
                                          <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                               xmlns="http://www.w3.org/2000/svg">
                                             <rect y="0.5" width="16" height="16" rx="8" fill="#757F8F"/>
                                             <path
                                                 d="M10.25 8.06722C10.5833 8.25967 10.5833 8.7408 10.25 8.93325L5.75 11.5313C5.41667 11.7238 5 11.4832 5 11.0983V5.90216C5 5.51726 5.41667 5.2767 5.75 5.46915L10.25 8.06722Z"
                                                 fill="white"/>
                                          </svg>
                                       </span>
                                                <span> Course </span>
                                            </div>
                                            <div class="flex-col">20</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-col">
                                    <div class="about-instructor">
                                        <h4 class="text-lg text-black-200 mb-4 font-medium">About Instructor</h4>
                                        <p class="mb-3">
                                            {{ $course->instructor ? $course->instructor->about_me : '' }}
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </section>
                        {{--LIVE CLASS SECTION END--}}

                        {{--DISCUSSION SECTION START--}}
                        <section class="discusssion-area mt-20 border-t pt-20" id="discussion">
                            <div class="discussion-title mb-10">
                                <h3 class="text-3xl font-medium text-black-200">Discussion your opinion</h3>
                            </div>
                            <div class="comments-box mb-9">
                                <div class="comments-history flex  gap-5">
                                    <div class="comments-man flex w-20">
                                        <img class="h-10 w-10 object-cover rounded-full"
                                             src="{{asset('frontend/assets/images/author/4.webp')}}"
                                             alt="images">
                                    </div>
                                    <div class="comments-wrap-box">
                                        <div class="comments-text-box bg-blue-400 p-4">
                                            <div class="flex gap-2 flex-wrap items-center">
                                                <span class="text-black-200 uppercase">Will Smith</span>
                                                <span>
                                             <svg width="7" height="8" viewBox="0 0 7 8" fill="none"
                                                  xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M0.109096 3.67271L2.70012 0.218192C2.75093 0.150445 2.81682 0.0954592 2.89256 0.0575878C2.9683 0.0197164 3.05182 0 3.13651 0C3.22119 0 3.30471 0.0197164 3.38045 0.0575878C3.45619 0.0954592 3.52208 0.150445 3.57289 0.218192L6.16392 3.67271C6.23473 3.76713 6.27301 3.88197 6.27301 4C6.27301 4.11803 6.23473 4.23287 6.16392 4.32729L3.57289 7.78181C3.52208 7.84955 3.45619 7.90454 3.38045 7.94241C3.30471 7.98028 3.22119 8 3.13651 8C3.05182 8 2.9683 7.98028 2.89256 7.94241C2.81682 7.90454 2.75093 7.84955 2.70012 7.78181L0.109096 4.32729C0.0382806 4.23287 0 4.11803 0 4C0 3.88197 0.0382806 3.76713 0.109096 3.67271Z"
                                                    fill="#223655"/>
                                             </svg>
                                          </span>
                                                <span class="text-fuchsia-900">DESIGNER</span>
                                                <span>
                                             <svg width="7" height="8" viewBox="0 0 7 8" fill="none"
                                                  xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M0.382533 3.67271L2.97356 0.218192C3.02437 0.150445 3.09026 0.0954592 3.166 0.0575878C3.24174 0.0197164 3.32526 0 3.40994 0C3.49463 0 3.57815 0.0197164 3.65389 0.0575878C3.72963 0.0954592 3.79552 0.150445 3.84633 0.218192L6.43735 3.67271C6.50817 3.76713 6.54645 3.88197 6.54645 4C6.54645 4.11803 6.50817 4.23287 6.43735 4.32729L3.84633 7.78181C3.79552 7.84955 3.72963 7.90454 3.65389 7.94241C3.57815 7.98028 3.49463 8 3.40994 8C3.32526 8 3.24174 7.98028 3.166 7.94241C3.09026 7.90454 3.02437 7.84955 2.97356 7.78181L0.382533 4.32729C0.311718 4.23287 0.273438 4.11803 0.273438 4C0.273438 3.88197 0.311718 3.76713 0.382533 3.67271Z"
                                                    fill="#223655"/>
                                             </svg>
                                          </span>
                                                <span class="text-blue-50">JUNE 11, 2022 AT 1:17 PM</span>
                                            </div>
                                            <p class="pt-4">Effortless comfortable full leather lining
                                                eye-catching unique detail to the toe low ‘cut-away’ sides clean
                                                and sleek.
                                            </p>
                                        </div>
                                        <div class="replay-box flex justify-between mt-2">
                                            <a class="text-black-200 hover:text-blue-600 transition duration-500"
                                               href="#">Reply</a>
                                            <div class="flex gap-2 items-center">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7 0C3.1402 0 0 2.5123 0 5.6C0 7.6356 1.3286 9.4605 3.5 10.4538V14L7.238 11.1965C10.9879 11.0964 14 8.624 14 5.6C14 2.5123 10.8598 0 7 0Z"
                                                        fill="#223655"/>
                                                </svg>
                                                <p>1</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="comments-box mb-9 md:ml-10">
                                <div class="comments-history flex  gap-5">
                                    <div class="comments-man flex w-20 ">
                                        <img class="h-10 w-10 object-cover rounded-full"
                                             src="{{asset('frontend/assets/images/author/6.webp')}}"
                                             alt="images">
                                    </div>
                                    <div class="comments-wrap-box">
                                        <div class="comments-text-box bg-blue-400 p-4">
                                            <div class="flex gap-2 flex-wrap items-center">
                                                <span class="text-black-200 uppercase">Kristin Watson</span>
                                                <span>
                                             <svg width="7" height="8" viewBox="0 0 7 8" fill="none"
                                                  xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M0.109096 3.67271L2.70012 0.218192C2.75093 0.150445 2.81682 0.0954592 2.89256 0.0575878C2.9683 0.0197164 3.05182 0 3.13651 0C3.22119 0 3.30471 0.0197164 3.38045 0.0575878C3.45619 0.0954592 3.52208 0.150445 3.57289 0.218192L6.16392 3.67271C6.23473 3.76713 6.27301 3.88197 6.27301 4C6.27301 4.11803 6.23473 4.23287 6.16392 4.32729L3.57289 7.78181C3.52208 7.84955 3.45619 7.90454 3.38045 7.94241C3.30471 7.98028 3.22119 8 3.13651 8C3.05182 8 2.9683 7.98028 2.89256 7.94241C2.81682 7.90454 2.75093 7.84955 2.70012 7.78181L0.109096 4.32729C0.0382806 4.23287 0 4.11803 0 4C0 3.88197 0.0382806 3.76713 0.109096 3.67271Z"
                                                    fill="#223655"/>
                                             </svg>
                                          </span>
                                                <span class="text-fuchsia-900">INSTRUCTOR</span>
                                                <span>
                                             <svg width="7" height="8" viewBox="0 0 7 8" fill="none"
                                                  xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M0.382533 3.67271L2.97356 0.218192C3.02437 0.150445 3.09026 0.0954592 3.166 0.0575878C3.24174 0.0197164 3.32526 0 3.40994 0C3.49463 0 3.57815 0.0197164 3.65389 0.0575878C3.72963 0.0954592 3.79552 0.150445 3.84633 0.218192L6.43735 3.67271C6.50817 3.76713 6.54645 3.88197 6.54645 4C6.54645 4.11803 6.50817 4.23287 6.43735 4.32729L3.84633 7.78181C3.79552 7.84955 3.72963 7.90454 3.65389 7.94241C3.57815 7.98028 3.49463 8 3.40994 8C3.32526 8 3.24174 7.98028 3.166 7.94241C3.09026 7.90454 3.02437 7.84955 2.97356 7.78181L0.382533 4.32729C0.311718 4.23287 0.273438 4.11803 0.273438 4C0.273438 3.88197 0.311718 3.76713 0.382533 3.67271Z"
                                                    fill="#223655"/>
                                             </svg>
                                          </span>
                                                <span class="text-blue-50">JUNE 11, 2022 AT 1:17 PM</span>
                                            </div>
                                            <p class="pt-4">Support tried the background time lay of him and
                                                torn examples other magicians no raised was pink payload acting.
                                            </p>
                                        </div>
                                        <div class="replay-box flex justify-between mt-2">
                                            <a class="text-black-200 hover:text-blue-600 transition duration-500"
                                               href="#">Reply</a>
                                            <div class="flex gap-2 items-center">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7 0C3.1402 0 0 2.5123 0 5.6C0 7.6356 1.3286 9.4605 3.5 10.4538V14L7.238 11.1965C10.9879 11.0964 14 8.624 14 5.6C14 2.5123 10.8598 0 7 0Z"
                                                        fill="#223655"/>
                                                </svg>
                                                <p>1</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        {{--DISCUSSION SECTION END--}}

                        {{--REVIEW SECTION START--}}
                        <section class="rating-box border-t mt-20 pt-20" id="review">
                            <div class="review-title mb-10">
                                <h3 class="text-3xl font-medium text-black-200">Reviews</h3>
                            </div>
                            <div class="md:grid md:grid-cols-12 flex flex-col gap-10 ">
                                <div class="col-span-4">
                                    <div class="rating-number p-8 shadow-3xl text-center">
                                        <h3 class="text-black-200 text-4xl font-medium">5.0</h3>
                                        <div class="rating-star flex gap-2 justify-center pt-4">
                                          <span>
                                             <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                                  xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M0.676917 7.04257L6.95538 6.1301L9.76202 0.440169C9.83868 0.284382 9.96479 0.158269 10.1206 0.0816118C10.5113 -0.111267 10.9861 0.0494653 11.1814 0.440169L13.9881 6.1301L20.2665 7.04257C20.4396 7.0673 20.5979 7.1489 20.719 7.27254C20.8655 7.4231 20.9462 7.62566 20.9435 7.8357C20.9407 8.04575 20.8546 8.2461 20.7042 8.39272L16.1616 12.8215L17.2348 19.0753C17.26 19.2207 17.2439 19.3703 17.1884 19.5071C17.1328 19.6439 17.0401 19.7624 16.9206 19.8492C16.8012 19.9359 16.6598 19.9875 16.5125 19.998C16.3653 20.0085 16.218 19.9775 16.0875 19.9086L10.4717 16.9561L4.85596 19.9086C4.70265 19.9902 4.52461 20.0174 4.35398 19.9877C3.92371 19.9135 3.6344 19.5055 3.70858 19.0753L4.78178 12.8215L0.23923 8.39272C0.115589 8.27156 0.0339868 8.1133 0.00925866 7.9402C-0.0575072 7.50746 0.244176 7.10686 0.676917 7.04257Z"
                                                    fill="#FFA800"/>
                                             </svg>
                                          </span>
                                            <span>
                                             <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                                  xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M0.676917 7.04257L6.95538 6.1301L9.76202 0.440169C9.83868 0.284382 9.96479 0.158269 10.1206 0.0816118C10.5113 -0.111267 10.9861 0.0494653 11.1814 0.440169L13.9881 6.1301L20.2665 7.04257C20.4396 7.0673 20.5979 7.1489 20.719 7.27254C20.8655 7.4231 20.9462 7.62566 20.9435 7.8357C20.9407 8.04575 20.8546 8.2461 20.7042 8.39272L16.1616 12.8215L17.2348 19.0753C17.26 19.2207 17.2439 19.3703 17.1884 19.5071C17.1328 19.6439 17.0401 19.7624 16.9206 19.8492C16.8012 19.9359 16.6598 19.9875 16.5125 19.998C16.3653 20.0085 16.218 19.9775 16.0875 19.9086L10.4717 16.9561L4.85596 19.9086C4.70265 19.9902 4.52461 20.0174 4.35398 19.9877C3.92371 19.9135 3.6344 19.5055 3.70858 19.0753L4.78178 12.8215L0.23923 8.39272C0.115589 8.27156 0.0339868 8.1133 0.00925866 7.9402C-0.0575072 7.50746 0.244176 7.10686 0.676917 7.04257Z"
                                                    fill="#FFA800"/>
                                             </svg>
                                          </span>
                                            <span>
                                             <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                                  xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M0.676917 7.04257L6.95538 6.1301L9.76202 0.440169C9.83868 0.284382 9.96479 0.158269 10.1206 0.0816118C10.5113 -0.111267 10.9861 0.0494653 11.1814 0.440169L13.9881 6.1301L20.2665 7.04257C20.4396 7.0673 20.5979 7.1489 20.719 7.27254C20.8655 7.4231 20.9462 7.62566 20.9435 7.8357C20.9407 8.04575 20.8546 8.2461 20.7042 8.39272L16.1616 12.8215L17.2348 19.0753C17.26 19.2207 17.2439 19.3703 17.1884 19.5071C17.1328 19.6439 17.0401 19.7624 16.9206 19.8492C16.8012 19.9359 16.6598 19.9875 16.5125 19.998C16.3653 20.0085 16.218 19.9775 16.0875 19.9086L10.4717 16.9561L4.85596 19.9086C4.70265 19.9902 4.52461 20.0174 4.35398 19.9877C3.92371 19.9135 3.6344 19.5055 3.70858 19.0753L4.78178 12.8215L0.23923 8.39272C0.115589 8.27156 0.0339868 8.1133 0.00925866 7.9402C-0.0575072 7.50746 0.244176 7.10686 0.676917 7.04257Z"
                                                    fill="#FFA800"/>
                                             </svg>
                                          </span>
                                            <span>
                                             <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                                  xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M0.676917 7.04257L6.95538 6.1301L9.76202 0.440169C9.83868 0.284382 9.96479 0.158269 10.1206 0.0816118C10.5113 -0.111267 10.9861 0.0494653 11.1814 0.440169L13.9881 6.1301L20.2665 7.04257C20.4396 7.0673 20.5979 7.1489 20.719 7.27254C20.8655 7.4231 20.9462 7.62566 20.9435 7.8357C20.9407 8.04575 20.8546 8.2461 20.7042 8.39272L16.1616 12.8215L17.2348 19.0753C17.26 19.2207 17.2439 19.3703 17.1884 19.5071C17.1328 19.6439 17.0401 19.7624 16.9206 19.8492C16.8012 19.9359 16.6598 19.9875 16.5125 19.998C16.3653 20.0085 16.218 19.9775 16.0875 19.9086L10.4717 16.9561L4.85596 19.9086C4.70265 19.9902 4.52461 20.0174 4.35398 19.9877C3.92371 19.9135 3.6344 19.5055 3.70858 19.0753L4.78178 12.8215L0.23923 8.39272C0.115589 8.27156 0.0339868 8.1133 0.00925866 7.9402C-0.0575072 7.50746 0.244176 7.10686 0.676917 7.04257Z"
                                                    fill="#FFA800"/>
                                             </svg>
                                          </span>
                                            <span>
                                             <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                                  xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M0.676917 7.04257L6.95538 6.1301L9.76202 0.440169C9.83868 0.284382 9.96479 0.158269 10.1206 0.0816118C10.5113 -0.111267 10.9861 0.0494653 11.1814 0.440169L13.9881 6.1301L20.2665 7.04257C20.4396 7.0673 20.5979 7.1489 20.719 7.27254C20.8655 7.4231 20.9462 7.62566 20.9435 7.8357C20.9407 8.04575 20.8546 8.2461 20.7042 8.39272L16.1616 12.8215L17.2348 19.0753C17.26 19.2207 17.2439 19.3703 17.1884 19.5071C17.1328 19.6439 17.0401 19.7624 16.9206 19.8492C16.8012 19.9359 16.6598 19.9875 16.5125 19.998C16.3653 20.0085 16.218 19.9775 16.0875 19.9086L10.4717 16.9561L4.85596 19.9086C4.70265 19.9902 4.52461 20.0174 4.35398 19.9877C3.92371 19.9135 3.6344 19.5055 3.70858 19.0753L4.78178 12.8215L0.23923 8.39272C0.115589 8.27156 0.0339868 8.1133 0.00925866 7.9402C-0.0575072 7.50746 0.244176 7.10686 0.676917 7.04257Z"
                                                    fill="#FFA800"/>
                                             </svg>
                                          </span>
                                        </div>
                                        <p class="text-blue-50 pt-4">542 Reviews</p>
                                    </div>
                                </div>
                                <div class="col-span-8">
                                    <div class="grid grid-cols-12 md:gap-10 gap-5 items-center mb-6">
                                        <div class="col-span-4">
                                            <div class="flex items-center gap-2">
                                                <p class="text-black-200">5</p>
                                                <div class="rating-number flex gap-1">
                                                <span>
                                                   <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                      <path
                                                          d="M1.19162 4.9298L5.58654 4.29107L7.55119 0.308118C7.60485 0.199068 7.69312 0.110788 7.80218 0.0571283C8.07567 -0.0778871 8.40801 0.0346257 8.54476 0.308118L10.5094 4.29107L14.9043 4.9298C15.0255 4.94711 15.1363 5.00423 15.2211 5.09078C15.3236 5.19617 15.3801 5.33796 15.3782 5.48499C15.3762 5.63202 15.316 5.77227 15.2107 5.87491L12.0309 8.97507L12.7822 13.3527C12.7998 13.4545 12.7885 13.5592 12.7496 13.655C12.7108 13.7508 12.6458 13.8337 12.5622 13.8944C12.4786 13.9552 12.3796 13.9913 12.2766 13.9986C12.1735 14.0059 12.0704 13.9843 11.979 13.936L8.04797 11.8692L4.11695 13.936C4.00963 13.9931 3.885 14.0122 3.76556 13.9914C3.46437 13.9395 3.26185 13.6539 3.31378 13.3527L4.06502 8.97507L0.885234 5.87491C0.798686 5.79009 0.741564 5.67931 0.724255 5.55814C0.677518 5.25522 0.888696 4.9748 1.19162 4.9298Z"
                                                          fill="#FFA800"/>
                                                   </svg>
                                                </span>
                                                    <span>
                                                   <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                      <path
                                                          d="M1.19162 4.9298L5.58654 4.29107L7.55119 0.308118C7.60485 0.199068 7.69312 0.110788 7.80218 0.0571283C8.07567 -0.0778871 8.40801 0.0346257 8.54476 0.308118L10.5094 4.29107L14.9043 4.9298C15.0255 4.94711 15.1363 5.00423 15.2211 5.09078C15.3236 5.19617 15.3801 5.33796 15.3782 5.48499C15.3762 5.63202 15.316 5.77227 15.2107 5.87491L12.0309 8.97507L12.7822 13.3527C12.7998 13.4545 12.7885 13.5592 12.7496 13.655C12.7108 13.7508 12.6458 13.8337 12.5622 13.8944C12.4786 13.9552 12.3796 13.9913 12.2766 13.9986C12.1735 14.0059 12.0704 13.9843 11.979 13.936L8.04797 11.8692L4.11695 13.936C4.00963 13.9931 3.885 14.0122 3.76556 13.9914C3.46437 13.9395 3.26185 13.6539 3.31378 13.3527L4.06502 8.97507L0.885234 5.87491C0.798686 5.79009 0.741564 5.67931 0.724255 5.55814C0.677518 5.25522 0.888696 4.9748 1.19162 4.9298Z"
                                                          fill="#FFA800"/>
                                                   </svg>
                                                </span>
                                                    <span>
                                                   <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                      <path
                                                          d="M1.19162 4.9298L5.58654 4.29107L7.55119 0.308118C7.60485 0.199068 7.69312 0.110788 7.80218 0.0571283C8.07567 -0.0778871 8.40801 0.0346257 8.54476 0.308118L10.5094 4.29107L14.9043 4.9298C15.0255 4.94711 15.1363 5.00423 15.2211 5.09078C15.3236 5.19617 15.3801 5.33796 15.3782 5.48499C15.3762 5.63202 15.316 5.77227 15.2107 5.87491L12.0309 8.97507L12.7822 13.3527C12.7998 13.4545 12.7885 13.5592 12.7496 13.655C12.7108 13.7508 12.6458 13.8337 12.5622 13.8944C12.4786 13.9552 12.3796 13.9913 12.2766 13.9986C12.1735 14.0059 12.0704 13.9843 11.979 13.936L8.04797 11.8692L4.11695 13.936C4.00963 13.9931 3.885 14.0122 3.76556 13.9914C3.46437 13.9395 3.26185 13.6539 3.31378 13.3527L4.06502 8.97507L0.885234 5.87491C0.798686 5.79009 0.741564 5.67931 0.724255 5.55814C0.677518 5.25522 0.888696 4.9748 1.19162 4.9298Z"
                                                          fill="#FFA800"/>
                                                   </svg>
                                                </span>
                                                    <span>
                                                   <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                      <path
                                                          d="M1.19162 4.9298L5.58654 4.29107L7.55119 0.308118C7.60485 0.199068 7.69312 0.110788 7.80218 0.0571283C8.07567 -0.0778871 8.40801 0.0346257 8.54476 0.308118L10.5094 4.29107L14.9043 4.9298C15.0255 4.94711 15.1363 5.00423 15.2211 5.09078C15.3236 5.19617 15.3801 5.33796 15.3782 5.48499C15.3762 5.63202 15.316 5.77227 15.2107 5.87491L12.0309 8.97507L12.7822 13.3527C12.7998 13.4545 12.7885 13.5592 12.7496 13.655C12.7108 13.7508 12.6458 13.8337 12.5622 13.8944C12.4786 13.9552 12.3796 13.9913 12.2766 13.9986C12.1735 14.0059 12.0704 13.9843 11.979 13.936L8.04797 11.8692L4.11695 13.936C4.00963 13.9931 3.885 14.0122 3.76556 13.9914C3.46437 13.9395 3.26185 13.6539 3.31378 13.3527L4.06502 8.97507L0.885234 5.87491C0.798686 5.79009 0.741564 5.67931 0.724255 5.55814C0.677518 5.25522 0.888696 4.9748 1.19162 4.9298Z"
                                                          fill="#FFA800"/>
                                                   </svg>
                                                </span>
                                                    <span>
                                                   <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                      <path
                                                          d="M1.19162 4.9298L5.58654 4.29107L7.55119 0.308118C7.60485 0.199068 7.69312 0.110788 7.80218 0.0571283C8.07567 -0.0778871 8.40801 0.0346257 8.54476 0.308118L10.5094 4.29107L14.9043 4.9298C15.0255 4.94711 15.1363 5.00423 15.2211 5.09078C15.3236 5.19617 15.3801 5.33796 15.3782 5.48499C15.3762 5.63202 15.316 5.77227 15.2107 5.87491L12.0309 8.97507L12.7822 13.3527C12.7998 13.4545 12.7885 13.5592 12.7496 13.655C12.7108 13.7508 12.6458 13.8337 12.5622 13.8944C12.4786 13.9552 12.3796 13.9913 12.2766 13.9986C12.1735 14.0059 12.0704 13.9843 11.979 13.936L8.04797 11.8692L4.11695 13.936C4.00963 13.9931 3.885 14.0122 3.76556 13.9914C3.46437 13.9395 3.26185 13.6539 3.31378 13.3527L4.06502 8.97507L0.885234 5.87491C0.798686 5.79009 0.741564 5.67931 0.724255 5.55814C0.677518 5.25522 0.888696 4.9748 1.19162 4.9298Z"
                                                          fill="#FFA800"/>
                                                   </svg>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-span-8">
                                            <div class="flex items-center gap-3">
                                                <div class="rating-line bg-blue-600 h-2 w-full rounded-md">
                                                </div>
                                                <div class="ratin-number w-8">
                                                    <p class="text-black-200">542</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-12 md:gap-10 gap-5 items-center mb-6">
                                        <div class="col-span-4">
                                            <div class="flex items-center gap-2">
                                                <p class="text-black-200">4</p>
                                                <div class="rating-number flex gap-1">
                                                <span>
                                                   <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                      <path
                                                          d="M1.19162 4.9298L5.58654 4.29107L7.55119 0.308118C7.60485 0.199068 7.69312 0.110788 7.80218 0.0571283C8.07567 -0.0778871 8.40801 0.0346257 8.54476 0.308118L10.5094 4.29107L14.9043 4.9298C15.0255 4.94711 15.1363 5.00423 15.2211 5.09078C15.3236 5.19617 15.3801 5.33796 15.3782 5.48499C15.3762 5.63202 15.316 5.77227 15.2107 5.87491L12.0309 8.97507L12.7822 13.3527C12.7998 13.4545 12.7885 13.5592 12.7496 13.655C12.7108 13.7508 12.6458 13.8337 12.5622 13.8944C12.4786 13.9552 12.3796 13.9913 12.2766 13.9986C12.1735 14.0059 12.0704 13.9843 11.979 13.936L8.04797 11.8692L4.11695 13.936C4.00963 13.9931 3.885 14.0122 3.76556 13.9914C3.46437 13.9395 3.26185 13.6539 3.31378 13.3527L4.06502 8.97507L0.885234 5.87491C0.798686 5.79009 0.741564 5.67931 0.724255 5.55814C0.677518 5.25522 0.888696 4.9748 1.19162 4.9298Z"
                                                          fill="#FFA800"/>
                                                   </svg>
                                                </span>
                                                    <span>
                                                   <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                      <path
                                                          d="M1.19162 4.9298L5.58654 4.29107L7.55119 0.308118C7.60485 0.199068 7.69312 0.110788 7.80218 0.0571283C8.07567 -0.0778871 8.40801 0.0346257 8.54476 0.308118L10.5094 4.29107L14.9043 4.9298C15.0255 4.94711 15.1363 5.00423 15.2211 5.09078C15.3236 5.19617 15.3801 5.33796 15.3782 5.48499C15.3762 5.63202 15.316 5.77227 15.2107 5.87491L12.0309 8.97507L12.7822 13.3527C12.7998 13.4545 12.7885 13.5592 12.7496 13.655C12.7108 13.7508 12.6458 13.8337 12.5622 13.8944C12.4786 13.9552 12.3796 13.9913 12.2766 13.9986C12.1735 14.0059 12.0704 13.9843 11.979 13.936L8.04797 11.8692L4.11695 13.936C4.00963 13.9931 3.885 14.0122 3.76556 13.9914C3.46437 13.9395 3.26185 13.6539 3.31378 13.3527L4.06502 8.97507L0.885234 5.87491C0.798686 5.79009 0.741564 5.67931 0.724255 5.55814C0.677518 5.25522 0.888696 4.9748 1.19162 4.9298Z"
                                                          fill="#FFA800"/>
                                                   </svg>
                                                </span>
                                                    <span>
                                                   <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                      <path
                                                          d="M1.19162 4.9298L5.58654 4.29107L7.55119 0.308118C7.60485 0.199068 7.69312 0.110788 7.80218 0.0571283C8.07567 -0.0778871 8.40801 0.0346257 8.54476 0.308118L10.5094 4.29107L14.9043 4.9298C15.0255 4.94711 15.1363 5.00423 15.2211 5.09078C15.3236 5.19617 15.3801 5.33796 15.3782 5.48499C15.3762 5.63202 15.316 5.77227 15.2107 5.87491L12.0309 8.97507L12.7822 13.3527C12.7998 13.4545 12.7885 13.5592 12.7496 13.655C12.7108 13.7508 12.6458 13.8337 12.5622 13.8944C12.4786 13.9552 12.3796 13.9913 12.2766 13.9986C12.1735 14.0059 12.0704 13.9843 11.979 13.936L8.04797 11.8692L4.11695 13.936C4.00963 13.9931 3.885 14.0122 3.76556 13.9914C3.46437 13.9395 3.26185 13.6539 3.31378 13.3527L4.06502 8.97507L0.885234 5.87491C0.798686 5.79009 0.741564 5.67931 0.724255 5.55814C0.677518 5.25522 0.888696 4.9748 1.19162 4.9298Z"
                                                          fill="#FFA800"/>
                                                   </svg>
                                                </span>
                                                    <span>
                                                   <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                      <path
                                                          d="M1.19162 4.9298L5.58654 4.29107L7.55119 0.308118C7.60485 0.199068 7.69312 0.110788 7.80218 0.0571283C8.07567 -0.0778871 8.40801 0.0346257 8.54476 0.308118L10.5094 4.29107L14.9043 4.9298C15.0255 4.94711 15.1363 5.00423 15.2211 5.09078C15.3236 5.19617 15.3801 5.33796 15.3782 5.48499C15.3762 5.63202 15.316 5.77227 15.2107 5.87491L12.0309 8.97507L12.7822 13.3527C12.7998 13.4545 12.7885 13.5592 12.7496 13.655C12.7108 13.7508 12.6458 13.8337 12.5622 13.8944C12.4786 13.9552 12.3796 13.9913 12.2766 13.9986C12.1735 14.0059 12.0704 13.9843 11.979 13.936L8.04797 11.8692L4.11695 13.936C4.00963 13.9931 3.885 14.0122 3.76556 13.9914C3.46437 13.9395 3.26185 13.6539 3.31378 13.3527L4.06502 8.97507L0.885234 5.87491C0.798686 5.79009 0.741564 5.67931 0.724255 5.55814C0.677518 5.25522 0.888696 4.9748 1.19162 4.9298Z"
                                                          fill="#FFA800"/>
                                                   </svg>
                                                </span>
                                                    <span>
                                                   <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                      <path
                                                          d="M0.833217 4.9298L5.22814 4.29107L7.19279 0.308118C7.24645 0.199068 7.33473 0.110788 7.44378 0.0571283C7.71727 -0.0778871 8.04962 0.0346257 8.18636 0.308118L10.151 4.29107L14.5459 4.9298C14.6671 4.94711 14.7779 5.00423 14.8627 5.09078C14.9652 5.19617 15.0217 5.33796 15.0198 5.48499C15.0178 5.63202 14.9576 5.77227 14.8523 5.87491L11.6725 8.97507L12.4238 13.3527C12.4414 13.4545 12.4301 13.5592 12.3912 13.655C12.3524 13.7508 12.2874 13.8337 12.2038 13.8944C12.1202 13.9552 12.0212 13.9912 11.9182 13.9986C11.8151 14.006 11.712 13.9843 11.6206 13.936L7.68957 11.8692L3.75855 13.936C3.65123 13.9931 3.5266 14.0122 3.40716 13.9914C3.10598 13.9395 2.90345 13.6539 2.95538 13.3527L3.70662 8.97507L0.526836 5.87491C0.440287 5.79009 0.383166 5.67931 0.365856 5.55814C0.31912 5.25522 0.530298 4.9748 0.833217 4.9298Z"
                                                          fill="#757F8F" fill-opacity="0.4"/>
                                                   </svg>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-span-8">
                                            <div class="flex items-center gap-3">
                                                <div class="rating-line bg-gray-300 h-2 w-full rounded-md">
                                                </div>
                                                <div class="ratin-number w-8">
                                                    <p class="text-black-200">0</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-12 md:gap-10 gap-5 items-center mb-6">
                                        <div class="col-span-4">
                                            <div class="flex items-center gap-2">
                                                <p class="text-black-200">3</p>
                                                <div class="rating-number flex gap-1">
                                                <span>
                                                   <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                      <path
                                                          d="M1.19162 4.9298L5.58654 4.29107L7.55119 0.308118C7.60485 0.199068 7.69312 0.110788 7.80218 0.0571283C8.07567 -0.0778871 8.40801 0.0346257 8.54476 0.308118L10.5094 4.29107L14.9043 4.9298C15.0255 4.94711 15.1363 5.00423 15.2211 5.09078C15.3236 5.19617 15.3801 5.33796 15.3782 5.48499C15.3762 5.63202 15.316 5.77227 15.2107 5.87491L12.0309 8.97507L12.7822 13.3527C12.7998 13.4545 12.7885 13.5592 12.7496 13.655C12.7108 13.7508 12.6458 13.8337 12.5622 13.8944C12.4786 13.9552 12.3796 13.9913 12.2766 13.9986C12.1735 14.0059 12.0704 13.9843 11.979 13.936L8.04797 11.8692L4.11695 13.936C4.00963 13.9931 3.885 14.0122 3.76556 13.9914C3.46437 13.9395 3.26185 13.6539 3.31378 13.3527L4.06502 8.97507L0.885234 5.87491C0.798686 5.79009 0.741564 5.67931 0.724255 5.55814C0.677518 5.25522 0.888696 4.9748 1.19162 4.9298Z"
                                                          fill="#FFA800"/>
                                                   </svg>
                                                </span>
                                                    <span>
                                                   <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                      <path
                                                          d="M1.19162 4.9298L5.58654 4.29107L7.55119 0.308118C7.60485 0.199068 7.69312 0.110788 7.80218 0.0571283C8.07567 -0.0778871 8.40801 0.0346257 8.54476 0.308118L10.5094 4.29107L14.9043 4.9298C15.0255 4.94711 15.1363 5.00423 15.2211 5.09078C15.3236 5.19617 15.3801 5.33796 15.3782 5.48499C15.3762 5.63202 15.316 5.77227 15.2107 5.87491L12.0309 8.97507L12.7822 13.3527C12.7998 13.4545 12.7885 13.5592 12.7496 13.655C12.7108 13.7508 12.6458 13.8337 12.5622 13.8944C12.4786 13.9552 12.3796 13.9913 12.2766 13.9986C12.1735 14.0059 12.0704 13.9843 11.979 13.936L8.04797 11.8692L4.11695 13.936C4.00963 13.9931 3.885 14.0122 3.76556 13.9914C3.46437 13.9395 3.26185 13.6539 3.31378 13.3527L4.06502 8.97507L0.885234 5.87491C0.798686 5.79009 0.741564 5.67931 0.724255 5.55814C0.677518 5.25522 0.888696 4.9748 1.19162 4.9298Z"
                                                          fill="#FFA800"/>
                                                   </svg>
                                                </span>
                                                    <span>
                                                   <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                      <path
                                                          d="M1.19162 4.9298L5.58654 4.29107L7.55119 0.308118C7.60485 0.199068 7.69312 0.110788 7.80218 0.0571283C8.07567 -0.0778871 8.40801 0.0346257 8.54476 0.308118L10.5094 4.29107L14.9043 4.9298C15.0255 4.94711 15.1363 5.00423 15.2211 5.09078C15.3236 5.19617 15.3801 5.33796 15.3782 5.48499C15.3762 5.63202 15.316 5.77227 15.2107 5.87491L12.0309 8.97507L12.7822 13.3527C12.7998 13.4545 12.7885 13.5592 12.7496 13.655C12.7108 13.7508 12.6458 13.8337 12.5622 13.8944C12.4786 13.9552 12.3796 13.9913 12.2766 13.9986C12.1735 14.0059 12.0704 13.9843 11.979 13.936L8.04797 11.8692L4.11695 13.936C4.00963 13.9931 3.885 14.0122 3.76556 13.9914C3.46437 13.9395 3.26185 13.6539 3.31378 13.3527L4.06502 8.97507L0.885234 5.87491C0.798686 5.79009 0.741564 5.67931 0.724255 5.55814C0.677518 5.25522 0.888696 4.9748 1.19162 4.9298Z"
                                                          fill="#FFA800"/>
                                                   </svg>
                                                </span>
                                                    <span>
                                                   <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                      <path
                                                          d="M1.17306 4.9298L5.56798 4.29107L7.53263 0.308118C7.58629 0.199068 7.67457 0.110788 7.78362 0.0571283C8.05711 -0.0778871 8.38946 0.0346257 8.52621 0.308118L10.4909 4.29107L14.8858 4.9298C15.0069 4.94711 15.1177 5.00423 15.2025 5.09078C15.3051 5.19617 15.3616 5.33796 15.3596 5.48499C15.3577 5.63202 15.2975 5.77227 15.1922 5.87491L12.0124 8.97507L12.7636 13.3527C12.7812 13.4545 12.77 13.5592 12.7311 13.655C12.6922 13.7508 12.6273 13.8337 12.5437 13.8944C12.46 13.9552 12.3611 13.9912 12.258 13.9986C12.1549 14.006 12.0518 13.9843 11.9604 13.936L8.02942 11.8692L4.09839 13.936C3.99107 13.9931 3.86644 14.0122 3.74701 13.9914C3.44582 13.9395 3.2433 13.6539 3.29523 13.3527L4.04646 8.97507L0.866679 5.87491C0.780131 5.79009 0.723009 5.67931 0.7057 5.55814C0.658964 5.25522 0.870142 4.9748 1.17306 4.9298Z"
                                                          fill="#757F8F" fill-opacity="0.4"/>
                                                   </svg>
                                                </span>
                                                    <span>
                                                   <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                      <path
                                                          d="M1.17306 4.9298L5.56798 4.29107L7.53263 0.308118C7.58629 0.199068 7.67457 0.110788 7.78362 0.0571283C8.05711 -0.0778871 8.38946 0.0346257 8.52621 0.308118L10.4909 4.29107L14.8858 4.9298C15.0069 4.94711 15.1177 5.00423 15.2025 5.09078C15.3051 5.19617 15.3616 5.33796 15.3596 5.48499C15.3577 5.63202 15.2975 5.77227 15.1922 5.87491L12.0124 8.97507L12.7636 13.3527C12.7812 13.4545 12.77 13.5592 12.7311 13.655C12.6922 13.7508 12.6273 13.8337 12.5437 13.8944C12.46 13.9552 12.3611 13.9912 12.258 13.9986C12.1549 14.006 12.0518 13.9843 11.9604 13.936L8.02942 11.8692L4.09839 13.936C3.99107 13.9931 3.86644 14.0122 3.74701 13.9914C3.44582 13.9395 3.2433 13.6539 3.29523 13.3527L4.04646 8.97507L0.866679 5.87491C0.780131 5.79009 0.723009 5.67931 0.7057 5.55814C0.658964 5.25522 0.870142 4.9748 1.17306 4.9298Z"
                                                          fill="#757F8F" fill-opacity="0.4"/>
                                                   </svg>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-span-8">
                                            <div class="flex items-center gap-3">
                                                <div class="rating-line bg-gray-300 h-2 w-full rounded-md">
                                                </div>
                                                <div class="ratin-number w-8">
                                                    <p class="text-black-200">0</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-12 md:gap-10 gap-5 items-center mb-6">
                                        <div class="col-span-4">
                                            <div class="flex items-center gap-2">
                                                <p class="text-black-200">2</p>
                                                <div class="rating-number flex gap-1">
                                                <span>
                                                   <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                      <path
                                                          d="M1.19162 4.9298L5.58654 4.29107L7.55119 0.308118C7.60485 0.199068 7.69312 0.110788 7.80218 0.0571283C8.07567 -0.0778871 8.40801 0.0346257 8.54476 0.308118L10.5094 4.29107L14.9043 4.9298C15.0255 4.94711 15.1363 5.00423 15.2211 5.09078C15.3236 5.19617 15.3801 5.33796 15.3782 5.48499C15.3762 5.63202 15.316 5.77227 15.2107 5.87491L12.0309 8.97507L12.7822 13.3527C12.7998 13.4545 12.7885 13.5592 12.7496 13.655C12.7108 13.7508 12.6458 13.8337 12.5622 13.8944C12.4786 13.9552 12.3796 13.9913 12.2766 13.9986C12.1735 14.0059 12.0704 13.9843 11.979 13.936L8.04797 11.8692L4.11695 13.936C4.00963 13.9931 3.885 14.0122 3.76556 13.9914C3.46437 13.9395 3.26185 13.6539 3.31378 13.3527L4.06502 8.97507L0.885234 5.87491C0.798686 5.79009 0.741564 5.67931 0.724255 5.55814C0.677518 5.25522 0.888696 4.9748 1.19162 4.9298Z"
                                                          fill="#FFA800"/>
                                                   </svg>
                                                </span>
                                                    <span>
                                                   <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                      <path
                                                          d="M1.19162 4.9298L5.58654 4.29107L7.55119 0.308118C7.60485 0.199068 7.69312 0.110788 7.80218 0.0571283C8.07567 -0.0778871 8.40801 0.0346257 8.54476 0.308118L10.5094 4.29107L14.9043 4.9298C15.0255 4.94711 15.1363 5.00423 15.2211 5.09078C15.3236 5.19617 15.3801 5.33796 15.3782 5.48499C15.3762 5.63202 15.316 5.77227 15.2107 5.87491L12.0309 8.97507L12.7822 13.3527C12.7998 13.4545 12.7885 13.5592 12.7496 13.655C12.7108 13.7508 12.6458 13.8337 12.5622 13.8944C12.4786 13.9552 12.3796 13.9913 12.2766 13.9986C12.1735 14.0059 12.0704 13.9843 11.979 13.936L8.04797 11.8692L4.11695 13.936C4.00963 13.9931 3.885 14.0122 3.76556 13.9914C3.46437 13.9395 3.26185 13.6539 3.31378 13.3527L4.06502 8.97507L0.885234 5.87491C0.798686 5.79009 0.741564 5.67931 0.724255 5.55814C0.677518 5.25522 0.888696 4.9748 1.19162 4.9298Z"
                                                          fill="#FFA800"/>
                                                   </svg>
                                                </span>
                                                    <span>
                                                   <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                      <path
                                                          d="M1.17306 4.9298L5.56798 4.29107L7.53263 0.308118C7.58629 0.199068 7.67457 0.110788 7.78362 0.0571283C8.05711 -0.0778871 8.38946 0.0346257 8.52621 0.308118L10.4909 4.29107L14.8858 4.9298C15.0069 4.94711 15.1177 5.00423 15.2025 5.09078C15.3051 5.19617 15.3616 5.33796 15.3596 5.48499C15.3577 5.63202 15.2975 5.77227 15.1922 5.87491L12.0124 8.97507L12.7636 13.3527C12.7812 13.4545 12.77 13.5592 12.7311 13.655C12.6922 13.7508 12.6273 13.8337 12.5437 13.8944C12.46 13.9552 12.3611 13.9912 12.258 13.9986C12.1549 14.006 12.0518 13.9843 11.9604 13.936L8.02942 11.8692L4.09839 13.936C3.99107 13.9931 3.86644 14.0122 3.74701 13.9914C3.44582 13.9395 3.2433 13.6539 3.29523 13.3527L4.04646 8.97507L0.866679 5.87491C0.780131 5.79009 0.723009 5.67931 0.7057 5.55814C0.658964 5.25522 0.870142 4.9748 1.17306 4.9298Z"
                                                          fill="#757F8F" fill-opacity="0.4"/>
                                                   </svg>
                                                </span>
                                                    <span>
                                                   <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                      <path
                                                          d="M1.17306 4.9298L5.56798 4.29107L7.53263 0.308118C7.58629 0.199068 7.67457 0.110788 7.78362 0.0571283C8.05711 -0.0778871 8.38946 0.0346257 8.52621 0.308118L10.4909 4.29107L14.8858 4.9298C15.0069 4.94711 15.1177 5.00423 15.2025 5.09078C15.3051 5.19617 15.3616 5.33796 15.3596 5.48499C15.3577 5.63202 15.2975 5.77227 15.1922 5.87491L12.0124 8.97507L12.7636 13.3527C12.7812 13.4545 12.77 13.5592 12.7311 13.655C12.6922 13.7508 12.6273 13.8337 12.5437 13.8944C12.46 13.9552 12.3611 13.9912 12.258 13.9986C12.1549 14.006 12.0518 13.9843 11.9604 13.936L8.02942 11.8692L4.09839 13.936C3.99107 13.9931 3.86644 14.0122 3.74701 13.9914C3.44582 13.9395 3.2433 13.6539 3.29523 13.3527L4.04646 8.97507L0.866679 5.87491C0.780131 5.79009 0.723009 5.67931 0.7057 5.55814C0.658964 5.25522 0.870142 4.9748 1.17306 4.9298Z"
                                                          fill="#757F8F" fill-opacity="0.4"/>
                                                   </svg>
                                                </span>
                                                    <span>
                                                   <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                      <path
                                                          d="M1.17306 4.9298L5.56798 4.29107L7.53263 0.308118C7.58629 0.199068 7.67457 0.110788 7.78362 0.0571283C8.05711 -0.0778871 8.38946 0.0346257 8.52621 0.308118L10.4909 4.29107L14.8858 4.9298C15.0069 4.94711 15.1177 5.00423 15.2025 5.09078C15.3051 5.19617 15.3616 5.33796 15.3596 5.48499C15.3577 5.63202 15.2975 5.77227 15.1922 5.87491L12.0124 8.97507L12.7636 13.3527C12.7812 13.4545 12.77 13.5592 12.7311 13.655C12.6922 13.7508 12.6273 13.8337 12.5437 13.8944C12.46 13.9552 12.3611 13.9912 12.258 13.9986C12.1549 14.006 12.0518 13.9843 11.9604 13.936L8.02942 11.8692L4.09839 13.936C3.99107 13.9931 3.86644 14.0122 3.74701 13.9914C3.44582 13.9395 3.2433 13.6539 3.29523 13.3527L4.04646 8.97507L0.866679 5.87491C0.780131 5.79009 0.723009 5.67931 0.7057 5.55814C0.658964 5.25522 0.870142 4.9748 1.17306 4.9298Z"
                                                          fill="#757F8F" fill-opacity="0.4"/>
                                                   </svg>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-span-8">
                                            <div class="flex items-center gap-3">
                                                <div class="rating-line bg-gray-300 h-2 w-full rounded-md">
                                                </div>
                                                <div class="ratin-number w-8">
                                                    <p class="text-black-200">0</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-12 md:gap-10 gap-5 items-center mb-6">
                                        <div class="col-span-4">
                                            <div class="flex items-center gap-2">
                                                <p class="text-black-200">1</p>
                                                <div class="rating-number flex gap-1">
                                                <span>
                                                   <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                      <path
                                                          d="M1.19162 4.9298L5.58654 4.29107L7.55119 0.308118C7.60485 0.199068 7.69312 0.110788 7.80218 0.0571283C8.07567 -0.0778871 8.40801 0.0346257 8.54476 0.308118L10.5094 4.29107L14.9043 4.9298C15.0255 4.94711 15.1363 5.00423 15.2211 5.09078C15.3236 5.19617 15.3801 5.33796 15.3782 5.48499C15.3762 5.63202 15.316 5.77227 15.2107 5.87491L12.0309 8.97507L12.7822 13.3527C12.7998 13.4545 12.7885 13.5592 12.7496 13.655C12.7108 13.7508 12.6458 13.8337 12.5622 13.8944C12.4786 13.9552 12.3796 13.9913 12.2766 13.9986C12.1735 14.0059 12.0704 13.9843 11.979 13.936L8.04797 11.8692L4.11695 13.936C4.00963 13.9931 3.885 14.0122 3.76556 13.9914C3.46437 13.9395 3.26185 13.6539 3.31378 13.3527L4.06502 8.97507L0.885234 5.87491C0.798686 5.79009 0.741564 5.67931 0.724255 5.55814C0.677518 5.25522 0.888696 4.9748 1.19162 4.9298Z"
                                                          fill="#FFA800"/>
                                                   </svg>
                                                </span>
                                                    <span>
                                                   <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                      <path
                                                          d="M1.17306 4.9298L5.56798 4.29107L7.53263 0.308118C7.58629 0.199068 7.67457 0.110788 7.78362 0.0571283C8.05711 -0.0778871 8.38946 0.0346257 8.52621 0.308118L10.4909 4.29107L14.8858 4.9298C15.0069 4.94711 15.1177 5.00423 15.2025 5.09078C15.3051 5.19617 15.3616 5.33796 15.3596 5.48499C15.3577 5.63202 15.2975 5.77227 15.1922 5.87491L12.0124 8.97507L12.7636 13.3527C12.7812 13.4545 12.77 13.5592 12.7311 13.655C12.6922 13.7508 12.6273 13.8337 12.5437 13.8944C12.46 13.9552 12.3611 13.9912 12.258 13.9986C12.1549 14.006 12.0518 13.9843 11.9604 13.936L8.02942 11.8692L4.09839 13.936C3.99107 13.9931 3.86644 14.0122 3.74701 13.9914C3.44582 13.9395 3.2433 13.6539 3.29523 13.3527L4.04646 8.97507L0.866679 5.87491C0.780131 5.79009 0.723009 5.67931 0.7057 5.55814C0.658964 5.25522 0.870142 4.9748 1.17306 4.9298Z"
                                                          fill="#757F8F" fill-opacity="0.4"/>
                                                   </svg>
                                                </span>
                                                    <span>
                                                   <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                      <path
                                                          d="M1.17306 4.9298L5.56798 4.29107L7.53263 0.308118C7.58629 0.199068 7.67457 0.110788 7.78362 0.0571283C8.05711 -0.0778871 8.38946 0.0346257 8.52621 0.308118L10.4909 4.29107L14.8858 4.9298C15.0069 4.94711 15.1177 5.00423 15.2025 5.09078C15.3051 5.19617 15.3616 5.33796 15.3596 5.48499C15.3577 5.63202 15.2975 5.77227 15.1922 5.87491L12.0124 8.97507L12.7636 13.3527C12.7812 13.4545 12.77 13.5592 12.7311 13.655C12.6922 13.7508 12.6273 13.8337 12.5437 13.8944C12.46 13.9552 12.3611 13.9912 12.258 13.9986C12.1549 14.006 12.0518 13.9843 11.9604 13.936L8.02942 11.8692L4.09839 13.936C3.99107 13.9931 3.86644 14.0122 3.74701 13.9914C3.44582 13.9395 3.2433 13.6539 3.29523 13.3527L4.04646 8.97507L0.866679 5.87491C0.780131 5.79009 0.723009 5.67931 0.7057 5.55814C0.658964 5.25522 0.870142 4.9748 1.17306 4.9298Z"
                                                          fill="#757F8F" fill-opacity="0.4"/>
                                                   </svg>
                                                </span>
                                                    <span>
                                                   <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                      <path
                                                          d="M1.17306 4.9298L5.56798 4.29107L7.53263 0.308118C7.58629 0.199068 7.67457 0.110788 7.78362 0.0571283C8.05711 -0.0778871 8.38946 0.0346257 8.52621 0.308118L10.4909 4.29107L14.8858 4.9298C15.0069 4.94711 15.1177 5.00423 15.2025 5.09078C15.3051 5.19617 15.3616 5.33796 15.3596 5.48499C15.3577 5.63202 15.2975 5.77227 15.1922 5.87491L12.0124 8.97507L12.7636 13.3527C12.7812 13.4545 12.77 13.5592 12.7311 13.655C12.6922 13.7508 12.6273 13.8337 12.5437 13.8944C12.46 13.9552 12.3611 13.9912 12.258 13.9986C12.1549 14.006 12.0518 13.9843 11.9604 13.936L8.02942 11.8692L4.09839 13.936C3.99107 13.9931 3.86644 14.0122 3.74701 13.9914C3.44582 13.9395 3.2433 13.6539 3.29523 13.3527L4.04646 8.97507L0.866679 5.87491C0.780131 5.79009 0.723009 5.67931 0.7057 5.55814C0.658964 5.25522 0.870142 4.9748 1.17306 4.9298Z"
                                                          fill="#757F8F" fill-opacity="0.4"/>
                                                   </svg>
                                                </span>
                                                    <span>
                                                   <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                      <path
                                                          d="M1.17306 4.9298L5.56798 4.29107L7.53263 0.308118C7.58629 0.199068 7.67457 0.110788 7.78362 0.0571283C8.05711 -0.0778871 8.38946 0.0346257 8.52621 0.308118L10.4909 4.29107L14.8858 4.9298C15.0069 4.94711 15.1177 5.00423 15.2025 5.09078C15.3051 5.19617 15.3616 5.33796 15.3596 5.48499C15.3577 5.63202 15.2975 5.77227 15.1922 5.87491L12.0124 8.97507L12.7636 13.3527C12.7812 13.4545 12.77 13.5592 12.7311 13.655C12.6922 13.7508 12.6273 13.8337 12.5437 13.8944C12.46 13.9552 12.3611 13.9912 12.258 13.9986C12.1549 14.006 12.0518 13.9843 11.9604 13.936L8.02942 11.8692L4.09839 13.936C3.99107 13.9931 3.86644 14.0122 3.74701 13.9914C3.44582 13.9395 3.2433 13.6539 3.29523 13.3527L4.04646 8.97507L0.866679 5.87491C0.780131 5.79009 0.723009 5.67931 0.7057 5.55814C0.658964 5.25522 0.870142 4.9748 1.17306 4.9298Z"
                                                          fill="#757F8F" fill-opacity="0.4"/>
                                                   </svg>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-span-8">
                                            <div class="flex items-center gap-3">
                                                <div class="rating-line bg-gray-300 h-2 w-full rounded-md">
                                                </div>
                                                <div class="ratin-number w-8">
                                                    <p class="text-black-200">0</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="client-rating mt-8">
                                <div class="client-box">
                                    <div class="client-info flex justify-between">
                                        <div class="author-box flex items-center">
                                            <img class="w-10 h-10 rounded-full object-fit"
                                                 src="{{asset('frontend/assets/images/author/2.webp')}}"
                                                 alt="author">
                                            <div class="course-content ml-2">
                                                <h6
                                                    class="font-serif text-base text-black-200 hover:text-blue-800 font-medium duration-300">
                                                    Brooklyn Simmons
                                                </h6>
                                                <p class="text-sm  font-normal opacity-60">
                                                    Dog Trainer
                                                </p>
                                            </div>
                                        </div>
                                        <div class="rating-number">
                                            <p class="text-sm text-blue-50 mb-2">1 hour ago</p>
                                            <div class="rating-box">
                                                <div class="rating-star flex gap-1">
                                                 <span>
                                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                       <path
                                                           d="M1.17111 4.9298L5.56603 4.29107L7.53068 0.308118C7.58434 0.199068 7.67262 0.110788 7.78167 0.0571283C8.05516 -0.0778871 8.38751 0.0346257 8.52425 0.308118L10.4889 4.29107L14.8838 4.9298C15.005 4.94711 15.1158 5.00423 15.2006 5.09078C15.3031 5.19617 15.3596 5.33796 15.3577 5.48499C15.3557 5.63202 15.2955 5.77227 15.1902 5.87491L12.0104 8.97507L12.7617 13.3527C12.7793 13.4545 12.768 13.5592 12.7291 13.655C12.6903 13.7508 12.6253 13.8337 12.5417 13.8944C12.4581 13.9552 12.3591 13.9913 12.256 13.9986C12.153 14.0059 12.0499 13.9843 11.9585 13.936L8.02747 11.8692L4.09644 13.936C3.98912 13.9931 3.86449 14.0122 3.74505 13.9914C3.44387 13.9395 3.24134 13.6539 3.29327 13.3527L4.04451 8.97507L0.864726 5.87491C0.778178 5.79009 0.721056 5.67931 0.703747 5.55814C0.657011 5.25522 0.868189 4.9748 1.17111 4.9298Z"
                                                           fill="#FFA800"/>
                                                    </svg>
                                                 </span>
                                                    <span>
                                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                       <path
                                                           d="M1.17111 4.9298L5.56603 4.29107L7.53068 0.308118C7.58434 0.199068 7.67262 0.110788 7.78167 0.0571283C8.05516 -0.0778871 8.38751 0.0346257 8.52425 0.308118L10.4889 4.29107L14.8838 4.9298C15.005 4.94711 15.1158 5.00423 15.2006 5.09078C15.3031 5.19617 15.3596 5.33796 15.3577 5.48499C15.3557 5.63202 15.2955 5.77227 15.1902 5.87491L12.0104 8.97507L12.7617 13.3527C12.7793 13.4545 12.768 13.5592 12.7291 13.655C12.6903 13.7508 12.6253 13.8337 12.5417 13.8944C12.4581 13.9552 12.3591 13.9913 12.256 13.9986C12.153 14.0059 12.0499 13.9843 11.9585 13.936L8.02747 11.8692L4.09644 13.936C3.98912 13.9931 3.86449 14.0122 3.74505 13.9914C3.44387 13.9395 3.24134 13.6539 3.29327 13.3527L4.04451 8.97507L0.864726 5.87491C0.778178 5.79009 0.721056 5.67931 0.703747 5.55814C0.657011 5.25522 0.868189 4.9748 1.17111 4.9298Z"
                                                           fill="#FFA800"/>
                                                    </svg>
                                                 </span>
                                                    <span>
                                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                       <path
                                                           d="M1.17111 4.9298L5.56603 4.29107L7.53068 0.308118C7.58434 0.199068 7.67262 0.110788 7.78167 0.0571283C8.05516 -0.0778871 8.38751 0.0346257 8.52425 0.308118L10.4889 4.29107L14.8838 4.9298C15.005 4.94711 15.1158 5.00423 15.2006 5.09078C15.3031 5.19617 15.3596 5.33796 15.3577 5.48499C15.3557 5.63202 15.2955 5.77227 15.1902 5.87491L12.0104 8.97507L12.7617 13.3527C12.7793 13.4545 12.768 13.5592 12.7291 13.655C12.6903 13.7508 12.6253 13.8337 12.5417 13.8944C12.4581 13.9552 12.3591 13.9913 12.256 13.9986C12.153 14.0059 12.0499 13.9843 11.9585 13.936L8.02747 11.8692L4.09644 13.936C3.98912 13.9931 3.86449 14.0122 3.74505 13.9914C3.44387 13.9395 3.24134 13.6539 3.29327 13.3527L4.04451 8.97507L0.864726 5.87491C0.778178 5.79009 0.721056 5.67931 0.703747 5.55814C0.657011 5.25522 0.868189 4.9748 1.17111 4.9298Z"
                                                           fill="#FFA800"/>
                                                    </svg>
                                                 </span>
                                                    <span>
                                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                       <path
                                                           d="M1.17111 4.9298L5.56603 4.29107L7.53068 0.308118C7.58434 0.199068 7.67262 0.110788 7.78167 0.0571283C8.05516 -0.0778871 8.38751 0.0346257 8.52425 0.308118L10.4889 4.29107L14.8838 4.9298C15.005 4.94711 15.1158 5.00423 15.2006 5.09078C15.3031 5.19617 15.3596 5.33796 15.3577 5.48499C15.3557 5.63202 15.2955 5.77227 15.1902 5.87491L12.0104 8.97507L12.7617 13.3527C12.7793 13.4545 12.768 13.5592 12.7291 13.655C12.6903 13.7508 12.6253 13.8337 12.5417 13.8944C12.4581 13.9552 12.3591 13.9913 12.256 13.9986C12.153 14.0059 12.0499 13.9843 11.9585 13.936L8.02747 11.8692L4.09644 13.936C3.98912 13.9931 3.86449 14.0122 3.74505 13.9914C3.44387 13.9395 3.24134 13.6539 3.29327 13.3527L4.04451 8.97507L0.864726 5.87491C0.778178 5.79009 0.721056 5.67931 0.703747 5.55814C0.657011 5.25522 0.868189 4.9748 1.17111 4.9298Z"
                                                           fill="#FFA800"/>
                                                    </svg>
                                                 </span>
                                                    <span>
                                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                       <path
                                                           d="M1.17111 4.9298L5.56603 4.29107L7.53068 0.308118C7.58434 0.199068 7.67262 0.110788 7.78167 0.0571283C8.05516 -0.0778871 8.38751 0.0346257 8.52425 0.308118L10.4889 4.29107L14.8838 4.9298C15.005 4.94711 15.1158 5.00423 15.2006 5.09078C15.3031 5.19617 15.3596 5.33796 15.3577 5.48499C15.3557 5.63202 15.2955 5.77227 15.1902 5.87491L12.0104 8.97507L12.7617 13.3527C12.7793 13.4545 12.768 13.5592 12.7291 13.655C12.6903 13.7508 12.6253 13.8337 12.5417 13.8944C12.4581 13.9552 12.3591 13.9913 12.256 13.9986C12.153 14.0059 12.0499 13.9843 11.9585 13.936L8.02747 11.8692L4.09644 13.936C3.98912 13.9931 3.86449 14.0122 3.74505 13.9914C3.44387 13.9395 3.24134 13.6539 3.29327 13.3527L4.04451 8.97507L0.864726 5.87491C0.778178 5.79009 0.721056 5.67931 0.703747 5.55814C0.657011 5.25522 0.868189 4.9748 1.17111 4.9298Z"
                                                           fill="#FFA800"/>
                                                    </svg>
                                                 </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-6">Separated where lane. Rival this no and the eminent we day
                                        gradual two drunk if she never box around which time the pointing
                                        forwards,
                                    </p>
                                </div>
                            </div>
                            <div class="client-rating mt-8">
                                <div class="client-box">
                                    <div class="client-info flex justify-between">
                                        <div class="author-box flex items-center">
                                            <img class="w-10 h-10 rounded-full object-fit"
                                                 src="{{asset('frontend/assets/images/author/4.webp')}}"
                                                 alt="author">
                                            <div class="course-content ml-2">
                                                <h6
                                                    class="font-serif text-base text-black-200 hover:text-blue-800 font-medium duration-300">
                                                    Jenny Wilson
                                                </h6>
                                                <p class="text-sm  font-normal opacity-60">
                                                    Medical Assistant
                                                </p>
                                            </div>
                                        </div>
                                        <div class="rating-number">
                                            <p class="text-sm text-blue-50 mb-2">2 hour ago</p>
                                            <div class="rating-box">
                                                <div class="rating-star flex gap-1">
                                                 <span>
                                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                       <path
                                                           d="M1.17111 4.9298L5.56603 4.29107L7.53068 0.308118C7.58434 0.199068 7.67262 0.110788 7.78167 0.0571283C8.05516 -0.0778871 8.38751 0.0346257 8.52425 0.308118L10.4889 4.29107L14.8838 4.9298C15.005 4.94711 15.1158 5.00423 15.2006 5.09078C15.3031 5.19617 15.3596 5.33796 15.3577 5.48499C15.3557 5.63202 15.2955 5.77227 15.1902 5.87491L12.0104 8.97507L12.7617 13.3527C12.7793 13.4545 12.768 13.5592 12.7291 13.655C12.6903 13.7508 12.6253 13.8337 12.5417 13.8944C12.4581 13.9552 12.3591 13.9913 12.256 13.9986C12.153 14.0059 12.0499 13.9843 11.9585 13.936L8.02747 11.8692L4.09644 13.936C3.98912 13.9931 3.86449 14.0122 3.74505 13.9914C3.44387 13.9395 3.24134 13.6539 3.29327 13.3527L4.04451 8.97507L0.864726 5.87491C0.778178 5.79009 0.721056 5.67931 0.703747 5.55814C0.657011 5.25522 0.868189 4.9748 1.17111 4.9298Z"
                                                           fill="#FFA800"/>
                                                    </svg>
                                                 </span>
                                                    <span>
                                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                       <path
                                                           d="M1.17111 4.9298L5.56603 4.29107L7.53068 0.308118C7.58434 0.199068 7.67262 0.110788 7.78167 0.0571283C8.05516 -0.0778871 8.38751 0.0346257 8.52425 0.308118L10.4889 4.29107L14.8838 4.9298C15.005 4.94711 15.1158 5.00423 15.2006 5.09078C15.3031 5.19617 15.3596 5.33796 15.3577 5.48499C15.3557 5.63202 15.2955 5.77227 15.1902 5.87491L12.0104 8.97507L12.7617 13.3527C12.7793 13.4545 12.768 13.5592 12.7291 13.655C12.6903 13.7508 12.6253 13.8337 12.5417 13.8944C12.4581 13.9552 12.3591 13.9913 12.256 13.9986C12.153 14.0059 12.0499 13.9843 11.9585 13.936L8.02747 11.8692L4.09644 13.936C3.98912 13.9931 3.86449 14.0122 3.74505 13.9914C3.44387 13.9395 3.24134 13.6539 3.29327 13.3527L4.04451 8.97507L0.864726 5.87491C0.778178 5.79009 0.721056 5.67931 0.703747 5.55814C0.657011 5.25522 0.868189 4.9748 1.17111 4.9298Z"
                                                           fill="#FFA800"/>
                                                    </svg>
                                                 </span>
                                                    <span>
                                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                       <path
                                                           d="M1.17111 4.9298L5.56603 4.29107L7.53068 0.308118C7.58434 0.199068 7.67262 0.110788 7.78167 0.0571283C8.05516 -0.0778871 8.38751 0.0346257 8.52425 0.308118L10.4889 4.29107L14.8838 4.9298C15.005 4.94711 15.1158 5.00423 15.2006 5.09078C15.3031 5.19617 15.3596 5.33796 15.3577 5.48499C15.3557 5.63202 15.2955 5.77227 15.1902 5.87491L12.0104 8.97507L12.7617 13.3527C12.7793 13.4545 12.768 13.5592 12.7291 13.655C12.6903 13.7508 12.6253 13.8337 12.5417 13.8944C12.4581 13.9552 12.3591 13.9913 12.256 13.9986C12.153 14.0059 12.0499 13.9843 11.9585 13.936L8.02747 11.8692L4.09644 13.936C3.98912 13.9931 3.86449 14.0122 3.74505 13.9914C3.44387 13.9395 3.24134 13.6539 3.29327 13.3527L4.04451 8.97507L0.864726 5.87491C0.778178 5.79009 0.721056 5.67931 0.703747 5.55814C0.657011 5.25522 0.868189 4.9748 1.17111 4.9298Z"
                                                           fill="#FFA800"/>
                                                    </svg>
                                                 </span>
                                                    <span>
                                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                       <path
                                                           d="M1.17111 4.9298L5.56603 4.29107L7.53068 0.308118C7.58434 0.199068 7.67262 0.110788 7.78167 0.0571283C8.05516 -0.0778871 8.38751 0.0346257 8.52425 0.308118L10.4889 4.29107L14.8838 4.9298C15.005 4.94711 15.1158 5.00423 15.2006 5.09078C15.3031 5.19617 15.3596 5.33796 15.3577 5.48499C15.3557 5.63202 15.2955 5.77227 15.1902 5.87491L12.0104 8.97507L12.7617 13.3527C12.7793 13.4545 12.768 13.5592 12.7291 13.655C12.6903 13.7508 12.6253 13.8337 12.5417 13.8944C12.4581 13.9552 12.3591 13.9913 12.256 13.9986C12.153 14.0059 12.0499 13.9843 11.9585 13.936L8.02747 11.8692L4.09644 13.936C3.98912 13.9931 3.86449 14.0122 3.74505 13.9914C3.44387 13.9395 3.24134 13.6539 3.29327 13.3527L4.04451 8.97507L0.864726 5.87491C0.778178 5.79009 0.721056 5.67931 0.703747 5.55814C0.657011 5.25522 0.868189 4.9748 1.17111 4.9298Z"
                                                           fill="#FFA800"/>
                                                    </svg>
                                                 </span>
                                                    <span>
                                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                       <path
                                                           d="M1.17111 4.9298L5.56603 4.29107L7.53068 0.308118C7.58434 0.199068 7.67262 0.110788 7.78167 0.0571283C8.05516 -0.0778871 8.38751 0.0346257 8.52425 0.308118L10.4889 4.29107L14.8838 4.9298C15.005 4.94711 15.1158 5.00423 15.2006 5.09078C15.3031 5.19617 15.3596 5.33796 15.3577 5.48499C15.3557 5.63202 15.2955 5.77227 15.1902 5.87491L12.0104 8.97507L12.7617 13.3527C12.7793 13.4545 12.768 13.5592 12.7291 13.655C12.6903 13.7508 12.6253 13.8337 12.5417 13.8944C12.4581 13.9552 12.3591 13.9913 12.256 13.9986C12.153 14.0059 12.0499 13.9843 11.9585 13.936L8.02747 11.8692L4.09644 13.936C3.98912 13.9931 3.86449 14.0122 3.74505 13.9914C3.44387 13.9395 3.24134 13.6539 3.29327 13.3527L4.04451 8.97507L0.864726 5.87491C0.778178 5.79009 0.721056 5.67931 0.703747 5.55814C0.657011 5.25522 0.868189 4.9748 1.17111 4.9298Z"
                                                           fill="#FFA800"/>
                                                    </svg>
                                                 </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-6">Letters, hitting the feel analyzed in arm, that a clothes,
                                        the ambushed continued so for and the out soft assets one trial.
                                    </p>
                                </div>
                            </div>
                            <div class="client-rating mt-8">
                                <div class="client-box">
                                    <div class="client-info flex justify-between">
                                        <div class="author-box flex items-center">
                                            <img class="w-10 h-10 rounded-full object-fit"
                                                 src="{{asset('frontend/assets/images/author/1.webp')}}"
                                                 alt="author">
                                            <div class="course-content ml-2">
                                                <h6
                                                    class="font-serif text-base text-black-200 hover:text-blue-800 font-medium duration-300">
                                                    Theresa Webb
                                                </h6>
                                                <p class="text-sm  font-normal opacity-60">
                                                    Nursing Assistant
                                                </p>
                                            </div>
                                        </div>
                                        <div class="rating-number">
                                            <p class="text-sm text-blue-50 mb-2">3 hour ago</p>
                                            <div class="rating-box">
                                                <div class="rating-star flex gap-1">
                                                 <span>
                                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                       <path
                                                           d="M1.17111 4.9298L5.56603 4.29107L7.53068 0.308118C7.58434 0.199068 7.67262 0.110788 7.78167 0.0571283C8.05516 -0.0778871 8.38751 0.0346257 8.52425 0.308118L10.4889 4.29107L14.8838 4.9298C15.005 4.94711 15.1158 5.00423 15.2006 5.09078C15.3031 5.19617 15.3596 5.33796 15.3577 5.48499C15.3557 5.63202 15.2955 5.77227 15.1902 5.87491L12.0104 8.97507L12.7617 13.3527C12.7793 13.4545 12.768 13.5592 12.7291 13.655C12.6903 13.7508 12.6253 13.8337 12.5417 13.8944C12.4581 13.9552 12.3591 13.9913 12.256 13.9986C12.153 14.0059 12.0499 13.9843 11.9585 13.936L8.02747 11.8692L4.09644 13.936C3.98912 13.9931 3.86449 14.0122 3.74505 13.9914C3.44387 13.9395 3.24134 13.6539 3.29327 13.3527L4.04451 8.97507L0.864726 5.87491C0.778178 5.79009 0.721056 5.67931 0.703747 5.55814C0.657011 5.25522 0.868189 4.9748 1.17111 4.9298Z"
                                                           fill="#FFA800"/>
                                                    </svg>
                                                 </span>
                                                    <span>
                                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                       <path
                                                           d="M1.17111 4.9298L5.56603 4.29107L7.53068 0.308118C7.58434 0.199068 7.67262 0.110788 7.78167 0.0571283C8.05516 -0.0778871 8.38751 0.0346257 8.52425 0.308118L10.4889 4.29107L14.8838 4.9298C15.005 4.94711 15.1158 5.00423 15.2006 5.09078C15.3031 5.19617 15.3596 5.33796 15.3577 5.48499C15.3557 5.63202 15.2955 5.77227 15.1902 5.87491L12.0104 8.97507L12.7617 13.3527C12.7793 13.4545 12.768 13.5592 12.7291 13.655C12.6903 13.7508 12.6253 13.8337 12.5417 13.8944C12.4581 13.9552 12.3591 13.9913 12.256 13.9986C12.153 14.0059 12.0499 13.9843 11.9585 13.936L8.02747 11.8692L4.09644 13.936C3.98912 13.9931 3.86449 14.0122 3.74505 13.9914C3.44387 13.9395 3.24134 13.6539 3.29327 13.3527L4.04451 8.97507L0.864726 5.87491C0.778178 5.79009 0.721056 5.67931 0.703747 5.55814C0.657011 5.25522 0.868189 4.9748 1.17111 4.9298Z"
                                                           fill="#FFA800"/>
                                                    </svg>
                                                 </span>
                                                    <span>
                                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                       <path
                                                           d="M1.17111 4.9298L5.56603 4.29107L7.53068 0.308118C7.58434 0.199068 7.67262 0.110788 7.78167 0.0571283C8.05516 -0.0778871 8.38751 0.0346257 8.52425 0.308118L10.4889 4.29107L14.8838 4.9298C15.005 4.94711 15.1158 5.00423 15.2006 5.09078C15.3031 5.19617 15.3596 5.33796 15.3577 5.48499C15.3557 5.63202 15.2955 5.77227 15.1902 5.87491L12.0104 8.97507L12.7617 13.3527C12.7793 13.4545 12.768 13.5592 12.7291 13.655C12.6903 13.7508 12.6253 13.8337 12.5417 13.8944C12.4581 13.9552 12.3591 13.9913 12.256 13.9986C12.153 14.0059 12.0499 13.9843 11.9585 13.936L8.02747 11.8692L4.09644 13.936C3.98912 13.9931 3.86449 14.0122 3.74505 13.9914C3.44387 13.9395 3.24134 13.6539 3.29327 13.3527L4.04451 8.97507L0.864726 5.87491C0.778178 5.79009 0.721056 5.67931 0.703747 5.55814C0.657011 5.25522 0.868189 4.9748 1.17111 4.9298Z"
                                                           fill="#FFA800"/>
                                                    </svg>
                                                 </span>
                                                    <span>
                                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                       <path
                                                           d="M1.17111 4.9298L5.56603 4.29107L7.53068 0.308118C7.58434 0.199068 7.67262 0.110788 7.78167 0.0571283C8.05516 -0.0778871 8.38751 0.0346257 8.52425 0.308118L10.4889 4.29107L14.8838 4.9298C15.005 4.94711 15.1158 5.00423 15.2006 5.09078C15.3031 5.19617 15.3596 5.33796 15.3577 5.48499C15.3557 5.63202 15.2955 5.77227 15.1902 5.87491L12.0104 8.97507L12.7617 13.3527C12.7793 13.4545 12.768 13.5592 12.7291 13.655C12.6903 13.7508 12.6253 13.8337 12.5417 13.8944C12.4581 13.9552 12.3591 13.9913 12.256 13.9986C12.153 14.0059 12.0499 13.9843 11.9585 13.936L8.02747 11.8692L4.09644 13.936C3.98912 13.9931 3.86449 14.0122 3.74505 13.9914C3.44387 13.9395 3.24134 13.6539 3.29327 13.3527L4.04451 8.97507L0.864726 5.87491C0.778178 5.79009 0.721056 5.67931 0.703747 5.55814C0.657011 5.25522 0.868189 4.9748 1.17111 4.9298Z"
                                                           fill="#FFA800"/>
                                                    </svg>
                                                 </span>
                                                    <span>
                                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                       <path
                                                           d="M1.17111 4.9298L5.56603 4.29107L7.53068 0.308118C7.58434 0.199068 7.67262 0.110788 7.78167 0.0571283C8.05516 -0.0778871 8.38751 0.0346257 8.52425 0.308118L10.4889 4.29107L14.8838 4.9298C15.005 4.94711 15.1158 5.00423 15.2006 5.09078C15.3031 5.19617 15.3596 5.33796 15.3577 5.48499C15.3557 5.63202 15.2955 5.77227 15.1902 5.87491L12.0104 8.97507L12.7617 13.3527C12.7793 13.4545 12.768 13.5592 12.7291 13.655C12.6903 13.7508 12.6253 13.8337 12.5417 13.8944C12.4581 13.9552 12.3591 13.9913 12.256 13.9986C12.153 14.0059 12.0499 13.9843 11.9585 13.936L8.02747 11.8692L4.09644 13.936C3.98912 13.9931 3.86449 14.0122 3.74505 13.9914C3.44387 13.9395 3.24134 13.6539 3.29327 13.3527L4.04451 8.97507L0.864726 5.87491C0.778178 5.79009 0.721056 5.67931 0.703747 5.55814C0.657011 5.25522 0.868189 4.9748 1.17111 4.9298Z"
                                                           fill="#FFA800"/>
                                                    </svg>
                                                 </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-6">Covered client material. Train note it's to farther why he
                                        him distressed we should way your her great their to not through are to
                                        moving be.
                                    </p>
                                </div>
                            </div>
                            <div class="client-rating mt-8">
                                <div class="client-box">
                                    <div class="client-info flex justify-between">
                                        <div class="author-box flex items-center">
                                            <img class="w-10 h-10 rounded-full object-fit"
                                                 src="{{asset('frontend/assets/images/author/3.webp')}}"
                                                 alt="author">
                                            <div class="course-content ml-2">
                                                <h6
                                                    class="font-serif text-base text-black-200 hover:text-blue-800 font-medium duration-300">
                                                    Floyd Miles
                                                </h6>
                                                <p class="text-sm  font-normal opacity-60">
                                                    Marketing Coordinator
                                                </p>
                                            </div>
                                        </div>
                                        <div class="rating-number">
                                            <p class="text-sm text-blue-50 mb-2">4 hour ago</p>
                                            <div class="rating-box">
                                                <div class="rating-star flex gap-1">
                                                 <span>
                                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                       <path
                                                           d="M1.17111 4.9298L5.56603 4.29107L7.53068 0.308118C7.58434 0.199068 7.67262 0.110788 7.78167 0.0571283C8.05516 -0.0778871 8.38751 0.0346257 8.52425 0.308118L10.4889 4.29107L14.8838 4.9298C15.005 4.94711 15.1158 5.00423 15.2006 5.09078C15.3031 5.19617 15.3596 5.33796 15.3577 5.48499C15.3557 5.63202 15.2955 5.77227 15.1902 5.87491L12.0104 8.97507L12.7617 13.3527C12.7793 13.4545 12.768 13.5592 12.7291 13.655C12.6903 13.7508 12.6253 13.8337 12.5417 13.8944C12.4581 13.9552 12.3591 13.9913 12.256 13.9986C12.153 14.0059 12.0499 13.9843 11.9585 13.936L8.02747 11.8692L4.09644 13.936C3.98912 13.9931 3.86449 14.0122 3.74505 13.9914C3.44387 13.9395 3.24134 13.6539 3.29327 13.3527L4.04451 8.97507L0.864726 5.87491C0.778178 5.79009 0.721056 5.67931 0.703747 5.55814C0.657011 5.25522 0.868189 4.9748 1.17111 4.9298Z"
                                                           fill="#FFA800"/>
                                                    </svg>
                                                 </span>
                                                    <span>
                                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                       <path
                                                           d="M1.17111 4.9298L5.56603 4.29107L7.53068 0.308118C7.58434 0.199068 7.67262 0.110788 7.78167 0.0571283C8.05516 -0.0778871 8.38751 0.0346257 8.52425 0.308118L10.4889 4.29107L14.8838 4.9298C15.005 4.94711 15.1158 5.00423 15.2006 5.09078C15.3031 5.19617 15.3596 5.33796 15.3577 5.48499C15.3557 5.63202 15.2955 5.77227 15.1902 5.87491L12.0104 8.97507L12.7617 13.3527C12.7793 13.4545 12.768 13.5592 12.7291 13.655C12.6903 13.7508 12.6253 13.8337 12.5417 13.8944C12.4581 13.9552 12.3591 13.9913 12.256 13.9986C12.153 14.0059 12.0499 13.9843 11.9585 13.936L8.02747 11.8692L4.09644 13.936C3.98912 13.9931 3.86449 14.0122 3.74505 13.9914C3.44387 13.9395 3.24134 13.6539 3.29327 13.3527L4.04451 8.97507L0.864726 5.87491C0.778178 5.79009 0.721056 5.67931 0.703747 5.55814C0.657011 5.25522 0.868189 4.9748 1.17111 4.9298Z"
                                                           fill="#FFA800"/>
                                                    </svg>
                                                 </span>
                                                    <span>
                                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                       <path
                                                           d="M1.17111 4.9298L5.56603 4.29107L7.53068 0.308118C7.58434 0.199068 7.67262 0.110788 7.78167 0.0571283C8.05516 -0.0778871 8.38751 0.0346257 8.52425 0.308118L10.4889 4.29107L14.8838 4.9298C15.005 4.94711 15.1158 5.00423 15.2006 5.09078C15.3031 5.19617 15.3596 5.33796 15.3577 5.48499C15.3557 5.63202 15.2955 5.77227 15.1902 5.87491L12.0104 8.97507L12.7617 13.3527C12.7793 13.4545 12.768 13.5592 12.7291 13.655C12.6903 13.7508 12.6253 13.8337 12.5417 13.8944C12.4581 13.9552 12.3591 13.9913 12.256 13.9986C12.153 14.0059 12.0499 13.9843 11.9585 13.936L8.02747 11.8692L4.09644 13.936C3.98912 13.9931 3.86449 14.0122 3.74505 13.9914C3.44387 13.9395 3.24134 13.6539 3.29327 13.3527L4.04451 8.97507L0.864726 5.87491C0.778178 5.79009 0.721056 5.67931 0.703747 5.55814C0.657011 5.25522 0.868189 4.9748 1.17111 4.9298Z"
                                                           fill="#FFA800"/>
                                                    </svg>
                                                 </span>
                                                    <span>
                                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                       <path
                                                           d="M1.17111 4.9298L5.56603 4.29107L7.53068 0.308118C7.58434 0.199068 7.67262 0.110788 7.78167 0.0571283C8.05516 -0.0778871 8.38751 0.0346257 8.52425 0.308118L10.4889 4.29107L14.8838 4.9298C15.005 4.94711 15.1158 5.00423 15.2006 5.09078C15.3031 5.19617 15.3596 5.33796 15.3577 5.48499C15.3557 5.63202 15.2955 5.77227 15.1902 5.87491L12.0104 8.97507L12.7617 13.3527C12.7793 13.4545 12.768 13.5592 12.7291 13.655C12.6903 13.7508 12.6253 13.8337 12.5417 13.8944C12.4581 13.9552 12.3591 13.9913 12.256 13.9986C12.153 14.0059 12.0499 13.9843 11.9585 13.936L8.02747 11.8692L4.09644 13.936C3.98912 13.9931 3.86449 14.0122 3.74505 13.9914C3.44387 13.9395 3.24134 13.6539 3.29327 13.3527L4.04451 8.97507L0.864726 5.87491C0.778178 5.79009 0.721056 5.67931 0.703747 5.55814C0.657011 5.25522 0.868189 4.9748 1.17111 4.9298Z"
                                                           fill="#FFA800"/>
                                                    </svg>
                                                 </span>
                                                    <span>
                                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                       <path
                                                           d="M1.17111 4.9298L5.56603 4.29107L7.53068 0.308118C7.58434 0.199068 7.67262 0.110788 7.78167 0.0571283C8.05516 -0.0778871 8.38751 0.0346257 8.52425 0.308118L10.4889 4.29107L14.8838 4.9298C15.005 4.94711 15.1158 5.00423 15.2006 5.09078C15.3031 5.19617 15.3596 5.33796 15.3577 5.48499C15.3557 5.63202 15.2955 5.77227 15.1902 5.87491L12.0104 8.97507L12.7617 13.3527C12.7793 13.4545 12.768 13.5592 12.7291 13.655C12.6903 13.7508 12.6253 13.8337 12.5417 13.8944C12.4581 13.9552 12.3591 13.9913 12.256 13.9986C12.153 14.0059 12.0499 13.9843 11.9585 13.936L8.02747 11.8692L4.09644 13.936C3.98912 13.9931 3.86449 14.0122 3.74505 13.9914C3.44387 13.9395 3.24134 13.6539 3.29327 13.3527L4.04451 8.97507L0.864726 5.87491C0.778178 5.79009 0.721056 5.67931 0.703747 5.55814C0.657011 5.25522 0.868189 4.9748 1.17111 4.9298Z"
                                                           fill="#FFA800"/>
                                                    </svg>
                                                 </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-6">Burden satisfaction before various synthesizers might or
                                        small of on a and he could handpainted, what her sort in me into and in
                                        had.
                                    </p>
                                </div>
                            </div>
                            <div class="dropdown-wrap">
                                <a class="flex items-center hover:text-blue-600  justify-center mt-10 transition duration-500 text-black-200 group"
                                   href="#">
                                    Show more
                                    <span>
                                        <svg class="ml-2" width="15" height="8" viewBox="0 0 15 8" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                           <path class="group-hover:stroke-blue-600" d="M1.5 1L7.5 7L13.5 1"
                                                 stroke="#223655" stroke-width="2" stroke-linecap="round"
                                                 stroke-linejoin="round"/>
                                        </svg>
                                     </span>
                                </a>
                            </div>
                        </section>
                        {{--REVIEW SECTION END--}}
                    </div>
                </div>
                <div class="col-span-4">
                    <div class="courses-info-right p-6 shadow-4xl sticky top-32 transition duration-500">

                        @if($course->video != null || $course->youtube_video_id != null)

                            @if($course->intro_video_check == 2)
                                <div class="video-box bg-blue-600 h-60 w-full relative object-cover bg-cente rounded-md"
                                     style="background-image:url({{getImageFile(@$course->image)}})">
                                    <div
                                        class="youtube-button  flex items-center justify-center relative h-full gap-4 ">


                                        <a class="popup-youtube  popup-icon-2 relative bg-white font-semibold w-10 h-10 rounded-full items-center justify-center flex"
                                           href="{{ $course->youtube_video_id }}">
                                            <span>
                                 <svg width="11" height="12" viewBox="0 0 11 12" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.69614 5.13397C10.3628 5.51887 10.3628 6.48113 9.69614 6.86603L2.30383 11.134C1.63717 11.5189 0.803833 11.0377 0.803833 10.2679V1.73205C0.803833 0.962251 1.63717 0.481125 2.30383 0.866025L9.69614 5.13397Z"
                                        fill="
                                          #035AE0"></path>
                                 </svg>
                              </span>
                                        </a>
                                    </div>

                                    @endif

                                </div>


                                @if($course->intro_video_check == 1)
                                    <video class="videoPlayer" id="myVideo"
                                           controls controlsList="nodownload"
                                           style="margin: 8px;">
                                        <source class="xdPlayer lectureVideo"
                                                src="{{ getVideoFile($course->video) }}"
                                                type="video/mp4">
                                    </video>
                                @endif

                            @endif


                            <h3 class="md:text-3xl text-2xl font-bold text-black-200 py-4">
                                @if($course->price != 0.00)
                                    $ {{$course->price}}
                                @else
                                    Free
                                @endif
                            </h3>

                            <div class="flex flex-wrap gap-7 mb-4">
                                <div class="share-button inline-block"
                                     style="border: 2px dotted gray;">
                                    <a class="flex items-center gap-4 text-black-200 py-1 px-8 bg-blue-100" href="#">
                                 <span>
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                       <path
                                           d="M15.9498 19.9998C15.4177 20.0059 14.8913 19.8889 14.4119 19.6578C13.9326 19.4267 13.5131 19.0878 13.1865 18.6676C12.8599 18.2474 12.635 17.7574 12.5292 17.2358C12.4235 16.7142 12.4399 16.1753 12.5772 15.6611L6.33635 12.0941C5.80989 12.5764 5.14793 12.8853 4.4401 12.9789C3.73227 13.0726 3.01276 12.9464 2.379 12.6176C1.74524 12.2887 1.22784 11.7731 0.896862 11.1404C0.565885 10.5078 0.437317 9.78868 0.528567 9.08054C0.619818 8.3724 0.926479 7.7094 1.40703 7.18132C1.88757 6.65324 2.51879 6.28559 3.21522 6.12815C3.91164 5.97072 4.63962 6.03109 5.3006 6.30111C5.96157 6.57113 6.5236 7.03774 6.91058 7.63777L12.5762 4.39873C12.5029 4.12176 12.464 3.83681 12.4605 3.55033C12.4536 2.74105 12.7257 1.9541 13.2311 1.32198C13.7365 0.689863 14.4442 0.25119 15.2352 0.0798236C16.0262 -0.0915424 16.852 0.0148669 17.5737 0.381134C18.2954 0.747402 18.8688 1.35116 19.1975 2.09074C19.5261 2.83032 19.5899 3.66055 19.378 4.44164C19.1662 5.22273 18.6916 5.90697 18.0343 6.37914C17.3771 6.85132 16.5771 7.08259 15.7693 7.03402C14.9614 6.98544 14.195 6.65999 13.599 6.11246L7.46787 9.61669C7.46089 9.87589 7.425 10.1321 7.3592 10.3823L13.6 13.9484C14.0177 13.565 14.5226 13.2894 15.071 13.1454C15.6193 13.0015 16.1945 12.9934 16.7467 13.1221C17.2988 13.2508 17.8112 13.5122 18.2394 13.8838C18.6676 14.2553 18.9987 14.7258 19.2039 15.2543C19.4091 15.7828 19.4823 16.3533 19.417 16.9165C19.3518 17.4797 19.1501 18.0184 18.8295 18.486C18.5089 18.9535 18.079 19.3358 17.5772 19.5996C17.0753 19.8634 16.5167 20.0008 15.9498 19.9998ZM15.9498 15.0151C15.5532 15.0151 15.1728 15.1726 14.8924 15.4531C14.6119 15.7335 14.4544 16.1139 14.4544 16.5105C14.4544 16.9071 14.6119 17.2875 14.8924 17.5679C15.1728 17.8483 15.5532 18.0059 15.9498 18.0059C16.3464 18.0059 16.7268 17.8483 17.0072 17.5679C17.2876 17.2875 17.4452 16.9071 17.4452 16.5105C17.4452 16.1139 17.2876 15.7335 17.0072 15.4531C16.7268 15.1726 16.3464 15.0151 15.9498 15.0151ZM3.98657 8.03654C3.58997 8.03654 3.2096 8.19409 2.92916 8.47454C2.64872 8.75498 2.49117 9.13534 2.49117 9.53195C2.49117 9.92855 2.64872 10.3089 2.92916 10.5894C3.2096 10.8698 3.58997 11.0274 3.98657 11.0274C4.38318 11.0274 4.76354 10.8698 5.04398 10.5894C5.32442 10.3089 5.48197 9.92855 5.48197 9.53195C5.48197 9.13534 5.32442 8.75498 5.04398 8.47454C4.76354 8.19409 4.38318 8.03654 3.98657 8.03654ZM15.9498 2.05493C15.7534 2.05493 15.559 2.09361 15.3775 2.16876C15.1961 2.24391 15.0312 2.35406 14.8924 2.49292C14.7535 2.63178 14.6434 2.79664 14.5682 2.97807C14.4931 3.1595 14.4544 3.35395 14.4544 3.55033C14.4544 3.74671 14.4931 3.94117 14.5682 4.1226C14.6434 4.30403 14.7535 4.46888 14.8924 4.60774C15.0312 4.7466 15.1961 4.85675 15.3775 4.93191C15.559 5.00706 15.7534 5.04574 15.9498 5.04574C16.3464 5.04574 16.7268 4.88819 17.0072 4.60774C17.2876 4.3273 17.4452 3.94694 17.4452 3.55033C17.4452 3.15373 17.2876 2.77337 17.0072 2.49292C16.7268 2.21248 16.3464 2.05493 15.9498 2.05493Z"
                                           fill="#223655"/>
                                    </svg>
                                 </span>
                                        Share
                                    </a>
                                </div>
                                <div class="share-button inline-block" data-bs-toggle="modal"
                                     data-bs-target="#writeReviewModal"
                                     style="border: 2px dotted gray;">
                                    <a class="flex items-center gap-4 text-black-200 py-1 px-8 bg-blue-100" href="#">
                                        Give Review
                                    </a>
                                </div>
                            </div>

                            <div class="courses-info">
                                <h2 class="text-lg font-bold text-black-200">This course includes:</h2>
                                <div class="grid grid-cols-2 my-5">
                                    <div class="flex-col">
                              <span class="flex gap-3 items-center ">
                                 <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0.5C3.5888 0.5 0 4.0888 0 8.5C0 12.9112 3.5888 16.5 8 16.5C12.4112 16.5 16 12.9112 16 8.5C16 4.0888 12.4112 0.5 8 0.5ZM8 14.9C4.4712 14.9 1.6 12.0288 1.6 8.5C1.6 4.9712 4.4712 2.1 8 2.1C11.5288 2.1 14.4 4.9712 14.4 8.5C14.4 12.0288 11.5288 14.9 8 14.9Z"
                                        fill="#757F8F"/>
                                    <path d="M8.8 4.5H7.2V8.8312L9.8344 11.4656L10.9656 10.3344L8.8 8.1688V4.5Z"
                                          fill="#757F8F"/>
                                 </svg>
                                 Course Duration
                              </span>
                                    </div>
                                    <div class="flex-col">
                                        <p class="">
                                            @if($course->course_duration != 0 || $course->course_duration != null)
                                                {{ Carbon\CarbonInterval::seconds($course->course_duration)->cascade()->forHumans()  ?? '' }}
                                            @else
                                                0 Second
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 my-5">
                                    <div class="flex-col">
                              <span class="flex gap-3 items-center ">
                                 <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7 0.5H1C0.734784 0.5 0.48043 0.605357 0.292893 0.792893C0.105357 0.98043 0 1.23478 0 1.5V7.5C0 7.76522 0.105357 8.01957 0.292893 8.20711C0.48043 8.39464 0.734784 8.5 1 8.5H7C7.26522 8.5 7.51957 8.39464 7.70711 8.20711C7.89464 8.01957 8 7.76522 8 7.5V1.5C8 1.23478 7.89464 0.98043 7.70711 0.792893C7.51957 0.605357 7.26522 0.5 7 0.5ZM6 6.5H2V2.5H6V6.5ZM17 10.5H11C10.7348 10.5 10.4804 10.6054 10.2929 10.7929C10.1054 10.9804 10 11.2348 10 11.5V17.5C10 17.7652 10.1054 18.0196 10.2929 18.2071C10.4804 18.3946 10.7348 18.5 11 18.5H17C17.2652 18.5 17.5196 18.3946 17.7071 18.2071C17.8946 18.0196 18 17.7652 18 17.5V11.5C18 11.2348 17.8946 10.9804 17.7071 10.7929C17.5196 10.6054 17.2652 10.5 17 10.5ZM16 16.5H12V12.5H16V16.5ZM14 0.5C11.794 0.5 10 2.294 10 4.5C10 6.706 11.794 8.5 14 8.5C16.206 8.5 18 6.706 18 4.5C18 2.294 16.206 0.5 14 0.5ZM14 6.5C12.897 6.5 12 5.603 12 4.5C12 3.397 12.897 2.5 14 2.5C15.103 2.5 16 3.397 16 4.5C16 5.603 15.103 6.5 14 6.5ZM4 10.5C1.794 10.5 0 12.294 0 14.5C0 16.706 1.794 18.5 4 18.5C6.206 18.5 8 16.706 8 14.5C8 12.294 6.206 10.5 4 10.5ZM4 16.5C2.897 16.5 2 15.603 2 14.5C2 13.397 2.897 12.5 4 12.5C5.103 12.5 6 13.397 6 14.5C6 15.603 5.103 16.5 4 16.5Z"
                                        fill="#757F8F"/>
                                 </svg>
                                 Category
                              </span>
                                    </div>
                                    <div class="flex-col">
                                        <a href="{{route('main.categoryWiseCourses1', $course->category->slug)}}"><p class="">{{ $course->category->name }}</p></a>
                                    </div>
                                </div>
                                {{--<div class="grid grid-cols-2 my-5">
                                    <div class="flex-col">
                              <span class="flex gap-3 items-center ">
                                 <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.9231 0.5L9.84615 2.80769V6.80769L8 5.42308L4.92308 7.73077V11.7308L3.07692 10.3462L0 12.6538V16.5H1.23077V13.2692L3.07692 11.8846L4.92308 13.2692V16.5H6.15385V8.34615L8 6.96154L9.84615 8.34615V16.5H11.0769V3.42308L12.9231 2.03846L14.7692 3.42308V16.5H16V2.80769L12.9231 0.5Z"
                                        fill="#757F8F"/>
                                 </svg>
                                 Higher
                              </span>
                                    </div>
                                    <div class="flex-col">
                                        <p class="">Graphics Designer</p>
                                    </div>
                                </div>--}}
                                <div class="grid grid-cols-2 my-5">
                                    <div class="flex-col">
                              <span class="flex gap-3 items-center ">
                                 <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.3161 3.13618L8.4806 0.524348C8.37976 0.491884 8.27128 0.491884 8.17045 0.524348L0.343109 3.13618H0.326785L0.269651 3.16883H0.261489L0.204355 3.20148C0.204355 3.20364 0.203496 3.20572 0.201965 3.20725C0.200434 3.20878 0.198358 3.20964 0.196193 3.20964L0.13906 3.25861L0.0982499 3.30758C0.0982499 3.30975 0.0973899 3.31182 0.0958593 3.31335C0.0943286 3.31488 0.0922525 3.31574 0.0900878 3.31574L0.05744 3.37288C0.05744 3.38104 0.049278 3.38104 0.049278 3.3892L0.0247919 3.44634C0.0146361 3.46664 0.00906363 3.48893 0.00846807 3.51163C0.00177975 3.53551 -0.000976986 3.56032 0.000306059 3.58509V10.1147C0.000306059 10.2446 0.0519012 10.3691 0.143741 10.461C0.235581 10.5528 0.360143 10.6044 0.490025 10.6044C0.619906 10.6044 0.744468 10.5528 0.836308 10.461C0.928148 10.3691 0.979743 10.2446 0.979743 10.1147V4.27886L4.13843 5.33175C3.56685 6.16847 3.26235 7.15881 3.2651 8.17212C3.26568 9.0868 3.51417 9.98422 3.98414 10.7689C4.4541 11.5536 5.12797 12.1963 5.93406 12.6286C4.27285 13.1755 2.84773 14.2724 1.89388 15.7383C1.85851 15.7924 1.83415 15.853 1.82219 15.9165C1.81022 15.9801 1.81089 16.0453 1.82415 16.1086C1.83742 16.1719 1.86302 16.232 1.89949 16.2853C1.93596 16.3387 1.98259 16.3844 2.03672 16.4198C2.09085 16.4552 2.15141 16.4795 2.21496 16.4915C2.2785 16.5035 2.34378 16.5028 2.40706 16.4895C2.47035 16.4763 2.5304 16.4507 2.5838 16.4142C2.63719 16.3777 2.68287 16.3311 2.71824 16.277C3.32494 15.3421 4.15572 14.5738 5.13503 14.0419C6.11434 13.51 7.21109 13.2314 8.32552 13.2314C9.43996 13.2314 10.5367 13.51 11.516 14.0419C12.4953 14.5738 13.3261 15.3421 13.9328 16.277C13.9796 16.3442 14.0418 16.3993 14.1142 16.4376C14.1866 16.4759 14.2671 16.4964 14.3491 16.4973C14.4425 16.498 14.5338 16.4694 14.6102 16.4157C14.6644 16.3809 14.7112 16.3358 14.7479 16.2829C14.7846 16.23 14.8105 16.1704 14.8242 16.1075C14.8378 16.0445 14.8389 15.9795 14.8274 15.9162C14.8159 15.8528 14.7921 15.7924 14.7572 15.7383C13.8033 14.2724 12.3782 13.1755 10.717 12.6286C11.5231 12.1963 12.1969 11.5536 12.6669 10.7689C13.1369 9.98422 13.3854 9.0868 13.386 8.17212C13.3887 7.15881 13.0842 6.16847 12.5126 5.33175L16.3161 4.06665C16.4141 4.03444 16.4994 3.97213 16.5599 3.88859C16.6203 3.80505 16.6529 3.70455 16.6529 3.60141C16.6529 3.49828 16.6203 3.39778 16.5599 3.31424C16.4994 3.2307 16.4141 3.16838 16.3161 3.13618ZM12.4065 8.17212C12.4063 8.82211 12.2508 9.46265 11.9531 10.0404C11.6553 10.6182 11.2238 11.1165 10.6945 11.4938C10.1653 11.8711 9.55355 12.1165 8.91027 12.2097C8.26699 12.3028 7.61076 12.2409 6.99622 12.0292C6.38168 11.8175 5.8266 11.462 5.37719 10.9925C4.92778 10.5229 4.59703 9.95273 4.41248 9.32949C4.22793 8.70625 4.19492 8.04794 4.3162 7.40937C4.43747 6.77079 4.70952 6.17042 5.1097 5.65823L8.17045 6.67848C8.27128 6.71094 8.37976 6.71094 8.4806 6.67848L11.5413 5.65823C12.1 6.37734 12.4043 7.2615 12.4065 8.17212ZM8.32552 5.69904L2.0408 3.60141L8.32552 1.50378L14.6102 3.60141L8.32552 5.69904Z"
                                        fill="#757F8F"/>
                                 </svg>
                                 Student Enrolled
                              </span>
                                    </div>
                                    <div class="flex-col">
                                        <p class="">{{$total_enrolled_students}}</p>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 my-5">
                                    <div class="flex-col">
                              <span class="flex gap-3 items-center ">
                                 <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.1377 5.63725V8.92559C7.1377 9.23834 7.30748 9.53322 7.57555 9.69406L10.3635 11.3472C10.6852 11.5348 11.0962 11.4276 11.2839 11.1148C11.4715 10.7931 11.3732 10.3821 11.0515 10.1945L8.48699 8.66645V5.62831C8.47806 5.27089 8.17424 4.96707 7.80788 4.96707C7.44151 4.96707 7.1377 5.27089 7.1377 5.63725ZM16.0734 6.30743V1.58044C16.0734 1.17834 15.5909 0.981751 15.3139 1.26769L13.7233 2.85825C12.8863 2.02117 11.8749 1.37897 10.7613 0.977394C9.64776 0.575822 8.45931 0.42476 7.28067 0.534967C3.53661 0.874523 0.453798 3.88585 0.0427555 7.62991C-0.174523 9.72924 0.442166 11.8298 1.75979 13.4786C3.0774 15.1273 4.99034 16.192 7.08591 16.4429C9.18148 16.6939 11.2917 16.111 12.9614 14.82C14.631 13.529 15.7263 11.6334 16.0108 9.54215C16.0734 9.00601 15.6534 8.54135 15.1173 8.54135C14.6705 8.54135 14.2952 8.87197 14.2416 9.30982C13.8573 12.4284 11.1677 14.841 7.94191 14.7963C4.62677 14.7517 1.8299 11.9548 1.77628 8.63071C1.72267 5.14579 4.55528 2.28636 8.03127 2.28636C9.75586 2.28636 11.3196 2.99228 12.4544 4.11818L10.5869 5.98574C10.3009 6.27169 10.4975 6.75421 10.8996 6.75421H15.6266C15.8768 6.75421 16.0734 6.55763 16.0734 6.30743Z"
                                        fill="#757F8F"/>
                                 </svg>
                                 Last Update
                              </span>
                                    </div>
                                    <div class="flex-col">
                                        <p class="">{{ date('d M Y', strtotime(@$course->updated_at)) }}</p>
                                    </div>
                                </div>

                                <div class="course-info-item mb-5">
                           <span class="flex gap-3 items-center ">
                              <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                   xmlns="http://www.w3.org/2000/svg">
                                 <path
                                     d="M1 2.88037C1.885 2.51037 3.154 2.11137 4.388 1.98737C5.718 1.85337 6.846 2.05037 7.5 2.73937V12.4854C6.565 11.9554 5.38 11.8824 4.287 11.9924C3.107 12.1124 1.917 12.4534 1 12.8034V2.88037ZM8.5 2.73937C9.154 2.05037 10.282 1.85337 11.612 1.98737C12.846 2.11137 14.115 2.51037 15 2.88037V12.8034C14.082 12.4534 12.893 12.1114 11.713 11.9934C10.619 11.8824 9.435 11.9544 8.5 12.4854V2.73937ZM8 1.83537C7.015 0.988371 5.587 0.862371 4.287 0.992371C2.773 1.14537 1.245 1.66437 0.293 2.09737C0.205649 2.1371 0.131575 2.20112 0.079621 2.2818C0.0276667 2.36248 2.65714e-05 2.45641 0 2.55237V13.5524C2.3162e-05 13.636 0.0210371 13.7183 0.0611171 13.7918C0.101197 13.8652 0.159062 13.9274 0.229411 13.9727C0.29976 14.018 0.380345 14.0449 0.463783 14.0509C0.547222 14.057 0.630848 14.042 0.707 14.0074C1.589 13.6074 3.01 13.1264 4.387 12.9874C5.796 12.8454 6.977 13.0744 7.61 13.8644C7.65685 13.9228 7.71622 13.9699 7.78372 14.0023C7.85122 14.0347 7.92513 14.0515 8 14.0515C8.07487 14.0515 8.14878 14.0347 8.21628 14.0023C8.28378 13.9699 8.34315 13.9228 8.39 13.8644C9.023 13.0744 10.204 12.8454 11.612 12.9874C12.99 13.1264 14.412 13.6074 15.293 14.0074C15.3692 14.042 15.4528 14.057 15.5362 14.0509C15.6197 14.0449 15.7002 14.018 15.7706 13.9727C15.8409 13.9274 15.8988 13.8652 15.9389 13.7918C15.979 13.7183 16 13.636 16 13.5524V2.55237C16 2.45641 15.9723 2.36248 15.9204 2.2818C15.8684 2.20112 15.7944 2.1371 15.707 2.09737C14.755 1.66437 13.227 1.14537 11.713 0.992371C10.413 0.861371 8.985 0.988371 8 1.83537Z"
                                     fill="#757F8F"/>
                              </svg>
                              5 assignments
                           </span>
                                </div>
                                <div class="course-info-item mb-5">
                           <span class="flex gap-3 items-center ">
                              <svg width="20" height="19" viewBox="0 0 20 19" fill="none"
                                   xmlns="http://www.w3.org/2000/svg">
                                 <path
                                     d="M9.88889 12.1667V1.5M9.88889 12.1667L6.33333 8.61111M9.88889 12.1667L13.4444 8.61111M1 13.9444L1.552 16.1533C1.64814 16.5379 1.87007 16.8794 2.18252 17.1234C2.49497 17.3674 2.88001 17.4999 3.27644 17.5H16.5013C16.8978 17.4999 17.2828 17.3674 17.5953 17.1234C17.9077 16.8794 18.1296 16.5379 18.2258 16.1533L18.7778 13.9444"
                                     stroke="#757F8F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                              </svg>
                              Downloadable resources
                           </span>
                                </div>
                                <div class="course-info-item mb-5">
                           <span class="flex gap-3 items-center ">
                              <svg width="11" height="17" viewBox="0 0 11 17" fill="none"
                                   xmlns="http://www.w3.org/2000/svg">
                                 <path
                                     d="M9.14286 0.5H1.14286C0.839752 0.5 0.549063 0.620408 0.334735 0.834735C0.120408 1.04906 0 1.33975 0 1.64286V15.3571C0 15.6602 0.120408 15.9509 0.334735 16.1653C0.549063 16.3796 0.839752 16.5 1.14286 16.5H9.14286C9.44596 16.5 9.73665 16.3796 9.95098 16.1653C10.1653 15.9509 10.2857 15.6602 10.2857 15.3571V1.64286C10.2857 1.33975 10.1653 1.04906 9.95098 0.834735C9.73665 0.620408 9.44596 0.5 9.14286 0.5ZM1.14286 1.64286H9.14286V11.9286H1.14286V1.64286ZM1.14286 15.3571V13.0714H9.14286V15.3571H1.14286Z"
                                     fill="#757F8F"/>
                                 <path d="M4.57143 13.6429H5.71429V14.7857H4.57143V13.6429Z" fill="#757F8F"/>
                              </svg>
                              Access on mobile and TV
                           </span>
                                </div>
                                <div class="course-info-item mb-5">
                           <span class="flex gap-3 items-center ">
                              <svg width="15" height="17" viewBox="0 0 15 17" fill="none"
                                   xmlns="http://www.w3.org/2000/svg">
                                 <path
                                     d="M7.48062 0.5C7.096 0.5 6.71385 0.629231 6.38462 0.865539L5.36554 1.57692L4.19138 1.73077H4.17231L4.15323 1.74985C3.76815 1.83681 3.41559 2.03113 3.13644 2.31028C2.85728 2.58944 2.66296 2.94199 2.576 3.32708L2.55754 3.34615V3.36523L2.40369 4.55785L1.69231 5.48092L1.67262 5.5V5.51908C1.24246 6.20646 1.22338 7.09385 1.69231 7.74985L2.42277 8.76892L2.61538 9.82738L0.634462 12.8458L0 13.7886H2.94215L3.65354 15.4422L4.096 16.5L4.73046 15.5382L6.67262 12.6151C7.19446 12.8292 7.78338 12.8489 8.28862 12.6151L10.2308 15.5382L10.8652 16.5L11.3077 15.4422L12.0191 13.7886H14.9612L14.3268 12.8458L12.4037 9.92338L12.5575 8.76954L13.2689 7.75046L13.2886 7.73139V7.71231C13.7188 7.02492 13.7378 6.15662 13.2689 5.50062L12.5575 4.48092L12.3268 3.32708H12.3458C12.3434 3.31231 12.3292 3.30246 12.3268 3.28831C12.216 2.48338 11.5791 1.82985 10.7692 1.73077H10.7495L9.59569 1.57692L8.57662 0.865539C8.25834 0.63238 7.87513 0.504571 7.48062 0.5ZM7.48062 1.74985C7.62215 1.74985 7.76185 1.79292 7.86523 1.86554L8.96123 2.65385L9.096 2.74985L9.24985 2.76954L10.5963 2.96154H10.6148C10.8917 2.99231 11.0837 3.18492 11.1151 3.46185V3.5L11.3655 4.86554L11.384 5.00031L11.4806 5.11538L12.2689 6.21138C12.416 6.41569 12.4351 6.76215 12.2498 7.05754L11.3846 8.26923L11.3649 8.42308L11.1729 9.76954V9.788C11.1627 9.88417 11.1298 9.97655 11.0769 10.0575L11.0382 10.0772V10.0957C10.9467 10.2055 10.8155 10.2748 10.6732 10.2883H10.6345L9.23077 10.5388L9.07692 10.5572L8.96123 10.6538L7.86523 11.4422C7.66092 11.5892 7.29538 11.6083 7 11.4231L6 10.6538L5.88431 10.5578L5.71138 10.5382L4.36492 10.3462H4.34646C4.25945 10.3385 4.17556 10.31 4.10187 10.2631C4.02818 10.2162 3.96686 10.1522 3.92308 10.0766C3.88218 10.0056 3.85602 9.92716 3.84615 9.84585V9.80769L3.59631 8.404L3.57662 8.25015L3.48062 8.13446L2.69231 7.03846C2.54523 6.83415 2.52615 6.46862 2.71138 6.17323L3.48062 5.17323L3.57662 5.05754L3.59569 4.88462L3.76923 3.596C3.77169 3.58677 3.78585 3.58677 3.78831 3.57692C3.82667 3.42878 3.90396 3.29361 4.01217 3.1854C4.12037 3.07719 4.25555 2.9999 4.40369 2.96154C4.41354 2.95908 4.41354 2.94492 4.42277 2.94246L5.71138 2.76892L5.86523 2.75046L6 2.65385L7.096 1.86554C7.19939 1.79354 7.33908 1.74985 7.48062 1.74985ZM11.7305 11.1154L12.6732 12.5578H11.1914L11.0375 12.9425L10.6148 13.9228L9.30708 11.9228L9.59508 11.7117L10.8074 11.5V11.5191C10.8215 11.5166 10.8308 11.5025 10.8455 11.5C11.1694 11.4533 11.4754 11.3204 11.7305 11.1154ZM3.23077 11.1345C3.49798 11.3774 3.83368 11.5319 4.192 11.5769H4.21108L5.38462 11.7308L5.65354 11.9425L4.34585 13.9228L3.92308 12.9425L3.76923 12.5578H2.28862L3.23077 11.1345Z"
                                     fill="#757F8F"/>
                              </svg>
                              Certificate of completion
                           </span>
                                </div>

                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  ====================== Hero  Area End =============================  -->

@endsection
