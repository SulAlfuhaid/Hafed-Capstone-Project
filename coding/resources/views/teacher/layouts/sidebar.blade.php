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
            <h6 class="mb-0"> مرحبا بعودتك : {{ optional(auth()->user()->teacher)->name }}  </h6>
            <small class="text-muted">{{ auth()->user()->user_type == 'family' ? 'ولي أمر' : (auth()->user()->user_type == 'teacher' ? 'معلم' : 'طالب') }}</small>
        </div>

        <nav class="sidebar-nav scroll-sidebar mt-3" data-simplebar="">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('teacher.dashboard') ? 'active' : '' }}"
                       href="{{ route('teacher.dashboard') }}" aria-expanded="false">
                        <span><i class="ti ti-layout-dashboard"></i></span>
                        <span class="hide-menu">الرئيسية</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('teacher.profile') ? 'active' : '' }}"
                       href="{{ route('teacher.profile') }}" aria-expanded="false">
                        <span><i class="ti ti-user"></i></span>
                        <span class="hide-menu">ملفي الشخصي</span>
                    </a>
                </li>


                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('teacher/study-circles*') ? 'active' : '' }}"
                       href="{{ route('teacher.study-circles.index') }}" aria-expanded="false">
                        <span><i class="ti ti-book"></i></span>
                        <span class="hide-menu">إدارة الحلقات الدراسية</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('teacher/attendance*') ? 'active' : '' }}"
                       href="{{ route('teacher.attendance.index') }}" aria-expanded="false">
                        <span><i class="ti ti-calendar-time"></i></span>
                        <span class="hide-menu">إدارة  الحضور والغياب</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('teacher/evaluations*') ? 'active' : '' }}"
                       href="{{ route('teacher.evaluations.index') }}" aria-expanded="false">
                        <span><i class="ti ti-star"></i></span>
                        <span class="hide-menu">إدارة التقيمات </span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('teacher/reports*') ? 'active' : '' }}"
                       href="{{ route('teacher.reports.index') }}" aria-expanded="false">
                        <span><i class="ti ti-file-text"></i></span>
                        <span class="hide-menu">إدارة التقارير</span>
                    </a>
                </li>


            </ul>
        </nav>
    </div>
</aside>
