@extends('app')

@section('content')


    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">Изменение записи</h1>
    </div>
    <div class="wrapper-md">
        <form class="row" role="form" action="{{URL::route('dashboard.blog.update',$blog->slug)}}" method="post"
              enctype="multipart/form-data">
            <div class="col-sm-8">
                <div class="panel panel-default">
                    <div class="panel-heading font-bold">Содержание</div>
                    <div class="panel-body">

                                    <textarea class="textarea textareaedit form-control" name="content" rows="30">
                                        {!! $blog->content or '' !!}
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
                                   value="{{$blog->title or ''}}">
                        </div>
                        <div class="form-group">
                            <label>Имя</label>
                            <input class="form-control" type="text" maxlength="255" required name="name"
                                   value="{{$blog->name or ''}}">
                        </div>

                        <div class="form-group">
                            <label>Автор</label>
                            <input class="form-control" type="text" maxlength="255" required name="author" value="{{$blog->author or ''}}">
                        </div>



                        <div class="form-group">
                            <label>Миниатюра</label>

                            <div class="form-group text-center">

                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div data-trigger="fileinput" class="fileinput-preview thumbnail"
                                         style="line-height: 150px;"><img src="{{$blog->avatar or ''}}">
                                    </div>

                                    <div>
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">Выбрать изображение</span><span
                                                            class="fileinput-exists">Изменить</span><input type="file"
                                                                                                           name="avatar"
                                                                                                           value="{{$blog->avatar or ''}}"></span>
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
                                   required name="tag" value="{{$blog->tag or ''}}">
                        </div>

                        <div class="form-group">
                            <label>Описание</label>

                            <textarea class="form-control" rows="7" maxlength="255" required
                                      name="descript">{{$blog->descript or ''}}</textarea>
                        </div>


                        <div class="form-group">
                            <label>Категория</label>
                            <select class="form-control w-md" ui-jq="chosen" required name="lang">
                                <option disabled>Выберите язык</option>
                                <option value="ru" @if($blog->lang == 'ru') selected @endif>Русский</option>
                                <option value="en" @if($blog->lang == 'en') selected @endif>Английский</option>
                            </select>
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
