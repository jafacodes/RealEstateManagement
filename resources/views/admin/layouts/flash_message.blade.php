@if(Session::has('flash_message'))
    <script>

        swal({
            title: "{{ Session::get('flash_message') }}",
            text: " هذه الرسالة ستختفي بعد 4 ثواني ",
            timer: 4000,
            showConfirmButton: false,
            allowOutsideClick:true,
            customClass:"",

        });

    </script>

    @endif