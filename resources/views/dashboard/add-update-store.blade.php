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

                                        <br>
                                        <form action="{{ route('update-store') }}" method="POST">
                                            @csrf
                                            <div class="form-grid">
                                                <label for=""><small>اسم المتجر</small></label>
                                                <input value="{{ $store->name }}" name="name" type="text"
                                                    class="from-control" placeholder="أكتب النص هنا">
                                            </div>
                                            <div class="form-grid">
                                                <label for=""><small>العنوان</small></label>
                                                <input value="{{ $store->address }}" name="address" type="text"
                                                    class="from-control" placeholder="أكتب النص هنا">
                                            </div>
                                            {{-- <div class="form-grid">
                                        <label for=""><small>التصنيف</small></label>
                                        <select name="" id="" style="color: black;">
                                            <option value=""> اكتب النص هنا</option>
                                        </select>
                                    </div> --}}
                                            <div class="details-sub">
                                                <br>
                                                <button type="submit" class="btn btn-primaryC" style="width: 100%;">
                                                    حفظ البيانات
                                                </button>
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
