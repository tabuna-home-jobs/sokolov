@extends('app')

@section('content')


    <section class="app-content-full">


        <!-- hbox layout -->
        <div class="hbox hbox-auto-xs bg-light">
            <!-- column -->
            <div class="col w lter b-r">
                <div class="vbox">
                    <div class="wrapper b-b">
                        <div class="font-thin h4">Заявки</div>
                    </div>
                    <div class="nav-tabs-alt">
                        <ul class="nav nav-tabs nav-justified">
                            <li>
                                <a href="?status=all">
                                    Все
                                </a>
                            </li>
                            <li>
                                <a href="?status=pay">
                                    Опл
                                </a>
                            </li>
                            <li>
                                <a href="?status=done">
                                    Зав
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="row-row">
                        <div class="cell scrollable hover">
                            <div class="cell-inner">


                                <ul class="list-group">
                                    <ul class="list-group">
                                        @foreach($Orders as $order)
                                            <a href="{{URL::route('dashboard.order.show', $order->id)}}"
                                               class="list-group-item">{{$order->name}}</a>
                                        @endforeach
                                    </ul>
                                </ul>

                                {!! $Orders->appends(\Input::except('page'))->render() !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /column -->

            <!-- column -->
            <div class="col">
                <div class="vbox">
                    <div class="row-row">
                        <div class="cell">
                            <div class="cell-inner">
                                <div class="wrapper-md">


                                    <div class="bg-light lter b-b wrapper-md">
                                        <h1 class="m-n font-thin h3"> {{$SelectOrder->name}}</h1>
                                    </div>
                                    <div class="wrapper-md panel">


                                        <form action="{{URL::route('dashboard.order.update', $SelectOrder->id) }}"
                                              method="post">

                                            <div class="well m-t bg-light lt">
                                                <div class="row">
                                                    <div class="col-xs-5">
                                                        <strong>Заказ номер: #{{$SelectOrder->id}} / {{$SelectOrder->act}}</strong>
                                                        <h4>{{$SelectUser->first_name}} {{$SelectUser->last_name}}</h4>

                                                        <p>
                                                            <span class="glyphicon glyphicon-earphone"></span>  Телефон: {{$SelectUser->phone}}
                                                        </p>

                                                        <p>
                                                            <span class="glyphicon glyphicon-envelope"></span>  Email: {{$SelectUser->email}}
                                                        </p>

                                                    </div>
                                                    <div class="col-xs-7">
                                                        <strong>Услуги:</strong>


                                                        @foreach($SelectGoods as $Goods)

                                                            <li>
                                                                {{$Goods->category()->first()->name}}

                                                                @if(!empty($Goods->speed))
                                                                    <small> {{ " - ". trans('speed.'. $Goods->speed)}} </small>
                                                                @endif
                                                            </li>

                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="line line-dashed b-b line-lg"></div>



                                            <p class="text-left">
                                                <b>Название работы:</b> <span>{{$SelectOrder->name}}</span>
                                            </p>

                                            <div class="line line-dashed b-b line-lg"></div>
                                            <p class="text-left">
                                                <b>Научное издание:</b> <span>{{$SelectOrder->izdanie}}</span>
                                            </p>


                                            <div class="line line-dashed b-b line-lg"></div>

                                            <p class="text-left">
                                                <b>Язык перевода:</b> <span>{{$SelectLanguage->name}}</span>
                                            </p>


                                            <div class="line line-dashed b-b line-lg"></div>
                                            <p class="text-justify">
                                                {{$SelectOrder->text}}
                                            </p>


                                            <div class="line line-dashed b-b line-lg"></div>

                                            <div class="form-group col-xs-6">
                                                <label>Цена</label>

                                                <div class="input-group">
                                                    <input class="form-control" type="number"
                                                           value="{{$SelectOrder->price}}" maxlength="255" min="0" step="0.01"
                                                           required
                                                           name="price"
                                                           value="">

                                                    <div class="input-group-addon">
                                                        <i class="fa fa-usd"></i>
                                                    </div>
                                                </div>
                                                <!-- /.input group -->
                                            </div>

                                            <div class="form-group col-xs-6">
                                                <label>Дата получения заявки</label>


                                                <p>{{$SelectOrder->created_at}}</p>


                                            </div>


                                            <div class="line line-dashed b-b line-lg"></div>


                                            <div class="form-group col-xs-6">
                                                <label>Статус</label>
                                                <select class="form-control w-md" ui-jq="chosen" required name="status">
                                                    <option @if($SelectOrder->status == 'На оценке') selected
                                                            @endif value="На оценке">
                                                        На оценке
                                                    </option>
                                                    <option @if($SelectOrder->status == 'Отменён') selected
                                                            @endif value="Отменён">
                                                        Отменён
                                                    </option>
                                                    <option @if($SelectOrder->status == 'Не оплачен') selected
                                                            @endif value="Не оплачен">
                                                        Не оплачен
                                                    </option>
                                                    <option @if($SelectOrder->status == 'В работе') selected
                                                            @endif value="В работе">
                                                        В работе
                                                    </option>
                                                    <option @if($SelectOrder->status == 'Готова') selected
                                                            @endif value="Готова">
                                                        Готова
                                                    </option>

                                                </select>
                                            </div>


                                            <div class="form-group col-xs-6">
                                                <label>Дата окончания</label>

                                                <div class='input-group date' id='datetimepickerorder'>
                                                    <input type='text' class="form-control" required name="workfinish"
                                                           value="{{date("Y-m-d H:i:s")}}"/>
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
                                                </div>
                                            </div>


                                            <div class="line line-dashed b-b line-lg"></div>


                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <p class="text-center">
                                                <button type="submit" class="btn btn-success">Сохранить</button>
                                            </p>
                                        </form>


                                        <div class="line line-dashed b-b line-lg"></div>


                                        <div>
                                            <ul id="TabUpload" class="nav nav-tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#taskTab" role="tab"
                                                                                          id="taskTab-tab"
                                                                                          data-toggle="tab"
                                                                                          aria-controls="taskTab"
                                                                                          aria-expanded="true">Задачи</a>
                                                </li>
                                                <li role="presentation" class=""><a href="#files" id="files-tab"
                                                                                    role="tab" data-toggle="tab"
                                                                                    aria-controls="files"
                                                                                    aria-expanded="false">Файлы
                                                        Пользователя</a>
                                                </li>
                                                <li role="presentation" class=""><a href="#goodfiles" id="goodfiles-tab"
                                                                                    role="tab" data-toggle="tab"
                                                                                    aria-controls="goodfiles"
                                                                                    aria-expanded="false">Готовые
                                                        файлы</a>
                                                </li>

                                            </ul>


                                            <div id="TabUploadContent" class="tab-content">


                                                <div role="tabpanel" class="tab-pane fade active in" id="taskTab"
                                                     aria-labelledby="taskTab-tab">

                                                    <p class="m-t-md text-center">
                                                        <button class="btn m-b-xs btn-sm btn-info"
                                                                type="button" data-toggle="collapse"
                                                                data-target="#collapseExample" aria-expanded="false"
                                                                aria-controls="collapseExample">
                                                            Создать новую задачу
                                                        </button>
                                                    </p>

                                                    <div class="collapse" id="collapseExample">
                                                        <div class="container-fluid">

                                                            <form action="{{URL::route('dashboard.task.store') }}"
                                                                  method="post">

                                                                <div class="form-group col-xs-6">
                                                                    <label>Название</label>
                                                                    <input type="text" class="form-control"
                                                                           maxlength="255" required name="name"
                                                                           placeholder="Название задачи">
                                                                </div>

                                                                <div class="form-group col-xs-6">
                                                                    <label>Цена</label>

                                                                    <div class="input-group">
                                                                        <input class="form-control" type="number"
                                                                               maxlength="255" required
                                                                               name="price"
                                                                               value="">

                                                                        <div class="input-group-addon">
                                                                            <i class="fa fa-usd"></i>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.input group -->
                                                                </div>


                                                                <div class="form-group col-xs-6">
                                                                    <label>Дата окончания</label>

                                                                    <div class='input-group date'
                                                                         id='datetimepickertast'>
                                                                        <input type='text' class="form-control" required
                                                                               name="workfinish"
                                                                               value=""
                                                                               placeholder="Выберите дату"/>
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
                                                                    </div>
                                                                </div>


                                                                <div class="form-group col-xs-6">
                                                                    <label>Исполнитель</label>
                                                                    <select class="form-control w-md" ui-jq="chosen"
                                                                            required name="user_id">


                                                                        <option value="0" selected>Без исполнителя
                                                                            (Лента задач)
                                                                        </option>

                                                                        @foreach($AllUser as $user)

                                                                            <option value="{{$user->id}}">
                                                                                {{$user->first_name}} {{$user->last_name}}
                                                                            </option>

                                                                        @endforeach

                                                                    </select>
                                                                </div>


                                                                <div class="form-group col-xs-6">
                                                                    <label>Услуга</label>
                                                                    <select class="form-control w-md" ui-jq="chosen"
                                                                            required name="goods_id">


                                                                        @foreach($SelectGoods as $Goods)

                                                                            <option value="{{$Goods->category()->first()->id}}">
                                                                                {{$Goods->category()->first()->name}}
                                                                            </option>

                                                                        @endforeach


                                                                    </select>
                                                                </div>


                                                                <div class="form-group col-xs-6">
                                                                    <label>Объем работы</label>
                                                                    <input type="number" class="form-control" min="0"
                                                                           required name="countWork"
                                                                           placeholder="Объем работы">
                                                                </div>


                                                                <div class="form-group col-xs-12"
                                                                     id="select-files-upload-wrapper">
                                                                    <h4 class="text-center">Прикрепить файлы</h4>
                                                                    <span class="pull-right">
                                                                        <a id="select-all-upload">Выбрать все</a>
                                                                        <a id="unselect-all-upload" class="hidden">Отменить
                                                                            все</a>
                                                                    </span>

                                                                    <hr>
                                                                    <label>Загруженные файлы:</label>
                                                                    @foreach($SelectGoodFile as $file)
                                                                        <div class="checkbox">
                                                                            <label class="i-checks">
                                                                                <input type="checkbox" name="files[]"
                                                                                       value="{{$file->id}}">
                                                                                <i class="fa fa-file-o"></i> {{$file->original}}
                                                                            </label>
                                                                        </div>
                                                                    @endforeach
                                                                    <hr>
                                                                    <label>Пользовательские файлы:</label>
                                                                    @foreach($SelectRequestFile as $file)

                                                                        <div class="checkbox">
                                                                            <label class="i-checks">
                                                                                <input type="checkbox" name="files[]"
                                                                                       value="{{$file->id}}">
                                                                                <i class="fa fa-file-o"></i> {{$file->original}}
                                                                            </label>
                                                                        </div>

                                                                    @endforeach
                                                                </div>


                                                                <input type="hidden" name="order_id"
                                                                       value="{{$SelectOrder->id}}">
                                                                <input type="hidden" name="_token"
                                                                       value="{{ csrf_token() }}">

                                                                <p class="text-center">
                                                                    <button type="submit" class="btn btn-success">
                                                                    Создать
                                                                </button>
                                                                </p>

                                                            </form>

                                                        </div>


                                                        <div class="line line-dashed b-b line-lg"></div>


                                                    </div>


                                                    <div class="table-responsive">
                                                        <div id="DataTables_Table_0_wrapper"
                                                             class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <table class="table table-striped m-b-none dataTable no-footer light-font-table"
                                                                           id="DataTables_Table_0" role="grid"
                                                                           aria-describedby="DataTables_Table_0_info">
                                                                        <thead>
                                                                        <tr role="row">
                                                                            <th>Название</th>
                                                                            <th>Задача</th>
                                                                            <th>Исполнитель</th>
                                                                            <th>Статус</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @foreach($TaskOrder as $task)
                                                                            <tr @if($task->workfinish < date("Y-m-d H:i:s") ) class="danger" @endif>
                                                                                <td>
                                                                                    <a href="{{route('dashboard.task.show',$task->id)}}">{{$task->name}}</a>
                                                                                </td>
                                                                                <td>{{$task->getGoods()->first()->name}}</td>
                                                                                <td>
                                                                                    @if($task->user_id)
                                                                                        {{$task->getUser()->first()->first_name}}  {{$task->getUser()->first()->last_name}}
                                                                                    @else
                                                                                        Исполнитель ещё не определён
                                                                                    @endif
                                                                                </td>
                                                                                <td>
                                                                                    <small>{{$task->status}}</small>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>


                                                <div role="tabpanel" class="tab-pane" id="files"
                                                     aria-labelledby="files-tab">


                                                    <ul class="list-group">
                                                        <ul class="list-group">
                                                            @foreach($SelectRequestFile as $file)

                                                                <li class="list-group-item v-center">

                                                                    <div class="col-md-1">
                                                                    <a href="#" class="btn btn-link delete" data-url="{{URL::route('dashboard.filemanager.destroy',$file->id)}}">
                                                                        <span class="fa fa-trash-o"></span>
                                                                    </a>
                                                                        </div>

                                                                    <div class="col-md-11">
                                                                <a href="{{URL::route('dashboard.filemanager.show', $file->id)}}"
                                                                   class=""><i
                                                                            class="fa fa-file-o"></i> {{$file->original}}
                                                                    <small class="pull-right">{{$file->created_at}}</small>
                                                                </a>
                                                                        </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </ul>


                                                </div>


                                                <div role="tabpanel" class="tab-pane" id="goodfiles"
                                                     aria-labelledby="goodfiles-tab">


                                                    <p class="m-t-md">
   <span class="btn btn-default btn-block fileinput-button">
    <span class="fileinput-new fa fa-cloud-upload text btn-block"> Выбрать файл</span>

    <input id="fileupload" type="file" name="files[]" multiple>
    </span>
                                                    </p>


                                                    <div id="progress" class="progress">
                                                        <div class="progress-bar progress-bar-info"></div>
                                                    </div>

                                                    <div id="files" class="files"></div>

                                                    <ul class="list-group">
                                                        <ul class="list-group">
                                                            @foreach($SelectGoodFile as $file)



                                                                <li class="list-group-item v-center">

                                                                    <div class="col-md-1">
                                                                        <a href="#" class="btn btn-link delete" data-url="{{URL::route('dashboard.filemanager.destroy',$file->id)}}">
                                                                            <span class="fa fa-trash-o"></span>
                                                                        </a>
                                                                    </div>

                                                                    <div class="col-md-11">
                                                                        <a href="{{URL::route('dashboard.filemanager.show', $file->id)}}"
                                                                           class=""><i
                                                                                    class="fa fa-file-o"></i> {{$file->original}}
                                                                            <small class="pull-right">{{$file->created_at}}</small>
                                                                        </a>
                                                                    </div>
                                                                </li>

                                                            @endforeach
                                                        </ul>
                                                    </ul>


                                                </div>


                                            </div>
                                        </div>


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
                        <small class="text-muted">к заказу <b>Клиента</b></small>
                    </div>
                    <div class="row-row">
                        <div class="cell">
                            <div class="cell-inner">
                                <div class="wrapper-md text-justify">


                                    <!-- streamline -->

                                    <div class="streamline b-l m-b">

                                        @foreach($SelectComments as $comment)
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
                                <input type="hidden" name="type" value="order">
                                <input type="hidden" name="beglouto" value="{{$SelectOrder->id}}">
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


    <script src="/dash/js/jquery.ui.widget.js"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="/dash/js/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <!-- The basic File Upload plugin -->
    <script src="/dash/js/jquery.fileupload.js"></script>
    <script>
        /*jslint unparam: true */
        /*global window, $ */
        $(function () {
            'use strict';
            // Change this to the location of your server-side upload handler:


            var csrf = $('meta[name="token"]').attr('content');
            var url = window.location.hostname === 'blueimp.github.io' ?
                    '//jquery-file-upload.appspot.com/' : '/dashboard/filemanager?beglouto={{$SelectOrder->id}}&type=order';
            $('#fileupload').fileupload({
                url: url,
                dataType: 'json',
                beforeSend: function (request) {
                    request.setRequestHeader('X-CSRF-Token', csrf);
                },
                done: function (e, data) {
                    $.each(data.result.files, function (index, file) {
                        $('<p/>').text(file.name).appendTo('#files');
                    });
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress .progress-bar').css(
                            'width',
                            progress + '%'
                    );
                    $('#progress .progress-bar').html('Загрузка');

                    if (progress == 100) {
                        location.reload();
                    }
                }

            }).prop('disabled', !$.support.fileInput)
                    .parent().addClass($.support.fileInput ? undefined : 'disabled');
        });
    </script>

    <script>
        $('#select-all-upload').click(function () {
            $(this).addClass('hidden');
            $('#unselect-all-upload').removeClass('hidden');
            $('#select-files-upload-wrapper').each(function () {
                $('input', this).prop('checked', true);
            });
        });

        $('#unselect-all-upload').click(function () {
            $(this).addClass('hidden');
            $('#select-all-upload').removeClass('hidden');
            $('#select-files-upload-wrapper').each(function () {
                $('input', this).prop('checked', false);
            });
        });

    </script>



@endsection






