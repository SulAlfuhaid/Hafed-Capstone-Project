<!-- Sidebar Start -->
<aside class="left-sidebar">
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-center">
            <a href="#" class="text-nowrap logo-img">
                <img style="height: 90px;width: 90px;" src="{{ asset('assets/images/logo.png') }}" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>

        <!-- عرض اسم المستخدم ودوره -->
        <div class="user-info text-center p-3  rounded">
            <h6 class="mb-0"> مرحبا بعودتك : {{ optional(auth()->user()->student)->name }}  </h6>
            <small class="text-muted">{{ auth()->user()->user_type == 'family' ? 'ولي أمر' : (auth()->user()->user_type == 'teacher' ? 'معلم' : 'طالب') }}</small>
        </div>

        <nav class="sidebar-nav scroll-sidebar mt-3" data-simplebar="">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('student.dashboard') ? 'active' : '' }}"
                       href="{{ route('student.dashboard') }}" aria-expanded="false">
                        <span><i class="ti ti-layout-dashboard"></i></span>
                        <span class="hide-menu">الرئيسية</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('student.profile') ? 'active' : '' }}"
                       href="{{ route('student.profile') }}" aria-expanded="false">
                        <span><i class="ti ti-user"></i></span>
                        <span class="hide-menu">ملفي الشخصي</span>
                    </a>
                </li>


                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('student.attendance') ? 'active' : '' }}"
                       href="{{ route('student.attendance') }}" aria-expanded="false">
                        <span><i class="ti ti-calendar-time"></i></span>
                        <span class="hide-menu">سجل الحضور</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('student.evaluations') ? 'active' : '' }}"
                       href="{{ route('student.evaluations') }}" aria-expanded="false">
                        <span><i class="ti ti-star"></i></span>
                        <span class="hide-menu">سجل التقييمات</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('student.study_circles') ? 'active' : '' }}"
                       href="{{ route('student.study_circles') }}" aria-expanded="false">
                        <span><i class="ti ti-books"></i></span>
                        <span class="hide-menu">حلقاتي الدراسية</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('student.leaderboard') ? 'active' : '' }}"
                       href="{{ route('student.leaderboard') }}" aria-expanded="false">
                        <span><i class="ti ti-trophy"></i></span>
                        <span class="hide-menu">لوحة الترتيب</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('student.notifications') ? 'active' : '' }}"
                       href="{{ route('student.notifications') }}" aria-expanded="false">
                        <span><i class="ti ti-bell"></i></span>
                        <span class="hide-menu">الإشعارات</span>
                    </a>
                </li>


            </ul>
        </nav>
    </div>
</aside>
