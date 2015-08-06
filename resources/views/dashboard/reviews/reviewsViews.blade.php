@extends('app')

@section('content')


    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">Отзыв:  {{ $Reviews->fio }}</h1>
    </div>
    <div class="wrapper-md">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading font-bold">Содержание</div>
                    <div class="panel-body">



                        <form action="/dashboard/reviews" method="post">


                            <div class="form-group">
                                <label for="fio">ФИО</label>
                                <input type="text" class="form-control" name="fio" id="fio" value="{{ $Reviews->fio or '' }}">
                            </div>

                            <div class="form-group">
                                <label for="content">Содержание</label>
                                <textarea class="form-control" name="content" id="content">{{ $Reviews->content or '' }}</textarea>
                            </div>








                            <input type="hidden" name="id" value="{{ $Reviews->id }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-default">Отправить</button>
                        </form>







                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

