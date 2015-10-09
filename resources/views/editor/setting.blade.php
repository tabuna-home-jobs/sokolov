@extends('_layout/editor')

@section('content-editor')


    <div id="accordion" class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" >
                <h4 class="panel-title"><a
                            role="button" data-toggle="collapse" data-parent="#accordion"
                            href="#collapseB1" aria-expanded="false" aria-controls="collapseB1"

                            > {{trans('setting.Personal data')}} </a></h4>
            </div>
            <div class="panel-collapse collapse in" id="collapseB1">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="post" action="{{URL::route('setting.update')}}">


                        <div class="form-group">
                            <label class="col-sm-3 control-label"> {{trans('setting.title')}}</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="dignity" value="{{$User->dignity}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"> {{trans('setting.First Name')}}</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="first_name" value="{{$User->first_name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> {{trans('setting.Last Name')}}</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="last_name" value="{{$User->last_name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email</label>

                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email" value="{{$User->email}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{trans('setting.Repeat email')}}</label>

                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email_confirmation"
                                       value="{{$User->email}}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="Phone" class="col-sm-3 control-label"> {{trans('setting.Phone')}}</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="phone"
                                       placeholder="+79802665074"
                                       value="{{$User->phone}}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label"> {{trans('setting.Country')}}</label>

                            <div class="col-sm-9">

                                <select class="form-control" name="country_id">

                                    @foreach($Country as $value)

                                        @if($value->id == $User->country_id )

                                            <option selected value="{{$value->id}}">{{$value->name}}</option>
                                        @else
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                        @endif
                                    @endforeach
                                </select>

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label"> {{trans('setting.Institution')}}</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="institution"
                                       value="{{$User->institution}}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label"> {{trans('setting.UTC')}}</label>

                            <div class="col-sm-9">
                                <select class="form-control" name="utc">

                                    @foreach($Zone as $value)
                                        <option value="{{$value->zone_name}}"
                                                @if($User->utc == $value->zone_name) selected @endif>{{$value->zone_name}}</option>
                                    @endforeach

                                </select>


                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-default"> {{trans('setting.Change')}}</button>
                            </div>
                        </div>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="type" value="personal">
                    </form>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" >
                <h4 class="panel-title"><a  role="button" data-toggle="collapse" data-parent="#accordion"
                                            href="#collapseB2" aria-expanded="false" aria-controls="collapseB2">
                        {{trans('setting.Security')}} </a>
                </h4>
            </div>
            <div class="panel-collapse collapse" id="collapseB2" style="height: 0px;">
                <div class="panel-body">
                    <form class="form-horizontal" method="post" role="form" action="{{URL::route('setting.update')}}">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> {{trans('setting.New Password')}}</label>

                            <div class="col-sm-9">
                                <input type="password" name="password" class="form-control" placeholder="******">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label"> {{trans('setting.Repeat password')}}</label>

                            <div class="col-sm-9">
                                <input type="password" name="password_confirmation" class="form-control"
                                       placeholder="******">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-default"> {{trans('setting.Change')}}</button>
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" class="form-control" name="type" value="password">
                    </form>
                </div>
            </div>
        </div>




        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                       href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        {{trans('setting.Notification')}}
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                 aria-labelledby="headingThree">
                <div class="panel-body">


                    <form class="form-horizontal" action="{{URL::route('setting.update')}}"
                          method="post">

                        <div class="col-sm-12">


                            <div class="form-group col-xs-12">
                                <label class="col-sm-4 control-label">{{trans('setting.I want to be notified by Email')}}</label>

                                <div class="col-sm-8">
                                    <p>
                                        <label class="i-switch m-t-xs m-r">
                                            <input type="radio" name="email_notification"
                                                   @if(Auth::user()->email_notification) checked="" @endif value="1">
                                            {{trans('setting.Yes')}}
                                        </label>
                                        <label class="i-switch m-t-xs m-r">
                                            <input type="radio" name="email_notification"
                                                   @if(!Auth::user()->email_notification) checked="" @endif value="0">
                                            {{trans('setting.No')}}
                                        </label>
                                    </p>
                                </div>
                            </div>


                            <div class="form-group col-xs-12">
                                <label class="col-sm-4 control-label">{{trans('setting.I want to be notified by Phone')}}</label>

                                <div class="col-sm-8">
                                    <p>
                                        <label class="i-switch m-t-xs m-r">
                                            <input type="radio" name="phone_notification"
                                                   @if(Auth::user()->phone_notification) checked="" @endif value="1">
                                            {{trans('setting.Yes')}}
                                        </label>
                                        <label class="i-switch m-t-xs m-r">
                                            <input type="radio" name="phone_notification"
                                                   @if(!Auth::user()->phone_notification) checked="" @endif value="0">
                                            {{trans('setting.No')}}
                                        </label>
                                    </p>
                                </div>



                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <input type="hidden" class="form-control" name="type" value="notification">
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-primary">{{trans('setting.Change')}}</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>

@endsection