@extends('_layout/account')

@section('content-account')

    <div class="panel panel-default">
        <div class="panel-heading">{{trans('payments.Invoices')}}</div>

        <div class="panel-body">
            <div class="container-fluid">
                <div class="row">
                    <form name="ShopForm" method="POST" class="col-xs-12"
                          action="https://demomoney.yandex.ru/eshop.xml">


                        <input type="hidden" name="shopId" value="{{Config::get('yandexMoney.shopId')}}">
                        <input type="hidden" name="scid" value="{{Config::get('yandexMoney.scid')}}">
                        <input type="hidden" name="CustomerNumber" size="64" value="{{Auth::user()->email}}">

                        <input type="hidden" name="orderSumCurrencyPaycash" value="840">
                        <input type="hidden" name="shopSumCurrencyPaycash" value="840">


                        <input name="paymentType" value="AC" type="hidden"/>
                        <input name="cps_phone" value="{{Auth::user()->phone}}" type="hidden"/>
                        <input name="cps_email" value="{{Auth::user()->email}}" type="hidden"/>


                        <div class="form-group">
                            <label>{{trans('payments.Select order')}}</label>
                            <select id="order" class="form-control" name="orderNumber" required>
                                @foreach($order as $value)
                                    <option data-price="{{$value->price_rub}}" value="{{$value->id}}">{{$value->name}}
                                        ({{$value->price}} USD)
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label>{{trans('payments.Amount to be paid in rubles')}}</label>
                            <input id="price" class="form-control" type=number name="sum" size="64" readonly
                                   value="{{$order[0]->price_rub or 0}}">
                        </div>


                        <div class="form-group">
                            <button class="btn btn-default" type="submit">{{trans('payments.Checkout')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        window.onload = function () {

            $('#order').on('change', function () {
                $('#price').val($("option:selected", this).data('price'))
            });
        };
    </script>




@endsection