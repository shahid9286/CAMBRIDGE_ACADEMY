@if (!empty($bannerList) && count($bannerList) > 0)
    <div class="container mt-5">
        <div class="row">
            @foreach($bannerList as $banner)
                <div class="col-12 col-sm-{{ 12 / min($bannerList->count(), 12) }} mb-4">
                    <a href="{{ $banner->link ?? '#' }}" target="_blank">
                        <img src="{{ $banner->image }}" class="img-fluid" alt="Banner">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endif