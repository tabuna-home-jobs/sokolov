@extends('app')


@section('content')




    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Группы
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
                                <small><a class="btn btn-link btn-sm"
                                          href="{{URL::route('dashboard.groups.create')}}"><span
                                                class="fa fa-plus"></span>Добавить</a></small>
                            </h5>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Имя</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Groups as $key => $Group)
                                <tr>
                                    <td>{{$Group->id}}</td>
                                    <td>{{$Group->name}}</td>
                                    <td>
                                        <div class="btn-group pull-right" role="group" aria-label="...">
                                            <a href="{{URL::route('dashboard.groups.show', $Group->id)}}"
                                               class="btn btn-default">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>

                                            <a href="#" data-toggle="modal" data-target="#Modal-{{$Group->id}}"
                                               class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>


                                    <!-- Modal -->
                                    <div class="modal fade" id="Modal-{{$Group->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span
                                                                aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Удалить Задание ?</h4>
                                                </div>
                                                <div class="modal-body">
                                                    Вы действительно хотите удалить {{$Group->name}}
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{URL::route('dashboard.groups.destroy')}}"
                                                          method="post">
                                                        <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Нет
                                                        </button>
                                                        <button type="submit" class="button-small">Да</button>
                                                        <input type="hidden" name="id" value="{{$Group->id}}"/>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Имя</th>
                            </tr>
                            </tfoot>

                        </table>
                        {!! $Groups->render(); !!}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section><!-- /.content -->



@endsection
