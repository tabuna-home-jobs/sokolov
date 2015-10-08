@extends('_layout/editor')

@section('content-editor')






    <div class="panel panel-default">
        <div class="panel-heading">{{trans('chan.Feed Task')}}</div>
        <table class="table">

            <thead>
            <tr>
                <th>{{trans('chan.Job title')}}</th>
                <th>{{trans('chan.Service')}}</th>
                <th>{{trans('chan.Price')}}</th>
                <th>{{trans('chan.Deadline')}}</th>
                <th>{{trans('chan.Control')}}</th>
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


                    <td>{{$task->price}} USD</td>
                    <td>{{$task->workfinish}}</td>


                    <td>

                        <form action="{{route('editor.chan.store')}}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" value="{{$task->id}}" name="task_id">
                            <button class="btn btn-link">{{trans('chan.Take')}}</button>
                        </form>
                    </td>


                </tr>
            @endforeach

            </tbody>


        </table>
    </div>


    {!! $Tasks->render()!!}












@endsection