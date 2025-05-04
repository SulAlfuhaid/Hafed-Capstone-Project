@extends('website.layouts.app')

@section('title', 'حافظ | تواصل معنا')

@section('content')

    <!--=====================================-->
    <!--=        بانر تواصل معنا            =-->
    <!--=====================================-->
    <section style="margin-top: 100px;" class="contact-banner sec-pad text-center bg-color-light text-dark">
        <div class="container">
            <h2 class="title">تواصل معنا</h2>
            <p>نحن هنا لمساعدتك في أي استفسارات أو أسئلة تتعلق بحفظ القرآن الكريم.</p>
        </div>
    </section>

    <!--=====================================-->
    <!--=     صناديق معلومات التواصل       =-->
    <!--=====================================-->
    <section class="contact-info sec-pad">
        <div class="container">
            <div class="row text-center">
                <!-- صندوق العنوان -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="contact-box shadow-lg rounded p-4 bg-light">
                        <i class="fas fa-map-marker-alt fa-3x text-primary mb-3"></i>
                        <h6 class="title">العنوان</h6>
                        <p class="content text-muted">الجبيل، المنطقة الشرقية، المملكة العربية السعودية</p>
                    </div>
                </div>
                <!-- صندوق البريد الإلكتروني -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="contact-box shadow-lg rounded p-4 bg-light">
                        <i class="fas fa-envelope fa-3x text-success mb-3"></i>
                        <h6 class="title">البريد الإلكتروني</h6>
                        <p class="content text-muted"><a href="mailto:info@hafiz.com">info@hafiz.com</a></p>
                    </div>
                </div>
                <!-- صندوق الهاتف -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="contact-box shadow-lg rounded p-4 bg-light">
                        <i class="fas fa-phone-alt fa-3x text-danger mb-3"></i>
                        <h6 class="title">الهاتف</h6>
                        <p class="content text-muted"><a href="tel:+966500000000">+966 50 000 0000</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=====================================-->
    <!--=      قسم دعوة للتواصل            =-->
    <!--=====================================-->
    <section class="join-us sec-pad text-center">
        <div class="container">
            <h2 class="title">هل لديك استفسار؟</h2>
            <p>يمكنك التواصل معنا عبر البريد الإلكتروني أو الهاتف للحصول على الدعم والمساعدة.</p>
        </div>
    </section>

@endsection
