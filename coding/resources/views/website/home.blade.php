@extends('website.layouts.app')

@section('title', 'حافظ | الصفحة الرئيسية')

@section('content')
        <section class="banner style-1">
            <div class="container">
                <div class="banner-content align-items-center">
                    <h2 class="text-white">وَلَقَدْ يَسَّرْنَا الْقُرْآنَ لِلذِّكْرِ فَهَلْ مِن مُّدَّكِرٍَ</h2>
                    <a href="{{ route('about') }}" class="al-buraq-btn btn-fill-primary btn-lg mx-auto">المزيد</a>
                </div>
            </div>
        </section>

        <section class="islam-pillars sec-pad">
            <div class="container bg-color-dark pt-5">
                <div class="heading text-center">
                    <h2 class="title clr-primary">فضل حفظ القرآن الكريم</h2>
                    <p class="clr-white">تعلم القرآن الكريم وحفظه من أعظم العبادات التي تُقرب العبد من ربه</p>
                </div>
                <div class="row">
                    <div class="col-xl col-lg-6 col-md-6 col-sm-6 p-3">
                        <div class="pillar-box shadow-lg rounded p-4 text-center bg-light">
                            <div class="mb-3">
                                <i class="fas fa-book-open fa-3x iconColor"></i>
                            </div>
                            <h6 class="title text-dark">حديث شريف</h6>
                            <p class="content text-muted">قال رسول الله ﷺ: "خيركم من تعلم القرآن وعلمه" (البخاري)</p>
                        </div>
                    </div>
                    <div class="col-xl col-lg-6 col-md-6 col-sm-6 p-3">
                        <div class="pillar-box shadow-lg rounded p-4 text-center bg-light">
                            <div class=" mb-3">
                                <i class="fas fa-mosque fa-3x iconColor"></i>
                            </div>
                            <h6 class="title text-dark">فضل الحفظ</h6>
                            <p class="content text-muted">قال النبي ﷺ: "يقال لصاحب القرآن اقرأ وارتق ورتل كما كنت ترتل في الدنيا" (الترمذي)</p>
                        </div>
                    </div>
                    <div class="col-xl col-lg-6 col-md-6 col-sm-6 p-3">
                        <div class="pillar-box shadow-lg rounded p-4 text-center bg-light">
                            <div class=" mb-3">
                                <i class="fas fa-lightbulb fa-3x iconColor"></i>
                            </div>
                            <h6 class="title text-dark">حفظ القرآن نور</h6>
                            <p class="content text-muted">قال الله تعالى: "اللَّهُ نُورُ السَّمَاوَاتِ وَالْأَرْضِ ۚ" (النور: 35)</p>
                        </div>
                    </div>
                    <div class="col-xl col-lg-6 col-md-6 col-sm-6 p-3">
                        <div class="pillar-box shadow-lg rounded p-4 text-center bg-light">
                            <div class=" mb-3">
                                <i class="fas fa-star fa-3x iconColor"></i>
                            </div>
                            <h6 class="title text-dark">درجات في الجنة</h6>
                            <p class="content text-muted">قال رسول الله ﷺ: "من قرأ القرآن وعمل به ألبس والديه تاجًا يوم القيامة" (أبو داود)</p>
                        </div>
                    </div>
                    <div class="col-xl col-lg-6 col-md-6 col-sm-6 p-3">
                        <div class="pillar-box shadow-lg rounded p-4 text-center bg-light">
                            <div class=" mb-3">
                                <i class="fas fa-hands-helping fa-3x iconColor"></i>
                            </div>
                            <h6 class="title text-dark">بركة وحفظ</h6>
                            <p class="content text-muted">قال الله تعالى: "وَلَقَدْ يَسَّرْنَا الْقُرْآنَ لِلذِّكْرِ فَهَلْ مِن مُّدَّكِرٍ" (القمر: 17)</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="about style-1 sec-pad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 text-center col-12">
                        <img src="{{ asset('assets/images/logo1.png') }}" alt="حافظ">
                    </div>
                    <div class="col-lg-7 col-12">
                        <h3 class="title">من نحن</h3>
                        <p>نهدف في "حافظ" إلى تقديم منصة متكاملة تساعد المسلمين على تعلم <strong>القرآن الكريم</strong> وحفظه بسهولة، مع تتبع تقدمهم في الحفظ والتلاوة.</p>
                        <p>تأسس مشروع "حافظ" لتوفير بيئة تعليمية تفاعلية تعتمد على التقنيات الحديثة لتسهيل تعليم القرآن الكريم، سواءً للأطفال أو الكبار، مع التركيز على تعزيز فهم الآيات وتحفيز الطلاب عبر أنظمة التقييم والمكافآت.</p>
                        <p class="hadith">قال رسول الله ﷺ: <strong>"خيركم من تعلم القرآن وعلمه"</strong> (البخاري).</p>
                        <a href="{{ route('about') }}" class="al-buraq-btn btn-fill-primary btn-lg">اقرأ المزيد</a>
                    </div>
                </div>
            </div>
        </section>


        <section class="daily-update sec-pad bg-color-light">
            <div class="container">
                <div class="heading text-center">
                    <h2 class="title">التلاوة اليومية للقرآن الكريم</h2>
                    <p class="clr-dark-grey">احفظ وتدبر آيات القرآن الكريم يوميًا مع "حافظ"</p>
                </div>
                <div class="text-center">
                    <h6 class="bismillah">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</h6>
                    <h4 dir="rtl" lang="ar" class="ayat">وَرَتِّلِ ٱلْقُرْآنَ تَرْتِيلًا</h4>
                    <p class="ayat-translation">"ورتل القرآن ترتيلًا" (المزمل: 4)</p><br>
                    <p class="ayat-translation">ابدأ رحلتك في حفظ القرآن الكريم وتدبر معانيه بشكل يومي، وارتقِ في الدرجات بإتقانك.</p><br>
                </div>

                <div class="row d-flex justify-content-between boxes-row">
                    <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                        <div class="level-box shadow-lg rounded p-3 text-center bg-light">
                            <div class=" mb-2">
                                <i class="fas fa-book-open fa-4x iconColor"></i>
                            </div>
                            <p class="name">المستوى الأول</p>
                            <div class="progress mt-2 mb-2">
                                <div class="progress-bar customcolor" role="progressbar" style="width: 10%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">جزء عم</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                        <div class="level-box shadow-lg rounded p-3 text-center bg-light">
                            <div class=" mb-2">
                                <i class="fas fa-book-open fa-4x iconColor"></i>
                            </div>
                            <p class="name">المستوى الثاني</p>
                            <div class="progress mt-2 mb-2">
                                <div class="progress-bar customcolor" role="progressbar" style="width: 30%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">5 أجزاء</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                        <div class="level-box shadow-lg rounded p-3 text-center bg-light">
                            <div class=" mb-2">
                                <i class="fas fa-book-open fa-4x iconColor"></i>
                            </div>
                            <p class="name">المستوى الثالث</p>
                            <div class="progress mt-2 mb-2">
                                <div class="progress-bar customcolor" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">10 أجزاء</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                        <div class="level-box shadow-lg rounded p-3 text-center bg-light">
                            <div class=" mb-2">
                                <i class="fas fa-book-open fa-4x iconColor"></i>
                            </div>
                            <p class="name">المستوى الرابع</p>
                            <div class="progress mt-2 mb-2">
                                <div class="progress-bar customcolor" role="progressbar" style="width: 70%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">15 جزءًا</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                        <div class="level-box shadow-lg rounded p-3 text-center bg-light">
                            <div class=" mb-2">
                                <i class="fas fa-book-open fa-4x iconColor"></i>
                            </div>
                            <p class="name">المستوى الخامس</p>
                            <div class="progress mt-2 mb-2">
                                <div class="progress-bar customcolor" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">20 جزءًا</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                        <div class="level-box shadow-lg rounded p-3 text-center bg-light">
                            <div class=" mb-2">
                                <i class="fas fa-book-open fa-4x iconColor"></i>
                            </div>
                            <p class="name">المستوى السادس</p>
                            <div class="progress mt-2 mb-2">
                                <div class="progress-bar customcolor" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">حفظ القرآن كاملًا</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
