@extends('appAutch')

@section('content')



<body class="register-page">
<div class="register-box">

    <div class="register-box-body">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Ошибка!</strong> Проверьте вводимые данные.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ url( '/'. App::getLocale(). '/auth/register') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Имя"/>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Пароль"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password_confirmation" placeholder="Повторите пароль"/>
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> Я согласен на обработку <a href="#">персональных данных</a>
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Зарегистрироваться</button>
                </div><!-- /.col -->
            </div>


        </form>
    </div><!-- /.form-box -->
</div><!-- /.register-box -->



@endsection
