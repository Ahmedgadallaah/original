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
                                        <h6>أنواع السيارات</h6>
                                        <p style="width: 80%;">أختيارك لانواع السيارات التي تعمل بها يسهل الوصول لمنتجاتك
                                            ويزيد من أرباحك </p>

                                        <div class="parts-sec-all products-parts-sec-all">

                                            @foreach ($data as $key => $car)

                                                <div class="parts-contect-sec">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="prod-img-parts">
                                                                        <img src="{{ Storage::disk('public')->url($car->mark->image) }}"
                                                                            width="100%" style="border: 0;">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="prod-txts-parts">

                                                                        <h6>الماركة :
                                                                            {{ $car->mark->getTranslatedAttribute('name') }}
                                                                            السنة :{{ $car['year']['year'] }} <br> المحرك
                                                                            :
                                                                            {{                                                                             $car['engine']->getTranslatedAttribute('name') }}
                                                                        </h6>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div style="text-align: left; padding-top: 7px;">
                                                                <form action="{{ route('delete-car') }}" method="post">
                                                                    @csrf
                                                                    <input type="hidden" value="{{ $car->id }}"
                                                                        name="id">
                                                                    <button type="submit"
                                                                        style="text-decoration: none;color:#ee504f; border-radius:50%;background-color:#fff;border:2px solid #ee504f"><strong>-</strong></button>
                                                                </form>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach


                                            <div class="add-car">
                                                <a href="{{ route('add-car') }}"> <button class="form-control"> <i
                                                            class="fas fa-plus"></i> أضافة سيارة </button></a>
                                            </div>
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
