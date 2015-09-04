@extends('_layout/account')

@section('content-account')



    <div class="panel panel-default">
        <div class="panel-heading">Платежи</div>
        <table class="table">

            <thead>
            <tr>
                <th>#</th>
                <th>Сумма</th>
                <th>Название работы</th>
                <th>Статус</th>
            </tr>
            </thead>


            <tbody>
            @foreach($payments as $order)
                <tr>
                    <th scope="row">{{$order->id}}</th>
                    <td>{{$order->sum}}</td>
                    <td>{{$order->sum}}</td>
                    <td>{{$order->status}}</td>
                </tr>
            @endforeach

            </tbody>


        </table>
    </div>


    {!! $payments->render()!!}


@endsection