<div class="footer-top-area bg-dark-secondary text-light" style="background-image: url({{asset('front/assets/img/shape/17.png')}});">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <ul class="address-list py-5">
                        <li>
                            <div class="icon"><i class="fas fa-envelope"></i></div>
                            <div class="info">
                                <h4>Email:</h4>
                                <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
                            </div>
                        </li>
                        <li>
                            <div class="icon"><i class="bi bi-geo-alt"></i></div>
                            <div class="info">
                                <h4>Address:</h4>
                                <p>
                                    {!! $setting->address !!}
                                </p>
                            </div>
                        </li>
                        <li>
                            <div class="icon"><i class="fas fa-phone"></i></div>
                            <div class="info">
                                <h4>Phone:</h4>
                                <p>
                                    <a href="tel:{{ $setting->phone_no }}">{{ $setting->phone_no }}</a>
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>