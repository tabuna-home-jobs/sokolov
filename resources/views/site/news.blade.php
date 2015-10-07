@extends('_layout/site')


@section('title', $News->title)
@section('description', $News->descript)
@section('keywords', $News->tag)
@section('avatar', $News->avatar)





@section('content')

    <div class="container blog-container">

        <article class="col-md-8">


            <h1>{{$News->title}}</h1>
            <hr>

            <div class="blog-thumbnail">
                <img src="{{$News->avatar}}">
            </div>

            <main class="blog-content">

                {!! $News->content !!}

            </main>


            <div class="share-post clearfix">
                <label>{{trans('content.Share')}}</label>
                <ul class="social-rounded">
                    <li><a href="http://www.facebook.com/sharer.php?u={{Request::url()}}" target="_blank"><i
                                    class="fa fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com/share?url={{Request::url()}}" target="_blank"><i
                                    class="fa fa-twitter"></i></a></li>
                    <li><a href="https://plus.google.com/share?url={{Request::url()}}" target="_blank"><i
                                    class="fa fa-google-plus"></i></a></li>
                    <li><a href="http://vkontakte.ru/share.php?url={{Request::url()}}" target="_blank"><i
                                    class="fa fa-vk"></i></a></li>
                    <li><a href="http://www.ok.ru/dk?st.cmd=addShare&st.s=1&st._surl={{Request::url()}}"
                           target="_blank"><i class="fa fa-odnoklassniki"></i></a></li>
                </ul>
            </div>


            <p class="blog-meta pull-left">{{trans('content.Tags')}}: {{$News->tag}}</p>

            <p class="blog-meta pull-right">{{$News->created_at}}</p>

        </article>


        <div class="col-sm-3 col-sm-offset-1 blog-sidebar hidden-xs hidden-sm">
            <div class="sidebar-module sidebar-module-inset">

                <h3>{{trans('content.Last news')}}</h3>
                <hr>


                @foreach($NewsList as $news)
                    <a href="{{URL::route('news.show',$news->slug)}}">
                        <h5>{{$news->name}}</h5>
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