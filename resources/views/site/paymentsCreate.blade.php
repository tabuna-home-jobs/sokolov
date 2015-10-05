@extends('_layout/account')

@section('content-account')

    <div class="panel panel-default">
        <div class="panel-heading">Платежи</div>


        <form name="ShopForm" method="POST" action="https://demomoney.yandex.ru/eshop.xml">


            <input type="hidden" name="shopId" value="{{Config::get('yandexMoney.shopId')}}">
            <input type="hidden" name="scid" value="{{Config::get('yandexMoney.scid')}}">
            <input type="hidden" name="CustomerNumber" size="64" value="{{Auth::user()->email}}">

            <input type="hidden" name="orderSumCurrencyPaycash" value="USD">
            <input type="hidden" name="shopSumCurrencyPaycash" value="USD">


            <input name="paymentType" value="AC" type="hidden"/>
            <input name="cps_phone" value="{{Auth::user()->phone}}" type="hidden"/>
            <input name="cps_email" value="{{Auth::user()->email}}" type="hidden"/>


            <div class="form-group">
                <label>Выберите заказ</label>
                <select id="order" class="form-control" name="orderNumber" required>
                    @foreach($order as $value)
                        <option data-price="{{$value->price}}" value="{{$value->id}}">{{$value->name}}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label>Сумма к оплате</label>
                <input id="price" class="form-control" type=number name="sum" size="64" readonly
                       value="{{$order[0]->price or 0}}">
            </div>


            <div class="form-group">
                <button class="btn btn-default" type="submit">Оплатить</button>
            </div>
        </form>


    </div>


    <script>
        window.onload = function () {

            $('#order').on('change', function () {
                $('#price').val($("option:selected", this).data('price'))
            });
        };
    </script>




@endsection