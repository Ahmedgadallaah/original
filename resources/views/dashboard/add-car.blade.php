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
                                <div class="add-product-title">
                                    <h6><a href="Message.html"><img src="images/back-ic.png" width="25" alt=""></a> الرجوع أنواع السيارات </h6>
                                </div>
                                <div class="form-add-finial add-car-screen">

                                    <h6>أضافة سيارة جديده</h6>
                                    <br>
                                    <form action="{{route('store-car')}}" method="post" >
                                    <div class="form-grid">

                                        @csrf
                                        <label for=""><small>ماركة السيارة</small></label>
                                        <select name="mark_id" id="slick" required>
                                          @foreach ($marks as $mark )


                                          <option value="{{$mark->id}}" data-description='' style="color:#000;" > {{$mark->name}} </option>
                                          @endforeach
                                          <option value="1" data-description='' data-imagesrc="images/car-type.png"> تويوتا </option>
                                      </select>
                                      <style>

                                      </style>

                                    </div>

                                    <div class="form-grid">
                                        <label for=""><small>فئة السيارة</small></label>
                                        <select name="model_id" id="" required>
                                            @foreach ($models as $model )
                                                <option value="{{$model->id}}" data-description='' style="color:#000;" > {{$model->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-grid">
                                        <label for=""><small>نوع المحرك</small></label>
                                        <select name="engine_id" id="" required>
                                        @foreach ($engines as $engine )
                                                <option value="{{$engine->id}}" data-description='' style="color:#000;" > {{$engine->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-grid">
                                        <label for=""><small>سنة التصنيع</small></label>
                                        <select name="year_id" id="" required>
                                            @foreach ($years as $year )
                                                <option value="{{$year->id}}" data-description='' style="color:#000;" > {{$year->year}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="btn btn-primaryC" type="submit">
                                                إضف السيارة
                                            </button>
                                        </div>
                                    </div>
                                    </form>
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
