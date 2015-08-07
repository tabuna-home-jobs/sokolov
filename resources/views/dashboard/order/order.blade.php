@extends('app')

@section('content')


    <section class="app-content-full">


        <!-- hbox layout -->
        <div class="hbox hbox-auto-xs bg-light">
            <!-- column -->
            <div class="col w lter b-r" ng-controller="CustomTabController">
                <div class="vbox">
                    <div class="wrapper b-b">
                        <div class="font-thin h4">Заявки</div>
                    </div>
                    <div class="nav-tabs-alt">
                        <ul class="nav nav-tabs nav-justified">
                            <li>
                                <a href ng-click="tab(0)">Все</a>
                            </li>
                            <li>
                                <a href ng-click="tab(1)">Опл</a>
                            </li>
                            <li>
                                <a href ng-click="tab(2)">Зав</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row-row">
                        <div class="cell scrollable hover">
                            <div class="cell-inner">


                                <ul class="list-group">
                                    @foreach($Orders as $order)
                                        <a href="#" class="list-group-item">{{$order->name}}</a>
                                    @endforeach
                                </ul>

                                {!! $Orders->render() !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /column -->

            <!-- column -->
            <div class="col">
                <div class="vbox">
                    <div class="row-row">
                        <div class="cell">
                            <div class="cell-inner">
                                <div class="wrapper-md">


                                    <div class="bg-light lter b-b wrapper-md">
                                        <h1 class="m-n font-thin h3"> Имя работы</h1>
                                    </div>
                                    <div class="wrapper-md panel">


                                        <div class="well m-t bg-light lt">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <strong>Заказал:</strong>
                                                    <h4>Черняев Алексаднр</h4>

                                                    <p>
                                                        <span class="glyphicon glyphicon-earphone"> Телефон: 031-432-678 </span>
                                                    </p>

                                                    <p>
                                                        <span class="glyphicon glyphicon-envelope"> Email: youemail@gmail.com</span>
                                                    </p>

                                                </div>
                                                <div class="col-xs-6">
                                                    <strong>Инфомация:</strong>

                                                    <p>
                                                       Перевод
                                                    </p>

                                                    <p>
                                                        Проверка на грамматику
                                                    </p>
                                                    <p>
                                                        Проверка на грамматику
                                                    </p>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="line line-dashed b-b line-lg pull-in"></div>

                                        <div class="form-group col-xs-6">
                                            <label>Цена</label>

                                            <div class="input-group">
                                                <input class="form-control" type="number" maxlength="255" required
                                                       name="price"
                                                       value="">

                                                <div class="input-group-addon">
                                                    <i class="fa fa-rub"></i>
                                                </div>
                                            </div>
                                            <!-- /.input group -->
                                        </div>

                                        <div class="form-group col-xs-6">
                                            <label>Вложить файл</label>

                                            <div class="fileinput fileinput-new btn-block" data-provides="fileinput">
                                                <span class="btn btn-default btn-file btn-block"><span class="fileinput-new fa fa-cloud-upload text btn-block"> Выбрать файл</span><span class="fileinput-exists btn-block">Изменить</span><input type="file" name="..."></span>
                                                <span class="fileinput-filename"></span>
                                                <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
                                            </div>


                                        </div>


                                        <div class="line line-dashed b-b line-lg pull-in"></div>


                                        <div class="form-group col-xs-6">
                                            <label>Дата окончания</label>

                                            <div class='input-group date' id='datetimepickerorder'>
                                                <input type='text' class="form-control" required name="end" value=""/>
                                    <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                            </div>
                                        </div>


                                        <div class="form-group col-xs-6">
                                            <label>Статус</label>
                                            <select class="form-control w-md" ui-jq="chosen" required name="status">
                                                <option>Статус №1</option>
                                                <option>Статус №2</option>
                                                <option>Статус №3</option>
                                            </select>
                                        </div>


                                        <div class="line line-dashed b-b line-lg pull-in"></div>


                                        <div class="m-b-sm">
                                            <div class="btn-group btn-group-justified">
                                                <a href="#" class="btn btn-link"> <span
                                                            class="glyphicon glyphicon-download-alt"> Вложенный файл</span></a>
                                                <span class="btn btn-link"><span
                                                            class="glyphicon glyphicon-time"><br><br> <small>Aug 26 '13
                                                            at 13:26
                                                        </small></span></span>
                                                <a href="#" class="btn btn-link"> <span
                                                            class="glyphicon glyphicon-download-alt"> Отправленный файл</span></a>
                                            </div>
                                        </div>




                                        <button type="submit" class="btn btn-success btn-block">Сохранить</button>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /column -->

            <!-- column -->
            <div class="col w-md lter b-l">
                <div class="vbox">
                    <div class="wrapper b-b b-light">
                        <div class="font-thin h4">Комментарии</div>
                        <small class="text-muted">к заказу</small>
                    </div>
                    <div class="row-row">
                        <div class="cell">
                            <div class="cell-inner">
                                <div class="wrapper-md">


                                    <!-- streamline -->

                                    <div class="streamline b-l m-b">
                                        <div class="sl-item">
                                            <div class="m-l">
                                                <div class="text-muted">07-08-2015 8:30</div>
                                                <p>Проанализированы характерные особенности грамматического способа толкования, использование в процессе такого толкования различных методов лингвистического и юридического анализа</p>
                                            </div>
                                        </div>
                                        <div class="sl-item">
                                            <div class="m-l">
                                                <div class="text-muted">07-08-2015 8:30</div>
                                                <p>Проанализированы характерные особенности грамматического способа толкования, использование в процессе такого толкования различных методов лингвистического и юридического анализа</p>
                                            </div>
                                        </div>
                                        <div class="sl-item">
                                            <div class="m-l">
                                                <div class="text-muted">07-08-2015 8:30</div>
                                                <p>Проанализированы характерные особенности грамматического способа толкования, использование в процессе такого толкования различных методов лингвистического и юридического анализа</p>
                                            </div>
                                        </div>
                                        <div class="sl-item">
                                            <div class="m-l">
                                                <div class="text-muted">07-08-2015 8:30</div>
                                                <p>Проанализированы характерные особенности грамматического способа толкования, использование в процессе такого толкования различных методов лингвистического и юридического анализа</p>
                                            </div>
                                        </div>
                                        <div class="sl-item">
                                            <div class="m-l">
                                                <div class="text-muted">07-08-2015 8:30</div>
                                                <p>Проанализированы характерные особенности грамматического способа толкования, использование в процессе такого толкования различных методов лингвистического и юридического анализа</p>
                                            </div>
                                        </div>
                                        <div class="sl-item">
                                            <div class="m-l">
                                                <div class="text-muted">07-08-2015 8:30</div>
                                                <p>Проанализированы характерные особенности грамматического способа толкования, использование в процессе такого толкования различных методов лингвистического и юридического анализа</p>
                                            </div>
                                        </div>
                                        <div class="sl-item">
                                            <div class="m-l">
                                                <div class="text-muted">07-08-2015 8:30</div>
                                                <p>Проанализированы характерные особенности грамматического способа толкования, использование в процессе такого толкования различных методов лингвистического и юридического анализа</p>
                                            </div>
                                        </div>
                                        <div class="sl-item">
                                            <div class="m-l">
                                                <div class="text-muted">07-08-2015 8:30</div>
                                                <p>Проанализированы характерные особенности грамматического способа толкования, использование в процессе такого толкования различных методов лингвистического и юридического анализа</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- / streamline -->


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="padder b-t b-light text-center">
                        <div class="m-xs">
                            <form>
                                <div class="form-group">
                                    <label>Написать комментарий</label>
                                    <textarea class="form-control" rows="3" style="resize: none;"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Отправить</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /column -->
        </div>
        <!-- /hbox layout -->


    </section>

@endsection






