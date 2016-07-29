@extends('_layout/site')


@section('title',$Goods->title)
@section('description', $Goods->descript)
@section('keywords', $Goods->tag)
@section('avatar', Config::get('app.url').$Goods->avatar)


@section('content')




    <div class="container">


        {!! htmlBlock::getGoodSlider($Goods->block_id) !!}


        <div class="container blog-container">


            <header>


                <div class="text-center row">

                    <div class="col-md-1 vcenter">
                        <a href="{{route(App::getLocale().'.catalog.show',$next->slug)}}"><span
                                    class="last-next fa fa-arrow-left hidden-sm hidden-xs"></span></a>

                    </div>

                    <div class="col-md-9 col-xs-12 vcenter">
                        <h1> {{$Goods->name}}</h1>
                    </div>

                    <div class="col-md-1 vcenter">
                        <a href="{{route(App::getLocale().'.catalog.show',$prev->slug)}}"><span
                                    class="last-next fa fa fa-arrow-right hidden-sm hidden-xs"></span></a>

                    </div>


                </div>


            </header>


            <main class="blog-content">
                {!!$Goods->text!!}
            </main>





            <div class="col-md-4 col-md-offset-4">
            <div class="calculate-wrapper">
                @widget('calcucator')
            </div>
                </div>






        </div>


    </div>




    <div class="container-fluid">

        <p class="text-center">
            <a href="/auth/login" class="btn btn-warning">{{trans('main.Order')}}</a>
            <a href="/{{App::getLocale() ."/samples/". $Goods->category_id}}" class="btn btn-primary">
                {{trans('job.title')}}
            </a>
        </p>




    </div>




@endsection
