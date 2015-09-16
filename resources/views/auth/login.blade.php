@extends('_layout.site')

@section('content')



    <div class="container auth-container">
        <div class="col-xs-12 col-md-6">


            <p class="lead">Войти на сайт</p>

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
                        <label for="password" class="control-label">Пароль</label>
                        <input type="password" class="form-control" name="password" placeholder="Пароль"/>
                        <span class="help-block"></span>
                    </div>

                    <button type="submit" class="btn btn-warning btn-block">Войти</button>
                    <a href="/password/email/" class="btn btn-link btn-block">Забыли пароль</a>
                </form>
            </div>
            </div>
        <div class="col-xs-12 col-md-6">
            <p class="lead">Зарегистрируйся сейчас <span class="text-success">Бесплатно</span></p>
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

                <li class="text-center"><a href="#">Условия пользовательского соглашения</a></li>
            </ul>
            <p><a href="/auth/register/" class="btn btn-info btn-block">Я хочу зарегистрироваться</a></p>
            </div>
    </div>













@endsection
