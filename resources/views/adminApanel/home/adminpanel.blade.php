@extends('adminApanel.layouts.layout')

@section('title')
    الرئيسية
@endsection

@section('content')

    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i>
            الصفحة الرئيسية
            </h1>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><i class="fa fa-home fa-lg"></i><a href="{{ url('/admin_panel') }}"></a></li>
                <li><a href="{{  url('/admin_panel')  }}">
                        الرئيسية
                    </a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    أدخل بياناتك هنا ...
                </div>
            </div>
        </div>
    </div>

@endsection