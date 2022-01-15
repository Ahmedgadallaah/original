@extends('dashboard.layouts.app')
@section('content')
<div class="content-all">
    <@include('dashboard.includes.side-menu')

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
                                    <h6>تفاصيل الحساب</h6>
                                    <div class="parts-sec-all products-parts-sec-all">
                                        <div class="info-details">
                                            <div class="details-sub">
                                                <span>اسم المستخدم</span>
                                                <h6>{{$profile->name}}</h6>
                                            </div>
                                            <div class="details-sub">
                                                <span>رقم التيلفون</span>
                                                <h6>{{$profile->phone}}</h6>
                                            </div>
                                            <div class="details-sub">
                                                <span>البريد اللالكتروني</span>
                                                <h6>{{$profile->email}}</h6>
                                            </div>
                                            {{-- <div class="details-sub">
                                                <span>كلمة المرور</span>
                                                <h6>أحمد محمد ابراهيم</h6>
                                            </div> --}}
                                            <div class="details-sub">
                                                <span>العنوان</span>
                                                <h6>{{$profile->address}}</h6>
                                            </div>
                                            <div class="details-sub">
                                                <button class="btn btn-primaryC" style="width: 100%;">
                                                    <a href="{{route('edit-profile')}}"> تعديل الحساب </a>
                                                </button>
                                            </div>
                                        </div>

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
@endsection
