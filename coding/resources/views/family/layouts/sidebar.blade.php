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
            <h6 class="mb-0"> مرحبا بعودتك : {{ optional(auth()->user()->family)->name }}  </h6>
            <small class="text-muted">{{ auth()->user()->user_type == 'family' ? 'ولي أمر' : (auth()->user()->user_type == 'teacher' ? 'معلم' : 'طالب') }}</small>
        </div>

        <nav class="sidebar-nav scroll-sidebar mt-3" data-simplebar="">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('family.dashboard') ? 'active' : '' }}"
                       href="{{ route('family.dashboard') }}" aria-expanded="false">
                        <span><i class="ti ti-layout-dashboard"></i></span>
                        <span class="hide-menu">الرئيسية</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('family/children*') ? 'active' : '' }}"
                       href="{{ route('family.children.index') }}" aria-expanded="false">
                        <span><i class="ti ti-users"></i></span>
                        <span class="hide-menu">ابنائي</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('family/reports/memorization') ? 'active' : '' }}"
                       href="{{ route('family.reports.memorization') }}" aria-expanded="false">
                        <span><i class="ti ti-chart-bar"></i></span>
                        <span class="hide-menu">تقرير الحفظ</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('family/reports/evaluations') ? 'active' : '' }}"
                       href="{{ route('family.reports.evaluations') }}" aria-expanded="false">
                        <span><i class="ti ti-star"></i></span>
                        <span class="hide-menu">تقرير التقييمات</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('family.reports.attendance') ? 'active' : '' }}"
                       href="{{ route('family.reports.attendance') }}" aria-expanded="false">
                        <span><i class="ti ti-calendar"></i></span>
                        <span class="hide-menu">تقرير الحضور</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('family.reports.ranking') ? 'active' : '' }}"
                       href="{{ route('family.reports.ranking') }}" aria-expanded="false">
                        <span><i class="ti ti-trophy"></i></span>
                        <span class="hide-menu">تقرير النقاط والترتيب</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('family.reports') ? 'active' : '' }}"
                       href="{{ route('family.reports') }}" aria-expanded="false">
                        <span><i class="ti ti-user-check"></i></span>
                        <span class="hide-menu">تقارير المعلمين </span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('family.notifications') ? 'active' : '' }}"
                       href="{{ route('family.notifications') }}" aria-expanded="false">
                        <span><i class="ti ti-bell"></i></span>
                        <span class="hide-menu">الإشعارات</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
