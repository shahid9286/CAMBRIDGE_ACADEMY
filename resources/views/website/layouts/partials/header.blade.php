<header>
    <!-- Start Navigation -->
    <nav class="navbar mobile-sidenav navbar-default validnavs navbar-sticky navbar-style-two">

        {{-- <!-- Start Top Search -->
        <div class="top-search">
            <div class="container-xl">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                </div>
            </div>
        </div> --}}
        <!-- End Top Search -->


        <div class="container-full d-flex justify-content-between align-items-center">

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{ route('website.index') }}">
                    <img src="{{ $setting->logo ? asset($setting->logo) : asset('logo.png') }}"
                        class="logo logo-display" alt="Logo">
                    <img src="{{ $setting->logo ? asset($setting->logo) : asset('logo.png') }}"
                        class="logo logo-scrolled" alt="Logo">
                </a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">

                <img src="{{ $setting->logo ? asset($setting->logo) : asset('logo.png') }}" alt="Logo">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-times"></i>
                </button>

                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                    <li>
                        <a href="{{ route('website.index') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('website.about') }}">About Us</a>
                    </li>
                   

                    <li class="dropdown">
                        <a href="{{ route('website.courses') }}" class="dropdown-toggle" data-toggle="dropdown">Courses
                            <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            @foreach ($categories as $category)
                                <li><a
                                        href="{{ route('website.category.wise.courses', ['slug' => $category->slug]) }}">{{ $category->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    @php
                        $exams =
                            optional(App\Models\CourseCategory::where('slug', 'exams')->first())->courses ??
                            collect();
                    @endphp

                    @if ($exams->isNotEmpty())
                        <li class="dropdown">
                            <a href="{{ route('website.category.wise.courses', 'exams') }}"
                                class="dropdown-toggle" data-toggle="dropdown">Exams
                                <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                @foreach ($exams as $course)
                                    <li>
                                        <a href="{{ route('website.course.detail', ['slug' => $course->slug]) }}">
                                            {{ $course->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif

                    {{-- @php
                        $short_courses =
                            optional(App\Models\CourseCategory::where('slug', 'short-courses')->first())->courses ??
                            collect();

                        $profestional_courses =
                            optional(App\Models\CourseCategory::where('slug', 'professional-courses')->first())
                                ->courses ?? collect();
                    @endphp

                    @if ($short_courses->isNotEmpty())
                        <li class="dropdown">
                            <a href="{{ route('website.category.wise.courses', 'short-courses') }}"
                                class="dropdown-toggle" data-toggle="dropdown">Short Courses
                                <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                @foreach ($short_courses as $course)
                                    <li>
                                        <a href="{{ route('website.course.detail', ['slug' => $course->slug]) }}">
                                            {{ $course->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                    @if ($profestional_courses->isNotEmpty())
                        <li class="dropdown">
                            <a href="{{ route('website.category.wise.courses', 'professional-courses') }}"
                                class="dropdown-toggle" data-toggle="dropdown">Profestional Courses
                                <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                @foreach ($profestional_courses as $course)
                                    <li>
                                        <a href="{{ route('website.course.detail', ['slug' => $course->slug]) }}">
                                            {{ $course->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif --}}

                     <li>
                        <a href="{{ route('website.gallery') }}">Gallery</a>
                    </li>
                    {{-- <li>
                        <a href="{{ route('website.blogs') }}">Blogs</a>
                    </li> --}}

                    <li>
                        <a href="{{ route('website.contactus') }}">Contact Us</a>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->

            <div class="attr-right">
                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        {{-- <li class="contact">
                            <div class="call">
                                <div class="icon">
                                    <img src="{{ asset('website/assets/img/icon/phone.png') }}" alt="Image Not Found">
                                </div>
                                <div class="info">
                                    <p>Course Hotline </p>
                                    <h5><a href="tel:{{ $setting->phone_no }}">{{ $setting->phone_no }}</a></h5>
                                </div>
                            </div>
                        </li> --}}
                        <li>
                            @guest
                                <a href="{{ route('website.apply.now') }}" class="btn-style-one">Apply Now
                                    <span></span></a>
                            @endguest
                            @auth
                                <a href="{{ route('admin.dashboard') }}" class="btn-style-one">Dashboard <span></span></a>
                            @endauth

                        </li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>

        </div>
        <!-- Overlay screen for menu -->
        <div class="overlay-screen"></div>
        <!-- End Overlay screen for menu -->

    </nav>
    <!-- End Navigation -->
</header>
