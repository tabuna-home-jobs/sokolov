@extends('_layout/account')

@section('content-account')


    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle"><i class="fa fa-eye"></i></a>

                <p>{{trans('createOrder.Selection of services')}}</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled"><i
                            class="fa fa-pencil-square-o"></i></a>

                <p>{{trans('createOrder.Description of work')}}</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled"><i
                            class="fa fa-file-word-o"></i></a>

                <p>{{trans('createOrder.Attach files')}}</p>
            </div>
        </div>
    </div>

    <form role="form" method="post" class="order" action="{{URL::route('order.store')}}" enctype="multipart/form-data">
        <div class="row setup-content" id="step-1">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3 class="text-center">{{trans('createOrder.Select the service provided')}}</h3>

                    @foreach($type as $key => $value)




                        <div class="row">
                            <div class="col-xs-6">
                                <div class="radio">
                                    <label>
                                        <input type="checkbox" name="type[{{$value->id}}][id]" value=" {{$value->id}}"
                                               required checked>
                                        @if (App::getLocale() == 'ru') {{$value->name}} @else {{$value->eng_name}} @endif
                                    </label>
                                </div>
                        </div>


                            @if(!empty(count(unserialize($value->goods->first()->attribute))))
                                <div class="col-xs-6 pull-right">
                                    <select class="form-control" name="type[{{$value->id}}][speed]">
                                        @for($i=0; $i < count(unserialize($value->goods->first()->attribute)); $i++ )
                                            @if(unserialize($value->goods->first()->attribute)[$i] == "Speed")
                                                <option value="{{unserialize($value->goods->first()->attribute)[$i+1]}}">
                                                    {{unserialize($value->goods->first()->attribute)[$i+1]}}
                                                </option>
                                            @endif
                                        @endfor
                                    </select>
                                </div>
                            @endif

                        </div>
                    @endforeach


                    <button class="btn btn-primary nextBtn pull-right"
                            type="button">{{trans('createOrder.Next')}}</button>
                </div>
            </div>
        </div>
        <div class="row setup-content" id="step-2">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3 class="text-center"> {{trans('createOrder.Give a description of the available work')}}</h3>

                    <div class="form-group">
                        <label class="control-label">{{trans('createOrder.Job title')}}</label>
                        <input maxlength="200" type="text" name="name" required="required" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label class="control-label">{{trans('createOrder.Description of work')}}</label>
                        <textarea rows="20" class="form-control" name="text" required="required"></textarea>
                    </div>

                    <div class="form-group" id="izdanie2">
                        <label class="control-label"> {{trans('createOrder.Scientific publication, for which formats work')}}</label>
                        <input rows="20" class="form-control" name="izdanie">
                    </div>


                    <div class="form-group">
                        <label class="control-label"> {{trans('createOrder.For what language translation needs')}}</label>
                        <select name="langOrder_id" required class="form-control">
                            @foreach($langTrans as $key => $value)

                                <option value="{{$value}}">
                                    {{$key}}
                                </option>

                            @endforeach
                        </select>
                    </div>


                    <button class="btn btn-primary nextBtn pull-right"
                            type="button">{{trans('createOrder.Next')}}</button>
                </div>
            </div>
        </div>
        <div class="row setup-content" id="step-3">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3>{{trans('createOrder.Download the required documents')}}</h3>


                    <fieldset>
                        <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000"/>

                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <span class="btn btn-default btn-file"><span
                                        class="fileinput-new">{{trans('createOrder.Select files')}}</span><span
                                        class="fileinput-exists">{{trans('createOrder.Select files')}}</span>
                                     <input required type="file" id="fileselect" name="files[]"
                                            multiple="multiple"/></span>
                        </div>


                        <div id="filedrag" class="upload-drop-zone">
                            {{trans('createOrder.Move the files you want to upload')}}
                        </div>


                        <div id="submitbutton">
                            <button type="submit">Upload Files</button>
                        </div>

                    </fieldset>


                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">{{trans('createOrder.Files')}}:</div>
                        <ul class="list-group" id="messages">

                        </ul>
                    </div>


                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button class="btn btn-warning pull-right" type="submit">{{trans('createOrder.Send')}}!</button>
                </div>
            </div>
        </div>
    </form>
















    <script>
        window.onload = function () {


            $(document).ready(function () {


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
                            "</li>"
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