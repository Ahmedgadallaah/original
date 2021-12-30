      <div class="fixed-menu">
            <i class="fas fa-angle-left"></i>
            <div class="fixed-menu-padd">
                <ul>
                    <li class="@if(\Route::currentRouteName()=='index') liactive @endif"><a href="{{ route('index') }}"><i class="fas fa-home"></i> الرئيسية</a></li>
                    <li class="@if(\Route::currentRouteName()=='settings') liactive @endif"><a href="{{route('settings')}}"><i class="fas fa-cog"></i> الأعدادات</a></li>
                    <li class="@if(\Route::currentRouteName()=='dealerProducts') liactive @endif"><a href="{{ route('dealerProducts') }}"><i class="fas fa-sign-out-alt"></i> منتجاتي</a></li>
                    <li class="@if(\Route::currentRouteName()=='buy-orders') liactive @endif"><a href="{{route('buy-orders')}}"><i class="fas fa-sign-out-alt"></i> طلبات الشراء</a></li>
                    <li><a href="my-Sales.html"><i class="fas fa-sign-out-alt"></i> مبيعاتي</a></li>
                    <li><a href="#"><i class="fas fa-sign-out-alt"></i> طلبات القطع</a></li>
                    <li><a href="Message.html"><i class="fas fa-comment-alt"></i> الرسايل</a></li>
                    <li><a href="index.html"><i class="fas fa-sign-out-alt"></i> تسجيل خروج</a></li>
                </ul>
            </div>
            <div class="right-side in-fixed-menu">
                <div class="bg-tarqia side-problem">
                    <h6>هل تواجه مشكلة ؟</h6>

                    <p>إذا واجهتك مشكلة فيسعدنا تواصلك
                        معانا من خلال هذا الرابط </p>
                    <button><a href="" data-bs-toggle="modal" data-bs-target="#Terms-Conditions">تواصل
                            معانا</a></button>
                </div>
            </div>
        </div>
