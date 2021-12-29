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
                                <div class="add-product-title">
                                    <h6><a href="Products.html"><img src="images/back-ic.png" width="25" alt=""></a> الرجوع لصفحة منتجاتي </h6>
                                </div>
                                <div class="add-product-form">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-add-prod-sub">
                                                <div class="title-anoth">
                                                    <h6>أضافة منتج جديد</h6>
                                                </div>
                                                <div class="another-details">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="number-another-details">
                                                                <span>1</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <div class="another-details-title">
                                                                <h6>تفاصيل اخري</h6>
                                                                <span>الخطوة التالية : تفاصيل السيارة</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="product-percen-sub">
                                                                <div class="chart" data-percent="25" data-scale-color="#EE504F">
                                                                    <span> <strong> 1/2 </strong></span>
                                                                </div>
                                                              </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <form action="@if(isset($product))   {{ route('updateDealerProducts' , $product->id) }} @else {{ route('storeDealerProducts') }} @endif" enctype="multipart/form-data" method="post">
                                                    @csrf
                                                    <input name="page" value="1" type="hidden">

                                                    <div class="form-add-finial">
                                                        <div class="add-product-title">
                                                            <h6> تفاصيل أخري </h6>
                                                        </div>
                                                        <div class="add-product-title">
                                                            <h6> أضافة صور </h6>
                                                            <div>
                                                                <img src="{{ asset('images/add-img-example.png') }}"  alt="" style="margin-top: -75px;">
                                                                <div class="upload" upload-image="" style="border-radius: 10px;">

                                                                    <input type="file" id="files" value="{{ $product->image??'' }}" name="image" class="input-file ng-pristine ng-valid ng-touched" files-model="" ng-model="project.fileList">
                                                                   <label for="files" style="border: none">
                                                                        <span class="add-image" style="color: #59626B">
                                                                            <i class="far fa-image"></i> <br>
                                                                            أضافة صور
                                                                        </span>
                                                                        <output id="list"></output>
                                                                   </label>
                                                               </div>
                                                            </div>
                                                        </div>

                                                        <input type="hidden" name="dealer_id" value="{{ auth()->id() }}">
                                                        <div class="add-product-title">
                                                            <h6> أضافة مجموعة صور </h6>
                                                            <div>
                                                                <img src="{{ asset('images/add-img-example.png') }}" alt="" style="margin-top: -75px;">
                                                                <div class="upload" upload-image="" style="border-radius: 10px;">

                                                                    <input type="file" value="{{ $product->images??'' }}" id="files" multiple name="images[]" class="input-file ng-pristine ng-valid ng-touched" files-model="" ng-model="project.fileList">
                                                                    <label for="files" style="border: none">
                                                                        <span class="add-image" style="color: #59626B">
                                                                            <i class="far fa-image"></i> <br>
                                                                            أضافة صور
                                                                        </span>
                                                                        <output id="list"></output>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-grid">
                                                            <label for=""><small>أسم القطعة</small></label>
                                                            <input value="{{ $product->name??'' }}" type="text" name="name" placeholder="كتب النص هنا">
                                                        </div>

                                                        <div class="form-grid">
                                                            <label for=""><small>القسم</small></label>
                                                            <select name="category_id" id="">
                                                                @forelse($categories as $category)
                                                                <option @if(isset($product) && $product->category_id == $category->id) selected @endif value="{{ $category->id }}">{{ $category->getTranslatedAttribute('name' ,'ar') }}</option>
                                                                    @empty
                                                                    <option value="">لا يوجد</option>
                                                                @endforelse
                                                            </select>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-grid">
                                                                    <label for=""><small>عدد القطع فى المخزن</small> </label>
                                                                    <input value="{{ $product->quantity ?? '' }}" type="text" name="quantity" placeholder="كتب النص هنا" style="width: 80%; display: inline-block;">
                                                                    <span style="font-size: 11px;">قطعة</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-grid">
                                                                    <label for=""><small>حالة القطعة</small></label>
                                                                    <select name="used" id="" >
                                                                        <option @if(isset($product) && $product->used == 1) selected @endif value="1">مستعمل</option>
                                                                        <option @if(isset($product) && $product->used == 0) selected @endif value="0">جديد</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <br>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <button class="btn btn-primaryC" name="submit" type="submit" >
                                                                  التالي
                                                                </button>
                                                            </div>
                                                            <div class="col-md-6 text-left">
                                                                <button class="btn btn-accent">السابق</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="add-prod-right-sub">
                                                <div class="sub-img">
                                                    <img src="images/add-prod-subImg.png" alt="">
                                                </div>
                                                <div class="list-sub">
                                                    <h6>معلومات تهمك</h6>
                                                    <span>
                                                        <span class="number-sub"> 1 </span>
                                                        إحرص  علي تسليم القطعة في إسرع وقت لكسب
                                                        ثقة العميل
                                                    </span>
                                                    <span>
                                                        <span class="number-sub"> 2 </span>
                                                     إحرص علي التواصل مع العميل من خلال الرسائل في حالة الأستلام
                                                    </span>
                                                    <span>
                                                        <span class="number-sub"> 3 </span>
                                                        إذا واجعتك مشكلة تواصل معانا في أي وقت فنحن هنا من أجلك
                                                    </span>
                                                    <span>
                                                        <span class="number-sub"> 4 </span>
                                                        تابع مخزون القطع إول بأول لعدم وقم بالتأكدمن وجود القطع فى متجرك
                                                    </span>
                                                    <span>
                                                        <span class="number-sub"> 5 </span>
                                                         قم بفحص القطعة جيداً قبل تسليمه وتأكد انها مطابقة ولا يوجد بها مشاكل
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

<!-- ****************************** Right Side ****************************** -->
                            <div class="col-md-4">
                                <div class="right-side">
                                  <div class="bg-tarqia">
                                    <h6>قم بترقية حسابك الان !</h6>
                                    <p>تعرف علي خطط اسعارنا وقم
                                      بتفعيل خطة الأسعار التي تناسبك</p>
                                      <button><a href="">إشترك الان</a></button>
                                  </div>

                                  <div class="activities-per-right-side">
                                    <h6>الانشطة</h6>
                                    <div class="sub-activ-right-side">
                                      <span style="display: block;">لقد قمت بالتاكيد على طلب <label>احمد ابراهيم</label> بخصوص قطع غيار</span>
                                      <span class="date-right-side">
                                        <small>الجمعة 20 فبراير 2020</small>
                                      </span>
                                    </div>
                                    <div class="sub-activ-right-side">
                                      <span style="display: block;">لقد قمت بالتاكيد على طلب <label>احمد ابراهيم</label> بخصوص قطع غيار</span>
                                      <span class="date-right-side">
                                        <small>الجمعة 20 فبراير 2020</small>
                                      </span>
                                    </div>
                                    <div class="sub-activ-right-side">
                                      <span style="display: block;">لقد قمت بالتاكيد على طلب <label>احمد ابراهيم</label> بخصوص قطع غيار</span>
                                      <span class="date-right-side">
                                        <small>الجمعة 20 فبراير 2020</small>
                                      </span>
                                    </div>
                                  </div>

                                  <div class="no-activi text-center">
                                    <div class="img-no-activ">
                                      <img src="images/no-activites.png">
                                    </div>
                                  </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
         </div>

    </div>
 @endsection
