@extends('layouts.app')

@section('title')
  أهلاً وسهلاً
  @endsection
@section('header')
  {!! Html::style('main/css/reset.css') !!}
  {!! Html::style('main/css/style.css') !!}
  {!! Html::script('main/js/modernizr.js') !!}
@endsection
@section('content')
<div class="banner text-center" style="background: url({{ checkIfImageExist(getSetting('main_slider') , '/public/website/slider/' , '/website/slider/') }}) no-repeat center;">
  <div class="container">
    <div class="banner-info">
      <h1>{{ getSetting() }}</h1>
      <p>{{ getSetting('desc') }}</p>
      <a class="banner_btn" href="{{ url('/user/create/bu') }}"> أضف عقارك مجاناً </a> </div>
  </div>
</div>
<div class="main">


  <ul class="cd-items cd-container">
    @foreach(\App\Bu::where('status' , 1)->limit(12)->get() as $bu)
    <li class="cd-item effect8">
      <img src="{{ checkIfImageExist($bu->image) }}" alt="{{ $bu->name }}" title="{{ $bu->name }}" style="width:100%;height: 250px">
      <a href="#0" data-id="{{ $bu->id }}" class="cd-trigger" title="{{ $bu->name }}"> نبذة سريعة </a>
    </li> <!-- cd-item -->
    @endforeach
  </ul> <!-- cd-items -->

  <div class="cd-quick-view">
    <div class="cd-slider-wrapper">
      <ul class="cd-slider">
        <li class="selected"><img style="height: 198px;width: 240px;" class="imagebox" src="" alt="" title=""></li>
      </ul> <!-- cd-slider -->
    </div> <!-- cd-slider-wrapper -->

    <div class="cd-item-info">
      <h2 class="titlebox"></h2>
      <p class="descbox"></p>

      <ul class="cd-item-action">
        <li><a class="add-to-cart pricebox"></a></li>
        <li><a href="" class="morebox"> المزيد ... </a></li>
      </ul> <!-- cd-item-action -->
    </div> <!-- cd-item-info -->
    <a href="#0" class="cd-close">Close</a>
  </div> <!-- cd-quick-view -->

</div>
@endsection

@section('footer')

  {!! Html::script('main/js/jquery-2.1.1.js') !!}
  {!! Html::script('main/js/velocity.min.js') !!}
  <script>
      function urlHome() {
          return '{{ Request::root() }}';
      }
      function noimage() {
          return '{{ getSetting('noimage') }}'
      }
  </script>
  {!! Html::script('main/js/main.js') !!}
@endsection
