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
                            <div class="bannner-apps">
                                <div class="apps-show-banner">
                                    <h5>قم بإدارة متجرك في أي مكان</h5>
                                    <p>فم بإدارة أعمالك ومتجرك من أي مكان من خلال تطبيق التاجر الذي
                                        يساعدك في ذلك <span>حمل التطبيق الأن</span></p>


                                    <a href=""><img src="{{ asset('dash/images/app-store.png') }}"></a>
                                    <a href=""><img src="{{ asset('dash/images/play-store.png') }}"></a>
                                </div>
                            </div>

                            <div class="sec-sec-row">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="thre-sec">
                                            <div>
                                                <h6>إجمالي ربح اليوم : {{ $home->day_earning }}</h6>
                                            </div>
                                            <div>
                                                <h6>إجمالي مبيعات اليوم</h6>
                                                <p><b><strong>{{ $home->day_sold_parts }}</strong> </b> قطعة</p>
                                            </div>


                                            <div>
                                                <h6>تقييم العملاء</h6>
                                                {{ $home->total_rating }}
                                                <img src="{{ asset('dash/images/star.png') }}" alt="">


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="chart-bg">
                                            <div class="title-box-chart">
                                                <h5>مبيعات المنتجات</h5>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h6><b><Strong>{{ $home->last_week_earning }}</Strong></b> ج.م</h6>
                                                    <span><small
                                                            style="font-size: 10px; display: block; margin-top: -10px;">إجمالي
                                                            ربح الأسبوع الماضي</small>

                                                    </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-4"></div>
                                                        <div class="col-md-4">
                                                            <div>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-secondary dropdown-toggle"
                                                                        type="button" id="dropdownMenuButton1"
                                                                        data-bs-toggle="dropdown" aria-expanded="false"
                                                                        style="background-color: rgba(118,185,82,.2); border: none; color: #76B952;">
                                                                        {{ $home->total_percentage }}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div style="padding-right: 15px;">
                                                                <div class="dropdown">
                                                                    <button class="btn btn-secondary dropdown-toggle"
                                                                        type="button" id="dropdownMenuButton1"
                                                                        data-bs-toggle="dropdown" aria-expanded="false"
                                                                        style="background-color: rgba(118,185,82,.2); border: none; color: #76B952;">
                                                                        {{ $home->weekly_rate }}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <canvas id="myChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="action-play">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="parts-sec-all">

                                            <div class="parts-title-sec">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6>القطع المطلوبة</h6>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="show-all-link">
                                                            <span><a href="">مشاهده الكل</a></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @forelse(json_decode($parts) as $part)
                                                <div class="parts-contect-sec">
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="prod-img-parts">
                                                                        <img src="{{ $part->image[0] }}" width="100%">
                                                                    </div>
                                                                </div>
                                                                {{-- @dd($part) --}}
                                                                <div class="col-md-8">
                                                                    <div class="prod-txts-parts">
                                                                        <h6>{{ $part->name }}</h6>
                                                                        <span> <i class="fas fa-map-marker-alt"></i>
                                                                            الماركة : {{ $part->mark->name_ar }}}
                                                                        </span>
                                                                        <span> <i class="fa fa-clock"></i>
                                                                            سنة الصنع : {{ $part->year->year }}

                                                                        </span>
                                                                        <span> <i class="fa fa-user"></i>
                                                                            اسم طالب القطعة : {{ $part->user->name }}

                                                                        </span>
                                                                        <span> <i class="fa fa-phone"></i>
                                                                         رقم طالب القطعة : {{ $part->user->phone }}

                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div>
                                                                <img src="images/x.png" width="20" alt="">
                                                                <img src="images/right.png" width="20" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                There is no requested parts
                                            @endforelse
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="parts-sec-all">

                                            <div class="parts-title-sec">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6>طلبات قيد الانتظار</h6>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="show-all-link">
                                                            <span><a href="">مشاهده الكل</a></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="parts-contect-sec">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="prod-img-parts">
                                                                    <img src="images/product.png" width="100%">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="prod-txts-parts">
                                                                    <h6>عنوان الطلب</h6>
                                                                    <span> <i class="fas fa-map-marker-alt"></i> مصر
                                                                        القاهرة التوفقية </span>
                                                                    <span> <i class="fa fa-clock"></i> الخميس 22 نوفمبر
                                                                    </span>
                                                                    <span> <i class="fas fa-credit-card"></i> الدفع عند
                                                                        الاستلام </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div style="text-align: left;">
                                                            <img src="images/right.png" width="20" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="parts-contect-sec">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="prod-img-parts">
                                                                    <img src="images/product.png" width="100%">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="prod-txts-parts">
                                                                    <h6>عنوان الطلب</h6>
                                                                    <span> <i class="fas fa-map-marker-alt"></i> مصر
                                                                        القاهرة التوفقية </span>
                                                                    <span> <i class="fa fa-clock"></i> الخميس 22 نوفمبر
                                                                    </span>
                                                                    <span> <i class="fas fa-credit-card"></i> الدفع عند
                                                                        الاستلام </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div style="text-align: left;">
                                                            <img src="images/right.png" width="20" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="parts-contect-sec">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="prod-img-parts">
                                                                    <img src="images/product.png" width="100%">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="prod-txts-parts">
                                                                    <h6>عنوان الطلب</h6>
                                                                    <span> <i class="fas fa-map-marker-alt"></i> مصر
                                                                        القاهرة التوفقية </span>
                                                                    <span> <i class="fa fa-clock"></i> الخميس 22 نوفمبر
                                                                    </span>
                                                                    <span> <i class="fas fa-credit-card"></i> الدفع عند
                                                                        الاستلام </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div style="text-align: left;">
                                                            <img src="images/right.png" width="20" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="parts-contect-sec">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="prod-img-parts">
                                                                    <img src="images/product.png" width="100%">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="prod-txts-parts">
                                                                    <h6>عنوان الطلب</h6>
                                                                    <span> <i class="fas fa-map-marker-alt"></i> مصر
                                                                        القاهرة التوفقية </span>
                                                                    <span> <i class="fa fa-clock"></i> الخميس 22 نوفمبر
                                                                    </span>
                                                                    <span> <i class="fas fa-credit-card"></i> الدفع عند
                                                                        الاستلام </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div style="text-align: left;">
                                                            <img src="images/right.png" width="20" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="parts-contect-sec">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="prod-img-parts">
                                                                    <img src="images/product.png" width="100%">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="prod-txts-parts">
                                                                    <h6>عنوان الطلب</h6>
                                                                    <span> <i class="fas fa-map-marker-alt"></i> مصر
                                                                        القاهرة التوفقية </span>
                                                                    <span> <i class="fa fa-clock"></i> الخميس 22 نوفمبر
                                                                    </span>
                                                                    <span> <i class="fas fa-credit-card"></i> الدفع عند
                                                                        الاستلام </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div style="text-align: left;">
                                                            <img src="images/right.png" width="20" alt="">
                                                        </div>
                                                    </div>
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
                                    <button><a href="" data-bs-toggle="modal" data-bs-target="#Terms-Conditions">إشترك
                                            الان</a></button>
                                </div>

                                <div class="activities-per-right-side">
                                    <h6>الانشطة</h6>
                                    <div class="sub-activ-right-side">
                                        <span style="display: block;">لقد قمت بالتاكيد على طلب <label>احمد
                                                ابراهيم</label> بخصوص قطع غيار</span>
                                        <span class="date-right-side">
                                            <small>الجمعة 20 فبراير 2020</small>
                                        </span>
                                    </div>
                                    <div class="sub-activ-right-side">
                                        <span style="display: block;">لقد قمت بالتاكيد على طلب <label>احمد
                                                ابراهيم</label> بخصوص قطع غيار</span>
                                        <span class="date-right-side">
                                            <small>الجمعة 20 فبراير 2020</small>
                                        </span>
                                    </div>
                                    <div class="sub-activ-right-side">
                                        <span style="display: block;">لقد قمت بالتاكيد على طلب <label>احمد
                                                ابراهيم</label> بخصوص قطع غيار</span>
                                        <span class="date-right-side">
                                            <small>الجمعة 20 فبراير 2020</small>
                                        </span>
                                    </div>
                                </div>

                                <div class="no-activi text-center">
                                    <div class="img-no-activ">
                                        <img src="{{ asset('dash/images/no-activites.png') }}">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***************************************** -->
    <!-- Modal -->

    {{-- @include('dashboard.includes.modal') --}}

@endsection
