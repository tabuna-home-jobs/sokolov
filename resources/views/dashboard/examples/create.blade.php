@extends('app')

@section('content')


    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">{{ $Examples->name or 'Новый пример' }}</h1>
    </div>
    <div class="wrapper-md">
        <form class="row" role="form" action="{{URL::route('dashboard.examples.store')}}" method="post" class="row"
              enctype="multipart/form-data">
            <div class="col-sm-8">
                <div class="panel panel-default">
                    <div class="panel-heading font-bold">Содержание</div>
                    <div class="panel-body">

                                    <textarea class="textarea textareaedit" name="text" rows="40">
                                        {!! $Examples->text or '' !!}
                                    </textarea>

                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading font-bold">Общая информация</div>
                    <div class="panel-body">


                        @if(isset($Examples->id))
                            <input type="hidden" name="id" value="{{$Examples->id}}">
                        @endif


                            <div class="form-group">
                                <label>Заголовок</label>
                                <input class="form-control" type="text" maxlength="255" required name="title"
                                       value="{{$Examples->title or ''}}">
                            </div>
                            <div class="form-group">
                                <label>Имя</label>
                                <input class="form-control" type="text" maxlength="255" required name="name"
                                       value="{{$Examples->name or ''}}">
                            </div>
                            <div class="form-group">
                                <label>Теги</label>
                                <input data-role="tagsinput" class="form-control" type="text" maxlength="255"
                                       required name="tag" value="{{$Examples->tag or ''}}">
                            </div>
                            <div class="form-group">
                                <label>Описание</label>
                                <input class="form-control" type="text" maxlength="255" required name="descript"
                                       value="{{$Examples->descript or ''}}">
                            </div>

                            <div class="form-group">
                                <label>Миниатюра</label>

                                <div class="form-group text-center">

                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div data-trigger="fileinput" class="fileinput-preview thumbnail"
                                             style="line-height: 150px;"><img src="{{$Examples->avatar or ''}}">
                                        </div>

                                        <div>
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">Выбрать изображение</span><span
                                                            class="fileinput-exists">Изменить</span><input type="file"
                                                                                                           name="avatar"
                                                                                                           value="{{$Examples->avatar or ''}}"></span>
                                            <a href="#" class="btn btn-default fileinput-exists"
                                               data-dismiss="fileinput">Удалить</a>
                                    </div>
                                </div>
                            </div>
                            </div>


                            <div class="form-group">
                                <label>Иконка</label>

                                <div class="form-group text-center">

                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div data-trigger="fileinput" class="fileinput-preview thumbnail"
                                             style="line-height: 150px;"><img src="{{$Examples->icon or ''}}">
                                        </div>

                                        <div>
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">Выбрать изображение</span><span
                                                            class="fileinput-exists">Изменить</span><input type="file"
                                                                                                           name="icon"
                                                                                                           value="{{$Examples->icon or ''}}"></span>
                                            <a href="#" class="btn btn-default fileinput-exists"
                                               data-dismiss="fileinput">Удалить</a>
                                    </div>
                                </div>
                            </div>
                            </div>


                            <div class="form-group">
                                <label>Услуга</label>
                                <select class="form-control w-md" ui-jq="chosen" required name="category">
                                    <option disabled>Выберите Услугу</option>

                                    @foreach($Category as $cat)


                                        @if(isset($Examples->category_id))
                                            @if($Examples->category_id == $cat->id)
                                                <option value="{{ $cat->id}}" selected>{{ $cat->name}}</option>
                                        @else
                                            <option value="{{ $cat->id}}">{{ $cat->name}}</option>
                                        @endif
                                        @else
                                            <option value="{{ $cat->id}}">{{ $cat->name}}</option>
                                        @endif



                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label>Блок</label>
                                <select class="form-control w-md" ui-jq="chosen" required name="block_id">
                                    <option disabled>Выберите блок</option>
                                    <option value="0">Без блока</option>
                                    @foreach($Blocks as $block)
                                        <option value="{{$block->id}}">{{$block->name}}</option>
                                    @endforeach
                                </select>
                            </div>





                            <div class="form-group">
                                <label>Локализация</label>
                                <select class="form-control w-md" ui-jq="chosen" required name="lang">
                                    <option disabled>Выберите язык</option>
                                    <option value="ru">Русский</option>
                                    <option value="en">Английский</option>
                                </select>
                            </div>


                            <div id="GoodsAttr" class="text-center">
                                <label>Атрибуты</label>

                                @if(isset($Examples->attribute))
                                    @forelse(unserialize($Examples->attribute) as $key => $attr)

                                        @if($key % 2 == 0)
                                        <div class="entry input-group row">
                                            <div class="form-group col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon btn-remove glyphicon-minus"></span>
                                                    </div>
                                                    <input type="text" placeholder="Название" value="{{ $attr }}"
                                                           name="fieldsAttr[]" pattern="^[а-яА-ЯёЁa-zA-Z0-9\s]+$"
                                                           class="form-control">
                                                </div>
                                                <!-- /.input group -->

                                            </div>
                                            @else

                                                <div class="form-group col-md-6">
                                                    <input type="text" placeholder="Значение" value="{{ $attr }}"
                                                           name="fieldsAttr[]" pattern="^[а-яА-ЯёЁa-zA-Z0-9\s]+$"
                                                           class="form-control">
                                                </div>

                                        </div>
                                        @endif

                                    @empty

                                    <div class="entry input-group row">
                                        <div class="form-group col-md-6">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-plus btn-add"></span>
                                                </div>
                                                <input class="form-control" name="fieldsAttr[]" type="text"
                                                       placeholder="Название"/>
                                            </div>
                                            <!-- /.input group -->

                                        </div>

                                        <div class="form-group col-md-6">
                                            <input class="form-control" name="fieldsAttr[]" type="text"
                                                   placeholder="Значение"/>
                                        </div>
                                    </div>

                                    @endforelse
                                @else
                                    <div class="entry input-group row">
                                        <div class="form-group col-md-6">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-plus btn-add"></span>
                                                </div>
                                                <input class="form-control" name="fieldsAttr[]" type="text"
                                                       placeholder="Название"/>
                                            </div>
                                            <!-- /.input group -->

                                        </div>

                                        <div class="form-group col-md-6">
                                            <input class="form-control" name="fieldsAttr[]" type="text"
                                                   placeholder="Значение"/>
                                        </div>
                                    </div>

                                @endif
                        </div>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-primary">Отправить</button>


                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection














