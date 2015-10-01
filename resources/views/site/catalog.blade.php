@extends('_layout/site')

@section('content')


    <div class="container blog-container">


        <div class="row">

            <div class="col-md-6 hidden-sm hidden-xs">

                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <div class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators carousel-indicators-catalog">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                            <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">

                            <!--Вывод статей в слайд-->
                            @foreach($goodsList as $key => $gList)
                                <div class="item item-catalog">
                                    <img src="{{$gList->avatar}}">

                                    <div class="carousel-caption">

                                        <img src="/img/catalog/icon{{++$key}}.png"
                                             class="icon-s-caption hidden-sm hidden-xs">

                                        <h2>{{$gList->name}}</h2>

                                        <div class="text-slider-bg">
                                            {{str_limit(strip_tags($gList->text),150,'...')}}
                                        </div>

                                        <p class="m-top-10">
                                            <a href="/auth/login" type="button"
                                               class="btn btn-warning">{{trans('main.Order')}}</a>
                                            <a href="{{URL::route('catalog.show',$gList->slug)}}"
                                               class="btn btn-primary">{{trans('main.Learn More')}}</a>
                                        </p>

                                    </div>
                                </div>
                            @endforeach
                            <!--Вывод статей в слайд-->
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-md-6 col-xs-12">
                <!--Вывод статей-->
                @foreach($goodsList as $key => $gList)
                    <article class="col-md-6 col-xs-12 block-img-catalog-z">

                        <figure>


                            <figcaption>


                                <a href="{{URL::route('catalog.show',$gList->slug)}}">
                                    <!--Выводится иконка прибавляется к ней просто индекс-->
                                    <img src="/img/catalog/icon{{++$key}}.png" class="img-icon">

                                    <div class="img-wrapper">
                                        <img src="{{$gList->avatar}}" class="img-responsive-sliderback">


                                        <p class="catalog-img-text">
                                        {{$gList->name}}
                                        <p>

                                    </div>


                                </a>
                            </figcaption>

                        </figure>

                    </article>
                @endforeach
                <!--Вывод статей-->
            </div>
        </div>


        <div class="container">


            <h1>{{trans('catalog.Description of prices and terms of the services provided')}}</h1>

            <main class="blog-content">


                <h4>{{trans('catalog.Editing of scientific manuscripts')}} :</h4>


                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>{{trans('catalog.Speed')}}</th>
                            <th>{{trans('catalog.Price per word in the ruble')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{trans('catalog.Economy (7 days)')}}</td>
                            <td>0.07{{trans('catalog.* the rate of USD')}}</td>
                        </tr>


                        <tr>
                            <td>{{trans('catalog.Standard (4 days)')}}</td>
                            <td>0.08{{trans('catalog.* the rate of USD')}}</td>
                        </tr>
                        <tr>
                            <td>{{trans('catalog.Express (2 days)')}}</td>
                            <td>0.09{{trans('catalog.* the rate of USD')}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>


                <h4>{{trans('catalog.Technical translation of scientific manuscripts (including editing)')}} :</h4>


                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>{{trans('catalog.Speed')}}</th>
                            <th>{{trans('catalog.Price per word in the ruble')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{trans('catalog.Economy (10 days)')}}</td>
                            <td> 0.10{{trans('catalog.* the rate of USD')}}</td>
                        </tr>


                        <tr>
                            <td>{{trans('catalog.Standard (7 days)')}}</td>
                            <td>0.11{{trans('catalog.* the rate of USD')}}</td>
                        </tr>
                        <tr>
                            <td>{{trans('catalog.Express (4 days)')}}</td>
                            <td>0.12{{trans('catalog.* the rate of USD')}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>


                <h4>{{trans('catalog.Formatting scientific manuscripts')}} :</h4>


                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>{{trans('catalog.Word Count')}}</th>
                            <th>{{trans('catalog.Speed')}}</th>
                            <th>{{trans('catalog.Price in rubles')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            <td>0-5000</td>
                            <td>2 {{trans('catalog.day')}}</td>
                            <td>110{{trans('catalog.* the rate of USD')}}</td>
                        </tr>


                        <tr>

                            <td>5000-10000</td>
                            <td>4 {{trans('catalog.day')}}</td>
                            <td>190{{trans('catalog.* the rate of USD')}}</td>
                        </tr>
                        <tr>

                            <td>10000-15000</td>
                            <td>4-10 {{trans('catalog.day')}}</td>
                            <td>270{{trans('catalog.* the rate of USD')}}</td>
                        </tr>


                        <tr>

                            <td>>15000</td>
                            <td>-</td>
                            <td>{{trans('catalog.By agreement')}}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>


                <h4>{{trans('catalog.Illustrating scientific manuscripts')}} :</h4>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="33%">{{trans('catalog.Service')}}</th>
                            <th>{{trans('catalog.Speed')}}</th>
                            <th>{{trans('catalog.Price in rubles')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            <td>{{trans('catalog.Formatting tables and graphs (one illustration of an unlimited number of tables and charts in it)')}}</td>
                            <td>{{trans('catalog.By agreement')}}</td>
                            <td>80{{trans('catalog.* the rate of USD')}}</td>
                        </tr>


                        <tr>

                            <td>{{trans('catalog.Creating an original illustration')}}</td>
                            <td>{{trans('catalog.By agreement')}}</td>
                            <td>{{trans('catalog.By agreement')}}</td>
                        </tr>


                        </tbody>
                    </table>
                </div>


            </main>


        </div>


    </div>







@endsection
