<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 mt-5">
            <div class="site-heading text-center">
                <h4 class="sub-title">Get in touch!</h4>
                <h2 class="title split-text">Have questions? Get in touch!</h2>
            </div>
        </div>
        <div class="col-10 mb-5">
            <div class="contact-form-style-one">
                <form action="{{ route('front.contactus.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input class="form-control" id="name" name="name" placeholder="Name*"
                                    type="text" required>
                                <span class="alert-error"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input class="form-control" id="email" name="email" placeholder="Email*"
                                    type="email" required>
                                <span class="alert-error"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input class="form-control" id="phone_no" name="phone_no" placeholder="Phone*"
                                    type="text" required>
                                <span class="alert-error"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input class="form-control" id="service" name="service" placeholder="Service*"
                                    type="text" required>
                                <span class="alert-error"></span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group message">
                                <textarea class="form-control" id="message" name="message" placeholder="Message*" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">

                            <button type="submit" class="btn-style-one">
                                Submit <span></span>
                            </button>

                        </div>
                    </div>
                    <!-- Alert Message -->
                    <div class="col-lg-12 alert-notification">
                        <div id="message" class="alert-msg"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
