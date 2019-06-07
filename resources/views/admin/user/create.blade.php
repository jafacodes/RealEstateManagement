@extends('admin.layouts.layout')

@section('title')
    أضف عضو
    @endsection

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            أضف عضو
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
            <li><a href="{{ url('/adminpanel/users') }}"> التحكم في الأعضاء </a></li>
            <li class="active"><a href="{{ url('/adminpanel/users/create') }}"> إضافة عضو جديد </a></li>
        </ol>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"> أضف عضو جديد </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::open(['url' => 'adminpanel/users/create' , 'method' => 'POST' ,'class' => 'form-horizontal' ]) !!}
                        @include('admin.user.formEdit')
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection