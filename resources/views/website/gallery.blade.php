@extends('website.layouts.master')
@section('title', 'Gallery')

@section('content')

    @include('website.partials.breadcrumb', [
        'title' => 'Gallery',
        'subtitle' => 'Gallery',
        'image' => $setting->home_beadcrum_img ?? 'website/assets/img/banner/4.jpg',
    ])
    <div class="team-style-one-area default-padding bottom-less">
        <div class="container">
            <div class="row">
                @foreach ($galleries as $gallery)
                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="team-style-one-item wow fadeInUp">
                            <div class="thumb">
                                <img src="{{ asset('assets/admin/img/gallery/' . $gallery->image) }}" alt="Image Not Found">
                                <img src="assets/img/shape/31.png" alt="Image Not Found">

                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>


@endsection
