<div class="breadcrumb-area with-banner bg-cover bg-dark text-light"
    style="background-image: url({{ asset('assets/admin/uploads/courses/' . $course->banner_image) }});">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2>{{ $course->title }}</h2>
                
                <p class="fs-5 mb-0">{!! $course->content !!}</p>
            </div>
        </div>
    </div>
</div>