@extends('app')

@section('content')


    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">Новая страница</h1>
    </div>
    <div class="wrapper-md">
        <form class="row" role="form" action="{{URL::route('dashboard.shares.update',$Shares->slug)}}" method="post">
            <div class="col-sm-8">
                <div class="panel panel-default">
                    <div class="panel-heading font-bold">Содержание</div>
                    <div class="panel-body">

                                    <textarea class="textarea textareaedit form-control" name="content" rows="42">
                                        {!! $Shares->content or '' !!}
                                    </textarea>

                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading font-bold">Общая информация</div>
                    <div class="panel-body">


                        <div class="form-group">
                            <label>Заголовок</label>
                            <input class="form-control" type="text" maxlength="255" required name="title"
                                   value="{{$Shares->title or ''}}">
                        </div>
                        <div class="form-group">
                            <label>Имя</label>
                            <input class="form-control" type="text" maxlength="255" required name="name"
                                   value="{{$Shares->name or ''}}">
                        </div>


                        <div class="form-group">
                            <label>Миниатюра</label>

                            <div class="form-group text-center">

                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div data-trigger="fileinput" class="fileinput-preview thumbnail"
                                         style="line-height: 150px;"><img src="{{$Shares->avatar or ''}}">
                                    </div>

                                    <div>
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">Выбрать изображение</span><span
                                                            class="fileinput-exists">Изменить</span><input type="file"
                                                                                                           name="avatar"
                                                                                                           value="{{$Shares->avatar or ''}}"></span>
                                        <a href="#" class="btn btn-default fileinput-exists"
                                           data-dismiss="fileinput">Удалить</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label>Теги</label>
                            <input ui-jq="tagsinput" ui-options="" class="form-control w-md" data-role="tagsinput"
                                   type="text" maxlength="255"
                                   required name="tag" value="{{$Shares->tag or ''}}">
                        </div>

                        <div class="form-group">
                            <label>Описание</label>

                            <textarea class="form-control" rows="7" maxlength="255" required
                                      name="descript">{{$Shares->descript or ''}}</textarea>
                        </div>


                        <div class="form-group">
                            <label>Категория</label>
                            <select class="form-control w-md" ui-jq="chosen" required name="lang">
                                <option disabled>Выберите язык</option>
                                <option value="ru" @if($Shares->lang == 'ru') selected @endif>Русский</option>
                                <option value="en" @if($Shares->lang == 'en') selected @endif>Английский</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Дата начала</label>

                            <div class='input-group date' id='datetimepickerstart'>
                                <input type='text' class="form-control" required name="start"
                                       value="{{$Shares->start or ''}}"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Дата окончания</label>

                            <div class='input-group date' id='datetimepickerend'>
                                <input type='text' class="form-control" required name="end"
                                       value="{{$Shares->end or ''}}"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                            </div>
                        </div>


                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-primary">Отправить</button>


                    </div>
                </div>
        </form>
    </div>

@endsection
