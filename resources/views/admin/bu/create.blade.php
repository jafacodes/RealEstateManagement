@extends('admin.layouts.layout')

@section('title')
    أضف عقار
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
            أضف عقار
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
            <li><a href="{{ url('/adminpanel/bu') }}"> التحكم في العقارات </a></li>
            <li class="active"><a href="{{ url('/adminpanel/bu/create') }}"> إضافة عقار جديد </a></li>
        </ol>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title"> أضف عقار جديد </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::open(['url' => 'adminpanel/bu/create' , 'method' => 'POST' ,'class' => 'form-horizontal' , 'files' =>true ]) !!}
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