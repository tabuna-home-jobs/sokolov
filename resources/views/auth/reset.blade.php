@extends('_layout.site')

@section('content')







    <div class="container auth-container">
        <div class="col-xs-12 col-md-6 col-md-offset-3">


            <p class="lead text-center">{{trans('auth.Password recovery')}} :</p>


            <div class="well">
                <form action="{{ url('/auth/reset') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="form-group has-feedback">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                               placeholder="Email"/>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label>{{trans('auth.Password')}}</label>
                        <input type="password" class="form-control" name="password"
                               placeholder="{{trans('auth.Password')}}"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label>{{trans('auth.Repeat password')}}</label>
                        <input type="password" class="form-control" name="password_confirmation"
                               placeholder="{{trans('auth.Repeat password')}}"/>
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    </div>

                    <button type="submit" class="btn btn-warning btn-block">{{trans('auth.Change password')}}</button>

                </form>
            </div>
        </div>
    </div>



@endsection
