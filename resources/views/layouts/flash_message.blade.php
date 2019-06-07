@if(Session::has('flash_message'))
    <script>
        $.notify({
            title: " رسالة ",
            message: " {{ Session::get('flash_message') }} ",
            icon: 'fa fa-check'
        },{
            type: "primary"
        });
    </script>

    @endif