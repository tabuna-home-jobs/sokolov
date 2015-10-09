@extends('app')

@section('content')


    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">Новый пользователь</h1>
    </div>
    <div class="wrapper-md">
        <form class="row" role="form" action="{{URL::route('dashboard.editor.store')}}"
              method="post">
            <div class="col-sm-8">
                <div class="panel panel-default">
                    <div class="panel-heading font-bold">Общая информация</div>
                    <div class="panel-body">


                        <div class="form-group">
                            <label>Имя</label>
                            <input class="form-control" type="text" maxlength="255" required name="first_name"
                                   value="{{old('first_name')}}">
                        </div>
                        <div class="form-group">
                            <label>Фамилия</label>
                            <input class="form-control" type="text" maxlength="255" required name="last_name"
                                   value="{{old('last_name')}}">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" maxlength="255" required name="email"
                                   value="{{old('email')}}">
                        </div>

                        <div class="form-group">
                            <label>Телефон</label>
                            <input class="form-control" type="text" maxlength="255" required name="phone"
                                   value="{{old('phone')}}">
                        </div>


                        <div class="form-group">

                            <label>Умения</label>
                            <select ui-jq="chosen" multiple="" name="skills[]" class="w-md" style="display: none;"
                                    data-placeholder="Выберите умение редактора">
                                @foreach($Skills as $skill)
                                    <option value="{{$skill->id}}">{{$skill->name}}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading font-bold">Безопасность</div>
                    <div class="panel-body">


                        <div class="form-group">
                            <label>Пароль</label>
                            <input class="form-control" type="password" maxlength="255" placeholder="***************"
                                   required name="password">
                        </div>

                        <div class="form-group">
                            <label>Пароль</label>
                            <input type="password" name="password_confirmation" class="form-control" required=""
                                   placeholder="Повторите пароль">
                        </div>


                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-primary">Отправить</button>

                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
