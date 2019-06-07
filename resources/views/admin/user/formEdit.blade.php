

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

    <div class="col-md-12">
        {!! Form::text("name" , null , ['class' => 'form-control']) !!}
        @if ($errors->has('name'))
            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

    <div class="col-md-12">
        {!! Form::text("email" , null , ['class' => 'form-control']) !!}
        @if ($errors->has('email'))
            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('admin') ? ' has-error' : '' }}">

    <div class="col-md-12">
        {!! Form::select("admin" ,['0' => 'user' , '1' => 'admin'] ,null , ['class' => 'form-control']) !!}
        @if ($errors->has('admin'))
            <span class="help-block">
                                        <strong>{{ $errors->first('admin') }}</strong>
                                    </span>
        @endif
    </div>
</div>

@if(!isset($user))

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">


    <div class="col-md-6">
        <input id="password-confirm" placeholder=" كرر كلمة المرور " type="password" class="form-control" name="password_confirmation"  required>
    </div>

    <div class="col-md-6">
        <input id="password" placeholder=" كلمة المرور " type="password" class="form-control" name="password"  required>

        @if ($errors->has('password'))
            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
        @endif
    </div>
</div>

@endif

<div class="form-group">
    <div class="col-md-12">
        <button type="submit" class="btn btn-warning"><i class="fa fa-btn fa-check"></i> تنفيذ </button>
    </div>
</div>
