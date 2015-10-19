@extends('_layout/editor')

@section('content-editor')


    <div class="panel panel-default">
        <div class="panel-heading">{{trans('payments.Invoices')}}</div>
        <table class="table">

            <thead>
            <tr>
                <th>#</th>
                <th>{{trans('orderTask.Job title')}}</th>
                <th>{{trans('orderTask.Service')}}</th>
                <th>{{trans('orderTask.Price')}}</th>
                <th>{{trans('order.Status')}}</th>
            </tr>
            </thead>


            <tbody>
            @foreach($Tasks as $task)


                <tr>
                    <td><a href="{{route('editor.order.show', $task->id)}}"> {{$task->id}}</a></td>

                    <td>{{$task->name}}</td>

                    @if(App::getLocale() == 'ru')
                        <td>{{$task->getGoods->name}}</td>
                    @else
                        <td>{{$task->getGoods->eng_name}}</td>
                    @endif

                    <td>{{$task->price}} USD</td>

                    <td>
                        @if($task->payment) {{trans('payments.Paid')}} @else {{trans('payments.Pending payments')}} @endif
                    </td>
                </tr>
            @endforeach

            </tbody>


        </table>
    </div>


    {!! $Tasks->render()!!}


@endsection