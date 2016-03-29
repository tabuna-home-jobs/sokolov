@extends('_layout/site')



@section('title', $Blog->title)
@section('description', $Blog->descript)
@section('keywords', $Blog->tag)
@section('avatar', Config::get('app.url').$Blog->avatar)


@section('content')

    <div class="container blog-container">



        <div class="col-sm-8 blog-main">


            <article class="blog-post">
                <h2 class="blog-post-title">
                    {{$Blog->name}}
                </h2>
                <p class="blog-post-meta"> {{$Blog->created_at->toDateString()}}</p>

                <main>
                    {!! $Blog->content !!}
                </main>


                <hr>

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
