@extends('_layout/account')

@section('content-account')



    <div class="panel panel-default">
        <div class="panel-heading">{{trans("order.Your Orders")}}</div>
        <table class="table">

            <thead>
            <tr>
                <th>@sortablelink ('id',trans("order.Order")) #</th>
                <th>@sortablelink ('created_at',trans("order.Order Date"))</th>
                <th>@sortablelink ('price',trans("order.Total"))</th>
                <th>@sortablelink ('name',trans("order.Title"))</th>
                <th>@sortablelink ('status',trans("order.Status"))</th>
            </tr>
            </thead>


            <tbody>
            @foreach($Orders as $order)
                <tr>
                    <th scope="row"><a href="{{route('order.show',$order->id)}}">{{$order->id}}</a></th>
                    <td>{{ date("Y-m-d",$order->created_at->tz(Config::get('app.timezone'))->timestamp)}}</td>
                    <td>{{ number_format($order->price,2)}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{ trans('status.' . $order->status)}}</td>
                </tr>
            @endforeach

            </tbody>


        </table>
    </div>


    {!! $Orders->appends(\Input::except('page'))->render()!!}


@endsection