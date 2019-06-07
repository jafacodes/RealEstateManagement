@extends('layouts.app')

@section('title')
    صفحة تسجيل الدخول
    @endsection
@section('content')

<div class="container">
    <div class="contact_bottom">
        <hr />
        <h3>
             تسجيل الدخول
        </h3>
        <hr />
        <form role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="text2{{ $errors->has('email') ? ' has-error' : '' }}">

                <div class="col-md-12">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="text2{{ $errors->has('password') ? ' has-error' : '' }}">

                <div class="col-md-12">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="text3">
                <div class="col-md-12">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} style="float: right;margin: 10px;">
                             تذكرني
                        </label>
                    </div>
                </div>
            </div>

            <div class="text3">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-warning">
                        <i class="fa fa-btn fa-sign-in"></i>
                         تسجيل الدخول
                    </button>

                    <a class="banner_btn" href="{{ route('password.request') }}"> هل نسيت كلمة المرور ؟ </a>
                </div>
            </div>
        </form>
    </div>
    <div class="clearfix">
    </div>
    <br />
</div>

@endsection
