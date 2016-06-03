@extends('app')


@section('content')


    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3"> Email</h1>
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
                                    <th>Имя</th>
                                    <th>
                                        <form method="post" action="{{URL::route('dashboard.subscribe.store')}}">
                                            {!! csrf_field() !!}
                                        <button class="btn btn-link" type="submit">Экспортировать</button>
                                        </form>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subscribes as $key => $subscribe)
                                    <tr>
                                        <td>{{$subscribe->email}}</td>
                                        <td>
                                            <a href="#" class="btn btn-danger delete  pull-right" data-url="{{URL::route('dashboard.subscribe.destroy',$subscribe->id)}}">
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
                            <small class="text-muted inline m-t-sm m-b-sm">
                                Email : {!! $subscribes->count() !!} из {!! $subscribes->total() !!}
                            </small>
                        </div>
                        <div class="col-sm-6 text-right text-center-xs">
                            {!! $subscribes->appends(\Input::except('page'))->render() !!}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


















@endsection
