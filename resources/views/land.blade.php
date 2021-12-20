<link rel="stylesheet" href="{{ asset('dash/css/style.css')}}">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>original</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dash/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('dash/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('dash/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('dash/css/owl.carousel.min.css')}}">
</head>

<body class="landing" style="counter-reset: my-sec-counter;">
    <!-- *****************head***************** -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="{{ asset('dash/images/logo.png')}}" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"> عن التطبيق </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"> كيف يعمل </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"> المميزات </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"> الأسعار </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"> تواصل معنا </a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <a href="">الدخول كتاجر</a>
                </span>
            </div>
        </div>
    </nav>
    <div class="icons">
        <ul>
            <a href="#" target="_blank">
                <li> <img src="{{ asset('dash/images/fb.png')}}" alt=""> </li>
            </a>
            <a href="#" target="_blank">
                <li> <img src="{{ asset('dash/images/tw.png')}}" alt=""> </li>
            </a>
            <a href="#" target="_blank">
                <li> <img src="{{ asset('dash/images/you.png')}}" alt=""></li>
            </a>
            <a href="#" target="_blank">
                <li> <img src="{{ asset('dash/images/ista.png')}}" alt=""></li>
            </a>
        </ul>
    </div>
    <!-- *****************head***************** -->
    <div class="carousel-landing">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="container">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="caro-txt">
                                    <h6>أفضل تطبيق لقطع
                                        غيار السيارات</h6>
                                    <p>اطلبها منصة توفر قطع غيار السيارات
                                        الأصلية من الوكلاء بأفضل الأسعار،
                                        وتوصيلها الى مكانك قم بتحميل التطبيق الآن</p>
                                    <div>
                                        <a href=""><img src="{{ asset('dash/images/carsou-apple.png')}}"
                                                alt=""></a>
                                        <a href=""><img src="{{ asset('dash/images/carous-play.png')}}"
                                                alt=""></a>
                                        <a href=""><img src="{{ asset('dash/images/play.png')}}" width="75"
                                                alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="caro-img">
                                    <img src="{{ asset('dash/images/carous-sec-img.png')}}" width="100%" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="caro-txt">
                                    <h6>أفضل تطبيق لقطع
                                        غيار السيارات</h6>
                                    <p>اطلبها منصة توفر قطع غيار السيارات
                                        الأصلية من الوكلاء بأفضل الأسعار،
                                        وتوصيلها الى مكانك قم بتحميل التطبيق الآن</p>
                                    <div>
                                        <a href=""><a href=""><img
                                                    src="{{ asset('dash/images/carsou-apple.png')}}"
                                                    alt=""></a></a>
                                        <a href=""><img src="{{ asset('dash/images/carous-play.png')}}"
                                                alt=""></a>
                                        <a href=""><img src="{{ asset('dash/images/play.png')}}" width="75"
                                                alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="caro-img">
                                    <img src="{{ asset('dash/images/carous-sec-img.png')}}" width="100%" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="caro-txt">
                                    <h6>أفضل تطبيق لقطع
                                        غيار السيارات</h6>
                                    <p>اطلبها منصة توفر قطع غيار السيارات
                                        الأصلية من الوكلاء بأفضل الأسعار،
                                        وتوصيلها الى مكانك قم بتحميل التطبيق الآن</p>
                                    <div>
                                        <a href=""><img src="{{ asset('dash/images/carsou-apple.png')}}"
                                                alt=""></a>
                                        <a href=""><img src="{{ asset('dash/images/carous-play.png')}}"
                                                alt=""></a>
                                        <a href=""><img src="{{ asset('dash/images/play.png')}}" width="75"
                                                alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="caro-img">
                                    <img src="{{ asset('dash/images/carous-sec-img.png')}}" width="100%" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- *****************Partners***************** -->
    <div class="partners-co">
        <div class="container">
            <div class="text-center landing-head-each-sec">
                <h6>شركاء نجاحنا في كل خطوة </h6>
                <p>نسعد بثقاتكم بنا ويسعدنا وجودكم دائماً في كل خطوة نحو التطور</p>
            </div>
            <div class="owl-carousel owl-theme" style="direction: ltr;">
                <div class="item">
                    <img src="{{ asset('dash/images/partners-landign-logo.png')}}">
                </div>
                <div class="item">
                    <img src="{{ asset('dash/images/partners-landign-logo.png')}}">
                </div>
                <div class="item">
                    <img src="{{ asset('dash/images/partners-landign-logo.png')}}">
                </div>
                <div class="item">
                    <img src="{{ asset('dash/images/partners-landign-logo.png')}}">
                </div>
                <div class="item">
                    <img src="{{ asset('dash/images/partners-landign-logo.png')}}">
                </div>
                <div class="item">
                    <img src="{{ asset('dash/images/partners-landign-logo.png')}}">
                </div>
                <div class="item">
                    <img src="{{ asset('dash/images/partners-landign-logo.png')}}">
                </div>
                <div class="item">
                    <img src="{{ asset('dash/images/partners-landign-logo.png')}}">
                </div>
                <div class="item">
                    <img src="{{ asset('dash/images/partners-landign-logo.png')}}">
                </div>
            </div>
        </div>
    </div>

    <!-- *****************steps***************** -->
    <div class="How-work-co">
        <div class="container">
            <div class="text-center landing-head-each-sec">
                <h6>شركاء نجاحنا في كل خطوة </h6>
                <p>نسعد بثقاتكم بنا ويسعدنا وجودكم دائماً في كل خطوة نحو التطور</p>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="st-img">
                        <img src="{{ asset('dash/images/s1.png')}}" alt="">
                    </div>
                    <div class="st-des">
                        <h6>قم بانشاء حساب</h6>
                        <p>وفرنا لك قائمة متنوعة وكاملة من قطع الغيار
                            والاكسسوارات مصنفة ومرتبة</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="st-img">
                        <img src="{{ asset('dash/images/s2.png')}}" alt="">
                    </div>
                    <div class="st-des">
                        <h6>تصفح المنتجات</h6>
                        <p>يمكنك الحصول على قطع اصلية من الوكالة ب
                            ضمان 100% بأفضل سعر</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="st-img">
                        <img src="{{ asset('dash/images/s3.png')}}" alt="">
                    </div>
                    <div class="st-des">
                        <h6>أختار القطعة المطلوبة</h6>
                        <p>كل ماعليك هو إضافة تفاصيل عنوانك ليصلك
                            الطلبية بأسرع مايمكن</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="st-img">
                        <img src="{{ asset('dash/images/s4.png')}}" alt="">
                    </div>
                    <div class="st-des">
                        <h6>قم بالدفع </h6>
                        <p>كل ماعليك هو إضافة تفاصيل عنوانك ليصلك
                            الطلبية بأسرع مايمكن</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- *****************steps***************** -->
    <div class="container">
        <br>
        <div class="video-co">
            <div class="play-video">
                <img src="{{ asset('dash/images/play.png')}}" alt="">
            </div>
        </div>
    </div>
    <!-- *****************Features***************** -->
    <div class="features">
        <div class="container">
            <div class="landing-head-each-sec">
                <h6>مميزات التطبيق</h6>
                <p>تطبيق أوريجينال يتييح لك العديد من المميزات التي تساعدك </p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="fetures-right">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="text-center">
                                    <img src="{{ asset('dash/images/fe-1.png')}}" width="80px" height="80px">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="fetures-desc-sec">
                                    <h6>توصيل قطع الغيار</h6>
                                    <p>كل ماعليك هو إضافة تفاصيل عنوانك ليصلك
                                        الطلبية بأسرع مايمكن</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="text-center">
                                    <img src="{{ asset('dash/images/fe-2.png')}}">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="fetures-desc-sec">
                                    <h6>طلب قطعة</h6>
                                    <p>كل ماعليك هو إضافة تفاصيل عنوانك ليصلك
                                        الطلبية بأسرع مايمكن</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="text-center">
                                    <img src="{{ asset('dash/images/fe-3.png')}}">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="fetures-desc-sec">
                                    <h6>محادثة التاجر</h6>
                                    <p>يمكنك الحصول على قطع اصلية من الوكالة ب
                                        ضمان 100% بأفضل سعر</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="text-center">
                                    <img src="{{ asset('dash/images/fe-4.png')}}">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="fetures-desc-sec">
                                    <h6>الأتصال على التاجر</h6>
                                    <p>وفرنا لك قائمة متنوعة وكاملة من قطع الغيار
                                        والاكسسوارات مصنفة ومرتبة .</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="hint-img-hide">
                        <img src="{{ asset('dash/images/side-landing.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- *****************Fill***************** -->
    <div class="fill-landing-sec">
        <div class="container">
            <div class="fill-des">
                <h6>أفضل تطبيق لقطع
                    <br>
                    غيار السيارات</h6>
                <p>اطلبها منصة توفر قطع غيار السيارات
                    الأصلية من الوكلاء بأفضل الأسعار،
                    وتوصيلها الى مكانك قم بتحميل التطبيق الآن</p>
                <div>
                    <a href=""><img src="{{ asset('dash/images/apple-store-landing.png')}}" alt=""></a>
                    <a href=""><img src="{{ asset('dash/images/play-stor-landing.png')}}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <!-- *****************Fill***************** -->
    <div class="pricing">
        <div class="container">
            <div class="text-center landing-head-each-sec">
                <h6>خطة الاسعار</h6>
                <p>تطبيق أوريجينال يتييح لك العديد من المميزات التي تساعدك </p>
                <br> <br> <br>
            </div>
            <div class="row">

                <div class="col-md-4">
                    <div class="pricing-sec">
                        <div class="up-pricing">
                            <span class="price-head">20$</span>
                            <small>شهريا</small>
                            <h6>حساب الافراد</h6>
                            <p>حساب يصلح للشركات واصحاب الاعمال</p>
                        </div>
                        <div class="pricing-list-sec pricing-list-sec1">
                            <h6>مميزات الحساب</h6>
                            <ul>
                                <li> أستخدم أكثر من حساب </li>
                                <li> دعم متواصل في 24 ساعة </li>
                                <li> رفع 20 منتج </li>
                                <li> لوحة تحكم كاملة </li>
                            </ul>
                        </div>
                        <div class="btn-pricing">
                            <a href="">أبدء الان</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pricing-sec pricing-sec2">
                        <div class="up-pricing">
                            <span class="price-head">20$</span>
                            <small>شهريا</small>
                            <h6>حساب الاعمال</h6>
                            <p>حساب يصلح للشركات واصحاب الاعمال</p>
                        </div>
                        <div class="pricing-list-sec pricing-list-sec2">
                            <h6>مميزات الحساب</h6>
                            <ul>
                                <li> أستخدم أكثر من حساب </li>
                                <li> دعم متواصل في 24 ساعة </li>
                                <li> رفع 20 منتج </li>
                                <li> لوحة تحكم كاملة </li>
                                <li> لوحة تحكم كاملة </li>
                                <li> لوحة تحكم كاملة </li>
                            </ul>
                        </div>
                        <div class="btn-pricing">
                            <a href="">أبدء الان</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pricing-sec">
                        <div class="up-pricing">
                            <span class="price-head">20$</span>
                            <small>شهريا</small>
                            <h6>حساب الافراد</h6>
                            <p>حساب يصلح للشركات واصحاب الاعمال</p>
                        </div>
                        <div class="pricing-list-sec pricing-list-sec3">
                            <h6>مميزات الحساب</h6>
                            <ul>
                                <li> أستخدم أكثر من حساب </li>
                                <li> دعم متواصل في 24 ساعة </li>
                                <li> رفع 20 منتج </li>
                                <li> لوحة تحكم كاملة </li>
                            </ul>
                        </div>
                        <div class="btn-pricing">
                            <a href="">أبدء الان</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- *****************Fill***************** -->
    <div class="contact-landing">
        <div class="container">
            <div class="text-center landing-head-each-sec">
                <h6>أتصل بنا</h6>
                <p>لا تتردد في الاتصال بنا ، فقط ضع بريدك وسنتواصل معاك مباشرةً </p>
            </div>
            <div>
                <input type="text" placeholder="أكتب بريدك الالكتروني هنا ...">
                <button> أرسل <img src="{{ asset('dash/images/send-ic.png')}}" alt=""> </button>
            </div>
        </div>
    </div>


    <div class="footer-area-landing">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="go-top">
                        <i class="fas fa-angle-up"></i>
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                        <p>جميع الحقوق محفوظة © أوريجينال</p>
                        <span>بواسطة تطبيق أوريجينال</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="social-landing">
                        <img src="{{ asset('dash/images/social-1.png')}}" alt="">
                        <img src="{{ asset('dash/images/social-2.png')}}" alt="">
                        <img src="{{ asset('dash/images/social-3.png')}}" alt="">
                        <img src="{{ asset('dash/images/social-4.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('dash/js/jquiry.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('dash/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('dash/js/main.js')}}"></script>
    <script>

    </script>
</body>

</html>
