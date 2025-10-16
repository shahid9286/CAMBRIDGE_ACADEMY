@if ($team->isNotEmpty())
    <div class="team-style-one-area default-padding bottom-less bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                    <div class="site-heading text-center">
                        <h4 class="sub-title">Our Expert Members</h4>
                        <h2 class="title split-text">Introducing our skilled visa process specialists</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($team as $member)
                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="team-style-one-item wow fadeInUp">
                            <div class="thumb">
                                <img src="{{ asset($member->photo) }}" alt="Image Not Found">
                                <img src="{{ asset('front/assets/img/shape/31.png') }}" alt="Image Not Found">
                            </div>
                            <div class="info">
                                <h4><a href="team-details.html">{{ $member->name }}</a></h4>
                                <span>{{ $member->designation }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endif
