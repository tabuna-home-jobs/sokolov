@extends('_layout/site')

@section('content')



    <div class="container">
        <div class="row">
            <div class="col-sm-3 page-sidebar">
                <aside>
                    <div class="inner-box">
                        <div class="user-panel-sidebar">

                            <div class="collapse-box">
                                <h5 class="collapse-title"> {{trans('leftPanel.service')}} <a href="#MyAds"
                                                                                              data-toggle="collapse"
                                                                      class="pull-right"><i
                                                class="fa fa-angle-down"></i></a></h5>

                                <div class="panel-collapse collapse in" id="MyAds">
                                    <ul class="acc-list">
                                        <li><a class="{{Active::route('order.create')}}"
                                               href="{{route('order.create')}}"><i
                                                        class="fa fa-plus"></i> {{trans('leftPanel.create order')}}
                                            </a></li>
                                        <li><a class="{{Active::route(['order.index', 'order.show'])}}"
                                               href="{{route('order.index')}}"><i class="fa fa-cart-arrow-down"></i>
                                                {{trans('leftPanel.orders')}}<span
                                                        class="badge pull-right">{{Auth::user()->getOrders()->count()}}</span>
                                            </a></li>
                                        <li><a class="{{Active::route(['payments.*'])}}"
                                               href="{{route('payments.index')}}"><i
                                                        class="fa fa-usd"></i> {{trans('leftPanel.invoice')}} </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="collapse-box">
                                <h5 class="collapse-title"> {{trans('leftPanel.control')}} <a href="#TerminateAccount"
                                                                          data-toggle="collapse" class="pull-right"><i
                                                class="fa fa-angle-down"></i></a></h5>

                                <div class="panel-collapse collapse in" id="TerminateAccount">
                                    <ul class="acc-list">

                                        <li><a class="{{Active::route('setting.*')}}"
                                               href="{{URL::route('setting.index')}}"><i class="fa fa-cog"></i>
                                                {{trans('leftPanel.settings')}} </a></li>

                                        <li><a href="/auth/logout"><i
                                                        class="fa fa-sign-out "></i> {{trans('leftPanel.exit')}} </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>

                </aside>
            </div>

            <div class="col-sm-9 page-content">
                <div class="inner-box">


                    @yield('content-account')

                </div>
            </div>

        </div>

    </div>

@endsection