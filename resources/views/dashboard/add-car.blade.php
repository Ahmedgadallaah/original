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
                                <div class="add-product-title">
                                    <h6><a href="Message.html"><img src="images/back-ic.png" width="25" alt=""></a> الرجوع أنواع السيارات </h6>
                                </div>
                                <div class="form-add-finial add-car-screen">

                                    <h6>أضافة سيارة جديده</h6>
                                    <br>
                                    <div class="form-grid">
                                        <form action="" type=""></form>
                                        @csrf
                                        <label for=""><small>ماركة السيارة</small></label>
                                        <select name="" id="slick">
                                          <!-- <option value="0"> ماركة السيارة </option> -->
                                          <option value="1" data-description='' data-imagesrc="images/car-type.png"> تويوتا </option>
                                          <option value="1" data-description='' data-imagesrc="images/car-type.png"> تويوتا </option>
                                      </select>
                                      <style>
                                        .dd-selected{
                                          color: black;
                                          font-weight: normal;
                                          font-size: 14px;
                                        }
                                      </style>

                                    </div>
                                    <div class="form-grid">
                                        <label for=""><small>فئة السيارة</small></label>
                                        <select name="" id="">
                                            <option value="">كتب النص هنا</option>
                                        </select>
                                    </div>
                                    <div class="form-grid">
                                        <label for=""><small>نوع المحرك</small></label>
                                        <select name="" id="">
                                            <option value="">كتب النص هنا</option>
                                        </select>
                                    </div>
                                    <div class="form-grid">
                                        <label for=""><small>سنة التصنيع</small></label>
                                        <select name="" id="">
                                            <option value="">كتب النص هنا</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="btn btn-primaryC">
                                                <a href="Message.html">إضف السيارة</a>
                                            </button>
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
