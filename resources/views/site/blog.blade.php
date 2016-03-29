@extends('_layout/site')



@section('title', $Blog->title)
@section('description', $Blog->descript)
@section('keywords', $Blog->tag)
@section('avatar', Config::get('app.url').$Blog->avatar)


@section('content')

    <div class="container blog-container">



        <div class="col-sm-8 blog-main">


            <article class="blog-post">


                <div class="page-header">
                    <h1>{{$Blog->name}}</h1>

                    @if(!empty($Blog->author))
                        <i class="fa fa-user"></i> {{$Blog->author}} |
                    @endif
                    <small><i class="fa fa-calendar"></i> {{$Blog->created_at->toDateString()}} </small>
                </div>


                <main>
                    {!! $Blog->content !!}
                </main>


                <hr>


                @if(!empty($Blog->tag))
                    <small class="">  <i class="fa fa-tags"></i>
                        Tags :
                        @foreach(explode(',',$Blog->tag) as $tag)
                            <a href="{{URL::route(App::getLocale().'.blog.index',['tags' => $tag])}}" class="no-hover"><span class="label label-default">{{$tag}}</span></a>
                        @endforeach
                    </small>
                @endif

            </article>


        </div>


        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">

            <div class="page-header">
                <h4>Теги</h4>
            </div>
            <div>
                @foreach($TagList as $tag)
                    <a href="{{URL::route(App::getLocale().'.blog.index',['tags' => $tag])}}" class="no-hover">
                        <span class="label label-default">{{$tag}}</span>
                    </a>
                @endforeach
            </div>

            <div class="page-header">
                <h4>Новости</h4>
            </div>
            @foreach($NewsList as $news)
                <a href="{{URL::route(App::getLocale().'.news.show',$news->slug)}}">
                    <h5>{{$news->name}}</h5>
                </a>
                <h5 class="date">
                    <small>{{$news->created_at->toDateString()}}</small>
                </h5>
                <p>
                    {{
                        str_limit(strip_tags($news->content), $limit = 100, $end = '...')
                    }}
                </p>
                <hr>
            @endforeach


        </div>








    </div>

@endsection
