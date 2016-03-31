@extends('user.layout.layout')

@section('meta')

@endsection

@section('styles')

<link rel="stylesheet" href="/bower_components/medium-editor/dist/css/medium-editor.min.css">
<link rel="stylesheet" href="/bower_components/medium-editor/dist/css/themes/default.css" id="medium-editor-theme">

<!-- Font Awesome for awesome icons. You can redefine icons used in a plugin configuration -->

<!-- The plugin itself -->
<link rel="stylesheet" href="/bower_components/medium-editor-insert-plugin/dist/css/medium-editor-insert-plugin.min.css">
@endsection





@section('content')
<!--=== Blog Posts ===-->
<div class="bg-color-light">
 <div class="blog-author ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img src="/assets/img/team/img1-md.jpg" alt="" >
                <div class="blog-author-desc pull-left">
                    <div class="overflow-h">
                        <h4><a style="color:#555" href="#">圈子的名字</a></h4>
                        
                    </div>
                    <p>简介</p>
                    <p>圈主：黑天猫警长&nbsp;<a target="_blank" href="/user/message/history?uid=123" class="btn btn-xs rounded btn-info" ><i class="fa fa-commenting-o"></i>&nbsp;联系Ta</a></p>
                

                </div>
                <div class="blog-author-desc pull-right">
                    <ul class="breadcrumb text-right" style="padding-left:0;margin-top: -15px;float:none;">
                        <li><a  href="javascript:history.go(-1);">圈子</a></li>
                        
                        <li class="active">当前圈子名</li>
                    </ul>
                 
                    <p class="clearfix" style="padding-top:20px;">
                        <button class="btn btn-xs rounded btn-info" type="button">加入/退出</button>
                        <button class="btn btn-xs rounded btn-info" type="button">邀请朋友</button>
                        <button class="btn btn-xs rounded btn-info" type="button">发帖子</button>
                        <button class="btn btn-xs rounded btn-info" type="button">发视频</button>
                 
                    </p>
                    
              
                

                </div>
            </div>
        </div>
    </div>
 </div>  

</div>
<div class="bg-color-group">
 
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="group-body">
                <ul class="list-inline list-unstyled type-ul">
                  <li class="{{Request::input('type')=='dynamic'||Request::input('type')==''?'active':''}}"><a href="/group?type=dynamic">全部动态</a></li>
                  <li class="{{Request::input('type')=='article'?'active':''}}"><a href="/group?type=article">帖子</a></li>
                  <li class="{{Request::input('type')=='video'?'active':''}}"><a href="/group?type=video">视频</a></li>
              
          
                </ul>
                <hr style="position:relative;margin-top:-10px;border-top: 2px solid #eee;margin-bottom: 20px;">
                @if(Request::input('type')=="dynamic" ||Request::input('type')=="dynamic")
                <div>
                    <div class="content-boxes-v3 margin-bottom-10 md-margin-bottom-20">
                         <img class="rounded-x pull-left block-grid-v1-img" style="width: 35px;" src="/assets/img/testimonials/img7.jpg" alt="">
                          <div class="content-boxes-in-v3">
                              <p><a href="#">黑猫警长</a> 在圈子<a href="#">XXX</a>发布了一篇文章</p>
                              <p><b>文章标题</b></p>
                              <ul class="list-unstyled list-inline">
                                  <li><i class="fa fa-eye"></i>&nbsp;124</li>
                                  <li><i class="fa fa-heart-o"></i>&nbsp;2</li>
                                  <li><i class="fa fa-commenting-o"></i>&nbsp;3</li>
                              </ul>
                          </div>
                    </div>
                    <hr class="devider devider-dotted my-dotted">
                </div>
                <div>
                    <div class="content-boxes-v3 margin-bottom-10 md-margin-bottom-20">
                         <img class="rounded-x pull-left block-grid-v1-img" style="width: 35px;" src="/assets/img/testimonials/img7.jpg" alt="">
                          <div class="content-boxes-in-v3">
                              <p><a href="#">黑猫警长</a> 在圈子<a href="#">XXX</a>发布了一篇文章</p>
                              <p><b>文章标题</b></p>
                              <ul class="list-unstyled list-inline">
                                  <li><i class="fa fa-eye"></i>&nbsp;124</li>
                                  <li><i class="fa fa-heart-o"></i>&nbsp;2</li>
                                  <li><i class="fa fa-commenting-o"></i>&nbsp;3</li>
                              </ul>
                          </div>
                    </div>
                    <hr class="devider devider-dotted my-dotted">
                </div>

                @else
                <div>
                    <div class="content-boxes-v3 margin-bottom-10 md-margin-bottom-20">
                         <img class="rounded-x pull-left block-grid-v1-img" style="width: 35px;" src="/assets/img/testimonials/img7.jpg" alt="">
                          <div class="content-boxes-in-v3">
                              
                              <p><b>文章标题</b>【帖子】</p>
                              <ul class="list-unstyled list-inline group-article">
                                  <li>124&nbsp;人浏览</li>
                                  <li>124&nbsp;人喜欢</li>
                                  <li>124&nbsp;人评论</li>
                                  
                              </ul>
                          </div>
                    </div>
                    <hr class="devider devider-dotted my-dotted">
                </div>


                @endif






                </div>
            </div>

            <div class="col-md-4">
                <div class="group-body">
                <ul class="list-inline list-unstyled type-ul">
                  <li class="active"><a href="/user/home/profile-album?type=personal">明星圈友</a></li>
                  <li class=""><a href="/user/home/profile-album?type=experience">全部成员</a></li>
                 
              
            
                </ul>
                <hr style="position:relative;margin-top:-10px;border-top: 2px solid #eee;margin-bottom: 10px;">
                </div>
            </div>

        </div>
        

    </div>

</div>    
<!--=== End Blog Posts ===-->
   
@endsection    


@section('jquery')


@endsection









