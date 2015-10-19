@extends('app')

@section('content')







    <section class="app-content-full">


        <!-- hbox layout -->
        <div class="hbox hbox-auto-xs bg-light">
            <!-- column -->
            <div class="col w lter b-r">
                <div class="vbox">
                    <div class="wrapper b-b">
                        <div class="font-thin h4">Заявки</div>
                    </div>
                    <div class="nav-tabs-alt">
                        <ul class="nav nav-tabs nav-justified">
                            <li>
                                <a href="?status=all">Все <span class="badge">{{$Count}}</span></a>
                            </li>
                            <li>
                                <a href="?status=ocenka">На оценке <span class="badge">{{$CountOcenka}}</span></a>
                            </li>
                            <li>
                                <a href="?status=canlcel">Отменён <span class="badge">{{$CountCanlcel}}</span></a>
                            </li>
                            <li>
                                <a href="?status=notpay">Не оплачен <span class="badge">{{$CountNotpay}}</span></a>
                            </li>
                            <li>
                                <a href="?status=pay">В работе <span class="badge">{{$CountPay}}</span></a>
                            </li>
                            <li>
                                <a href="?status=done">Готова <span class="badge">{{$CountDone}}</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="row-row">
                        <div class="cell scrollable hover">
                            <div class="cell-inner">


                                <ul class="list-group">
                                    @foreach($Orders as $order)
                                        <a href="{{URL::route('dashboard.order.show', $order->id)}}"
                                           class="list-group-item text-center">
                                            <span class="pull-left"> {{$order->id}}</span>
                                            {{$order->name}}
                                            <span class="pull-right">{{$order->created_at}}</span></a>
                                    @endforeach
                                </ul>

                                <div class="text-center">
                                    {!! $Orders->appends(\Input::except('page'))->render() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /column -->

        </div>
        <!-- /hbox layout -->


    </section>

@endsection






