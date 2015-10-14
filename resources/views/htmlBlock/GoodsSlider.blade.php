<div class="row">

    <div class="col-md-12 hidden-sm hidden-xs">


    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <div class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators carousel-indicators-catalog">

            @for($i=0; $i != count($Elements); $i++)
                <li data-target="#carousel-example-generic" data-slide-to="{{$i}}"
                    class="@if($i == 0)active @endif"></li>
            @endfor

        </ol>
        <div class="carousel-inner" role="listbox">


            @foreach($Elements as $key => $element)
                <div class="item @if($key == 0) active @endif">
                    <img src="{{$element->img}}">

                    <div class="carousel-caption carousel-caption-element">
                        <img src="/img/catalog/slider-logo.png">

                        <div class="carousel-caption-element-bg">
                            <h2>{{$element->title}}</h2>

                            <p>
                                {{strip_tags($element->desc)}}
                            </p>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>


        <a class="left carousel-control carousel-control-element" href="#carousel-example-generic"
           role="button" data-slide="prev">
            <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control carousel-control-element" href="#carousel-example-generic"
           role="button" data-slide="next">
            <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>


    </div>
</div>

    </div>

</div>