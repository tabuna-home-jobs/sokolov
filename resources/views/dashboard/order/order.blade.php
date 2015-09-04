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
                                <a>Все</a>
                            </li>
                            <li>
                                <a >Оплаченные</a>
                            </li>
                            <li>
                                <a>Завершённые</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row-row">
                        <div class="cell scrollable hover">
                            <div class="cell-inner">


                                <ul class="list-group">
                                    @foreach($Orders as $order)
                                        <a href="{{URL::route('dashboard.order.show', $order->id)}}" class="list-group-item">{{$order->name}} <span class="pull-right">{{$order->created_at}}</span></a>
                                    @endforeach
                                </ul>

                                {!! $Orders->render() !!}

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






