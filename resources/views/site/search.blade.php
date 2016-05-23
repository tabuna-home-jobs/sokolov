@extends('_layout/site')


@section('content')

    <div class="container blog-container search-container">


        @if(!is_null($searchList) && !is_null($searchGoods))

            @foreach($searchList as $search)
                <article class="col-md-4 blog search-result">

                    <h4>
                        <a href="{{URL::route(App::getLocale().'.news.show',$search->slug)}}">{{ str_limit_words($search->title,$limit = 20, $end = '...')}}</a>
                    </h4>
                    <hr>

                    <div class="blog-thumbnail">
                        <a href="{{URL::route(App::getLocale().'.news.show',$search->slug)}}">
                            <img src="{{$search->avatar}}">
                        </a>
                    </div>

                    <main class="blog-content text-justify">
                        {{
                            str_limit_words(strip_tags($search->content), $limit = 200, $end = '...')
                        }}

                    </main>
                </article>

            @endforeach


            @foreach($searchGoods as $search)
                <article class="col-md-4 blog search-result">

                    <h4>
                        <a href="{{URL::route(App::getLocale().'.catalog.show',$search->slug)}}">{{ str_limit_words($search->title,$limit = 20, $end = '...')}}</a>
                    </h4>
                    <hr>

                    <div class="blog-thumbnail">
                        <a href="{{URL::route(App::getLocale().'.catalog.show',$search->slug)}}">
                            <img src="{{$search->avatar}}">
                        </a>
                    </div>

                    <main class="blog-content text-justify">
                        {{
                            str_limit_words(strip_tags($search->text), $limit = 200, $end = '...')
                        }}

                    </main>
                </article>

            @endforeach



        @else
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="error-template">
                            <h2>Not Found</h2>

                            <div class="error-details">
                                Sorry, an error has occured, Requested search not found!
                            </div>
                            <div class="error-actions">
                                <a href="/" class="btn btn-default btn-lg"><span
                                            class="glyphicon glyphicon-home"></span> Take Me Home </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif


    </div>

@endsection