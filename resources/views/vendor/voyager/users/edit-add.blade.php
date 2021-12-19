@extends('voyager::master')

@section('page_title', __('voyager::generic.'.(isset($dataTypeContent->id) ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.(isset($dataTypeContent->id) ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        <form class="form-edit-add" role="form"
              action="@if(!is_null($dataTypeContent->getKey())){{ route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) }}@else{{ route('voyager.'.$dataType->slug.'.store') }}@endif"
              method="POST" enctype="multipart/form-data" autocomplete="off">
            <!-- PUT Method if we are editing -->
            @if(isset($dataTypeContent->id))
                {{ method_field("PUT") }}
            @endif
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-bordered">
                        {{-- <div class="panel"> --}}
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name">{{ __('voyager::generic.name') }}</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="{{ __('voyager::generic.name') }}"
                                       value="{{ old('name', $dataTypeContent->name ?? '') }}">
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('voyager::generic.email') }}</label>
                                <input type="email" class="form-control" id="email" name="email"
                                       placeholder="{{ __('voyager::generic.email') }}"
                                       value="{{ old('email', $dataTypeContent->email ?? '') }}">
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('voyager::generic.password') }}</label>
                                @if(isset($dataTypeContent->password))
                                    <br>
                                    <small>{{ __('voyager::profile.password_hint') }}</small>
                                @endif
                                <input type="password" class="form-control" id="password" name="password" value=""
                                       autocomplete="new-password">
                            </div>

{{--                            @can('editRoles', $dataTypeContent)--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="default_role">{{ __('voyager::profile.role_default') }}</label>--}}
{{--                                    @php--}}
{{--                                        $dataTypeRows = $dataType->{(isset($dataTypeContent->id) ? 'editRows' : 'addRows' )};--}}

{{--                                        $row     = $dataTypeRows->where('field', 'user_belongsto_role_relationship')->first();--}}
{{--                                        $options = $row->details;--}}
{{--                                    @endphp--}}
{{--                                    @include('voyager::formfields.relationship')--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="additional_roles">{{ __('voyager::profile.roles_additional') }}</label>--}}
{{--                                    @php--}}
{{--                                        $row     = $dataTypeRows->where('field', 'user_belongstomany_role_relationship')->first();--}}
{{--                                        $options = $row->details;--}}
{{--                                    @endphp--}}
{{--                                    @include('voyager::formfields.relationship')--}}
{{--                                </div>--}}
{{--                            @endcan--}}
                            @php
                                if (isset($dataTypeContent->locale)) {
                                    $selected_locale = $dataTypeContent->locale;
                                } else {
                                    $selected_locale = config('app.locale', 'en');
                                }

                            @endphp
                            <div class="form-group">
                                <label for="locale">{{ __('voyager::generic.locale') }}</label>
                                <select class="form-control select2" id="locale" name="locale">
                                    @foreach (Voyager::getLocales() as $locale)
                                        <option value="{{ $locale }}"
                                                {{ ($locale == $selected_locale ? 'selected' : '') }}>{{ $locale }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="phone"
                                       value="{{ old('phone', $dataTypeContent->phone ?? '') }}">
                            </div>


                            <div class="form-group">
                                <label for="phone_verified">Phone Verification</label>
                                <select class="form-control select2" id="phone_verified" name="phone_verified">
                                    <option value="0" {{ ($dataTypeContent->phone_verified == 0 ? 'selected' : '') }} >
                                        No
                                    </option>
                                    <option value="1" {{ ($dataTypeContent->phone_verified == 1 ? 'selected' : '') }}>
                                        Yes
                                    </option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                       placeholder="Address"
                                       value="{{ old('address', $dataTypeContent->address ?? '') }}">
                            </div>


                            <div class="form-group">
                                <label for="type">Type</label>

                                <select class="form-control select2" id="type" name="type">
                                    <option value="user" {{ ($dataTypeContent->type == 'user' ? 'selected' : '') }} >
                                        User
                                    </option>
                                    <option value="dealer" {{ ($dataTypeContent->type == 'dealer' ? 'selected' : '') }}>
                                        Dealer
                                    </option>
                                </select>
                            </div>




                            <div class="form-group">
                                <label for="points">Points</label>
                                <input type="text" class="form-control" id="points" name="point" placeholder="Points"
                                       value="{{ old('point', $dataTypeContent->point ?? '') }}">
                            </div>


                            <div class="form-group">
                                <label for="approve">Approval</label>
                                <select class="form-control select2" id="approve" name="approve">
                                    <option value="0" {{ ($dataTypeContent->approve == 0 ? 'selected' : '') }} > Not
                                        approved
                                    </option>
                                    <option value="1" {{ ($dataTypeContent->approve == 1 ? 'selected' : '') }}>
                                        Approved
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="login">Login</label>
                                <select class="form-control select2" id="login" name="login">
                                    <option value="0" {{ ($dataTypeContent->login == 0 ? 'selected' : '') }} > Not
                                        Logged in
                                    </option>
                                    <option value="1" {{ ($dataTypeContent->login == 1 ? 'selected' : '') }}> Logged
                                        in
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="trusted">Trusted User ?</label>
                                <select class="form-control select2" id="trusted" name="trusted">
                                    <option value="0" {{ ($dataTypeContent->trusted == 0 ? 'selected' : '') }} > Not
                                        Trusted
                                    </option>
                                    <option value="1" {{ ($dataTypeContent->trusted == 1 ? 'selected' : '') }}>
                                        Trusted
                                    </option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="valid_to">Valid to</label>
                                <input type="date" class="form-control" id="valid_to" name="valid_to"
                                       placeholder="Valid to"
                                       value="{{ old('valid_to', $dataTypeContent->valid_to ?? '') }}">
                            </div>

                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="panel panel panel-bordered panel-warning">
                        <div class="panel-body">
                            <div class="form-group">
                                @if(isset($dataTypeContent->avatar))
                                    <img src="{{ filter_var($dataTypeContent->avatar, FILTER_VALIDATE_URL) ? $dataTypeContent->avatar : Voyager::image( $dataTypeContent->avatar ) }}"
                                         style="width:200px; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:10px;"/>
                                @endif
                                <input type="file" data-name="avatar" name="avatar">
                            </div>


                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="panel panel panel-bordered panel-warning">
                        <div class="panel-body">


                            <h4>Social Login details</h4>
                            <div class="form-group">
                                <label for="provider">Provider</label>
                                <input type="text" class="form-control" id="provider" name="provider"
                                       placeholder="Provider"
                                       value="{{ old('provider', $dataTypeContent->provider ?? '') }}">
                            </div>


                            <div class="form-group">
                                <label for="provider_id">Provider ID</label>
                                <input type="text" class="form-control" id="provider_id" name="provider_id"
                                       placeholder="Provider ID"
                                       value="{{ old('provider_id', $dataTypeContent->provider_id ?? '') }}">
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <button type="submit" class="btn btn-primary pull-right save">
                {{ __('voyager::generic.save') }}
            </button>
        </form>

        <iframe id="form_target" name="form_target" style="display:none"></iframe>
        <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
              enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
            {{ csrf_field() }}
            <input name="image" id="upload_file" type="file" onchange="$('#my_form').submit();this.value='';">
            <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
        </form>
    </div>
@stop

@section('javascript')
    <script>
        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();
        });
    </script>
@stop
