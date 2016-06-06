@extends('_layout/site')


@section('title',trans('main.Services'))


@section('content')

    <div class="container blog-container">


        <div class="row v-center">


            <div class="col-xs-12">
                <!--Вывод статей-->
                @foreach($goodsList as $key => $gList)



                    <div class="col-sm-6 col-md-3">
                        <div class="service service-edit">

                            <a href="{{URL::route(App::getLocale().'.catalog.show',$gList->slug)}}">
                                <img class="img-hover" src="{{$gList->avatar}}"
                                     data-altimg="{{$gList->icon}}" alt="{{$gList->name}}">

                                <h4>{{$gList->name}}</h4>
                            </a>

                        </div>
                    </div>








                {{-- <article class="col-md-3 col-sm-6 col-xs-12 block-img-catalog-z">

                     <figure>


                         <figcaption>


                             <a href="{{URL::route(App::getLocale().'.catalog.show',$gList->slug)}}">
                                 <!--Выводится иконка прибавляется к ней просто индекс-->
                                 <img src="/img/catalog/icon{{++$key}}.png" class="img-icon"  alt="{{$gList->name}}">

                                 <div class="img-wrapper">
                                     <img src="{{$gList->avatar}}" class="img-responsive-sliderback"  alt="{{$gList->name}}">


                                     <p class="catalog-img-text">
                                     {{$gList->name}}
                                     <p>

                                 </div>


                             </a>
                         </figcaption>

                     </figure>

                 </article> --}}
                    @endforeach
                            <!--Вывод статей-->

            </div>
        </div>


        <div class="container" id="price">


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
                            <td>@if(App::getLocale() == 'en')
                                    0.07 @else {{ number_format(round( 0.07 * CurrencyRate::getOneRecord(), 2),2, '.', ' ')}} @endif</td>
                        </tr>


                        <tr>
                            <td>{{trans('catalog.Standard (4 days)')}}</td>
                            <td>@if(App::getLocale() == 'en')
                                    0.08 @else {{  number_format(round( 0.08 * CurrencyRate::getOneRecord(),2),2, '.', ' ')}} @endif</td>
                        </tr>
                        <tr>
                            <td>{{trans('catalog.Express (2 days)')}}</td>
                            <td>@if(App::getLocale() == 'en')
                                    0.09 @else {{  number_format(round( 0.09 * CurrencyRate::getOneRecord(),2),2, '.', ' ')}} @endif</td>
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
                            <td> @if(App::getLocale() == 'en')
                                    0.10 @else {{ number_format(round( 0.10 * CurrencyRate::getOneRecord(),2),2, '.', ' ')}} @endif</td>
                        </tr>


                        <tr>
                            <td>{{trans('catalog.Standard (7 days)')}}</td>
                            <td>@if(App::getLocale() == 'en')
                                    0.11 @else {{ number_format(round( 0.11 * CurrencyRate::getOneRecord(),2),2, '.', ' ')}} @endif</td>
                        </tr>
                        <tr>
                            <td>{{trans('catalog.Express (4 days)')}}</td>
                            <td>@if(App::getLocale() == 'en')
                                    0.12 @else {{ number_format(round( 0.12 * CurrencyRate::getOneRecord(),2),2, '.', '')}} @endif</td>
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
                            <td>@if(App::getLocale() == 'en')
                                    110 @else {{ number_format(round( 110 * CurrencyRate::getOneRecord(),2),2, '.', ' ')}} @endif</td>
                        </tr>


                        <tr>

                            <td>5000-10000</td>
                            <td>4 {{trans('catalog.day')}}</td>
                            <td>@if(App::getLocale() == 'en')
                                    190 @else {{ number_format(round( 190 * CurrencyRate::getOneRecord(),2),2, '.', ' ')}} @endif</td>
                        </tr>
                        <tr>

                            <td>10000-15000</td>
                            <td>4-10 {{trans('catalog.day')}}</td>
                            <td>@if(App::getLocale() == 'en')
                                    270 @else {{ number_format(round( 270 * CurrencyRate::getOneRecord(),2),2, '.', ' ')}} @endif</td>
                        </tr>


                        <tr>

                            <td>>15000</td>
                            <td>{{trans('catalog.By agreement')}}</td>
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
                            <td>@if(App::getLocale() == 'en')
                                    80 @else {{  number_format(round(  80 * CurrencyRate::getOneRecord(),2),2, '.', ' ')}} @endif</td>
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
