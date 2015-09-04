
@extends('appAutch')

@section('content')


    <body class="login-page">
<div class="login-box">
    <div class="login-box-body">

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

            <form role="form" method="POST" action="{{ url('/auth/login') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">


            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Пароль"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember"> Запомнить меня
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Войти</button>
                </div><!-- /.col -->
            </div>
        </form>
        

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->


@endsection
