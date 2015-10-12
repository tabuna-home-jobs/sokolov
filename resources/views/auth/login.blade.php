@extends('_layout.site')

@section('content')



    <div class="container auth-container">

        <div class="col-md-10 col-md-offset-1">
            <div class="col-xs-12 col-md-6">

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
            <div class="col-xs-12 col-md-6">
                <div class="well well-primary">
                    <p class="lead">{{trans('auth.Register now for ')}} {{trans('auth.free')}}
                    </p>
                    <ul class="list-unstyled" style="line-height: 2">
                        <li><span class="fa fa-check text-success"></span> {{trans('auth.Create orders')}}</li>
                        <li><span class="fa fa-check text-success"></span> {{trans('auth.Pay for services')}}</li>
                        <li><span class="fa fa-check text-success"></span> {{trans('auth.Check order status')}}</li>
                        <li><span class="fa fa-check text-success"></span> {{trans('auth.Send questions')}}</li>
                        <li><span class="fa fa-check text-success"></span> {{trans('auth.Leave reviews')}}</li>
                    </ul>
                    <p class="text-center"><a href="/auth/register/"
                                              class="btn btn-info">{{trans('auth.I want to register')}}</a></p>

                    <p class="text-center"><a target="_blank" href="@if(App::getLocale()=='ru') /oferta/RussianRules.doc @else /oferta/EnglishRules.doc @endif">{{trans('auth.Terms of use')}}</a></p>
                </div>
            </div>
        </div>
    </div>













@endsection
