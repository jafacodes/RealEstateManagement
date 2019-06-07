@extends('layouts.app')

@section('content')
<div class="container">
    <div class="contact_bottom">
        <hr />
        <h3>
إستعادة كلمة المرور
        </h3>
        <hr />
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="text2{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label for="email" class="col-md-2 control-label"> البريد الإلكتروني </label>
                        </div>


                        <div class="text3">
                            <div class="col-md-10 offset-m2">
                                <button type="submit" class="btn btn-warning">
                                    <i class="fa fa-reply"></i>
إرسال رابط إستعادة كلمة المرور
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

    <div class="clearfix">
    </div>
    <br />

    <hr />
            </div>
@endsection
