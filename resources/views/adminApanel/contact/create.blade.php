@extends('adminApanel.layouts.layout')

@section('title')
    أضف عضو
    @endsection

@section('content')

    <!-- Content Header (Page header) -->
    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i>
                أضف عضو
            </h1>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><a href="{{ url('/admin_panel') }}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
                <li><a href="{{ url('/admin_panel/users') }}"> التحكم في الأعضاء </a></li>
                <li class="active"><a href="{{ url('/admin_panel/users/create') }}"> إضافة عضو جديد </a></li>
            </ul>
        </div>
    </div>



    <!-- Main content -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-title">
إضافة عضو جديد
                </h3>
                <div class="card-body">
                        {!! Form::open(['url' => 'admin_panel/users/create' , 'method' => 'POST' ,'class' => 'form-horizontal' ]) !!}
                        @include('adminApanel.user.formEdit')
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    @endsection