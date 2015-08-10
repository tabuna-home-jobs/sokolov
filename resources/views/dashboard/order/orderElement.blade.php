@extends('app')

@section('content')


    <section class="app-content-full">


        <!-- hbox layout -->
        <div class="hbox hbox-auto-xs bg-light">
            <!-- column -->
            <div class="col w lter b-r" ng-controller="CustomTabController">
                <div class="vbox">
                    <div class="wrapper b-b">
                        <div class="font-thin h4">Заявки</div>
                    </div>
                    <div class="nav-tabs-alt">
                        <ul class="nav nav-tabs nav-justified">
                            <li>
                                <a>Все</a>
                            </li>
                            <li>
                                <a>Опл</a>
                            </li>
                            <li>
                                <a>Зав</a>
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

                                {!! $Orders->render() !!}

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


                                        <div class="well m-t bg-light lt">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <strong>Заказ номер: #{{$SelectOrder->id}}</strong>
                                                    <h4>{{$SelectUser->first_name}} {{$SelectUser->last_name}}</h4>

                                                    <p>
                                                        <span class="glyphicon glyphicon-earphone"> Телефон: 031-432-678 </span>
                                                    </p>

                                                    <p>
                                                        <span class="glyphicon glyphicon-envelope"> Email:{{$SelectUser->email}}</span>
                                                    </p>

                                                </div>
                                                <div class="col-xs-6">
                                                    <strong>Услуги:</strong>


                                                    @foreach($SelectGoods as $Goods)

                                                        <li>
                                                            {{$Goods->getGood()->select('name')->get()->first()->name}}
                                                        </li>

                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>


                                        <div class="line line-dashed b-b line-lg pull-in"></div>

                                        <div class="form-group col-xs-6">
                                            <label>Цена</label>

                                            <div class="input-group">
                                                <input class="form-control" type="number"
                                                       value="{{$SelectOrder->price}}" maxlength="255" required
                                                       name="price"
                                                       value="">

                                                <div class="input-group-addon">
                                                    <i class="fa fa-rub"></i>
                                                </div>
                                            </div>
                                            <!-- /.input group -->
                                        </div>

                                        <div class="form-group col-xs-6">
                                            <label>Дата получения заявки</label>


                                            <p>{{$SelectOrder->created_at}}</p>


                                        </div>


                                        <div class="line line-dashed b-b line-lg pull-in"></div>


                                        <div class="form-group col-xs-6">
                                            <label>Статус</label>
                                            <select class="form-control w-md" ui-jq="chosen" required name="status">
                                                <option @if($SelectOrder->status == 'Обрабатываеться')@endif value="Обрабатываеться">
                                                    Обрабатываеться
                                                </option>
                                                <option @if($SelectOrder->status == 'Оплачен')@endif value="Оплачен">
                                                    Оплачен
                                                </option>
                                                <option @if($SelectOrder->status == 'Завершён')@endif value="Завершён">
                                                    Завершён
                                                </option>
                                            </select>
                                        </div>


                                        <div class="form-group col-xs-6">
                                            <label>Дата окончания</label>

                                            <div class='input-group date' id='datetimepickerorder'>
                                                <input type='text' class="form-control" required name="end"
                                                       value="{{$SelectOrder->workfinish}}"/>
                                    <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                            </div>
                                        </div>


                                        <div class="line line-dashed b-b line-lg pull-in"></div>


                                        <div>
                                            <ul id="TabUpload" class="nav nav-tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#files" id="files-tab"
                                                                                          role="tab" data-toggle="tab"
                                                                                          aria-controls="home"
                                                                                          aria-expanded="false">Файлы
                                                        Пользователя</a>
                                                </li>
                                                <li role="presentation" class=""><a href="#goodfiles" id="goodfiles-tab"
                                                                                    role="tab" data-toggle="tab"
                                                                                    aria-controls="home"
                                                                                    aria-expanded="false">Готовые
                                                        файлы</a>
                                                </li>
                                                <li role="presentation" class=""><a href="#uploadFileTab" role="tab"
                                                                                    id="profile-tab" data-toggle="tab"
                                                                                    aria-controls="profile"
                                                                                    aria-expanded="true">Загрузить</a>
                                                </li>

                                            </ul>
                                            <div id="TabUploadContent" class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade active in" id="files"
                                                     aria-labelledby="files-tab">


                                                    <ul class="list-group">
                                                        <ul class="list-group">
                                                            @foreach($SelectRequestFile as $file)
                                                                <a href="{{URL::route('dashboard.filemanager.show', $file->id)}}"
                                                                   class="list-group-item">{{$file->name}}</a>
                                                            @endforeach
                                                        </ul>
                                                    </ul>


                                                </div>


                                                <div role="tabpanel" class="tab-pane" id="goodfiles"
                                                     aria-labelledby="goodfiles-tab">

                                                    <ul class="list-group">
                                                        <ul class="list-group">
                                                            @foreach($SelectGoodFile as $file)
                                                                <a href="{{URL::route('dashboard.filemanager.show', $file->id)}}"
                                                                   class="list-group-item">{{$file->name}}</a>
                                                            @endforeach
                                                        </ul>
                                                    </ul>


                                                </div>


                                                <div role="tabpanel" class="tab-pane" id="uploadFileTab"
                                                     aria-labelledby="uploadFileTab-tab">


                                                    <br>
                                                    <!-- The fileinput-button span is used to style the file input field as button -->
    <span class="btn btn-default btn-block fileinput-button">
        <span class="fileinput-new fa fa-cloud-upload text btn-block"> Выбрать файл</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="files[]" multiple>
    </span>


                                                    <br>
                                                    <br>
                                                    <!-- The global progress bar -->
                                                    <div id="progress" class="progress">
                                                        <div class="progress-bar progress-bar-success"></div>
                                                    </div>

                                                    <!-- The container for the uploaded files -->
                                                    <div id="files" class="files"></div>
                                                    <br>

                                                </div>

                                            </div>
                                        </div>


                                        <button type="submit" class="btn btn-success btn-block">Сохранить</button>

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
                        <small class="text-muted">к заказу</small>
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
                    '//jquery-file-upload.appspot.com/' : '/dashboard/filemanager';
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

                },
                complete: function(e, data)
                {
                    $('#progress .progress-bar').css(
                            'width',
                             '0'
                    );
                }

            }).prop('disabled', !$.support.fileInput)
                    .parent().addClass($.support.fileInput ? undefined : 'disabled');
        });
    </script>


@endsection






