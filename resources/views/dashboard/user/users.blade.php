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
                                    <th>@sortablelink ('first_name', 'Имя')</th>
                                    <th>@sortablelink ('last_name', 'Фамилия')</th>
                                    <th>@sortablelink ('dignity', 'Титул')</th>
                                    <th>@sortablelink ('institution', 'Институт')</th>
                                    <th>@sortablelink ('email', 'Email')</th>
                                    <th>@sortablelink ('phone', 'Телефон')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Users as $key => $User)
                                    <tr>
                                        <td>{{$User->first_name}}</td>
                                        <td>{{$User->last_name}}</td>
                                        <td>{{$User->dignity}}</td>
                                        <td>{{$User->institution}}</td>
                                        <td>{{$User->email}}</td>
                                        <td>{{$User->phone}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-6 text-center">
                            <small class="text-muted inline m-t-sm m-b-sm">
                                Пользователей: {!! $Users->count() !!} из {!! $Users->total() !!}
                            </small>
                        </div>
                        <div class="col-sm-6 text-right text-center-xs">
                            {!! $Users->appends(\Input::except('page'))->render() !!}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


















@endsection
