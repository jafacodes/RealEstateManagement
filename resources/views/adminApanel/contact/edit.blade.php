@extends('adminApanel.layouts.layout')

@section('title')
    تعديل الرسالة
    {{ $contact->name }}
@endsection


@section('content')


    <!-- Content Header (Page header) -->
    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i>
                تعديل الرسالة
                {{ $contact->name }}
            </h1>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><a href="{{ url('/admin_panel') }}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
                <li><a href="{{ url('/admin_panel/contact') }}"> التحكم في الرسائل </a></li>
                <li class="active"><a href="{{ url('/admin_panel/contact/'.$contact->id.'/edit') }}">     تعديل الرسالة
                        {{ $contact->name }} </a></li>
            </ul>
        </div>
    </div>



    <!-- Main content -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-title">
                    تعديل الرسالة
                    {{ $contact->name }}
                </h3>
                <div class="card-body">
                        {!! Form::model($contact , ['route' => ['admin_panel.contact.update' , $contact->id ] , 'method' => 'PATCH' ,'class' => 'form-horizontal' ]) !!}
                            @include('adminApanel.contact.formEdit')
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

@endsection
