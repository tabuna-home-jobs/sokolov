@extends('_layout/account')

@section('content-account')

    <script type="text/javascript">
        function delElem(elem) {
            //Удаляем элемент (файл)
            $(elem).parent().remove();

        }
    </script>

    <div class="panel panel-default">
        <div class="panel-heading">{{trans("order.Order")}} # {{$Order->id}}</div>


        <div class="panel-body">

            <h4>{{$Order->name}}</h4>

            <p>{{$Order->text}}</p>

            @if(!empty($Order->izdanie))
                <p>{{trans("order.Target journal")}}: {{$Order->izdanie}}</p>
            @endif

            <hr>
            <p class="pull-left">{{trans("order.Requested services")}}:</p>

            <p class="text-right">{{trans("order.Requested speed")}}:</p>

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
            <li class="list-group-item">{{trans("order.Status")}}: <p
                        class="pull-right">{{ trans('status.' . $Order->status)}}</p></li>
            <li class="list-group-item">{{trans("order.Order completion date and time")}}: <p
                        class="pull-right">{{$Order->workfinish->tz(Config::get('app.timezone'))}}</p></li>
            <li class="list-group-item">{{trans("order.Total price")}}: <p class="pull-right">{{$Order->price}} USD</p>
            </li>
        </ul>


        <ul id="myTabs" class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#comments" role="tab" data-toggle="tab" aria-controls="home"
                                                      aria-expanded="true">{{trans("order.Comments")}}</a></li>
            <li role="presentation" class=""><a href="#oldfile" role="tab" data-toggle="tab" aria-controls="profile"
                                                aria-expanded="false">{{trans("order.Loaded files")}}</a></li>
            <li role="presentation" class=""><a href="#newfile" role="tab" data-toggle="tab" aria-controls="profile"
                                                aria-expanded="false">{{trans("order.Completed files")}}</a></li>

            @if($Order->status == "Готова")
            <li role="presentation" class=""><a href="#reviews" role="tab" data-toggle="tab" aria-controls="reviews"
                                                aria-expanded="false">{{trans("reviews.Write a review")}}</a></li>
            @endif

        </ul>
        <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="comments" aria-labelledby="home-tab">


                <div class="user-comment">
                    @foreach($SelectComments as $comment)
                        <p>{{$comment->text}}</p>
                        <p class="text-muted pull-right">{{$comment->created_at->tz(Config::get('app.timezone'))}}</p>
                        <hr>
                    @endforeach


                    <form action="{{URL::route('comments.store')}}" method="post">
                        <div class="form-group">
                            <label>{{trans("order.Send additional comments/questions")}}</label>
        <textarea class="form-control" rows="3" required name="text"
                  style="resize: none;"></textarea>
                        </div>
                        <input type="hidden" name="type" value="order">
                        <input type="hidden" name="beglouto" value="{{$Order->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <p class="text-center">
                            <button type="submit" class="btn btn-primary">{{trans("orderTask.Send")}}</button>
                        </p>
                    </form>
                </div>


            </div>
            <div role="tabpanel" class="tab-pane fade" id="oldfile" aria-labelledby="profile-tab">


                <form action="{{route('order.update',$Order->id)}}" method="post" enctype="multipart/form-data">

                    <hr>


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
                    <p class="text-center">
                        <a class="btn btn-link" id="MoreUpload">{{trans('file.More')}}</a>
                        <button class="btn btn-warning" type="submit">{{trans("orderTask.Send")}}</button>
                    </p>
                    <hr>

                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>









                <ul class="list-group">
                    <ul class="list-group">
                        @foreach($SelectRequestFile as $file)
                            <a href="{{URL::route('filemanager.show', $file->id)}}"
                               class="list-group-item"><i
                                        class="fa fa-file-o"></i> {{$file->original}}
                                <small class="pull-right">{{$file->created_at->tz(Config::get('app.timezone'))}}</small>
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
                                <small class="pull-right">{{$file->created_at->tz(Config::get('app.timezone'))}}</small>
                            </a>
                        @endforeach
                    </ul>
                </ul>
            </div>


            @if($Order->status == "Готова")
            <div role="tabpanel" class="tab-pane fade" id="reviews" aria-labelledby="reviews-tab">


                <form action="{{route('review.store')}}" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="panel-body">


                        <div class="form-group">
                            <label for="name">{{trans('feedback.Full name')}}</label>
                            <input type="text" class="form-control" readonly name="name" id="name"
                                   value="{{Auth::user()->first_name}} {{Auth::user()->last_name}}">
                        </div>

                        <div class="form-group">
                            <label for="country">{{trans('setting.Country')}}</label>
                            <input type="text" class="form-control" name="country" readonly id="country"
                                   value="{{Auth::user()->getCountry()->first()->name}}">
                        </div>

                        <div class="form-group">
                            <label for="institute">{{trans('setting.Institution')}}</label>
                            <input type="text" class="form-control" name="institute" readonly id="institute"
                                   value="{{Auth::user()->institution}}">
                        </div>

                        <div class="form-group">
                            <label for="dolshnost">{{trans('setting.title')}}</label>
                            <input type="text" class="form-control" name="dolshnost" readonly id="dolshnost"
                                   value="{{Auth::user()->dignity}}">
                        </div>

                        <div class="form-group">
                            <label for="comment">{{trans('reviews.Content')}}</label>
                            <textarea class="form-control" name="comment" rows="10" id="comment"></textarea>
                        </div>


                        <div class="form-group">
                            <label for="avatar">{{trans('reviews.Your image')}}</label>

                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                <div class="form-control" data-trigger="fileinput"><i
                                            class="glyphicon glyphicon-file fileinput-exists"></i> <span
                                            class="fileinput-filename"></span></div>
                        <span class="input-group-addon btn btn-default btn-file"><span
                                    class="fileinput-new">{{trans('file.Select file')}}</span><span
                                    class="fileinput-exists">{{trans('file.Change')}}</span><input type="file"
                                                                                                   name="avatar"></span>
                                <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                   data-dismiss="fileinput">{{trans('file.Remove')}}</a>
                            </div>
                        </div>


                    </div>

                    <p class="text-center">
                        <button class="btn btn-link" type="submit">{{trans('reviews.Send')}}</button>
                    </p>
                </form>


            </div>
            @endif

        </div>


        <div class="panel-footer">
            <p class="text-right">{{trans('order.Order placed')}} {{$Order->created_at->tz(Config::get('app.timezone'))}}</p>
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