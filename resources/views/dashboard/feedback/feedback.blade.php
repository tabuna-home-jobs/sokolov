
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
                    <div class="col">

                        <div>


                            <!-- list -->
                            <ul class="list-group list-group-lg no-radius m-b-none m-t-n-xxs">


                                @forelse($Feedback as $mail )


                                        @if($mail->read)
                                            <li class="list-group-item clearfix b-l-3x">
                                        @else
                                            <li class="list-group-item clearfix b-l-3x b-l-info">
                                                @endif

                                    <div class="pull-right text-sm text-muted">
                                        <span class="hidden-xs ">{{ $mail->created_at  }}</span>
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <div class="clear">
                                        <div><a  class="text-md " href="{{URL::route('dashboard.feedback.show',$mail->id) }}">{{ $mail->fio  }}</a><span class="label bg-light m-l-sm ">{{ $mail->email  }}</span></div>
                                        <div class="text-ellipsis m-t-xs">{{str_limit($mail->content,100,'...')}}</div>
                                    </div>
                                </li>

                                        @empty
                                            <li class="list-group-item clearfix b-l-3x b-l-info"> Нет данных </li>
                                        @endforelse



                            </ul>

                            <!-- / list -->
                        </div>


                        {!! $Feedback->render() !!}

                    </div>
                </div>







@endsection
