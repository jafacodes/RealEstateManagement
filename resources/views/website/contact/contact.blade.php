@extends('layouts.app')

@section('title')
     تواصل معنا
@endsection

@section('header')
    {!! Html::style('cus/contact.css') !!}
    <style>
        input.form-control  {
            border-radius: 20px !important;
            height: 50px !important;
        }
    </style>
@endsection
@section('content')

<section id="contact">
    <div class="section-content">
        <h1 class="section-header"> خليك <span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> على تواصل معنا </span></h1>
        <h3> {{ getSetting() }} </h3>
    </div>
    <div class="contact-section">
        <div class="container">
            {!! Form::open(['url' => '/contact' , 'method' => 'POST' ]) !!}
                <div class="col-md-9 form-line">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="exampleInputUsername"> الإسم </label>
                        <input name="name" type="text" class="form-control" id="" placeholder=" إدخل إسمك ">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="exampleInputEmail"> البريد الإلكتروني </label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail" placeholder=" أدخل بريدك الإلكتروني " value="{{ \Illuminate\Support\Facades\Auth::user() ? \Illuminate\Support\Facades\Auth::user()->email : '' }}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                        <label for ="description"> الرسالة </label>
                        <textarea name="message" class="form-control" id="description" placeholder=" أدخل رسالتك "></textarea>
                        @if ($errors->has('message'))
                            <span class="help-block">
                                <strong>{{ $errors->first('message') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                        <label for ="address"> عنوان الرسالة </label>
                        <select name="type"  class="form-control" id="address" placeholder=" العنوان ">
                            @foreach(contact() as $key => $value)
                                <option value="{{ $key }}">
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('type'))
                            <span class="help-block">
                                <strong>{{ $errors->first('type') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                            <button type="submit" class="btn btn-warning"><i class="fa fa-paper-plane" style="color: whitesmoke" aria-hidden="true"></i>  إرسال </button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <i class="fa fa-angle-left social-icon"></i>
                        {{ nl2br(getSetting())  }}
                    </div>
                    <div class="form-group">
                        <i class="fa fa-globe social-icon"></i>
                        {{ nl2br(getSetting('address')) }}
                    </div>
                    <div class="form-group">
                        <i class="fa fa-mobile social-icon"></i>
                        {{ nl2br(getSetting('mobile')) }}
                    </div>
                    <div class="form-group">
                        <i class="fa fa-facebook social-icon"></i>
                        <a href="{{ nl2br(getSetting('facebook'))  }}">{{ nl2br(getSetting('facebook'))  }}</a>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-envelope social-icon"></i>
                        {{ nl2br(getSetting('email'))  }}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</section>

@endsection
