@extends('_layout/editor')

@section('content-editor')






    <div class="panel panel-default">
        <div class="panel-heading">Лента задач</div>
        <table class="table">

            <thead>
            <tr>
                <th>Название работы</th>
                <th>Услуга</th>
                <th>Стоимость</th>
                <th>Срок сдачи</th>
                <th>Управление</th>
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


                    <td>{{$task->price}}</td>
                    <td>{{$task->workfinish}}</td>


                    <td>

                        <form action="{{route('editor.chan.store')}}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" value="{{$task->id}}" name="task_id">
                            <button class="btn btn-link">Принять</button>
                        </form>
                    </td>


                </tr>
            @endforeach

            </tbody>


        </table>
    </div>


    {!! $Tasks->render()!!}












@endsection