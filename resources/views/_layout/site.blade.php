<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Falcon Scientific Editing')</title>
    <link rel="icon" type="image/png" href="/img/logo-min.png"/>

    <meta id="token" name="token" value="{{ csrf_token() }}">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image" content="@yield('avatar')">
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('description')"/>
    <meta name="twitter:image:src" content="@yield('avatar')"/>
    <meta name="robots" content="noindex">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700,400italic,500italic,300italic&subset=latin,cyrillic'
          rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300&subset=latin,cyrillic' rel='stylesheet'
          type='text/css'>

    <link rel="stylesheet" href="{{asset('/build/css/app.css')}}" type="text/css"/>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="/build/css/flipclock.css">

</head>
<body>


<div id="loader-wrapper">
    <img id="loader-logo" src="/img/logo.png" class="img-responsive">

    <div id="loader"></div>
</div>


<div class="topline">

</div>


<div class="container">


    <div class="row">
        <div class="col-md-7 col-sm-12 text-center">

            <div class="icon-info-top navbar-form navbar-left hidden-xs">

                <a href="skype:+79802665074?call"><span class="glyphicon glyphicon-earphone"></span>
                    <b>8(980)266-5074</b></a>

                <a href="mailto:contact@falconediting.com"><span
                            class="fa fa-envelope-o"></span> contact@falconediting.com</a>

                <a href="skype:falconediting?call"><span class="fa fa-skype"></span> falconediting</a>

            </div>
        </div>


        <div class="col-md-5 hidden-sm hidden-xs">

            <form class="navbar-form navbar-right right-top-menu" role="search" action="{{URL::route('search.index')}}">

                <div class="input-group">

              <span class="input-group-btn">
              <button class="btn btn-default" type="submit">
                  <span class="glyphicon glyphicon-search"></span>
              </button>
             </span>
                    <input type="text" name="search" placeholder="{{trans('main.Search')}} ..." class="form-control">
                </div>

                <a href="{{url('/language/en')}}" class="@if(App::getLocale() == 'en') active @endif">English</a>
                <a href="{{url('/language/ru')}}" class="@if(App::getLocale() == 'ru') active @endif">Русский</a>
            </form>
        </div>

    </div>


    <nav class="navbar navbar-default">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand2" href="/"><img src="/img/logo.png" class="img-responsive"> </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav  navbar-right">
                @if(App::getLocale() == 'en')
                    {!! Menu::getLI('english-top-menu') !!}
                @else
                    {!! Menu::getLI('russian-top-menu') !!}
                @endif


                    <li class="text-right hidden visible-xs @if(App::getLocale() == 'en') active @endif"><a
                                href="{{url('/language/en')}}">English</a></li>
                    <li class="text-right hidden visible-xs @if(App::getLocale() == 'ru') active @endif"><a
                                href="{{url('/language/ru')}}">Русский</a></li>


                    <li class="login-a  hidden-sm hidden-xs"><a
                                href="/auth/login">@if(!Auth::check()) {{trans('main.sign')}} @else
                                {{trans('main.panel')}} @endif</a></li>

                    <li class=" dropdown">
                        <!-- Single button -->

            @if(Auth::check())
                <a id="drop1" href="#" role="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">

                        {{Auth::user()->first_name}}

                    <span class="caret"></span>
                </a>
            @endif
                        <ul class="dropdown-menu" aria-labelledby="drop1">
                            <li>
                                <a  href="/auth/login">
                                    @if(!Auth::check())
                                        {{trans('main.sign')}}
                                    @else
                                        @if(Auth::user()->checkRole('admin'))
                                            {{trans('main.dashboard')}}
                                        @elseif(Auth::user()->checkRole('user'))
                                            {{trans('main.userhome')}}
                                        @elseif(Auth::user()->checkRole('editor'))
                                            {{trans('main.editorhome')}}
                                        @endif
                                    @endif
                                </a>
                            </li>
                            @if(Auth::check())
                                <li role="separator" class="divider"></li>
                                <li><a href="/auth/logout/">{{trans('main.logout')}}</a></li>
                            @endif
                        </ul>

                    </li>


            </ul>

        </div>

    </nav>


    @if(Session::has('good'))
        <div class="container-alert">
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Успех!</h4>
                {{Session::get('good')}}
            </div>
        </div>
    @elseif(Session::has('bad'))
        <div class="container-alert">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Что то пошло не так!</h4>
                {{Session::get('bad')}}
            </div>
        </div>
    @endif


    @if (count($errors) > 0)
        <div class="container-alert">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Ошибка!</strong> Пожалуйста проверте вводимые данные.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif


</div>


@yield('content')


<footer id="footer">

    <div class="bg-white">
        <div class="container">
            <div class="row padding-footer">
                <div class="col-sm-3 col-xs-6">
                    <h4>{{trans('footer.mission')}}</h4>

                    <p>
                        {{trans('footer.about')}}
                    </p>


                    <img src="/img/logo-while.png" class="img-responsive">

                </div>
                <div class="col-sm-3  col-xs-6">
                    <h4>{{trans('footer.contacts')}}</h4>

                    <ul class="menu-footer-contact">
                        <li><a href="skype:+79802665074?call"><span
                                        class="glyphicon glyphicon-earphone"></span> 8(980)266-5074</a></li>
                        <li><a href="mailto:contact@falconediting.com"><span
                                        class="fa fa-envelope-o"></span> contact@falconediting.com</a></li>
                        <li><a href="skype:falconediting?call"><span class="fa fa-skype"></span> falconediting</a></li>
                    </ul>

                </div>
                <div class="col-sm-3 hidden-sm hidden-xs">
                    <h4>{{trans('footer.navigation')}}</h4>

                    <ul class="menu-footer ">
                        @if(App::getLocale() == 'en')
                            {!! Menu::getLI('english-footer-menu') !!}
                        @else
                            {!! Menu::getLI('russian-footer-menu') !!}
                        @endif
                    </ul>

                </div>
                <div class="col-sm-3  hidden-sm hidden-xs">
                    <h4 class="text-u-c m-b font-thin">{{trans('footer.payment')}}</h4>
                    <img src="/img/pay.png" class="img-responsive">
                </div>
            </div>
        </div>
    </div>
    <div class="bg-light dk">
        <div class="container">
            <div class="row padder-v m-t">
                <div class="col-xs-6">
                    © 2015, Falcon Scientific Editing, {{trans('footer.Denis A. Sokolov')}}
                </div>
                <div class="col-xs-6 text-right">
                    <p>{{trans('footer.octavian')}} <span class="text-right"><a
                                    href="http://octavian48.ru" target="_blank"><img src="/img/octavian.png"></a></span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>



<script src="{{asset('/build/js/app.js')}}" type="text/javascript"></script>

<script src="/build/js/flipclock.min.js"></script>

<script>



    $(document).ready(function () {
        $("#loader-wrapper").remove();

        $('.carousel-inner div.item:first-child').addClass('active');
    });


    $('.img-hover').hover(function () {
        var old = $(this).attr('src');
        $(this).attr('src', $(this).attr('data-altimg'));
        $(this).attr('data-altimg', old);

        console.log('hover');
    }, function () {

        var old = $(this).attr('src');
        $(this).attr('src', $(this).attr('data-altimg'));
        $(this).attr('data-altimg', old);

    });


    $('.scroll-top').click(function () {
        var body = $("html, body");
        body.stop().animate({scrollTop: 0}, '100', 'swing', function () {
        });
    });


</script>


</body>
</html>
