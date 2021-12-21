@extends('dashboard.layouts.app')
@section('content')
<div class="content-all">
    <@include('dashboard.includes.side-menu')

    <div class="content-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <!-- ****************************** Middle-All ****************************** -->
                    <div class="col-md-8">
                        <div class="row">
                            @include('dashboard.includes.settings-menu')
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
                                                    <a href="{{route('edit-profile')}}"> تعديل الحساب </a>
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
