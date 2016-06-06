
<form id="calculator-{{$id}}" class="form-horizontal">


    <div class="form-group">
        <label for="service-{{$id}}" class="col-sm-4 control-label">Service</label>
        <div class="col-sm-8">
            <select class="form-control" name="service-{{$id}}">
                <option value="0"  disabled selected>Выберите услугу</option>
                @foreach($services as $value)
                    <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="form-group">
        <label for="speed-{{$id}}" class="col-sm-4 control-label">Deadline</label>
        <div class="col-sm-8">
            <select class="form-control" name="speed-{{$id}}" disabled>
                <option value="">Deadline</option>
            </select>
        </div>
    </div>


    <div class="form-group">
        <label for="words-{{$id}}" class="col-sm-4 control-label">Number of words</label>
        <div class="col-sm-8">
            <input type="number" name="words-{{$id}}"  min="0" class="form-control" disabled  placeholder="0">
        </div>
    </div>


    <div class="form-group">
        <label for="price-{{$id}}" class="col-sm-4 control-label">Price</label>
        <div class="col-sm-8">
            <input type="text" readonly class="form-control" min="0" name="price-{{$id}}" placeholder="0.00">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-8 text-center">
            <a href="/{{App::getLocale()}}/feedback">Outside your budget?</a>
        </div>
    </div>
    <!--
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-10">
            <button type="submit" class="btn btn-warning">Click here</button>
        </div>
    </div>
    -->
</form>


<script>


    var price = [];

    $('select[name="service-{{$id}}"]').change(function () {

        var csrf = $('meta[name="csrf_token"]').attr('content');
        var serviceId = $('select[name="service-{{$id}}"] :selected').val();

        $("#loader-wrapper").show();

        $.ajax({
            type: "GET",
            url: "/calculator/service/" + serviceId,
            dataType: 'json',
            beforeSend: function(request) {
                request.setRequestHeader('X-CSRF-Token', csrf);
            },
            success: function(msg){

                var option = "<option selected disabled value=''>Выберите скорость</option>";
                for(var i = 0; msg.length > i; i++)
                {
                    if(i % 2 ==0) {
                        option += "<option value='" + msg[i+1] + "'>"
                                + msg[i] + "</option>";
                    }
                }
                $('select[name="speed-{{$id}}"]').html(option);
                $('select[name="speed-{{$id}}"]').attr('disabled', false);

                $('input[name="words-{{$id}}"]').attr('disabled', false);

            },
            error: function () {
                console.log('ошибка');
            }
        });

        $("#loader-wrapper").hide();

    });


    $('select[name="speed-{{$id}}"]').change(function () {
        $('input[name="words-{{$id}}"]').val(0);
        $('input[name="price-{{$id}}"]').val(0);
    });


    $('input[name="words-{{$id}}"]').change(function () {
        var words = $('input[name="words-{{$id}}"]').val();
        var speed = $('select[name="speed-{{$id}}"] :selected').val();

        if(speed > 0) {
           var price = words * speed
        }
        else{
           var price = 'Расчитывается индивидуально';
        }

        $('input[name="price-{{$id}}"]').val(price);
    });

</script>