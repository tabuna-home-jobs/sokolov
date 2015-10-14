@extends('_layout/account')

@section('content-account')



    <div class="panel panel-default">
        <div class="panel-heading">{{trans('payments.Invoices')}}

            <div class="pull-right">
                <a href="{{route('payments.create')}}" class="btn btn-default  btn-xs">
                    {{trans('payments.New payment')}}
                </a>
            </div>

        </div>
        <table class="table">

            <thead>
            <tr>
                <th>#</th>
                <th>{{trans('payments.Total')}}</th>
                <th>{{trans('payments.Title')}}</th>
                <th>{{trans('payments.Date')}}</th>
            </tr>
            </thead>


            <tbody>
            @foreach($payments as $order)
                <tr>
                    <th scope="row">{{$order->id}}</th>
                    <td>{{$order->sum}}</td>
                    <td>{{$order->getOrder->name}}</td>
                    <td>{{$order->created_at}}</td>
                </tr>
            @endforeach

            </tbody>


        </table>
    </div>


    {!! $payments->render()!!}


@endsection