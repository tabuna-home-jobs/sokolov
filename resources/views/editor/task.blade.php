@extends('_layout/editor')




@section('content-editor')


    <script type="text/javascript">
        function delElem(elem) {
            //Удаляем элемент (файл)
            $(elem).parent().remove();

        }
    </script>

    <div class="panel panel-default">
        <div class="panel-heading">{{trans('orderTask.Task')}} № {{$Task->id}}


            <form class="pull-right" action="{{route('editor.order.update',$Task->id)}}" method="post">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="finish" value="true">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button class="btn btn-default  btn-xs">
                    {{trans('orderTask.End Task')}}
                </button>
            </form>


        </div>

        <div class="panel-body">

            <h4>{{$Task->name}}</h4>


            <hr>
            <p>{{trans('orderTask.Service')}}:</p>

            <ul class="list-group">
                <li class="list-group-item">
                    @if(App::getLocale() == 'ru')
                        {{$Task->getGoods->name}}
                    @else
                        {{$Task->getGoods->eng_name}}
                    @endif
                </li>
            </ul>
        </div>


        <ul class="list-group">
            <li class="list-group-item">{{trans('orderTask.Status')}}: <p
                        class="pull-right"> {{trans('status.'. $Task->status)}}</p></li>
            <li class="list-group-item">{{trans('orderTask.Deadline')}}: <p
                        class="pull-right">{{$Task->workfinish->tz(Config::get('app.timezone'))}}</p>
            </li>
            <li class="list-group-item">{{trans('orderTask.Price')}}: <p class="pull-right">{{$Task->price}} USD</p>
            </li>
        </ul>


        <ul id="myTabs" class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#comments" role="tab" data-toggle="tab" aria-controls="home"
                                                      aria-expanded="true">{{trans('orderTask.Comments')}}</a></li>
            <li role="presentation" class=""><a href="#oldfile" role="tab" data-toggle="tab" aria-controls="profile"
                                                aria-expanded="false">{{trans('orderTask.Available files')}}</a></li>
            <li role="presentation" class=""><a href="#newfile" role="tab" data-toggle="tab" aria-controls="profile"
                                                aria-expanded="false">{{trans('orderTask.Ready files')}}</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="comments" aria-labelledby="home-tab">


                <div class="user-comment">
                    @foreach($Comments as $comment)
                        <p>{{$comment->text}}</p>
                        <p class="text-muted pull-right">{{$comment->created_at->tz(Config::get('app.timezone'))}}</p>
                        <hr>
                    @endforeach


                    <form action="{{URL::route('editor.comment.store')}}" method="post">
                        <div class="form-group">
                            <label>{{trans('orderTask.Write a comment')}}</label>
        <textarea class="form-control" rows="3" required name="text"
                  style="resize: none;"></textarea>
                        </div>
                        <input type="hidden" name="type" value="order">
                        <input type="hidden" name="beglouto" value="{{$Task->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-primary btn-block">{{trans('orderTask.Send')}}</button>

                    </form>
                </div>


            </div>
            <div role="tabpanel" class="tab-pane fade" id="oldfile" aria-labelledby="profile-tab">


                <ul class="list-group">
                    <ul class="list-group">
                        @foreach($Task->getFileMeta as $file)
                            @if(!$file->getFiles->finish)
                                <a href="{{URL::route('filemanager.show', $file->getFiles->id)}}"
                                   class="list-group-item"><i
                                            class="fa fa-file-o"></i> {{$file->getFiles->original}}
                                    <small class="pull-right">{{$file->getFiles->created_at->tz(Config::get('app.timezone'))}}</small>
                                </a>
                            @endif
                        @endforeach
                    </ul>
                </ul>


            </div>
            <div role="tabpanel" class="tab-pane fade" id="newfile" aria-labelledby="profile-tab">
                <ul class="list-group">
                    <ul class="list-group">
                        @foreach($Task->getFileMeta as $file)
                            @if($file->getFiles->finish)
                                <a href="{{URL::route('filemanager.show', $file->getFiles->id)}}"
                                   class="list-group-item"><i
                                            class="fa fa-file-o"></i> {{$file->getFiles->original}}
                                    <small class="pull-right">{{$file->getFiles->created_at->tz(Config::get('app.timezone'))}}</small>
                                </a>
                            @endif
                        @endforeach
                    </ul>
                </ul>


                <div class="container-fluid">
                    <div class="row">
                        <form action="{{route('editor.filemanager.store')}}" method="post" class="text-center"
                              enctype="multipart/form-data">

                            <h6>{{trans('orderTask.Download the required documents')}}</h6>


                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                <div class="form-control" data-trigger="fileinput"><i
                                            class="glyphicon glyphicon-file fileinput-exists"></i> <span
                                            class="fileinput-filename"></span></div>
                                <span class="input-group-addon btn btn-default btn-file"><span
                                            class="fileinput-new">{{trans('file.Select file')}}</span><span
                                            class="fileinput-exists">{{trans('file.Change')}}</span><input type="file"
                                                                                                           name="files[]"></span>
                                <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                   data-dismiss="fileinput">{{trans('file.Remove')}}</a>
                            </div>


                            <div id="NewUploader">

                            </div>


                            <hr>
                            <a class="btn btn-link" id="MoreUpload">{{trans('file.More')}}</a>
                            <hr>


                            <input type="hidden" name="type" value="order">
                            <input type="hidden" name="beglouto" value="{{$Task->id}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-primary btn-block" type="submit">{{trans('orderTask.Send')}}!
                            </button>

                        </form>
                    </div>
                </div>


            </div>
        </div>


        <div class="panel-footer">
            <div class="text-center">
                <div class="clock-time"></div>
            </div>
        </div>

    </div>






    <script>
        window.onload = function () {


            $(document).ready(function () {


                var myhtml = '<div class="fileinput fileinput-new input-group" data-provides="fileinput">';
                myhtml += '<div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>';
                myhtml += '<span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">{{trans("file.Select file")}}</span><span class="fileinput-exists">{{trans("file.Change")}}</span><input type="file" name="files[]"></span>';
                myhtml += ' <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">{{trans("file.Remove")}}</a>';
                myhtml += '</div>';

                $("#MoreUpload").click(function () {
                    $("#NewUploader").html(
                            $("#NewUploader").html() + myhtml
                    );
                });


                var clock = $('.clock-time').FlipClock(
                        @if(strtotime($Task->workfinish->tz(Config::get('app.timezone'))) - time() < 0)
                            {{0}}
                        @else
                             {{strtotime($Task->workfinish->tz(Config::get('app.timezone'))) - time()}}
                        @endif

                        , {
                            'autoStart': true,
                            'countdown': true,
                            'clockFace': 'DailyCounter'
                        });


                //Проверка состояния загрузки файлов
                $("#fileselect").on('click', function () {
                    var obj = $("#messages");

                    //Если юзер берет файлы то очищаем те которые он уже залил
                    $('li', obj).each(function () {
                        $(this).remove();
                    });

                    //Количество файлов, хз зачем я это сделал
                    //var countFiles = this.files.length;

                });

                $('.nextBtn').click(function () {
                    var checket = $(".order input[type='radio']:checked").val();
                    if (checket == 6) {
                        $('#izdanie').removeClass('hidden');
                    }
                    else {
                        $('#izdanie').addClass('hidden');
                    }
                });


                var navListItems = $('div.setup-panel div a'),
                        allWells = $('.setup-content'),
                        allNextBtn = $('.nextBtn');

                allWells.hide();

                navListItems.click(function (e) {
                    e.preventDefault();
                    var $target = $($(this).attr('href')),
                            $item = $(this);

                    if (!$item.hasClass('disabled')) {
                        navListItems.removeClass('btn-primary').addClass('btn-default');
                        $item.addClass('btn-primary');
                        allWells.hide();
                        $target.show();
                        $target.find('input:eq(0)').focus();
                    }
                });

                allNextBtn.click(function () {
                    var curStep = $(this).closest(".setup-content"),
                            curStepBtn = curStep.attr("id"),
                            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                            curInputs = curStep.find("input[type='text'],input[type='url']"),
                            isValid = true;

                    $(".form-group").removeClass("has-error");
                    for (var i = 0; i < curInputs.length; i++) {
                        if (!curInputs[i].validity.valid) {
                            isValid = false;
                            $(curInputs[i]).closest(".form-group").addClass("has-error");
                        }
                    }

                    if (isValid)
                        nextStepWizard.removeAttr('disabled').trigger('click');
                });

                $('div.setup-panel div a.btn-primary').trigger('click');
            });


        };
    </script>








@endsection