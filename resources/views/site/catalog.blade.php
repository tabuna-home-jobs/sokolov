@extends('_layout/site')


@section('title',trans('main.Services'))


@section('content')


    <div class="container blog-container">


        <div class="row v-center">


            <div class="col-xs-12">
                <!--Вывод статей-->
                @foreach($goodsList as $key => $gList)



                    <div class="col-sm-6 col-md-3 col-xs-6">
                        <div class="service service-edit">

                            <a href="{{URL::route(App::getLocale().'.catalog.show',$gList->slug)}}">
                                <img class="img-hover" src="{{$gList->avatar}}"
                                     data-altimg="{{$gList->icon}}" alt="{{$gList->name}}">

                                <h3>{{$gList->name}}</h3>
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

            <main class="blog-content v-center">

            <div class="col-md-6 col-xs-12">
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
                                  {{$goods['4-attr']['Economy']}}  @else {{ number_format(round( $goods['4-attr']['Economy'] * CurrencyRate::getOneRecord(), 2),2, '.', ' ')}} @endif</td>
                        </tr>


                        <tr>
                            <td>{{trans('catalog.Standard (4 days)')}}</td>
                            <td>@if(App::getLocale() == 'en')
                                    {{$goods['4-attr']['Standard']}} @else {{  number_format(round( $goods['4-attr']['Standard'] * CurrencyRate::getOneRecord(),2),2, '.', ' ')}} @endif</td>
                        </tr>
                        <tr>
                            <td>{{trans('catalog.Express (2 days)')}}</td>
                            <td>@if(App::getLocale() == 'en')
                                    {{$goods['4-attr']['Express']}} @else {{  number_format(round( $goods['4-attr']['Express'] * CurrencyRate::getOneRecord(),2),2, '.', ' ')}} @endif</td>
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
                                    {{$goods['5-attr']['Economy']}}  @else {{ number_format(round( $goods['5-attr']['Economy'] * CurrencyRate::getOneRecord(),2),2, '.', ' ')}} @endif</td>
                        </tr>


                        <tr>
                            <td>{{trans('catalog.Standard (7 days)')}}</td>
                            <td>@if(App::getLocale() == 'en')
                                    {{$goods['5-attr']['Standard']}}   @else {{ number_format(round( $goods['5-attr']['Standard'] * CurrencyRate::getOneRecord(),2),2, '.', ' ')}} @endif</td>
                        </tr>
                        <tr>
                            <td>{{trans('catalog.Express (4 days)')}}</td>
                            <td>@if(App::getLocale() == 'en')
                                    {{$goods['5-attr']['Express']}}   @else {{ number_format(round( $goods['5-attr']['Express'] * CurrencyRate::getOneRecord(),2),2, '.', '')}} @endif</td>
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
                                    {{$goods['6-attr']['0-5000']}}  @else {{ number_format(round(  $goods['6-attr']['0-5000'] * CurrencyRate::getOneRecord(),2),2, '.', ' ')}} @endif</td>
                        </tr>


                        <tr>

                            <td>5000-10000</td>
                            <td>4 {{trans('catalog.day')}}</td>
                            <td>@if(App::getLocale() == 'en')
                                    {{$goods['6-attr']['5000-10000']}}  @else {{ number_format(round( $goods['6-attr']['5000-10000'] * CurrencyRate::getOneRecord(),2),2, '.', ' ')}} @endif</td>
                        </tr>
                        <tr>

                            <td>10000-15000</td>
                            <td>4-10 {{trans('catalog.day')}}</td>
                            <td>@if(App::getLocale() == 'en')
                                    {{$goods['6-attr']['10000-15000']}}  @else {{ number_format(round(  $goods['6-attr']['10000-15000'] * CurrencyRate::getOneRecord(),2),2, '.', ' ')}} @endif</td>
                        </tr>


                        <tr>

                            <td>>15000</td>
                            <td>{{trans('catalog.By agreement')}}</td>
                            <td>{{trans('catalog.By agreement')}}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>


                </div>

                <div class="col-md-6 hidden-xs">
                    <div class="calculate-wrapper">
                        @widget('calcucator',$key)
                    </div>
                </div>



            </main>


            <div class="table-padder">
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
                                {{$goods['7']->price}} @else {{  number_format(round(  80 * CurrencyRate::getOneRecord(),2),2, '.', ' ')}} @endif</td>
                    </tr>


                    <tr>

                        <td>{{trans('catalog.Creating an original illustration')}}</td>
                        <td>{{trans('catalog.By agreement')}}</td>
                        <td>{{trans('catalog.By agreement')}}</td>
                    </tr>


                    </tbody>
                </table>
            </div>
</div>



            <div class="row text-center">
                <a href="/{{App::getLocale()}}/feedback" class="btn btn-warning btn-big">{{trans('calc.Outside your budget?')}}</a>
            </div>



        </div>


    </div>







@endsection
