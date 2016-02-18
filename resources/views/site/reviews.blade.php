@extends('_layout/site')


@section('title',trans('reviews.Customer Reviews'))






@section('content')

    <div class="container blog-container">

        @foreach($ReviewList as $reviews)

            <article class="reviews-div full-reviews row">
                <div class="pull-left col-md-4 text-center">
                    <img src="{{$reviews->avatar}}" class="img-circle">

                    <div class="caption">
                        <h4>{{$reviews->name}}</h4>

                        <p>{{$reviews->dolshnost}}</p>
                        <p><i class="fa fa-university"></i> {{$reviews->institute}}</p>
                        <p><i class="fa fa-map-marker"></i> {{$reviews->country}}</p>




                        <p class="date">
                            {{$reviews->created_at->toDateString()}}
                        </p>
                    </div>
                </div>
                <div class="col-md-8">
                    <p class="text-justify reviews-text">
                        <i class="fa fa-quote-left fa-2x fa-pull-left"></i>
                        {{$reviews->comment}}
                        <i class="fa fa-quote-right fa-2x fa-pull-right"></i>
                    </p>
                </div>


            </article>
            <hr>
        @endforeach

        <div class="text-center">
            {!! $ReviewList->render() !!}
        </div>

    </div>

@endsection