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

                                        <h6>أضافة سيارة جديده</h6>
                                        <br>
                                        <form action="{{ route('store-car') }}" method="post">
                                            @csrf
                                            @livewire('add-car')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button class="btn btn-primaryC" type="submit">
                                                        إضف السيارة
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
