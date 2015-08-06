@extends('app')

@section('content')


    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3"> Отзывы</h1>
    </div>
    <div class="wrapper-md">
        <div class="panel panel-default">
            <div class="panel-heading">
                     Отзывы
            </div>
            <div class="table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-striped m-b-none dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                <thead>
                                <tr role="row">
                                    <th>#</th>
                                    <th>ФИО</th>
                                    <th>Кратко</th>
                                    <th>Дата</th>
                                    <th>Управление</th>
                                </tr>
                                </thead>
                                <tbody>



                                @foreach ($ReviewsList as $Review)
                                    <tr>
                                        @if( $Review->publish )
                                            <td class="success">{{ $Review->id }}</td>
                                        @else
                                            <td>{{ $Review->id }}</td>
                                        @endif

                                        <td>{{ $Review->fio }}</td>



                                        <td>{{  mb_substr($Review->content,0,50,'utf-8') }}...</td>
                                        <td>{{ $Review->created_at }}</td>
                                        <td>
                                            <a href="/dashboard/reviews/add/{{ $Review->id }}" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span> </a>
                                            <a href="/dashboard/reviews/destroy/{{ $Review->id }}" class="btn btn-danger"><span class="fa fa-trash-o"></span></a>
                                        </td>
                                    </tr>
                                @endforeach

                        </tbody>
                        </table>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-6 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">Всего элементов: {!! $ReviewsList->count() !!}</small>
                    </div>
                    <div class="col-sm-6 text-right text-center-xs">
                        {!! $ReviewsList->render() !!}
                    </div>
                </div>


            </div>
        </div>
    </div>
    </div>



@endsection
