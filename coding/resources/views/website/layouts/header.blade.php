<header class="header">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-logo d-flex flex-column align-items-center" href="{{ url('/') }}">
                <img style="height: 70px;" height="70px" src="{{ asset('assets/images/logo1.png') }}" alt="شعار حافظ">
                <strong>حافظ</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="mynavbar">
                <ul class="navbar-nav text-right mainmenu">
                    <li><a href="{{ url('/') }}" class="active">الرئيسية</a></li>
                    <li><a href="{{ url('/services') }}">الخدمات</a></li>
                    <li><a href="{{ url('/about') }}">عن حافظ</a></li>
                    <li><a href="{{ url('/contact') }}">تواصل معنا</a></li>
                </ul>
                <div class="d-flex right-nav">
                    @auth
                        @if(auth()->user()->user_type == 'teacher')
                            <a href="{{ route('teacher.dashboard') }}" class="al-buraq-btn btn-fill-primary btn-lg">لوحة التحكم</a>
                        @elseif(auth()->user()->user_type == 'family')
                            <a href="{{ route('family.dashboard') }}" class="al-buraq-btn btn-fill-primary btn-lg">لوحة التحكم</a>
                        @endif
                        <form action="{{ route('auth.logout') }}" method="POST">
                            @csrf
                            <button style="    margin-right: 23px;
    border-radius: 21px;
    color: white !important;" type="submit" class="btn mr-2 btn-danger text-white btn-sm"><i class="fa text-white fa-power-off"></i> </button>
                        </form>
                    @else
                        <a href="{{ route('auth.register') }}" class="al-buraq-btn btn-fill-primary btn-lg">سجل الآن</a>
                    @endauth
                </div>

            </div>
        </div>
    </nav>
</header>
