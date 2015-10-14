@extends('_layout/site')


@section('title',$Goods->name.' - Falcon Scientific Editing ')



@section('content')







    <div class="container-fluid catalog-sing-array array-top hidden-sm hidden-xs padding-container">

        <a href="{{route('catalog.show',$next->slug)}}"><span
                    class="pull-left last-next fa fa-chevron-left hidden-sm hidden-xs"></span></a>
        <a href="{{route('catalog.show',$prev->slug)}}"><span
                    class="pull-right last-next fa fa-chevron-right hidden-sm hidden-xs"></span></a>

    </div>



    <div class="container">


        {!! htmlBlock::getGoodSlider($Goods->block_id) !!}


        <div class="container blog-container">

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
