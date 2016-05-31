@extends('app')

@section('content')


    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3"> Список элементов блока - {{$block->name}}</h1>
    </div>
    <div class="wrapper-md">
        <div class="panel panel-default">
            <div class="panel-heading">

                <a href="{{URL::route('dashboard.element.create')}}" class="btn btn-link btn-sm"><span
                            class="fa fa-plus"></span> Добавить
                    новый элемент </a>


            </div>
            <div class="table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-striped m-b-none dataTable no-footer" id="DataTables_Table_0"
                                   role="grid" aria-describedby="DataTables_Table_0_info">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Имя элемента</th>
                                    <th>Управление</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($elements as $element)
                                    <tr>
                                        <td>{{ $element->id }}</td>
                                        <td>{{ $element->title }}</td>
                                        <td class="pull-right">
                                            <a href="{{URL::route('dashboard.element.edit', $element->id)}}"
                                               class="btn btn-primary"><span class="fa fa-edit"></span> </a>



                                            <a href="#" class="btn btn-danger delete" data-url="{{URL::route('dashboard.element.destroy',$element->id)}}">
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
                                элементов: {!! $elements->count() !!}</small>
                        </div>
                        <div class="col-sm-6 text-right text-center-xs">
                            {!! $elements->render() !!}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>



@endsection
