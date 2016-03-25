@extends('_layout/site')


@section('title',trans('main.Services'))


@section('content')


    <div class="container blog-container">


        <h2 class="text-center">Готовые работы </h2>



        <div class="row">

             @foreach($Works as $key =>$good)

                <div class="col-md-3 finish-work">
                    <p class="text-center"><i class="fa fa-file-text-o"></i></p>

                    <p class="title">{{$good->name}}</p>
                    <span class="aftor">Автор: {{$good->author}}</span>

                    <div>
                        <time>{{$good->created_at}}</time>
                        <a class="gettext" data-expl_id="{{$good->id}}"  data-toggle="collapse" href="#collapse" aria-expanded="false"><i class="fa fa-eye"></i></a>
                        <a href="#"><i class="fa fa-download"></i></a>
                    </div>

                </div>

                @if(($key+1) % 4 == 0)
                    <div class="clearfix"></div>
                @endif
            @endforeach

            <div class="collapse col-xs-12 row in" id="collapse">
                <div class="wrap-slide-text col-sm-12 hidden-xs">
                    <div id="mainSlider" class="slider">
                        <div id="leftCont" class="pagesldr">
                        </div>
                        <div class="btnsldr slide_item rus_text" id="dragMe" style="left: 0;">
                            Многообразие задач и функций редактирования, осуществляемого в практике печати, издательского дела, кино, радиовещания и телевидения, обусловило
                            необходимость различать несколько видов самого процесса редактирования. В частности, выделяют научное (или специальное), литературное,
                            художественное, техническое редактирование, каждое из которых имеет присущие только ему специфические черты, цели и задачи.

                            В начальные периоды книгопечатания обязанности редактора выполнял типограф. Роль редактора возросла с 18 в., особенно с развитием периодических
                            изданий. Позже редактирование становится неотъемлемым этапом подготовки научных и литературных публикаций. Наиболее сложный и деликатный вид
                            редакторской работы — редактор художественных произведений. На этапе редактирования возможно осуществление прямой или скрытой политической,
                            морально-этической, эстетической и прочей цензуры, в связи с чем возрастают требования к нравственным качествам редактора. Строгая редактура
                            считается признаком хорошего издания.

                            Многообразие задач и функций редактирования, осуществляемого в практике печати, издательского дела, кино, радиовещания и телевидения, обусловило
                            необходимость различать несколько видов самого процесса редактирования. В частности, выделяют научное (или специальное), литературное,
                            художественное, техническое редактирование, каждое из которых имеет присущие только ему специфические черты, цели и задачи. В начальные периоды
                            книгопечатания обязанности редактора выполнял типограф. Роль редактора возросла с 18 в., особенно с развитием периодических изданий. Позже
                            редактирование становится неотъемлемым этапом подготовки научных и литературных публикаций. Наиболее сложный и деликатный вид редакторской
                            работы — редактор художественных произведений.

                        </div>
                        <div id="rightCont" class="pagesldr eng_text" style="width: 53%;">
                            <div class="liquid">
                                The variety of tasks and editing functions are implemented in practice, printing, publishing, cinema, radio and television, has caused
                                the need to distinguish between several types of the editing process. In particular, isolated scientific (or special), literary,
                                artistic, technical editing, each of which is unique to his specific features, aims and objectives.

                                In the initial period of printing Acting Editor perform printer. The role of the editor has increased from 18 in., Especially with the development of periodic
                                publications. Later editing is an essential step in the preparation of scientific and literary publications. The most complex and delicate appearance
                                editorial work - editor of works of art. At the editing stage may exercise directly or indirectly political,
                                moral and ethical, aesthetic and other censorship, and therefore increase the requirements for moral qualities editor. Strict splicing
                                It considered a sign of a good publication.

                                The variety of tasks and editing functions are implemented in practice, printing, publishing, cinema, radio and television, has caused
                                the need to distinguish between several types of the editing process. In particular, isolated scientific (or special), literary,
                                artistic, technical editing, each of which is unique to his specific features, aims and objectives. In the initial period
                                Acting editor of printing performed typographer. The role of the editor has increased from 18 in., Especially with the development of periodicals. Later
                                editing is an essential step in the preparation of scientific and literary publications. The most complex and delicate kind of editorial
                                work - editor of works of art. At the editing stage may exercise directly or indirectly a political, moral and
                                ethical, aesthetic and other censorship, and therefore increase the requirements for moral qualities editor. Strict splicing considered
                                a sign of good publications.
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







@endsection
