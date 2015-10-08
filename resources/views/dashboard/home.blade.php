@extends('app')

@section('content')

    <div class="hbox hbox-auto-xs hbox-auto-sm">
        <!-- main -->
        <div class="col">
            <!-- main header -->
            <div class="bg-light lter b-b wrapper-md">
                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <h1 class="m-n font-thin h4 text-black">Статистика</h1>
                    </div>
                </div>
            </div>
            <!-- / main header -->
            <div class="wrapper-md">
                <!-- stats -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="row row-sm text-center">
                            <div class="col-xs-6">
                                <div class="panel padder-v item">
                                    <div class="h1 text-info font-thin h1">{{$pages}}</div>
                                    <span class="text-muted text-xs">Страниц</span>

                                    <div class="top text-right w-full">
                                        <i class="fa fa-file-o text-info m-r-sm"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <a href="https://new.sms16.ru/login/" target="_blank"
                                   class="block panel padder-v bg-primary item">
                                    <span class="text-white font-thin h1 block">{{ SMS::balance() }} <i
                                                class="fa fa-rub"></i></span>
                                    <span class="text-muted text-xs">Баланс СМС</span>



                <span class="bottom text-right w-full">
                  <i class="fa fa-cloud-upload text-muted m-r-sm"></i>
                </span>
                                </a>
                            </div>
                            <div class="col-xs-6">
                                <a href="{{route('dashboard.review.index')}}" class="block panel padder-v bg-info item">
                                    <span class="text-white font-thin h1 block">{{$review}}</span>
                                    <span class="text-muted text-xs">Отвывов</span>
                <span class="top text-left">
                  <i class="fa fa-bullhorn m-l-sm"></i>
                </span>
                                </a>
                            </div>
                            <div class="col-xs-6">
                                <div class="panel padder-v item">
                                    <div class="font-thin h1">{{$users}}</div>
                                    <span class="text-muted text-xs">Клиетов</span>

                                    <div class="bottom text-left">
                                        <i class="fa fa-newspaper-o text-info m-l-sm"></i>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row row-sm text-center">
                            <div class="col-xs-6">
                                <div class="panel padder-v item">
                                    <div class="h1 text-info font-thin h1">{{$editors}}</div>
                                    <span class="text-muted text-xs">Редакторов</span>

                                    <div class="top text-right w-full">
                                        <i class="fa fa-file-o text-info m-r-sm"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <a href="{{route('dashboard.feedback.index')}}"
                                   class="block panel padder-v bg-warning item">
                                    <span class="text-white font-thin h1 block">{{$noRead }} <i
                                                class="fa fa-envelope-o"></i></span>
                                    <span class="text-muted text-xs">Обратная связь</span>



                <span class="bottom text-right w-full">
                  <i class="fa fa-envelope-o text-muted m-r-sm"></i>
                </span>
                                </a>
                            </div>
                            <div class="col-xs-6">
                                <a href="{{route('dashboard.order.index')}}"
                                   class="block panel padder-v bg-success item">
                                    <span class="text-white font-thin h1 block">{{$allOrder}}</span>
                                    <span class="text-muted text-xs">Заказов</span>
                <span class="top text-left">
                  <i class="fa fa-shopping-cart m-l-sm"></i>
                </span>
                                </a>
                            </div>
                            <div class="col-xs-6">
                                <div class="panel padder-v item">
                                    <div class="font-thin h1">{{$news}}</div>
                                    <span class="text-muted text-xs">Новостей</span>

                                    <div class="bottom text-left">
                                        <i class="fa fa-newspaper-o text-info m-l-sm"></i>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>


                    <div class="panel hbox hbox-auto-xs no-border">
                        <div class="col wrapper">
                            <i class="fa fa-circle-o text-info m-r-sm pull-right"></i>
                            <h4 class="font-thin m-t-none m-b-none text-primary-lt">Заказы учитываемые в системе</h4>
                            <span class="m-b block text-sm text-muted">за  месяц (Обновляеться раз в 1 час)</span>

                            <div ui-jq="plot" ui-options="
            [
              { data: [ @foreach($statOrderMath as $stats) [{{$stats->dat}},{{$stats->count}}], @endforeach ], lines: { show: true, lineWidth: 1, fill:true, fillColor: { colors: [{opacity: 0.2}, {opacity: 0.8}] } } }
            ],
            {
              colors: ['#23b7e5'],
              series: { shadowSize: 3 },
              xaxis:{ show:false },
              yaxis:{ font: { color: '#a1a7ac' } },
              grid: { hoverable: true, clickable: true, borderWidth: 0, color: '#dce5ec' },
              tooltip: true,
              tooltipOpts: { content: '%s  %x.0 числа сделано заявок: %y.0',  defaultTheme: false, shifts: { x: 10, y: -25 } }
            }
          " style="height: 240px; padding: 0px; position: relative;">
                                <canvas class="flot-base"
                                        style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1115px; height: 240px;"
                                        width="1115" height="240"></canvas>
                                <div class="flot-text"
                                     style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                                    <div class="flot-y-axis flot-y1-axis yAxis y1Axis"
                                         style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;">
                                        <div style="position: absolute; top: 226px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 13px; font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif; color: rgb(161, 167, 172); left: 6px; text-align: right;">
                                            0
                                        </div>
                                        <div style="position: absolute; top: 181px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 13px; font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif; color: rgb(161, 167, 172); left: 6px; text-align: right;">
                                            2
                                        </div>
                                        <div style="position: absolute; top: 136px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 13px; font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif; color: rgb(161, 167, 172); left: 6px; text-align: right;">
                                            4
                                        </div>
                                        <div style="position: absolute; top: 91px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 13px; font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif; color: rgb(161, 167, 172); left: 6px; text-align: right;">
                                            6
                                        </div>
                                        <div style="position: absolute; top: 46px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 13px; font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif; color: rgb(161, 167, 172); left: 6px; text-align: right;">
                                            8
                                        </div>
                                        <div style="position: absolute; top: 2px; font-style: normal; font-variant: normal; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 13px; font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif; color: rgb(161, 167, 172); left: 0px; text-align: right;">
                                            10
                                        </div>
                                    </div>
                                </div>
                                <canvas class="flot-overlay"
                                        style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1115px; height: 240px;"
                                        width="1115" height="240"></canvas>
                            </div>
                        </div>
                        <div class="col wrapper-lg w-lg bg-light dk r-r">
                            <h4 class="font-thin m-t-none m-b">Отчёт</h4>

                            <div class="">
                                <div class="">
                                    <span class="pull-right text-primary">{{$completeOrder /$allOrder * 100 }}%</span>
                                    <span>Завершённых</span>
                                </div>
                                <div class="progress progress-xs m-t-sm bg-white">
                                    <div class="progress-bar bg-primary" data-toggle="tooltip" data-original-title="60%"
                                         style="width: {{$completeOrder /$allOrder * 100 }}%"></div>
                                </div>
                                <div class="">
                                    <span class="pull-right text-info">{{$toWork /$allOrder * 100 }}%</span>
                                    <span>В работе</span>
                                </div>
                                <div class="progress progress-xs m-t-sm bg-white">
                                    <div class="progress-bar bg-info" data-toggle="tooltip" data-original-title="35%"
                                         style="width: {{$toWork /$allOrder * 100 }}%"></div>
                                </div>
                                <div class="">
                                    <span class="pull-right text-danger">{{$dangerOrder /$allOrder * 100 }}%</span>
                                    <span>Отказ</span>
                                </div>
                                <div class="progress progress-xs m-t-sm bg-white">
                                    <div class="progress-bar bg-danger" data-toggle="tooltip" data-original-title="23%"
                                         style="width: {{$dangerOrder /$allOrder * 100 }}%"></div>
                                </div>
                            </div>
                            <p class="text-muted">Другие статусы заказов автоматически относятся к метке "В работе"</p>
                        </div>
                    </div>


                    <div class="panel wrapper">
                        <div class="row">
                            <div class="col-md-6 b-r b-light no-border-xs">
                                <a href="{{route('dashboard.order.index')}}" class="text-muted pull-right text-lg"><i
                                            class="fa fa-cog"></i></a>
                                <h4 class="font-thin m-t-none m-b-md text-muted">Последние заказы</h4>

                                <div class=" m-b">

                                    @foreach($lastOrder as $order)

                                        <div class="m-b">
                                        <span class="label text-base bg-primary pos-rlt m-r"><i
                                                    class="arrow right arrow-primary"></i> {{$order->created_at->diffForHumans()}}</span>
                                            <a href="{{route('dashboard.order.show',$order->id)}}">{{$order->name}}</a>
                                        </div>

                                    @endforeach

                                </div>
                            </div>


                            <div class="col-md-6 b-r b-light no-border-xs">
                                <h4 class="font-thin m-t-none m-b-md text-muted">Последние задачи</h4>

                                <div class=" m-b">

                                    @foreach($LastTask as $task)

                                        <div class="m-b">
                                        <span class="label text-base bg-info pos-rlt m-r"><i
                                                    class="arrow right arrow-info"></i> {{$task->created_at->diffForHumans()}}</span>
                                            <a href="{{route('dashboard.task.show',$task->id)}}">{{$task->name}}</a>
                                        </div>

                                    @endforeach

                                </div>
                            </div>


                        </div>
                    </div>


                </div>
            </div>
            <!-- / main -->

        </div>


    </div>








@endsection
