@extends('user.layout.layout')


@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">审核状态</h1>
            <ul class="pull-right breadcrumb">
                
                <li><a href="">Pages</a></li>
                <li class="active">Login</li>
            </ul>
        </div><!--/container-->
    </div><!--/breadcrumbs-->

@endsection




@section('content')

<div class="container content">

    <div class="row">
        <div class="col-md-6 col-md-offset-3 md-margin-bottom-50">
                        <!-- Our Services -->
           
                @if($certification->status =="apply")
                <div class="service-block service-block-orange">
                    <h2 class="heading-md">审核中……</h2>
                    <p>你的申请将在3个工作日内处理完成，请耐心等候</p>
                </div>
                @elseif($certification->status == "passed")
                <div class="service-block service-block-green">
                    <h2 class="heading-md">审核通过</h2>
                    <p>你的申请已审核通过</p>
                </div>
                @else
                <div class="service-block service-block-red">
                    <h2 class="heading-md">审核未通过</h2>
                    <p>你的申请未通过，可能是因为如下原因</p>
                </div>

                @endif
           
            <!-- End Our Services -->

       

    

     
        </div>
    </div>
</div>

@endsection    