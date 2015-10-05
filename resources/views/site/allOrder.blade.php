@extends('_layout/account')

@section('content-account')



    <div class="panel panel-default">
        <div class="panel-heading">{{trans("order.Your Orders")}}</div>
        <table class="table">

            <thead>
            <tr>
                <th>{{trans("order.Order")}} #</th>
                <th>{{trans("order.Order Date")}}</th>
                <th>{{trans("order.Title")}}</th>
                <th>{{trans("order.Status")}}</th>
            </tr>
            </thead>


            <tbody>
            @foreach($Orders as $order)
                <tr>
                    <th scope="row"><a href="{{route('order.show',$order->id)}}">{{$order->id}}</a></th>
                    <td>{{ date("Y-m-d",$order->created_at->tz('UTC')->timestamp)}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->status}}</td>
                </tr>
            @endforeach

            </tbody>


        </table>
    </div>


    {!! $Orders->render()!!}


@endsection