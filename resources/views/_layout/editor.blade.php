@extends('_layout/site')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-3 page-sidebar">
                <aside>
                    <div class="inner-box">
                        <div class="user-panel-sidebar">

                            <h5> {{trans('leftPanel.Hello')}}, {{Auth::user()->first_name}} </h5>

                            <div class="collapse-box">
                                <h5 class="collapse-title"> {{trans('leftPanel.service')}} </h5>

                                <div class="panel-collapse collapse in" id="MyAds">
                                    <ul class="acc-list">
                                        <li><a class="{{Active::route('editor.chan.index')}}"
                                               href="{{route('editor.chan.index')}}"><i class="fa fa-magic"></i>
                                                {{trans('leftPanel.feed task')}}
                                            </a></li>
                                        <li><a class="{{Active::route('editor.order.*')}}"
                                               href="{{route('editor.order.index')}}"><i class="fa fa-tasks"></i>
                                                {{trans('leftPanel.task')}} <span
                                                        class="badge pull-right">{{Auth::user()->getTask()->count()}}</span>
                                            </a></li>
                                        <li><a class="{{Active::route('setting.*')}}"
                                               href="{{URL::route('setting.index')}}"><i class="fa fa-cog"></i>
                                                {{trans('leftPanel.settings')}} </a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>

                    @yield('timer')


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