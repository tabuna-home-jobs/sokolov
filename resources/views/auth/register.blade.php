@extends('_layout.site')

@section('content')


    <div class="container auth-container">

        <div class="col-md-10 col-md-offset-1">

            <div class="col-xs-12 col-md-7">


                <div class="well well-danger">
                    <form class="p-t-40" action="{{ url('/auth/register') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group has-feedback">
                            <label for="username" class="control-label">{{trans('auth.first name')}}</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                   placeholder="{{trans('auth.first name')}}"/>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="username" class="control-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                   placeholder="Email"/>
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="username" class="control-label">{{trans('auth.Password')}}</label>
                            <input type="password" class="form-control" name="password"
                                   placeholder="{{trans('auth.Password')}}"/>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="username" class="control-label">{{trans('auth.Repeat password')}}</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                   placeholder="{{trans('auth.Repeat password')}}"/>
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        </div>

                        <p class="text-center">
                            <button type="submit" class="btn btn-warning">{{trans('auth.Register')}}</button>
                        </p>
                        <a href="/password/email/"
                           class="btn btn-link btn-block">{{trans('auth.Forgot your password')}}</a>
                    </form>
                </div>
            </div>
            <div class="col-xs-12 col-md-5">
                <div class="well well-primary">
                    <p class="lead">{{trans('auth.Do you already have an ')}} {{trans('auth.account')}}?</p>
                    <ul class="list-unstyled" style="line-height: 2">
                        <li><span class="fa fa-check text-success"></span> Делай заказы</li>
                        <li><span class="fa fa-check text-success"></span> Оплачивай</li>
                        <li><span class="fa fa-check text-success"></span> Проверяй работу</li>
                        <li><span class="fa fa-check text-success"></span> Делай заказы</li>
                        <li><span class="fa fa-check text-success"></span> Оплачивай</li>
                        <li><span class="fa fa-check text-success"></span> Проверяй работу</li>
                        <li><span class="fa fa-check text-success"></span> Делай заказы</li>
                        <li><span class="fa fa-check text-success"></span> Оплачивай</li>
                        <li><span class="fa fa-check text-success"></span> Проверяй работу</li>
                        <li><span class="fa fa-check text-success"></span> можно ещё написать
                            <small>много вещеё</small>
                        </li>
                    </ul>
                    <p class="text-center"><a href="/auth/login/" class="btn btn-info">{{trans('auth.To login')}}</a>
                    </p>

                    <p class="text-center"><a href="#">{{trans('auth.Terms of use')}}</a></p>
                </div>
            </div>
        </div>
    </div>




@endsection
