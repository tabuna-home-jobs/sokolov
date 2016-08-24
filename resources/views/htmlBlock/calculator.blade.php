<form id="calculator-{{$id or  '0'}}" class="form-horizontal">

    <h3 class="text-center text-primary">{{trans('calc.Quick quote')}}</h3>

    <div class="form-group">
        <label for="service-{{$id or  '0'}}" class="col-sm-5 control-label text-left">
            <span class="pull-left">{{trans('calc.Service')}}</span>
        </label>

        <div class="col-sm-7">
            <select class="form-control" name="service-{{$id or  '0'}}">
                <option value="0" disabled selected>{{trans('calc.Select service')}}</option>
                @foreach($services as $value)
                    <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="form-group">
        <label for="speed-{{$id or  '0'}}" class="col-sm-5 control-label">
            <span class="pull-left">{{trans('calc.Speed')}}</span>
        </label>

        <div class="col-sm-7">
            <select class="form-control" name="speed-{{$id or  '0'}}" disabled>
                <option value="">{{trans('calc.Speed')}}</option>
            </select>
        </div>
    </div>


    <div class="form-group">
        <label for="words-{{$id or  '0'}}" class="col-sm-5">
            <span class="pull-left"> {{trans('calc.Number of words')}}</span><br>
            {{--
            <small class="pull-left small"> {{trans('calc.exclude references and numbers in tables')}}</small>
            --}}

        </label>

        <div class="col-sm-7">
            <input type="number" name="words-{{$id or  '0'}}" min="0" class="form-control" disabled placeholder="0">
        </div>
    </div>


    <div class="form-group">
        <label for="price-{{$id or  '0'}}" class="col-sm-5 control-label">
            <span class="pull-left">{{trans('calc.Estimate')}}</span>
        </label>

        <div class="col-sm-7">
            <input type="text" readonly class="form-control" min="0" name="price-{{$id or  '0'}}" placeholder="0.00">
        </div>
    </div>
    <div class="calc-button-{{$id or  '0'}}" style="display:none;">
        <div class="form-group">
            <div class="text-center">
                <a class="btn btn-primary" href="/{{App::getLocale()}}/feedback">
                    <strong>{{trans('calc.Outside your budget?')}}</strong>
                </a>
            </div>
        </div>


        {{--
        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
                <button type="submit" class="btn btn-warning">Click here</button>
            </div>
        </div>
        --}}
    </div>

</form>


<script>


    var price = [];

    $('select[name="service-{{$id or  '0'}}"]').change(function () {

        var csrf = $('meta[name="csrf_token"]').attr('content');
        var serviceId = $('select[name="service-{{$id or  '0'}}"] :selected').val();

        $("#loader-wrapper").show();

        $.ajax({
            type: "GET",
            url: "/calculator/service/" + serviceId,
            dataType: 'json',
            beforeSend: function (request) {
                request.setRequestHeader('X-CSRF-Token', csrf);
            },
            success: function (msg) {

                var option = "<option selected disabled value=''>{{trans('calc.Select speed')}}</option>";
                for (var i = 0; msg.length > i; i++) {
                    if (i % 2 == 0) {
                        option += "<option value='" + msg[i + 1] + "'>"
                                + msg[i] + "</option>";
                    }
                }
                $('select[name="speed-{{$id or  '0'}}"]').html(option);
                $('select[name="speed-{{$id or  '0'}}"]').attr('disabled', false);

                $('input[name="words-{{$id or  '0'}}"]').attr('disabled', false);

            },
            error: function () {
                console.log('ошибка');
            }
        });

        $("#loader-wrapper").hide();

    });


    $('select[name="speed-{{$id or  '0'}}"]').change(function () {
        $('input[name="words-{{$id or  '0'}}"]').val(0);
        $('input[name="price-{{$id or  '0'}}"]').val(0);
    });



    $("#calculator-{{$id or  '0'}}").submit(function( e ) {
        //e.preventDefault();
        $("#loader-wrapper").hide();
        e.preventDefault();
        $("#loader-wrapper").hide();
    });


    $('input[name="words-{{$id or  '0'}}"]').change(function () {
        var words = $('input[name="words-{{$id or  '0'}}"]').val();
        var speed = $('select[name="speed-{{$id or  '0'}}"] :selected').val();

        var dollar =   @if(App::getLocale()=='en') '$ ' @else '' @endif ;
        var rub =   @if(App::getLocale()=='ru') ' ₽' @else '' @endif ;



        if (speed > 0) {
            var price = (words * speed).toFixed(2)
        }
        else {
            var price = '{{trans('calc.It is calculated individually')}}';
        }

        $('input[name="price-{{$id or  '0'}}"]').val( dollar + price + rub );


        $(".calc-button-{{$id or  '0'}}").show('slow');

    });




</script>
