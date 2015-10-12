@extends('_layout/site')


@section('title',$Goods->name.' - Falcon Scientific Editing ')



@section('content')






    <div class="container">

        <div class="row">

            <div class="col-md-12 hidden-sm hidden-xs">

                {!! htmlBlock::getGoodSlider($Goods->block_id) !!}


            </div>

        </div>


        <div class="container blog-container">

            <main class="blog-content">
                {!!$Goods->text!!}
            </main>


        </div>


    </div>







@endsection
