@extends('app.layout.master')

@section('body.class', 'login-container bg-slate-800')

@section('page.js')
    <script type="text/javascript" src="{{ asset('assets/js/pages/login.js') }}"></script>
@stop

@section('plugin.js')
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
@stop

@section('body')
    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Content area -->
                <div class="content">

                    <!-- Advanced login -->
                    {!! Form::open(['route' => 'app.auth.register']) !!}
                        <div class="panel panel-body login-form">
                            <div class="text-center">
                                <div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
                                <h5 class="content-group-lg">{{ trans('register.register') }} <small class="display-block">{{ trans('register.all-required') }}</small></h5>
                            </div>

                            @include("app.include.errors")

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group has-feedback has-feedback-left">
                                        {!! Form::text('firstname', old('firstname'), ["class" => "form-control", "placeholder" => trans('profile.firstname')]) !!}
                                        <div class="form-control-feedback">
                                            <i class="icon-user text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group has-feedback has-feedback-left">
                                        {!! Form::text('surname', old('surname'), ["class" => "form-control", "placeholder" => trans('profile.surname')]) !!}
                                        <div class="form-control-feedback">
                                            <i class="icon-user text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                {!! Form::email('email', old('email'), ["class" => "form-control", "placeholder" => trans('user.email')]) !!}
                                <div class="form-control-feedback">
                                    <i class="icon-mention text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => trans('user.password')]) !!}
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => trans('register.password-confirm')]) !!}
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::button(trans('register.button').' <i class="icon-circle-right2 position-right"></i>', ["type" => "submit", "class" => "btn bg-blue btn-block"]) !!}
                            </div>

                            <div class="content-divider text-muted form-group"><span>{{ trans('register.already-have-account') }}</span></div>
                            <a href="{{ route('app.auth.login') }}" class="btn bg-slate btn-block content-group">{{ trans('register.login') }}</a>
                            <span class="help-block text-center no-margin">{!! trans('keywords.terms', ['terms' => "#terms", "cookie" => "#cookie"]) !!}</span>
                        </div>
                    {!! Form::close() !!}
                    <!-- /advanced login -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->
@stop