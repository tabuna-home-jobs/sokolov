@extends('_layout/site')

@section('content')


    <div class="container">


        <div class="row">

            <div class="col-md-6 hidden-sm hidden-xs">

                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <div class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators carousel-indicators-catalog">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                            <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">

                            <!--Вывод статей в слайд-->
                            @foreach($goodsList as $key => $gList)
                                <div class="item item-catalog">
                                    <img src="{{$gList->avatar}}">

                                    <div class="carousel-caption">
                                        <h2>{{$gList->name}}</h2>

                                        <div class="text-slider-bg">
                                            {{str_limit(strip_tags($gList->text),150,'...')}}
                                        </div>

                                        <p>
                                            <button class="btn btn-warning">Заказать услугу</button>
                                            <button class="btn btn-primary">
                                                <a href="{{URL::route('catalog.show',$gList->slug)}}">
                                                    Узнать больше
                                                </a>
                                            </button>
                                        </p>

                                    </div>
                                </div>
                            @endforeach
                            <!--Вывод статей в слайд-->
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-md-6 col-xs-12">
                <!--Вывод статей-->
                @foreach($goodsList as $key => $gList)
                    <article class="col-md-6 col-xs-6">
                        <figure>
                            <!--Выводится иконка прибавляется к ней просто индекс-->
                            <img src="/img/catalog/icon{{++$key}}.png" class="img-icon hidden-sm hidden-xs">
                            <div class="img-wrapper">
                                <img src="{{$gList->avatar}}" class="img-responsive-sliderback">
                            </div>
                            <figcaption>
                                <a href="{{URL::route('catalog.show',$gList->slug)}}">
                                    {{$gList->name}}
                                </a>
                            </figcaption>
                        </figure>
                    </article>
                @endforeach
                <!--Вывод статей-->
            </div>
        </div>


        <div class="container blog-container">


            <h1>Заголовок статьи на заданную тему</h1>

            <main class="blog-content">

                <p>
                    Многообразие задач и функций редактирования, осуществляемого в практике печати, издательского дела,
                    кино, радиовещания и телевидения, обусловило
                    необходимость различать несколько видов самого процесса редактирования. В частности, выделяют
                    научное (или специальное), литературное,
                    художественное, техническое редактирование, каждое из которых имеет присущие только ему
                    специфические черты, цели и задачи.</p>

                <p> В начальные периоды книгопечатания обязанности редактора выполнял типограф. Роль редактора возросла
                    с 18 в., особенно с развитием периодических
                    изданий. Позже редактирование становится неотъемлемым этапом подготовки научных и литературных
                    публикаций. Наиболее сложный и деликатный вид
                    редакторской работы — редактор художественных произведений. На этапе редактирования возможно
                    осуществление прямой или скрытой политической,
                    морально-этической, эстетической и прочей цензуры, в связи с чем возрастают требования к
                    нравственным качествам редактора. Строгая редактура
                    считается признаком хорошего издания.</p>

                <p>Многообразие задач и функций редактирования, осуществляемого в практике печати, издательского дела,
                    кино, радиовещания и телевидения, обусловило
                    необходимость различать несколько видов самого процесса редактирования. В частности, выделяют
                    научное (или специальное), литературное,
                    художественное, техническое редактирование, каждое из которых имеет присущие только ему
                    специфические черты, цели и задачи. В начальные периоды
                    книгопечатания обязанности редактора выполнял типограф. Роль редактора возросла с 18 в., особенно с
                    развитием периодических изданий. Позже
                    редактирование становится неотъемлемым этапом подготовки научных и литературных публикаций. Наиболее
                    сложный и деликатный вид редакторской
                    работы — редактор художественных произведений. На этапе редактирования возможно осуществление прямой
                    или скрытой политической, морально-
                    этической, эстетической и прочей цензуры, в связи с чем возрастают требования к нравственным
                    качествам редактора. Строгая редактура считается
                    признаком хорошего издания.
                </p>

            </main>


        </div>


    </div>







@endsection
