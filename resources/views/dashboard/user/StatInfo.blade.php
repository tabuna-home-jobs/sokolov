@extends('app')


@section('content')


    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3"> Учёт редакторов</h1>
    </div>
    <div class="wrapper-md">
        <div class="panel panel-default">

            <div class="table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-striped m-b-none dataTable no-footer" id="DataTables_Table_0"
                                   role="grid" aria-describedby="DataTables_Table_0_info">
                                <thead>
                                <tr role="row">
                                    <th>Имя</th>
                                    <th>Фамилия</th>
                                    <th>Количесво задач</th>
                                    <th>Количесво исполненых задач</th>
                                    <th>Объем исполненых задач</th>
                                    <th>Затраченное время</th>
                                    <th>Средняя производительность в месяц (Обьём/час)</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Editors as $key => $User)

                                    <tr class="raschet">
                                        <td>{{$User->first_name}}</td>
                                        <td>{{$User->last_name}}</td>
                                        <td>{{$User->getTask->count()}}</td>
                                        <td>{{$User->getTask->where('status','Завершена')->count()}}</td>
                                        <td class="count">{{$User->getTask->where('status','Завершена')->sum('countWork')}}</td>
                                        <td>
                                            @if($spent = $User->getTask()->where('status','Завершена')->sum('spent'))
                                            {{SecsToH::get($spent)}}
                                            @else
                                            0
                                            @endif

                                        </td>


                                        <td class="sred">{{
                                            $User
                                            ->getTask()
                                            ->where('created_at','>',$last->toDateTimeString())
                                            ->where('created_at','<',$to->toDateTimeString())
                                            ->where('status','Завершена')
                                            ->sum('spent')
                                            /60 /60
                                         }}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-6 text-center">
                            <small class="text-muted inline m-t-sm m-b-sm">
                                Пользователей: {!! $Editors->count() !!} из {!! $Editors->total() !!}
                            </small>
                        </div>
                        <div class="col-sm-6 text-right text-center-xs">
                            {!! $Editors->render() !!}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>









    <script>

        //Среднее за месяц

        $(".raschet").each(function () {

            var count = 0;

            $("td", this).each(function () {

                if ($(this).hasClass('count')) {
                    count = $(this).html();
                }
                if ($(this).hasClass('sred')) {
                    var result = (count / $(this).html()).toFixed(3);
                    if (isNaN(result)) {
                        result = '';
                    }

                    $(this).html(result);
                }
            });


        });


    </script>








@endsection
