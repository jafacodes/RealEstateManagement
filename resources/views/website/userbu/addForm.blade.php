

<div class="form-group">

    <label class="control-label"> إسم العقار  </label>
    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
        {!! Form::text("name" , null , ['class' => 'form-control']) !!}
        @if ($errors->has('name'))
            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
        @endif
    </div>
</div>

<div class="form-group">
    <label class="control-label"> مساحة العقار </label>
    <div class=" {{ $errors->has('square') ? ' has-error' : '' }}">
        {!! Form::text("square" , null , ['class' => 'form-control']) !!}
        @if ($errors->has('square'))
            <span class="help-block">
                                        <strong>{{ $errors->first('square') }}</strong>
                                    </span>
        @endif
    </div>

</div>
<div class="form-group">

    <label class="control-label"> سعر العقار </label>
    <div class="{{ $errors->has('price') ? ' has-error' : '' }}">
        {!! Form::text("price" , null , ['class' => "form-control"]) !!}
        @if ($errors->has('price'))
            <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
        @endif
    </div>
</div>

<div class="form-group">

    <label class="control-label"> نوع العملية </label>
    <div class="{{ $errors->has('rent') ? ' has-error' : '' }}">
        {!! Form::select("rent" ,bu_rent() ,null , ['class' => 'form-control']) !!}
        @if ($errors->has('rent'))
            <span class="help-block">
                                        <strong>{{ $errors->first('rent') }}</strong>
                                    </span>
        @endif
    </div>
</div>

<div class="form-group">
    <label class="control-label"> نوع العقار </label>
    <div class="{{ $errors->has('type') ? ' has-error' : '' }}">
        {!! Form::select("type" ,bu_type() ,null , ['class' => 'form-control']) !!}
        @if ($errors->has('type'))
            <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
        @endif
    </div>
</div>
<div class="form-group">
    <label class="control-label"> عدد الغرف </label>
    <div class="{{ $errors->has('rooms') ? ' has-error' : '' }}">
        {!! Form::number("rooms" , null , ['class' => 'form-control']) !!}
        @if ($errors->has('rooms'))
            <span class="help-block">
                                        <strong>{{ $errors->first('rooms') }}</strong>
                                    </span>
        @endif
    </div>
</div>


<div class="form-group">
    <label class="control-label"> منطقة العقار </label>
    <div class="{{ $errors->has('place') ? ' has-error' : '' }}">
        {!! Form::select("place" ,bu_place() ,null , ['class' => 'form-control select2']) !!}
        @if ($errors->has('place'))
            <span class="help-block">
                                        <strong>{{ $errors->first('place') }}</strong>
                                    </span>
        @endif
    </div>

</div>

<div class="form-group">

    <label class="control-label"> الكلمات الدلالية </label>
    <div class="{{ $errors->has('meta') ? ' has-error' : '' }}">
        {!! Form::textarea("meta" , null , ['class' => 'form-control']) !!}
        @if ($errors->has('meta'))
            <span class="help-block">
                                        <strong>{{ $errors->first('meta') }}</strong>
                                    </span>
        @endif
    </div>
</div>
<div class="form-group">

    <label class="control-label"> دائرة عرض </label>
    <div class="{{ $errors->has('latitude')  ? ' has-error' : '' }}">
        {!! Form::text("latitude" , null , ['class' => 'form-control']) !!}
        @if ($errors->has('latitude'))
            <span class="help-block">
                                        <strong>{{ $errors->first('latitude') }}</strong>
                                    </span>
        @endif
    </div>
</div>
<div class="form-group">
    <label class="control-label"> خط طول </label>
    <div class="{{ $errors->has('longitude')  ? ' has-error' : '' }}">
        {!! Form::text("longitude" , null , ['class' => 'form-control']) !!}
        @if ($errors->has('longitude'))
            <span class="help-block">
                                        <strong>{{ $errors->first('longitude') }}</strong>
                                    </span>
        @endif
    </div>
</div>

<div class="form-group">

    <label class="control-label">  وصف مطول للعقار </label>
    <div class="{{ $errors->has('large_desc') ? ' has-error' : '' }}">
        {!! Form::textarea("large_desc" , null , ['class' => 'form-control']) !!}
        @if ($errors->has('large_desc'))
            <span class="help-block">
                                        <strong>{{ $errors->first('large_desc') }}</strong>
                                    </span>
        @endif
    </div>

</div>

<div class="form-group">

    <div class="{{ $errors->has('image') ? ' has-error' : '' }}">
        <label class="control-label">  صورة للعقار </label>
        {!! Form::file("image" , null , ['class' => 'form-control']) !!}
        @if ($errors->has('image'))
            <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
        @endif
    </div>

</div>
<input type="hidden" name="status" value="0">
<input type="hidden" name="user_id" value="{{ Auth::user() ? Auth::user()->id : null }}">



<div class="card-footer">
    <button  class="btn btn-warning icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> تنفيذ </button>
</div>
