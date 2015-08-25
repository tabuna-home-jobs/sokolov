@extends('_layout/account')

@section('content-account')



    <div class="panel panel-default">
        <div class="panel-heading">Заказы</div>
        <table class="table">

            <thead>
            <tr>
                <th>#</th>
                <th>Название работы</th>
                <th>Статус</th>
                <th>Управление</th>
            </tr>
            </thead>


            <tbody>
            @foreach($Orders as $order)
                <tr>
                    <th scope="row">{{$order->id}}</th>
                    <td>{{$order->name}}</td>
                    <td>{{$order->status}}</td>
                    <td>@mdo</td>
                </tr>
            @endforeach

            </tbody>


        </table>
    </div>


    {!! $Orders->render()!!}


@endsection