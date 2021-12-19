@extends('dashboard.layouts.app')
@section('content')
<div class="content-all">
    <div class="fixed-menu">
        <i class="fas fa-angle-left"></i>
        <div class="fixed-menu-padd">
            <ul>
                <li><a href="home.html"><i class="fas fa-home"></i> الرئيسية</a></li>
                <li class="liactive"><a href="Message.html"><i class="fas fa-comment-alt"></i> الرسايل</a></li>
                <li><a href="Products.html"><i class="fas fa-sign-out-alt"></i> منتجاتي</a></li>
                <li><a href="buyRequests.html"><i class="fas fa-sign-out-alt"></i> طلبات الشراء</a></li>
                <li><a href="my-Sales.html"><i class="fas fa-sign-out-alt"></i> مبيعاتي</a></li>
                <li><a href="#"><i class="fas fa-sign-out-alt"></i> طلبات القطع</a></li>
                <li><a href="setting.html"><i class="fas fa-cog"></i> الأعدادات</a></li>
                <li><a href="index.html"><i class="fas fa-sign-out-alt"></i> تسجيل خروج</a></li>
            </ul>
        </div>
        <div class="right-side in-fixed-menu">
            <div class="bg-tarqia side-problem">
                <h6>هل تواجه مشكلة ؟</h6>
                <p>إذا واجهتك مشكلة فيسعدنا تواصلك
                    معانا من خلال هذا الرابط </p>
                <button><a href="">تواصل معانا</a></button>
            </div>
        </div>
    </div>

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
                                        <a href="" class="active">
                                            <li><i class="fas fa-user"></i> تفاصيل الحساب </li>
                                        </a>
                                        <a href="storeDetails.html">
                                            <li><i class="fas fa-store"></i> تفاصيل المتجر </li>
                                        </a>
                                        <a href="Message.html">
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
                                    <h6>تفاصيل الحساب</h6>
                                    <div class="parts-sec-all products-parts-sec-all">
                                        <div class="info-details">
                                            <div class="details-sub">
                                                <span>اسم المستخدم</span>
                                                <h6>{{$profile->name}}</h6>
                                            </div>
                                            <div class="details-sub">
                                                <span>رقم التيلفون</span>
                                                <h6>{{$profile->phone}}</h6>
                                            </div>
                                            <div class="details-sub">
                                                <span>البريد اللالكتروني</span>
                                                <h6>{{$profile->email}}</h6>
                                            </div>
                                            {{-- <div class="details-sub">
                                                <span>كلمة المرور</span>
                                                <h6>أحمد محمد ابراهيم</h6>
                                            </div> --}}
                                            <div class="details-sub">
                                                <span>العنوان</span>
                                                <h6>{{$profile->address}}</h6>
                                            </div>
                                            <div class="details-sub">
                                                <button class="btn btn-primaryC" style="width: 100%;">
                                                    <a href="edit-account.html"> تعديل الحساب </a>
                                                </button>
                                            </div>
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