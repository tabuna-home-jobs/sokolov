@extends('app')

@section('content')



    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">{{ $Goods->name or 'Новая Услуга' }}</h1>
    </div>
    <div class="wrapper-md">
        <form class="row" role="form" action="{{URL::route('dashboard.goods.update', $Goods->slug)}}" method="post"
              class="row" enctype="multipart/form-data">
            <div class="col-sm-8">
                <div class="panel panel-default">
                    <div class="panel-heading font-bold">Содержание</div>
                    <div class="panel-body">

                                    <textarea class="textarea textareaedit" name="text" rows="40">
                                        {!! $Goods->text !!}
                                    </textarea>

                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading font-bold">Общая информация</div>
                    <div class="panel-body">


                        @if(isset($Goods->id))
                            <input type="hidden" name="id" value="{{$Goods->id}}">
                        @endif


                        <div class="form-group">
                            <label>Заголовок</label>
                            <input class="form-control" type="text" maxlength="255" required name="title"
                                   value="{{$Goods->title or ''}}">
                        </div>
                        <div class="form-group">
                            <label>Имя</label>
                            <input class="form-control" type="text" maxlength="255" required name="name"
                                   value="{{$Goods->name or ''}}">
                        </div>
                        <div class="form-group">
                            <label>Теги</label>
                            <input data-role="tagsinput" class="form-control" type="text" maxlength="255"
                                   required name="tag" value="{{$Goods->tag or ''}}">
                        </div>
                        <div class="form-group">
                            <label>Описание</label>
                            <input class="form-control" type="text" maxlength="255" required name="descript"
                                   value="{{$Goods->descript or ''}}">
                        </div>

                        <div class="form-group">
                            <label>Миниатюра</label>

                            <div class="form-group text-center">

                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div data-trigger="fileinput" class="fileinput-preview thumbnail"
                                         style="line-height: 150px;"><img src="{{$Goods->avatar or ''}}">
                                    </div>

                                    <div>
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">Выбрать изображение</span><span
                                                            class="fileinput-exists">Изменить</span><input type="file"
                                                                                                           name="avatar"
                                                                                                           value="{{$Goods->avatar or ''}}"></span>
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
                                             style="line-height: 150px;"><img src="{{$Goods->icon or ''}}">
                                        </div>

                                        <div>
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">Выбрать изображение</span><span
                                                            class="fileinput-exists">Изменить</span><input type="file"
                                                                                                           name="icon"
                                                                                                           value="{{$Goods->icon or ''}}"></span>
                                            <a href="#" class="btn btn-default fileinput-exists"
                                               data-dismiss="fileinput">Удалить</a>
                                    </div>
                                </div>
                            </div>
                            </div>


                            <div class="form-group">
                            <label>Категория</label>
                            <select class="form-control w-md" ui-jq="chosen" required name="category">
                                <option disabled>Выберите категорию</option>

                                @foreach($Category as $cat)


                                    @if(isset($Goods->category_id))
                                        @if($Goods->category_id == $cat->id)
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
                                        @if($block->id == $Goods->block_id)
                                            <option selected value="{{ $block->id}}">{{ $block->name}}</option>
                                        @else
                                            <option value="{{ $block->id}}">{{ $block->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                            <label>Цена</label>

                            <div class="input-group">
                                <input class="form-control" type="number" maxlength="255" required name="price"
                                       value="{{$Goods->price or ''}}">

                                <div class="input-group-addon">
                                    <i class="fa fa-rub"></i>
                                </div>
                            </div>
                            <!-- /.input group -->
                        </div>







                            <div class="form-group">
                                <label>Указывать в канкуляторе</label>

                                <div class="radio">
                                    <label class="i-checks">
                                        <input type="radio" name="calculator" value="1" @if($Goods->calculator) checked @endif>
                                        <i></i>
                                        Да
                                    </label>
                                </div>

                                <div class="radio">
                                    <label class="i-checks">
                                        <input type="radio" name="calculator" value="0" @if(!$Goods->calculator) checked @endif>
                                        <i></i>
                                        Нет
                                    </label>
                                </div>

                            </div>










                            <div id="GoodsAttr" class="text-center">
                            <label>Атрибуты</label>

                            @if(isset($Goods->attribute))
                                @forelse(unserialize($Goods->attribute) as $key => $attr)

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

                            <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-primary">Отправить</button>


                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection














