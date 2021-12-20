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
                                  <a href="accountDetails.html" class="active">
                                    <li> <i class="fas fa-user"></i> تفاصيل الحساب </li>
                                  </a>
                                  <a href="storeDetails.html">
                                    <li> <i class="fas fa-store"></i> تفاصيل المتجر </li>
                                  </a>
                                  <a href="Message.html">
                                    <li> <i class="fas fa-car"></i> تفاصيل السيارات </li>
                                  </a>
                                  <a href="">
                                    <li> <i class="fas fa-headset"></i> الدعم الفني </li>
                                  </a>
                                  <a href="">
                                    <li> <i class="fas fa-headset"></i> تقيمات المتجر </li>
                                  </a>
                                </ul>
                              </div>
                            </div>
                            <div class="col-md-8">
                                <div class="add-product-title">
                                    <h6> <a href="accountDetails.html"> <img src="images/back-ic.png" width="25" alt=""></a> الرجوع لتفاصيل الحساب </h6>
                                </div>
                                <div class="form-add-finial add-car-screen">
                                    <h6> تعديل الحساب </h6>
                                    <br>
                                    <div class="text-center">
                                        <div class="upload" upload-image="" style="border-radius: 10px; background: #fff;">
                                            <input type="file" id="files" name="files" class="input-file ng-pristine ng-valid ng-touched" files-model="" ng-model="project.fileList">
                                           <label for="files" style="border: none">
                                                <span class="add-image" style="color: #59626B">
                                                    <i class="far fa-image"></i> <br>
                                                    أضافة صور
                                                </span>
                                                <output id="list"></output>
                                           </label>
                                       </div>
                                    </div>
                                   <br>
                                    <div class="form-grid">
                                        <label for=""><small>اسم المستخدم</small></label>
                                        <input type="text" class="from-control" placeholder="أكتب النص هنا">
                                    </div>
                                    <div class="form-grid">
                                        <label for=""><small>رقم الهاتف</small></label>
                                        <input type="number" class="from-control" placeholder="أكتب النص هنا">
                                    </div>
                                    <div class="form-grid">
                                        <label for=""><small>البريد اللالكتروني</small></label>
                                        <input type="email" class="from-control" placeholder="أكتب النص هنا">
                                    </div>
                                    <div class="form-grid">
                                        <label for=""><small>كلمة المرور</small></label>
                                        <input type="text" class="from-control" placeholder="أكتب النص هنا">
                                    </div>
                                    <div class="form-grid">
                                        <label for=""><small>العنوان</small></label>
                                        <input type="text" class="from-control" placeholder="أكتب النص هنا">
                                    </div>
                                    <div class="details-sub">
                                        <button class="btn btn-primaryC" style="width: 100%;">
                                          <a href="accountDetails.html"> حفظ البيانات </a>
                                        </button>
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
