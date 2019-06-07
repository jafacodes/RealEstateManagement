@extends('layouts.app')

@section('title')
 كل العقارات
@endsection

@section('header')
    {!! Html::style('cus/buall.css') !!}
    {!! Html::style('cus/sidebar.css') !!}
    {!! Html::style('cus/select2/css/select2.min.css') !!}
    <style>
        .marg {
            margin-bottom: 5px;
        }
    </style>

@section('content')
    <div class="clearfix"></div>

    <div class="container">

        <div class="col-md-9 bus">


            @if(isset($search) && !empty($search))
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"> الرئيسية </a></li>
                        @foreach($search as $key => $value)
                            @if($loop -> last)
                                @if($key == 'type')
                                    <li class="breadcrumb-item active"> {{ bu_searchname()[$key] }} : {{ bu_type()[$value] }} </li>
                                @elseif($key == 'rent')
                                    <li class="breadcrumb-item active"> {{ bu_searchname()[$key] }} : {{ bu_rent()[$value] }} </li>
                                @elseif($key == 'place')
                                    <li class="breadcrumb-item active" > {{ bu_searchname()[$key] }} : {{ bu_place()[$value] }} </li>
                                @else
                                    <li class="breadcrumb-item active" > {{ bu_searchname()[$key] }} : {{ $value }} </li>
                                @endif
                            @else
                                @if($key == 'type')
                                    <li class="breadcrumb-item" > {{ bu_searchname()[$key] }} : {{ bu_type()[$value] }} </li>
                                @elseif($key == 'rent')
                                    <li class="breadcrumb-item" > {{ bu_searchname()[$key] }} : {{ bu_rent()[$value] }} </li>
                                @elseif($key == 'place')
                                    <li class="breadcrumb-item" > {{ bu_searchname()[$key] }} : {{ bu_place()[$value] }} </li>
                                @else
                                    <li class="breadcrumb-item"> {{ bu_searchname()[$key] }} : {{ $value }} </li>
                                @endif
                            @endif
                        @endforeach

                    </ol>
                </div>
            @endif


            @include('website.bu.shareFile')
            <div class="col-md-12">
            <div class="text-center">
                @if(!isset($search))
                {{ $bu->appends(Request::except('page'))->render() }}
                 @endif
                @if(isset($more) && $more)
                    <button id="more" class="btn btn-warning large" name="btn_more">
                        شاهد المزيد ...
                    </button>
                    @endif
            </div>
            </div>
            <div class="clearFix"></div>
            <br />
        </div>


        <div class="col-md-3">

            @if(auth()->user())
            <div class="profile-usermenu">
                <ul class="nav">
                    <li class="active">
                        <a href="{{ url('/user/edit/info') }}">
                            <i class="fa fa-home"></i>
                            تعديل المعلومات الشخصية
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/user/show/bu') }}">
                            <i class="fa fa-user"></i>
                            عقاراتي
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/user/create/bu') }}">
                            <i class="fa fa-reply"></i>
                            أضف عقار
                        </a>
                    </li>


                </ul>
            </div>
            @endif

            <div class="profile-usermenu input-side">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-usertitle">
                    <h3 class="profile-usertitle-name">
                        البحث المتقدم
                    </h3>
                </div>

                {!! Form::open(['url' => '#' , 'method' => 'GET' ,'class' => 'form-horizontal' , 'id' => 'form_search']) !!}
                <div>
                <ul class="nav marg" style="padding-left: 20px">
                    <li class="marg">
                        {!! Form::text("price_from" , null , ['class' => 'form-control' , 'placeholder' => ' سعر العقار من ']) !!}
                    </li>
                    <li class="marg">
                        {!! Form::text("price_to" , null , ['class' => 'form-control' , 'placeholder' => ' سعر العقار إلى ']) !!}
                    </li>
                    <li class="marg">
                        {!! Form::number("rooms" , null , ['class' => 'form-control' , 'placeholder' => ' عدد الغرف ']) !!}
                    </li>
                    <li class="marg">
                        {!! Form::select("type" ,bu_type(),null , ['class' => 'form-control', 'placeholder' => ' نوع العقار ']) !!}
                    </li>
                    <li class="marg">
                        {!! Form::select("rent" , bu_rent(),null , ['class' => 'form-control', 'placeholder' => 'نوع العملية ']) !!}
                    </li>
                    <li class="marg">
                        {!! Form::select("place" , bu_place(),null , ['class' => 'form-control select2', 'placeholder' => 'منطقة العقار ']) !!}
                    </li>
                    <li class="marg">
                        {!! Form::text("square" , null , ['class' => 'form-control', 'placeholder' => ' مساحة العقار ']) !!}
                    </li>
                    <li class="marg">
                        {!! Form::submit("إبحث" , null,['class' => 'btn_banner']) !!}
                    </li>
                </ul>


                </div>
            </div>
            <div class="clearfix"></div>
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="{{ url('/showAllBuildings') }}">
                                <i class="fa fa-home"></i>
                             كل العقارات
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/forRent') }}">
                                <i class="fa fa-user"></i>
                                 إيجار
                                 </a>
                        </li>
                        <li>
                            <a href="{{ url('/forBuy') }}">
                                <i class="fa fa-reply"></i>
                                 تمليك
                                 </a>
                        </li>
                        <li>
                            <a href="{{ url('/type/0') }}">
                                <i class="fa fa-reply"></i>
                                الشقق
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/type/1') }}">
                                <i class="fa fa-reply"></i>
                                الفلل
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/type/2') }}">
                                <i class="fa fa-reply"></i>
                                الشاليهات
                            </a>
                        </li>

                    </ul>
                </div>
                <!-- END MENU -->

        </div>


    </div>


