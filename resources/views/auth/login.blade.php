@extends('_layout.site')

@section('content')



    <div class="container auth-container">

        <div class="col-md-8 col-md-offset-2">
            <div class="col-xs-12 col-md-7">

                <div class="well well-danger">
                    <form class="p-t-40" role="form" method="POST" action="{{ url('/auth/login') }}">
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

                        <p class="text-center">
                            <button type="submit" class="btn btn-warning ">{{trans('auth.Login')}}</button>
                        </p>
                        <a href="/password/email/"
                           class="btn btn-link btn-block">{{trans('auth.Forgot your password')}}?</a>
                    </form>
                </div>
            </div>
            <div class="col-xs-12 col-md-5">
                <div class="well well-primary">
                    <p class="lead">{{trans('auth.Register now for ')}} {{trans('auth.free')}}
                    </p>
                    <ul class="list-unstyled" style="line-height: 2">
                        <li><span class="fa fa-check text-success"></span> Делайте заказыы</li>
                        <li><span class="fa fa-check text-success"></span> Оплачивайте за услуги</li>
                        <li><span class="fa fa-check text-success"></span> Проверяйте статус работ</li>
                        <li><span class="fa fa-check text-success"></span> Задавайте вопросы</li>
                        <li><span class="fa fa-check text-success"></span> Оставляйте отзывы</li>
                    </ul>
                    <p class="text-center"><a href="/auth/register/"
                                              class="btn btn-info">{{trans('auth.I want to register')}}</a></p>

                    <p class="text-center"><a href="#">{{trans('auth.Terms of use')}}</a></p>
                </div>
            </div>
        </div>
    </div>













@endsection
