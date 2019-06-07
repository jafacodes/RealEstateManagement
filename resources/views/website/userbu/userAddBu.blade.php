@extends('layouts.app')

@section('title')
أضف عقارك مجاناً
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
            <h1 class="section-header"> أضف <span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> عقارك مجاناً </span></h1>
            <h3> {{ getSetting() }} </h3>
        </div>
        <div class="contact-section">
            <div class="container">
                {!! Form::open(['url' => '/user/create/bu' , 'method' => 'POST' , 'files' => true]) !!}
                @include('website.userbu.addForm')
                <div class="clearFix"></div>
                <br />
                {!! Form::close() !!}
            </div>
        </div>
    </section>

@endsection

