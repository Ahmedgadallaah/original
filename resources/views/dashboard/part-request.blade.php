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


                            <br>
                            <div class="action-play product-action-play">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="title-box-chart">
                                            <h6>طلبات الشراء</h6>
                                        </div>
                                    </div>
                                   <div class="col-md-12">
                                        <div class="parts-sec-all">

                                            <div class="parts-title-sec">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6>القطع المطلوبة</h6>
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


                                </div>

                            </div>
                        </div>

                        <!-- Modal -->


                        <!-- Modal -->

                        <!-- ****************************** Right Side ****************************** -->
                        @include('dashboard.layouts.left_side')

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
