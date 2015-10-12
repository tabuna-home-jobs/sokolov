@extends('_layout/site')




@section('title', $Page->title)
@section('description', $Page->descript)
@section('keywords', $Page->tag)
@section('avatar', $Page->avatar)

@section('content')

    <div class="container">

<article class="col-md-8">



    <h1>{{$Page->title}}</h1>


    <main class="blog-content">

        {!! $Page->content !!}

    </main>



</article>


        <div class="col-sm-3 col-sm-offset-1 blog-sidebar hidden-xs hidden-sm">
            <div class="sidebar-module sidebar-module-inset">

                <h3>{{trans('content.Last news')}} </h3>
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
                @endforeach

            </div>
        </div>



    </div>

@endsection