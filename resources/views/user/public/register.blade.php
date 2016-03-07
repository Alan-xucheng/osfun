@extends('user.layout.layout')


@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">注册</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="">Pages</a></li>
                <li class="active">注册</li>
            </ul>
        </div><!--/container-->
    </div><!--/breadcrumbs-->

@endsection



@section('content')
<div class="container content">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <form class="reg-page">
                <div class="reg-header">
                    <h2>Register a new account</h2>
                    <p>Already Signed Up? Click <a href="{{url('user/public/login')}}" class="color-green">Sign In</a> to login your account.</p>
                </div>

                <label>First Name</label>
                <input type="text" class="form-control margin-bottom-20">

                <label>Last Name</label>
                <input type="text" class="form-control margin-bottom-20">

                <label>Email Address <span class="color-red">*</span></label>
                <input type="text" class="form-control margin-bottom-20">

                <div class="row">
                    <div class="col-sm-6">
                        <label>Password <span class="color-red">*</span></label>
                        <input type="password" class="form-control margin-bottom-20">
                    </div>
                    <div class="col-sm-6">
                        <label>Confirm Password <span class="color-red">*</span></label>
                        <input type="password" class="form-control margin-bottom-20">
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-lg-6 checkbox">
                        <label>
                            <input type="checkbox">
                            I read <a href="page_terms.html" class="color-green">Terms and Conditions</a>
                        </label>
                    </div>
                    <div class="col-lg-6 text-right">
                        <button class="btn-u" type="submit">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><!--/container-->
   
@endsection    