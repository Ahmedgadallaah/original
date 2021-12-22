@extends('dashboard.layouts.app')
@section('content')
    <div class="content-all">
        @include('dashboard.includes.side-menu')
        <div class="content-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="bannner-apps">
                                <div class="apps-show-banner">
                                    <h5>قم بالترقية الأن</h5>
                                    <p>قم بترقية حسابك حتي تتمكن من التمتع بميزات تساعدك في تحسين
                                        عملية البيع والوصول لعدد أكبر من المستخدمين</p>
                                    <a href=""><img src="images/tarqia-app.png"></a>
                                </div>
                            </div>

                            <div class="sec-sec-row">
                                <div class="title-box-chart">
                                    <h5>المخزون</h5>
                                </div>
                                {{-- @dd($categories) --}}
                                <div class="row">
                                    @forelse ($categories as  $category)
                                        <div class="col-md-2">
                                            <div class="product-percen-sub">
                                                <div class="chart" data-percent="25" data-scale-color="#EE504F">
                                                    <span> <strong>{{  $category->products->count() }}</strong> <br> قطعة </span>
                                                </div>
                                                <div>
                                                    <small>{{  $category->getTranslatedAttribute('name' , 'ar') }}</small>
                                                </div>
                                            </div>
                                        </div>

                                    @empty

                                    @endforelse

                                </div>
                            </div>
                            <br>
                            <div class="action-play product-action-play">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="title-box-chart">
                                            <h5>المنتجات</h5>
                                                   <div class="product-divs" style="text-align: right !important;">
                                                    <a href="{{ route('createDealerProducts') }}" class="add-prod"> <i
                                                            class="fas fa-plus"></i> أضف منتج
                                                        </a>
                                                </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="parts-sec-all products-parts-sec-all">

                                            @forelse ( $products as $product )
                                            <div class="parts-contect-sec">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="prod-img-parts">
                                                                    <img src="{{ Storage::url($product->image) }}" width="100%">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="prod-txts-parts">
                                                                    <h6> {{  $product->name }} </h6>
                                                                    <span>
                                                                        الكمية :
                                                                        {{  $product->quantity }}
                                                                        قطع
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div>
                                                                    <small style="color: #59626B; font-size: 12px;">
                                                                            السيارة :
                                                                     {{  $product->car->name_ar??'غير معروف' }}
                                                                    </small>
                                                                </div>
                                                                <div>
                                                                    <small style="color: #EE504F;">

                                                                السعر :        {{  $product->price??'غير معروف' }} جنية
                                                                    </small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <div style="text-align: left;">
                                                                    @forelse ( json_decode($product->images) as $img )
                                                                          <img src="{{  url('/').Storage::url($img) }}" width="32">
                                                                    @empty
                                                                    @endforelse

                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="product-divs">
                                                                    <div class="dropdown">
                                                                        <button class="btn btn-secondary" type="button"
                                                                            id="dropdownMenuButton1"
                                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                                            <small><i class="fas fa-ellipsis-v"></i></small>
                                                                        </button>
                                                                        <ul class="dropdown-menu"
                                                                            aria-labelledby="dropdownMenuButton1">
                                                                            <li><a class="dropdown-item"
                                                                                    href="#">تعديل</a></li>

                                                                            <li><a class="dropdown-item" href="{{ route('deleteProducts' , $product->id) }}">
                                                                             مسح
                                                                                </a>
                                                                                </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            @empty
                                            <p> لا يوجد لديك منتجات </p>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

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