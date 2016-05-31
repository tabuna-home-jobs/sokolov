@extends('_layout/site')


@section('title',trans('feedback.Contact Us'))


@section('content')


    <div class="container">
        <div class="sub-page-content">
            <div class="container">


                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-center">{{trans('feedback.Write to us')}}
                            <small>/{{trans('feedback.Quick quote via e-mail')}}</small>
                        </h2>
                    </div>
                </div>

                <div class="row v-center">

                    <div class="col-md-6 col-md-offset-1 contact-form">

                        <form action="/feedback" method="post" enctype="multipart/form-data">


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
                                       placeholder="{{trans('feedback.Phone')}}"
                                       data-mask="+ 9-999-999-99-99">
                                <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
                            </div>

                            <div class="form-group">
                                <input class="form-control" type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>

                            <div class="form-group  has-feedback">
                                <label for="upload" class="control-label">{{trans('feedback.Attach file')}}</label>

                                <div class="">
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput"><i
                                                    class="glyphicon glyphicon-file fileinput-exists"></i> <span
                                                    class="fileinput-filename"></span></div>
                                        <span class="input-group-addon btn btn-default btn-file"><span
                                                    class="fileinput-new"><i class="fa fa-upload"
                                                                             aria-hidden="true"></i></span><span
                                                    class="fileinput-exists"><i class="fa fa-folder-open-o"
                                                                                aria-hidden="true"></i></span><input
                                                    type="file" name="upload"></span>
                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                           data-dismiss="fileinput"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="username" class="control-label">{{trans('feedback.Message text')}}</label>
                                <textarea class="form-control no-resize" name="message" required rows="5"></textarea>
                            </div>


                            <div class="form-group text-center">
                                <input class="btn btn btn-warning" type="submit" class="btn btn-default"
                                       value="{{trans('feedback.Send')}}">
                            </div>
                        </form>

                    </div>


                    <div class="col-xs-12 col-md-4">
                        <div class="well well-primary">
                            <p class="lead">{{trans('auth.Register now for ')}} {{trans('auth.free')}}
                            </p>
                            <ul class="list-unstyled" style="line-height: 2">
                                <li><span class="fa fa-check text-success"></span> {{trans('auth.Create orders')}}</li>
                                <li><span class="fa fa-check text-success"></span> {{trans('auth.Pay for services')}}
                                </li>
                                <li><span class="fa fa-check text-success"></span> {{trans('auth.Check order status')}}
                                </li>
                                <li><span class="fa fa-check text-success"></span> {{trans('auth.Send questions')}}</li>
                                <li><span class="fa fa-check text-success"></span> {{trans('auth.Leave reviews')}}</li>
                            </ul>
                            <p class="text-center"><a href="/auth/register/"
                                                      class="btn btn-info">{{trans('auth.I want to register')}}</a></p>

                            <p class="text-center"><a target="_blank"
                                                      href="@if(App::getLocale()=='ru') /page/publichnaya-oferta-ob-okazanii-perevodcheskikh-i-inykh-uslug @else /page/public-offer-on-provision-of-translation-and-other-services @endif">{{trans('auth.Terms of use')}}</a>
                            </p>
                        </div>
                    </div>


                </div>

            </div>
        </div>


    </div>

@endsection