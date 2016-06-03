@extends('app')

@section('content')


    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">Новая страница</h1>
    </div>
    <div class="wrapper-md">
        <form class="row" role="form" action="{{URL::route('dashboard.work.index')}}" method="post"
              enctype="multipart/form-data">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading font-bold">Содержание</div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label>Имя</label>
                            <input class="form-control" type="text" maxlength="255" required name="name">
                        </div>
                        <div class="form-group">
                            <label>Автор</label>
                            <input class="form-control" type="text" maxlength="255" required name="author">
                        </div>



                        <div class="form-group">
                            <label>Принадлежность</label>
                            <select class="form-control w-md" ui-jq="chosen" required name="category_id">
                                <option disabled>Категорию</option>
                                @foreach($category as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
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


                        <div class="form-group">
                            <label for="upload" class="col-sm-2 control-label">Документ</label>
                            <div class="col-sm-10">
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput"><i
                                                class="glyphicon glyphicon-file fileinput-exists"></i> <span
                                                class="fileinput-filename"></span></div>
                                        <span class="input-group-addon btn btn-default btn-file"><span
                                                    class="fileinput-new"><i class="fa fa-upload" aria-hidden="true"></i></span><span
                                                    class="fileinput-exists"><i class="fa fa-folder-open-o" aria-hidden="true"></i></span><input type="file" name="download"></span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                       data-dismiss="fileinput"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>




                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>До</label>
                                    <div class="form-group text-center">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div data-trigger="fileinput" class="fileinput-preview thumbnail"
                                                 style="line-height: 150px;"><img src="{{$work->before or ''}}">
                                            </div>

                                            <div>
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">Выбрать изображение</span><span
                                                            class="fileinput-exists">Изменить</span><input type="file"
                                                                                                           name="before"
                                                                                                           value="{{$work->before or ''}}"></span>
                                                <a href="#" class="btn btn-default fileinput-exists"
                                                   data-dismiss="fileinput">Удалить</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>


                            <div class="col-md-6">


                                <div class="form-group">
                                    <label>После</label>
                                    <div class="form-group text-center">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div data-trigger="fileinput" class="fileinput-preview thumbnail"
                                                 style="line-height: 150px;"><img src="{{$work->after or ''}}">
                                            </div>

                                            <div>
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">Выбрать изображение</span><span
                                                            class="fileinput-exists">Изменить</span><input type="file"
                                                                                                           name="after"
                                                                                                           value="{{$work->after or ''}}"></span>
                                                <a href="#" class="btn btn-default fileinput-exists"
                                                   data-dismiss="fileinput">Удалить</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-primary">Отправить</button>


                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
