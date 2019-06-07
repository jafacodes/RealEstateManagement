@extends('admin.layouts.layout')

@section('title')
    تعديل العضو
    {{ $user->name }}
@endsection


@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            تعديل العضو
            {{ $user->name }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
            <li><a href="{{ url('/adminpanel/users') }}"> التحكم في الأعضاء </a></li>
            <li class="active"><a href="{{ url('/adminpanel/users/'.$user->id.'/edit') }}">     تعديل العضو
                    {{ $user->name }} </a></li>
        </ol>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">    تعديل العضو
                            {{ $user->name }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::model($user , ['route' => ['adminpanel.users.update' , $user->id ] , 'method' => 'PATCH' ,'class' => 'form-horizontal' ]) !!}
                            @include('admin.user.formEdit')
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">   تغيير كلمة المرور الخاصة بالعضو
                            {{ $user->name }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::open(['url' => 'adminpanel/users/changepassword/'  , 'method' => 'post' ,'class' => 'form-horizontal']) !!}

                        <input type="hidden" value="{{ $user->id }}"  name="userid">

                        <div class="form-group">
                            @if($user->id != 1)
                            <div class="col-md-2">
                                <a href="{{ url('/adminpanel/users/'.$user->id.'/delete') }}" class="btn btn-danger form-control"><i class="fa fa-btn fa-trash"></i> حذف العضو </a>
                            </div>

                            <div class="col-md-2">
                                <button type="submit" class="btn btn-warning form-control"><i class="fa fa-btn fa-key"></i> تغيير كلمة المرور </button>
                            </div>

                            @else
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-warning form-control"><i class="fa fa-btn fa-key"></i> تغيير كلمة المرور </button>
                                    </div>
                                @endif
                        <div class="col-md-8">
                            <input id="password" placeholder=" كلمة المرور " type="password" class="form-control" name="password" value="{{ $user->password }}" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
