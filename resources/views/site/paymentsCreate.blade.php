@extends('_layout/account')

@section('content-account')


    <div class="panel panel-default">
        <div class="panel-heading">{{trans('payments.Invoices')}}</div>

        <div class="panel-body">
            <div class="container-fluid">
                <div class="row">
                    <form name="ShopForm" method="POST" class="col-xs-12"
                          action="https://money.yandex.ru/eshop.xml">


                        <input type="hidden" name="shopId" value="{{Config::get('yandexMoney.shopId')}}">
                        <input type="hidden" name="scid" value="{{Config::get('yandexMoney.scid')}}">
                        <input type="hidden" name="CustomerNumber" size="64" value="{{Auth::user()->email}}">
                        <input type="hidden" name="orderSumCurrencyPaycash" value="840">
                        <input type="hidden" name="shopSumCurrencyPaycash" value="840">


                        <input name="paymentType" value="AC" type="hidden"/>
                        <input name="cps_phone" value="{{Auth::user()->phone}}" type="hidden"/>
                        <input name="cps_email" value="{{Auth::user()->email}}" type="hidden"/>


                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>{{trans('order.Order')}} #</th>
                                <th>{{trans('order.Total price')}} (USD)</th>
                                <th>{{trans('order.Title')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">{{$order->act}}</th>
                                <td>{{$order->price}}</td>
                                <td>{{$order->name}}</td>
                            </tr>

                            </tbody>
                        </table>


                        <input type="hidden" id="order" class="form-control" name="orderNumber" readonly
                               value="{{$order->id}}" required>


                            <input type="hidden" id="price" class="form-control" name="sum" size="64" readonly
                                   value="{{$order->price_rub or 0}}">


                        <div class="form-group text-center">
                            <button class="btn btn-warning" type="submit">{{trans('payments.Checkout')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





@endsection
