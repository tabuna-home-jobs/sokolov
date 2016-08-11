@extends('_layout/account')

@section('content-account')

    <script type="text/javascript">
        function delElem(elem) {

            var countFiles = document.getElementById("fileselect").files;

            for (var i = 0; i < countFiles.length; i++) {

                if (countFiles[i]['name'] == $(elem).parent().text()) {
                    var files = [].slice.call(countFiles);
                    files.splice(i, 1); //whatever works for normal array
                    $('#fileselect').attr('value', files);

                }
            }
            $(elem).parent().remove();
            console.log(document.getElementById("fileselect").files);

        }
    </script>

    <div class="stepwizard">
        <div class="stepwizard-row setup-panel col-xs-12">
            <div class="stepwizard-step col-xs-4">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle"><i class="fa fa-eye"></i></a>

                <h4>{{trans('createOrder.Selection of services')}}</h4>
            </div>

            <div class="stepwizard-step col-xs-4">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled"><i
                            class="fa fa-file-word-o"></i></a>

                <h4>{{trans('createOrder.Attach files')}}</h4>
            </div>

            <div class="stepwizard-step col-xs-4">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled"><i
                            class="fa fa-pencil-square-o"></i></a>

                <h4>{{trans('createOrder.Description of work')}}</h4>
            </div>


        </div>
    </div>

    <form role="form" method="post" class="order" action="{{URL::route(App::getLocale().'.order.store')}}" enctype="multipart/form-data">
        <div class="row setup-content" id="step-1">
            <div class="col-xs-12">
                <div class="col-md-12">

                    @foreach($type as $key => $value)

                        <div class="row">
                            <div class="col-xs-6">
                                <div class="radio">
                                    <label>
                                        <input type="checkbox" class="select-disable" data-activion="{{$value->id}}"
                                               name="type[{{$value->id}}][id]" value=" {{$value->id}}"
                                               checked>
                                        @if (App::getLocale() == 'ru') {{$value->name}} @else {{$value->eng_name}} @endif
                                    </label>
                                </div>
                            </div>

                            @if(count(unserialize($value->goods->first()->attribute)) > 0 && $value->goods->first()->calculator)
                                <div class="col-xs-4 pull-right">
                                    <select class="form-control select-disable-{{$value->id}}"
                                            name="type[{{$value->id}}][speed]">

                                        @for($i=0; $i < count(unserialize($value->goods->first()->attribute)); $i++ )
                                            @if($i%2 ==0 &&  isset(unserialize($value->goods->first()->attribute)[$i]))
                                                <option value="{{unserialize($value->goods->first()->attribute)[$i]}}">
                                                    {{trans('speed.' . unserialize($value->goods->first()->attribute)[$i] )}}
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

                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                        <div class="form-control" data-trigger="fileinput"><i
                                    class="glyphicon glyphicon-file fileinput-exists"></i> <span
                                    class="fileinput-filename"></span></div>
                        <span class="input-group-addon btn btn-default btn-file"><span
                                    class="fileinput-new">{{trans('file.Select file')}}</span><span
                                    class="fileinput-exists">{{trans('file.Change')}}</span><input type="file"
                                                                                                   name="files[]"
                                                                                                   required></span>
                        <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                           data-dismiss="fileinput">{{trans('file.Remove')}}</a>
                    </div>


                    <div id="NewUploader">

                    </div>


                    <hr>
                    <p class="text-center"><a class="btn btn-link" id="MoreUpload"> <i
                                    class="fa fa-plus"></i> {{trans('file.More')}}</a></p>
                    <hr>


                    <button class="btn btn-primary nextBtn pull-right"
                            type="button">{{trans('createOrder.Next')}}</button>

                </div>
            </div>
        </div>

        <div class="row setup-content" id="step-3">
            <div class="col-xs-12">
                <div class="col-md-12">

                    <div class="form-group">
                        <label class="control-label">{{trans('createOrder.Job title')}}</label>
                        <input maxlength="200" type="text" name="name" required="required" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label class="control-label">{{trans('createOrder.Description of work filed')}}</label>
                        <textarea rows="20" class="form-control" name="text" required="required"></textarea>
                    </div>

                    <div class="form-group" id="izdanie2">
                        <label class="control-label"> {{trans('createOrder.Scientific publication, for which formats work')}}</label>
                        <input rows="20" class="form-control" name="izdanie">
                    </div>


                    <div class="form-group">
                        <label class="control-label">{{trans('createOrder.For what language translation needs')}}</label>

                        @foreach($langTrans as $key => $value)
                        <div class="radio">
                            <label>
                                <input type="radio" value="{{$value}}" name="langOrder_id" required>
                                {{$key}}
                            </label>
                        </div>
                        @endforeach
                    </div>


                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button class="btn btn-warning pull-right" type="submit">{{trans('createOrder.Send')}}</button>

                </div>
            </div>
        </div>
    </form>


    <script>


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


                $(".select-disable").each(function () {
                    if (!this.checked) {
                        var idService = $(this).data('activion');
                        $(".select-disable-" + idService).attr("disabled", true);
                    }
                }).change(function () {
                    if (this.checked) {
                        var idService = $(this).data('activion');
                        $(".select-disable-" + idService).attr("disabled", false);
                    }
                    else {
                        var idService = $(this).data('activion');
                        $(".select-disable-" + idService).attr("disabled", true);
                    }
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









                $(document).ready(function () {
                    var showCountClick = 0;

                    var navListItems = $('div.setup-panel div a'),
                            allWells = $('.setup-content'),
                            allNextBtn = $('.nextBtn');

                    allWells.hide();

                    navListItems.click(function (e) {
                        e.preventDefault();
                        var $target = $($(this).attr('href')),
                                $item = $(this);

                        if (!$item.attr('disabled')) {
                            navListItems.removeClass('btn-primary').addClass('btn-default');
                            $item.addClass('btn-primary');
                            allWells.hide();
                            $target.show();
                            $target.find('input:eq(0)').focus();
                        }
                    });

                    allNextBtn.click(function(){
                        var curStep = $(this).closest(".setup-content"),
                                curStepBtn = curStep.attr("id"),
                                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                                curInputs = curStep.find("input[type='text'],input[type='url'],input[name='apport'],select[required='required']"),
                                isValid = true;

                        $(".form-group").removeClass("has-error");

                        for(var i=0; i<curInputs.length; i++){
                            if (!curInputs[i].validity.valid){
                                isValid = false;
                                $(curInputs[i]).closest(".form-group").addClass("has-error");
                            }

                            if (curInputs[i].nodeName == 'SELECT' && $(curInputs[i]).val() == '') {
                                isValid = false;
                                $(curInputs[i]).closest(".form-group").addClass("has-error");
                            }
                        }

                        if (isValid)
                            nextStepWizard.removeAttr('disabled').trigger('click');
                    });

                    $('div.setup-panel div a.btn-primary').trigger('click');
                });

















            });

    </script>



@endsection
