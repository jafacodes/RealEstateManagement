<!DOCTYPE html>
<html id="project" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon " href="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! Html::style('website/css/bootstrap.min.css') !!}
    {!! Html::style('website/css/flexslider.css') !!}
    {!! Html::style('website/css/style.css') !!}
    {!! Html::style('website/css/font-awesome.min.css') !!}
    {!! Html::script('website/js/jquery.min.js') !!}




    <script type="application/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); }
    </script>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>

    {!! Html::style('cus/font.css') !!}
    <title>
    {{ getSetting() }}
        |
        @yield('title')
    </title>



@yield('header')
</head>
<body onload="loaderFunction()">
    <div id="app" style="direction:rtl;" >


        <div class="header">
            <div class="container"> <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-paper-plane"></i> ONE</a>
                <div class="menu pull-left">
                    <a class="toggleMenu" href="#">
                        <img src="{{ Request::root() }}/website/images/nav_icon.png" alt="" />
                    </a>
                    <ul class="nav" id="nav">
                        <li class="current"><a href="{{ url('/home') }}"> الرئيسية </a></li>
                        <li class="current"><a href="{{ url('/showAllBuildings') }}"> كل العقارات </a></li>
                        <li><a href="{{ url('/contact') }}"> إتصل بنا </a></li>
                        <li><a href="{{ url('/user/create/bu') }}"> أضف عقارك مجاناً </a></li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                إيجار <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @foreach(bu_type() as $key => $value)
                                    <li>
                                        <a href="{{ url('/search?rent=0&type='.$key) }}">
{{ $value }}
                                        </a>
                                    </li>
                                    <li>
                                        <hr />
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                تمليك <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @foreach(bu_type() as $key => $value)
                                    <li>
                                        <a href="{{ url('/search?rent=1&type='.$key) }}">
                                            {{ $value }}
                                        </a>
                                    </li>
                                    <li>
                                        <hr />
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}"> تسجيل دخول </a></li>
                            <li><a href="{{ route('register') }}">عضوية جديدة </a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    @if(Auth::user()->admin == 1)
                                        <li>
                                            <a href="{{ url('/admin_panel') }}">
                                                <i class="fa fa-dashboard"></i>
                                                لوحة تحكم الموقع
                                            </a>
                                        </li>
                                        <li>
                                           <hr />
                                        </li>
                                    @endif
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> تسجيل الخروج

                                        </a>


                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <div class="clear"></div>
                        {!! Html::script('website/js/responsive-nav.js') !!}
                    </ul>
                </div>
            </div>
        </div>


        @yield('content')


        {!! Html::script('website/js/bootstrap.min.js') !!}
        {!! Html::script('website/js/jquery.flexslider.js') !!}


        <div class="footer">
  <div class="footer_bottom">
    <div class="follow-us">
        <a class="fa fa-facebook social-icon" href="{{ getSetting('facebook') }}"></a>
        <a class="fa fa-twitter social-icon" href="{{ getSetting('twitter') }}"></a>
        <a class="fa fa-youtube social-icon" href="{{ getSetting('youtube') }}"></a>
    </div>
    <div class="copy">
      <p>Copyright &copy; 2018 Company Name. Design by <a href="{{ getSetting('facebook') }}" rel="nofollow">Jaa'far Hasan</a></p>
    </div>
  </div>
</div>



    </div>

    <!-- Sweet Alert -->
    {!! Html::script('cus/sweetalert.min.js') !!}
    {!! Html::script('cus/sweetalert-dev.js') !!}
    {!! Html::script('cus/bootstrap-notify.min.js') !!}


    @yield('footer')

</body>
</html>
