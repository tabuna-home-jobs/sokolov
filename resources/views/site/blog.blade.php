@extends('_layout/site')



@section('title', $Blog->title)
@section('description', $Blog->descript)
@section('keywords', $Blog->tag)
@section('avatar', Config::get('app.url').$Blog->avatar)


@section('content')

    <div class="container blog-container">



        <div class="col-sm-8 blog-main">


            <article class="blog-post">


                <div class="page-header">
                    <h1>{{$Blog->name}}</h1>

                    @if(!empty($Blog->author))
                        <i class="fa fa-user"></i> {{$Blog->author}} |
                    @endif
                    <small><i class="fa fa-calendar"></i> {{$Blog->created_at->toDateString()}} </small>
                </div>


                <main>
                    {!! $Blog->content !!}
                </main>


                <hr>


                @if(!empty($Blog->tag))
                    <small class="">  <i class="fa fa-tags"></i>
                        {{trans('content.Tags')}} :
                        @foreach(explode(',',$Blog->tag) as $tag)
                            <a href="{{URL::route(App::getLocale().'.blog.index',['tags' => $tag])}}" class="no-hover"><span class="label label-default">{{$tag}}</span></a>
                        @endforeach
                    </small>
                @endif






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


        </div>


        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">

            <div class="page-header">
                <h4>{{trans('content.Tags')}}</h4>
            </div>
            <div>
                @foreach($TagList as $tag)
                    <a href="{{URL::route(App::getLocale().'.blog.index',['tags' => $tag])}}" class="no-hover">
                        <span class="label label-default">{{$tag}}</span>
                    </a>
                @endforeach
            </div>

            <div class="page-header">
                <h4>{{trans('content.News')}}</h4>
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
                        str_limit_words(strip_tags($news->content), $limit = 100, $end = '...')
                    }}
                </p>
                <hr>
            @endforeach


        </div>








    </div>

@endsection
