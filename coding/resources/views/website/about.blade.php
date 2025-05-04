@extends('website.layouts.app')

@section('title', 'حافظ | من نحن')

@section('content')
    <section style="margin-top: 100px;" class="about-banner sec-pad text-center bg-color-light text-dark">
        <div class="container">
            <h2 class="title">من نحن</h2>
            <p>تعرف على رسالتنا، أهدافنا، وكيف نساعدك في حفظ القرآن الكريم بكل سهولة ويسر.</p>
        </div>
    </section>

    <section class="about-mission sec-pad">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <img src="{{ asset('assets/images/logo1.png') }}" alt="رسالتنا" class="img-fluid rounded">
                </div>
                <div class="col-lg-9">
                    <h3 class="title">رسالتنا</h3>
                    <p>نهدف إلى توفير منصة تعليمية متطورة تساعد المسلمين من جميع الأعمار على حفظ وتلاوة القرآن الكريم بسهولة، مع متابعة تقدمهم وتحفيزهم بشكل مستمر.</p>
                    <h3 class="title mt-4">رؤيتنا</h3>
                    <p>أن نكون الوجهة الأولى عالميًا في تعليم وتحفيظ القرآن الكريم عبر الوسائل التقنية الحديثة، مع تقديم تجربة تعليمية تفاعلية ومتميزة.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="join-us sec-pad text-center">
        <div class="container">
            <h2 class="title">انضم إلى "حافظ" اليوم!</h2>
            <p>ابدأ رحلتك في حفظ وتعلم القرآن الكريم معنا.</p>
            <a href="{{ route('auth.register') }}" class="al-buraq-btn btn-fill-primary btn-lg">سجل الآن</a>
        </div>
    </section>

@endsection
