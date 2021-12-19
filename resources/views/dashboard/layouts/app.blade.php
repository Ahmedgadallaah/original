<!DOCTYPE HTML>
{{-- <html lang="{{ app()->getLocale() }}"> --}}
<html lang="en">
@include('dashboard.layouts.header')

{{-- <body style="direction: @if (app()->getLocale() == 'ar')  rtl !important @else ltr !important; @endif"> --}}

<body style="background-color: #F3F7FA;">
    @include('dashboard.layouts.nav')

    @yield('content')

    @include('dashboard.layouts.footer')
</body>

</html>