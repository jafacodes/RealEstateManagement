@extends('layouts.app')

@section('title')
تعديل البيانات الشخصية
@endsection

@section('header')
    {!! Html::style('cus/contact.css') !!}
    <style>
        input.form-control , select.form-control {
            border-radius: 20px !important;
            height: 50px !important;
        }
    </style>
@endsection
@section('content')

    <section id="contact">
        <div class="section-content">
            <h1 class="section-header"> عدّل <span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> بياناتك الشخصية </span></h1>
            <h3> {{ getSetting() }} </h3>
        </div>
        <div class="contact-section">
            <div class="container">
                {!!  Form::model($user , ['route' => ['user.info.update' , $user->id ] , 'method' => 'PATCH' ,'class' => 'form-horizontal' ])  !!}
                @include('adminApanel.user.formEdit')
                <div class="clearFix"></div>
                <br />
                {!! Form::close() !!}
            </div>
        </div>
    </section>

@endsection

