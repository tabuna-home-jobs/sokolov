@extends('app')

@section('content')


    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3"> Список статических страниц</h1>
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
                                    <th>Адрес</th>
                                    <th>Управление</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($routes as $url)
                                    <tr>
                                        <td>{{$url}}</td>
                                        <td class="pull-right">
                                            <a href="{{URL::route('dashboard.seostatic.edit', base64_encode($url))}}"
                                               class="btn btn-primary"><span class="fa fa-edit"></span> </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>



@endsection
