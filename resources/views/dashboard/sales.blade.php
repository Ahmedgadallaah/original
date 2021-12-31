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

                            <div class="sec-sec-row">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="thre-sec">
                                            <div>
                                                <h6>المتاح فى المخزن</h6>
                                                <p><b><strong>{{ $totalInStock }}</strong></b></p>
                                                <p>قطعة</p>
                                            </div>
                                            <div>
                                                <h6>القطع المباعة</h6>
                                                <p><b><strong>{{ $totalSellQty }}</strong> </b></p>
                                                <p>قطعة</p>
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
                                                    <h6><b><Strong>{{ $totalSales }}</Strong></b> ج.م</h6>
                                                    <span><small
                                                            style="font-size: 10px; display: block; margin-top: -10px;">أجمالي الربح</small></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-4"></div>
                                                        <div class="col-md-4">
                                                            <div>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-secondary dropdown-toggle"
                                                                            type="button" id="dropdownMenuButton1"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false"
                                                                            style="background-color: rgba(118,185,82,.2); border: none; color: #76B952;">
                                                                        21%
                                                                    </button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div style="padding-right: 15px;">
                                                                <div class="dropdown">
                                                                    <button class="btn btn-secondary dropdown-toggle"
                                                                            type="button" id="dropdownMenuButton1"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false"
                                                                            style="background-color: rgba(238,80,79,.2); border: none; color: #EE504F;">
                                                                        42%
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

                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="parts-sec-all products-parts-sec-all">

                                            @forelse($totalItems as $item)
                                                <div class="parts-contect-sec">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="prod-img-parts">
                                                                        <img
                                                                            src="{{ Storage::disk('public')->url($item->product->image??'') }}"
                                                                            width="100%">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="prod-txts-parts">
                                                                        <h6> {{ $item->product_name }} </h6>
                                                                        <span> الكمية المطلوبة <b>{{  $item->product_qty }}</b> قطعة </span>
                                                                        <span> <i class="fas fa-clock"></i> {{ $item->created_at->format('l j F Y') }}  </span>
                                                                        <span> <i class="fas fa-wallet"></i> الدفع عن الاستلام  </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div>
                                                                        <small style="color: #59626B; font-size: 12px;">
                                                                            اسم المشتري
                                                                            : {{ $item->order->user->name??'' }}
                                                                        </small>
                                                                        <br>
                                                                        <small style="color: #59626B; font-size: 12px;">
                                                                            الهاتف : {{ $item->order->user->phone??'' }}
                                                                        </small>
                                                                    </div>
                                                                    <div>
                                                                        السعر :
                                                                        <small
                                                                            style="color: #EE504F;">{{ $item->product_total }}
                                                                            جم
                                                                            {{--                                                                        <del>50.25</del>--}}
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="row" style="text-align: left;">
                                                                <div class="col-md-9">
                                                                    <div class="text-left">
                                                                        <a href="" class="see" data-bs-toggle="modal"
                                                                           data-id="{{$item->id}}"
                                                                           data-bs-target="#exampleModal-{{ $item->id }}">
                                                                            <img
                                                                                src="{{ asset('dash/images/see-ic.png') }}"
                                                                                width="25"></a>

                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                {{--  modal --}}
                                                <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" style="max-width: 70% !important;">
                                                        <div class="modal-content"
                                                             style="background: none; border: none;">
                                                            <div class="modal-body" id="item-data">
                                                                <div class="add-product-form">
                                                                    <div class="row">
                                                                        <div class="col-md-8">
                                                                            <div class="form-add-prod-sub">
                                                                                <div class="row">
                                                                                    <div class="col-md-4">
                                                                                        <div class="prod-img-parts">
                                                                                            <img
                                                                                                src="{{ Storage::disk('public')->url($item->product->image??'') }}"
                                                                                                width="70%">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="prod-txts-parts">
                                                                                            <h6> {{ $item->product_name }} </h6>
                                                                                            <span> <i
                                                                                                    class="fas fa-clock"></i> {{ $item->created_at->format('l j F Y') }}  </span>
                                                                                            <div>
                                                                                                <small
                                                                                                    style="color: #EE504F;">
                                                                                                    {{ $item->product_total }}
                                                                                                    جم
                                                                                                    {{--  <del> 50.25 </del>--}}
                                                                                                </small>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="parts-sec-all products-parts-sec-all">
                                                                                    <div class="info-details">
                                                                                        <h6>حالة الطلب : ناجحة</h6>
                                                                                        <div class="details-sub">
                                                                                            <span>صاحب الطلب</span>
                                                                                            <h6>{{ $item->order->user->name??'' }}</h6>
                                                                                        </div>
                                                                                        <div class="details-sub">
                                                                                            <span>رقم التيلفون</span>
                                                                                            <h6>{{ $item->order->user->phone??'' }}</h6>
                                                                                        </div>
                                                                                        <div class="details-sub">
                                                                                            <span>وسيلة الدفع</span>
                                                                                            <h6>الدفع عند الاستلام</h6>
                                                                                        </div>
                                                                                        <div class="details-sub">
                                                                                            <span>العنوان</span>
                                                                                            <h6>{{ $item->order->user->address??'' }}</h6>
                                                                                        </div>
                                                                                        {{--                                                                                        <div class="details-sub">--}}
                                                                                        {{--                                                                                            <span>تاريخ الاستلام</span>--}}
                                                                                        {{--                                                                                            <h6>20-5-2021</h6>--}}
                                                                                        {{--                                                                                        </div>--}}
                                                                                    </div>
                                                                                </div>

                                                                                {{--                                                                                <div class="row">--}}
                                                                                {{--                                                                                    <div class="col-md-6">--}}
                                                                                {{--                                                                                        <a href="">--}}
                                                                                {{--                                                                                            <button class="btn btn-danger">--}}
                                                                                {{--                                                                                                <i class="fas fa-times"></i>  لم يتم التسليم--}}
                                                                                {{--                                                                                            </button>--}}
                                                                                {{--                                                                                        </a>--}}
                                                                                {{--                                                                                    </div>--}}
                                                                                {{--                                                                                    <div class="col-md-6 text-left">--}}
                                                                                {{--                                                                                        <a href="">--}}
                                                                                {{--                                                                                            <button class="btn btn-success">--}}
                                                                                {{--                                                                                                <i class="fas fa-check"></i> تم التسليم--}}
                                                                                {{--                                                                                            </button>--}}
                                                                                {{--                                                                                        </a>--}}
                                                                                {{--                                                                                    </div>--}}
                                                                                {{--                                                                                </div>--}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="add-prod-right-sub">
                                                                                <div class="sub-img">
                                                                                    <img
                                                                                        src="images/add-prod-subImg.png"
                                                                                        alt="">
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
                                                {{--  end of modal--}}
                                            @empty
                                                <div class="parts-contect-sec">
                                                    ليس لديك مبيعات
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ****************************** Right Side ****************************** -->
                           @include('dashboard.layouts.left_side')

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

     <script>
            let myChart = document.getElementById('myChart').getContext('2d');
            let massPopChart = new Chart(myChart, {
                type:'bar',
                data:{
                    labels:['السبت', 'الحد', 'الاثنين', 'الثلاثاء', 'الاربعاء', 'الخميس', 'الجمعة', 'السبت'],
                    datasets:[{
                        label:'Population',
                        data:[
                            453060,
                            251045,
                            617594,
                            286519,
                            405162,
                            305162,
                            555162,
                            95072
                        ],
                        backgroundColor:'#EE504F',
                        borderWidth:1,
                        borderColor:'#fff',
                        hoverBorderWidth:2,
                        hoverBorderColor:'#fff'
                    }]
                },
                option:{
                    legend:{
                        display:false,
                    }
                }
            });
        </script>

@endsection

