@extends('app')

@section('content')


    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3"> {{ $Category->name or 'Новая Категория' }}</h1>
    </div>
    <div class="wrapper-md">
        <form class="row" role="form" action="{{URL::route('dashboard.category.update',  $Category->slug)}}"
              method="post" class="row"
              enctype="multipart/form-data">
            <div class="col-sm-8">
                <div class="panel panel-default">
                    <div class="panel-heading font-bold">Содержание</div>
                    <div class="panel-body">

                                    <textarea class="textarea textareaedit" name="text" rows="30">
                                        {!! $Category->text or '' !!}
                                    </textarea>

                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading font-bold">Общая информация</div>
                    <div class="panel-body">


                        @if(isset($Category->id))
                            <input type="hidden" name="id" value="{{$Category->id}}">
                        @endif


                        <div class="form-group">
                            <label>Заголовок</label>
                            <input class="form-control" type="text" maxlength="255" required name="title"
                                   value="{{$Category->title or ''}}">
                        </div>
                        <div class="form-group">
                            <label>Имя</label>
                            <input class="form-control" type="text" maxlength="255" required name="name"
                                   value="{{$Category->name or ''}}">
                        </div>
                        <div class="form-group">
                            <label>Теги</label>
                            <input class="form-control" data-role="tagsinput" type="text" maxlength="255"
                                   required name="tag" value="{{$Category->tag or ''}}">
                        </div>
                        <div class="form-group">
                            <label>Описание</label>
                            <input class="form-control" type="text" maxlength="255" required name="descript"
                                   value="{{$Category->descript or ''}}">
                        </div>


                        <div class="form-group">
                            <label>Категория</label>
                            <select class="form-control w-md" ui-jq="chosen" required name="lang">
                                <option disabled>Выберите язык</option>
                                <option value="ru" @if($Category->lang == 'ru') selected @endif>Русский</option>
                                <option value="en" @if($Category->lang == 'en') selected @endif>Английский</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Миниатюра</label>

                            <div class="form-group text-center">

                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div data-trigger="fileinput" class="fileinput-preview thumbnail"
                                         style="line-height: 150px;"><img src="{{$Category->avatar or ''}}">
                                    </div>

                                    <div>
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">Выбрать изображение</span><span
                                                            class="fileinput-exists">Изменить</span><input type="file"
                                                                                                           name="avatar"
                                                                                                           value="{{$Category->avatar or ''}}"></span>
                                        <a href="#" class="btn btn-default fileinput-exists"
                                           data-dismiss="fileinput">Удалить</a>
                                    </div>
                                </div>
                            </div>
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






