
@extends('app')

@section('content')


    <div class="hbox hbox-auto-xs hbox-auto-sm">
        <div class="col w-md bg-light dk b-r bg-auto">
            <div class="wrapper b-b bg">
                <button class="btn btn-sm btn-default pull-right visible-sm visible-xs" ui-toggle="show" target="#email-menu"><i class="fa fa-bars"></i></button>
                <a href="{{URL::route('dashboard.feedback.create')}}" class="btn btn-sm btn-danger w-xs font-bold">Написать</a>
            </div>
            <div class="wrapper hidden-sm hidden-xs" id="email-menu">
                <ul class="nav nav-pills nav-stacked nav-sm">
                    <li><a href="/dashboard/feedback/"><i class="fa fa-inbox"></i> Входящее</a></li>
                    <li><a href="/dashboard/feedback?noread=true"><i class="fa fa-file-text-o"></i> Не прочитанные</a></li>
                </ul>
            </div>
        </div>



        <div class="panel panel-default">
            <div class="panel-heading font-bold">Написать новое сообщение</div>
            <div class="panel-body">

        <div class="col-xs-12">


            <div class="wrapper">



            <form method="post" action="{{URL::route('dashboard.feedback.store')}}" >

                <div class="box-body">
                    <div class="form-group">
                        <input class="form-control" name="email" required placeholder="Кому:" value="{{ $Feedback->email or '' }}"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="theme" required placeholder="Тема:"/>
                    </div>
                    <div class="form-group">
                    <textarea class="form-control textarea textareaedit" required name="contentmess" style="height: 400px">

                    </textarea>

                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Отправить</button>
                        </div>
                        <a href="/dashboard/feedback/"><button class="btn btn-default"><i class="fa fa-times"></i> Отмена</button></a>
                    </div><!-- /.box-footer -->
                </div><!-- /. box -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>


        </div>
    </div>
    </div>

    </div>
    </div>














@endsection
