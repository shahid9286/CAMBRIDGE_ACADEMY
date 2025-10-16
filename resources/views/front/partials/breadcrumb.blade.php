<div class="breadcrumb-area with-banner bg-cover text-center bg-dark text-light"
        style="background-image: url({{ asset($image ?? 'front/assets/img/banner/7.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1>{{ $title ?? 'Title is missing' }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="{{route('website.index')}}"><i class="fas fa-home"></i> Home</a></li>
                            <li class="active">{{ $subtitle ?? '' }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>