@extends('_layout/editor')

@section('content-editor')


    <script type="text/javascript">
        function delElem(elem) {
            //Удаляем элемент (файл)
            $(elem).parent().remove();

        }
    </script>

    <div class="panel panel-default">
        <div class="panel-heading">Задача № {{$Task->id}}</div>


        <div id="counter"></div>


        <div class="panel-body">
            <h4>{{$Task->name}}</h4>
            <hr>
            <p>Требуеться выполнение услуги
                : @if(App::getLocale() == 'ru') {{$Task->getGoods->name}}  @else {{$Task->getGoods->eng_name}} @endif</p>
        </div>


        <ul class="list-group">
            <li class="list-group-item">Статус: <p class="pull-right">{{$Task->status}}</p></li>
            <li class="list-group-item">Дата окончания работы: <p
                        class="pull-right">{{$Task->workfinish->tz('UTC')}}</p></li>
            <li class="list-group-item">Цена: <p class="pull-right">{{$Task->price}}</p></li>
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
                    @foreach($Comments as $comment)
                        <p>{{$comment->text}}</p>
                        <p class="text-muted pull-right">{{$comment->created_at->tz('UTC')}}</p>
                        <hr>
                    @endforeach


                    <form action="{{URL::route('editor.comments.store')}}" method="post">
                        <div class="form-group">
                            <label>Написать комментарий</label>
        <textarea class="form-control" rows="3" required name="text"
                  style="resize: none;"></textarea>
                        </div>
                        <input type="hidden" name="type" value="task">
                        <input type="hidden" name="beglouto" value="{{$Task->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-primary btn-block">Отправить</button>

                    </form>
                </div>


            </div>
            <div role="tabpanel" class="tab-pane fade" id="oldfile" aria-labelledby="profile-tab">


                <ul class="list-group">
                    <ul class="list-group">

                        <h6 class="text-center">Файлы:</h6>
                        @foreach($Task->getFileMeta as $file)
                            @if(!$file->getFiles->finish)
                                <a href="{{URL::route('filemanager.show', $file->getFiles->id)}}"
                                   class="list-group-item"><i
                                            class="fa fa-file-o"></i> {{$file->getFiles->original}}
                                    <small class="pull-right">{{$file->getFiles->created_at}}</small>
                                </a>
                            @endif
                        @endforeach

                        <h6 class="text-center">Готовые файлы:</h6>
                        @foreach($Task->getFileMeta as $file)
                            @if($file->getFiles->finish)
                                <a href="{{URL::route('filemanager.show', $file->getFiles->id)}}"
                                   class="list-group-item"><i
                                            class="fa fa-file-o"></i> {{$file->getFiles->original}}
                                    <small class="pull-right">{{$file->getFiles->created_at}}</small>
                                </a>
                            @endif
                        @endforeach

                    </ul>
                </ul>


            </div>
            <div role="tabpanel" class="tab-pane fade" id="newfile" aria-labelledby="profile-tab">
                <ul class="list-group">
                    <ul class="list-group">


                        <form action="" method="post">
                            <h3> Загрузите необходимые документы</h3>


                            <fieldset>
                                <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000"/>

                                <div class="fileinput fileinput-new" data-provides="fileinput">
                            <span class="btn btn-default btn-file"><span class="fileinput-new">Выберите файл</span><span
                                        class="fileinput-exists">Выберите файл</span>
                                     <input required type="file" id="fileselect" name="files[]"
                                            multiple="multiple"/></span>
                                </div>


                                <div id="filedrag" class="upload-drop-zone">
                                    Переместите файлы которые вы хотите загрузить
                                </div>

                                <div id="submitbutton">
                                    <button type="submit">Upload Files</button>
                                </div>

                            </fieldset>

                            <div class="panel panel-default">
                                <div class="panel-heading">Файлы:</div>
                                <ul class="list-group" id="messages">

                                </ul>
                            </div>


                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-warning pull-right" type="submit">Отправить!</button>
                        </form>

                    </ul>
                </ul>
            </div>
        </div>


        <div class="panel-footer">
            <p class="text-right">Дата постановки задачи {{$Task->created_at}}</p>
        </div>

    </div>











    <script>
        window.onload = function () {


            $(document).ready(function () {


                $('#counter').countdown({
                    image: "digits.png",
                    format: "mm:ss",
                    endTime: new Date('07/16/17 05:00:00')
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