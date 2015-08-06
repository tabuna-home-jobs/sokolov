@extends('app')

@section('content')

    <section class="content-header">
        <h1>
            {{ $user->first_name }}
            <small> {{ $user->last_name }}</small>
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
                                  action="{{URL::route('dashboard.user.update')}}">

                                <div data-example-id="togglable-tabs" role="tabpanel"
                                     class="bs-example bs-example-tabs">
                                    <ul role="tablist" class="nav nav-tabs" id="myTab">
                                        <li class="active" role="presentation"><a aria-expanded="true"
                                                                                  aria-controls="home" data-toggle="tab"
                                                                                  role="tab" id="home-tab" href="#home">Основное</a>
                                        </li>

                                        <li role="presentation"><a aria-controls="groups" data-toggle="tab"
                                                                   id="groups-tab" role="tab" href="#groups">Группы</a>
                                        </li>

                                        <li role="presentation"><a aria-controls="profile" data-toggle="tab"
                                                                   id="profile-tab" role="tab" href="#profile">Права</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div aria-labelledby="home-tab" id="home" class="tab-pane fade in active"
                                             role="tabpanel">


                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" required name="email"
                                                       value="{{$user->email}}">
                                            </div>

                                            <div class="form-group">
                                                <label>Имя</label>
                                                <input class="form-control" required name="first_name"
                                                       value="{{$user->first_name}}">
                                            </div>

                                            <div class="form-group">
                                                <label>Фамилия</label>
                                                <input class="form-control" required name="last_name"
                                                       value="{{$user->last_name}}">
                                            </div>


                                            <div class="form-group">
                                                <input type="hidden" name="id" value="{{$user->id}}">
                                                <input type="hidden" name="_method" value="PUT">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <input type="submit" value="Отправить" class="btn btn-default">
                                            </div>

                                        </div>

                                        <div aria-labelledby="groups-tab" id="groups" class="tab-pane fade"
                                             role="tabpanel">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    @foreach($groups as $value)
                                                        @foreach($thisgroup as $thisUserGroup)
                                                            <div class="checkbox">
                                                                <input type="checkbox" name="groups[]"
                                                                       value="{{$value->id}}"
                                                                @if($value->id == $thisUserGroup->id)
                                                                       checked
                                                                        @endif
                                                                        >
                                                                {{$value->name}}
                                                                </label>
                                                            </div>

                                                        @endforeach
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>


                                        <div aria-labelledby="profile-tab" id="profile" class="tab-pane fade"
                                             role="tabpanel">


                                            <div class="form-group">

                                                @foreach (Route::getRoutes() as $route)
                                                    @if(!is_null($route->getName()))
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox"
                                                                       name="permissions['{{$route->getName()}}']"
                                                                       value="1"
                                                                @if(isset($user->permissions[$route->getName()]))
                                                                       checked
                                                                       @endif
                                                                        >
                                                                {{$route->getName()}}
                                                            </label>
                                                        </div>
                                                    @endif
                                                @endforeach


                                            </div>


                                        </div>

                                    </div>
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