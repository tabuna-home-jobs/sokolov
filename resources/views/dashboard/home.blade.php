
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
                    <div class="col-md-5">
                        <div class="row row-sm text-center">
                            <div class="col-xs-6">
                                <div class="panel padder-v item">
                                    <div class="h1 text-info font-thin h1">123</div>
                                    <span class="text-muted text-xs">Страниц</span>

                                    <div class="top text-right w-full">
                                        <i class="fa fa-file-o text-info m-r-sm"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <a href class="block panel padder-v bg-primary item">
                                    <span class="text-white font-thin h1 block">{{ SMS::balance() }} <i class="fa fa-rub"></i></span>
                                    <span class="text-muted text-xs">Баланс СМС</span>



                <span class="bottom text-right w-full">
                  <i class="fa fa-cloud-upload text-muted m-r-sm"></i>
                </span>
                                </a>
                            </div>
                            <div class="col-xs-6">
                                <a href class="block panel padder-v bg-info item">
                                    <span class="text-white font-thin h1 block">40</span>
                                    <span class="text-muted text-xs">Услуг</span>
                <span class="top text-left">
                  <i class="fa fa-shopping-cart m-l-sm"></i>
                </span>
                                </a>
                            </div>
                            <div class="col-xs-6">
                                <div class="panel padder-v item">
                                    <div class="font-thin h1">50</div>
                                    <span class="text-muted text-xs">Новостей</span>
                                    <div class="bottom text-left">
                                        <i class="fa fa-newspaper-o text-info m-l-sm"></i>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>




                    <div class="col-md-6">
                        <div class="row row-sm">
                            <div class="col-xs-6 text-center">
                                <div ui-jq="easyPieChart" ui-options="{
                    percent: 10,
                    lineWidth: 4,
                    trackColor: '#e8eff0',
                    barColor: '#7266ba',
                    scaleColor: false,
                    size: 115,
                    rotate: 90,
                    lineCap: 'butt'
                  }" class="inline m-t">
                                    <div>
                                        <span class="text-primary h4">10%</span>
                                    </div>
                                </div>
                                <div class="text-muted font-bold text-xs m-t m-b">Обработанно комментариев</div>
                            </div>
                            <div class="col-xs-6 text-center">
                                <div ui-jq="easyPieChart" ui-options="{
                    percent: 10,
                    lineWidth: 4,
                    trackColor: '#e8eff0',
                    barColor: '#23b7e5',
                    scaleColor: false,
                    size: 115,
                    rotate: 180,
                    lineCap: 'butt'
                  }" class="inline m-t">
                                    <div>
                                        <span class="text-info h4">10%</span>
                                    </div>
                                </div>
                                <div class="text-muted font-bold text-xs m-t m-b">Обработанно обратной связи</div>
                            </div>
                        </div>
                    </div>




















            </div>
        </div>
        <!-- / main -->

    </div>




</div>








@endsection
