@extends('app')

@section('content')


    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">Пользователь {{$User->first_name}}</h1>
    </div>
    <div class="wrapper-md">
        <form class="row" role="form" action="{{URL::route('dashboard.editor.update',$User->id)}}"
              method="post">
            <div class="col-sm-8">
                <div class="panel panel-default">
                    <div class="panel-heading font-bold">Общая информация</div>
                    <div class="panel-body">


                        <div class="form-group">
                            <label>Имя</label>
                            <input class="form-control" type="text" maxlength="255" required
                                   value="{{$User->first_name}}" name="first_name">
                        </div>
                        <div class="form-group">
                            <label>Фамилия</label>
                            <input class="form-control" type="text" maxlength="255" required
                                   value="{{$User->last_name}}" name="last_name">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" maxlength="255" value="{{$User->email}}" required
                                   name="email">
                        </div>

                        <div class="form-group">
                            <label>Телефон</label>
                            <input class="form-control" type="text" maxlength="255" value="{{$User->phone}}" required
                                   name="phone">
                        </div>


                        <div class="form-group">

                            <label>Умения</label>
                            <select ui-jq="chosen" multiple="" name="skills[]" class="w-md" style="display: none;"
                                    data-placeholder="Выберите умение редактора">

                                @foreach($Skills as  $skill)
                                    <option @if($skill['select']) selected
                                            @endif value="{{$skill['id']}}">{{$skill['name']}}</option>
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
                                   name="password">
                        </div>

                        <div class="form-group">
                            <label>Пароль</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                   placeholder="Повторите пароль">
                        </div>


                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-primary">Отправить</button>

                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
