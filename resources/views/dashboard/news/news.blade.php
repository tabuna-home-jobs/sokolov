@extends('app')

@section('content')


    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">Список новостей</h1>
    </div>
    <div class="wrapper-md">
        <div class="panel panel-default">
            <div class="panel-heading">

                <a href="{{URL::route('dashboard.news.create')}}"
                   class="btn btn-link btn-sm"><i class="fa fa-plus"></i>  Добавить новую запись </a>

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
                                    <th>Миниатюра</th>
                                    <th>Имя</th>
                                    <th>Заголовок</th>
                                    <th>Последнее редактирование</th>
                                    <th>Управление</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($NewsList as $News)
                                    <tr>
                                        <td>{{ $News->id }}</td>
                                        <td><img src="{{ $News->avatar }}" width="100px" height="50px"></td>
                                        <td>{{ $News->name }}</td>
                                        <td>{{ $News->title }}</td>
                                        <td>{{ $News->updated_at }}</td>
                                        <td class="pull-right">
                                            <a href="{{URL::route('dashboard.news.edit',$News->slug)}}"
                                               class="btn btn-primary"><span class="fa fa-edit"></span> </a>

                                            <form action="{{URL::route('dashboard.news.destroy',$News->slug)}}"
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
                                элементов: {!! $NewsList->count() !!}</small>
                        </div>
                        <div class="col-sm-6 text-right text-center-xs">
                            {!! $NewsList->render() !!}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>



@endsection
