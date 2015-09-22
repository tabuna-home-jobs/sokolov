@extends('_layout/site')

@section('content')


<div class="container-fluid  hidden-sm hidden-xs">

    <div class="row">





        {!! htmlBlock::getMainSlider() !!}













    </div>

</div>


<div class="container container-service">


    <div class="text-center">

        <h1>{{trans('main.Services')}}</h1>

    </div>


    <div class="bs-example" data-example-id="thumbnails-with-custom-content">
        <div class="row">


            <div class="col-sm-6 col-md-3">
                <div class="service service-edit">

                    <a href="">
                        <img class="img-hover" src="/img/service-1.png" data-altimg="/img/service-1-hover.png">

                        <h3>Редактирование</h3>
                    </a>


                    <div class="caption">
                        <p>Корректировка написанных на
                            английском языке научных рукописей
                            и устранение грамматических и
                            орфографических ошибок</p>

                    </div>
                </div>
            </div>


            <div class="col-sm-6 col-md-3">
                <div class="service service-edit">

                    <a href="">
                        <img class="img-hover" src="/img/service-2.png" data-altimg="/img/service-2-hover.png">

                        <h3>Редактирование</h3>
                    </a>


                    <div class="caption">
                        <p>Корректировка написанных на
                            английском языке научных рукописей
                            и устранение грамматических и
                            орфографических ошибок</p>

                    </div>
                </div>
            </div>


            <div class="col-sm-6 col-md-3">
                <div class="service service-edit">

                    <a href="">
                        <img class="img-hover" src="/img/service-3.png" data-altimg="/img/service-3-hover.png">

                        <h3>Редактирование</h3>
                    </a>


                    <div class="caption">
                        <p>Корректировка написанных на
                            английском языке научных рукописей
                            и устранение грамматических и
                            орфографических ошибок</p>

                    </div>
                </div>
            </div>


            <div class="col-sm-6 col-md-3">
                <div class="service service-edit">

                    <a href="">
                        <img class="img-hover" src="/img/service-4.png" data-altimg="/img/service-4-hover.png">

                        <h3>Редактирование</h3>
                    </a>


                    <div class="caption">
                        <p>Корректировка написанных на
                            английском языке научных рукописей
                            и устранение грамматических и
                            орфографических ошибок</p>

                    </div>
                </div>
            </div>


        </div>
    </div>


</div>






<div class="container why-work hidden-sm hidden-xs">


    <div class="text-center">

        <h1><span>{{trans('main.Work')}}</span></h1>

    </div>

    <div class="row">


        <div class="col-md-3  text-center">
            <h2><span>Вы:</span></h2>
        </div>

        <div class="col-md-3">
            <img class="img-responsive" src="/img/infografica-1.png">
            <p class="text-center">Заказываете Услугу</p>
            <p class="text-center"><span class="glyphicon glyphicon-arrow-down"></span></p>
        </div>

        <div class="col-md-3">
            <img class="img-responsive" src="/img/infografica-2.png">
            <p class="text-center">Заказываете Услугу</p>
            <p class="text-center"><span class="glyphicon glyphicon-arrow-down"></span></p>
        </div>

        <div class="col-md-3">
            <img class="img-responsive" src="/img/infografica-3.png">
            <p class="text-center">Заказываете Услугу</p>
            <p class="text-center"><span class="glyphicon glyphicon-arrow-down"></span></p>
        </div>

    </div>

    <div class="row">

        <div class="col-md-3 text-center">
            <h2><span>Мы:</span></h2>
        </div>

        <div class="col-md-3">
            <img class="img-responsive" src="/img/infografica-4.png">
            <p class="text-center">Заказываете Услугу</p>
        </div>

        <div class="col-md-3">
            <img class="img-responsive" src="/img/infografica-5.png">
            <p class="text-center">Заказываете Услугу</p>
        </div>

        <div class="col-md-3">
            <img class="img-responsive" src="/img/infografica-6.png">
            <p class="text-center">Заказываете Услугу</p>
        </div>


    </div>



</div>








