@extends('_layout/site')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="error-template">
                    <h2>{{trans('404.Not Found')}}</h2>

                    <div class="error-details">
                        {{trans('404.Sorry, an error has occured, Requested search not found!')}}
                    </div>


                    <div class="error-actions">
                        <a href="/" class="btn btn-default btn-lg"><span
                                    class="glyphicon glyphicon-home"></span> {{trans('404.Take Me Home ')}} </a>
                    </div>

                    <p>{{trans('404.Select the desired section of the sitemap that is located below')}}</p>


                    <div class="row text-left">


                        <hr>

                        <div class="col-md-6">

                            <h2>{{trans('404.Main')}}</h2>
                            @if(App::getLocale() == 'en')
                                @foreach(Menu::getLINoTemplate('english-top-menu') as $menu)

                                    @if($menu->getParent->count() > 0)
                                        <li><a href="{{$menu->link}}"> {{$menu->label}}</a></li>
                                        <ul>
                                            @foreach($menu->getParent as $items)
                                                <li><a href="{{$items->link}}"> {{$items->label}}</a></li>
                                            @endforeach
                                        </ul>

                                    @else
                                        <li><a href="{{$menu->link}}"> {{$menu->label}}</a></li>
                                    @endif

                                @endforeach


                            @else
                                @foreach(Menu::getLINoTemplate('russian-top-menu') as $menu)

                                    @if($menu->getParent->count() > 0)
                                        <li><a href="{{$menu->link}}"> {{$menu->label}}</a></li>
                                        <ul>
                                            @foreach($menu->getParent as $items)
                                                <li><a href="{{$items->link}}"> {{$items->label}}</a></li>
                                            @endforeach
                                        </ul>

                                    @else
                                        <li><a href="{{$menu->link}}"> {{$menu->label}}</a></li>
                                    @endif


                                @endforeach


                            @endif


                            <h2>{{trans('404.Pages')}}</h2>
                            <ul>
                                @foreach($pages as $item)
                                    <li><a href="{{$item['url']}}"> {{$item['name']}}</a></li>
                                @endforeach
                            </ul>

                        </div>


                        <div class="col-md-6">

                            <h2>{{trans('404.News')}}</h2>
                            <ul>
                                @foreach($news as $item)
                                    <li><a href="{{$item['url']}}"> {{$item['name']}}</a></li>
                                @endforeach
                            </ul>
                        </div>

                    </div>


                </div>


            </div>
        </div>
    </div>

@endsection