@extends('_layout/site')


@section('title', $News->title)
@section('description', $News->descript)
@section('keywords', $News->tag)
@section('avatar', Config::get('app.url').$News->avatar)





@section('content')

    <div class="container blog-container">

        <article class="col-md-8">


            <h1>{{$News->name}}</h1>
            <hr>
            <h5 class="date">
                <small>{{$News->created_at->toDateString()}}</small>
            </h5>
            <div class="blog-thumbnail">
                <img src="{{$News->avatar}}">
            </div>

            <main class="blog-content">

                {!! $News->content !!}

            </main>

        </article>


        <div class="col-sm-3 col-sm-offset-1 blog-sidebar hidden-xs hidden-sm">
            <div class="sidebar-module sidebar-module-inset">

                <h3>{{trans('content.Last news')}}</h3>
                <hr>


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


    </div>

@endsection