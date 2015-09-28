@extends('_layout/site')

@section('content')


    <div class="container">
        <div class="sub-page-content">
            <div class="container">

                <div class="row">

                    <div class="col-md-6 col-md-offset-3 contact-form">
                        <h2 class="text-center">{{trans('feedback.Write to us')}}</h2>


                        <form action="/feedback" method="post">


                            <div class="form-group has-feedback">
                                <label for="username" class="control-label">{{trans('feedback.Full name')}}</label>
                                <input type="text" class="form-control" name="fio" required
                                       placeholder="{{trans('feedback.Full name')}}">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>


                            <div class="form-group has-feedback">
                                <label for="username" class="control-label">Email</label>
                                <input type="email" class="form-control" name="email" required placeholder="Email">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>


                            <div class="form-group has-feedback">
                                <label for="username" class="control-label">{{trans('feedback.Phone')}}</label>
                                <input type="text" class="form-control" name="phone" required
                                       placeholder="{{trans('feedback.Phone')}}">
                                <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
                            </div>


                            <div class="form-group">
                                <label for="username" class="control-label">{{trans('feedback.Message text')}}</label>
                                <textarea class="form-control" name="message" required rows="5"
                                          placeholder="{{trans('feedback.Message text')}}"></textarea>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>
                            <div class="form-group text-center">
                                <input class="btn btn btn-warning" type="submit" class="btn btn-default"
                                       value="{{trans('feedback.Send')}}">
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </div>


    </div>

@endsection