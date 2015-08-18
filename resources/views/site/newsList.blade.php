@extends('_layout/site')








@section('content')

    <div class="container blog-container">

        @foreach($NewsList as $News)
            <article class="col-md-4 blog">

                <h4>
                    <a href="{{URL::route('news.show',$News->slug)}}">{{ str_limit($News->title,$limit = 20, $end = '...')}}</a>
                </h4>
                <hr>

                <div class="blog-thumbnail">
                    <a href="{{URL::route('news.show',$News->slug)}}">
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


        {!! $NewsList->render() !!}


    </div>

@endsection