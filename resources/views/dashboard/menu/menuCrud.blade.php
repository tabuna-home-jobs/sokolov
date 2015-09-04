@extends('app')

@section('content')

    <section class="content-header">
        <h1>
            {{ $Menu->name or 'Новая страница' }}
            <small>Добавить новую страницу</small>
        </h1>


    </section>

    <!-- Main content -->
    <section class="content">

        <div class='row'>
            <div class='col-md-12'>

                <div class='box'>
                    <div class='box-header'>
                        <h3 class='box-title'>Чтобы добавить страницу заполните форму
                            <small>Это очень просто!</small>
                        </h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip"
                                    title="Свернуть"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-default btn-sm" data-widget='remove' data-toggle="tooltip"
                                    title="Закрыть"><i class="fa fa-times"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class='box-body pad'>


                        <form action="/dashboard/menu/add" method="post" class="row">

                            @if(isset($Menu->id))
                                <input type="hidden" name="id" value="{{$Menu->id}}">
                            @endif


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Заголовок</label>
                                    <input class="form-control" type="text" maxlength="255" required name="name"
                                           value="{{$Menu->name or ''}}">
                                </div>

                                <div class="form-group">
                                    <select class="form-control" name="type" required>
                                        <option value="menu-top" @if($Menu->type =='menu-top') selected @endif >Вернее
                                            меню
                                        </option>
                                        <option value="menu-left" @if($Menu->type =='menu-left') selected @endif >Левое
                                            меню
                                        </option>
                                        <option value="menu-rigt" @if($Menu->type =='menu-rigt') selected @endif >Правое
                                            меню
                                        </option>
                                        <option value="menu-bottom" @if($Menu->type =='menu-bottom') selected @endif >
                                            Нижнее меню
                                        </option>
                                    </select>
                                </div>


                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-default">Отправить</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->

    </section><!-- /.content -->

@endsection
