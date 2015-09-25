@extends('_layout.site')

@section('content')



    <div class="container auth-container">
        <div class="col-xs-12 col-md-6">


            <p class="lead">{{trans('auth.Sign in')}}</p>

            <div class="well">
                <form role="form" method="POST" action="{{ url('/auth/login') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label for="username" class="control-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email"
                               value="{{ old('email') }}"/>
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label">{{trans('auth.Password')}}</label>
                        <input type="password" class="form-control" name="password"
                               placeholder="{{trans('auth.Password')}}"/>
                        <span class="help-block"></span>
                    </div>

                    <button type="submit" class="btn btn-warning btn-block">{{trans('auth.Login')}}</button>
                    <a href="/password/email/" class="btn btn-link btn-block">{{trans('auth.Forgot your password')}}</a>
                </form>
            </div>
            </div>
        <div class="col-xs-12 col-md-6">
            <p class="lead">{{trans('auth.Register now for ')}} <span class="text-success">{{trans('auth.free')}}</span>
            </p>
            <ul class="list-unstyled" style="line-height: 2">
                <li><span class="fa fa-check text-success"></span> Делай заказы</li>
                <li><span class="fa fa-check text-success"></span> Оплачивай</li>
                <li><span class="fa fa-check text-success"></span> Проверяй работу</li>
                <li><span class="fa fa-check text-success"></span> можно ещё написать
                    <small>много вещеё</small>
                </li>
                <li><span class="fa fa-check text-success"></span> можно ещё написать
                    <small>много вещеё</small>
                </li>

                <li class="text-center"><a href="#">{{trans('auth.Terms of use')}}</a></li>
            </ul>
            <p><a href="/auth/register/" class="btn btn-info btn-block">{{trans('auth.I want to register')}}</a></p>
            </div>
    </div>













@endsection
