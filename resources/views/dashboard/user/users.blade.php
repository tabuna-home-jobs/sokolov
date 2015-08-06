@extends('app')


@section('content')




    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Пользователи
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            <h5 class="box-title">
                                <small>Добовление пользователей невозможно</small>
                            </h5>
                        </h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Имя</th>
                                <th>Email</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Users as $key => $User)
                                <tr>
                                    <td>{{$User->id}}</td>
                                    <td>{{$User->first_name}}</td>
                                    <td>{{$User->email}}</td>
                                    <td>
                                        <div class="btn-group pull-right" role="group" aria-label="...">
                                            <a href="{{URL::route('dashboard.user.show', $User->id)}}"
                                               class="btn btn-default">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>

                                            <a href="#" data-toggle="modal" data-target="#Modal-{{$User->id}}"
                                               class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="Modal-{{$User->id}}" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span
                                                            aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Удалить {{$User->first_name}}
                                                    ?</h4>
                                            </div>
                                            <div class="modal-body">
                                                Вы действительно хотите удалить {{$User->first_name}}
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{URL::route('dashboard.user.destroy')}}" method="post">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Нет
                                                    </button>
                                                    <button type="submit" class="btn btn-danger">Да</button>
                                                    <input type="hidden" name="id" value="{{$User->id}}"/>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Имя</th>
                                <th>Email</th>

                            </tr>
                            </tfoot>

                        </table>
                        {!! $Users->render(); !!}
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->



@endsection
