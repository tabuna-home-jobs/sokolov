<script>
    swal({
        title: "{{$modal->name}}",
        text: "{!!$modal->body!!}",
        html: true
    });
</script>