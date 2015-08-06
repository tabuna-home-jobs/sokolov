<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Соколов</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />



    <link href="{{asset('/menu/menu.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="/dash/bootstrap/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="/dash/bootstrap/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="/dash/css/font.css" type="text/css" />
    <link rel="stylesheet" href="/dash/css/app.css" type="text/css" />
    <meta name="token" content="{{ csrf_token() }}" >
    <link href="{{ asset('/dash/bootstrap/css/jasny-bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/dash/bootstrap/css/custom.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/dash/dist/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />


    <script src="/dash/bower_components/jquery/dist/jquery.min.js"></script>

    <script type="text/javascript">
        var menus = {
            "oneThemeLocationNoMenus" : "",
            "moveUp" : "Вверх",
            "moveDown" : "Вних",
            "moveToTop" : "В начало",
            "moveUnder" : "До %s",
            "moveOutFrom" : "Под  %s",
            "under" : "После %s",
            "outFrom" : "За from %s",
            "menuFocus" : "%1$s. элемент меню %2$d из %3$d.",
            "subMenuFocus" : "%1$s. Меню суб-элемента %2$d из %3$s."
        };
    </script>


</head>
<body>
<div class="app app-header-fixed  ">


    <div class="container w-xxl w-auto-xs">
        <a href class="navbar-brand block m-t">Соколов</a>
        <div class="m-b-lg">
            <div class="wrapper text-center">
                <strong>Для входи введите необходимые данные</strong>
            </div>




            @if(Session::has('good'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>	<i class="icon fa fa-check"></i> Успех!</h4>
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
        <div class="text-center" ng-include="'tpl/blocks/page_footer.html'">
            <p>
                <small class="text-muted">Сайт создан в студии Октавиан<br>&copy; 2015</small>
            </p>
        </div>
    </div>

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










