@extends('_layout/site')


@section('title',trans('main.News'))



@section('content')

    <div class="container blog-container">



        <div class="col-md-8">

            <div class="page-header">
                <h4>{{trans('content.News')}}</h4>
            </div>


        @foreach($NewsList as $News)



            <div class="row">
                <div class="col-md-12 post">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>
                                <strong> <a href="{{URL::route(App::getLocale().'.news.show',$News->slug)}}"
                                            title="{{$News->title}}">{{ $News->title}}</a></strong></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 post-header-line">

                            @if(!empty($News->author))
                                <i class="fa fa-user"></i> {{$News->author}} |
                            @endif

                            <i class="fa fa-calendar"></i> {{$News->created_at->toDateString()}} |

                            @if(!empty($News->tag))
                                <i class="fa fa-tags"></i>
                                Tags :
                                @foreach(explode(',',$News->tag) as $tag)
                                    <a href="{{URL::route(App::getLocale().'.news.index',['tags' => $tag])}}" class="no-hover"><span class="label label-default">{{$tag}}</span></a>
                                @endforeach
                            @endif

                        </div>
                    </div>
                    <div class="row post-content">
                        <div class="col-md-3">
                            <div class="blog-thumbnail">

                                <a href="{{URL::route(App::getLocale().'.news.show',$News->slug)}}">
                                    <img src="{{$News->avatar}}">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-9">

                            {!! str_limit(strip_tags($News->content), $limit = 500, $end = '...') !!}

                            <p class="text-right"><a href="{{URL::route(App::getLocale().'.news.show',$News->slug)}}"> Read more <i class="fa fa-angle-double-right"></i> </a></p>
                        </div>
                    </div>
                </div>
            </div>

            <hr>



        @endforeach

        <div class="text-center">
            {!! $NewsList->render() !!}
        </div>

    </div>



        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">

            <div class="page-header">
                <h4>Теги</h4>
            </div>
            <div>
                @foreach($NewsTags as $tag)
                    <a href="{{URL::route(App::getLocale().'.news.index',['tags' => $tag])}}" class="no-hover">
                        <span class="label label-default">{{$tag}}</span>
                    </a>
                @endforeach
            </div>


        </div>


    </div>

@endsection
