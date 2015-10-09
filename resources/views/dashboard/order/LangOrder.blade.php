@extends('app')

@section('content')


    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3"> Список языков которые можно выбрать при заказе</h1>
    </div>
    <div class="wrapper-md">
        <div class="panel panel-default">
            <div class="panel-heading">

                <a class="btn btn-link btn-sm" role="button" data-toggle="collapse" href="#createLangOrder"
                   aria-expanded="false" aria-controls="createLangOrder"><span class="fa fa-plus"></span> Добавить
                    новую запись </a>


                <form class="row collapse" id="createLangOrder" role="form"
                      action="{{URL::route('dashboard.langorder.store')}}"
                      method="post" class="row"
                      enctype="multipart/form-data">

                    <div class="panel panel-default">
                        <div class="panel-body">


                            <div class="form-group">
                                <label>Имя</label>
                                <input class="form-control" type="text" maxlength="255" required name="name"
                                       value="{{$Category->name or ''}}">
                            </div>

                            <div class="form-group">
                                <label>Альтернативное имя</label>
                                <input class="form-control" type="text" maxlength="255" required name="eng_name"
                                       value="{{$Category->eng_name or ''}}">
                            </div>


                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-primary">Отправить</button>


                        </div>
                    </div>
                </form>


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
                                    <th>Имя</th>
                                    <th>Альтернативное имя</th>
                                    <th>Управление</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($LangOrder as $lang)
                                    <tr>
                                        <td>{{ $lang->id }}</td>
                                        <td>{{ $lang->name }}</td>
                                        <td>{{ $lang->eng_name }}</td>
                                        <td class="pull-right">
                                            <a href="{{URL::route('dashboard.langorder.edit', $lang->id)}}"
                                               class="btn btn-primary"><span class="fa fa-edit"></span> </a>

                                            <form action="{{URL::route('dashboard.langorder.destroy',$lang->id)}}"
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
                                элементов: {!! $LangOrder->count() !!}</small>
                        </div>
                        <div class="col-sm-6 text-right text-center-xs">
                            {!! $LangOrder->render() !!}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>



@endsection
