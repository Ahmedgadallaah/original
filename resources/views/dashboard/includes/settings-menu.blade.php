 <div class="col-md-4" style="padding: 0;">
                                <div class="account-details-column" style="height: 100%;">
                                    <h6>تفاصيل الحساب</h6>
                                    <ul>
                                        <a href="{{route('settings')}}">
                                            <li class="@if(\Route::currentRouteName()=='settings') liactive @endif"><i class="fas fa-user"></i> تفاصيل الحساب </li>
                                        </a>
                                        <a href="{{route('store-details')}}" >
                                            <li class="@if(\Route::currentRouteName()=='store-details') liactive @endif"><i class="fas fa-store"></i> تفاصيل المتجر </li>
                                        </a>
                                        <a href="{{route('dealer-cars')}}">
                                            <li class="@if(\Route::currentRouteName()=='dealer-cars') liactive @endif"> <i class="fas fa-car"></i> تفاصيل السيارات </li>
                                        </a>
                                        <a href="{{route('get-contact')}}">
                                            <li class="@if(\Route::currentRouteName()=='contact-us') liactive @endif" ><i class="fas fa-headset"></i> الدعم الفني </li>
                                        </a>
                                        <a href="">
                                            <li ><i class="fas fa-headset"></i> تقيمات المتجر </li>
                                        </a>
                                    </ul>
                                </div>
                            </div>
