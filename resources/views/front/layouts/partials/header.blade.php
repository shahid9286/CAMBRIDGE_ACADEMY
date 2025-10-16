<header>
    <!-- Start Navigation -->
    <nav class="navbar mobile-sidenav navbar-default validnavs navbar-sticky navbar-style-two">

        <!-- Start Top Search -->
        <div class="top-search">
            <div class="container-xl">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                </div>
            </div>
        </div>
        <!-- End Top Search -->


        <div class="container-full d-flex justify-content-between align-items-center">

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{ route('front.index') }}">
                    <img src="{{ asset($setting->logo) }}" class="logo logo-display" alt="Logo">
                    <img src="{{ asset($setting->logo) }}" class="logo logo-scrolled" alt="Logo">
                </a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">

                <img src="{{ asset($setting->logo) }}" alt="Logo">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-times"></i>
                </button>

                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                    <li>
                        <a href="{{ route('front.index') }}">Home</a>
                    </li>
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">About <b
                                class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('front.about') }}">About Us</a></li>
                            <li><a href="{{ route('front.companies') }}">Our Companies</a></li>
                            
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Visa & Immigration <b
                                class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('front.visa.employment') }}">Employment Visa</a></li>
                            <li><a href="{{ route('front.visa.family') }}">Family / Dependent Visa</a></li>
                            <li><a href="{{ route('front.visa.student') }}">Student Visa</a></li>
                            <li><a href="{{ route('front.visa.tourist') }}">Tourist Visa</a></li>
                            <li><a href="{{ route('front.visa.emirates-id') }}">Emirates ID</a></li>
                            <li><a href="{{ route('front.visa.medical-insurance') }}">Medical Insurance</a></li>
                        </ul>
                    </li>

                    <!-- BUSINESS SETUP -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Business Setup <b
                                class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('front.business.mainland') }}">Mainland & Freezone</a></li>
                            <li><a href="{{ route('front.business.moa') }}">MOA Drafting</a></li>
                            <li><a href="{{ route('front.business.pro') }}">PRO Services</a></li>
                            <li><a href="{{ route('front.business.bank') }}">Bank Account Assistance</a></li>
                            <li><a href="{{ route('front.business.compliance') }}">Compliance Advisory</a></li>
                        </ul>
                    </li>

                    <!-- MANPOWER SUPPLY -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manpower Supply <b
                                class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('front.manpower.bike-riders') }}">Bike Riders</a></li>
                            <li><a href="{{ route('front.manpower.hospitality') }}">Hospitality Staff</a></li>
                            <li><a href="{{ route('front.manpower.security') }}">Security Staff</a></li>
                            <li><a href="{{ route('front.manpower.logistics') }}">Logistics Staff</a></li>
                            <li><a href="{{ route('front.manpower.construction') }}">Construction Staff</a></li>
                        </ul>
                    </li>

                    <!-- OTHER SERVICES -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Other Services <b
                                class="caret"></b></a>
                        <ul class="dropdown-menu">

                            <!-- STUDY ABROAD -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Study Abroad</a>
                                <ul class="dropdown-menu dropdown-menu-adjust">
                                    <li><a href="{{ route('front.study.admissions') }}">Global Admissions</a></li>
                                    <li><a href="{{ route('front.study.sop-lor') }}">SOP & LOR Assistance</a></li>
                                    <li><a href="{{ route('front.study.visa-filing') }}">Visa Filing</a></li>
                                    <li><a href="{{ route('front.study.pre-departure') }}">Pre-Departure Support</a>
                                    </li>
                                </ul>
                            </li>

                            <!-- REAL ESTATE -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Real Estate</a>
                                <ul class="dropdown-menu dropdown-menu-adjust">
                                    <li><a href="{{ route('front.real-estate.buy') }}">Buy Property</a></li>
                                    <li><a href="{{ route('front.real-estate.sell') }}">Sell Property</a></li>
                                    <li><a href="{{ route('front.real-estate.rent') }}">Rent Property</a></li>
                                    <li><a href="{{ route('front.real-estate.off-plan') }}">Off-Plan Investments</a>
                                    </li>
                                    <li><a href="{{ route('front.real-estate.roi') }}">ROI Advisory</a></li>
                                </ul>
                            </li>

                            <!-- INVESTMENT ADVISORY -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Investment Advisory</a>
                                <ul class="dropdown-menu dropdown-menu-adjust">
                                    <li><a href="{{ route('front.investment.plans') }}">Our Plans</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('front.joblist') }}">Career</a>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->

            <div class="attr-right">
                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li>
                            @guest
                                <a href="{{ route('front.contactus') }}" class="btn-style-one">Appointment <span></span></a>
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