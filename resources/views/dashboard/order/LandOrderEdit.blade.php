@extends('app')

@section('content')


    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3"> {{ $OrderLang->name or 'Новая Категория' }}</h1>
    </div>
    <div class="wrapper-md">
        <form class="row" role="form" action="{{URL::route('dashboard.langorder.update',  $OrderLang->id)}}"
              method="post" class="row"
              enctype="multipart/form-data">
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading font-bold">Общая информация</div>
                    <div class="panel-body">


                        <div class="form-group">
                            <label>Имя</label>
                            <input class="form-control" type="text" maxlength="255" required name="name"
                                   value="{{$OrderLang->name or ''}}">
                        </div>

                        <div class="form-group">
                            <label>Альтернативное имя</label>
                            <input class="form-control" type="text" maxlength="255" required name="eng_name"
                                   value="{{$OrderLang->eng_name or ''}}">
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






