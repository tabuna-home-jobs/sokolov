@extends('app')

@section('content')

    <section class="content-header">
        <h1>
            {{$group->name}}
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class='row'>
            <div class='col-md-12'>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Что то пошло не так!</strong> Пожалуйста проверьте вводимые данные.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <div class='box'>
                    <div class='box-header'>
                        <h3 class='box-title'>Изменение прав доступа пользователя
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


                        <div class="container">

                            <form class="col-md-8 col-xs-12" method="post"
                                  action="{{URL::route('dashboard.groups.update')}}">

                                <div class="form-group">
                                    <label>Название</label>
                                    <input class="form-control" required name="namenew" value="{{$group->name}}">
                                </div>

                                <div class="form-group">


                                    @foreach (Route::getRoutes() as $route)
                                        @if(!is_null($route->getName()))
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"
                                                    @if(isset($group->permissions[$route->getName()]))
                                                           checked
                                                           @endif
                                                           name="permissions[{{$route->getName()}}]" value="1">
                                                    {{$route->getName()}}
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach


                                </div>


                                <div class="form-group">
                                    <input type="hidden" name="id" value="{{$group->id}}">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="submit" value="Отправить" class="btn btn-default">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->

    </section><!-- /.content -->

@endsection



