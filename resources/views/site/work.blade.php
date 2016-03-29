@extends('_layout/site')


@section('title',trans('main.Services'))


@section('content')


    <div class="container blog-container">



        <div class="page-header text-center">
            <h2 class="text-center">Примеры работ</h2>
        </div>


        <div class="row">

                <!--Вывод статей-->
                @foreach($goodsList as $key => $gList)
                    <article class="col-md-3 col-xs-12 block-img-catalog-z">

                        <figure>
                            <figcaption>
                                <a href="{{URL::route(App::getLocale().'.trophy.show',$gList->category_id)}}">
                                    <!--Выводится иконка прибавляется к ней просто индекс-->
                                    <img src="/img/catalog/icon{{++$key}}.png" class="img-icon"  alt="{{$gList->name}}">
                                    <div class="img-wrapper">
                                        <img src="{{$gList->avatar}}" class="img-responsive-sliderback"  alt="{{$gList->name}}">

                                        <p class="catalog-img-text">
                                        {{$gList->name}}
                                        <p>

                                    </div>
                                </a>
                            </figcaption>
                        </figure>

                    </article>
                    @endforeach
                            <!--Вывод статей-->
        </div>


        <div class="container">


            <h4>Заголовок статьи на заданную тему</h4>

            <main class="blog-content">

                <p>Многообразие задач и функций редактирования, осуществляемого в практике печати, издательского дела, кино, радиовещания и телевидения, обусловило
                необходимость различать несколько видов самого процесса редактирования. В частности, выделяют научное (или специальное), литературное,
                художественное, техническое редактирование, каждое из которых имеет присущие только ему специфические черты, цели и задачи.</p>

                <p>В начальные периоды книгопечатания обязанности редактора выполнял типограф. Роль редактора возросла с 18 в., особенно с развитием периодических
                изданий. Позже редактирование становится неотъемлемым этапом подготовки научных и литературных публикаций. Наиболее сложный и деликатный вид
                редакторской работы — редактор художественных произведений. На этапе редактирования возможно осуществление прямой или скрытой политической,
                морально-этической, эстетической и прочей цензуры, в связи с чем возрастают требования к нравственным качествам редактора. Строгая редактура
                считается признаком хорошего издания. </p>

                <p> Многообразие задач и функций редактирования, осуществляемого в практике печати, издательского дела, кино, радиовещания и телевидения, обусловило
                необходимость различать несколько видов самого процесса редактирования. В частности, выделяют научное (или специальное), литературное,
                художественное, техническое редактирование, каждое из которых имеет присущие только ему специфические черты, цели и задачи. В начальные периоды
                книгопечатания обязанности редактора выполнял типограф. Роль редактора возросла с 18 в., особенно с развитием периодических изданий. Позже
                редактирование становится неотъемлемым этапом подготовки научных и литературных публикаций. Наиболее сложный и деликатный вид редакторской
                работы — редактор художественных произведений. На этапе редактирования возможно осуществление прямой или скрытой политической, морально-
                этической, эстетической и прочей цензуры, в связи с чем возрастают требования к нравственным качествам редактора. Строгая редактура считается
                признаком хорошего издания.</p>


            </main>


        </div>


    </div>







@endsection
