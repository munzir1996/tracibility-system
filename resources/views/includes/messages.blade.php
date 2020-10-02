<script>
    toastr.options = {
        "closeButton": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-left",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    @if(count($errors->all()))
        @foreach($errors->all() as $error)
            toastr.error('{{$error}}', {timeOut: 5000});
        @endforeach
    @endif

    @if(Session::has('error'))
        toastr.error("{{Session::get('error')}}", {timeOut: 5000});
            @elseif(Session::has('success'))
        toastr.success("{{Session::get('success')}}", {timeOut: 5000});
    @endif
</script>
