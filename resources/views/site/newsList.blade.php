@extends('_layout/site')


@section('title',trans('main.News'))



@section('content')

    <div class="container blog-container">

        @foreach($NewsList as $News)
            <article class="col-md-4 blog">

                <h4>
                    <a href="{{URL::route(App::getLocale().'.news.show',$News->slug)}}" title="{{$News->title}}">{{ str_limit($News->title,$limit = 20, $end = '...')}}</a>
                </h4>
                <hr>

                <div class="blog-thumbnail">
                    {{$News->created_at->toDateString()}}
                    <a href="{{URL::route(App::getLocale().'.news.show',$News->slug)}}">
                        <img src="{{$News->avatar}}">
                    </a>
                </div>

                <main class="blog-content text-justify">
                    {{
                        str_limit(strip_tags($News->content), $limit = 250, $end = '...')
                    }}

                </main>
            </article>
        @endforeach

            <div class="text-center">
                {!! $NewsList->render() !!}
            </div>

    </div>

@endsection
