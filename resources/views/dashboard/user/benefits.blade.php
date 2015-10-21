@extends('app')


@section('content')


    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3"> Выплаты</h1>
    </div>
    <div class="wrapper-md">
        <div class="panel panel-default">

            <div class="table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-striped m-b-none dataTable no-footer" id="DataTables_Table_0"
                                   role="grid" aria-describedby="DataTables_Table_0_info">
                                <thead>
                                <tr role="row">
                                    <th>@sortablelink ('id', '#')</th>
                                    <th>@sortablelink ('name', 'Имя работы')</th>
                                    <th>@sortablelink ('workfinish', 'Дата окончания')</th>
                                    <th>@sortablelink ('created_at', 'Дата создания')</th>
                                    <th>@sortablelink ('price', 'Сумма по заказу')</th>
                                    <th>Исполнитель</th>
                                    <th>Email</th>
                                    <th>Телефон</th>
                                    <th>Выплатить</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Tasks as $key => $task)
                                    <tr>
                                        <td>{{$task->id}}</td>
                                        <td>
                                            <a href="{{route('dashboard.task.show', $task->id)}}">
                                                {{$task->name}}
                                            </a>
                                        </td>
                                        <td>{{$task->workfinish}}</td>
                                        <td>{{$task->created_at}}</td>
                                        <td>{{$task->price}}</td>
                                        <td>{{$task->getUser->last_name}} {{$task->getUser->first_name}}</td>
                                        <td>{{$task->getUser->email}}</td>
                                        <td>{{$task->getUser->phone}}</td>


                                        <td>
                                            <form method="post"
                                                  action="{{route('dashboard.benefits.update', $task->id)}}">
                                                <input type="hidden" name="_method" value="PUT">
                                                <input type="hidden" name="payment" value="1">
                                                {!! csrf_field() !!}
                                                <button type="submit" class="btn btn-primary">Выплатить</button>
                                            </form>
                                        </td>


                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-6 text-center">
                            <small class="text-muted inline m-t-sm m-b-sm">
                                Пользователей: {!! $Tasks->count() !!} из {!! $Tasks->total() !!}
                            </small>
                        </div>
                        <div class="col-sm-6 text-right text-center-xs">
                            {!! $Tasks->appends(\Input::except('page'))->render() !!}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


















@endsection
