
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
                                    <h5>قم بالترقية الأن</h5>
                                    <p>قم بترقية حسابك حتي تتمكن من التمتع بميزات تساعدك في تحسين
                                        عملية البيع والوصول لعدد أكبر من المستخدمين</p>
                                        <a href=""><img src="images/tarqia-app.png"></a>
                                  </div>
                                </div>

                                <div class="sec-sec-row">
                                  <div class="title-box-chart">
                                    <h6>الطلبات </h6>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-3">
                                          <div class="buy-request-save-box">
                                              <div class="row">
                                                <div class="col-md-2">
                                                    <div class="product-percen-sub">
                                                      <div class="chart" data-percent="20" data-scale-color="#EE504F">
                                                          <span> <strong>{{count($pendding_orders)}}</strong> <br> قطعة </span>
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="inner-savebox-buyrequest">
                                                        <h6 class="text-primary">الطلبات المنتظرة</h6>
                                                        <span>قطع غيار سيارات</span>
                                                    </div>
                                                </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                        <div class="buy-request-save-box">
                                            <div class="row">
                                              <div class="col-md-2">
                                                  <div class="product-percen-sub">
                                                    <div class="chart" data-percent="20" data-scale-color="#EE504F">
                                                        <span> <strong>{{count($shipped_orders)}}</strong> <br> قطعة </span>
                                                    </div>
                                                  </div>
                                              </div>
                                              <div class="col-md-10">
                                                  <div class="inner-savebox-buyrequest">
                                                      <h6 class="text-warning">الطلبات قيد التنفيذ</h6>
                                                      <span>قطع غيار سيارات</span>
                                                  </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="buy-request-save-box">
                                            <div class="row">
                                              <div class="col-md-2">
                                                  <div class="product-percen-sub">
                                                    <div class="chart" data-percent="20" data-scale-color="#EE504F">
                                                        <span> <strong>{{count($completed_orders)}}</strong> <br> قطعة </span>
                                                    </div>
                                                  </div>
                                              </div>
                                              <div class="col-md-10">
                                                  <div class="inner-savebox-buyrequest">
                                                      <h6 class="text-success">الطلبات الناجحة</h6>
                                                      <span>قطع غيار سيارات</span>
                                                  </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="buy-request-save-box">
                                            <div class="row">
                                              <div class="col-md-2">
                                                  <div class="product-percen-sub">
                                                    <div class="chart" data-percent="20" data-scale-color="#EE504F">
                                                        <span> <strong>{{count($rejected_orders)}}</strong> <br> قطعة </span>
                                                    </div>
                                                  </div>
                                              </div>
                                              <div class="col-md-10">
                                                  <div class="inner-savebox-buyrequest">
                                                      <h6 class="text-danger">الطلبات المرفوضة</h6>
                                                      <span>قطع غيار سيارات</span>
                                                  </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>

                                  </div>
                                </div>
                                <br>
                                <div class="action-play product-action-play">
                                  <div class="row">
                                    <div class="col-md-2">
                                      <div class="title-box-chart">
                                        <h6>طلبات الشراء</h6>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="row">
                                        <div class="col-md-4">
                                          <div class="product-divs">
                                          <form>
                                                        <input value="{{ request()->search }}" name="search"
                                                               type="text"> <i class="fa fa-search"></i>
                                                    </form>
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="product-divs">

                                              <span>نوع الطلب :</span>
                                              <form>
                                              <select name="status" id="" onchange="this.form.submit()">
                                                <option disabled selected >اختر النوع</option>
                                                <option  value="0">قيد التنفيذ</option>
                                                <option  value="1">المنتظرة</option>
                                              </select>
                                              </form>
                                          </div>
                                        </div>

                                      </div>
                                    </div>

                                    <div class="col-md-12">
                                      <div class="parts-sec-all products-parts-sec-all">
                                        @forelse($orders as $key => $order)
                                        <div class="parts-contect-sec">
                                          <div class="row">
                                            <div class="col-md-5">
                                              <div class="row">
                                                <div class="col-md-4">
                                                  <div class="prod-img-parts">
                                                    <img src="{{Storage::disk('public')->url($order->image)?? ""}}" width="100%">
                                                  </div>
                                                </div>
                                                <div class="col-md-8">
                                                  <div class="prod-txts-parts">
                                                    <h6> {{$order->product_name}} </h6>
                                                    <span> <i class="fas fa-map-marker-alt"></i> {{$order->order->address}} </span>
                                                    <span> <i class="fas fa-clock"></i> {{$order->order->created_at->format('l j F Y')}}  </span>
                                                    <span> <i class="fas fa-wallet"></i> الدفع عن الاستلام  </span>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-3">
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <div>
                                                    <small style="color: #59626B; font-size: 12px;"> رقم الهاتف :{{$order->order->phone}}  </small>
                                                  </div>
                                                  <div>
                                                    <small style="color: #EE504F;">السعر :{{$order->product_price}}  </small>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-4">
                                              <div class="row" style="text-align: left;">
                                                <div class="col-md-9">
                                                  <div class="text-left">
                                                    {{-- <form action="{{route('update_status')}}" method="post">
                                                        @csrf
                                                        @if($order->status == 1 )

                                                        <a href=""title="قيد الإنتظار" data-bs-toggle="modal" data-bs-target="#delete-access"><img src="{{asset('dash/images/xx.png')}}" width="25"></a>
                                                        @else
                                                            <a href="" title="تم الشحن" data-bs-toggle="modal" data-bs-target="#delete-access"><img src="{{asset('dash/images/right.png')}}" width="25"></a>
                                                        @endif
                                                    </form> --}}

                                                    <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="{{asset('dash/images/see-ic.png')}}" width="25"></a>
                                                  </div>
                                                </div>
                                                <div class="col-md-3">

                                                </div>
                                              </div>

                                            </div>
                                          </div>
                                        </div>

    <!---begin modal-->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 70% !important;">
            <div class="modal-content" style="background: none; border: none;">
            <div class="modal-body">
                <div class="add-product-form">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-add-prod-sub">
                            <div class="row">
                            <div class="col-md-4">
                                <div class="prod-img-parts">
                                <img src="images/product.png" width="70%">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="prod-txts-parts">
                                <h6> {{$order->product_name}} </h6>
                                <span> <i class="fas fa-clock"></i> {{$order->order->created_at->format('l j F Y')}}  </span>
                                <div>
                                    <small style="color: #EE504F;"> السعر :{{$order->product_price}} </small>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="parts-sec-all products-parts-sec-all">
                            <div class="info-details">
                                @if($order->order->status ==0)
                                <h6>قيد الإنتظار</h6>
                                @else
                                <h6>جاري الشحن</h6>
                                @endif
                                <div class="details-sub">
                                <span>صاحب الطلب</span>
                                <h6>{{$order->order->user->name?? ""}}</h6>
                                </div>
                                <div class="details-sub">
                                <span>رقم التيلفون</span>
                                <h6>{{$order->order->phone}}</h6>
                                </div>
                                <div class="details-sub">
                                <span>وسيلة الدفع</span>
                                <h6>الدفع عند الاستلام</h6>
                                </div>
                                <div class="details-sub">
                                <span>العنوان</span>
                                <h6>{{$order->order->address}}</h6>
                                </div>
                                {{-- <div class="details-sub">
                                <span>تاريخ الاستلام</span>
                                <h6>20-5-2021</h6>
                                </div> --}}
                            </div>
                            </div>

                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <a href="">
                                    <button class="btn btn-danger">
                                        <i class="fas fa-times"></i>  لم يتم التسليم
                                    </button>
                                    </a>
                                </div>
                                <div class="col-md-6 text-left">
                                    <a href="">
                                        <button class="btn btn-success">
                                        <i class="fas fa-check"></i> تم التسليم
                                        </button>
                                    </a>
                                </div>
                            </div> --}}
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
            </div>
        </div>
        </div>
        <!--end modal -->

                                        @empty
                                            لا توجد طلبات
                                        @endforelse



                                      </div>
                                    </div>
                                  </div>

                                </div>
                            </div>

                <!-- Modal -->


        <!-- Modal -->

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
