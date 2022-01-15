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
                            @include('dashboard.includes.banner_apps')

                            <div class="sec-sec-row">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="thre-sec">
                                            <div>
                                                {{-- @dd($home) --}}
                                                <h6>إجمالي ربح اليوم : {{ $home['day_earning'] }}</h6>
                                            </div>


                                            <div>
                                                <h6>إجمالي مبيعات اليوم</h6>
                                                <p><b><strong>{{ $home['day_sold_parts'] }}</strong> </b> قطعة</p>
                                            </div>


                                            <div>
                                                <h6>تقييم العملاء</h6>
                                                {{ $home['total_rating'] }}
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
                                                    <h6><b><Strong>{{ $home['last_week_earning'] }}</Strong></b> ج.م</h6>
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
                                                                        {{ $home['total_percentage'] }}
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
                                                                        {{ $home['weekly_rate'] }}
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
                                                            <span><a href="{{ route('part-request') }}">مشاهده
                                                                    الكل</a></span>
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
                                                                        @if ($part->image)
                                                                            <img src="{{ $part->image[0] }}" width="100%">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="prod-txts-parts">
                                                                        <h6>{{ $part->name }}</h6>
                                                                        <span> <i class="fas fa-map-marker-alt"></i>
                                                                            الماركة : {{ $part->mark->name_ar }}
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
                                                                {{-- <img src="{{  asset('dash/images/x.png') }}" width="20" alt="">
                                                                <img src="{{  asset('dash/images/right.png') }}" width="20" alt=""> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                لا يوجد قطع مطلوبه
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
                                                            <span><a href="{{ route('buy-orders') }}">مشاهده
                                                                    الكل</a></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            @forelse ( $orders->data as $order )


                                                <div class="parts-contect-sec">
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="prod-img-parts">
                                                                        <img src="{{ $order->product->image ?? '' }}"
                                                                            width="100%">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="prod-txts-parts">
                                                                        <h6>العنوان</h6>
                                                                        <span> <i class="fas fa-map-marker-alt"></i>

                                                                            {{ $order->order->name }}
                                                                        </span>
                                                                        <span> <i class="fa fa-clock"></i>
                                                                            الكمية : {{ $order->quantity }}
                                                                        </span>
                                                                        <span> <i class="fas fa-credit-card"></i>
                                                                            الهاتف : {{ $order->order->phone }}
                                                                        </span>
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

                                            @empty
                                                لا يوجد طلبات
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
            type: 'bar',
            data: {
                labels: <?php echo json_encode($date_array); ?>,
                datasets: [{
                    label: 'Population',
                    data: <?php echo json_encode($array_values); ?>,
                    backgroundColor: '#EE504F',
                    borderWidth: 1,
                    borderColor: '#fff',
                    hoverBorderWidth: 2,
                    hoverBorderColor: '#fff'
                }]
            },
            option: {
                legend: {
                    display: false,
                }
            }
        });
    </script>


    {{-- @include('dashboard.includes.modal') --}}

@endsection
