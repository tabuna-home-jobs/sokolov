@extends('app')

@section('content')


    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">Список окон</h1>
    </div>
    <div class="wrapper-md">
        <div class="panel panel-default">
            <div class="panel-heading">

                <a href="{{URL::route('dashboard.modals.create')}}"
                   class="btn btn-link btn-sm"><i class="fa fa-plus"></i> Добавить новую запись </a>

            </div>
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
                                    <th>Последнее редактирование</th>
                                    <th>Управление</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($ModalList as $modal)
                                    <tr>
                                        <td>{{ $modal->id }}</td>
                                        <td>{{ $modal->name }}</td>
                                        <td>{{ $modal->updated_at }}</td>
                                        <td class="pull-right">








                                            <a href="{{URL::route('dashboard.modals.edit',$modal->id)}}"
                                               class="btn btn-primary"><span class="fa fa-edit"></span></a>

                                            <a href="#" class="btn btn-danger delete" data-url="{{URL::route('dashboard.modals.destroy',$modal->id)}}">
                                                <span class="fa fa-trash-o"></span>
                                            </a>


                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-6 text-center">
                            <small class="text-muted inline m-t-sm m-b-sm">Всего
                                элементов: {!! $ModalList->count() !!}</small>
                        </div>
                        <div class="col-sm-6 text-right text-center-xs">
                            {!! $ModalList->render() !!}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>



@endsection
