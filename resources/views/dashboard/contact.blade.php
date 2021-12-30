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

                                <div class="form-add-finial add-car-screen">

                                    <h6>تواصل مع الإادارة</h6>
                                    <br>
                                    <form action="{{route('store-contact')}}" method="post" >
                                        @csrf
                                  <div class="form-grid">
                                        <label for=""><small>اسم المستخدم</small></label>
                                        <input name="name"   type="text" class="from-control" placeholder="أكتب النص هنا">
                                    </div>

                                    <div class="form-grid">
                                        <label for=""><small>البريد اللالكتروني</small></label>
                                        <input  name="email"  type="email" class="from-control" placeholder="أكتب النص هنا">
                                    </div>
                                    <div class="form-grid">
                                        <label for=""><small>الرسالة</small></label>
                                    {{-- <textarea   class="from-control" placeholder="أكتب النص هنا"></textarea> --}}
                                     <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="btn btn-primaryC" type="submit">
                                                إرسال
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