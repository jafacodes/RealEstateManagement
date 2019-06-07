@extends('adminApanel.layouts.layout')

@section('title')
    تعديل العضو
    {{ $user->name }}
@endsection


@section('content')


    <!-- Content Header (Page header) -->
    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i>
                تعديل العضو
                {{ $user->name }}
            </h1>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><a href="{{ url('/admin_panel') }}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
                <li><a href="{{ url('/admin_panel/users') }}"> التحكم في الأعضاء </a></li>
                <li class="active"><a href="{{ url('/admin_panel/users/'.$user->id.'/edit') }}">     تعديل العضو
                        {{ $user->name }} </a></li>
            </ul>
        </div>
    </div>



    <!-- Main content -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-title">
                    تعديل العضو
                    {{ $user->name }}
                </h3>
                <div class="card-body">
                        {!! Form::model($user , ['route' => ['admin_panel.users.update' , $user->id ] , 'method' => 'PATCH' ,'class' => 'form-horizontal' ]) !!}
                            @include('adminApanel.user.formEdit')
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

    <!-- Main content -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-title">
                    تغيير كلمة المرور الخاصة بالعضو
                    {{ $user->name }}
                </h3>
                <div class="card-body">
                        {!! Form::open(['url' => 'admin_panel/users/changepassword/'  , 'method' => 'post' ,'class' => 'form-horizontal']) !!}

                        <input type="hidden" value="{{ $user->id }}"  name="userid">

                        <div class="form-group">
                            @if($user->id != 1)
                            <div class="col-md-2">
                                <a href="{{ url('/admin_panel/users/'.$user->id.'/delete') }}" class="btn btn-danger form-control"><i class="fa fa-btn fa-trash"></i> حذف العضو </a>
                            </div>

                            <div class="col-md-3">
                                <button type="submit" class="btn btn-warning form-control"><i class="fa fa-btn fa-key"></i> تغيير كلمة المرور </button>
                            </div>

                            @else
                                    <div class="col-md-5">
                                        <button type="submit" class="btn btn-warning form-control"><i class="fa fa-btn fa-key"></i> تغيير كلمة المرور </button>
                                    </div>
                                @endif
                        <div class="col-md-7">
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
@endsection
