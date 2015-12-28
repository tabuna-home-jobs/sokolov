@extends('app')

@section('content')

    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">Статическая страница страница</h1>
    </div>
    <div class="wrapper-md">
        <form class="row" role="form"
              action="{{URL::route('dashboard.seostatic.update',base64_encode($seoUrl))}}" method="post">
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading font-bold">SEO информация</div>
                    <div class="panel-body">


                        <div class="form-group">
                            <label>Заголовок</label>
                            <input class="form-control" type="text" maxlength="255" required name="title"
                                   value="{{$meta->title or ''}}">
                        </div>
                        <div class="form-group">
                            <label>Теги</label>
                            <input ui-jq="tagsinput" ui-options="" class="form-control w-md" data-role="tagsinput"
                                   type="text" maxlength="255"
                                   required name="keywords" value="{{$meta->keywords or ''}}">
                        </div>

                        <div class="form-group">
                            <label>Описание</label>

                            <textarea class="form-control" rows="7" maxlength="255" required
                                      name="description">{{$meta->description or ''}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Робот</label>
                            <input class="form-control" type="text" maxlength="255" name="robots"
                                   value="{{$meta->robots or ''}}">
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
