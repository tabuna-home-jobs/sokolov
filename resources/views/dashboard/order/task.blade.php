@extends('app')

@section('content')


    <section class="app-content-full">

        <!-- hbox layout -->
        <div class="hbox hbox-auto-xs bg-light">

            <!-- column -->
            <div class="col">
                <div class="vbox">
                    <div class="row-row">
                        <div class="cell">
                            <div class="cell-inner">
                                <div class="wrapper-md">

                                    <div class="bg-light lter b-b wrapper-md">
                                        <h1 class="m-n font-thin h3"> {{$task->name}}</h1>
                                    </div>
                                    <div class="wrapper-md panel">

                                        <form action="{{URL::route('dashboard.task.update', $task->id) }}"
                                              method="post">

                                            <div class="well m-t bg-light lt">
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <strong>Заказ задачи: #{{$task->id}}</strong>
                                                        <h4>Исполнитель:

                                                            @if(is_null($task->getUser))
                                                                Испольнитель не определён
                                                            @else
                                                                {{$task->getUser->first_name}} {{$task->getUser->last_name}}
                                                            @endif

                                                        </h4>

                                                        <p>Улуга: {{$task->getGoods->name}}</p>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="line line-dashed b-b line-lg"></div>

                                            <p class="text-justify">
                                                {{$task->getOrder->text}}
                                            </p>


                                            <div class="line line-dashed b-b line-lg"></div>

                                            <div class="form-group col-xs-6">
                                                <label>Цена</label>

                                                <div class="input-group">
                                                    <input class="form-control" type="number"
                                                           value="{{$task->getOrder->price}}" maxlength="255"
                                                           min="0"
                                                           required
                                                           name="price">

                                                    <div class="input-group-addon">
                                                        <i class="fa fa-usd"></i>
                                                    </div>
                                                </div>
                                                <!-- /.input group -->
                                            </div>

                                            <div class="form-group col-xs-6">
                                                <label>Дата получения заявки</label>

                                                <p>{{$task->created_at}}</p>
                                            </div>


                                            <div class="line line-dashed b-b line-lg"></div>


                                            <div class="form-group col-xs-6">
                                                <label>Статус</label>
                                                <select class="form-control w-md" ui-jq="chosen" required name="status">
                                                    <option @if($task->status == 'В работе') selected
                                                            @endif value="В работе">
                                                        В работе
                                                    </option>
                                                    <option @if($task->status == 'На проверке') selected
                                                            @endif value="На проверке">
                                                        На проверке
                                                    </option>

                                                    <option @if($task->status == 'На доработке') selected
                                                            @endif value="На доработке">
                                                        На доработке
                                                    </option>
                                                    <option @if($task->status == 'Завершена') selected
                                                            @endif value="Завершена">
                                                        Завершена
                                                    </option>

                                                </select>
                                            </div>


                                            <div class="form-group col-xs-6">
                                                <label>Дата окончания</label>

                                                <div class='input-group date' id='datetimepickerorder'>
                                                    <input type='text' class="form-control" required name="workfinish"
                                                           value="
                                                           @if($task->workfinish == "0000-00-00 00:00:00")
                                                           {{date("Y-m-d H:i:s")}}
                                                           @else
                                                           {{$task->workfinish}}
                                                           @endif
                                                                   "/>
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
                                                </div>
                                            </div>


                                            <div class="line line-dashed b-b line-lg"></div>


                                            <div>
                                                <ul id="TabUpload" class="nav nav-tabs" role="tablist">
                                                    <li role="presentation" class="active"><a href="#taskTab" role="tab"
                                                                                              id="taskTab-tab"
                                                                                              data-toggle="tab"
                                                                                              aria-controls="taskTab"
                                                                                              aria-expanded="true">Доступные
                                                            файлы</a>
                                                    </li>

                                                    <li role="presentation" class=""><a href="#goodfiles"
                                                                                        id="goodfiles-tab"
                                                                                        role="tab" data-toggle="tab"
                                                                                        aria-controls="goodfiles"
                                                                                        aria-expanded="false">Готовые
                                                            файлы</a>
                                                    </li>

                                                </ul>


                                                <div id="TabUploadContent" class="tab-content">


                                                    <div role="tabpanel" class="tab-pane fade active in" id="taskTab"
                                                         aria-labelledby="taskTab-tab">

                                                        <ul class="list-group">
                                                            <ul class="list-group">
                                                                @foreach($task->getFileMeta as $file)
                                                                    <a href="{{URL::route('dashboard.filemanager.show', $file->getFiles->id)}}"
                                                                       class="list-group-item"><i
                                                                                class="fa fa-file-o"></i> {{$file->getFiles->original}}
                                                                        <small class="pull-right">{{$file->getFiles->created_at}}</small>
                                                                    </a>
                                                                @endforeach
                                                            </ul>
                                                        </ul>


                                                    </div>


                                                    <div role="tabpanel" class="tab-pane" id="goodfiles"
                                                         aria-labelledby="goodfiles-tab">


                                                    </div>


                                                </div>
                                            </div>


                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <p class="text-center">
                                                <button type="submit" class="btn btn-success">Изменить</button>
                                            </p>
                                        </form>


                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /column -->

            <!-- column -->
            <div class="col w-md lter b-l">
                <div class="vbox">
                    <div class="wrapper b-b b-light">
                        <div class="font-thin h4">Комментарии</div>
                        <small class="text-muted">к заказу <b>Редактору</b></small>
                    </div>
                    <div class="row-row">
                        <div class="cell">
                            <div class="cell-inner">
                                <div class="wrapper-md text-justify">


                                    <!-- streamline -->

                                    <div class="streamline b-l m-b">

                                        @foreach($comments as $comment)
                                            <div class="sl-item">
                                                <div class="m-l">
                                                    <div class="text-muted">{{$comment->created_at}}</div>
                                                    <p>{{$comment->text}}</p>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                    <!-- / streamline -->


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="padder b-t b-light text-center">
                        <div class="m-xs">
                            <form action="{{URL::route('dashboard.comments.store')}}" method="post">
                                <div class="form-group">
                                    <label>Написать комментарий</label>
    <textarea class="form-control" rows="3" required name="text"
              style="resize: none;"></textarea>
                                </div>
                                <input type="hidden" name="type" value="task">
                                <input type="hidden" name="beglouto" value="{{$task->id}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-primary btn-block">Отправить</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /column -->
        </div>
        <!-- /hbox layout -->


    </section>



@endsection






