

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

    <label class="control-label"> إسم المستخدم </label>
        {!! Form::text("name" , null , ['class' => 'form-control']) !!}
        @if ($errors->has('name'))
            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
        @endif
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

    <label class="control-label"> البريد الإلكتروني </label>
        {!! Form::text("email" , null , ['class' => 'form-control']) !!}
        @if ($errors->has('email'))
            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
        @endif
</div>
@if(auth()->user()->admin == 1)
<div class="form-group{{ $errors->has('admin') ? ' has-error' : '' }}">

    <label class="control-label"> صلاحية المستخدم </label>
        {!! Form::select("admin" ,['0' => 'user' , '1' => 'admin'] ,null , ['class' => 'form-control']) !!}
        @if ($errors->has('admin'))
            <span class="help-block">
                                        <strong>{{ $errors->first('admin') }}</strong>
                                    </span>
        @endif
</div>
@endif
@if(!isset($user))

            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="control-label"> كلمة المرور  </label>
                <input id="password" placeholder=" كلمة المرور " type="password" class="form-control" name="password"  required>
                @if ($errors->has('password'))
                    <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
                @endif
            </div>
            <div class="form-group">
                <label class="control-label"> كرر كلمة المرور  </label>
                <input id="password-confirm" placeholder=" كرر كلمة المرور " type="password" class="form-control" name="password_confirmation"  required>
            </div>

@endif


<div class="card-footer">
    <button class="btn btn-warning icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> تنفيذ </button>
</div>
