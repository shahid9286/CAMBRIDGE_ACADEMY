<aside class="main-sidebar elevation-4 main-sidebar elevation-4 sidebar-primary-primary">
    <!-- Sidebar -->
    @php
        use Illuminate\Support\Facades\Route;
    @endphp

    <div class="sidebar pt-0 mt-0">

        <div class="user-panel">
            <a href="{{ route('admin.dashboard') }}" class="name text-dark">
                <img src="{{ asset($setting->logo) }}" class="logo logo-display" alt="Logo" width="200px">
            </a>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item {{ Route::currentRouteName() == 'admin.dashboard' ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }} @if (request()->path() == 'admin/dashboard') active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ __('Dashboard') }}
                        </p>
                    </a>
                </li>

                <li class="nav-item {{ Route::currentRouteName() == 'admin.profile.edit' ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.profile.edit') }}"
                        class="nav-link {{ Route::currentRouteName() == 'admin.profile.edit' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            {{ __('Profile') }}
                        </p>
                    </a>
                </li>

                {{-- Slider --}}
                <li
                    class="nav-item {{ Route::currentRouteName() == 'admin.slider' || Route::currentRouteName() == 'admin.slider.add' ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.slider') }}" class="nav-link">
                        <i class="nav-icon fas fa-sliders-h"></i>
                        <p>
                            {{ __('Slider') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.slider') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.slider' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Slider list') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.slider.add') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.slider.add' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Add New Slide') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- end Slider --}}


                  {{-- Courses Routes --}}
                <li
                    class="nav-item {{ request()->routeIs('admin.course.*') || request()->routeIs('admin.course.category.*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link ">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>
                            {{ __('Course Category') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.course.category.index') }}"
                                class="nav-link {{ request()->routeIs('admin.course.category.*') ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Course Categories') }}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.course.index') }}"
                                class="nav-link {{ request()->routeIs('admin.course.*') && !request()->routeIs('admin.course.category.*') ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Courses') }}</p>
                            </a>
                        </li>

                    </ul>
                </li>


                  {{-- Services Start --}}
                <li
                    class="nav-item {{ Route::currentRouteName() == 'admin.service.category.index' || Route::currentRouteName() == 'admin.service.index' ? 'menu-open' : '' }}">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            {{ __('Services') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.service.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.service.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Services') }}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.service.category.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.service.category.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Categories') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>



                {{-- Services End --}}


                 {{-- Gallery --}}

                <li
                    class="nav-item {{ Route::currentRouteName() == 'admin.gcategory.index' || Route::currentRouteName() == 'admin.gallery.index' ? 'menu-open' : '' }}">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-images"></i>
                        <p>
                            {{ __('Gallery') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.gallery.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.gallery.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Gallery Images') }}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.gcategory.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.gcategory.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Categories') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Gallery --}}


                <li class="nav-item {{ Route::currentRouteName() == 'admin.banner.index' || Route::currentRouteName() == 'admin.banner.add' ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.banner.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-sliders-h"></i>
                        <p>
                            {{ __('Banner') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.banner.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.banner.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Banner list') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.banner.add') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.banner.add' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Add New Banner') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Pages --}}
                <li
                    class="nav-item {{ Route::currentRouteName() == 'admin.page.index' || Route::currentRouteName() == 'admin.page.create' || Route::currentRouteName() == 'admin.page_category.index' ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.page.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            {{ __('Pages') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        {{-- All Pages --}}
                        <li class="nav-item">
                            <a href="{{ route('admin.page_category.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.page_category.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Page Categories') }}</p>
                            </a>
                        </li>
                        {{-- All Pages --}}
                        <li class="nav-item">
                            <a href="{{ route('admin.page.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.page.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('All Pages') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- users --}}
                <li
                    class="nav-item {{ Route::currentRouteName() == 'admin.user.index' || Route::currentRouteName() == 'admin.user.pendingUsers' || Route::currentRouteName() == 'admin.user.approvedUsers' || Route::currentRouteName() == 'admin.user.blockedUsers' ? 'menu-open' : '' }}">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{ __('Users') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.user.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.user.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('All Users') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.user.pendingUsers') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.user.pendingUsers' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Pending Users') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.user.approvedUsers') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.user.approvedUsers' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Approved Users') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.user.blockedUsers') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.user.blockedUsers' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Blocked Users') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Partner --}}

                

                


                


                {{-- Blog --}}
                <li
                    class="nav-item {{ Route::currentRouteName() == 'admin.bcategory.index' || Route::currentRouteName() == 'admin.blog.index' ? 'menu-open' : '' }}">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-blog"></i>
                        <p>
                            {{ __('Blog') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.blog.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.blog.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Blogs') }}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.bcategory.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.bcategory.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Categories') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Blog --}}


                {{-- Job --}}
                <li
                    class="nav-item {{ Route::currentRouteName() == 'admin.job.index' || Route::currentRouteName() == 'admin.jcategory.index' || Route::currentRouteName('admin.job-candidate.index') ? 'menu-open' : '' }}">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>
                            {{ __('Job') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.job.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.job.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Jobs') }}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.jcategory.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.jcategory.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Categories') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.job-candidate.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.job-candidate.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Candidates') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Job --}}

                


                
                <li
                    class="nav-item {{ Route::currentRouteName() == 'admin.we-serve.index' || Route::currentRouteName() == 'admin.we-serve.add' ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.we-serve.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-concierge-bell"></i>
                        <p>
                            {{ __('We Serve') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.we-serve.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.we-serve.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('We Serve List') }}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.we-serve.add') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.we-serve.add' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Add New We Serve') }}</p>
                            </a>
                        </li>

                    </ul>
                </li>
                {{-- end we serve --}}


                {{-- start Info Blok --}}


                <li
                    class="nav-item {{ Route::currentRouteName() == 'admin.info-block.index' || Route::currentRouteName() == 'admin.info-block.add' ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.info-block.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-concierge-bell"></i>
                        <p>
                            {{ __('Info Block') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.info-block.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.info-block.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Info Block List') }}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.info-block.add') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.info-block.add' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Add New Info Block') }}</p>
                            </a>
                        </li>

                    </ul>
                </li>
                {{-- end Info Blok --}}


                {{-- start section header --}}


                <li
                    class="nav-item {{ Route::currentRouteName() == 'admin.section-header.index' || Route::currentRouteName() == 'admin.section-header.add' ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.section-header.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-concierge-bell"></i>
                        <p>
                            {{ __('Section Header') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.info-block.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.info-block.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Section Header List') }}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.info-block.add') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.section-header.add' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Add New Section Header') }}</p>
                            </a>
                        </li>

                    </ul>
                </li>
                {{-- end section Header --}}



                
                


                    {{-- faq-section start --}}
                <li
                    class="nav-item {{ Route::currentRouteName() == 'admin.faq-section.index' || Route::currentRouteName() == 'admin.faq-section.add' ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.faq-section.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-question-circle"></i>
                        <p>
                            {{ __('Faq Section') }}
                            <i class="fa-people-group"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.faq-section.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.faq-section.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('All Faq Section') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.faq-section.add') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.faq-section.add' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Add Faq Section') }}</p>
                            </a>
                        </li>
                    </ul>
                    {{-- faq section End --}}


                    {{-- seo Start --}}
                <li
                    class="nav-item {{ Route::currentRouteName() == 'admin.seoglobal.edit' || Route::currentRouteName() == 'admin.seo.meta.index' ? 'menu-open' : '' }}">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-search"></i>
                        <p>
                            {{ __('Seo Meta') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.seo.meta.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.seo.meta.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('All Seo Meta') }}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.seoglobal.edit') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.seoglobal.edit' ? 'active' : '' }}">
                                <i class="fas fa-cogs" style="margin-right: 7px;"></i>
                                <p>{{ __('Global Settings') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>



                {{-- Seo End --}}



                
                {{-- Enquiry --}}
                <li
                    class="nav-item {{ Route::currentRouteName() == 'admin.enquiry.index' || Route::currentRouteName() == 'admin.enquiry.add' ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.enquiry.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-envelope-open-text"></i>
                        <p>
                            {{ __('Enquiry') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.enquiry.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.enquiry.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('All Enquiries') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.enquiry.add') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.enquiry.add' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Add Enquiry') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Enquiry End --}}
                <li
                    class="nav-item {{ Route::currentRouteName() == 'admin.service.index' || Route::currentRouteName() == 'admin.service.add' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            {{ __('Configurations') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.privacy.policy') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.privacy.policy' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Privacy Policy') }}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.terms_and_condition.edit') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.terms_and_condition.edit' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('terms and conditions') }}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.cookies.edit') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.cookies.edit' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Cookies') }}</p>
                            </a>
                        </li>






                    </ul>



                    {{--
                    {{-- Settings --}}

                <li class="nav-item">
                    <a href="{{ route('admin.setting.edit') }}"
                        class="nav-link {{ Route::currentRouteName() == 'admin.setting.edit' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            {{ __('Settings') }}
                        </p>
                    </a>
                </li>

                {{-- Settings End --}}

                {{-- Trash --}}

                <li class="nav-item {{ Route::currentRouteName() == 'menu-open' }}">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-trash"></i>

                        <p>
                            {{ __('Trash') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.enquiry.restore.page') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.enquiry.restore.page' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Enquiries') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.job-candidate.trashed') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.enquiry.restore.page' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Job Candidates') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- End of Trash --}}

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>