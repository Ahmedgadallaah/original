@extends('dashboard.layouts.app')

@section('content')

    <div class="login-screen">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="logo-log-side">
                        <img src="{{ asset('dash/images/logo.png') }}">
                    </div>
                    <div class="fields-login-side">
                        <div class="upp-login">
                            <h5>تسجيل الدخول</h5>
                            <p>قم بأدخال اسم المستخدم وكلمة المرور</p>
                        </div>

                        <div class="field-input-login-side">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                @if($errors->any())
                                    {{ implode('', $errors->all(`<div>:message</div>`)) }}
                                @endif
                                <div class="form_field">
                                    <input type="text" name="phone"
                                           class="form_input @error('phone') is-invalid @enderror"
                                           placeholder="الهاتف" value="{{ old('phone') }}" required
                                           autocomplete="phone" autofocus>
                                    <label for="phone" class="form_label">الهاتف</label>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form_field">
                                    <input id="password" name="password" type="password"
                                           class="form_input @error('password') is-invalid @enderror"
                                           placeholder="كلمة المرور" required autocomplete="current-password">
                                    <label for="password" class="form_label">كلمة المرور</label>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="remember-pass">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                   id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label for="remember">تذكر كلمة المرور</label>
                                        </div>


                                    </div>
{{--                                    @if (Route::has('password.request'))--}}

{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="forgot-pass">--}}
{{--                                        <span>--}}
{{--                                        <a href="{{ route('password.request') }}"> نسيت كلمة المرور</a>--}}
{{--                                        </span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    @endif--}}

                                </div>
                                <input type="submit" class="form_button" value="تسجيل دخول">


                            </form>

                            <div class="login-social">
                                <div class="or">
                                    <span>أو</span>
                                </div>
                                <ul>
                                    <a href="">
                                        <li>
                                            <img src="{{ asset('dash/images/facebook-ic.png') }}" alt="">
                                        </li>
                                    </a>
                                    <a href="">
                                        <li>
                                            <img src="{{ asset('dash/images/twitter-ic.png') }}" alt="">
                                        </li>
                                    </a>
                                    <a href="">
                                        <li>
                                            <img src="{{ asset('dash/images/google-ic.png') }}" alt="">
                                        </li>
                                    </a>
                                </ul>
{{--                                <p>ليس لديك حساب بعد ؟ <span>سجل الأن</span></p>--}}
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="car-login-side">
                        <div class="car-primary-img-login">
                            <img src="{{ asset('dash/images/hold-mob.png') }}">
                            <div class="caro-txt">
                                <h6>أهلا وسهلا بك</h6>
                                <p>مع خدمة البحث يمكنك إيجاد ما ترغب به</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
