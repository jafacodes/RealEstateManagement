

<div class="form-group">

    <div class="col-md-11 {{ $errors->has('name') ? ' has-error' : '' }}">
        {!! Form::text("name" , null , ['class' => 'form-control']) !!}
        @if ($errors->has('name'))
            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
        @endif
    </div>
    <div class="col-md-1"> إسم العقار </div>
</div>

<div class="form-group">





    <div class="col-md-5 {{ $errors->has('square') ? ' has-error' : '' }}">
        {!! Form::text("square" , null , ['class' => 'form-control']) !!}
        @if ($errors->has('square'))
            <span class="help-block">
                                        <strong>{{ $errors->first('square') }}</strong>
                                    </span>
        @endif
    </div>

    <div class="col-md-1"> مساحة العقار </div>



    <div class="col-md-5 {{ $errors->has('price') ? ' has-error' : '' }}">
        {!! Form::text("price" , null , ['class' => "form-control"]) !!}
        @if ($errors->has('price'))
            <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
        @endif
    </div>
    <div class="col-md-1"> سعر العقار </div>
</div>

<div class="form-group">

    <div class="col-md-2 {{ $errors->has('rent') ? ' has-error' : '' }}">
        {!! Form::select("rent" ,bu_rent() ,null , ['class' => 'form-control']) !!}
        @if ($errors->has('rent'))
            <span class="help-block">
                                        <strong>{{ $errors->first('rent') }}</strong>
                                    </span>
        @endif
    </div>

    <div class="col-md-1"> نوع العملية </div>

    <div class="col-md-2 {{ $errors->has('status') ? ' has-error' : '' }}">
        {!! Form::select("status" ,['0' => ' غير مفعل ' , '1' => ' مفعل '] ,null , ['class' => 'form-control']) !!}
        @if ($errors->has('status'))
            <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
        @endif
    </div>

    <div class="col-md-1"> حالة العقار </div>

    <div class="col-md-2 {{ $errors->has('type') ? ' has-error' : '' }}">
        {!! Form::select("type" ,bu_type() ,null , ['class' => 'form-control']) !!}
        @if ($errors->has('type'))
            <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
        @endif
    </div>

    <div class="col-md-1"> نوع العقار </div>

    <div class="col-md-2 {{ $errors->has('rooms') ? ' has-error' : '' }}">
        {!! Form::number("rooms" , null , ['class' => 'form-control']) !!}
        @if ($errors->has('rooms'))
            <span class="help-block">
                                        <strong>{{ $errors->first('rooms') }}</strong>
                                    </span>
        @endif
    </div>

    <div class="col-md-1"> عدد الغرف </div>



</div>

<div class="form-group">
    <div class="col-md-11 {{ $errors->has('place') ? ' has-error' : '' }}">
        {!! Form::select("place" ,bu_place() ,null , ['class' => 'form-control select2']) !!}
        @if ($errors->has('place'))
            <span class="help-block">
                                        <strong>{{ $errors->first('place') }}</strong>
                                    </span>
        @endif
    </div>

    <div class="col-md-1"> منطقة العقار </div>
</div>

<div class="form-group">



    <div class="col-md-11{{ $errors->has('small_desc') ? ' has-error' : '' }}">
        {!! Form::textarea("small_desc" , null , ['class' => 'form-control']) !!}
        @if ($errors->has('small_desc'))
            <span class="help-block">
                                        <strong>{{ $errors->first('small_desc') }}</strong>
                                    </span>
        @endif
        <br />
        <div class="alert alert-warning">
            لا يمكن إضافة أكثر من 160 حرف حسب معايير جوجل
        </div>
    </div>
    <div class="col-md-1"> وصف العقار لمحركات البحث </div>


</div>

<div class="form-group">

    <div class="col-md-11{{ $errors->has('meta') ? ' has-error' : '' }}">
        {!! Form::textarea("meta" , null , ['class' => 'form-control']) !!}
        @if ($errors->has('meta'))
            <span class="help-block">
                                        <strong>{{ $errors->first('meta') }}</strong>
                                    </span>
        @endif
    </div>
    <div class="col-md-1"> الكلمات الدلالية </div>
</div>

<div class="form-group">

    <div class="col-md-5{{ $errors->has('latitude')  ? ' has-error' : '' }}">
        {!! Form::text("latitude" , null , ['class' => 'form-control']) !!}
        @if ($errors->has('latitude'))
            <span class="help-block">
                                        <strong>{{ $errors->first('latitude') }}</strong>
                                    </span>
        @endif
    </div>

    <div class="col-md-1"> دائرة عرض </div>

    <div class="col-md-5{{ $errors->has('longitude')  ? ' has-error' : '' }}">
        {!! Form::text("longitude" , null , ['class' => 'form-control']) !!}
        @if ($errors->has('longitude'))
            <span class="help-block">
                                        <strong>{{ $errors->first('longitude') }}</strong>
                                    </span>
        @endif
    </div>
    <div class="col-md-1"> خط طول </div>
</div>

<div class="form-group">

    <div class="col-md-11{{ $errors->has('large_desc') ? ' has-error' : '' }}">
        {!! Form::textarea("large_desc" , null , ['class' => 'form-control']) !!}
        @if ($errors->has('large_desc'))
            <span class="help-block">
                                        <strong>{{ $errors->first('large_desc') }}</strong>
                                    </span>
        @endif
    </div>
    <div class="col-md-1"> وصف مطول للعقار </div>

</div>

<div class="form-group">

    <div class="col-md-11{{ $errors->has('image') ? ' has-error' : '' }}">

        @if(isset($bu))
            @if($bu->image != '')
                <img src="{{ Request::root().'/website/bu_images/'.$bu->image }}" class="img-responsive img-rounded" width="
100px" height="100px">
                <br>
                <div class="clearfix"></div>
            @endif
        @endif


        {!! Form::file("image" , null , ['class' => 'form-control']) !!}
        @if ($errors->has('image'))
            <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
        @endif
    </div>
    <div class="col-md-1"> صورة للعقار </div>

</div>

<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">



<div class="form-group">
    <div class="col-md-11 offset-m1">
        <button type="submit" class="btn btn-warning"><i class="fa fa-btn fa-check"></i> تنفيذ </button>
    </div>
</div>


