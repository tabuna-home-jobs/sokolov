@extends('app')

@section('content')


    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">Новый Элемент</h1>
    </div>
    <div class="wrapper-md">
        <form class="row" role="form" action="{{URL::route('dashboard.element.store')}}" method="post" class="row"
              enctype="multipart/form-data">
            <div class="col-sm-8">
                <div class="panel panel-default">
                    <div class="panel-heading font-bold">Содержание</div>
                    <div class="panel-body">
                                    <textarea class="textarea textareaedit" name="desc" rows="40">
                                    </textarea>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading font-bold">Общая информация</div>
                    <div class="panel-body">


                        <div class="form-group">
                            <label>Имя</label>
                            <input class="form-control" type="text" maxlength="255" required name="title">
                        </div>

                        <div class="form-group">
                            <label>Ссылка</label>
                            <input class="form-control" type="text" maxlength="255" required name="link">
                        </div>

                        <div class="form-group">
                            <label>Изображение</label>

                            <div class="form-group text-center">

                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div data-trigger="fileinput" class="fileinput-preview thumbnail"
                                         style="line-height: 150px;"><img src="{{$Element->img or ''}}">
                                    </div>

                                    <div>
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">Выбрать изображение</span><span
                                                            class="fileinput-exists">Изменить</span><input type="file"
                                                                                                           name="img"
                                                                                                           value=""></span>
                                        <a href="#" class="btn btn-default fileinput-exists"
                                           data-dismiss="fileinput">Удалить</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Категория</label>
                            <select class="form-control w-md" ui-jq="chosen" required name="block_id">
                                <option disabled>Выберите категорию</option>

                                @foreach($Blocks as $block)
                                    <option value="{{$block->id}}">{{$block->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Локализация</label>
                            <select class="form-control w-md" ui-jq="chosen" required name="lang">
                                <option disabled>Выберите язык</option>
                                <option @if($block->lang == 'ru') selected @endif  value="ru">Русский</option>
                                <option @if($block->lang == 'en') selected @endif value="en">Английский</option>
                            </select>
                        </div>


                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-primary">Отправить</button>


                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection