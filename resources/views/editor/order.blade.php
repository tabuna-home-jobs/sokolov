@extends('_layout/editor')

@section('content-editor')


    <div class="panel panel-default">
        <div class="panel-heading">{{trans('orderTask.My Tasks')}}</div>
        <table class="table">

            <thead>
            <tr>
                <th>{{trans('orderTask.Job title')}}</th>
                <th>{{trans('orderTask.Service')}}</th>
                <th>{{trans('orderTask.Price')}}</th>
                <th>{{trans('orderTask.Deadline')}}</th>
                <th>{{trans('orderTask.Control')}}</th>
            </tr>
            </thead>


            <tbody>
            @foreach($Tasks as $task)


                <tr>
                    <td>{{$task->name}}</td>

                    @if(App::getLocale() == 'ru')
                        <td>{{$task->getGoods->name}}</td>
                    @else
                        <td>{{$task->getGoods->eng_name}}</td>
                    @endif

                    <td><i class="fa fa-dollar"></i> {{$task->price}}</td>
                    <td>
                        <small>{{$task->workfinish}}</small>
                    </td>
                    <td><a href="{{route('editor.order.show', $task->id)}}"> {{trans('orderTask.Viewing')}}</a></td>
                </tr>
            @endforeach

            </tbody>


        </table>
    </div>


    {!! $Tasks->render()!!}


@endsection