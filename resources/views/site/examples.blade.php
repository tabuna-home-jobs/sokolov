@extends('_layout/site')




@section('content')

    <div class="container blog-container">

        <article class="col-md-8">


            <h1>Готовые работы</h1>

        </article>


        <div class="col-xs-12">
            <div class="sidebar-module sidebar-module-inset">

                <hr>
                @foreach($goodslist as $key =>$good)

                    <div class="col-xs-3 examples">
                        <div class="avatar-examples text-center">
                            <i class="fa fa-file-text-o"></i>
                        </div>
                        <div class="name-example text-center">
                            <a href="{{$good->slug}}">{{$good->name}}</a>
                        </div>

                        <div class="date_create_example col-xs-9">
                            <div class="date-exampl">{{$good->created_at}}</div>
                        </div>
                        <div class="col-xs-3 eye-link-examples text-right">
                            <a class="gettext" data-expl_id="{{$good->id}}"  data-toggle="collapse" href="#collapse" aria-expanded="false">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                    </div>
                    @if(($key+1) % 4 == 0)
                        <div class="clearfix"></div>
                    @endif
                @endforeach

                <div class="collapse row in" id="collapse">
                    <div class="wrap-slide-text col-sm-12 hidden-xs">
                        <div id="mainSlider" class="slider">
                            <div id="leftCont" class="pagesldr">
                            </div>
                            <div class="btnsldr slide_item rus_text" id="dragMe" style="left: 0;">
                                Пример текста
                            </div>
                            <div id="rightCont" class="pagesldr eng_text" style="width: 53%;">
                                <div class="liquid">
                                    Example text
                                </div>
                            </div>
                            <div class="magic-border">
                                <i class="fa fa-arrows-h"></i>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>


    </div>

@endsection
