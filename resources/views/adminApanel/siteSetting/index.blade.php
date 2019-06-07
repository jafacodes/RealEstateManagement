@extends('adminApanel.layouts.layout')

@section('title')
 تعديل إعدادات الموقع
@endsection

@section('content')

    <!-- Content Header (Page header) -->
    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i>
                تعديل إعدادات الموقع
            </h1>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><a href="{{ url('/admin_panel') }}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
                <li class="active"><a href="{{ url('/admin_panel/sitesetting') }}"> تعديل إعدادات الموقع </a></li>
            </ul>
        </div>
    </div>

    <!-- Main content -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-title">
                     تعديل إعدادات الموقع
                </h3>
                <div class="card-body">
                        <form action="{{ url('admin_panel/sitesetting') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @foreach($siteSetting as $setting)
                                <div class="form-group{{ $errors->has($setting->namesetting) ? ' has-error' : '' }}">

                                    <label class="control-label">{{ $setting->slug }}</label>

                                        @if($setting -> type == 0)
                                            {!! Form::text($setting->namesetting , $setting->value , ['class' => 'form-control']) !!}
                                        @elseif($setting -> type == 3)
                                            @if($setting->value != '')
                                                <div class="clearfix"></div>
                                                <br />
                                                <img src="{{ checkIfImageExist($setting->value,'/public/website/slider/','/website/slider/') }}" width="100px" height="100px" >
                                                <div class="clearfix"></div>
                                                <br />
                                            @endif
                                            {!! Form::file($setting->namesetting , ['class' => 'form-control']) !!}
                                        @else
                                            {!! Form::textarea($setting->namesetting , $setting->value , ['class' => 'form-control']) !!}
                                        @endif
                                        @if ($errors->has($setting->namesetting))
                                            <span class="help-block">
                                        <strong>{{ $errors->first($setting->namesetting) }}</strong>
                                    </span>
                                        @endif
                                </div>
                            @endforeach
                            <div class="card-footer">
                                <button class="btn btn-primary icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> تعديل إعدادات الموقع </button>
                            </div>
                        </form>

                </div>

            </div>
        </div>
    </div>


@endsection