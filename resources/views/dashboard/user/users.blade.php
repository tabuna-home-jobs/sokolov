@extends('app')


@section('content')


    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3"> Пользователи</h1>
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
                                <th>#</th>
                                <th>Имя</th>
                                <th>Email</th>
                                <th>Телефон</th>
                                <th>Управление</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Users as $key => $User)
                                <tr>
                                    <td>{{$User->id}}</td>
                                    <td>{{$User->first_name}}</td>
                                    <td>{{$User->email}}</td>
                                    <td>{{$User->phone}}</td>
                                    <td>
                                        <div class="btn-group pull-right" role="group" aria-label="...">
                                            <a href="{{URL::route('dashboard.user.show', $User->id)}}"
                                               class="btn btn-default">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>

                                            <a href="#" data-toggle="modal" data-target="#Modal-{{$User->id}}"
                                               class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="Modal-{{$User->id}}" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span
                                                            aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Удалить {{$User->first_name}}
                                                    ?</h4>
                                            </div>
                                            <div class="modal-body">
                                                Вы действительно хотите удалить {{$User->first_name}}
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{URL::route('dashboard.user.destroy')}}" method="post">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Нет
                                                    </button>
                                                    <button type="submit" class="btn btn-danger">Да</button>
                                                    <input type="hidden" name="id" value="{{$User->id}}"/>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-6 text-center">
                            <small class="text-muted inline m-t-sm m-b-sm">Всего
                                элементов: {!! $Users->count() !!}</small>
                        </div>
                        <div class="col-sm-6 text-right text-center-xs">
                            {!! $Users->render() !!}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


















@endsection
