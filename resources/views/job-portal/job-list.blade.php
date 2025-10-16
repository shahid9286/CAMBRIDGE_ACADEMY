@extends('job-portal.layouts.master')
@section('title', 'Job list')


@section('content')

    <section class="section-box-2">
        <div class="container">
            <div class="banner-hero banner-single banner-single-bg">
                <div class="block-banner text-center">
                    <h3 class="wow animate__animated animate__fadeInUp">
                        <span class="color-brand-2">{{ \App\Models\JobVacancy::count() ?? 0 }} Jobs</span> Available Now
                    </h3>
                    <div class="font-sm color-text-paragraph-2 mt-10 wow animate__animated animate__fadeInUp"
                        data-wow-delay=".1s">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero repellendus magni,
                        <br class="d-none d-xl-block">atque delectus molestias quis?
                    </div>
                    <div class="form-find text-start mt-40 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <form id="job-search-form">
                            @csrf
                            <div class="box-industry">
                                <select class="form-input mr-10 select-active input-industry" name="industry"
                                    id="industry">
                                    <option value="">All Industries</option>
                                    @foreach ($industries as $industry)
                                        <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <select class="form-input mr-10 select-active" name="job_type" id="job_type">
                                <option value="">Job Type</option>
                                @foreach ($jobTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->title }}</option>
                                @endforeach
                            </select>
                            <input class="form-input input-keysearch mr-10" type="text" name="keyword" id="keyword"
                                placeholder="Your keyword...">
                            <button type="submit" class="btn btn-default btn-find font-sm">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-box mt-30">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 float-right">
                    <div class="content-page">
                        <div class="box-filters-job">
                            <div class="row">
                                <div class="col-xl-6 col-lg-5">
                                    <span class="text-small text-showing" id="showing-text">Showing <strong>0-0</strong> of
                                        <strong>0</strong> jobs</span>
                                </div>
                                <div class="col-xl-6 col-lg-7 text-lg-end mt-sm-15">
                                    <div class="display-flex2">
                                        <div class="box-border mr-10">
                                            <span class="text-sortby">Show:</span>
                                            <div class="dropdown dropdown-sort">
                                                <button class="btn dropdown-toggle" id="dropdownSort" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    data-bs-display="static">
                                                    <span>2</span><i class="fi-rr-angle-small-down"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-light"
                                                    aria-labelledby="dropdownSort">
                                                    <li><a class="dropdown-item active" href="#" data-value="12">12</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#" data-value="24">24</a></li>
                                                    <li><a class="dropdown-item" href="#" data-value="36">36</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="box-border">
                                            <span class="text-sortby">Sort by:</span>
                                            <div class="dropdown dropdown-sort">
                                                <button class="btn dropdown-toggle" id="dropdownSort2" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    data-bs-display="static">
                                                    <span>Newest Job</span><i class="fi-rr-angle-small-down"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-light"
                                                    aria-labelledby="dropdownSort2">
                                                    <li><a class="dropdown-item active" href="#"
                                                            data-value="newest">Newest Jobs</a></li>
                                                    <li><a class="dropdown-item" href="#" data-value="oldest">Oldest
                                                            Jobs</a></li>

                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="jobs-container">

                            <div class="text-center mt-50" id="loading-indicator">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <p class="mt-2">Loading jobs...</p>
                            </div>
                        </div>

                        <div class="paginations" id="pagination-container">

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="section-box mt-50 mb-50">
        <div class="container">
            <div class="text-start">
                <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">News and Blog</h2>
                <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Get the latest news,
                    updates and tips</p>
            </div>
        </div>
        <div class="container">
            <div class="mt-50">
                <div class="box-swiper style-nav-top">
                    <div class="swiper-container swiper-group-3 swiper">
                        <div class="swiper-wrapper pb-70 pt-5">
                            <div class="swiper-slide">
                                <div class="card-grid-3 hover-up wow animate__animated animate__fadeIn">
                                    <div class="text-center card-grid-3-image"><a href="#">
                                            <figure><img alt="jobBox" src="assets/imgs/page/homepage1/img-news1.png">
                                            </figure>
                                        </a></div>
                                    <div class="card-block-info">
                                        <div class="tags mb-15"><a class="btn btn-tag" href="blog-grid.html">News</a>
                                        </div>
                                        <h5><a href="blog-details.html">21 Job Interview Tips: How To Make a Great
                                                Impression</a></h5>
                                        <p class="mt-10 color-text-paragraph font-sm">Our mission is to create the
                                            world&amp;rsquo;s most sustainable healthcare company by creating high-quality
                                            healthcare products in iconic, sustainable packaging.</p>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-6 col-6">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/page/homepage1/user1.png" alt="jobBox">
                                                        <div class="info-right-img"><span
                                                                class="font-sm font-bold color-brand-1 op-70">Sarah
                                                                Harding</span><br><span
                                                                class="font-xs color-text-paragraph-2">06 September</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 text-end col-6 pt-15"><span
                                                        class="color-text-paragraph-2 font-xs">8 mins to read</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card-grid-3 hover-up wow animate__animated animate__fadeIn">
                                    <div class="text-center card-grid-3-image"><a href="#">
                                            <figure><img alt="jobBox" src="assets/imgs/page/homepage1/img-news2.png">
                                            </figure>
                                        </a></div>
                                    <div class="card-block-info">
                                        <div class="tags mb-15"><a class="btn btn-tag" href="blog-grid.html">Events</a>
                                        </div>
                                        <h5><a href="blog-details.html">39 Strengths and Weaknesses To Discuss in a Job
                                                Interview</a></h5>
                                        <p class="mt-10 color-text-paragraph font-sm">Our mission is to create the
                                            world&amp;rsquo;s most sustainable healthcare company by creating high-quality
                                            healthcare products in iconic, sustainable packaging.</p>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-6 col-6">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/page/homepage1/user2.png" alt="jobBox">
                                                        <div class="info-right-img"><span
                                                                class="font-sm font-bold color-brand-1 op-70">Steven
                                                                Jobs</span><br><span
                                                                class="font-xs color-text-paragraph-2">06 September</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 text-end col-6 pt-15"><span
                                                        class="color-text-paragraph-2 font-xs">6 mins to read</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card-grid-3 hover-up wow animate__animated animate__fadeIn">
                                    <div class="text-center card-grid-3-image"><a href="#">
                                            <figure><img alt="jobBox" src="assets/imgs/page/homepage1/img-news3.png">
                                            </figure>
                                        </a></div>
                                    <div class="card-block-info">
                                        <div class="tags mb-15"><a class="btn btn-tag" href="blog-grid.html">News</a>
                                        </div>
                                        <h5><a href="blog-details.html">Interview Question: Why Dont You Have a Degree?</a>
                                        </h5>
                                        <p class="mt-10 color-text-paragraph font-sm">Learn how to respond if an
                                            interviewer asks you why you dont have a degree, and read example answers that
                                            can help you craft</p>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-6 col-6">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/page/homepage1/user3.png" alt="jobBox">
                                                        <div class="info-right-img"><span
                                                                class="font-sm font-bold color-brand-1 op-70">Wiliam
                                                                Kend</span><br><span
                                                                class="font-xs color-text-paragraph-2">06 September</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 text-end col-6 pt-15"><span
                                                        class="color-text-paragraph-2 font-xs">9 mins to read</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <div class="text-center"><a class="btn btn-brand-1 btn-icon-load mt--30 hover-up"
                        href="blog-grid.html">Load More Posts</a></div>
            </div>
        </div>
    </section>
    <section class="section-box mt-50 mb-20">
        <div class="container">
            <div class="box-newsletter">
                <div class="row">
                    <div class="col-xl-3 col-12 text-center d-none d-xl-block"><img
                            src="assets/imgs/template/newsletter-left.png" alt="joxBox"></div>
                    <div class="col-lg-12 col-xl-6 col-12">
                        <h2 class="text-md-newsletter text-center">New Things Will Always<br> Update Regularly</h2>
                        <div class="box-form-newsletter mt-40">
                            <form class="form-newsletter">
                                <input class="input-newsletter" type="text" value=""
                                    placeholder="Enter your email here">
                                <button class="btn btn-default font-heading icon-send-letter">Subscribe</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-3 col-12 text-center d-none d-xl-block"><img
                            src="assets/imgs/template/newsletter-right.png" alt="joxBox"></div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
    <script>
        $(document).ready(function() {
            // Initial variables
            let currentPage = 1;
            let perPage = 12;
            let sortBy = 'newest';

            loadJobs();

            // Handle form submission
            $('#job-search-form').on('submit', function(e) {
                e.preventDefault();
                currentPage = 1; // Reset to first page on new search
                loadJobs();
            });

            // Handle per page change
            $('.dropdown-item[data-value]').on('click', function(e) {
                e.preventDefault();
                const value = $(this).data('value');

                if ($(this).parent().parent().attr('aria-labelledby') === 'dropdownSort') {
                    // Per page change
                    perPage = value;
                    $('.dropdown-item', $(this).parent().parent()).removeClass('active');
                    $(this).addClass('active');
                    $('#dropdownSort span').text(value);
                } else {
                    // Sort by change
                    sortBy = value;
                    $('.dropdown-item', $(this).parent().parent()).removeClass('active');
                    $(this).addClass('active');
                    $('#dropdownSort2 span').text($(this).text());
                }

                currentPage = 1;
                loadJobs();
            });

            $(document).on('click', '.pager a', function(e) {
                e.preventDefault();
                const url = $(this).attr('href');
                if (url) {
                    const urlParams = new URLSearchParams(url.split('?')[1]);
                    currentPage = urlParams.get('page');
                    loadJobs();
                }
            });

            // Function to load jobs via AJAX
            function loadJobs() {
                $('#jobs-container').html(`
            <div class="text-center mt-50">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mt-2">Loading jobs...</p>
            </div>
        `);

                // Get form data
                const formData = {
                    industry: $('#industry').val(),
                    job_type: $('#job_type').val(),
                    keyword: $('#keyword').val(),
                    page: currentPage,
                    per_page: perPage,
                    sort_by: sortBy,
                    _token: '{{ csrf_token() }}'
                };
                $.ajax({
                    url: '{{ route('front.jobs.search') }}',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            // Update jobs container
                            $('#jobs-container').html(response.html);

                            // Update pagination
                            $('#pagination-container').html(response.pagination);

                            // Update showing text
                            $('#showing-text').html(
                                `Showing <strong>${response.start}-${response.end}</strong> of <strong>${response.total}</strong> jobs`
                            );
                        } else {
                            $('#jobs-container').html(
                                '<div class="alert alert-danger">Error loading jobs. Please try again.</div>'
                            );
                        }
                    },
                    error: function() {
                        $('#jobs-container').html(
                            '<div class="alert alert-danger">Error loading jobs. Please try again.</div>'
                        );
                    }
                });
            }
        });
    </script>
@endsection
