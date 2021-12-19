@extends('dashboard.layouts.app')
@section('content')
<div class="content-all">
    @include('dashboard.includes.side-menu')
    <div class="content-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <!-- ****************************** Middle-All ****************************** -->
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-4" style="padding: 0;">
                                <div class="account-details-column">
                                    <h6>تفاصيل الحساب</h6>
                                    <ul>
                                        <a href="accountDetails.html">
                                            <li><i class="fas fa-user"></i> تفاصيل الحساب </li>
                                        </a>
                                        <a href="storeDetails.html">
                                            <li><i class="fas fa-store"></i> تفاصيل المتجر </li>
                                        </a>
                                        <a href="Message.html" class="active">
                                            <li> <i class="fas fa-car"></i> تفاصيل السيارات </li>
                                        </a>
                                        <a href="">
                                            <li><i class="fas fa-headset"></i> الدعم الفني </li>
                                        </a>
                                        <a href="">
                                            <li><i class="fas fa-headset"></i> تقيمات المتجر </li>
                                        </a>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="bannner-apps">
                                    <div class="apps-show-banner">
                                        <h5>قم بالترقية الأن</h5>
                                        <p style="font-size: 10px;">قم بترقية حسابك حتي تتمكن من التمتع بميزات تساعدك في
                                            تحسين
                                            عملية البيع والوصول لعدد أكبر من المستخدمين</p>
                                        <a href=""><img src="images/tarqia-app.png"></a>
                                    </div>
                                </div>
                                <div class="right-message-details">
                                    <h6>أنواع السيارات</h6>
                                    <p style="width: 80%;">أختيارك لانواع السيارات التي تعمل بها يسهل الوصول لمنتجاتك
                                        ويزيد من أرباحك </p>
                                    <div class="parts-sec-all products-parts-sec-all">
                                        @foreach($data['data'] as $car)
                                        <div class="parts-contect-sec">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="prod-img-parts">
                                                                <img src="" width="100%" style="border: 0;">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="prod-txts-parts">

                                                                <h6>الماركة : {{
                                                                    $car['mark']->getTranslatedAttribute('name') }}
                                                                    السنة :{{ $car['year']['year'] }} <br> المحرك : {{
                                                                    $car['engine']->getTranslatedAttribute('name') }}
                                                                </h6>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div style="text-align: left; padding-top: 7px;">
                                                        <a href=""><img
                                                                src="{{  Storage::disk('public')->url($car['mark']['image']) }}"
                                                                width="25"></a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endforeach


                                        <div class="add-car">
                                            <a href="add-car.html"> <button class="form-control"> <i
                                                        class="fas fa-plus"></i> أضافة سيارة </button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ****************************** Right Side ****************************** -->
                    <div class="col-md-4">
                        <div class="right-side">
                            <div class="bg-tarqia">
                                <h6>قم بترقية حسابك الان !</h6>
                                <p>تعرف علي خطط اسعارنا وقم
                                    بتفعيل خطة الأسعار التي تناسبك</p>
                                <button><a href="">إشترك الان</a></button>
                            </div>

                            <div class="activities-per-right-side">
                                <h6>الانشطة</h6>
                                <div class="sub-activ-right-side">
                                    <span style="display: block;">لقد قمت بالتاكيد على طلب <label>احمد ابراهيم</label>
                                        بخصوص قطع غيار</span>
                                    <span class="date-right-side">
                                        <small>الجمعة 20 فبراير 2020</small>
                                    </span>
                                </div>
                                <div class="sub-activ-right-side">
                                    <span style="display: block;">لقد قمت بالتاكيد على طلب <label>احمد ابراهيم</label>
                                        بخصوص قطع غيار</span>
                                    <span class="date-right-side">
                                        <small>الجمعة 20 فبراير 2020</small>
                                    </span>
                                </div>
                                <div class="sub-activ-right-side">
                                    <span style="display: block;">لقد قمت بالتاكيد على طلب <label>احمد ابراهيم</label>
                                        بخصوص قطع غيار</span>
                                    <span class="date-right-side">
                                        <small>الجمعة 20 فبراير 2020</small>
                                    </span>
                                </div>
                            </div>

                            <div class="no-activi text-center">
                                <div class="img-no-activ">
                                    <img src="images/no-activites.png">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection