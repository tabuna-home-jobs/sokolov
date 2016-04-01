@extends('_layout/site')


@section('title',trans('main.Services'))


@section('content')


    <div class="container blog-container">



        <div class="page-header text-center">
            <h2 class="text-center">Примеры работ</h2>
        </div>


        <div class="row">

                <!--Вывод статей-->
                @foreach($goodsList as $key => $gList)
                    <article class="col-md-3 col-xs-12 block-img-catalog-z">

                        <figure>
                            <figcaption>
                                <a href="{{URL::route(App::getLocale().'.trophy.show',$gList->category_id)}}">
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

                    </article>
                    @endforeach
                            <!--Вывод статей-->
        </div>


        <div class="container">



            <main class="blog-content">

                <p>{!! trans('job.main') !!}}</p>




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
