@extends('user.layout.layout')


@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Login</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="">Pages</a></li>
                <li class="active">Login</li>
            </ul>
        </div><!--/container-->
    </div><!--/breadcrumbs-->

@endsection




@section('content')
    <div class="container content">
    	<div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <form class="reg-page form-horizontal" role="form" method="POST" > 
                {!! csrf_field() !!}
                    <div class="reg-header">
                        <h2>加入我们</h2>
                    </div>

                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" placeholder="email" name="email" value="{{old('email')}}" class="form-control">
                    </div>
                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" placeholder="密码" name="password" class="form-control">
                    </div>

                    <div class="row">
                        <div class="col-md-6 checkbox">
                            <label><input type="checkbox" name="remember"> Stay signed in</label>
                        </div>
                        <div class="col-md-6">
                            <button class="btn-u pull-right" type="submit">登入</button>
                        </div>
                    </div>

                    <hr>

                    <h4>Forget your Password ?</h4>
                    <p>no worries, <a class="color-green" href="{{ url('/password/reset') }}">click here</a> to reset your password.</p>
                     <h4>没有账号 ?</h4>
                    <p>no worries, <a class="color-green" href="{{url('user/public/register')}}">click here</a> 注册新账号</p>
                </form>
            </div>
        </div><!--/row-->
    </div><!--/container-->
@endsection    