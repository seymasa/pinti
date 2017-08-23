@extends('layout.master')

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
                    {!! Form::open(['route' => 'auth.login']) !!}
                        <div class="panel panel-body login-form">
                            <div class="text-center">
                                <div class="icon-object border-warning-400 text-warning-400"><i class="icon-people"></i></div>
                                <h5 class="content-group-lg">{{ trans('login.login') }} <small class="display-block">{{ trans('login.enter-credentials') }}</small></h5>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                {!! Form::email('email', old('email'), ["class" => "form-control", "placeholder" => trans('user.email')]) !!}
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => trans('user.password')]) !!}
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group login-options">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="checkbox-inline">
                                            {!! Form::checkbox('remember', true, old('remember') ? old('remember') : true, ["class" => "styled"]) !!}
                                            {{ trans('login.remember') }}
                                        </label>
                                    </div>

                                    <!--
                                    <div class="col-sm-6 text-right">
                                        <a href="login_password_recover.html">Forgot password?</a>
                                    </div>
                                    -->
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::button(trans('login.button').' <i class="icon-circle-right2 position-right"></i>', ["type" => "submit", "class" => "btn bg-blue btn-block"]) !!}
                            </div>

                            <!--
                            <div class="content-divider text-muted form-group"><span>or sign in with</span></div>
                            <ul class="list-inline form-group list-inline-condensed text-center">
                                <li><a href="#" class="btn border-indigo text-indigo btn-flat btn-icon btn-rounded"><i class="icon-facebook"></i></a></li>
                                <li><a href="#" class="btn border-pink-300 text-pink-300 btn-flat btn-icon btn-rounded"><i class="icon-dribbble3"></i></a></li>
                                <li><a href="#" class="btn border-slate-600 text-slate-600 btn-flat btn-icon btn-rounded"><i class="icon-github"></i></a></li>
                                <li><a href="#" class="btn border-info text-info btn-flat btn-icon btn-rounded"><i class="icon-twitter"></i></a></li>
                            </ul>
                            -->

                            <div class="content-divider text-muted form-group"><span>{{ trans('login.have-not-account') }}</span></div>
                            <a href="{{ route('auth.register') }}" class="btn bg-slate btn-block content-group">{{ trans('login.register') }}</a>
                            <span class="help-block text-center no-margin">{!! trans('login.warning', ['terms' => "#terms", "cookie" => "#cookie"]) !!}</span>
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