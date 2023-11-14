@php
    use App\Models\Setting;

    $setting = Setting::first();
@endphp
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between justify-content-xl-center">
            <a href="{{ route('root') }}" target="blank" class="text-nowrap logo-img">
                @if ($setting?->logoPath)
                    <img src="{{ $setting?->logoPath }}" width="180" alt="" />
                @else
                    <h3 class="site-name m-0">{{ $$setting?->name ?? 'Rejaul Haque' }}</h3>
                @endif
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                        href="{{ route('dashboard') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('home.*') ? 'active' : '' }}"
                        href="{{ route('home.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-home"></i>
                        </span>
                        <span class="hide-menu">Home</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('about.*') ? 'active' : '' }}"
                        href="{{ route('about.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-user"></i>
                        </span>
                        <span class="hide-menu">About</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('teaching.*') ? 'active' : '' }}"
                        href="{{ route('teaching.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-article"></i>
                        </span>
                        <span class="hide-menu">Teaching Philosophy</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('curriculum.*') ? 'active' : '' }}"
                        href="{{ route('curriculum.index') }}" aria-expanded="false">
                        <span>
                            {{-- <i class="ti ti-file"></i> --}}
                            <i class="ti ti-file-typography"></i>
                        </span>
                        <span class="hide-menu">Curriculum Vitae</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('course.*') ? 'active' : '' }}"
                        href="{{ route('course.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-certificate"></i>
                        </span>
                        <span class="hide-menu">Course Information</span>
                    </a>
                </li>

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Layout</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('education.*') ? 'active' : '' }}"
                        href="{{ route('education.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-school"></i>
                        </span>
                        <span class="hide-menu">Education</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('location.*') ? 'active' : '' }}"
                        href="{{ route('location.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-map-pin"></i>
                        </span>
                        <span class="hide-menu">Locations</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('officeHour.*') ? 'active' : '' }}"
                        href="{{ route('officeHour.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-building-skyscraper"></i>
                        </span>
                        <span class="hide-menu">Office Hours</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('section.*') ? 'active' : '' }}"
                        href="{{ route('section.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-board"></i>
                        </span>
                        <span class="hide-menu">Left Section</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('header.*') ? 'active' : '' }}"
                        href="{{ route('header.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-navbar"></i>
                        </span>
                        <span class="hide-menu">Header</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('social.*') ? 'active' : '' }}"
                        href="{{ route('social.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-social"></i>
                        </span>
                        <span class="hide-menu">Social Links</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('setting.*') ? 'active' : '' }}"
                        href="{{ route('setting.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-settings"></i>
                        </span>
                        <span class="hide-menu">Setting</span>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
