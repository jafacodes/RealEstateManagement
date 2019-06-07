<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    {!! Html::style('adminApanel/css/main.css') !!}
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Sweet Alert -->
    {!! Html::style('cus/sweetalert.css') !!}

    <title>
        {{ getSetting() }}
        |
        @yield('title')
    </title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
    @yield('header')
    <style>
        .unread {
            background-color: #e5e5e5;
        }
    </style>
</head>
<body class="sidebar-mini fixed" style="direction:rtl;">
<div id="sound ">

</div>
<div class="wrapper">
    <!-- Navbar-->
    <header class="main-header hidden-print"><a class="logo" href="{{ url('/admin_panel') }}"> CPanel </a>
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
            <!-- Navbar Right Menu-->
            <div class="navbar-custom-menu">
                <ul class="top-nav">
                    <!--Notification Menu-->
                    <li class="dropdown notification-menu">
                        <a class="dropdown-toggle notification" href="#" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-bell-o fa-lg"></i>
                                <span class="badge badge-danger count">{{ count(auth()->user()->unreadNotifications) }}</span>
                        </a>
                        <ul class="dropdown-menu" >
                            <li class="not-head" id="showContacts"> لديك <span class="count">{{ count(auth()->user()->unreadNotifications) }}</span> رسائل جديدة </li>
                            @foreach(auth()->user()->notifications as $mess)
                                @if($mess->data['view'] === 0)
                            <li class="{{ $mess->read_at == null ? ' unread' : ''}}">
                                <a class="media " href="{{ url('/admin_panel/contact/'.$mess->data['contact_id'].'/edit') }}">

                      <span class="media-left media-icon">
                        <span class="fa-stack fa-lg">
                          <i class="fa fa-circle fa-stack-2x text-primary"></i>
                          <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                        </span>
                      </span>

                                    <div class="media-body">
                                        <span class="block">{!! $mess->data['name'] !!}</span>
                                        <span class="text-muted block">{!! $mess->data['type'] !!}</span>
                                    </div>

                                </a>
                            </li>
                                @endif
                                @endforeach

                            <li class="not-footer" ><a href="{{ url('/admin_panel/contact') }}"> رؤية جميع الرسائل</a></li>
                        </ul>
                    </li>

                    <!-- User Menu-->
                    <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a>
                        <ul class="dropdown-menu settings-menu">
                            <li><a href="{{ url('/admin_panel/sitesetting') }}"><i class="fa fa-cog fa-lg"></i> الإعدادات </a></li>
                            <li><a href="{{ url('/') }}"><i class="fa fa-globe fa-lg"></i> الموقع </a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-lg"></i> تسجيل الخروج

                                </a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="users" href="#!">
                            <i class="fa fa-users"></i>
                            <span class="badge badge-danger traffic">

                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Side-Nav-->
    <aside class="main-sidebar hidden-print">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-right image"><img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image"></div>
                <div class="info">
                    <p> جعفر حسن </p>
                    <p class="designation"> مبرمج ويب </p>
                </div>
            </div>
            <!-- Sidebar Menu-->
            @include('adminApanel.layouts.sidenav')
        </section>
    </aside>
    <div class="content-wrapper">
       @yield('content')
    </div>
</div>
<!-- Javascripts-->
{!! Html::script('adminApanel/js/jquery-2.1.4.min.js') !!}
{!! Html::script('adminApanel/js/bootstrap.min.js') !!}
{!! Html::script('adminApanel/js/plugins/pace.min.js') !!}
{!! Html::script('adminApanel/js/main.js') !!}



<!-- Sweet Alert -->
{!! Html::script('cus/sweetalert.min.js') !!}
{!! Html::script('cus/sweetalert-dev.js') !!}

{!! Html::script('cus/howler.min.js') !!}
<script src="{{ asset('StreamLab/StreamLab.js') }}"></script>

<script>
    var message,showDiv = $('#showContacts'), count = $('.count') , c , traffic = $('.traffic');
    var slh = new StreamLabHtml();
    var sls = new StreamLabSocket({
        appId:"{{ config('stream_lab.app_id') }}",
        channelName:"test",
        //channelSecret:"",
        // put * for receive all events
        event:"*",
        //user_id:"",
        //user_secret:""
    });


    sls.socket.onmessage = function(res){
        slh.setData(res);
        if(slh.getSource() === 'messages'){
            c = parseInt(count.html());
            count.html(c+1);
            message = slh.getMessage();
            showDiv.after('<li class="unread">'+
                message +'</div></a></li>');

            var sound = new Howl({
                src: ['{{ Request::root().'/audio/notify.mp3' }}']
            });

            sound.play();
        } else if(slh.getSource() === 'channels') {
            traffic.html(slh.getOnline());
        }
    }

    $(document).ready(function () {

    $('.notification').on('click',function () {
        setTimeout(function () {
            count.html(0);
            $('.unread').each(function () {
                $(this).removeClass('unread');
            });
        } , 5000);
        $.get('/admin_panel/contact/markAllSeen' , function () {});
    });


});

</script>

@include('adminApanel.layouts.flash_message')
@yield('footer')

</body>
</html>
