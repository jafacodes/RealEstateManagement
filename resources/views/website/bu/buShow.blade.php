@extends('layouts.app')

@section('title')
    تفاصيل العقار
    {{ $buShow->name }}
@endsection

@section('header')
    {!! Html::style('cus/busingle.css') !!}
<style>
    li{float: right !important;}
</style>


    <style>
        /* Center the loader */
        #loader {
            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 1;
            width: 150px;
            height: 150px;
            margin: -75px 0 0 -75px;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Add animation to "page content" */
        .animate-bottom {
            position: relative;
            -webkit-animation-name: animatebottom;
            -webkit-animation-duration: 1s;
            animation-name: animatebottom;
            animation-duration: 1s
        }

        @-webkit-keyframes animatebottom {
            from { bottom:-100px; opacity:0 }
            to { bottom:0px; opacity:1 }
        }

        @keyframes animatebottom {
            from{ bottom:-100px; opacity:0 }
            to{ bottom:0; opacity:1 }
        }

        #myDiv {
            display: none;
            text-align: center;
        }
    </style>

    <style>
        html {
            position: relative;
            min-height: 100%;
        }
        body {
            /* Margin bottom by footer height */
            margin-bottom: 150px;
        }
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            /* Set the fixed height of the footer here */
            height: 150px;
            background-color: #f5f5f5;
        }
    </style>


    {!! Html::style('cus/buall.css') !!}
    @endsection
@section('content')
    <div class="container">
        <div class="col-md-12 alert alert-info text-center">
             تفاصيل العقار
            {{ $buShow->name }}
        </div>
    </div>
    <div class="container  animate-bottom" id="myDiv">
        <div class="content-wrapper">
            <div class="item-container">
                <div class="container">
                    <div class="col-md-12">
                        <div class="product col-md-3 service-image-left">

                            <center>
                                <img id="item-display" src="{{ checkIfImageExist($buShow->image) }}" alt="">
                            </center>
                        </div>

                        <div class="container service1-items col-sm-2 col-md-2 pull-left">
                            <center>
                                <a id="item-1" class="service1-item">
                                    <img src="{{ checkIfImageExist($buShow->image) }}" alt=""></img>
                                </a>
                                <a id="item-2" class="service1-item">
                                    <img src="{{ checkIfImageExist($buShow->image) }}" alt=""></img>
                                </a>
                                <a id="item-3" class="service1-item">
                                    <img src="{{ checkIfImageExist($buShow->image) }}" alt=""></img>
                                </a>
                            </center>
                        </div>

                        <div class="col-md-7">
                            <div class="product-title">{{ $buShow->name }}</div>
                            <div class="product-desc">{{ $buShow->small_desc }}</div>
                            <div class="product-rating"><i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star-o"></i> </div>
                            <hr>
                            <div class="product-price">$ {{ $buShow->price }}</div>
                            <div class="product-stock">-</div>
                            <hr>
                            <div class="btn-group cart">
                                <button type="button" class="btn btn-success">
                                    Add to cart
                                </button>
                            </div>
                            <div class="btn-group wishlist">
                                <button type="button" class="btn btn-danger">
                                    Add to wishlist
                                </button>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="container">
                @include('website.bu.shareFile' , ['bu' => $same_rent])
                @include('website.bu.shareFile' , ['bu' => $same_type])
            </div>
            <div class="container">
                <div class="col-md-12 product-info">
                    <ul id="myTab" class="nav nav-tabs nav_tabs ">

                        <li class="active"><a href="#service-one" data-toggle="tab"> الموقع على الخريطة </a></li>
                        <li><a href="#service-two" data-toggle="tab"> الموقع على الخريطة </a></li>
                        <li><a href="#service-three" data-toggle="tab">REVIEWS</a></li>

                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade in active" id="service-one">

                            <section class="container product-info">
                                <div id="map" style="width:100%;height:500px"></div>
                            </section>

                        </div>
                        <div class="tab-pane fade" id="service-two">

                            <section class="container product-info">
                                {{ $buShow->large_desc }}
                            </section>

                        </div>
                        <div class="tab-pane fade" id="service-three">
                            <section class="container product-info">
                                {{ $buShow->large_desc }}
                            </section>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <div id="loader"></div>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-595e11a49e7ef402"></script>


@endsection

@section('footer')
    <script>
        function myMap() {
            var mapCanvas = document.getElementById("map");
            var myCenter = new google.maps.LatLng(parseFloat({{ $buShow->latitude }}),parseFloat({{ $buShow->longitude }}));
            var mapOptions = {center: myCenter, zoom: 13};
            var map = new google.maps.Map(mapCanvas,mapOptions);
            var marker = new google.maps.Marker({
                position: myCenter,
                animation: google.maps.Animation.BOUNCE
            });
            marker.setMap(map);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBr8goUGuWiaPqWN4DMCIGjYADNdo9hMo8&callback=myMap"></script>

    <script>
        var myVar;

        function loaderFunction() {
            myVar = setTimeout(showPage, 1000);
        }

        function showPage() {
            document.getElementById("loader").style.display = "none";
            document.getElementById("myDiv").style.display = "block";
        }
    </script>


@endsection