@extends('layouts.app')
@section('title','编辑资料')

@section('content')
    <div class="container">
        <div class="panel panel-default col-md-offset-1 col-md-10">
            <div class="panel-heading">
                <h4>
                    <i class="glyphicon glyphicon-edit"> </i> 编辑个人资料
                </h4>
            </div>
            @include('common.errors')
            <div class="panel-body">
                <form action="{{ route('users.update',$user->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    
                    <div class="form-group">
                        <label for="name-field">用户名</label>
                        <input type="text" class="form-control" name="name" id="name-field" value="{{ old('name',$user->name) }}">
                    </div>
                    <div class="form-group">
                        <label for="email-field">邮箱</label>
                        <input type='email' class="form-control" name="email" id="email-field" value="{{ old('email',$user->email) }}" >
                    </div>
                    <div class="form-group">
                        <label for="introduction-field">个人简介</label>
                        <textarea name="introduction" id="introduction-field"  rows="3" class="form-control" vaule="{{ old('email',$user->introduction) }}"></textarea>
                    </div>
                    <div class="well well-sm">
                        <button class="btn btn-primary" type="submit">保存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection