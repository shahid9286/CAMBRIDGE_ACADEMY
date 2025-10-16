<div id="appoinment" class="appoinment-style-one-area default-padding-top bg-theme bg-cover">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-1 col-lg-7 order-lg-last">
                <div class="appoinment-style-one-info wow fadeInDown">
                    <form action="{{ route('front.contactus.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <div class="input-group">
                                        <input class="form-control" id="name" name="name"
                                            placeholder="Your Name" type="text" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <div class="input-group">
                                        <input class="form-control" id="email" name="email"
                                            placeholder="Your Email" type="email" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="phone_no">Phone</label>
                                    <div class="input-group">
                                        <input class="form-control" id="phone_no" name="phone_no"
                                            placeholder="Your Phone No" type="text" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="service">Service</label>
                                    <div class="input-group">
                                        <input class="form-control" id="service" name="service" placeholder="e.g. Employment Visa"
                                            type="text" value="{{ request()->routeIs('front.index') ? '' : $page->title }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <div class="input-group">
                                        <textarea name="message" id="message" rows="3" class="form-control" placeholder="Your Message..." required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <button class="btn-style-one" type="submit" name="submit" id="submit">
                                    Request a quote
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5">
                <div class="appoinment-style-one-thumb">
                    <img class="wow fadeInUp" data-wow-delay="100ms" src="{{ asset('front/assets/img/illustration/11.png') }}"
                        alt="Image Not Found">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ends
