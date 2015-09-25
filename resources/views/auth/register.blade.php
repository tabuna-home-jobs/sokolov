@extends('_layout.site')

@section('content')


    <div class="container auth-container">
        <div class="col-xs-12 col-md-6">


            <p class="lead">{{trans('auth.Register')}} :</p>

            <div class="well">
                <form action="{{ url('/auth/register') }}" method="post">
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


                    <button type="submit" class="btn btn-warning btn-block">{{trans('auth.Register')}}</button>
                    <a href="/password/email/" class="btn btn-link btn-block">{{trans('auth.Forgot your password')}}</a>
                </form>
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <p class="lead">{{trans('auth.Do you already have an ')}} <span class="text-success">{{trans('auth.account')}}
                    ?</span></p>
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
                <li><a href="#">{{trans('auth.Terms of use')}}</a></li>
            </ul>
            <p><a href="/auth/login/" class="btn btn-info btn-block">{{trans('auth.To login')}}</a></p>
        </div>
    </div>




@endsection
