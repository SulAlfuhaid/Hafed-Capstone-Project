@extends('website.layouts.app')

@section('title', 'حافظ | خدماتنا')

@section('content')

    <!--=====================================-->
    <!--=      قسم مقدمة الخدمات           =-->
    <!--=====================================-->
    <section style="margin-top: 100px;" class="services-intro sec-pad bg-color-light mt-100">
        <div class="container text-center">
            <div class="heading">
                <h2 class="title">خدماتنا</h2>
                <p class="clr-dark-grey">
                    في "حافظ"، نقدم مجموعة من الخدمات المتميزة لمساعدتك في حفظ القرآن الكريم، تعلم التجويد، وتحقيق التقدم الروحي والمعرفي.
                </p>
            </div>
        </div>
    </section>

    <!--=====================================-->
    <!--=      قسم الخدمات الرئيسية         =-->
    <!--=====================================-->
    <section class="services sec-pad">
        <div class="container">
            <div class="row">
                <!-- خدمة تحفيظ القرآن الكريم -->
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="service-box shadow-lg rounded p-4 text-center bg-light">
                        <i class="fas fa-book-open fa-3x text-primary mb-3"></i>
                        <h6 class="title">تحفيظ القرآن الكريم</h6>
                        <p class="content text-muted">برامج متكاملة لحفظ وتلاوة القرآن الكريم بإشراف معلمين متخصصين.</p>
                    </div>
                </div>
                <!-- خدمة دورات التجويد -->
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="service-box shadow-lg rounded p-4 text-center bg-light">
                        <i class="fas fa-mosque fa-3x text-success mb-3"></i>
                        <h6 class="title">دورات التجويد</h6>
                        <p class="content text-muted">تعلم مخارج الحروف وأحكام التجويد بسهولة مع مدرسين معتمدين.</p>
                    </div>
                </div>
                <!-- خدمة متابعة الحفظ -->
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="service-box shadow-lg rounded p-4 text-center bg-light">
                        <i class="fas fa-chart-line fa-3x text-warning mb-3"></i>
                        <h6 class="title">متابعة تقدم الحفظ</h6>
                        <p class="content text-muted">تتبع مستوى تقدمك في الحفظ وتحقيق أهدافك القرآنية بسهولة.</p>
                    </div>
                </div>
                <!-- خدمة تحفيز الطلاب -->
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="service-box shadow-lg rounded p-4 text-center bg-light">
                        <i class="fas fa-star fa-3x text-danger mb-3"></i>
                        <h6 class="title">أنظمة التحفيز والمكافآت</h6>
                        <p class="content text-muted">اكسب النقاط والمكافآت عند تحقيق تقدم في الحفظ.</p>
                    </div>
                </div>
                <!-- خدمة التعليم عن بعد -->
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="service-box shadow-lg rounded p-4 text-center bg-light">
                        <i class="fas fa-laptop fa-3x text-info mb-3"></i>
                        <h6 class="title">التعليم عن بعد</h6>
                        <p class="content text-muted">دروس مباشرة وتسجيلات متاحة لتعلم القرآن الكريم من أي مكان.</p>
                    </div>
                </div>
                <!-- خدمة حلقات التحفيظ -->
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="service-box shadow-lg rounded p-4 text-center bg-light">
                        <i class="fas fa-users fa-3x text-secondary mb-3"></i>
                        <h6 class="title">حلقات تحفيظ جماعية</h6>
                        <p class="content text-muted">انضم إلى حلقات التحفيظ الجماعية واحفظ القرآن مع أصدقائك.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=====================================-->
    <!--=      قسم لماذا تختار "حافظ"؟       =-->
    <!--=====================================-->
    <section class="why-choose-us sec-pad bg-color-dark text-white">
        <div class="container">
            <div class="heading text-center">
                <h2 class="title">لماذا تختار "حافظ"؟</h2>
                <p>نحن نقدم تجربة فريدة في تعليم وتحفيظ القرآن الكريم من خلال:</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4 text-center">
                    <i class="fas fa-chalkboard-teacher fa-3x text-primary mb-3"></i>
                    <h6 class="title">معلمين معتمدين</h6>
                    <p>نخبة من المعلمين المجازين في تحفيظ القرآن والتجويد.</p>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4 text-center">
                    <i class="fas fa-clock fa-3x text-warning mb-3"></i>
                    <h6 class="title">مرونة في المواعيد</h6>
                    <p>اختر الأوقات التي تناسبك سواء صباحًا أو مساءً.</p>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4 text-center">
                    <i class="fas fa-shield-alt fa-3x text-success mb-3"></i>
                    <h6 class="title">نظام تعليمي آمن</h6>
                    <p>بيئة تعليمية موثوقة وآمنة لجميع الأعمار.</p>
                </div>
            </div>
        </div>
    </section>

    <!--=====================================-->
    <!--=      قسم الانضمام للخدمات         =-->
    <!--=====================================-->
    <section class="join-us sec-pad text-center">
        <div class="container">
            <h2 class="title">ابدأ رحلتك في حفظ القرآن اليوم!</h2>
            <p>انضم إلينا وحقق حلمك في إتقان القرآن الكريم.</p>
            <a href="{{ route('auth.register') }}" class="al-buraq-btn btn-fill-primary btn-lg">سجل الآن</a>
        </div>
    </section>

@endsection
