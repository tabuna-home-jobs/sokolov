@extends('_layout/site')


@section('title',trans('main.News'))



@section('content')

    <div class="container blog-container">



        <div class="col-sm-8 blog-main">


            @foreach($BlogList as $post)
            <article class="blog-post">
                <h2 class="blog-post-title">
                    <a href="{{URL::route(App::getLocale().'.blog.show',$post->slug)}}">{{ str_limit($post->title,$limit = 20, $end = '...')}}</a>
                </h2>
                <p class="blog-post-meta"> {{$post->created_at->toDateString()}}</p>

                @if(!is_null($post->avatar) && !empty($post->avatar))
                <div class="blog-thumbnail col-md-2">
                    <a href="{{URL::route(App::getLocale().'.blog.show',$post->slug)}}">
                        <img src="{{$post->avatar}}" class="img-responsive">
                    </a>
                </div>
                @endif

                <main>
                    {{ str_limit(strip_tags($post->content), $limit = 500, $end = '...')}}
                </main>


                <hr>

            </article>
            @endforeach


            <nav>
                {!! $BlogList->render() !!}
            </nav>

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