<div class="container hidden-sm hidden-xs">


    <p class="h1-about text-center">
        <span>{{trans('main.Advantages')}}</span>
    </p>

    <ol class="text-about">


        <div class="row">
            <ol>
                <li class="li-icons-1 row"><span>1.</span>


                    У нас работают только опытные научные академические редакторы, которые являются экспертами в
                    конкретной
                    научной области.
                    Все наши редакторы – эксперты в английской грамматике, орфографии и пунктуации.

                </li>


                <li class="li-icons-2 row">
                    <span>2.</span>

                    Наши научные редакторы имеют значительный опыт работы в престижных академических научных
                    исследовательских
                    учреждениях. Наши редакторы имеют значительное количество публикации в высоко цитируемых научных
                    журналах на
                    английском языке.
                </li>

                <li class="li-icons-3 row">
                    <span>3.</span>
                    Наши научные редакторы написали, редактировали и рецензировали научные публикации и гранты.
                </li>

                <li class="li-icons-4 row">
                    <span>4.</span>
                    Мы знаем, что необходимо для публикации ваших важных научных открытий в англоязычном научном
                    журнале.
                    Языковой барьер
                    никогда не должен быть препятствием для распространения важных идей и открытий! Мы здесь, чтобы
                    помочь вам
                    добиться
                    успеха!
                </li>

                <li class="li-icons-5 row">
                    <span>5.</span>
                    Если ваши исследования не опубликованы – их никогда не было. Множество рукописей не принимаются к
                    публикации
                    из-за
                    плохого качества английского языка. Наши редакторы – эксперты английского языка. Наши редакторы –
                    научные
                    эксперты с
                    многими годами исследовательской деятельности и публикациями в престижных научных журналах.
                </li>

                <li class="li-icons-6 row">
                    <span>6.</span>
                    Мы гарантируем, что ваша статья не будет отвергнута научным журналом из-за низкого качества
                    английского
                    языка.
                    Мы повторно отредактируем вашу статью – бесплатно.
                </li>

            </ol>
        </div>

        <p class="text-center">
            <a href="/auth/login" type="button" class="btn btn-warning">{{trans('main.Order')}}</a>
        </p>

    </ol>
</div>


<div class="container hidden-xs">


    <div class="text-center">

        <h1>{{trans('main.News')}}</h1>
        <a href="{{URL::route('news.index')}}">{{trans('main.News-sub')}} <span
                    class="glyphicon glyphicon-arrow-right"></span></a>

    </div>


    <div class="news-list">
        <div class="row">

            @foreach($NewsList as $news)
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="{{$news->avatar}}">

                    <div class="caption">

                        <a href="{{URL::route('news.show',$news->slug)}}">
                            <h4>{{$news->name}}</h4></a>


                        <p> {{
                                str_limit(strip_tags($news->content), $limit = 100, $end = '...')
                            }}
                        </p>

                        <p><span class="label label-default"> {{$news->created_at}}</span></p>

                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>


</div>


<div class="container container-reviews hidden-sm hidden-xs">


    <div class="text-center">

        <h1>{{trans('main.Reviews')}}</h1>
        <a href="{{URL::route('review.index')}}">{{trans('main.Reviews-sub')}} <span
                    class="glyphicon glyphicon-arrow-right"></span></a>

    </div>


    <div class="reviews-list">
        <div class="row">


            @foreach($ReviewsList as $reviews)

            <div class="reviews-div col-sm-6 col-md-3">
                <div class="text-center">
                    <img src="{{$reviews->avatar}}" class="img-circle">

                    <div class="caption">
                        <h4>{{$reviews->name}}</h4>

                            <span>{{$reviews->dolshnost}}
                            </span>


                        <p class="date">
                            {{$reviews->created_at}}
                        </p>


                        <p class="text-justify reviews-text">
                            <i class="fa fa-quote-left fa-2x fa-pull-left"></i>
                            {{$reviews->comment}}
                            <i class="fa fa-quote-right fa-2x fa-pull-right"></i>
                        </p>


                    </div>
                </div>
            </div>
            @endforeach


        </div>


    </div>


</div>


<div class="container-fluid array-top hidden-sm hidden-xs">


    <span class="scroll-top pull-left glyphicon glyphicon-menu-up hidden-sm hidden-xs"></span>

    <span class="scroll-top pull-right glyphicon glyphicon-menu-up hidden-sm hidden-xs"></span>

    <p class="text-center">
        <a href="/auth/login" type="button" class="btn btn-warning">{{trans('main.Order')}}</a>
    </p>


</div>



@endsection