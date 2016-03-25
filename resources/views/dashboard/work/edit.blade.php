@extends('app')

@section('content')


    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">Новая страница</h1>
    </div>
    <div class="wrapper-md">
        <form class="row" role="form" action="{{URL::route('dashboard.work.update',$work->id)}}" method="post"
              enctype="multipart/form-data">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading font-bold">Содержание</div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label>Имя</label>
                            <input class="form-control" type="text" maxlength="255" required name="name" value="{{$work->name or ''}}">
                        </div>
                        <div class="form-group">
                            <label>Автор</label>
                            <input class="form-control" type="text" maxlength="255" required name="author" value="{{$work->author or ''}}">
                        </div>

                        <div class="form-group">
                            <label>Принадлежность</label>
                            <select class="form-control w-md" ui-jq="chosen" required name="category_id">
                                <option disabled>Категорию</option>
                                @foreach($category as $value)
                                    <option  @if($work->category_id == $value->id) selected @endif  value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Локализация</label>
                            <select class="form-control w-md" ui-jq="chosen" required name="lang">
                                <option disabled>Выберите язык</option>
                                <option value="ru" @if($work->lang == 'ru') selected @endif>Русский</option>
                                <option value="en" @if($work->lang == 'en') selected @endif>Английский</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label>До</label>
                                <textarea class="textarea textareaedit form-control" name="before" rows="32">
                                       {!! $work->before or '' !!}
                                </textarea>
                            </div>


                            <div class="col-md-6">
                                <label>После</label>
                                <textarea class="textarea textareaedit form-control" name="after" rows="32">
                                       {!! $work->after or '' !!}
                                </textarea>
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
