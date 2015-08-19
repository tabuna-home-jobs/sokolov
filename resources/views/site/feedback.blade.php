@extends('_layout/site')

@section('content')


    <div class="container">
        <div class="sub-page-content">
            <div class="container">

                <div class="row">
                    <div class="col-md-8">
                        <h2 class="text-left">Как Добраться</h2>

                        <div class="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2423.2438515896024!2d39.592403!3d52.601363!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x413a14e9eece3c35%3A0xdfbc4fe617d626e0!2z0J7QutGC0Y_QsdGA0YzRgdC60LDRjyDRg9C7LiwgNjEsINCb0LjQv9C10YbQuiwg0JvQuNC_0LXRhtC60LDRjyDQvtCx0LsuLCAzOTgwNTk!5e0!3m2!1sru!2sru!4v1432638437060"
                                    width="600" height="450" frameborder="0" style="border:0"></iframe>
                        </div>
                        <div class="get-directions">
                            <form action="http://maps.google.com/maps" method="get" target="_blank">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="saddr"
                                           placeholder="Введите свой адрес"/>
                                    <input class="form-control" type="hidden" name="daddr"
                                           value="Октябрьская ул., 61, Липецк, Липецкая область"/>
                                </div>
                                <div class="form-group text-center">
                                    <input class="btn btn btn-warning" type="submit" value="Как добраться"
                                           class="direction-btn"/>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="col-md-4 contact-form">
                        <h2 class="text-right">Написать нам</h2>


                        <form action="/feedback" method="post">
                            <div class="form-group">
                                <input class="form-control" type="text" name="fio" placeholder="ФИО" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="phone" placeholder="Телефон" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" required
                                          placeholder="Текст сообщения"></textarea>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>
                            <div class="form-group text-center">
                                <input class="btn btn btn-warning" type="submit" class="btn btn-default"
                                       value="Отправить">
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </div>


    </div>

@endsection