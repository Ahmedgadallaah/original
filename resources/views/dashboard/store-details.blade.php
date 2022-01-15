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
                                    @include('dashboard.includes.banner_apps')

                                    <div class="right-message-details">
                                        <h6>تفاصيل المتجر</h6>
                                        <div class="parts-sec-all products-parts-sec-all">
                                            <div class="info-details">
                                                <div class="details-sub">
                                                    <span>اسم المتجر</span>

                                                    <h6>{{ $store->name }}</h6>
                                                </div>
                                                <div class="details-sub">
                                                    <span>رقم التيلفون</span>
                                                    <h6>+{{ $store->phone }}</h6>
                                                </div>
                                                <div class="details-sub">
                                                    <span>التصنيف</span>
                                                    <h6>قطع غيار سيارات</h6>
                                                </div>
                                                <div class="details-sub">
                                                    <span>العنوان</span>
                                                    <h6>{{ $store->address }}</h6>
                                                </div>
                                                <div class="details-sub">

                                                    <a href="{{ route('edit-store') }}"><button class="btn btn-primaryC"
                                                            style="width: 100%;"> تعديل </button></a>

                                                </div>
                                            </div>
                                            {{-- <h6>أنواع السيارات</h6>
                                        <div class="parts-sec-all products-parts-sec-all">
                                            <div class="parts-contect-sec">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="prod-img-parts">
                                                                    <img src="images/car-sell.png" width="100%"
                                                                        style="border: 0;">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="prod-txts-parts">
                                                                    <h6> تويوتا كارولا </h6>
                                                                    <span> 2000CC 1500CC </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div style="text-align: left; padding-top: 7px;">
                                                            <a href=""><img src="images/remove.png" width="25"></a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="parts-contect-sec">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="prod-img-parts">
                                                                    <img src="images/car-sell.png" width="100%"
                                                                        style="border: 0;">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="prod-txts-parts">
                                                                    <h6> تويوتا كارولا </h6>
                                                                    <span> 2000CC 1500CC </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div style="text-align: left; padding-top: 7px;">
                                                            <a href=""><img src="images/remove.png" width="25"></a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @include('dashboard.layouts.left_side')

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
