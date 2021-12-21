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
                                    <h6>تفاصيل المتجر</h6>
                                    <div class="parts-sec-all products-parts-sec-all">
                                        <div class="info-details">
                                            <div class="details-sub">
                                                <span>اسم المتجر</span>

                                                <h6>{{$store->name}}</h6>
                                            </div>
                                            <div class="details-sub">
                                                <span>رقم التيلفون</span>
                                                <h6>+{{$store->phone}}</h6>
                                            </div>
                                            <div class="details-sub">
                                                <span>التصنيف</span>
                                                <h6>قطع غيار سيارات</h6>
                                            </div>
                                            <div class="details-sub">
                                                <span>العنوان</span>
                                                <h6>{{$store->address}}</h6>
                                            </div>
                                            <div class="details-sub">

                                                    <a href="{{route('edit-store')}}"><button class="btn btn-primaryC" style="width: 100%;"> تعديل </button></a>

                                            </div>
                                        </div>
                                        {{-- <h6>أنواع السيارات</h6>
                                        <div class="parts-sec-all products-parts-sec-all">
                                            <div class="parts-contect-sec">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="prod-img-parts">
                                                                    <img src="images/car-sell.png" width="100%"
                                                                        style="border: 0;">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="prod-txts-parts">
                                                                    <h6> تويوتا كارولا </h6>
                                                                    <span> 2000CC 1500CC </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div style="text-align: left; padding-top: 7px;">
                                                            <a href=""><img src="images/remove.png" width="25"></a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="parts-contect-sec">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="prod-img-parts">
                                                                    <img src="images/car-sell.png" width="100%"
                                                                        style="border: 0;">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="prod-txts-parts">
                                                                    <h6> تويوتا كارولا </h6>
                                                                    <span> 2000CC 1500CC </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div style="text-align: left; padding-top: 7px;">
                                                            <a href=""><img src="images/remove.png" width="25"></a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}

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