@endsection

@section('footer')
    {!! Html::script('cus/select2/js/select2.js') !!}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



        $(document).ready(function(){

            $(".select2").select2({
                dir:'rtl',
            });

            var count = 3;
            var price_from = $('input[name = "price_from"]').val();
            var price_to = $('input[name = "price_to"]').val();
            var rooms = $('input[name = "rooms"]').val();
            var type = $('select[name = "type"]').val();
            var rent = $('select[name = "rent"]').val();
            var place = $('select[name = "place"]').val();
            var square = $('input[name = "square"]').val();
            var  _token = $('input[name = "_token"]').val();
            $("button").click(function () {
                //GET
                var dataString = '_token ='+_token+'&&price_from='+price_from+'&&price_to='+price_to+'&&rooms='+
                    rooms+'&&type='+type+'&&rent='
                    +rent+'&&place='+place+'&&square='+square+'&&count=';
                        @if(isset($count))
                    dataString += parseInt({{ $count }});
                    @else
                        dataString += count;
                        @endif

                    //POST
                var d = new FormData();
                d.append('_token', _token);
                d.append('price_from', price_from);
                d.append('price_to', price_to);
                d.append('rooms', rooms);
                d.append('type', type);
                d.append('rent', rent);
                d.append('place',place);
                d.append('square', square);
                @if(isset($count))
                d.append('count', parseInt({{ $count }}));
                @else
                d.append('count', count);
                @endif
                $.ajax({
                    type: 'POST',
                    url: 'search',
                    data: d,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#app').html(data);
                    },
                    error: function (data) {
                        swal({
                            title: "Error!",
                            text: data,
                            type: "error",
                            confirmButtonText: "Cool"
                        });
                    }
                });
            });


            $("#form_search").submit(function (e) {
                e.preventDefault();
                 price_from = $('input[name = "price_from"]').val();
                price_to = $('input[name = "price_to"]').val();
                 rooms = $('input[name = "rooms"]').val();
                 type = $('select[name = "type"]').val();
                 rent = $('select[name = "rent"]').val();
                place = $('select[name = "place"]').val();
                 square = $('input[name = "square"]').val();

                 _token = $('input[name = "_token"]').val();
                // GET
                 var dataString = '_token ='+_token+'&&price_from='+price_from+'&&price_to='+price_to+'&&rooms='+rooms+'&&type='+type+'&&rent='
                +rent+'&&place='+place+'&&square='+square+'&&count='+count;
                 //POST
                var d = new FormData();
                d.append('_token',_token);
                d.append('price_from',price_from);
                d.append('price_to',price_to);
                d.append('rooms',rooms);
                d.append('type',type);
                d.append('rent',rent);
                d.append('place',place);
                d.append('square',square);
                d.append('count' , count);

                $.ajax({
                    type:'POST',
                    url:'search',
                    data:d,
                    processData: false,
                    contentType: false,
                    success:function (data) {
                        $('#app').html(data);
                    },
                    error:function (data) {
                        swal({
                            title: "Error!",
                            text: data,
                            type: "error",
                            confirmButtonText: "Cool"
                        });
                    }
                });
            })
        });
    </script>
    @endsection
