@extends('_layout/site')

@section('content')


    <div class="container-fluid  hidden-sm hidden-xs">

        <div class="row">


            {!! htmlBlock::getMainSlider() !!}


        </div>

    </div>




    <div class="container-fluid">
        <div class="row backgound-grey">
            <div class="container container-service">


                <div class="text-center">


                    <h4 class="blog-container">{{trans('main.lastSlider')}}</h4>


                    <h2 class="h1-slab">{{trans('main.Services')}}</h2>

                </div>


                <div class="bs-example" data-example-id="thumbnails-with-custom-content">
                    <div class="row v-center">


                        <div class="col-sm-6 col-md-3">
                            <div class="service service-edit">

                                <a href="@if(App::getLocale() == 'ru') {{url('/ru/catalog/redaktirovanie-nauchnykh-rabot')}}@else {{url("/en/catalog/editing-of-scientific-papers")}} @endif">
                                    <img class="img-hover" src="/img/service-1.png"
                                         data-altimg="/img/service-1-hover.png" alt="{{trans('main.Editing')}}">

                                    <h3>{{trans('main.Editing')}}</h3>
                                </a>


                                <div class="caption">
                                    <p>{{trans('main.Correcting written
                             English scientific manuscripts
                             and elimination of grammar and
                             spelling mistakes')}}</p>

                                </div>

                                <a href="/{{App::getLocale() ."/samples/4"}}" class="small">
                                    {{trans('job.title')}}
                                </a>



                            </div>
                        </div>


                        <div class="col-sm-6 col-md-3">
                            <div class="service service-edit">

                                <a href="@if(App::getLocale() == 'ru') {{url('/ru/catalog/tekhnicheskiy-perevod-rabot-s-russkogo-na-angliyskiy')}}@else {{url("/en/catalog/translation-services-from-russian-to-english")}} @endif">
                                    <img class="img-hover" src="/img/service-2.png"
                                         data-altimg="/img/service-2-hover.png"  alt="{{trans('main.Translation')}}">

                                    <h3>{{trans('main.Translation')}}</h3>
                                </a>


                                <div class="caption">
                                    <p>{{trans('main.We provide technical
                             translation from Russian into
                             English')}}</p>

                                </div>


                                <a href="/{{App::getLocale() ."/samples/5"}}" class="small">
                                    {{trans('job.title')}}
                                </a>


                            </div>
                        </div>


                        <div class="col-sm-6 col-md-3">
                            <div class="service service-edit">

                                <a href="@if(App::getLocale() == 'ru') {{url('/ru/catalog/formatirovanie-nauchnykh-rabot-i-rukopisey')}}@else {{url("/en/catalog/formatting-of-scientific-papers-and-manuscripts")}} @endif">
                                    <img class="img-hover" src="/img/service-3.png"
                                         data-altimg="/img/service-3-hover.png" alt="{{trans('main.Format')}}">

                                    <h3>{{trans('main.Format')}}</h3>
                                </a>


                                <div class="caption">
                                    <p>{{trans('main.Fit manuscripts under strict
                             foreign scientific standards
                             magazines')}}</p>

                                </div>


                                <a href="/{{App::getLocale() ."/samples/6"}}" class="small">
                                    {{trans('job.title')}}
                                </a>

                            </div>
                        </div>


                        <div class="col-sm-6 col-md-3">
                            <div class="service service-edit">

                                <a href="@if(App::getLocale() == 'ru') {{url('/ru/catalog/illyustrirovanie-nauchnykh-rukopisey')}}@else {{url("/en/catalog/illustration-services-for-scientific-manuscripts")}} @endif">
                                    <img class="img-hover" src="/img/service-4.png"
                                         data-altimg="/img/service-4-hover.png"  alt="{{trans('main.illustrating')}}">

                                    <h3>{{trans('main.illustrating')}}</h3>



                                </a>


                                <div class="caption">
                                    <p>{{trans('main.Creation of scientific graphics
                             according to the illustrations
                             provided sketch or
                             description')}}</p>

                                </div>


                                <a href="/{{App::getLocale() ."/samples/7"}}" class="small">
                                    {{trans('job.title')}}
                                </a>

                            </div>
                        </div>


                    </div>
                </div>


            </div>
        </div>
    </div>








    <div class="container-fluid">
        <div class="row backgound-grey">
            <div class="container container-service">


                <div class="text-center">
                    <h2 class="h1-slab">{{trans('main.Your guarantees')}}</h2>
                </div>


                <div>
                    <div class="row">


                        <div class="col-sm-6 col-md-4">
                            <div class="service service-edit">

                                <img src="/img/guard-1.png"
                                     class="img-hover"
                                     data-altimg="/img/guard-1-hover.png"
                                     alt="{{trans('main.RELIABLE')}}">

                                <h3>{{trans("main.RELIABLE")}}</h3>


                                <div class="caption">
                                    <p>{{trans('main.RELIABLE TEXT')}}</p>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6 col-md-4">
                            <div class="service service-edit">

                                <img src="/img/otvetst-1.png"
                                     class="img-hover"
                                     data-altimg="/img/otvetst-1-hover.png"
                                     alt="{{trans('main.RESPONSIBLY')}}">

                                <h3>{{trans('main.RESPONSIBLY')}}</h3>


                                <div class="caption">
                                    <p>{{trans('main.RESPONSIBLY TEXT')}}</p>

                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6 col-md-4">
                            <div class="service service-edit">

                                <img src="/img/nadejno-1.png"
                                     class="img-hover"
                                     data-altimg="/img/nadejno-1-hover.png"
                                     alt="{{trans('main.CONVENIENTLY')}}">

                                <h3>{{trans('main.CONVENIENTLY')}}</h3>


                                <div class="caption">
                                    <p>{{trans('main.CONVENIENTLY TEXT')}}</p>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>


            </div>
        </div>
    </div>





    <div class="container hidden-sm hidden-xs">


        <p class="h1-about text-center">
            <span>{{trans('main.Advantages')}}</span>
        </p>

        <ol class="text-about row">



                    <li class="li-icons-1 row"><span>1.</span>


                        <div class="padding-small">
                            {{trans("main.We employ only experienced scientific academic editors who are experts in a particular scientific field. All our editors - experts in English grammar, spelling and punctuation.")}}
                        </div>
                    </li>


                    <li class="li-icons-2 row">
                        <span>2.</span>


                        <div class="padding-small">
                            {{trans("main.Our scientific editors have extensive experience in prestigious academic research institutions. Our editors have a significant number of highly cited publications in scientific journals in English.")}}
                        </div>
                    </li>

                    <li class="li-icons-3 row">
                        <span>3.</span>

                        <div class="padding-small-2">
                            {{trans("main.Our scientific editors wrote, edited and reviewed scientific publications and grants.")}}
                        </div>
                    </li>

                    <li class="li-icons-4 row">
                        <span>4.</span>

                        <div class="padding-small">
                            {{trans("main.We know that you need to publish your important scientific discoveries in the English-language journal. The language barrier should never be a barrier to the spread of important ideas and discoveries! We are here to help you succeed!")}}
                        </div>
                    </li>

                    <li class="li-icons-5 row">
                        <span>5.</span>

                        <div class="padding-small">
                            {{trans("main.If your research is not published - they never had. Many manuscripts are accepted for publication because of the poor quality of the English language. Our editors - experts in English. Our editors - scientific experts with many years of research and publications in prestigious scientific journals.")}}
                        </div>
                    </li>
                    @if(App::getLocale() == 'ru')

                    <li class="li-icons-6 row">
                        <span>6.</span>

                        <div class="padding-small">
                            {{trans("main.We guarantee that your paper will not be rejected by the scientific journal of the poor quality of the English language. We re-edit your article - free of charge.")}}
                        </div>
                    </li>

                        @endif

        </ol>
    </div>







    @if($ReviewsList->count())




        <div class="container-fluid">
            <div class="row backgound-grey ">

                <div class="container container-reviews hidden-sm hidden-xs">


                    <div class="text-center">

                        <h2 class="h1-slab">{{trans('main.Reviews')}}</h2>
                        <a href="{{URL::route(App::getLocale().'.review.index')}}" class="a-mack">{{trans('main.Reviews-sub')}} </a>

                    </div>


                    <div class="reviews-list">
                        <div class="row">



                            <div id="carousel-reviews" class="carousel slide slider-reviews" data-ride="carousel">

                                <div class="carousel-inner" role="listbox">


                                    @foreach($ReviewsList as $key => $reviews)
                                        <div class="item @if(!$key) active @endif">
                                            <div class="container">
                                                <div class="col-md-6 col-md-offset-3 text-center">
                                                    <div class="text-center">
                                                        @if(!is_null($reviews->avatar))
                                                        <img src="{{$reviews->avatar}}" class="img-circle" alt="{{$reviews->name}}">
                                                        @endif
                                                        <h3>{{$reviews->name}}</h3>


                                                    </div>
                                                    <ul class="fa-ul">
                                                        <li>{{$reviews->dolshnost}}</li>
                                                        <li>{{$reviews->institute}}</li>
                                                        <li>{{$reviews->country}}</li>

                                                    </ul>


                                                </div>

                                                <div class="col-md-12">

                                                    <p class="text-justify">
                                                        <i class="fa fa-quote-left fa-2x fa-pull-left"></i>
                                                        {{$reviews->comment}}
                                                        <i class="fa fa-quote-right fa-2x fa-pull-right"></i>
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>

                                <ol class="carousel-indicators">

                                    @foreach($ReviewsList as $key => $reviews)
                                        <li data-target="#carousel-reviews" data-slide-to="{{$key}}" class="@if(!$key) active @endif"></li>
                                    @endforeach
                                </ol>

                            </div>

                        </div>


                    </div>


                </div>

            </div>
        </div>





    @endif

















    @if($NewsList->count())



        <div class="container-fluid">
            <div class="row backgound-grey padding-container text-center">

                <a href="/auth/login" class="btn btn-warning">{{trans('main.Order')}}</a>

            </div>
        </div>




        <div class="container hidden-xs">





            <div class="col-md-6">
                <div class="text-center">

                    <h2 class="h1-slab">{{trans('main.Blog')}}</h2>
                    <a href="{{URL::route(App::getLocale().'.blog.index')}}" class="a-mack">Все записи блога</a>

                </div>


                <div class="news-list">
                    <div class="row">

                        @foreach($BlogsList as $blog)
                            <div class="col-sm-6 col-md-6">
                                <div class="thumbnail">
                                    <img src="{{$blog->avatar}}" alt="{{$blog->name}}">

                                    <div class="caption">

                                        <a href="{{URL::route(App::getLocale().'.blog.show',$blog->slug)}}">
                                            <h4>{{$blog->name}}</h4></a>


                                        <p> {{
                                str_limit_words(strip_tags($blog->content), $limit = 100, $end = '...')
                            }}
                                        </p>


                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>







        <div class="col-md-6">
            <div class="text-center">

                <h2 class="h1-slab">{{trans('main.News')}}</h2>
                <a href="{{URL::route(App::getLocale().'.news.index')}}" class="a-mack">{{trans('main.News-sub')}}</a>

            </div>


            <div class="news-list">
                <div class="row">

                    @foreach($NewsList as $news)
                        <div class="col-sm-6 col-md-6">
                            <div class="thumbnail">
                                <img src="{{$news->avatar}}" alt="{{$news->name}}">

                                <div class="caption">

                                    <a href="{{URL::route(App::getLocale().'.news.show',$news->slug)}}">
                                        <h4>{{$news->name}}</h4></a>


                                    <p> {{
                                str_limit_words(strip_tags($news->content), $limit = 100, $end = '...')
                            }}
                                    </p>


                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>


        </div>
    @endif





@endsection
