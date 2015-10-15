@extends('_layout.site')

@section('content')


    <div class="container auth-container">
        <div class="col-xs-12 col-md-6 col-md-offset-3">

            <p class="lead text-center">{{trans('auth.Password recovery')}}</p>

            <div class="well well-danger">
                <form action="{{ url('/password/email')}}" method="post">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                               placeholder="Email"/>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>

                    <button type="submit" class="btn btn-warning btn-block"> {{trans('auth.Restore password')}}</button>


                    <hr>

                    <ul class="list-unstyled" style="line-height: 2">
                        <ol>
                            <span class="fa fa-check text-success"></span> {{trans('auth.In the form, specify your E-mail')}}
                        </ol>
                        <ol>
                            <span class="fa fa-check text-success"></span> {{trans("auth.Click on the 'forgot my password'.")}}
                        </ol>
                        <ol>
                            <span class="fa fa-check text-success"></span> {{trans('auth.On the specified mailbox will receive a letter containing a link to request a new password.')}}
                        </ol>
                        <ol>
                            <span class="fa fa-check text-success"></span> {{trans('auth.Click on the link in the email recovery.')}}
                        </ol>
                    </ul>

                    <hr>


                    <a href="/auth/login/"
                       class="btn btn-link btn-block">{{trans('auth.I remembered your password')}}</a>
                </form>
            </div>
        </div>
    </div>


@endsection
