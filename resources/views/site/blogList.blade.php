@extends('_layout/site')


@section('title',trans('main.Blog'))



@section('content')

    <div class="container blog-container">


        <div class="col-md-8 blog-main">

            <div class="page-header">
                <h4>{{trans('content.Resources')}}</h4>
            </div>

            @foreach($BlogList as $post)
            <article class="row blog-post">
                <h4 class="blog-post-title">
                    <a href="{{URL::route(App::getLocale().'.blog.show',$post->slug)}}">{{$post->title}}</a>
                </h4>

                @if(!is_null($post->avatar) && !empty($post->avatar))
                <div class="blog-thumbnail col-md-2">
                    <a href="{{URL::route(App::getLocale().'.blog.show',$post->slug)}}">
                        <img src="{{$post->avatar}}" class="img-responsive">
                    </a>
                </div>
                @endif

                <main class="col-md-10">
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
