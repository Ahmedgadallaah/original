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

                                    <div class="form-add-finial add-car-screen">

                                        <h6>تواصل مع الإادارة</h6>
                                        <br>
                                        <form action="{{ route('store-contact') }}" method="post">
                                            @csrf
                                            <div class="form-grid">
                                                <label for=""><small>اسم المستخدم</small></label>
                                                <input name="name" type="text" class="from-control"
                                                    placeholder="أكتب النص هنا">
                                            </div>

                                            <div class="form-grid">
                                                <label for=""><small>البريد اللالكتروني</small></label>
                                                <input name="email" type="email" class="from-control"
                                                    placeholder="أكتب النص هنا">
                                            </div>
                                            <div class="form-grid">
                                                <label for=""><small>الرسالة</small></label>
                                                {{-- <textarea   class="from-control" placeholder="أكتب النص هنا"></textarea> --}}
                                                <textarea name="message" class="form-control"
                                                    id="exampleFormControlTextarea1" rows="3"></textarea>
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

                        @include('dashboard.layouts.left_side')

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
