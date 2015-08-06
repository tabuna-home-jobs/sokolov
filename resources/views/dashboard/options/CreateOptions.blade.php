@extends('app')

@section('content')


    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">Настройки</h1>
    </div>
    <div class="wrapper-md">
        <form class="row" role="form" action="{{URL::route('dashboard.options.index')}}" method="post" enctype="multipart/form-data">

            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading font-bold">Информация</div>
                    <div class="panel-body">


                        <div class="form-group">
                            <label>Ключ</label>
                            <input class="form-control" type="text" maxlength="255"
                                   required name="module">
                        </div>

                        <div class="form-group">
                            <label>Значение</label>
                            <input class="form-control" type="text" maxlength="255"
                                   required name="value">

                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-primary">Отправить</button>


                    </div>
                </div>
                </div>
        </form>
    </div>

@endsection
