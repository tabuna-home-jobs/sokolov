@extends('_layout/site')


@section('title',trans('main.Services'))


@section('content')


    <div class="container blog-container">



        <div class="page-header text-center">
            <h2 class="text-center">{{trans('job.title')}}</h2>
        </div>


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

        <div class="container">



            <main class="blog-content">

                <p>{!! trans('job.main') !!}</p>




                <h4>{{trans('job.title-editing')}}</h4>
                <p>{!! trans('job.editing') !!}}</p>



                <h4>{{trans('job.title-translation')}}</h4>
                <p>{!! trans('job.translation') !!}</p>


                <h4>{{trans('job.title-formatting')}}</h4>
                <p>{!! trans('job.formatting') !!}}</p>



                <h4>{{trans('job.title-illustration')}}</h4>
                <p>{!! trans('job.illustration') !!}}</p>



            </main>


        </div>


    </div>







@endsection
