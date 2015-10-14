@extends('_layout/site')


@section('title',$Goods->name.' - Falcon Scientific Editing ')



@section('content')




    <div class="container">


        {!! htmlBlock::getGoodSlider($Goods->block_id) !!}



        <div class="container blog-container">


            <header>


                <a class="pull-left" href="{{route('catalog.show',$next->slug)}}"><span
                            class="pull-left last-next fa fa-chevron-left hidden-sm hidden-xs"></span></a>

                <a class="pull-right" href="{{route('catalog.show',$prev->slug)}}"><span
                            class="pull-right last-next fa fa-chevron-right hidden-sm hidden-xs"></span></a>

                <h1 class="text-center">{{$Goods->name}}</h1>


            </header>


            <main class="blog-content">
                {!!$Goods->text!!}
            </main>


        </div>


    </div>




    <div class="container-fluid array-top hidden-sm hidden-xs padding-container">

        <p class="text-center">
            <a href="/auth/login" type="button" class="btn btn-warning">{{trans('main.Order')}}</a>
        </p>

    </div>




@endsection
