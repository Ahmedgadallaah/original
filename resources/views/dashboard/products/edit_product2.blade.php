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
                            <div class="add-product-title">
                                <h6><img src="{{ asset('images/back-ic.png') }}" width="25" alt=""> الرجوع لصفحة منتجاتي </h6>
                            </div>
                            <div class="add-product-form">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-add-prod-sub">
                                            <div class="title-anoth">
                                                <h6>أضافة منتج جديد</h6>
                                            </div>
                                            <div class="another-details">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="number-another-details">
                                                            <span>2</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <div class="another-details-title">
                                                            <h6>تسعير المنتج</h6>
                                                            <span>الخطوة التالية : تفاصيل أخري</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="product-percen-sub">
                                                            <div class="chart" data-percent="50" data-scale-color="#EE504F">
                                                                <span> <strong> 2/2</strong></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <form action="{{ route('updateDealerProducts' , ['product'=>$product]) }}" method="post">
                                                @csrf
                                                <input name="page" value="2" type="hidden">
                                                <div class="form-add-finial">
                                                    <div class="add-product-title">
                                                        <h6> تفاصيل أخري </h6>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-grid">
                                                                <label for=""><small>سعر المنتج</small></label>
                                                                <input type="text" value="{{ $product->price??'' }}" name="price" placeholder="كتب النص هنا" style="width: 82%; display: inline-block;">
                                                                <span>ج.م</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for=""><small>نسبة الخصم</small></label>
                                                            <input type="text" value="{{ $product->percentage??'' }}" name="percentage" placeholder="كتب النص هنا" style="width: 89%; display: inline-block;">
                                                            <span>%</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-grid">
                                                        <label for=""> <small>الضمان</small> </label>
                                                        <input type="text"  value="{{ $product->guarante??'' }}" name="guarante" placeholder="كتب النص هنا" style="width: 89%; display: inline-block;">
                                                    </div>
                                                    <div class="form-grid">
                                                        <label for=""> <small> مدة الضمان </small> </label>
                                                        <input type="text" value="{{ $product->guarante_period??'' }}" name="guarante_period" placeholder="كتب النص هنا">
                                                    </div>


                                                    <div class="form-grid">
                                                        <label for=""><small>السيارة</small></label>
                                                        <select name="car_id" id="">
                                                            @forelse($cars as $car)
                                                                <option @if(isset($product) && $product->car_id == $car->id) selected @endif value="{{ $car->id }}">{{ $car->name_ar }}</option>
                                                            @empty
                                                                <option value="">لا يوجد</option>
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                    <div class="form-grid">
                                                        <label for=""> <small> ثمن التوصيل </small> </label>
                                                        <input type="text" value="{{ $product->delivery_cost??'' }}" name="delivery_cost" placeholder="كتب النص هنا">
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <button name="submit" type="submit" class="btn btn-primaryC">
                                                                التالي
                                                            </button>
                                                        </div>
                                                        <div class="col-md-6 text-left">
                                                            <button class="btn btn-accent">
                                                                <a href="#" onclick="goBack()"> السابق </a>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="add-prod-right-sub">
                                            <div class="sub-img">
                                                <img src="images/add-prod-subImg.png" alt="">
                                            </div>
                                            <div class="list-sub">
                                                <h6>معلومات تهمك</h6>
                                                <span>
                                                        <span class="number-sub"> 1 </span>
                                                        إحرص  علي تسليم القطعة في إسرع وقت لكسب
                                                        ثقة العميل
                                                    </span>
                                                <span>
                                                        <span class="number-sub"> 2 </span>
                                                     إحرص علي التواصل مع العميل من خلال الرسائل في حالة الأستلام
                                                    </span>
                                                <span>
                                                        <span class="number-sub"> 3 </span>
                                                        إذا واجعتك مشكلة تواصل معانا في أي وقت فنحن هنا من أجلك
                                                    </span>
                                                <span>
                                                        <span class="number-sub"> 4 </span>
                                                        تابع مخزون القطع إول بأول لعدم وقم بالتأكدمن وجود القطع فى متجرك
                                                    </span>
                                                <span>
                                                        <span class="number-sub"> 5 </span>
                                                         قم بفحص القطعة جيداً قبل تسليمه وتأكد انها مطابقة ولا يوجد بها مشاكل
                                                    </span>
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
                                        <span style="display: block;">لقد قمت بالتاكيد على طلب <label>احمد ابراهيم</label> بخصوص قطع غيار</span>
                                        <span class="date-right-side">
                                        <small>الجمعة 20 فبراير 2020</small>
                                      </span>
                                    </div>
                                    <div class="sub-activ-right-side">
                                        <span style="display: block;">لقد قمت بالتاكيد على طلب <label>احمد ابراهيم</label> بخصوص قطع غيار</span>
                                        <span class="date-right-side">
                                        <small>الجمعة 20 فبراير 2020</small>
                                      </span>
                                    </div>
                                    <div class="sub-activ-right-side">
                                        <span style="display: block;">لقد قمت بالتاكيد على طلب <label>احمد ابراهيم</label> بخصوص قطع غيار</span>
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
