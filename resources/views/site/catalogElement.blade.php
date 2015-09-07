@extends('_layout/site')

@section('content')


    <div class="container">

        <div class="row">

            <div class="col-md-12 hidden-sm hidden-xs">

                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <div class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators carousel-indicators-catalog">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                            <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="/img/catalog/element-slider.png">

                                <div class="carousel-caption carousel-caption-element">
                                    <img src="/img/catalog/slider-logo.png">

                                    <div class="carousel-caption-element-bg">
                                        <h2>Заголовок слайда2</h2>

                                        <p>
                                            Включает корректировку уже написанных на английском
                                            языке рукописей и устранение грамматических и
                                            орфографических ошибок
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="item ">
                                <img src="/img/catalog/element-slider.png">

                                <div class="carousel-caption carousel-caption-element">
                                    <img src="/img/catalog/slider-logo.png">

                                    <div class="carousel-caption-element-bg">
                                        <h2>Заголовок слайда2</h2>

                                        <p>
                                            Включает корректировку уже написанных на английском
                                            языке рукописей и устранение грамматических и
                                            орфографических ошибок
                                        </p>
                                    </div>


                                </div>
                            </div>
                            <div class="item ">
                                <img src="/img/catalog/element-slider.png">

                                <div class="carousel-caption carousel-caption-element">
                                    <img src="/img/catalog/slider-logo.png">

                                    <div class="carousel-caption-element-bg">
                                        <h2>Заголовок слайда2</h2>

                                        <p>
                                            Включает корректировку уже написанных на английском
                                            языке рукописей и устранение грамматических и
                                            орфографических ошибок
                                        </p>
                                    </div>


                                </div>
                            </div>
                            <div class="item ">
                                <img src="/img/catalog/element-slider.png">

                                <div class="carousel-caption carousel-caption-element">
                                    <img src="/img/catalog/slider-logo.png">

                                    <div class="carousel-caption-element-bg">
                                        <h2>Заголовок слайда2</h2>

                                        <p>
                                            Включает корректировку уже написанных на английском
                                            языке рукописей и устранение грамматических и
                                            орфографических ошибок
                                        </p>
                                    </div>


                                </div>
                            </div>
                        </div>


                        <a class="left carousel-control carousel-control-element" href="#carousel-example-generic"
                           role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control carousel-control-element" href="#carousel-example-generic"
                           role="button" data-slide="next">
                            <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>


                    </div>
                </div>

            </div>

        </div>


        <div class="container blog-container">

            <h1>{{$Goods->name}}</h1>
            <main class="blog-content">
                {!!$Goods->text!!}
            </main>


        </div>


    </div>







@endsection
