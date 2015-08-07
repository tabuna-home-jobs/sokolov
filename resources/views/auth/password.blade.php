@extends('appAutch')

@section('content')

<body class="register-page">
<div class="register-box">
    <div class="register-logo">
        <b>Управление</b> МИС</a>
    </div>

    <div class="register-box-body">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

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


        <p class="login-box-msg">Забыли пароль? Востановим!</p>
        <form action="{{ url('/password/email')}}" method="post">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="row">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Востановить пароль</button>
            </div>
        </form>





    </div><!-- /.form-box -->
</div><!-- /.register-box -->



@endsection
