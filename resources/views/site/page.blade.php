@extends('_layout/site')


@section('title', $Page->title)
@section('description', $Page->descript)
@section('keywords', $Page->tag)
@section('avatar', Config::get('app.url').$Page->avatar)

@section('content')

    <div class="container">

        <article class="col-md-8">


            <h1>{{$Page->name}}</h1>

            <main class="blog-content">

                {!! $Page->content !!}

            </main>





            <div class="pull-right">
                <a onClick='window.open ("http://www.facebook.com/sharer.php?u={{Request::url()}}","mywindow","menubar=1,resizable=1,width=650,height=550");' class="btn btn-icon"><i class="fa fa-facebook"></i></a>

                <a onClick='window.open ("https://twitter.com/share?url={{Request::url()}}","mywindow","menubar=1,resizable=1,width=650,height=550");'
                   class="btn btn-icon"><i class="fa fa-twitter"></i></a>

                <a onClick='window.open ("https://plus.google.com/share?url={{Request::url()}}","mywindow","menubar=1,resizable=1,width=650,height=550");'
                   class="btn btn-icon"><i class="fa fa-google-plus"></i></a>

                <a onClick='window.open ("http://vk.com/share.php?url={{Request::url()}}","mywindow","menubar=1,resizable=1,width=650,height=550");'
                   class="btn btn-icon"><i class="fa fa-vk"></i></a>

                <a onClick='window.open ("http://www.ok.ru/dk?st.cmd=addShare&st.s=1&st._surl={{Request::url()}}","mywindow","menubar=1,resizable=1,width=650,height=550");'
                   class="btn btn-icon"><i class="fa fa-odnoklassniki"></i></a>
            </div>



        </article>


        <div class="col-sm-3 col-sm-offset-1 blog-sidebar hidden-xs hidden-sm">
            <div class="sidebar-module sidebar-module-inset">

                <h3>{{trans('content.Last news')}} </h3>
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
                            str_limit_words(strip_tags($news->content), $limit = 100, $end = '...')
                        }}
                    </p>
                @endforeach

            </div>
        </div>


    </div>

@endsection