

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

<div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">

    <label class="control-label"> الرسالة </label>
    {!! Form::textarea("message" , null , ['class' => 'form-control']) !!}
    @if ($errors->has('message'))
        <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
    @endif
</div>

<div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">

    <label class="control-label"> عنوان الرسالة </label>
        {!! Form::select("subject" ,contact() ,null , ['class' => 'form-control']) !!}
        @if ($errors->has('type'))
            <span class="help-block">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
        @endif
</div>



<div class="card-footer">
    <button class="btn btn-warning icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> تنفيذ </button>
</div>
