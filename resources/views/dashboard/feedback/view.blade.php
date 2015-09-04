@extends('app')

@section('content')



    <div class="hbox hbox-auto-xs hbox-auto-sm">
        <div class="col w-md bg-light dk b-r bg-auto">
            <div class="wrapper b-b bg">
                <button class="btn btn-sm btn-default pull-right visible-sm visible-xs" ui-toggle="show"
                        target="#email-menu"><i class="fa fa-bars"></i></button>
                <a href="{{URL::route('dashboard.feedback.create')}}" class="btn btn-sm btn-danger w-xs font-bold">Написать</a>
            </div>
            <div class="wrapper hidden-sm hidden-xs" id="email-menu">
                <ul class="nav nav-pills nav-stacked nav-sm">
                    <li><a href="/dashboard/feedback/"><i class="fa fa-inbox"></i> Входящее</a></li>
                    <li><a href="/dashboard/feedback?noread=true"><i class="fa fa-file-text-o"></i> Не прочитанные</a>
                    </li>
                </ul>
            </div>
        </div>


        <div class="col">
            <div ui-view="" class="ng-scope">
                <div class="ng-scope">
                    <!-- header -->
                    <div class="wrapper bg-light lter b-b">
                        <a tooltip="Back to Inbox" class="btn btn-sm btn-default w-xxs m-r-sm" ui-sref="app.mail.list"
                           href="/dashboard/feedback/"><i class="fa fa-long-arrow-left"></i></a>

                        <div class="btn-group m-r-sm">
                            <button tooltip="Archive" class="btn btn-sm btn-default w-xxs w-auto-xs"><i
                                        class="fa fa-print"></i></button>
                            <button tooltip="Report" class="btn btn-sm btn-default w-xxs w-auto-xs"><i
                                        class="fa fa-reply"></i></button>


                            <form action="{{URL::route('dashboard.feedback.destroy',$Feedback->id)}}" method="post" class="pull-right">
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-sm btn-default w-xxs w-auto-xs"><i
                                            class="fa fa-trash-o"></i></button>
                            </form>

                        </div>

                    </div>
                    <!-- / header -->
                    <div class="wrapper b-b">
                        <h2 class="font-thin m-n ng-binding">{{ $Feedback->fio  }}</h2>
                    </div>
                    <div class="wrapper b-b ng-binding">
                        <p class="pull-left"> от {{$Feedback->email}} в {{$Feedback->created_at}} </p>

                        <p class="text-right">Телефон: {{$Feedback->phone}}</p>
                    </div>
                    <div class="wrapper ng-binding">
                        {{$Feedback->content}}
                    </div>


                </div>
            </div>
        </div>

    </div>

@endsection
