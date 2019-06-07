@extends('layouts.app')

@section('title')
تمت الإضافة
@endsection

@section('header')
    {!! Html::style('cus/contact.css') !!}
@endsection
@section('content')

    <section id="contact">
        <div class="section-content">
            <h1 class="section-header"> تمت إضافة <span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> عقارك مجاناً </span></h1>
            <h3> {{ getSetting() }} </h3>
        </div>
        <div class="contact-section">
            <div class="container">
                <div class="alert alert-success">
                    تمت إضافة العقار بنجاح ...
                </div>
            </div>
        </div>
    </section>

@endsection