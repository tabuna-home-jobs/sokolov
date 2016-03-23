@extends('_layout/site')




@section('content')

    <div class="container blog-container">

        <article class="col-md-8">


            <h1>Готовые работы</h1>

        </article>


        <div class="col-xs-12">
            <div class="sidebar-module sidebar-module-inset">

                <hr>
                @foreach($goodslist as $good)

                    <div class="col-xs-3 examples">
                        <div class="avatar-examples text-center">
                            <i class="fa fa-file-text-o"></i>
                        </div>
                        <div class="name-example text-center">
                            <a href="{{$good->slug}}">{{$good->name}}</a>
                        </div>
                        <div class="date_create_example col-xs-8">{{$good->created_at}}</div>
                        <div class="col-xs-4">
                            <a href="{{$good->slug}}">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>


    </div>

@endsection
