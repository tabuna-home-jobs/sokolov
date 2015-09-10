@extends('_layout/site')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-3 page-sidebar">
                <aside>
                    <div class="inner-box">
                        <div class="user-panel-sidebar">
                            <div class="collapse-box">
                                <h5 class="collapse-title no-border"> Личное <a href="#MyClassified"
                                                                                data-toggle="collapse"
                                                                                class="pull-right"><i
                                                class="fa fa-angle-down"></i></a></h5>

                                <div class="panel-collapse collapse in" id="MyClassified">
                                    <ul class="acc-list">
                                        <li><a class="{{Active::route('home.*')}}"
                                               href="{{URL::route('home.index')}}"><i class="fa fa-home"></i> Домашняя
                                            </a></li>
                                        <li><a class="{{Active::route('setting.*')}}"
                                               href="{{URL::route('setting.index')}}"><i class="fa fa-cog"></i>
                                                Настройки </a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="collapse-box">
                                <h5 class="collapse-title"> Сервис <a href="#MyAds" data-toggle="collapse"
                                                                      class="pull-right"><i
                                                class="fa fa-angle-down"></i></a></h5>

                                <div class="panel-collapse collapse in" id="MyAds">
                                    <ul class="acc-list">
                                        <li><a class="{{Active::route('editor.chan.index')}}"
                                               href="{{route('editor.chan.index')}}"><i class="fa fa-magic"></i> ЧАН
                                            </a></li>
                                        <li><a class="{{Active::route('editor.order.index')}}"
                                               href="{{route('editor.order.index')}}"><i class="fa fa-tasks"></i>
                                                Задачи <span
                                                        class="badge pull-right">{{Auth::user()->getTask()->count()}}</span>
                                            </a></li>
                                        <li><a href="#"><i class="fa fa-usd"></i> Счета </a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="collapse-box">
                                <h5 class="collapse-title"> Управление <a href="#TerminateAccount"
                                                                          data-toggle="collapse" class="pull-right"><i
                                                class="fa fa-angle-down"></i></a></h5>

                                <div class="panel-collapse collapse in" id="TerminateAccount">
                                    <ul class="acc-list">
                                        <li><a href="/auth/logout"><i class="fa fa-sign-out "></i> Выйти </a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>

                </aside>
            </div>

            <div class="col-sm-9 page-content">
                <div class="inner-box">


                    @yield('content-editor')

                </div>
            </div>

        </div>

    </div>

@endsection