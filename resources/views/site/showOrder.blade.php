@extends('_layout/account')

@section('content-account')



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




@endsection