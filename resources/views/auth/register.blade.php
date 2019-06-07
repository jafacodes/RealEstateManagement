@extends('layouts.app')

@section('content')
<div class="container">
    <div class="contact_bottom">
        <hr />
        <h3> تسجيل عضوية جديدة </h3>
        <hr />
    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

        <div class="text2{{ $errors->has('name') ? ' has-error' : '' }}">

            <div class="col-md-12">
                <input id="name" placeholder=" إسم المستخدم " type="text" class="form-control" name="name"  required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="text2{{ $errors->has('email') ? ' has-error' : '' }}">

            <div class="col-md-12">
                <input id="email" placeholder=" البريد الإلكتروني " type="email" class="form-control" name="email" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="text2{{ $errors->has('password') ? ' has-error' : '' }}">


            <div class="col-md-6">
                <input id="password-confirm" placeholder=" كرر كلمة المرور " type="password" class="form-control" name="password_confirmation" required>
            </div>

            <div class="col-md-6">
                <input id="password" placeholder=" كلمة المرور " type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="text3">
            <div class="col-md-12">
                <button type="submit" class="btn btn-warning"><i class="fa fa-btn fa-user"></i> تسجيل عضوية جديدة </button>
            </div>
        </div>
    </form>
</div>
    <div class="clearfix"></div>
    <br />
</div>
@endsection
