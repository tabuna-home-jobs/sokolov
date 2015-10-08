@extends('_layout/editor')

@section('content-editor')


    <div class="panel panel-default">
        <div class="panel-heading">{{trans('orderTask.My Tasks')}}</div>
        <table class="table">

            <thead>
            <tr>
                <th>#</th>
                <th>{{trans('orderTask.Job title')}}</th>
                <th>{{trans('orderTask.Service')}}</th>
                <th>{{trans('orderTask.Price')}}</th>
                <th>{{trans('orderTask.Deadline')}}</th>
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
                        <small>{{$task->workfinish}}</small>
                    </td>
                </tr>
            @endforeach

            </tbody>


        </table>
    </div>


    {!! $Tasks->render()!!}


@endsection