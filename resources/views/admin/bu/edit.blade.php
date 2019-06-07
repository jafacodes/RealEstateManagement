@extends('admin.layouts.layout')

@section('title')
    تعديل العقار
    {{ $bu->name }}
@endsection

@section('header')
    {!! Html::style('cus/select2/css/select2.min.css') !!}
    <style>
        textarea {
            resize: none;
        }
    </style>

    @endsection
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            تعديل العقار
            {{ $bu->name }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
            <li><a href="{{ url('/adminpanel/bu') }}"> التحكم في العقارات </a></li>
            <li class="active"><a href="{{ url('/adminpanel/bu/'.$bu->id.'/edit') }}">     تعديل العقار
                    {{ $bu->name }} </a></li>
        </ol>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">    تعديل العقار
                            {{ $bu->name }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::model($bu , ['route' => ['adminpanel.bu.update' , $bu->id ] , 'method' => 'PATCH' ,'class' => 'form-horizontal' , 'files' =>true]) !!}
                            @include('admin.bu.formEdit')
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </section>

    
@endsection

@section('footer')
    {!! Html::script('cus/select2/js/select2.js') !!}
    <script>
        $(document).ready(function () {
            $('.select2').select2({
                dir:'rtl',
            });
        });
    </script>
@endsection
