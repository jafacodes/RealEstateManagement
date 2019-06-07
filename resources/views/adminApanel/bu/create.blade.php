@extends('adminApanel.layouts.layout')

@section('title')
    أضف عقار
    @endsection

@section('header')
    <style>
        textarea {
            resize: none;
        }
    </style>
    @endsection

@section('content')

    <!-- Content Header (Page header) -->
    <div class="page-title">
        <div>
            <h1><i class="fa fa-globe"></i>
                أضف عقار
            </h1>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><a href="{{ url('/admin_panel') }}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
                <li><a href="{{ url('/admin_panel/bu') }}"> التحكم في العقارات </a></li>
                <li class="active"><a href="{{ url('/admin_panel/bu/create') }}"> إضافة عقار جديد </a></li>
            </ul>
        </div>
    </div>



    <!-- Main content -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-title">
                    إضافة عقار جديد
                </h3>
                <div class="card-body">
                        {!! Form::open(['url' => 'admin_panel/bu/create' , 'method' => 'POST' ,'class' => 'form-horizontal' , 'files' =>true ]) !!}
                        @include('adminApanel.bu.formEdit')
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
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