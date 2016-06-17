@extends('_layout/site')


@section('title',trans('main.Services'))


@section('content')


    <div class="container blog-container">



        <div class="page-header text-center">
            <h2 class="text-center">{{trans('job.title')}}</h2>
        </div>


        <div class="row">

             @foreach($Works as $key =>$good)

                 @if($key < 4)
                <div class="col-md-3">
                    <div class="row finish-work">
                        <a class="gettext" data-expl_id="{{$good->id}}"  data-toggle="collapse" href="#collapse" aria-expanded="false">
                            <p class="text-center"><i class="fa fa-file-text-o"></i></p>
                            <p class="title">{{$good->name}}</p>
                        </a>

                        <div>
                            <a class="gettext" data-expl_id="{{$good->id}}"  data-toggle="collapse" href="#collapse" aria-expanded="false"><i class="fa fa-eye"></i></a>
                            <a href="{{$good->download}}" target="_blank"><i class="fa fa-download"></i></a>
                        </div>
                    </div>

                </div>

                @if(($key+1) % 4 == 0)
                    <div class="clearfix"></div>
                @endif

                @endif
            @endforeach

            <div class="collapse col-xs-12  in" id="collapse">
                <div class="wrap-slide-text col-sm-12 hidden-xs">



                    <div class="row">
                        <div class="slider">

                            <div class="slider responsive">

                                <div class="left image">

                                    <img src="http://www.savonpirkka.fi/images/igallery/resized/1001-1100/image-1009-800-600-80.jpg"/>

                                </div>

                                <div class="right image">

                                    <img src="http://www.savonpirkka.fi/images/igallery/resized/1001-1100/image-1012-800-600-80.jpg"/>

                                </div>

                            </div>

                        </div>

                    </div>




                </div>
            </div>




                 @foreach($Works as $key =>$good)

                     @if($key > 3)
                         <div class="col-md-3">
                             <div class="row finish-work">
                                 <a class="gettext" data-expl_id="{{$good->id}}"  data-toggle="collapse" href="#collapse" aria-expanded="false">
                                    <p class="text-center"><i class="fa fa-file-text-o"></i></p>
                                    <p class="title">{{$good->name}}</p>
                                 </a>

                                 <div>
                                     <a class="gettext" data-expl_id="{{$good->id}}"  data-toggle="collapse" href="#collapse" aria-expanded="false"><i class="fa fa-eye"></i></a>
                                     <a href="{{$good->download}}" target="_blank"><i class="fa fa-download"></i></a>
                                 </div>
                                 </div>


                         </div>

                         @if(($key+1) % 4 == 0)
                             <div class="clearfix"></div>
                         @endif

                     @endif
                 @endforeach






        </div>


        <div class="row">

            <div class="text-center">
                {!! $Works->render() !!}
            </div>
            </div>



    </div>





    <script type="text/javascript">

        $('.slider').hide();

        //Берём текст перевода
        $("body").on('click', '.gettext', function(){
            var data = {};
            data['id'] = $(this).attr('data-expl_id');

            $('#collapse').on('hidden.bs.collapse', function () {
                $(".collapse").collapse('show');
            });


            $.ajax({
                url: "/examplegetone/exampleone/"+data['id'],
                type: "GET",
                headers: {
                    'X-CSRF-TOKEN': $('#token').attr('content')
                },
                success: function(json) {
                    var data = JSON.parse(json);
                    $(".left").html("<img src='" + data.after + "'>");
                    $(".right").html("<img src='" + data.before + "'>");

                    $('.slider').show().slider();
                }
            });

        });




    </script>



@endsection
