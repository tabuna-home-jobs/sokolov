@extends('_layout/site')


@section('title',trans('main.News'))
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

            @foreach($NewsList as $news)
                <a href="{{URL::route(App::getLocale().'.news.show',$news->slug)}}">
                    <h5>{{$news->name}}</h5>
                </a>

                <hr>
                <h5 class="date">
                    <small>{{$news->created_at->toDateString()}}</small>
                </h5>

                <a href="{{URL::route(App::getLocale().'.news.show',$news->slug)}}">
                    <img class="img-respinsive" src="{{$news->avatar}}">
                </a>
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