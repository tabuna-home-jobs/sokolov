
@extends('app')

@section('content')


    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3"> Настройки сайта</h1>
    </div>
    <div class="wrapper-md">
        <div class="panel panel-default">
            <div class="panel-heading">
                Параметры и значения

                <a href="{{URL::route('dashboard.options.create')}}" class="btn btn-success btn-xs pull-right">Добавить <i class="fa fa-plus"></i></a>


            </div>
            <div class="table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-striped m-b-none dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                <thead>
                                <tr role="row">
                                    <th>Название</th>
                                    <th>Значение</th>
                                    <th>Дата создания</th>
                                    <th>Последнее редактирование</th>
                                    <th>Управление</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($Options as $option)
                                    <tr>
                                        <td>{{ $option->module }}</td>
                                        <td>{{ $option->value }}</td>
                                        <td>{{ $option->created_at }}</td>
                                        <td>{{ $option->updated_at }}</td>
                                        <td class="pull-right">
                                            <a href="{{URL::route('dashboard.options.edit',$option->id)}}" class="btn btn-primary"><span class="fa fa-edit"></span> </a>
                                            <form action="{{URL::route('dashboard.options.destroy',$option->id)}}" method="post" class="pull-right">
                                                <input type="hidden" name="_method" value="delete">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-danger"><span class="fa fa-trash-o"></span></button>
                                            </form></div>
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-6 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">Всего элементов: {!! $Options->count() !!}</small>
                    </div>
                    <div class="col-sm-6 text-right text-center-xs">
                        {!! $Options->render() !!}
                    </div>
                </div>


            </div>
        </div>
    </div>
    </div>



@endsection
