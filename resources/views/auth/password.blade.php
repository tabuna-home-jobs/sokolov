@extends('_layout.site')

@section('content')











    <div class="container auth-container">
        <div class="col-xs-12 col-md-6 col-md-offset-3">


            <p class="lead text-center">Восстановление пароля :</p>


            <div class="well">
                <form action="{{ url('/password/email')}}" method="post">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                               placeholder="Email"/>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>

                    <button type="submit" class="btn btn-warning btn-block">Востановить пароль</button>


                    <hr>

                    <ul class="list-unstyled" style="line-height: 2">
                        <ol><span class="fa fa-check text-success"></span> В форме укажите свой E-mail</ol>
                        <ol><span class="fa fa-check text-success"></span> Нажмите на кнопку "Востановить пароль".</ol>
                        <ol><span class="fa fa-check text-success"></span> На указанный почтовый ящик придёт письмо,
                            содержащее ссылку для запроса нового пароля.
                        </ol>
                        <ol><span class="fa fa-check text-success"></span> Перейдите по указанной в письме ссылке
                            восстановления.
                        </ol>
                    </ul>

                    <hr>


                    <a href="/auth/login/" class="btn btn-link btn-block">Я вспомнил пароль</a>
                </form>
            </div>
        </div>
    </div>


@endsection
