@extends('_layout.site')

@section('content')


    <div class="container auth-container">
        <div class="col-xs-12 col-md-6">


            <p class="lead">Регистрация :</p>

            <div class="well">
                <form action="{{ url('/auth/register') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group has-feedback">
                        <label for="username" class="control-label">Имя</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                               placeholder="Имя"/>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="username" class="control-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                               placeholder="Email"/>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="username" class="control-label">Пароль</label>
                        <input type="password" class="form-control" name="password" placeholder="Пароль"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="username" class="control-label">Повторите пароль</label>
                        <input type="password" class="form-control" name="password_confirmation"
                               placeholder="Повторите пароль"/>
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    </div>


                    <button type="submit" class="btn btn-warning btn-block">Зарегистрироваться</button>
                    <a href="/password/email/" class="btn btn-link btn-block">Забыли пароль</a>
                </form>
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <p class="lead">У вас у же есть <span class="text-success">Аккаунт?</span></p>
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
                <li><a href="#">Условия пользовательского соглашения</a></li>
            </ul>
            <p><a href="/auth/login/" class="btn btn-info btn-block">Авторизоваться на сайте</a></p>
        </div>
    </div>




@endsection
