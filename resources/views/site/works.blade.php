@extends('_layout/site')


@section('title',trans('main.Services'))


@section('content')


    <div class="container blog-container">



        <div class="page-header text-center">
            <h2 class="text-center">Примеры работ</h2>
        </div>



        <div class="row">

             @foreach($Works as $key =>$good)

                 @if($key < 4)
                <div class="col-md-3">
                    <div class="row finish-work">
                        <p class="text-center"><i class="fa fa-file-text-o"></i></p>

                        <p class="title">{{$good->name}}</p>
                        <span class="aftor">Автор: {{$good->author}}</span>

                        <div>
                            <time>{{$good->created_at->toDateString()}}</time>
                            <a class="gettext" data-expl_id="{{$good->id}}"  data-toggle="collapse" href="#collapse" aria-expanded="false"><i class="fa fa-eye"></i></a>
                            <!--<a href="#"><i class="fa fa-download"></i></a> -->
                        </div>
                    </div>

                </div>

                @if(($key+1) % 4 == 0)
                    <div class="clearfix"></div>
                @endif

                @endif
            @endforeach

            <div class="collapse col-xs-12  in" id="collapse">
                <div class="wrap-slide-text col-sm-12 hidden-xs">
                    <div id="mainSlider" class="slider">
                        <div id="leftCont" class="pagesldr">
                        </div>
                        <div class="btnsldr slide_item rus_text" id="dragMe" style="left: 0;">


                            <div class="well-lg">
                                Для использования этой функции просмотра, пожалуйста, нажмите,
                                удерживайте и горизонтально перетащите оранжевый овал слева
                                направо или наоборот.
                            </div>

                        </div>
                        <div id="rightCont" class="pagesldr eng_text" style="width: 53%;">
                            <div class="liquid">


                                <div class="well-lg">
                                    To use this viewing feature, please press, hold
                                    and horizontally drag the orange oval from
                                    left to right or vice versa.

                                    </div>
                            </div>
                        </div>
                        <div class="magic-border">
                            <i class="fa fa-arrows-h"></i>
                        </div>
                    </div>
                </div>
            </div>




                 @foreach($Works as $key =>$good)

                     @if($key > 3)
                         <div class="col-md-3">
                             <div class="row finish-work">
                             <p class="text-center"><i class="fa fa-file-text-o"></i></p>

                             <p class="title">{{$good->name}}</p>
                             <span class="aftor">Автор: {{$good->author}}</span>

                             <div>
                                 <time>{{$good->created_at->toDateString()}}</time>
                                 <a class="gettext" data-expl_id="{{$good->id}}"  data-toggle="collapse" href="#collapse" aria-expanded="false"><i class="fa fa-eye"></i></a>
                                 <!--<a href="#"><i class="fa fa-download"></i></a> -->
                             </div>
                                 </div>


                         </div>

                         @if(($key+1) % 4 == 0)
                             <div class="clearfix"></div>
                         @endif

                     @endif
                 @endforeach






        </div>


        <div class="row">

            <div class="text-center">
                {!! $Works->render() !!}
            </div>
            </div>



    </div>







@endsection
