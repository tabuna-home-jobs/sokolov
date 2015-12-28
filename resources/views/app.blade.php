<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Соколов</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <link rel="icon" type="image/png" href="/img/logo-min.png"/>

    <link href="{{asset('/menu/menu.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="/dash/bootstrap/css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="/dash/bootstrap/css/font-awesome.min.css" type="text/css"/>


    <link rel="stylesheet" href="/dash/css/font.css" type="text/css"/>
    <link rel="stylesheet" href="/dash/css/app.css" type="text/css"/>
    <meta name="token" content="{{ csrf_token() }}">
    <link href="{{ asset('/dash/bootstrap/css/jasny-bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/dash/bootstrap/css/custom.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/dash/dist/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css"/>


    <script src="/dash/bower_components/jquery/dist/jquery.min.js"></script>


</head>
<body>
<div class="app app-header-fixed app-aside-fixed app-aside-dock app-aside-folded ">

    <!-- header -->
    <header id="header" class="app-header navbar" role="menu">
        <!-- navbar header -->
        <div class="navbar-header bg-dark">
            <button class="pull-right visible-xs dk" ui-toggle="show" target=".navbar-collapse">
                <i class="glyphicon glyphicon-cog"></i>
            </button>
            <button class="pull-right visible-xs" ui-toggle="off-screen" target=".app-aside" ui-scroll="app">
                <i class="glyphicon glyphicon-align-justify"></i>
            </button>
            <!-- brand -->
            <a href="{{URL::route('dashboard..index')}}" class="navbar-brand text-lt">
                <i class="fa fa-language"></i>
            </a>
            <!-- / brand -->
        </div>
        <!-- / navbar header -->

        <!-- navbar collapse -->
        <div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only">


            <!-- nabar right -->
            <ul class="nav navbar-nav navbar-right">


                <li>
                    <a href="/auth/logout">
                        <span class="hidden-sm hidden-md"><i class="fa fa-sign-out"></i> </span>
                        <span class="visible-xs-inline">Выйти</span>

                    </a>
                </li>


            </ul>
            <!-- / navbar right -->
        </div>
        <!-- / navbar collapse -->
    </header>
    <!-- / header -->

    <!-- aside -->
    <aside id="aside" class="app-aside hidden-xs bg-dark">
        <div class="aside-wrap">
            <div class="navi-wrap">

                <!-- nav -->
                <nav ui-nav class="navi clearfix">
                    <ul class="nav">
                        <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                            <span>Навигация</span>
                        </li>


                        <li class="{{Active::route('dashboard..*')}}">
                            <a href="{{URL::route('dashboard..index')}}">
                                <i class="glyphicon glyphicon-stats icon text-primary-dker"></i>
                                <span>Панель</span>
                            </a>
                        </li>


                        <li class="{{Active::route('dashboard.page.*')}}">
                            <a href="{{URL::route('dashboard.page.index')}}">
                                <i class="glyphicon glyphicon-file icon"></i>
                                <span>Страницы</span>
                            </a>
                        </li>
                        <li class="{{Active::route('dashboard.news.*')}}">
                            <a href="{{URL::route('dashboard.news.index')}}">
                                <i class="fa fa-newspaper-o icon"></i>
                                <span>Новости</span>
                            </a>
                        </li>

                        <li class="{{Active::route('wmenuindex')}}">
                            <a href="{{URL::route('wmenuindex')}}">
                                <i class="glyphicon glyphicon-align-justify"></i>
                                <span>Меню</span>
                            </a>
                        </li>


                        <li class="line dk"></li>

                        <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                            <span>Компоненты</span>
                        </li>


                        <li class="{{Active::route(['dashboard.block.*','dashboard.element.*'])}}">
                            <a href="{{URL::route('dashboard.block.index')}}">
                                <i class="fa fa-cubes icon"></i>
                                <span class="font-bold">Блоки</span>
                            </a>
                        </li>




                        <li class="{{Active::route('dashboard.news.*')}}">
                            <a href="{{URL::route('dashboard.goods.index')}}">
                                <i class="fa fa-stethoscope"></i>
                                <span>Услуги</span>
                            </a>
                        </li>


                        <li class="{{Active::route('dashboard.order.*')}}">
                            <a href="{{URL::route('dashboard.order.index')}}">
                                <i class="fa fa-cart-arrow-down"></i>
                                <span>Заказы</span>
                            </a>
                        </li>


                        <li class="{{Active::route('dashboard.review.*')}}">
                            <a href="{{URL::route('dashboard.review.index')}}">
                                <i class="fa fa-star-half-o"></i>
                                <span>Отзывы</span>
                            </a>
                        </li>


                        <li class="{{Active::route('dashboard.statinfo.*')}}">
                            <a href="{{URL::route('dashboard.statinfo.index')}}">
                                <i class="fa fa-sitemap"></i>
                                <span>Учёт</span>
                            </a>
                        </li>

                        <li class="{{Active::route('dashboard.benefits.*')}}">
                            <a href="{{URL::route('dashboard.benefits.index')}}">
                                <i class="fa fa-dollar"></i>
                                <span>Выплаты</span>
                            </a>
                        </li>


                        <li class="{{Active::route('dashboard.category.*')}}">
                            <a href="{{URL::route('dashboard.category.index')}}">
                                <i class="fa fa-briefcase"></i>
                                <span>Категории</span>
                            </a>
                        </li>


                        <li class="{{Active::route('dashboard.langorder.*')}}">
                            <a href="{{URL::route('dashboard.langorder.index')}}">
                                <i class="fa fa-book"></i>
                                <span>Языки в заказе</span>
                            </a>
                        </li>


                        <li class="{{Active::route('dashboard.user.*')}}">
                            <a href="{{URL::route('dashboard.user.index')}}">
                                <i class="fa fa-users"></i>
                                <span>Пользователи</span>
                            </a>
                        </li>


                        <li class="{{Active::route('dashboard.editor.*')}}">
                            <a href="{{route('dashboard.editor.index')}}">
                                <i class="fa fa-user"></i>
                                <span>Редакторы</span>
                            </a>
                        </li>

                        <li class="{{Active::route('dashboard.seostatic.*')}}">
                            <a href="{{route('dashboard.seostatic.index')}}">
                                <i class="fa fa-bar-chart"></i>
                                <span>SEO</span>
                            </a>
                        </li>


                    </ul>
                </nav>
                <!-- nav -->


            </div>
        </div>
    </aside>
    <!-- / aside -->

    <!-- content -->
    <div id="content" class="app-content" role="main">
        <div class="app-content-body ">


            @if (Session::has('good'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Успех!</h4>
                    {{Session::get('good')}}
                </div>
            @elseif(Session::has('bad'))
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Что то пошло не так!</h4>
                    {{Session::get('bad')}}
                </div>
            @endif


            @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Ошибка!</strong> Пожалуйста проверте вводимые данные.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif



            @yield('content')


        </div>
    </div>
    <!-- / content -->


</div>

<script src="/dash/bootstrap/js/bootstrap.js"></script>
<script src="/dash/js/ui-load.js"></script>
<script src="/dash/js/ui-jp.config.js"></script>
<script src="/dash/js/ui-jp.js"></script>
<script src="/dash/js/ui-nav.js"></script>
<script src="/dash/js/ui-toggle.js"></script>
<script src="{{asset('/dash/bootstrap/js/custom.js')}}" type="text/javascript"></script>
<script src="{{asset('/dash/plugins/tinymce/tinymce.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/dash/bootstrap/js/jasny-bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/dash/dist/js/moment-with-locales.js')}}" type="text/javascript"></script>
<script src="{{asset('/dash/dist/js/ru-picker.js')}}" type="text/javascript"></script>
<script src="{{asset('/dash/dist/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>


</body>
</html>
