@extends('app')

@section('content')


    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3"> Список категорий</h1>
    </div>
    <div class="wrapper-md">
        <div class="panel panel-default">
            <div class="panel-heading">

                <a href="{{URL::route('dashboard.category.create')}}" class="btn btn-link btn-sm"><span class="fa fa-plus"></span> Добавить
                    новую запись </a>


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
                                    <th>Миниатюра</th>
                                    <th>Имя</th>
                                    <th>Управление</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($Category as $Cat)
                                    <tr>
                                        <td>{{ $Cat->id }}</td>
                                        <td><img src="{{ $Cat->avatar }}" class="img-responsive" width="100px"
                                                 height="50px"></td>
                                        <td>{{ $Cat->name }}</td>
                                        <td class="pull-right">
                                            <a href="{{URL::route('dashboard.category.edit', $Cat->slug)}}"
                                               class="btn btn-primary"><span class="fa fa-edit"></span> </a>

                                            <form action="{{URL::route('dashboard.category.destroy',$Cat->slug)}}"
                                                  method="post" class="pull-right">
                                                <input type="hidden" name="_method" value="delete">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-danger"><span
                                                            class="fa fa-trash-o"></span></button>
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
                            <small class="text-muted inline m-t-sm m-b-sm">Всего
                                элементов: {!! $Category->count() !!}</small>
                        </div>
                        <div class="col-sm-6 text-right text-center-xs">
                            {!! $Category->render() !!}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>



@endsection
