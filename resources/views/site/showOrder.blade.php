@extends('_layout/account')

@section('content-account')

    <script type="text/javascript">
        function delElem(elem) {
            //Удаляем элемент (файл)
            $(elem).parent().remove();

        }
    </script>

    <div class="panel panel-default">
        <div class="panel-heading">Заказ № {{$Order->id}}</div>


        <div class="panel-body">

            <h4>{{$Order->name}}</h4>

            <p>{{$Order->text}}</p>

            @if(!empty($Order->izdanie))
                <p>Издание: {{$Order->izdanie}}</p>
            @endif

            <hr>
            <p>Услуги:</p>

            <ul class="list-group">
                @foreach($collectionGoods as $key => $value)

                    <li class="list-group-item">
                        @if(App::getLocale() == 'ru')
                            {{$value->name}}
                        @else
                            {{$value->eng_name}}
                        @endif



                            @if(!empty($value->speed))
                                <span class="pull-right">
                                <small> {{ " - ". trans('speed.'. $value->speed)}} </small>
                            </span>
                            @endif


                    </li>
                @endforeach
            </ul>
        </div>


        <ul class="list-group">
            <li class="list-group-item">Статус: <p class="pull-right">{{$Order->status}}</p></li>
            <li class="list-group-item">Дата окончания работы: <p class="pull-right">{{$Order->workfinish}}</p></li>
            <li class="list-group-item">Цена: <p class="pull-right">{{$Order->price}}</p></li>
        </ul>


        <ul id="myTabs" class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#comments" role="tab" data-toggle="tab" aria-controls="home"
                                                      aria-expanded="true">Комментарии</a></li>
            <li role="presentation" class=""><a href="#oldfile" role="tab" data-toggle="tab" aria-controls="profile"
                                                aria-expanded="false">Загруженные файлы</a></li>
            <li role="presentation" class=""><a href="#newfile" role="tab" data-toggle="tab" aria-controls="profile"
                                                aria-expanded="false">Готовые файлы</a></li>


        </ul>
        <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="comments" aria-labelledby="home-tab">


                <div class="user-comment">
                    @foreach($SelectComments as $comment)
                        <p>{{$comment->text}}</p>
                        <p class="text-muted pull-right">{{$comment->created_at}}</p>
                        <hr>
                    @endforeach


                    <form action="{{URL::route('comments.store')}}" method="post">
                        <div class="form-group">
                            <label>Написать комментарий</label>
        <textarea class="form-control" rows="3" required name="text"
                  style="resize: none;"></textarea>
                        </div>
                        <input type="hidden" name="type" value="order">
                        <input type="hidden" name="beglouto" value="{{$Order->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-primary btn-block">Отправить</button>

                    </form>
                </div>


            </div>
            <div role="tabpanel" class="tab-pane fade" id="oldfile" aria-labelledby="profile-tab">





                <form class="text-center" action="{{route('order.update',$Order->id)}}" method="post" enctype="multipart/form-data">

                    <hr>

                    <fieldset>
                        <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000"/>

                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <span class="btn btn-default btn-file"><span class="fileinput-new">Выберите файл</span><span
                                        class="fileinput-exists">Выберите файл</span>
                                     <input required type="file" id="fileselect" name="files[]"
                                            multiple="multiple"/></span>
                        </div>


                        <button class="btn btn-link" type="submit">Загрузить!</button>


                        <div id="filedrag" class="upload-drop-zone">
                            Переместите файлы которые вы хотите загрузить
                        </div>


                        <div id="submitbutton">
                            <button type="submit">Upload Files</button>
                        </div>

                    </fieldset>


                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">Файлы которые будут загружены:</div>
                        <ul class="list-group" id="messages">

                        </ul>
                    </div>


                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>









                <ul class="list-group">
                    <ul class="list-group">
                        @foreach($SelectRequestFile as $file)
                            <a href="{{URL::route('filemanager.show', $file->id)}}"
                               class="list-group-item"><i
                                        class="fa fa-file-o"></i> {{$file->original}}
                                <small class="pull-right">{{$file->created_at}}</small>
                            </a>
                        @endforeach
                    </ul>
                </ul>


            </div>
            <div role="tabpanel" class="tab-pane fade" id="newfile" aria-labelledby="profile-tab">
                <ul class="list-group">
                    <ul class="list-group">
                        @foreach($SelectGoodFile as $file)
                            <a href="{{URL::route('filemanager.show', $file->id)}}"
                               class="list-group-item"><i
                                        class="fa fa-file-o"></i> {{$file->original}}
                                <small class="pull-right">{{$file->created_at}}</small>
                            </a>
                        @endforeach
                    </ul>
                </ul>
            </div>
        </div>


        <div class="panel-footer">
            <p class="text-right">Формирование заказа {{$Order->created_at}}</p>
        </div>

    </div>






    <script>
        window.onload = function () {


            $(document).ready(function () {

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


            (function () {

                // getElementById
                function $id(id) {
                    return document.getElementById(id);
                }


                // output information
                function Output(msg) {
                    var m = $id("messages");
                    m.innerHTML = msg + m.innerHTML;
                }


                // file drag hover
                function FileDragHover(e) {
                    e.stopPropagation();
                    e.preventDefault();
                    e.target.className = (e.type == "dragover" ? "hover" : "");
                }


                // file selection
                function FileSelectHandler(e) {

                    // cancel event and hover styling
                    FileDragHover(e);

                    // fetch FileList object
                    var files = e.target.files || e.dataTransfer.files;

                    // process all File objects
                    for (var i = 0, f; f = files[i]; i++) {
                        ParseFile(f);
                    }

                }



                // output file information
                function ParseFile(file) {

                    Output(
                            "<li class='list-group-item'>" + file.name +
                            "<span class='removeFile' onclick='delElem(this);'><i class='fa fa-times'></i></span></li>"
                    );

                }


                // initialize
                function Init() {

                    var fileselect = $id("fileselect"),
                            filedrag = $id("filedrag"),
                            submitbutton = $id("submitbutton");

                    // file select
                    fileselect.addEventListener("change", FileSelectHandler, false);

                    // is XHR2 available?
                    var xhr = new XMLHttpRequest();
                    if (xhr.upload) {

                        // file drop
                        filedrag.addEventListener("dragover", FileDragHover, false);
                        filedrag.addEventListener("dragleave", FileDragHover, false);
                        filedrag.addEventListener("drop", FileSelectHandler, false);
                        filedrag.style.display = "block";

                        // remove submit button
                        submitbutton.style.display = "none";
                    }

                }

                // call initialization file
                if (window.File && window.FileList && window.FileReader) {
                    Init();
                }


            })();


        };
    </script>


@endsection