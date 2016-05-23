@extends('_layout.site')

@section('content')



    <div class="container auth-container">

        <div class="col-md-10 col-md-offset-1">
            <div class="col-xs-12 col-md-8">

                <div class="well well-danger auth-form">
                    <form class="p-t-40 p-b-5" role="form" method="POST" action="{{ url('/auth/login') }}">
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
            <div class="col-xs-12 col-md-4">
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

                    <p class="text-center"><a target="_blank"
                                              href="@if(App::getLocale()=='ru') /page/publichnaya-oferta-ob-okazanii-perevodcheskikh-i-inykh-uslug @else /page/public-offer-on-provision-of-translation-and-other-services @endif">{{trans('auth.Terms of use')}}</a>
                    </p>
                </div>
            </div>
        </div>


    </div>


    <div class="container-fluid">
        <div class="row backgound-grey">
            <div class="container why-work hidden-sm hidden-xs">


                <div class="text-center">

                    <h3><span>{{trans('main.Work')}}</span></h3>

                </div>

                <div class="row">


                    <div class="col-md-3  text-center">
                        <h2><span>{{trans('main.You')}}:</span></h2>
                    </div>

                    <div class="col-md-3">
                        <img class="img-responsive" src="/img/infografica-1.png" alt="{{trans('main.Order services')}}">

                        <p class="text-center">{{trans('main.Order services')}}</p>

                        <p class="text-center"><span class="glyphicon glyphicon-arrow-down"></span></p>
                    </div>

                    <div class="col-md-3">
                        <img class="img-responsive" src="/img/infografica-2.png" alt="{{trans('main.To pay for services')}}">

                        <p class="text-center">{{trans('main.To pay for services')}}</p>

                        <p class="text-center"><span class="glyphicon glyphicon-arrow-down"></span></p>
                    </div>

                    <div class="col-md-3">
                        <img class="img-responsive" src="/img/infografica-3.png" alt="{{trans('main.You get ready to work')}}">

                        <p class="text-center">{{trans('main.You get ready to work')}}</p>

                        <p class="text-center"><span class="glyphicon glyphicon-arrow-down"></span></p>
                    </div>

                </div>


                <div class="row">

                    <div class="col-md-3 text-center">
                        <h2><span>{{trans('main.We')}}:</span></h2>
                    </div>

                    <div class="col-md-3">
                        <img class="img-responsive" src="/img/infografica-4.png" alt="{{trans('main.We expect the price')}}">

                        <p class="text-center">{{trans('main.We expect the price')}}</p>
                    </div>

                    <div class="col-md-3">
                        <img class="img-responsive" src="/img/infografica-5.png" alt="{{trans('main.To provide services')}}">

                        <p class="text-center">{{trans('main.To provide services')}}</p>
                    </div>

                    <div class="col-md-3">
                        <img class="img-responsive" src="/img/infografica-6.png" alt="{{trans('main.Get Your review')}}">

                        <p class="text-center">{{trans('main.Get Your review')}}</p>
                    </div>


                </div>


            </div>
        </div>
    </div>











@endsection
